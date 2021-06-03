@extends('Layout.app')
@section('content')



<div class="container d-none" id="main-div-course" >
<div class="row">
<div class="col-md-12 p-5">
	<button id="add-course-data" class="btn btn-primary my-3  border-light">Add new courses+</button>
<table id="course-table" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
      
	  <th class="th-sm">Name</th>
	  <th class="th-sm">Fee</th>
	  <th class="th-sm">Class</th>
	  <th class="th-sm">Enroll</th>
	  <th class="th-sm">Details</th>
	  <th class="th-sm">Edit</th>
	  <th class="th-sm">Delete</th>
    </tr>
  </thead>
  <tbody id="courses-table">
  
	
	
	
	
  </tbody>
</table>

</div>
</div>
</div>
<div id="loader-div-course" class="container">
   <div class="row">
      <div class="col-md-12 text-center p-5">
         <img class="loading-icon m-5" src="{{asset('images/loader.svg')}}">
      </div>
   </div>
</div>
<div id="wrong-div-course" class="container d-none">
   <div class="row">
      <div class="col-md-12 text-center p-5">
         <h6>Something went wrong</h6>
      </div>
   </div>
</div>


<div class="modal fade" id="add-course-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Add New Course</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body  text-center">
       <div class="container">
       	<div class="row">
       		<div class="col-md-6">
             	<input id="course-name-id" type="text" class="form-control mb-3" placeholder="Course Name">
          	 	<input id="course-des-id" type="text" class="form-control mb-3" placeholder="Course Description">
    		 	<input id="course-fee-id" type="text" class="form-control mb-3" placeholder="Course Fee">
     			<input id="course-enroll-id" type="text" class="form-control mb-3" placeholder="Total Enroll">
       		</div>
       		<div class="col-md-6">
     			<input id="course-class-id" type="text" class="form-control mb-3" placeholder="Total Class">      
     			<input id="course-link-id" type="text" class="form-control mb-3" placeholder="Course Link">
     			<input id="course-img-id" type="text" class="form-control mb-3" placeholder="Course Image">
       		</div>
       	</div>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
        <button  id="course-add-confirm-btn" type="button" class="btn  btn-sm  btn-danger">Save</button>
      </div>
    </div>
  </div>
</div>


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
            <button id="course-delete-confirm-btn" data-id="" type="button" class="btn btn-danger btn-sm">YES</button>
         </div>
      </div>
   </div>
</div>



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
             	<input id="course-update-name-id" type="text" class="form-control mb-3" placeholder="Course Name">
          	 	<input id="course-update-des-id" type="text" class="form-control mb-3" placeholder="Course Description">
    		 	<input id="course-update-fee-id" type="text" class="form-control mb-3" placeholder="Course Fee">
     			<input id="course-update-enroll-id" type="text" class="form-control mb-3" placeholder="Total Enroll">
       		</div>
       		<div class="col-md-6">
     			<input id="course-update-class-id" type="text" class="form-control mb-3" placeholder="Total Class">      
     			<input id="course-update-link-id" type="text" class="form-control mb-3" placeholder="Course Link">
     			<input id="course-update-img-id" type="text" class="form-control mb-3" placeholder="Course Image">
       		</div>
       	</div>
       </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
        <button  id="course-update-confirm-btn" type="button" class="btn  btn-sm  btn-danger">Save</button>
      </div>
    </div>
  </div>
</div>


@endsection

@section('script')
<script type="text/javascript">
	getCoursesData();



	function getCoursesData() {
    axios.get('/getCoursesData')
        .then(function(response) {
            if (response.status == 200) {



                $('#main-div-course').removeClass('d-none');
                $('#loader-div-course').addClass('d-none');
                $('#course-table').DataTable().destroy();
                $('#courses-table').empty();

                let dataJSON = response.data;

                $.each(dataJSON, function(i, item) {

                    $('<tr>').html(`

                    	<td class="th-sm">${dataJSON[i].course_name}</td>

    	                <td class="th-sm">${dataJSON[i].course_fee}</td>

                          <td class="th-sm">${dataJSON[i].course_totalclass}</td>

                          <td class="th-sm">${dataJSON[i].course_totalenroll}</td>

                          <td class="td-sm"><a class="course-view-btn" data-id="${dataJSON[i].id}"><i class="fas fa-eye"></i></a></td>

                          <td  class="td-sm"><a class="course-edit-btn" data-id="${dataJSON[i].id}" ><i class="fas fa-edit"></i></a></td>

                          <td class="td-sm"> <a class="course-delete-btn" data-id="${dataJSON[i].id}"><i class="fas fa-trash-alt"></i></a></td>

    	`).appendTo('#courses-table');

                   

                    });
                //.........Course delete icon click........

                 $('.course-delete-btn').click(function(){

                    	let id = $(this).data('id');

                    	$('#delete-data').html(id);
                    	$('#delete-modal').modal('show');
                    	
                });

                 //.......Course update icon click.....

                 $('.course-edit-btn').click(function(){

                 	let id = $(this).data('id');

					$('#update-course-modal').modal('show');

					$('#update-data').html(id);

					getCourseDetails(id);


                 });
                
               
                      $('#course-table').DataTable({"order":false});
                      $('.dataTables_length').addClass('bs-select');



            } else {
                $('#wrong-div-course').removeClass('d-none');
                $('#loader-div-course').addClass('d-none');

            }


        }).catch(function(error) {
            $('#wrong-div-course').removeClass('d-none');
            $('#loader-div-course').addClass('d-none');

        });
}
//....................for add course...............

$('#add-course-data').click(function(){

	$('#add-course-modal').modal('show');
});

$('#course-add-confirm-btn').click(function(){

		let name = $('#course-name-id').val();

		let desc = $('#course-des-id').val();

		let fee = $('#course-fee-id').val();

		let enroll = $('#course-enroll-id').val();

		let total = $('#course-class-id').val();

		let link = $('#course-link-id').val();

		let  img = $('#course-img-id').val();

		getServiceAdd(name,desc,fee,enroll,total,link,img);

});

function getServiceAdd(course_name, course_des,course_fee,course_totalenroll,course_totalclass,course_link,course_img) {

    $('#course-add-confirm-btn').html("<div class='spinner-grow-sm text-secondary' role='status'></div>"); //animation
    console.log(course_name);
    console.log(course_des);
    console.log(course_fee);
    console.log(course_totalenroll);
    console.log(course_totalclass);
    console.log(course_link);
    console.log(course_img);


    if (course_name.length == 0)
     {
        toastr.error('course name required');
    } 
    else if (course_des.length == 0) 
    {
        toastr.error('course description required');
    } 
    else if (course_fee.length == 0) 
    {
        toastr.error('course fee required');
    } 
    else if (course_totalclass.length == 0) {
        toastr.error('course_totalclass is  required');
    }
    else if (course_totalenroll.length == 0)
     {
        toastr.error('course_totalenroll is  required');
    }
    else if(course_link.length=0)
    {
    	toastr.error('course link is  required');
    }
    else if(course_img.length=0)
    {
    	toastr.error('course image is  required');
    }
     else {
        axios.post('/coursesAdd', {

                course_name: course_name,
                course_des: course_des,
                course_fee: course_fee,
                course_totalclass: course_totalclass,
                course_totalenroll:course_totalenroll,
                course_link:course_link,
                course_img:course_img

            })
            .then(function(response) {

                $('#course-add-confirm-btn').html("add");

                if (response.status == 200) {


                    if (response.data == 1) {


                        $('#add-course-modal').modal('hide');
                        toastr.success('Add success');
                        getCoursesData();

                    } else {

                        $('#add-course-modal').modal('hide');
                        toastr.error('Add failed');
                       getCoursesData();


                    }

                } else {

                    $('#add-course-modal').modal('hide');

                    toastr.error('Something went wrong');

                }




            })
            .catch(function(error) {

                $('#add-course-modal').modal('hide');

                toastr.error('Something went wrong');
            });

    }

}

//...............For delete course .......



$('#course-delete-confirm-btn').click(function() {

    let id = $('#delete-data').html();


    getCoursesDelete(id);

});


function getCoursesDelete(deleteId) {

    $('#course-delete-confirm-btn').html("<div class='spinner-grow text-secondary' role='status'></div>"); //animation



    axios.post('/coursesDelete', {
            id: deleteId
        })
        .then(function(response) {

        		$('#course-delete-confirm-btn').html("yes");

            if (response.data == 1) {

                $('#delete-modal').modal('hide');
                toastr.success('delete success');
                getCoursesData();

            } else {

                $('#delete-modal').modal('hide');
                toastr.error('delete failed');
                getCoursesData();

            }

        })
        .catch(function(error) {

           $('#delete-modal').modal('hide');
            toastr.error('delete failed');
        });

}
///..............Course details by each id ........

	function getCourseDetails(detailsId){

		axios.post('/coursesDetails',{
			id:detailsId
		})
		.then(function(response){

			

			let jsonData = response.data[0];

			let id =jsonData.id;

			let name = jsonData.course_name;

			let desc = jsonData.course_des;

			let fee = jsonData.course_fee;

			let img = jsonData.course_img;

			let link = jsonData.course_link;

			let totalClass = jsonData.course_totalclass;

			let totalEnroll = jsonData.course_totalenroll;

			$('#course-update-name-id').val(name);

			$('#course-update-des-id').val(desc);

			$('#course-update-fee-id').val(fee);

			$('#course-update-enroll-id').val(totalEnroll);

			$('#course-update-class-id').val(totalClass);

			$('#course-update-link-id').val(link);

			$('#course-update-img-id').val(img);



		})
		.catch(function(error){

		})



	}

	///..........Course updation by unique id value........
			$('#course-update-confirm-btn').click(function(){

				let id = $('#update-data').html();

				let name = $('#course-update-name-id').val();

			     let desc = $('#course-update-des-id').val();

			      let fee = $('#course-update-fee-id').val();

			     let totalEnroll = $('#course-update-enroll-id').val();

			      let totalClass = $('#course-update-class-id').val();

			     let link = $('#course-update-link-id').val();

			     let img = $('#course-update-img-id').val();
			     	getCourseUpdate(id,name,desc,fee,totalEnroll,totalClass,link,img);

			});
	function getCourseUpdate(id,name,desc,fee,totalEnroll,totalClass,link,img){
		$('#course-delete-confirm-btn').html("<div class='spinner-grow text-secondary' role='status'></div>");

		if(name.length==0){
			toastr.error("Name is empty");
		}
		else if(desc.length==0){

			toastr.error("description is empty");

		}
		else if(fee.length==0){

			toastr.error("fee is empty");

		}
		else if(totalEnroll.length==0){

			toastr.error("totalEnroll is empty");

		}
		else if(totalClass.length==0){

			toastr.error("totalClass is empty");

		}
		else if(link.length==0){

			toastr.error("link is empty");

		}
		else if(img.length==0){

			toastr.error("img is empty");

		}else{
			 
			axios.post('/coursesUpdate',{

			   id:id,

			course_name:name,
			course_des : desc,
			course_fee: fee,
			course_totalenroll: totalEnroll,
			course_totalclass: totalClass,
			course_link : link,
			course_img: img
		})
		.then(function(response){

			if(response.status==200){
				 $('#course-delete-confirm-btn').html("Save");
			

			if(response.data==1){
				$('#update-course-modal').modal('hide');
				toastr.success('data update success');
				getCoursesData();

			}else{
				$('#update-course-modal').modal('hide');
				toastr.error('data update Failed');
				getCoursesData();

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



		
</script>
@endsection