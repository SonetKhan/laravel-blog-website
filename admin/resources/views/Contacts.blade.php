@extends('Layout.app')
@section('content')

<div class="container d-none" id="main-div">
   <div class="row">
      <div class="col-md-12 p-5">
      	
         <table id="table-project" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>

               <tr>
                  <th class="th-sm">Contact's name</th>
                  <th class="th-sm">Mobile No: </th>
                  <th class="th-sm">Contact's Email</th>
                  <th class="th-sm">Contacts' Message</th>
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


<!-- //.....................delete modal.......................... -->

<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-body p-3 text-center">
            <h5 class="mt-4">Do you want to delete</h5>
            <h6 class="mt-4 d-none" id="delete-data" >
            </h5>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">NO</button>
            <button id="contact-delete-confirm-btn" data-id="" type="button" class="btn btn-danger btn-sm">YES</button>
         </div>
      </div>
   </div>
</div>

@endsection

@section('script')

<script> type="text/javascript">
   getContactsData();
</script>

@endsection