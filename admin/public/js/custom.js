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