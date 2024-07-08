@extends('front_layout.master')
@section('content')
<section class="applynow_section">
    <div class="bg_video">
        <video class="bg_accordion" width="100%" autoplay loop muted playsinline id="bg-vid">
            <source src="{{ asset('lure/images/Aura2.mp4') }}" type="video/mp4">
        </video>
    </div>
    <div class="container">
        <div class="container outer_zindex">
            <div class="table_container">
                <div class="table_opacity">
                  
                    <div class="table_content apply_form" id="form-container">
                        <!-- Step 1 -->
                        <div class="form-step active">
                            <div class="table_head">
                                <h2>Hey there!</h2>
                                <p>Here is the queen</p>
                            </div>
                            <p class="label">Are you Applying for:</p>
                            <div class="form-group custom_radio">
                                <input type="radio" id="production" name="application" value="Production">
                                <label for="production">Production</label>
                            </div>
                            <div class="form-group custom_radio">
                                <input type="radio" id="management" name="application" value="Management">
                                <label for="management">Management</label>
                            </div>
                            <div class="step_button_wrapper">
                                <button class="next-btn cta_btn">Next</button>
                            </div>
                        </div>
                        <!-- Step 2 -->
                        <div class="form-step">
                            <div class="form-group">
                                <label class="label" for="name">What's your name?</label>
                                <input type="text" id="name" placeholder="Full Name *">
                            </div>
                            <div class="form-group">
                                <label class="label" for="email">What's your email address?</label>
                                <input type="email" id="email" placeholder="Email *">
                            </div>
                            <div class="step_button_wrapper">
                                <button class="prev-btn cta_btn">Previous</button>
                                <button class="next-btn cta_btn">Next</button>
                            </div>
                        </div>
                        <!-- Step 3 -->
                        <div class="form-step">
                            <div class="form-group">
                                <label class="label" for="contact-method">What is the best way to reach you?</label>
                                <input type="text" id="contact-method" placeholder="Email/Number/Telegram *">
                            </div>
                            <div class="form-group">
                                <label class="label" for="instagram">What is your Instagram account?</label>
                                <input type="text" id="instagram" placeholder="Instagram Username *">
                            </div>
                            <div class="step_button_wrapper">
                                <button class="prev-btn cta_btn">Previous</button>
                                <button class="next-btn cta_btn">Next</button>
                            </div>
                        </div>
                        <!-- Step 4 -->
                        <div class="form-step">
                            <p class="label">Are you available to travel?</p>
                            <div class="form-group custom_radio">
                                <input type="radio" id="travel-yes" name="travel" value="Yes">
                                <label for="travel-yes">Yes</label>
                            </div>
                            <div class="form-group custom_radio">
                                <input type="radio" id="travel-no" name="travel" value="No">
                                <label for="travel-no">No</label>
                            </div>
                            <div class="step_button_wrapper">
                                <button class="prev-btn cta_btn">Previous</button>
                                <button class="next-btn cta_btn">Complete</button>
                            </div>
                        </div>
                        <!-- Loading Screen -->
                        <div class="form-step">
                            <div class="complete_form_notification">
                                <div class="loading-animation">
                                    <img src="{{ asset('lure/images/gif_logo.gif') }}" alt="Lure">
                                </div>
                                <p>Thank you for applying.<br>We will reach out to you as soon as we can.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection