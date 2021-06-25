@extends('Layout.app')

@section('title','Gallery')

@section('content')
    <button id="add-photo-data" class="btn btn-primary my-3  border-light">Add new photos+</button>
<div class="container">
    <div class="row photo-row">
{{--        <div class="col-md-3 p-1">--}}
{{--            <img class="image-on-row" src="http://127.0.0.1:8000/storage/oIbuIvfXTM0x8apzoUNVHus5ck6v2UxuxVKJTZML.jpg" />--}}
{{--        </div>--}}


    </div>
    <button id="load-more" class="btn btn-sm">Loadmore</button>

</div>
    <div class="modal fade" id="add-photo-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Photo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body  text-center">
                    <div class="container">
                        <div class="row">
                            <input class="form-control" type="file" id="imageInput"/>
                            <img class="image-preview" id="image-preview" src="" />

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
                    <button  id="photo-add-confirm-btn" type="button" class="btn  btn-sm  btn-danger">Save</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

    <script type="text/javascript">

        // ......modal show.....

        $('#add-photo-data').click(function(){

            $('#add-photo-modal').modal('show');
        });

            ///.......image preview......

        $('#imageInput').change(function(){

            let reader = new FileReader();

            reader.readAsDataURL(this.files[0]);
            reader.onload = function(event){

                let imgSource = event.target.result;

                $('#image-preview').attr('src',imgSource);
            }
        });
        //....For photo add/save button.......

        $('#photo-add-confirm-btn').click(function(){

            $(this).html("<div class=\"spinner-border spinner-border-sm\" role=\"status\">\n" +
                "  <span class=\"sr-only\">Loading...</span>\n" +
                "</div>");

            let photoFile = $('#imageInput').prop('files')[0];

            let formData = new FormData();

            formData.append('photo',photoFile);

            axios.post('/photoUpload',formData)

                .then(function(response){

                    if(response.data==1 && response.status==200)
                    {
                        $('#add-photo-modal').modal('hide');
                        $(this).html("Save");
                        toastr.success("Photo upload successfully");
                        window.location.href="/photo";

                    }
                    else{
                        $('#add-photo-modal').modal('hide');
                        $(this).html("Save");
                        toastr.error("Photo upload not successfully");
                    }


                })
                .catch(function(error){

                    $('#add-photo-modal').modal('hide');
                    $(this).html("Save");

                    toastr.error("Photo upload not successfully");
                });
        });

        photoLoader();

        function photoLoader(){
            axios.get('/photoJSON')

                .then(function(response){

                    let dataJSON = response.data;


                    $.each(dataJSON, function(i, item) {

                        $('<div class="col-md-4">').html(`

                            <img class="image-on-row" src="${item.location}" data-id="${item.id}" />

                    <button class="btn btn-sm deletePhoto" data-id="${item.id} data-photo="${item.location}">Delete</button>`

                        ).appendTo('.photo-row');

                        })
                    $('.deletePhoto').click(function(event){

                        let id = $(this).data('id');

                        let url = $(this).data('photo');

                        photoDelete(id,url);

                        event.preventDefault();

                    });


            })
                .catch(function(){

            });
        }
             let i = 0; ///.........for image upload controlling solution.........
        function loadById(firstImageId,loadMoreBtn){



           let  imgId = firstImageId + 2 + i;



                let url='/photoJSONById/'+imgId;

                    i +=3;
            loadMoreBtn.html('<div class="spinner-border spinner-border-sm"></div>');

                axios.get(url)

                    .then(function(response){

                        loadMoreBtn.html("loadmore");

                        let dataJSON = response.data;
                        console.log(dataJSON);

                        $.each(dataJSON, function(i, item) {

                            $('<div class="col-md-4">').html(`<img class="image-on-row" src="${item.location}" data-id="${item.id}" />
                        <button class="btn btn-sm" data-id="${item.id}" data-photo="${item.location}">delete</button>`).appendTo('.photo-row');




                        })
                    })
                    .catch(function(response){

                    });

        }
        $('#load-more').click(function(){

            let loadMoreBtn = $(this);

          let firstImageId =  $(this).closest('div').find('img').data('id');

          loadById(firstImageId,loadMoreBtn);

        });

        ///.........photo delete function........

        function photoDelete(id,oldPhotoUrl){

            let url = "/photoDelete";

            let myFormData = new FormData();

            myFormData.append('oldPhotoUrl',oldPhotoUrl);

            myFormData.append('oldPhotoId',id);

            axios.post(url,myFormData).then(function(response){

                if(response.status==200 && response.data==1){

                    toastr.success("Delete Data successful");

                    window.location.href="/photo";
                }
                else{
                    toastr.error("Delete Data failed");
                }

            }).catch(function(error){
                toastr.error("Delete Data failed");
            })


        }
    </script>

@endsection
