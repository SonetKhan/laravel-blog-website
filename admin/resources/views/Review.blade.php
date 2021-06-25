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


	function getReviewsData() {

  axios.get('/getReviewsData')

  .then(function(response){

          if(response.status==200){

            $('#main-div-review').removeClass('d-none');

                $('#loader-div-review').addClass('d-none');

                // $('#review-table').DataTable().destroy();

                $('#review-table-id').DataTable().destroy();
                
                $('#review-table').empty();


                let dataJSON = response.data;
                

                $.each(dataJSON, function(i, item) {

                    $('<tr>').html(`

                      <td class="th-sm">${dataJSON[i].name}</td>

                      <td class="th-sm">${dataJSON[i].des}</td>
                      <td><img src="${dataJSON[i].img}" class="img" alt="image not found" /></td>

                      <td  class="td-sm"><a class="review-edit-btn" data-id="${dataJSON[i].id}" ><i class="fas fa-edit"></i></a></td>

                      <td class="td-sm"> <a class="review-delete-btn" data-id="${dataJSON[i].id}"><i class="fas fa-trash-alt"></i></a></td>

      `).appendTo('#review-table');




          })

                //.......delete btn icon........

                $('.review-delete-btn').click(function(){

                    let id = $(this).data('id');

                    $('#delete-modal').modal('show');

                    $('#delete-data').html(id);
                });

                //.........Course update icon click.....

                    $('.review-edit-btn').click(function(){

                        let id = $(this).data('id');

                    $('#update-course-modal').modal('show');

                    $('#update-data').html(id);

                    getReviewDetails(id);

                    });


              
                
                  $('#review-table-id').DataTable();
                  $('.dataTables_length').addClass('bs-select');

        }
        else{

          $('#wrong-div-review').removeClass('d-none');

          $('#loader-div-review').addClass('d-none');
        }


    
  })
  .catch(function(error){
    console.log(error);
  })

    }
   ////.............................Confirm delete button..................................//

   $('#course-delete-confirm-btn').click(function(){

        let id = $('#delete-data').html();
        console.log(id);

        deleteData(id);

        getReviewsData();


   });


   function deleteData(id){

    axios.post('/reviewDelete',{
      id:id
    })
    .then(function(response){

      if(response.data == 1){

        

        $('#delete-modal').modal('hide');

        toastr.success("Data delete successfull");
      }
      else{
        $('#delete-modal').modal('hide');

        toastr.error("Data delete not successfull");
         
      }

    })
    .catch(function(error){

    })

   }
// ......................................Confirm update..............



    function getReviewDetails(detailsId){

    axios.post('/reviewDetails',{
      id:detailsId
    })
    .then(function(response){

      

      let jsonData = response.data[0];

      let id =jsonData.id;

      let name = jsonData.name;

      let desc = jsonData.des;

      let img = jsonData.img;

      $('#review-update-name-id').val(name);

      $('#review-update-des-id').val(desc);

      $('#review-update-img-id').val(img);



    })
    .catch(function(error){

    })



  }

 $('#review-update-confirm-btn').click(function(){

        let id =  $('#update-data').html();

        let name = $('#review-update-name-id').val();

           let desc = $('#review-update-des-id').val();

           let img = $('#review-update-img-id').val();
            getReviewsUpdate(id,name,desc,img);

      });
   function getReviewsUpdate(id,name,desc,img){

    console.log(name);
    console.log(desc);
    console.log(img);

      $('#review-delete-confirm-btn').html("<div class='spinner-grow text-secondary' role='status'></div>");

    if(name.length==0){
      toastr.error("Name is empty");
    }
    else if(desc.length==0){

      toastr.error("description is empty");

    }
  
    
    
    else if(img.length==0){

      toastr.error("img is empty");

    }else{
       
      axios.post('/reviewsUpdate',{

         id:id,

      name:name,
      des : desc,
      img: img
    })
    .then(function(response){

      if(response.status==200){
         $('#review-delete-confirm-btn').html("Save");
      

      if(response.data==1){
        $('#update-course-modal').modal('hide');
        toastr.success('data update success');
        getReviewsData();

      }else{
        $('#update-course-modal').modal('hide');
        toastr.error('data update Failed');
        getReviewsData();

      }
    }else{

      $('#update-course-modal').modal('hide');

      toastr.error("Something went wrong");
    }

    })

    .catch(function(error){

    })

  }

    }

   //............add data......

   $('#add-review-data').click(function(){

  $('#add-review-modal').modal('show');
});

$('#review-add-confirm-btn').click(function(){

    let name = $('#review-name-id').val();

    let desc = $('#review-des-id').val();

    let  img = $('#review-img-id').val();

    getReviewAdd(name,desc,img);

});

function getReviewAdd(name,desc,img) {

    $('#review-add-confirm-btn').html("<div class='spinner-grow-sm text-secondary' role='status'></div>"); //animation
    console.log(name);
    console.log(desc);
    console.log(img);
   


    if (name.length == 0)
     {
        toastr.error('course name required');
    } 
    else if (desc.length == 0) 
    {
        toastr.error('course description required');
    } 
    else if (img.length == 0) 
    {
        toastr.error('course fee required');
    } 
    
     else {
        axios.post('/reviewAdd', {

                name: name,
                des: desc,
                img:img

            })
            .then(function(response) {

                $('#review-add-confirm-btn').html("add");

                if (response.status == 200) {


                    if (response.data == 1) {


                        $('#add-review-modal').modal('hide');
                        toastr.success('Add success');
                        getReviewsData();

                    } else {

                        $('#add-review-modal').modal('hide');
                        toastr.error('Add failed');
                       getReviewsData();


                    }

                } else {

                    $('#add-review-modal').modal('hide');

                    toastr.error('Something went wrong');

                }




            })
            .catch(function(error) {

                $('#add-review-modal').modal('hide');

                toastr.error('Something went wrong');
            });

    }

}

	</script>
@endsection