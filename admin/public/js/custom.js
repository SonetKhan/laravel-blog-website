function getContactsData() {
    axios.get('/getContactsData')
        .then(function(response) {
            if (response.status == 200) {

                $('#main-div').removeClass('d-none');
                $('#loader-div').addClass('d-none');
                  $('#table-project').DataTable().destroy();
                $('#project_table').empty();

                let dataJSON = response.data;

                $.each(dataJSON, function(i, item) {

                    $('<tr>').html(`

                        <td>${dataJSON[i].contact_name}</td>

                         <td>${dataJSON[i].contact_mobile}</td>

                         <td>${dataJSON[i].contact_email}</td>

                    <td>${dataJSON[i].contact_message}</td>

       

      

      <td> <a class= "contactsDeleteBtn" data-id = "${dataJSON[i].id}" ><i class="fas fa-trash-alt"></i></a></td>

      `).appendTo('#project_table');
                });



                //.....contacts delete icon click functionality......



                $('.contactsDeleteBtn').click(function(){

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


  $('#contact-delete-confirm-btn').click(function(){

               let id = $('#delete-data').html();
               
               contactDelete(id);
  });



function contactDelete(id){

  axios.post('/contactDelete',{
    id:id
  })
  .then(function(response){

    if(response.data==1){

      $('#delete-modal').modal('hide');

       toastr.success('delete success');
       getContactsData();

    }
    else{
      toastr.error("Data not deleted");
      $('#delete-modal').modal('hide');
      getContactsData();
    }

  })
  .catch(function(error){

     toastr.error("Data not deleted");
      $('#delete-modal').modal('hide');

  })

}