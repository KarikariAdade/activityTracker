@extends('layouts/app')
@section('content')
<div class="col-md-9">
	<div class="bg-white">
    <form method="POST" class="row update-activity-form">
      @csrf
      <div class="col-md-10 text-center">
       @if($errors->all())
      @foreach($errors->all() as $error)
      <p class="alert bg-danger text-white" style="font-weight: bold;">{{ $error}}</p>
      @endforeach
      @endif

      {{-- IF FORM HAS SUCCESS MESSAGE BEING PASSED, PRINT IT OUT ON VALIDATION SUCCESS --}}
      @if(session()->has('success'))
      <p class="alert bg-success text-white" style="font-weight: bold;">{{ session()->get('success')}}</p>
      @endif
      </div>
      <div class="form-group col-md-6">
        <input type="hidden" name="user" id="user" value="{{ $activities->user }}">
        <input type="hidden" name="activity_id" id="activity_id" value="{{ $activities->id }}">
        <label>Activity Name</label>
        <input type="text" name="activity_name" id="activity_name" value="{{ $activities->name }}" class="form-control">
      </div>
      <div class="form-group col-md-6">
        <label>Activity Status</label>
        <select class="form-control" id="activity_status" name="activity_status">
         <option value="started">Started</option>
         <option value="pending">Pending</option>
         <option value="finished">Finished</option>
       </select>
     </div>
     <div class="form-group col-md-12">
      <label>Activity Update Remark</label>
      <textarea class="form-control" rows="10" id="activity_remark" name="activity_remark">{{ $activities->remark }}</textarea>
    </div>
    <div class="col-md-12 text-center">
      <button class="btn btn-custom" type="submit" name="update_activity_btn" id="update_activity_btn">Update Activity</button>
    </div>
  </form>
</div>
</div>
@endsection
