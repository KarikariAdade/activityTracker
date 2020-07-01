@extends('layouts/app')
@section('content')
<div class="col-md-9">
	<div class="bg-white">
		<nav class="user-tabs mb-4 nav-justified">
                        <ul class="nav nav-pills">
                          <li class="nav-item">
                            <a class="nav-link" href="#add_activity" data-toggle="tab">Add Activity</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active upcoming_appointment" href="#view_activity" data-toggle="tab">View Activities</a>
                        </li>
                    </ul>
                </nav>
                <div class="tab-content pt-0">
                    <div role="tabpanel" id="add_activity" class="tab-pane fade">
                    	
                    	<form method="POST" class="row add_activity_form">
                    		<div class="col-md-8">
                    			<p class="alert alert-error">
                    	</p>
                    		</div>
                    		@csrf
                    		<input type="hidden" name="admin_id" id="admin_id" value="{{ Auth::user()->id }}">
                    		<div class="form-group col-md-6">
                    			<label>Activity Name</label>
                    			<input type="text" class="form-control" name="activity_name" id="activity_name">
                    		</div>
                    		<div class="form-group col-md-8">
                    			<label>Activity Remarks</label>
                    			<textarea class="form-control" rows="10" id="activity_remark" name="activity_remark"></textarea>
                    		</div>
                    		<div class="col-md-8 text-center">
                    			<button class="btn btn-custom" id="add_activity_btn" name="add_activity_btn">Add Activity</button>
                    		</div>
                    	</form>
                    </div>
                    <div role="tabpanel" id="view_activity" class="tab-pane fade show active">
                    	<div class="table-responsive">
                              <table class="table table-striped table-hover" style="margin-top: 2% !important;">
                              	<thead>
                              		<tr>
                              			<th>Activity Name</th>
                              			<th>Created By:</th>
                              			<th>Status</th>
                              			<th>Created At:</th>
                              			<th>Action</th>
                              		</tr>
                              	</thead>
                              	<tbody>
                              		@foreach($activities as $activity)
                              		<tr>
                              			<td>{{ $activity->name }}</td>
                              			<td>{{ $activity->users->name}}</td>
                              			<td><small class="badge badge-success">{{ $activity->status }}</small></td>
                              			<td>{{ $activity->created_at }}</td>
                              			<td>
                              				<button class="btn btn-sm btn-custom">
                              					<a href="activity/{{ $activity->id }}/{{$activity->name}}">
                              						<span class="fa fa-eye"></span>
                              					</a>
                              			</button>
                              				<button class="btn btn-sm btn-custom">
                              					<a href="edit-activity/{{ $activity->id }}">
                              						<span class="fa fa-edit"></span>
                              					</a>
                              				</button>
                              			</td>
                              		</tr>
                              		@endforeach
                              	</tbody>
                              </table>
                          </div>
                          <div class="row d-flex justify-content-center pt-5">
			{{ $activities->links() }}
		</div>
                    </div>
                </div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	$('.add_activity_form').submit(function(e){
		e.preventDefault();
		var url = '{{ url('add-activity') }}';
		var activity_name = $('#activity_name').val();
		var activity_remark = $('#activity_remark').val();
		var add_activity_btn = $('#add_activity_btn').val();
		var admin_id = $('#admin_id').val();
		$.ajax({
			url: url,
			method: 'POST',
			data: {
				admin_id: admin_id,
				activity_name: activity_name,
				activity_remark: activity_remark,
				add_activity_btn: add_activity_btn
			},
			success:function(response){
				if (response.success) {
					$('.alert-error').fadeIn(500);
					$('.alert-error').css('background-color', '#28a745');
					$('.alert-error').html(response.message);
				}else{
					$('.alert-error').fadeIn(500);
					$('.alert-error').css('background-color', '#d62649');
					$('.alert-error').html(response.message);
				}
			}
		})
	})
})
</script>
@endsection