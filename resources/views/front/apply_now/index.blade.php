@extends('front_layout.master')
@section('content')
    <section class="applynow_section">
        <div class="bg_video">
            <video class="bg_accordion" width="100%" autoplay loop muted playsinline id="bg-vid">
                @if(isset($applyNow->bg_video) && $applyNow->bg_video !=  null)
                    <source src="{{ asset('lure/images') }}/{{ $applyNow->bg_video ?? 'Aura2.mp4' }}" type="video/mp4">
                @else
                    <source src="{{ asset('lure/images/Aura2.mp4') }}" type="video/mp4">
                @endif
            </video>
        </div>
        <div class="container">
            <div class="container outer_zindex">
                <div class="table_container">
                    <div class="table_opacity">
                        <div class="table_content apply_form" id="form-container">
                            <form data-url="{{ route('send.mail') }}" data-checkmail-url="{{ route('check.mail') }}" id="applyform">
                                @csrf
                                <!-- Step 1 -->
                                <div class="form-step active">
                                    <div class="table_head">
                                        <h2>{{ $applyNow->heading ??  'Hey there!' }}</h2>
                                        <p>{{ $applyNow->sub_heading ?? 'Here is the queen' }}</p>
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
                                        <button type="button" class="next-btn cta_btn">Next</button>
                                    </div>
                                </div>
                                <!-- Step 2 -->
                                <div class="form-step">
                                    <div class="form-group">
                                        <label class="label" for="name">What's your name?</label>
                                        <input type="text" name="name" id="full-name" placeholder="Full Name *">
                                        <span style="display:none;" id="name-error"  class="text-danger">Name is Required</span>
                                    </div>
                                    <div class="form-group">
                                        <label class="label" for="email">What's your email address?</label>
                                        <input type="email" name="email" id="email" placeholder="Email *">
                                        <span style="display:none;" id="email-error"  class="text-danger">Your email is already registered</span>
                                    </div>
                                    <div class="step_button_wrapper">
                                        <button type="button" class="prev-btn cta_btn">Previous</button>
                                        <button type="button" class="next-btn cta_btn">Next</button>
                                    </div>
                                </div>
                                <!-- Step 3 -->
                                <div class="form-step">
                                    <div class="form-group">
                                        <label class="label" for="contact-method-select">What is the best way to reach you?</label>
                                        <select id="contact-method-select" class="form-select" name="contactmethod" onchange="showContactInput()">
                                            <option value="">Select a contact method</option>
                                            <option value="cemail">Email</option>
                                            <option value="phone">Phone Number</option>
                                            <option value="telegram">Telegram Username</option>
                                        </select>
                                    </div>
                                    <div class="form-group" id="email-input" style="display:none;">
                                        <label class="label" for="cemail">Email</label>
                                        <input type="email" id="cemail" name="cemail" placeholder="Enter your email">
                                        <span style="display:none;" id="email-error" class="text-danger">Please provide a valid email</span>
                                    </div>
                                    <div class="form-group" id="phone-input" style="display:none;">
                                        <label class="label" for="phone">Phone Number</label>
                                        <input type="tel" id="phone" name="phone" placeholder="Enter your phone number">
                                        <span style="display:none;" id="phone-error" class="text-danger">Please provide a valid phone number</span>
                                    </div>
                                    <div class="form-group" id="telegram-input" style="display:none;">
                                        <label class="label" for="telegram">Telegram Username</label>
                                        <input type="text" id="telegram" name="telegram" placeholder="Enter your Telegram username">
                                        <span style="display:none;" id="telegram-error" class="text-danger">Please provide a valid Telegram username</span>
                                    </div>
                                    <div class="form-group">
                                        <label class="label" for="instagram">What is your Instagram account?</label>
                                        <input type="text" id="instagram" name="instaaccount" placeholder="Instagram Username *">
                                        <span style="display:none;" id="instagram-error"  class="text-danger">This Field is Required</span>
                                    </div>
                                    <div class="step_button_wrapper">
                                        <button type="button" class="prev-btn cta_btn">Previous</button>
                                        <button type="button" class="next-btn cta_btn">Next</button>
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
                                        <button type="button" class="prev-btn cta_btn">Previous</button>
                                        <button type="button" id="complete-btn" class="next-btn cta_btn">Complete</button>
                                    </div>
                                </div>
                            </form>
                            <!-- Loading Screen -->
                            <div class="form-step">
                                <div class="complete_form_notification">
                                    <div class="loading-animation">
                                        @if(isset($applyNow->submit_gif) && $applyNow->submit_gif != null)
                                            <img src="{{ asset('lure/images') }}/{{ $applyNow->submit_gif ?? 'gif_logo.gif' }}" alt="Lure">
                                        @else
                                            <img src="{{ asset('lure/images/gif_logo.gif') }}" alt="Lure">
                                        @endif
                                    </div>
                                    <p>{{ $applyNow->submit_heading ?? 'Thank you for applying.' }}<br>{{ $applyNow->submit_text ?? 'We will reach out to you as soon as we can.' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function showContactInput() {
            var select = document.getElementById('contact-method-select');
            var emailInput = document.getElementById('email-input');
            var phoneInput = document.getElementById('phone-input');
            var telegramInput = document.getElementById('telegram-input');

            emailInput.style.display = 'none';
            phoneInput.style.display = 'none';
            telegramInput.style.display = 'none';

            var value = select.value;

            if (value === 'cemail') {
                emailInput.style.display = 'block';
            } else if (value === 'phone') {
                phoneInput.style.display = 'block';
            } else if (value === 'telegram') {
                telegramInput.style.display = 'block';
            }
        }
    </script>
@endsection