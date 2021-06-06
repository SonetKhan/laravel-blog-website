@extends('Layout.app')
@section('content')


<div class="container d-none" id="main-div-review" >
<div class="row">
<div class="col-md-12 p-5">
	<button id="add-review-data" class="btn btn-primary my-3  border-light">Add new reviews+</button>
<table id="review-table-id" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
      
	  <th class="th-sm">Name</th>
	  <th class="th-sm">Description</th>
	  <th class="th-sm">Image</th>
	  <th class="th-sm">Edit</th>
	  <th class="th-sm">Delete</th>
    </tr>
  </thead>
  <tbody id="review-table">
  
	
	
	
	
  </tbody>
</table>

</div>
</div>
</div>
<div id="loader-div-review" class="container">
   <div class="row">
      <div class="col-md-12 text-center p-5">
         <img class="loading-icon m-5" src="{{asset('images/loader.svg')}}">
      </div>
   </div>
</div>
<div id="wrong-div-review" class="container d-none">
   <div class="row">
      <div class="col-md-12 text-center p-5">
         <h6>Something went wrong</h6>
      </div>
   </div>
</div>

   <!-- ....................................... delete data modal..................... -->

	<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-body p-3 text-center">
            <h5 class="mt-4">Do you want to delete</h5>
            <h6 class="mt-4" id="delete-data" >
            </h6>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">NO</button>
            <button id="course-delete-confirm-btn" data-id="" type="button" class="btn btn-danger btn-sm">YES</button>
         </div>
      </div>
   </div>
</div>


<!-- ...................................Update modal........................... -->

<div class="modal fade" id="update-course-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Update course </h5>
        <h6 class="mt-4 d-none" id="update-data" >
            </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body  text-center">
       <div class="container">
       	<div class="row">
       		<div class="col-md-6">
             	<input id="review-update-name-id" type="text" class="form-control mb-3" placeholder="Review  Name">
          	 	<input id="review-update-des-id" type="text" class="form-control mb-3" placeholder="Review Description">     
     			<input id="review-update-img-id" type="text" class="form-control mb-3" placeholder="Review Image">
       		</div>
       	</div>
       </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
        <button  id="review-update-confirm-btn" type="button" class="btn  btn-sm  btn-danger">Save</button>
      </div>
    </div>
  </div>
</div>

<!-- ...................................add model.........................
 -->


<div class="modal fade" id="add-review-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Add New Review</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body  text-center">
       <div class="container">
       	<div class="row">
       		<div class="col-md-6">
             	<input id="review-name-id" type="text" class="form-control mb-3" placeholder="Review Name">
          	 	<input id="review-des-id" type="text" class="form-control mb-3" placeholder="Review Description">
     			<input id="review-img-id" type="text" class="form-control mb-3" placeholder="Review Image">
       		</div>
       	</div>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
        <button  id="review-add-confirm-btn" type="button" class="btn  btn-sm  btn-danger">Save</button>
      </div>
    </div>
  </div>
</div>

 @endsection

@section('script')

<script type="text/javascript">

	getReviewsData();

	</script>
@endsection