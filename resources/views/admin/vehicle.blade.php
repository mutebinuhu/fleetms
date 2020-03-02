@extends('layouts.application')
		<div class="card">
			<div class="card-header">{{$vehicle->reg_no}}</div>
			<div class="card-body">
				<div class="card-text">
					<label>Reg no:</label>
					<strong>{{$vehicle->reg_no}}</strong>
					<hr>
					<label>Make:</label>
					<strong>{{$vehicle->make}}</strong>
					<hr>
					<label>Type:</label>
					<strong>{{$vehicle->type}}</strong>
					<hr>
					<label>Mileage:</label>
					<strong>{{$vehicle->mileage}}</strong>
					<hr>
					<label>Year:</label>
					<strong>{{$vehicle->year}}</strong>
					<hr>
					<label>Added on:</label>
					<strong>{{$vehicle->created_at}}</strong>
					<hr>	
				</div>
			</div>
		</div>
	<a class="btn btn-primary" href="{{url('/admin')}}">Back</a>
	</div>
@section('sidebar')
@endsection