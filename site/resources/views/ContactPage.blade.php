
@extends('Layout.app')

@section('content')

    <div class="container-fluid jumbotron mt-5 ">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6  text-center">

                <h1 class="page-top-title mt-3">- Contact -</h1>
            </div>
        </div>
    </div>

    <div class="container-fluid bg-white jumbotron mt-5 ">
        <div class="row">
            <div class="col-md-6">

            </div>
            <div class="col-md-6">


                    <h3 class="service-card-title">ঠিকানা</h3>
                    <hr>
                    <p class="footer-text"><i class="fas fa-map-marker-alt"></i> শেখেরটেক ৮ মোহাম্মদপুর, ঢাকা </p>
                    <p class="footer-text"><i class="fas fa-phone"></i> ০১৭৮৫৩৮৮৯১৯ </p>
                    <p class="footer-text"><i class="fas fa-envelope"></i> Rabbil@Yahoo.com</p>

                    <h5 class="service-card-title">যোগাযোগ করুন </h5>
                    <div class="form-group ">
                        <input id="contact-name-id" type="text" class="form-control w-100" placeholder="আপনার নাম">
                    </div>
                    <div class="form-group">
                        <input id="contact-mobile-id" type="text" class="form-control  w-100" placeholder="মোবাইল নং ">
                    </div>
                    <div class="form-group">
                        <input id="contact-email-id" type="text" class="form-control  w-100" placeholder="ইমেইল ">
                    </div>
                    <div class="form-group">
                        <input id="contact-msg-id" type="text" class="form-control  w-100" placeholder="মেসেজ ">
                    </div>
                    <button id="contact-btn-id"  class="btn btn-block normal-btn w-100">পাঠিয়ে দিন </button>

                    
            </div>

        </div>
    </div>

@endsection



