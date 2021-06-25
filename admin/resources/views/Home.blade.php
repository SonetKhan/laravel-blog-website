@extends('Layout.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-4 p-1">
			<div class="card" style="width: 18rem;">
			  
			  <div class="card-body">
			    <h5 class="card-title"></h5>

						<h2>{{$totalVisitor}}</h2>

			    		<h2>Total visitor</h2>
			    
			  </div>
			</div>
		</div>
		<div class="col-md-4 p-1">

			<div class="card" style="width: 18rem;">
			  
			  <div class="card-body">
			    <h5 class="card-title"></h5>

			    		<h2>{{$totalService}}</h2>
			    		<h2>Total services</h2>
			    
			  </div>
			</div>
		</div>
		<div class="col-md-4 p-1">
			<div class="card" style="width: 18rem;">
			  
			  <div class="card-body">
			   

			   			<h2>{{$totalReview}}</h2>
			    		<h2>Total projects</h2>
			    
			  </div>
			</div>
		</div>
	</div>
		<div class="row">
			<div class="col-md-4 p-1">
				<div class="card" style="width: 18rem;">
			  		<div class="card-body">

			 			<h2>{{$totalCourse}}</h2>
			 			<h2>Total courses</h2>
			    
			  </div>
			</div>
			</div>

			<div class="col-md-4 p-1">
				<div class="card" style="width: 18rem;">
			  		<div class="card-body">

			 			<h2>{{$totalContact}}</h2>
			 			<h2>Total contacts</h2>
			  </div>
			</div>
			</div>
				<div class="col-md-4 p-1">
				<div class="card" style="width: 18rem;">
			  		<div class="card-body">

			 			<h2>{{$totalReview}}</h2>
			 			<h2>Total reviews</h2>
			  </div>
			</div>
			</div>
		</div>
	</div>


@endsection