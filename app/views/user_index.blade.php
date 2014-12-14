@extends('_master')

@section('content')

<h2>{{ Auth::user()->first_name }}'s Activity</h2>

@if ($runs->isEmpty())

	<p>You haven't <a href="run/create">logged any runs</a> yet.</p>

@else

	<h3>Recent runs:</h3>

	<table>
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
					<a class="btn btn-success" href='/run/{{ $run->id }}'>View</a>&nbsp;
					<a class="btn btn-warning" href='/run/{{ $run->id }}/edit'>Edit/Delete</a>
				</td>	
			</tr>

		@endforeach

	</table>

	<br>

@endif

<p><a class="btn btn-primary" href='/run/create'>+ Add run</a></p>

@if ($shoes->isEmpty())

	<p>You haven't <a href="shoe/create">added any shoes</a> yet.</p>

@else

	<h3>Recently used shoes:</h3>

	<table>
		<tr>
			<th>Shoe Name</th>
			<th>Total Mileage</th>
			<th>Purchase Date</th>
			<th>Actions</th>
		</tr>

		@foreach($shoes as $shoe)
		
			<tr>
				<td><a href='/shoe/{{ $shoe->id }}'>{{ $shoe->name }}</a></td>
				<td>{{ $shoe->mileage }}</td>
				<td>{{ $shoe->purchase_date }}</td>
				<td>
					<a class="btn btn-success" href='/shoe/{{ $shoe->id }}'>View</a>&nbsp;
					<a class="btn btn-warning" href='/shoe/{{ $shoe->id }}/edit'>Edit/Delete</a>
				</td>	
			</tr>

		@endforeach

	</table>

	<br>

@endif

<p><a class="btn btn-primary" href='/shoe/create'>+ Add shoes</a></p>

@stop