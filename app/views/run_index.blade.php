@extends('_master')

@section('content')

<h2>{{ Auth::user()->first_name }}'s Runs</h2>

<br>

<p><a class="btn btn-primary" href='/run/create'>+ Add run</a></p>

@if ($runs->isEmpty())

	<p>You haven't <a href="run/create">logged any runs</a> yet.</p>

@else

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
					<td><a href="/shoe/{{ $run->shoe->id }}">{{ $run->shoe->name }}</a></td>
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