<?php

namespace App\Http\Controllers;
use App\ActivityUpdates;
use App\Activity;
use App\Users;
use Illuminate\Http\Request;

class ActivityUpdatesController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}

	public function index()
	{
		$activities = Activity::groupBy('created_at')->orderBy('id', 'desc');
		return view('update-records', compact('activities'));
	}
	public function filter(Request $request)
	{
		$filter_status = $request->filter_status;
		$filter_month = $request->filter_month;
		$end_month = $request->end_month;
		$activity_updates = Activity::all()->whereBetween('month', [$filter_month,$end_month])->where('status','=', $filter_status);
			foreach ($activity_updates as $key) {
				$output = '';
				$output .= '
				<tr>
				<td><a href="">'.$key->name.'</a></td>';
				if($key->status == 'started'){
					$output .= '<td><small class="badge badge-primary text-white">'.$key->status.'</td>';
				}
				if ($key->status == 'pending') {
					$output .= '<td><small class="badge badge-info text-white">'.$key->status.'</td>';
				}
				if($key->status == 'finished'){
					$output .= '<td><small class="badge badge-success text-white">'.$key->status.'</td>';
				}
				$output .= '<td>'.$key->created_at->format('d/m/Y').'</td>
				<td>
				<button class="btn btn-sm btn-custom">
				<a href="activity/'.$key->id.'/'.$key->name.'">
				<span class="fa fa-eye"></span>
				</a>
				</button>
				<button class="btn btn-sm btn-custom">
				<a href="edit-activity/'.$key->id.'">
				<span class="fa fa-edit"></span>
				</a>
				</button>
				</td>
				</tr>
				';
				return $output;
			}
	}
}


