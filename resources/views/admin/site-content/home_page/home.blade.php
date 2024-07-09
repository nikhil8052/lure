@extends('admin_layout.master')
@section('content')
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-aside-wrap">
                            <div id="banner-sec"  class="homecontent card-inner card-inner-lg">
                                <div class="nk-block-head nk-block-head-lg">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h4 class="nk-block-title">Bannner Content</h4>
                                            <div class="nk-block-des">
                                                <p>Change your banner content.</p>
                                            </div>
                                        </div>
                                        <div class="nk-block-head-content align-self-start d-lg-none">
                                            <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <form action="{{ route('home.content.update') }}" method="POST" enctype="multipart/form-data" class="gy-3 form-settings">
                                        @csrf
                                        <input type="hidden" name="type" value="banner">
                                        <div class="row g-3 align-center">
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label class="form-label" for="site-name">Banner Title</label>
                                                    {{-- <span class="form-note">Specify the name of your hotel.</span> --}}
                                                </div>
                                            </div>
                                            <div class="col-lg-9">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" name="banner_title" id="banner_title" placeholder="BREAKING THE NORMAL." value="{{ $homeContent->bannerSec_heading ?? '' }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3 ">
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label class="form-label">Banner Logo</label>
                                                    {{-- <span class="form-note">The logo of your hotel</span> --}}
                                                </div>
                                            </div>
                                            <div class="col-lg-9">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <div class="form-file">
                                                            <input type="file"  class="form-file-input" id="banner_logo" name="banner_logo">
                                                            <label class="form-file-label" for="banner_logo">Choose file</label>
                                                        </div>
                                                    </div>
                                                    <div class="image-container" >
                                                        <img style="background-color: black" height="150px" width="350px" src="{{ asset('/lure/images') }}/{{ $homeContent->bannerSec_logo ?? '' }}" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3 ">
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label class="form-label">Background video</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-9">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <div class="form-file">
                                                            <input type="file"  class="form-file-input" id="bg_video" name="bg_video">
                                                            <label class="form-file-label" for="bg_video">Choose file</label>
                                                        </div>
                                                    </div>
                                                    <div class="video-container">
                                                        <video class="banner_bg" height="150px" width="200px" autoplay loop  muted playsinline id="vid">
                                                            <source src="{{ asset('/lure/images') }}/{{ $homeContent->bannerSec_video ?? '' }}" type="video/mp4">
                                                        </video>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3 ">
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label class="form-label">Background Image</label>
                                                    {{-- <span class="form-note">The logo of your hotel</span> --}}
                                                </div>
                                            </div>
                                            <div class="col-lg-9">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <div class="form-file">
                                                            <input type="file"  class="form-file-input" id="bg_image" name="bg_image">
                                                            <label class="form-file-label" for="bg_image">Choose file</label>
                                                        </div>
                                                    </div>
                                                    <div class="image-container">
                                                        <img height="200px" width="300px" src="{{ asset('/lure/images') }}/{{ $homeContent->bannerSec_bgimage ?? '' }}" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3 ">
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label class="form-label">Banner Text</label>
                                                    {{-- <span class="form-note">The logo of your hotel</span> --}}
                                                </div>
                                            </div>
                                            <div class="col-lg-9">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <textarea class="form-control form-control" id="banner_text" placeholder="Lorem ipsum...." name="banner_text">{{ $homeContent->bannerSec_text ?? '' }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-lg-7">
                                                <div class="form-group mt-2">
                                                    <button type="submit" class="btn btn-lg btn-primary">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div id="about-us" style="display:none;"  class="homecontent card-inner card-inner-lg">
                                <div class="nk-block-head nk-block-head-lg">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h4 class="nk-block-title">About Us</h4>
                                            <div class="nk-block-des">
                                                {{-- <p>Change your banner content.</p> --}}
                                            </div>
                                        </div>
                                        <div class="nk-block-head-content align-self-start d-lg-none">
                                            <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <form action="{{ route('home.content.update') }}" method="POST" enctype="multipart/form-data" class="gy-3 form-settings">
                                        @csrf
                                        <input type="hidden" name="type" value="aboutus">
                                        <div class="row g-3 ">
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label class="form-label" for="site-name">Active Heading</label>
                                                    {{-- <span class="form-note">Specify the name of your hotel.</span> --}}
                                                </div>
                                            </div>
                                            <div id="active_heading_container" class="col-lg-9">
                                                <div class="form-group">
                                                    <div class="form-control-wrap col-lg-12 d-flex">
                                                        <input  type="text" class="form-control inputField col-lg-9" name="active_heading[]"  placeholder="Make More Money" >
                                                        <span style="font-size: 25px" id="AddMore"><em class="icon ni ni-plus-round-fill"></em></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3 align-center">
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label class="form-label" for="site-name">Sub Heading</label>
                                                    {{-- <span class="form-note">Specify the name of your hotel.</span> --}}
                                                </div>
                                            </div>
                                            <div class="col-lg-9">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" name="about_us_sub_heading" id="about_us_sub_heading" placeholder="BREAKING THE NORMAL." value="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3 align-center">
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label class="form-label">Description</label>
                                                    {{-- <span class="form-note">The logo of your hotel</span> --}}
                                                </div>
                                            </div>
                                            <div class="col-lg-9">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <textarea class="form-control form-control" id="aboutus_text" placeholder="Lorem ipsum...." name="aboutus_text"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-lg-7">
                                                <div class="form-group mt-2">
                                                    <button type="submit" class="btn btn-lg btn-primary">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div id="expert-picks" style="display:none;"  class="homecontent card-inner card-inner-lg">
                                <div class="nk-block-head nk-block-head-lg">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h4 class="nk-block-title">Expert Picks</h4>
                                            <div class="nk-block-des">
                                                {{-- <p>Change your banner content.</p> --}}
                                            </div>
                                        </div>
                                        <div class="nk-block-head-content align-self-start d-lg-none">
                                            <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <form action="{{ route('home.content.update') }}" method="POST" enctype="multipart/form-data" class="gy-3 form-settings">
                                        @csrf
                                        <input type="hidden" name="type" value="expertpicks">
                                        <div class="row g-3 align-center">
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label class="form-label" for="site-name">Heading</label>
                                                    {{-- <span class="form-note">Specify the name of your hotel.</span> --}}
                                                </div>
                                            </div>
                                            <div  class="col-lg-9">
                                                <div class="form-group">
                                                    <div class="form-control-wrap ">
                                                        <input  type="text" class="form-control inputField col-lg-9" name="expertPicks_heading" id="expertPicks_heading" value="{{ $homeContent->expertpicks_heading ?? '' }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3 ">
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label class="form-label">Logos</label>
                                                    {{-- <span class="form-note">The logo of your hotel</span> --}}
                                                </div>
                                            </div>
                                            <div id="logoContainer" class="col-lg-9">
                                                <div class="form-group">
                                                    <div class="form-control-wrap d-flex">
                                                        <div class="form-file">
                                                            <input type="file"  class="form-file-input"  name="logos[]">
                                                            <label class="form-file-label" >Choose file</label>
                                                        </div>
                                                        <span style="font-size: 25px" id="AddMorelogo"><em class="icon ni ni-plus-round-fill"></em></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @if(isset($homeContent->expertpicks_logos) && $homeContent->expertpicks_logos != null && !empty(json_decode($homeContent->expertpicks_logos)))
                                            <div class="row g-3">
                                                <div id="logoContainer" class="col-lg-12">
                                                    <div class="form-group d-flex flex-wrap">
                                                        @foreach (json_decode($homeContent->expertpicks_logos,true) as $key => $logo)
                                                            <div class="p-2 m-2 d-flex" style="min-height: 30px;min-width: 50px;">
                                                                <img src="{{ asset('/lure/images') }}/{{ $logo }}" alt="">
                                                                <span style="font-size: 25px" data-index="{{ $key }}" class="remove_image"><em class="icon ni ni-trash-fill"></em></span>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="row g-3">
                                            <div class="col-lg-7">
                                                <div class="form-group mt-2">
                                                    <button type="submit" class="btn btn-lg btn-primary">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div id="join-us" style="display:none;" class="homecontent card-inner card-inner-lg">
                                <div class="nk-block-head nk-block-head-lg">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h4 class="nk-block-title">Join Us Section</h4>
                                            <div class="nk-block-des">
                                                {{-- <p>Change your banner content.</p> --}}
                                            </div>
                                        </div>
                                        <div class="nk-block-head-content align-self-start d-lg-none">
                                            <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <form action="{{ route('home.content.update') }}" method="POST" enctype="multipart/form-data" class="gy-3 form-settings">
                                        @csrf
                                        <input type="hidden" name="type" value="joinus">
                                        <div class="row g-3 align-center">
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label class="form-label" for="joinus-heading">Heading</label>
                                                    {{-- <span class="form-note">Specify the name of your hotel.</span> --}}
                                                </div>
                                            </div>
                                            <div  class="col-lg-9">
                                                <div class="form-group">
                                                    <div class="form-control-wrap ">
                                                        <input  type="text" class="form-control inputField col-lg-9" name="joinus_heading" id="joinus_heading" placeholder="Join Us" value="{{ $homeContent->join_us_heading ?? '' }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3 align-center">
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label class="form-label">Text</label>
                                                    {{-- <span class="form-note">The logo of your hotel</span> --}}
                                                </div>
                                            </div>
                                            <div class="col-lg-9">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <textarea class="form-control form-control" id="joinus_text" placeholder="Lorem ipsum...." name="joinus_text">{{ $homeContent->join_us_text ?? '' }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="row g-3 ">
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label class="form-label">Image</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-9">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <div class="form-file">
                                                            <input type="file"  class="form-file-input" id="joinus_image" name="joinus_image">
                                                            <label class="form-file-label" for="joinus_image">Choose file</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="image-container">
                                                    <img height="200px" width="300px" src="{{ asset('/lure/images') }}/{{ $homeContent->join_us_image ?? '' }}" alt="">
                                                </div>
                                            </div>
                                        </div> --}}
                                        <div class="row g-3">
                                            <div class="col-lg-7">
                                                <div class="form-group mt-2">
                                                    <button type="submit" class="btn btn-lg btn-primary">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-lg toggle-screen-lg" data-toggle-body="true" data-content="userAside" data-toggle-screen="lg" data-toggle-overlay="true">
                                <div class="card-inner-group" data-simplebar="init"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: auto; overflow: hidden;"><div class="simplebar-content" style="padding: 0px;">
                                    <div class="card-inner">
                                        <h3 class="nk-block-title page-title">Home Content</h3>
                                        <div class="nk-block-des text-soft">
                                            <p>Here you can change and edit your Home page</p>
                                        </div>
                                    </div>
                                    <div class="card-inner p-0">
                                        <ul class="link-list-menu">
                                            <li><a class="sideLink active"  data-div="banner-sec" ><em class="icon ni ni-laptop"></em><span>Banner Section</span></a></li>
                                            <li><a class="sideLink" data-div="about-us" ><em class="icon ni ni-user-fill"></em><span>About us</span></a></li>
                                            <li><a class="sideLink" data-div="expert-picks" ><em class="icon ni ni-lock-alt-fill"></em><span>Expert Picks</span></a></li>
                                            <li><a class="sideLink" data-div="join-us" ><em class="icon ni ni-lock-alt-fill"></em><span>Join Us</span></a></li>
                                        </ul>
                                    </div>
                                </div></div></div></div><div class="simplebar-placeholder" style="width: auto; height: 369px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: hidden;"><div class="simplebar-scrollbar" style="height: 0px; display: none;"></div></div></div><!-- .card-inner-group -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.sideLink').on('click',function(){
            var target_div = $(this).data('div');
            $('.homecontent').hide();
            $('#'+target_div).show();
            $('.sideLink').removeClass('active');
            $(this).addClass('active');
        });

        $('#AddMore').on('click',function(){
            $html_ = `<div class="form-group removeable_input">
                        <div class="form-control-wrap col-lg-12 d-flex">
                            <input  type="text" class="form-control inputField col-lg-9" name="active_heading[]"  placeholder="Make More Money" >
                            <span style="font-size: 25px" class="removeInput"><em class="icon ni ni-trash-fill"></em></span>
                        </div>
                    </div>`;
            $('#active_heading_container').append($html_);
        });

        $('#active_heading_container').on('click', '.removeInput', function() {
            $(this).closest('.removeable_input').remove();
        });

        $('#AddMorelogo').on('click',function(){
            $html_ = `<div class="form-group removeable_logoinput">
                        <div class="form-control-wrap d-flex">
                            <div class="form-file">
                                <input type="file"  class="form-file-input"  name="logos[]">
                                <label class="form-file-label" >Choose file</label>
                            </div>
                            <span style="font-size: 25px" class="removelogoInput"><em class="icon ni ni-trash-fill"></em></span>
                        </div>
                    </div>`;
            $('#logoContainer').append($html_);
        });
        $('#logoContainer').on('click', '.removelogoInput', function() {
            $(this).closest('.removeable_logoinput').remove();
        });

        $('.remove_image').on('click',function(){
            image_index = $(this).data('index');
            $.ajax({
                url: "{{ route('remove.logo') }}",
                method: 'POST',
                data: {
                    imageIndex: image_index,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    toastr.clear();
                    NioApp.Toast('Logo remove successfully', 'info', {
                        position: 'top-right'
                    });

                    window.location.reload();
                },
                error: function(xhr) {
                   
                }
            });
        });
    });
</script>
@endsection