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
                                        <h4 class="title nk-block-title">Expand Influence</h4>
                                        <form id="influenceForm" action="{{ route('influence.content.update') }}" method="POST" enctype="multipart/form-data" class="gy-3 form-settings">
                                            @csrf
                                            <div class="row g-3 align-center">
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label class="form-label" for="influence_title">Title</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-9">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control serviceinput" name="influence_title" id="influence_title" placeholder="Expand Influence" value="{{ $influence_sec->heading ?? '' }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row g-3 ">
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label class="form-label">Text</label>
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-lg-9">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <textarea class="form-control form-control serviceinput" id="influence_text" placeholder="Lorem ipsum...." name="influence_text">{{ $influence_sec->text ?? '' }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row g-3 ">
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label class="form-label">Video Before</label>
                                                        <span class="form-note">Video before LURE.</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-9">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <div class="form-file">
                                                                <input type="file"  class="form-file-input @if(!isset($influence_sec->video_before) || $influence_sec->video_before == null) serviceinput @endif" id="before_video" name="before_video">
                                                                <label class="form-file-label" for="before_video">Choose file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @if(isset($influence_sec->video_before) && $influence_sec->video_before != null)
                                                        <div class="video-container">
                                                            <video class="banner_bg" height="150px" width="200px" autoplay loop  muted playsinline id="vid">
                                                                <source src="{{ asset('/lure/images') }}/{{ $influence_sec->video_before ?? '' }}" type="video/mp4">
                                                            </video>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row g-3 ">
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label class="form-label">Video After</label>
                                                        <span class="form-note">Video After LURE.</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-9">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <div class="form-file">
                                                                <input type="file"  class="form-file-input @if(!isset($influence_sec->video_after) || $influence_sec->video_after == null) serviceinput @endif" id="after_video" name="after_video">
                                                                <label class="form-file-label" for="after_video">Choose file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @if(isset($influence_sec->video_after) && $influence_sec->video_after != null)
                                                        <div class="video-container">
                                                            <video class="banner_bg" height="150px" width="200px" autoplay loop  muted playsinline id="vid">
                                                                <source src="{{ asset('/lure/images') }}/{{ $influence_sec->video_after ?? '' }}" type="video/mp4">
                                                            </video>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row g-3 ">
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label class="form-label">Before Image</label>
                                                        <span class="form-note">Image Before LURE</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-9">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <div class="form-file">
                                                                <input type="file"  class="form-file-input " id="before_image" name="before_image">
                                                                <label class="form-file-label" for="before_image">Choose file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @if(isset($influence_sec->image_before) && $influence_sec->image_before != null)
                                                        <div class="image-container">
                                                            <img height="200px" width="300px" src="{{ asset('/lure/images') }}/{{ $influence_sec->image_before ?? '' }}" alt="">
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row g-3 ">
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label class="form-label">After Image</label>
                                                        <span class="form-note">Image After LURE</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-9">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <div class="form-file">
                                                                <input type="file"  class="form-file-input" id="after_image" name="after_image">
                                                                <label class="form-file-label" for="after_image">Choose file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @if(isset($influence_sec->image_after) && $influence_sec->image_after != null)
                                                        <div class="image-container">
                                                            <img height="200px" width="300px" src="{{ asset('/lure/images') }}/{{ $influence_sec->image_after ?? '' }}" alt="">
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row g-3">
                                                <div class="col-lg-7">
                                                    <div class="form-group mt-2">
                                                        <button id="submitForm" type="button" class="btn btn-lg btn-primary">Update</button>
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
            @if(isset($results) && $results->results != null && !empty(json_decode($results->results,true)))
                let totalresults = "{{ count(json_decode($results->results,true)) }}";
            @else
                let totalresults = 0;
            @endif
    
            $('#add-more').click(function() {
                totalresults++;
                let newService = `
                    <div class="row g-3 p-2  totalServices">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label for="">Title</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control serviceinput" name="result[${totalresults}][heading]" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Image</label>
                                <div class="form-control-wrap">
                                    <input type="file" class="form-control serviceinput" name="result[${totalresults}][image]"   >
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <label for="">Description</label>
                                    <div class="form-control-wrap">
                                        <textarea style="min-height: 120px" class="form-control form-control serviceinput" name="result[${totalresults}][description]" placeholder="Lorem ipsum...."></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1 pt-3 d-flex flex-end">
                            <span class="remove"><em style="font-size:20px;" class="icon ni ni-trash-fill"></em></span>
                        </div>
                    </div>
                `;
                $('#servic_container_div').append(newService);
            });
    
            $(document).on('click', '.remove', function() {
                $(this).closest('.totalServices').remove();
            });

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
                    $('#influenceForm').submit();
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