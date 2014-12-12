@extends('_master')

@section('content')

	<h2>Shoe: {{ $shoe->name }}</h2>

	<div>
	Created: {{ $shoe->created_at }}
	</div>

	<div>
	Last Updated: {{ $shoe->updated_at }}
	</div>

	<div>
	Purchase Date: {{ $shoe->purchase_date }}
	</div>

	<div>
	Mileage: {{ $shoe->mileage }}
	</div>

	<br>

	{{---- Edit ----}}
	<p><a class="btn btn-warning" href='/shoe/{{ $shoe->id }}/edit'>Edit/Delete</a></p>

	<br />

@if ($runs->isEmpty())

	<p>You haven't <a href="run/create">logged any runs</a> in these shoes yet.</p>

@else

	<h3>Recent runs in these shoes:</h3>

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
				<td><a href="/shoe/{{ Shoe::find($run->shoe_id)->id }}">{{ Shoe::find($run->shoe_id)->name }}</a></td>
				<td>
					<a class="btn btn-success" href='/run/{{ $run->id }}'>View</a>&nbsp;
					<a class="btn btn-warning" href='/run/{{ $run->id }}/edit'>Edit/Delete</a>
				</td>	
			</tr>

		@endforeach

	</table>

@endif

@stop