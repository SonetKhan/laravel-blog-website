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