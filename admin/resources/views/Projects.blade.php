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

  function getProjectsData() {
    axios.get('/getProjectsData')
        .then(function(response) {
            if (response.status == 200) {

                $('#main-div').removeClass('d-none');
                $('#loader-div').addClass('d-none');
                  $('#table-project').DataTable().destroy();
                $('#project_table').empty();

                let dataJSON = response.data;

                $.each(dataJSON, function(i, item) {

                    $('<tr>').html(`

                        <td>${dataJSON[i].project_name}</td>

                         <td>${dataJSON[i].project_des}</td>

                         <td>${dataJSON[i].project_des}</td>

                    <td><img src="${dataJSON[i].project_img}" alt="" height="100px" width="100px"/></td>

       

      <td><a class= "projectEditBtn" data-id = "${dataJSON[i].id}"><i class="fas fa-edit"></a></i></td>

      <td> <a class= "projectDeleteBtn" data-id = "${dataJSON[i].id}" ><i class="fas fa-trash-alt"></i></a></td>

      `).appendTo('#project_table');
                });



                //...project edit click functionality...





                $(".projectEditBtn").click(function(){

                    let id = $(this).data('id');

                       $('#edit-data').html(id);


                    $('#edit-project-modal').modal('show');

                    projectUpdateDetails(id);
                    
                });


                //.....project delete icon click functionality......



                $('.projectDeleteBtn').click(function(){

                    let id = $(this).data('id');

                       $('#delete-modal').modal('show');

                       $('#delete-data').html(id);

                });
                
                  $('#table-project').DataTable({"order":false});
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

 


                   // ...............Each project details show in modal...........




function projectUpdateDetails(detailsId) {
    



    axios.post('/projectDetails', {
            id: detailsId
        })
        .then(function(response) {

            // $('#serviceEditConfirmBtn').html("Save");


            if (response.status == 200) {

                // $('#service-edit-form').removeClass('d-none');

                // $('#loader-success').addClass('d-none');



                let dataJSON = response.data;


                $('#project-name').val(dataJSON[0].project_name);

                $('#project-desc').val(dataJSON[0].project_des);

                $('#project-link').val(dataJSON[0].project_link);

                $('#project-img').val(dataJSON[0].project_img);



            } else {
                // $('#loader-success').addClass('d-none');
                // $('#loader-wrong').removeClass('d-none');


            }



        })
        .catch(function(error) {
            // $('#loader-success').addClass('d-none');
            // $('#loader-wrong').removeClass('d-none');


        });

}

                            ////........Confrim update here ..............


$('#project-edit-confirm-btn').click(function(){

                 let id = $('#edit-data').html();

               let name = $('#project-name').val();

              let desc = $('#project-desc').val();

              let link =  $('#project-link').val();

              let img = $('#project-img').val();

              getProjectUpdate(id,name,desc,link, img);
});

function getProjectUpdate(id,name, desc, link, img) {

    // $('#serviceEditConfirmBtn').html("<div class='spinner-grow-sm text-secondary' role='status'></div>"); //animation
    console.log(id);
    console.log(name);
    console.log(desc);
    console.log(link);
    console.log(img);

 if (name.length == 0) {

        toastr.error('name is required');

    } else if (desc.length == 0) {

        toastr.error('description is required');

    } else if (link.length == 0) {

        toastr.error('link is  required');

    }else if(img.length==0){

         toastr.error('image is  required')
    }
     else {
        axios.post('/projectsUpdate', {
                id: id,
                project_name: name,
                project_des: desc,
                project_link: link,
                project_img:img
            })
            .then(function(response) {

                // $('#serviceDeleteConfirmBtn').html("yes");

                if (response.status == 200) {

                    if (response.data == 1) {


                        $('#edit-project-modal').modal('hide');
                        toastr.success('Update success');
                        getProjectsData();

                    } else {

                        $('#edit-project-modal').modal('hide');
                        toastr.error('updatefailed');
                        getProjectsData();


                    }

                } else {

                    $('#edit-project-modal').modal('hide');

                    toastr.error('Something went wrong');

                }




            })
            .catch(function(error) {

                $('#editModal').modal('hide');

                toastr.error('Something went wrong');
            });

    }

}


                      ///......Project delete confim............



    $('#project-delete-confirm-btn').click(function(){

                let id = $('#delete-data').html();

                getProjectDelete(id);

              
    });

    function getProjectDelete(deleteId) {

    // $('#serviceDeleteConfirmBtn').html("<div class='spinner-grow text-secondary' role='status'></div>"); //animation



    axios.post('/projectDelete', {
            id: deleteId
        })
        .then(function(response) {

                // $('#serviceDeleteConfirmBtn').html("yes");

            if (response.data == 1) {

                $('#delete-modal').modal('hide');
                toastr.success('delete success');

                getProjectsData();

            } else {

                $('#delete-modal').modal('hide');

                toastr.error('delete failed');

                getProjectsData();

            }

        })
        .catch(function(error) {

           $('#deleteModal').modal('hide');
            toastr.error('delete failed');
        });

}



//....................................Add Data.....................///

$('#add-data').click(function(){

    $('#add-project-modal').modal('show');

            
});
$('#project-add-confirm-btn').click(function(){

    console.log('clicked');  

           let name = $('#project-name-add').val();

            let desc = $('#project-desc-add').val();

            let link = $('#project-link-add').val();

             let img =  $('#project-img-add').val();

             getProjectAdd(name, desc, link, img );

             
});

function getProjectAdd(name, desc, link, img ) {

    // $('#add-confirm-button').html("<div class='spinner-grow-sm text-secondary' role='status'></div>"); //animation
    console.log(name);
    console.log(desc);
    console.log(link);
    console.log(img);


    if (name.length == 0) {
        toastr.error('name is required');
    } else if (desc.length == 0) {
        toastr.error('description is required');
    } else if (link.length == 0) {
        toastr.error('link is  required');
    } else if(img.length==0){
        toastr.error('image is  required');

    }else {
        axios.post('/projectAdd', {

                project_name: name,
                project_des: desc,
                project_link: link,
                project_img: img
            })
            .then(function(response) {

                // $('#add-confirm-button').html("Add");

                if (response.status == 200) {

                    if (response.data == 1) {


                        $('#add-project-modal').modal('hide');
                        toastr.success('Add success');
                        getProjectsData();

                    } else {

                        $('#add-project-modal').modal('hide');
                        toastr.error('Add failed');
                       getProjectsData();


                    }

                } else {

                    $('#add-project-modal').modal('hide');

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



