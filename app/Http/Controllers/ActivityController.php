<?php

namespace App\Http\Controllers;
use App\Users;
use App\Activity;
use App\ActivityUpdates;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class activityController extends Controller
{
 public function __construct()
 {
    $this->middleware('auth');
}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = Activity::with('users')->paginate(5);
        $users = Users::find(1);
        return view('activity/index', compact('activities', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'activity_name' => ['required', 'min:3'],
            'activity_remark' => ['required', 'max:100'],
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first(),
            ]);
        }else{
            $activity = new Activity;
            $activity->name = $request->activity_name;
            $activity->remark = $request->activity_remark;
            $activity->user = $request->admin_id;
            $activity->status = 'started';
            $activity->month = Carbon::now()->format('m');
            if($activity->save()){
                return response()->json([
                    'success' => true,
                    'message' => 'Activity added'
                ]);
            }else{
             return response()->json([
                'success' => false,
                'message' => $validator->errors()->first(),
            ]);
         }

     }

 }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $date = Carbon::today();
       $activity_updates = ActivityUpdates::whereDate('created_at', $date)->where('activity_id', $id)->get();
       // dd($activity_updates);
       $activity = Activity::findOrFail($id);
        return view('activity/show', compact('activity_updates', 'activity'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $activities = Activity::where('id', $id)->firstOrFail();
        return view('activity/edit-activity', compact('activities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'activity_name' => ['required'],
            'activity_status' => ['required'],
            'activity_remark' => ['required', 'max: 100'],
        ]);
        if ($validator->fails()) {
           return redirect(url()->previous())->withErrors($validator)->withInput();
        }else{
            $activity = new Activity;
            $name = $request->activity_name;
            $status = $request->activity_status;
            $remark = $request->activity_remark;
            $update_activity = Activity::where('id', $id)->update([
                'name' => $name, 'status' => $status, 'remark' => $remark
            ]);
            $update = new ActivityUpdates;
            $update->activity_id = $request->activity_id;
            $update->user = $request->user;
            $update->update_remark = $request->activity_remark;
            $update->update_status = $request->activity_status;
            if ($update_activity && $update->save()) {
                return redirect(url()->previous())->withSuccess('Activity updated successfully');
            }
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
