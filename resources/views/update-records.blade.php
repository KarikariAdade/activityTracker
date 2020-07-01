@extends('layouts/app')
@section('content')
<div class="col-md-9">
	<form method="POST" action="{{ url('update-records') }}">
		<div class="bg-white row m-4 update-records-form">
			@csrf
			<div class="form-group col-md-3">
				<label>Status</label>
				<select class="form-control" id="filter_status">
					<option value="started">Started</option>
					<option value="pending">Pending</option>
					<option value="finished">Finished</option>
				</select>
			</div>
			<div class="form-group col-md-3">
				<label>Start Month</label>
				<select class="form-control" id="filter_month">
					<option value="{{ now()->format('m') }}">{{ now()->format('F') }}</option>
					<option value="01">January</option>
					<option value="02">February</option>
					<option value="03">March</option>
					<option value="04">April</option>
					<option value="05">May</option>
					<option value="06">June</option>
					<option value="07">July</option>
					<option value="08">August</option>
					<option value="09">September</option>
					<option value="10">October</option>
					<option value="11">November</option>
					<option value="12">December</option>
				</select>
			</div>
			<div class="form-group col-md-3">
				<label>End Month</label>
				<select class="form-control" id="end_month">
					<option value="01">January</option>
					<option value="02">February</option>
					<option value="03">March</option>
					<option value="04">April</option>
					<option value="05">May</option>
					<option value="06">June</option>
					<option value="07">July</option>
					<option value="08">August</option>
					<option value="09">September</option>
					<option value="10">October</option>
					<option value="11">November</option>
					<option value="12">December</option>
				</select>
			</div>
			<div class="col-md-2 text-center pt-3">
				<button class="btn btn-custom mt-4" type="submit">Filter</button>
			</div>
		</div>
	</form>
	<div class=" bg-white m-4">
		<div class="table-responsive">
			<table class="table table-striped table-hover" style="margin-top: 2% !important;">
				<thead>
					<tr>
						<th>Activity Name</th>
						<th>Status</th>
						<th>Created At:</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody class="result">
				</tbody>
			</table>
		</div>
	</div>
	<script type="text/javascript">

		$('form').submit(function(e){
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			e.preventDefault();
			var filter_status = $('#filter_status').val();
			var filter_month = $('#filter_month').val();
			var end_month = $('#end_month').val();
			var btn_primary = $('.btn-primary').val();
			var url = '{{ url('update-records') }}';
			$.ajax({
				url: url,
				method: 'POST',
				data:{
					filter_status: filter_status,
					filter_month: filter_month,
					end_month: end_month,
					btn_primary: btn_primary
				},
				success:function(data){
					if (data) {
						$(this).each(function(){
							$('.result').html(data);
						})
					}else{
						$('.result').html('No data was found');
					}
				}
			})
		})
	</script>
	@endsection