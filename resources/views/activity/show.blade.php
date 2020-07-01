@extends('layouts/app')
@section('content')
<div class="col-md-9">
	<div class="row">
		<div class="col-md-6">
			<div class="sidebar-stats text-center bg-white mb-2">
				<h5>Activity Made By:</h5>
    				<h4><strong>Karikari Adade</strong></h4>
    			</div>
    		</div>
    			<div class="col-md-6">
    			<div class="sidebar-stats bg-white">
				<h3>Activity Stats</h3>
    				<p>Activity Name: <span style="float: right;">{{ $activity->name }}</span></p>
    				<p>Activity Status: <span style="float: right;"><small class="badge badge-success">{{ $activity->status }}</small></span></p>
    				<p>Date Created: <span style="float: right;">{{ $activity->created_at->format('d/m/Y') }}</span></p>
    				<p>Total Updates: <span style="float: right;">{{ count($activity_updates) }}</span></p>
    			</div>
		</div>
		<div class="col-md-12 mt-5">
			<h2 class="text-center">Today's Updates  ({{ now()->format('l M d, Y') }})</h2>
			<div class="row">
			@foreach($activity_updates as $activity_update)
			<div class="col-md-6">
						<div class="profile-widget card">
							<p>Update By: <span style="float: right;">Karikari Adade</span></p>
							<p>Update Status: <span style="float: right;"><small class="badge badge-success">{{ $activity_update->update_status }}</small></span></p>
							<p>Update Time <span style="float: right;">{{ $activity_update->created_at->format('h:ia') }}</span></p>
							<h5 align="center" class="pt-4 pb-2">Update Remark</h5>
							<p>{{ $activity_update->update_remark }}</p>
						</div>
					</div>
					@endforeach
				</div>
		</div>
		</div>
	</div>
</div>
@endsection