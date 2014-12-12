@extends('_master')

@section('content')

<h2>{{ Auth::user()->first_name }}'s Shoes</h2>

<p><a class="btn btn-primary" href='/shoe/create'>+ Add shoes</a></p>

@if ($shoes->isEmpty())

	<p>You haven't <a href="shoe/create">added any shoes</a> yet.</p>

@else

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

@endif

@stop