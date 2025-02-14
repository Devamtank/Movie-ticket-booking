@extends('layouts.layout')

@section('content')
    <section class="page-header overlay-gradient"
        style="background: url('images/branding/posters/movie-collection.webp') ;">
        <div class="container">
            <div class="inner">
                <h2 class="title">Contact Us</h2>
                <ol class="breadcrumb">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Contact Us</li>
                </ol>
            </div>
        </div>
    </section>

    <main class="contact-page ptb100">
        <div class="container">
            <div class="row">

                <!-- Start of Contact Details -->
                <div class="col-md-4 col-sm-12">
                    <h3 class="title">Info</h3>

                    <div class="details-wrapper">
                        <p>{{ config('app.name') }} is a ticket reservation system designed for cinemas. It features a great
                            number of features, from normal ticket reservation to multi-user roles. It was developed using
                            Laravel 8. We hope you like it.</p>

                        @php
                            $url = preg_replace('#^https?://#', '', url('/'));
                            $email = 'info@' . $url;
                        @endphp

                        <ul class="contact-details">
                            <li>
                                <i class="icon-phone"></i>
                                <strong>Phone:</strong>
                                <span>(123) 123-456 </span>
                            </li>
                            <li>
                                <i class="icon-printer"></i>
                                <strong>Fax:</strong>
                                <span>(123) 123-456 </span>
                            </li>
                            <li>
                                <i class="icon-globe"></i>
                                <strong>Web:</strong>
                                <span><a href="#">{{ $url }}</a></span>
                            </li>
                            <li>
                                <i class="icon-paper-plane"></i>
                                <strong>E-Mail:</strong>
                                <span><a href="#">{{ $email }}</a></span>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Start of Contact Details -->

                <!-- Start of Contact Form -->
                <div class="col-md-8 col-sm-12">
                    <h3 class="title">Contact Form</h3>

                    <!-- Form Group -->
                    <form id="contact-form" method="" action="">
                        @csrf  

                      
                        <div id="contact-result"></div>

                   
                        <div class="form-group">
                            <input class="form-control input-box" type="text" name="name" placeholder="Your Name" autocomplete="off" required>
                        </div>

                        <!-- Form Group for Email -->
                        <div class="form-group">
                            <input class="form-control input-box" type="email" name="email" placeholder="Your Email" autocomplete="off" required>
                        </div>

                        <!-- Form Group for Subject -->
                        <div class="form-group">
                            <input class="form-control input-box" type="text" name="subject" placeholder="Subject" autocomplete="off" required>
                        </div>

                        <!-- Form Group for Message -->
                        <div class="form-group mb20">
                            <textarea class="form-control textarea-box" rows="8" name="message" placeholder="Type your message..." required></textarea>
                        </div>

                        <!-- Form Group for Submit Button -->
                        <div class="form-group text-center">
                            <button class="btn btn-main btn-effect" type="reset" onclick="alert('Your message sent sucessfully')">Send message</button><br>
                        </div>
                    </form>

                </div>
                <!-- Start of Contact Form -->

            </div>
        </div>
    </main>
@endsection
