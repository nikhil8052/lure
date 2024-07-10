@extends('admin_layout.master')
@section('content')
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block nk-block-lg">
                        <div class="card card-bordered card-stretch">
                            <ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card" role="tablist">
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="site" role="tabpanel">
                                    <div class="card-inner pt-0">
                                        <h4 class="title nk-block-title">Apply Now Content</h4>
                                        <form action="{{ route('web.applyNow.page.update') }}" id="applyContentForm" method="POST" enctype="multipart/form-data" class="gy-3 form-settings">
                                            @csrf
                                            <div class="row g-3 align-center">
                                                <div class="col-lg-5">
                                                    <div class="form-group">
                                                        <label class="form-label" for="heading">Heading</label>
                                                        <span class="form-note">Specify the Heading of your Section.</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control serviceinput" name="heading" placeholder="Some of our results" id="heading" value="{{ $applyNow->heading ?? '' }}" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row g-3 align-center">
                                                <div class="col-lg-5">
                                                    <div class="form-group">
                                                        <label class="form-label" for="sub_heading">Sub Heading</label>
                                                        <span class="form-note">Specify the Sub Heading of your Section.</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control serviceinput" name="sub_heading" placeholder="Some of our results" id="sub_heading" value="{{ $applyNow->sub_heading ?? '' }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row g-3 ">
                                                <div class="col-lg-5">
                                                    <div class="form-group">
                                                        <label class="form-label">Background video</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <div class="form-file">
                                                                <input type="file"  class="form-file-input @if(!isset($applyNow->bg_video) || $applyNow->bg_video ==  null) serviceinput @endif" id="bg_video" name="bg_video">
                                                                <label class="form-file-label" for="bg_video">Choose file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @if(isset($applyNow->bg_video) && $applyNow->bg_video !=  null)
                                                        <div class="video-container">
                                                            <video class="banner_bg" height="150px" width="200px" autoplay loop  muted playsinline id="vid">
                                                                <source src="{{ asset('/lure/images') }}/{{ $applyNow->bg_video ?? '' }}" type="video/mp4">
                                                            </video>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row g-3 ">
                                                <div class="col-lg-5">
                                                    <div class="form-group">
                                                        <label class="form-label">Submit Image</label>
                                                        {{-- <span class="form-note">The logo of your hotel</span> --}}
                                                    </div>
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <div class="form-file">
                                                                <input type="file"  class="form-file-input  @if(!isset($applyNow->submit_gif ) || $applyNow->submit_gif != null) serviceinput @endif" id="submit_image" name="submit_image">
                                                                <label class="form-file-label" for="submit_image">Choose file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @if(isset($applyNow->submit_gif ) && $applyNow->submit_gif != null)
                                                        <div class="image-container">
                                                            <img height="200px" width="300px" src="{{ asset('/lure/images') }}/{{ $applyNow->submit_gif ?? '' }}" alt="">
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row g-3 align-center">
                                                <div class="col-lg-5">
                                                    <div class="form-group">
                                                        <label class="form-label" for="submit_heading">Submit Heading</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control serviceinput" name="submit_heading" placeholder="Some of our results" id="submit_heading" value="{{ $applyNow->submit_heading ?? '' }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row g-3 align-center">
                                                <div class="col-lg-5">
                                                    <div class="form-group">
                                                        <label class="form-label" for="submit_text">Submit Text</label>
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control serviceinput" name="submit_text" placeholder="Some of our results" id="submit_text" value="{{ $applyNow->submit_text ?? '' }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row g-3">
                                                <div class="col-lg-7">
                                                    <div class="form-group mt-2">
                                                        <button type="button" id="submitForm" class="btn btn-lg btn-primary">Update</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            
            $('#submitForm').on('click', function() {
                let valid = true;
                $('.serviceinput').each(function() {
                    if ($(this).val().trim() === '') {
                        valid = false;
                        $(this).addClass('is-invalid');  
                    } else {
                        $(this).removeClass('is-invalid');  
                    }
                });
                
                if (valid) {
                    $('#applyContentForm').submit();
                } else {
                    toastr.clear();
                    NioApp.Toast('All fields are required', 'error', {
                        position: 'top-right'
                    });
                }
            });
            $(document).on('input', '.serviceinput', function() {
                $(this).removeClass('is-invalid'); 
            });
        });
    </script>
@endsection