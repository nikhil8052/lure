@extends('front_layout.master')
@section('content')
    <section class="applynow_section ">
        <div class="bg_video">
            <video class="bg_accordion" width="100%" autoplay loop muted playsinline id="bg-vid">
                <source src="{{ asset('lure/images/Aura2.mp4') }}" type="video/mp4">
            </video>
        </div>
        <div class="container">
            <siv class="section_head text-center">
                <h2>Are you an influencer looking for <br>representation or a brand looking for <br>partnership?</h2>
            </siv>

            <div class="container outer_zindex">
                <div class="outer_tab">
                    <div class="tab_btn">
                        <button class="tablinks active" onclick="lure(event, 'INFLUENCER')" id="defaultOpen" href="#">
                            INFLUENCER
                        </button>
                        <button class="tablinks brand" onclick="lure(event, 'BRAND')" href="#">
                            BRAND
                        </button>
                    </div>
                </div>

                <div class="  table_container  tabcontent active" id="INFLUENCER">
                    <div class="table_opacity">

                        <div class="table_head">
                            <h2>
                                Become a Lure Model
                            </h2>
                            <p>
                                Interested in being represented by Lure? Fill out the form below and tell us a little
                                bit more about who you are!
                            </p>

                        </div>

                        <div class="table_content">
                            <div class="form-group">
                                <input type="text" id="" placeholder="FullName *">
                            </div>
                            <div class="form-group">
                                <input type="text" id="" placeholder="Email *">
                            </div>
                            <div class="form-group">
                                <input type="text" id="" placeholder="Phone Number *">
                            </div>
                            <div class="form-group">
                                <input type="text" id="" placeholder="Instagram Username *">
                            </div>
                            <div class="form-group">
                                <input type="text" id="" placeholder="Number of Instagram Followers *">
                            </div>
                            <div class="form-group">
                                <input type="text" id="" placeholder="Tiktok Username *">
                            </div>
                            <div class="form-group">
                                <input type="text" id="" placeholder="Number of TikTok Followers *"> 
                            </div>
                            <div class="form-group">
                                <input type="text" id="" placeholder="Where are you located? *">
                            </div>
                            <div class="form-group">
                                <textarea rows="3" cols="68"
                                placeholder="Why are you interested in representation? *"></textarea> 
                            </div>
                            <div class="form-group">
                                <textarea rows="3" cols="68" placeholder="How did you hear about us?"></textarea>
                            </div> 
                        </div>

                        <div class=" sub_btn">
                            <button href="#" class="cta_btn">
                                SUMBIT
                            </button>
                        </div>
                    </div>
                </div>
                <div class=" table_container  tabcontent" id="BRAND">
                    <div class="table_opacity">

                        <div class="table_head">
                            <h2>
                                Become a Brand Model
                            </h2>
                            <p>
                                Interested in being represented by Lure? Fill out the form below and tell us a little
                                bit
                                more about who you are!
                            </p>

                        </div>

                        <div class="table_content">
                            <div class="form-group">
                                <input type="text" id="" placeholder="FullName *">
                            </div>
                            <div class="form-group">
                                <input type="text" id="" placeholder="Email *">
                            </div>
                            <div class="form-group">
                                <input type="text" id="" placeholder="Phone Number *">
                            </div>
                            <div class="form-group">
                                <input type="text" id="" placeholder="Brand Name *">
                            </div>
                            <div class="form-group">
                                <input type="text" id="" placeholder="Brand Instagram *">
                            </div>
                            <div class="form-group">
                                <input type="text" id="" placeholder="Brand Website *">
                            </div>
                            <div class="form-group">
                                <input type="text" id="" placeholder="Budget *">
                            </div>
                            <div class="form-group">
                                <input type="text" id=""
                                placeholder="If you are interested in any particular influencers, please list them here. *">
                            </div>
                            <div class="form-group">
                                <textarea rows="3" cols="68" placeholder="Please explain what you are looking for. *"></textarea>
                            </div>   
                        </div>
                        <div class="sub_btn">
                            <button href="#" class="cta_btn">
                                SUMBIT
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function lure(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }
    </script>
@endsection