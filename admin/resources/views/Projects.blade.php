@extends('Layout.app')
@section('content')

<div class="container d-none" id="main-div">
   <div class="row">
      <div class="col-md-12 p-5">
      	<button id="add-data" class="btn btn-success my-3  border-light">Add new Projects+</button>
         <table id="table-project" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>

               <tr>
                  <th class="th-sm">Project name</th>
                  <th class="th-sm">project des</th>
                  <th class="th-sm">project link</th>
                  <th class="th-sm">project img</th>
                  <th class="th-sm">Edit</th>
                  <th class="th-sm">Delete</th>
               </tr>
            </thead>
            <tbody id="project_table">
            </tbody>
         </table>
      </div>
   </div>
</div>
<div id="loader-div" class="container">
   <div class="row">
      <div class="col-md-12 text-center p-5">
         <img class="loading-icon m-5" src="{{asset('images/loader.svg')}}">
      </div>
   </div>
</div>
<div id="wrong-div" class="container d-none">
   <div class="row">
      <div class="col-md-12 text-center p-5">
         <h6>Something went wrong</h6>
      </div>
   </div>
</div>
<!--  .....................................Edit modal ............... -->

<div class="modal fade" id="edit-project-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Update Projects: </h5>
        <h6 id="edit-data"> </h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body  text-center">
       <div class="container">
       	<div class="row">
       		<div class="col-md-6">
             	<input id="project-name" type="text" id="" class="form-control mb-3" placeholder="project name here">
          	 	<input id="project-desc" type="text" id="" class="form-control mb-3" placeholder="project description here">
    		 	<input id="project-link" type="text" id="" class="form-control mb-3" placeholder="project link here">
     			<input id="project-img" type="text" id="" class="form-control mb-3" placeholder="project image here">
       		</div>

       	</div>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
        <button  id="project-edit-confirm-btn" type="button" class="btn  btn-sm  btn-danger">Save</button>
      </div>
    </div>
  </div>
</div>

<!-- .....................................Delete Modal.................. -->

<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-body p-3 text-center">
            <h5 class="mt-4">Do you want to delete</h5>
            <h6 class="mt-4" id="delete-data" >
            </h5>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">NO</button>
            <button id="project-delete-confirm-btn" data-id="" type="button" class="btn btn-danger btn-sm">YES</button>
         </div>
      </div>
   </div>
</div>


<!-- ...........................................ADD MODAL.......................-->
<div class="modal fade" id="add-project-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Add Projects: </h5>
        <h6 id="edit-data"> </h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body  text-center">
       <div class="container">
       	<div class="row">
       		<div class="col-md-6">
             	<input id="project-name-add" type="text" id="" class="form-control mb-3" placeholder="project name here">
          	 	<input id="project-desc-add" type="text" id="" class="form-control mb-3" placeholder="project description here">
    		 	<input id="project-link-add" type="text" id="" class="form-control mb-3" placeholder="project link here">
     			<input id="project-img-add" type="text" id="" class="form-control mb-3" placeholder="project img here">
       		</div>

       	</div>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
        <button  id="project-add-confirm-btn" type="button" class="btn  btn-sm  btn-danger">Add+</button>
      </div>
    </div>
  </div>
</div>






 @endsection

@section('script')
<script type="text/javascript">
	getProjectsData();
	</script>
@endsection



