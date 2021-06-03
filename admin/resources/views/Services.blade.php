@extends('Layout.app')
@section('content')
<div class="container d-none" id="main-div">
   <div class="row">
      <div class="col-md-12 p-5">
      	<button id="addData" class="btn btn-success my-3  border-light">Add new service+</button>
         <table id="table-service" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>

               <tr>
                  <th class="th-sm">Image</th>
                  <th class="th-sm">Name</th>
                  <th class="th-sm">Description</th>
                  <th class="th-sm">Edit</th>
                  <th class="th-sm">Delete</th>
               </tr>
            </thead>
            <tbody id="service_table">
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


<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-body p-3 text-center">
            <h5 class="mt-4">Do you want to delete</h5>
            <h6 class="mt-4 d-none" id="deleteData" >
            </h5>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">NO</button>
            <button id="serviceDeleteConfirmBtn" data-id="" type="button" class="btn btn-danger btn-sm">YES</button>
         </div>
      </div>
   </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-body p-3 text-center">
            <h5 class="mt-4">Do you want to edit</h5>
            <h6 class="mt-4 d-none" id="editData" >
            </h6>
            <div id="service-edit-form" class="w-100 d-none">
               <div class="form-group">
                  <label for="image">Image upload here: </label>
                  <input type="text" class="form-control" id="image">
               </div>
               <div class="form-group">
                  <label for="name">Name: </label>
                  <input type="text" class="form-control" id="name">
               </div>
               <div class="form-group">
                  <label for="desc">Description: </label>
                  <input type="text" class="form-control" id="desc">
               </div>
            </div>
            <img id="loader-success" class="loading-icon m-5" src="{{asset('images/loader.svg')}}">
            <h6 id="loader-wrong" class="d-none">Something went wrong</h6>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Cancel</button>
            <button id="serviceEditConfirmBtn" data-id="" type="button" class="btn btn-danger btn-sm">Save</button>
         </div>
      </div>
   </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="add-modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-body">

      	<h6 class="text-success my-4">Add new services: </h6>

        <input id="service-name" type="text" class="form-control mb-1"  placeholder="service name here">

        <input id="service-desc" type="text" class="form-control mb-1" placeholder="service description here">

        <input id="service-img" type="text" class="form-control mb-1" i placeholder="Image link here">

      </div>
      <div class="modal-footer">
        <button id="add-confirm-button" type="button" class="btn btn-primary btn-sm">Add Data</button>
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
   getServicesData();

   function getServicesData() {
    axios.get('/getServicesData')
        .then(function(response) {
            if (response.status == 200) {


                

                $('#main-div').removeClass('d-none');
                $('#loader-div').addClass('d-none');
                  $('#table-service').DataTable().destroy();
                $('#service_table').empty();

                let dataJSON = response.data;
                $.each(dataJSON, function(i, item) {
                    $('<tr>').html(`<td><img src="${dataJSON[i].service_img}" alt="img not found"/></td>
    	<td>${dataJSON[i].service_name}</td><td>${dataJSON[i].service_des}</td>
    	<td><a class= "serviceEditBtn" data-id = "${dataJSON[i].id}"><i class="fas fa-edit"></a></i></td>
    	<td> <a class= "serviceDeleteBtn" data-id = "${dataJSON[i].id}" ><i class="fas fa-trash-alt"></i></a></td>
    	`).appendTo('#service_table');
                });
                // Services table delete icon click
                $('.serviceDeleteBtn').click(function() {
                    let id = $(this).data('id');
                    $('#deleteData').html(id);
                    $('#deleteModal').modal('show');
                });

                // Service table edit icon click
                $('.serviceEditBtn').click(function() {



                    let id = $(this).data('id');

                    $('#editData').html(id);
                    ServiceUpdateDetails(id);

                    $('#editModal').modal('show');


                });


                  $('#table-service').DataTable({"order":false});
                  $('.dataTables_length').addClass('bs-select');

            } else {
                $('#wrong-div').removeClass('d-none');
                $('#loader-div').addClass('d-none');

            }


        }).catch(function(error) {
            $('#wrong-div').removeClass('d-none');
            $('#loader-div').addClass('d-none');

        });
}


//............ Services Delete Modal Yes Btn............

$('#serviceDeleteConfirmBtn').click(function() {

    let id = $('#deleteData').html();

    getServiceDelete(id);

});

function getServiceDelete(deleteId) {

    $('#serviceDeleteConfirmBtn').html("<div class='spinner-grow text-secondary' role='status'></div>"); //animation



    axios.post('/servicesDelete', {
            id: deleteId
        })
        .then(function(response) {

        		$('#serviceDeleteConfirmBtn').html("yes");

            if (response.data == 1) {

                $('#deleteModal').modal('hide');
                toastr.success('delete success');
                getServicesData();

            } else {

                $('#deleteModal').modal('hide');
                toastr.error('delete failed');
                getServicesData();

            }

        })
        .catch(function(error) {

           $('#deleteModal').modal('hide');
            toastr.error('delete failed');
        });

}


//..................... Services edit Modal Save Btn..............

$('#serviceEditConfirmBtn').click(function() {



    let id = $('#editData').html();
    let name = $('#name').val();
    let desc = $('#desc').val();
    let img = $('#image').val();
    // console.log(id);
    // console.log(name);
    // console.log(desc);
    // console.log(img );



    getServiceUpdate(id, name, desc, img);

});


// ...............Each service Update details show in modal...........
function ServiceUpdateDetails(detailsId) {



    axios.post('/servicesDetails', {
            id: detailsId
        })
        .then(function(response) {

            $('#serviceEditConfirmBtn').html("Save");


            if (response.status == 200) {

                $('#service-edit-form').removeClass('d-none');

                $('#loader-success').addClass('d-none');



                let dataJSON = response.data;


                $('#name').val(dataJSON[0].service_name);

                $('#desc').val(dataJSON[0].service_des);

                $('#image').val(dataJSON[0].service_img);



            } else {
                $('#loader-success').addClass('d-none');
                $('#loader-wrong').removeClass('d-none');


            }



        })
        .catch(function(error) {
            $('#loader-success').addClass('d-none');
            $('#loader-wrong').removeClass('d-none');


        });

}

//..................... Service updation here using axios call...............

function getServiceUpdate(serviceId, serviceName, serviceDesc, serviceImg) {

    $('#serviceEditConfirmBtn').html("<div class='spinner-grow-sm text-secondary' role='status'></div>"); //animation

    console.log(serviceId);
    console.log(serviceName);
    console.log(serviceDesc);
    console.log(serviceImg);
    if (serviceId.length == 0) {

    } else if (serviceName.length == 0) {
        toastr.error('service name required');
    } else if (serviceDesc.length == 0) {
        toastr.error('service description required');
    } else if (serviceImg.length == 0) {
        toastr.error('image is  required');
    } else {
        axios.post('/servicesUpdate', {
                id: serviceId,
                service_name: serviceName,
                service_des: serviceDesc,
                service_img: serviceImg
            })
            .then(function(response) {

                $('#serviceDeleteConfirmBtn').html("yes");

                if (response.status == 200) {

                    if (response.data == 1) {


                        $('#editModal').modal('hide');
                        toastr.success('Update success');
                        getServicesData();

                    } else {

                        $('#editModal').modal('hide');
                        toastr.error('updatefailed');
                        getServicesData();


                    }

                } else {

                    $('#editModal').modal('hide');

                    toastr.error('Something went wrong');

                }




            })
            .catch(function(error) {

                $('#editModal').modal('hide');

                toastr.error('Something went wrong');
            });

    }

}

//..................Add data................


$('#addData').click(function() {

    $('#add-modal').modal('show');


});
$('#add-confirm-button').click(function() {

    let name = $('#service-name').val();
    let desc = $('#service-desc').val();
    let img = $('#service-img').val();

    getServiceAdd(name, desc, img);

});

function getServiceAdd(serviceName, serviceDesc, serviceImg) {

    $('#add-confirm-button').html("<div class='spinner-grow-sm text-secondary' role='status'></div>"); //animation
    console.log(serviceName);
    console.log(serviceDesc);
    console.log(serviceImg);


    if (serviceName.length == 0) {
        toastr.error('service name required');
    } else if (serviceDesc.length == 0) {
        toastr.error('service description required');
    } else if (serviceImg.length == 0) {
        toastr.error('image is  required');
    } else {
        axios.post('/servicesAdd', {

                service_name: serviceName,
                service_des: serviceDesc,
                service_img: serviceImg
            })
            .then(function(response) {

                $('#add-confirm-button').html("Add");

                if (response.status == 200) {

                    if (response.data == 1) {


                        $('#add-modal').modal('hide');
                        toastr.success('Add success');
                        getServicesData();

                    } else {

                        $('#add-modal').modal('hide');
                        toastr.error('Add failed');
                        getServicesData();


                    }

                } else {

                    $('#add-modal').modal('hide');

                    toastr.error('Something went wrong');

                }




            })
            .catch(function(error) {

                $('#add-modal').modal('hide');

                toastr.error('Something went wrong');
            });

    }

}
</script>
@endsection