@extends('_master')

@section('content')

	<h2>Run on {{ $run->date }}</h2>

	<div>
	Created: {{ $run->created_at }}
	</div>

	<div>
	Last Updated: {{ $run->updated_at }}
	</div>

	<div>
	Mileage: {{ $run->mileage }}
	</div>

	<div>
	Notes: {{ $run->notes }}
	</div>

	<div>
	Shoe: {{ Shoe::find($run->shoe_id)->name }}
	</div>

	{{---- Edit ----}}
	
	<br>

	<p><a class="btn btn-success" href='/run/{{ $run->id }}/edit'>Edit/Delete</a></p>

@stop