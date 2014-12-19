@extends('_master')

@section('content')

	<h2>{{ $shoe->name }}</h2>

	<div class="row">
		<div class="col-md-2 heading">Purchase Date:</div>
		<div class="col-md-10">{{ $shoe->purchase_date }}</div>
	</div>

	<div class="row">
		<div class="col-md-2 heading">Mileage:</div>
		<div class="col-md-10">{{ $shoe->mileage }}</div>
	</div>

	<div class="row">
		<div class="col-md-2 heading">Created:</div>
		<div class="col-md-10">{{ $shoe->created_at }}</div>
	</div>

	<div class="row">
		<div class="col-md-2 heading">Last Updated:</div>
		<div class="col-md-10">{{ $shoe->updated_at }}</div>
	</div>

	<br>

	{{---- Edit ----}}
	<p><a class="btn btn-success" href='/shoe/{{ $shoe->id }}/edit'>Edit/Delete</a></p>

	<br />

@if ($runs->isEmpty())

	<p>You haven't <a href="run/create">logged any runs</a> in these shoes yet.</p>

@else

	<h3>Recent runs in these shoes:</h3>

	<div class="table-responsive">
		<table class="table table-striped table-bordered">
			<tr>
				<th>Run Date</th>
				<th>Mileage</th>
				<th>Shoe</th>
				<th>Actions</th>
			</tr>

			@foreach($runs as $run)
			
				<tr>
					<td><a href='/run/{{ $run->id }}'>{{ $run->date }}</a></td>
					<td>{{ $run->mileage }}</td>
					<td><a href="/shoe/{{ $shoe->id }}">{{ $shoe->name }}</a></td>
					<td>
						<a class="btn btn-info" href='/run/{{ $run->id }}'>View</a>&nbsp;
						<a class="btn btn-success" href='/run/{{ $run->id }}/edit'>Edit/Delete</a>
					</td>	
				</tr>

			@endforeach

		</table>
	</div>

@endif

@stop