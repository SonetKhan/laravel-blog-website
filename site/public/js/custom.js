// Owl Carousel Start..................



$(document).ready(function() {
    var one = $("#one");
    var two = $("#two");

    $('#customNextBtn').click(function() {
        one.trigger('next.owl.carousel');
    })
    $('#customPrevBtn').click(function() {
        one.trigger('prev.owl.carousel');
    })
    one.owlCarousel({
        autoplay:true,
        loop:true,
        dot:true,
        autoplayHoverPause:true,
        autoplaySpeed:100,
        margin:10,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:4
            }
        }
    });

    two.owlCarousel({
        autoplay:true,
        loop:true,
        dot:true,
        autoplayHoverPause:true,
        autoplaySpeed:100,
        margin:10,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });

});








// Owl Carousel End..................

$('#contact-btn-id').click(function(){

    let name = $('#contact-name-id').val();

    let mobile = $('#contact-mobile-id').val();

    let email = $('#contact-email-id').val();

    let msg = $('#contact-msg-id').val();

    sendContact(name,mobile,email,msg);
});

        function sendContact(contact_name,contact_mobile,contact_email,contact_message){
            if(contact_name.length==0){

                $('#contact-btn-id').html("আপনার নাম লিখুন।।");

                setTimeout(function(){
                    $('#contact-btn-id').html("পাঠিয়ে দিন।।");
                },1000)

            }else if(contact_mobile.length==0){

                $('#contact-btn-id').html("আপনার মোবাইল নাম্নার দিন।");

                setTimeout(function(){

                    $('#contact-btn-id').html("পাঠিয়ে দিন।");

                },1000)
            }else if(contact_email==0){

                $('#contact-btn-id').html("আপনার ইমেল নাম্বার দিন।");

                setTimeout(function(){
                    $('#contact-btn-id').html("পাঠিয়ে দিন।");
                },1000)

            }else if (contact_message==0){

                $('#contact-btn-id').html("মেসেজ লিখুন|");

                setTimeout(function(){
                    $('#contact-btn-id').html("পাঠিয়ে দিন।");
                },1000)

            }else{
                $('#contact-btn-id').html("পাঠানো হচ্ছে।");
                axios.post('/contactsSend',{

                    contact_name:contact_name,

                    contact_mobile:contact_mobile,

                    contact_email:contact_email,

                    contact_message :contact_message

                })
                    .then(function(response){
                        if(response.data==1){
                            $('#contact-btn-id').html("আপনার অনুরোধ সফল হয়েছে");
                            setTimeout(function(){
                                $('#contact-btn-id').html("পাঠিয়ে দিন।।");
                            },1000)

                        }else{
                            $('#contact-btn-id').html("আপনার অনুরোধ ব্যার্থ হয়েছে!আবার চেষ্টা করুন!");
                            setTimeout(function(){
                                $('#contact-btn-id').html("পাঠিয়ে দিন।।");
                            },1000)
                        }

                    })
                    .catch(function(error){
                        console.log(error);
                    })

            }

        }
