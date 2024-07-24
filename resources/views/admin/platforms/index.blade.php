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
                                        <h4 class="title nk-block-title">Social Platforms</h4>
                                        <p>Supported Platforms By Us.</p>
                                        <form action="{{ route('add.social.platforms') }}" id="serviceForm" method="POST" enctype="multipart/form-data" class="gy-3 form-settings">
                                            @csrf
                                            <div class="row g-3 align-center">
                                                <div class="col-lg-5">
                                                    <div class="form-group">
                                                        <label class="form-label" for="comp-email">Section Title</label>
                                                        <span class="form-note">Specify the Title of your Section.</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control serviceinput" name="title" placeholder="Unless Creativity" id="title" value="{{ $results->sec_title ?? '' }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row g-3 align-center">
                                                <div class="col-lg-5">
                                                    <div class="form-group">
                                                        <label class="form-label" for="sec_logo">Logo</label>
                                                        <!-- <span class="form-note">Specify the Title of your Section.</span> -->
                                                    </div>
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <input type="file" class="form-control @if(!isset($results->web_logo) || $results->web_logo == null) serviceinput @endif" id="sec_logo" name="sec_logo">
                                                        </div>
                                                    </div>
                                                    @if(isset($results->web_logo) && $results->web_logo != null)
                                                        <div class="image-container">
                                                            <img height="150px" width="150px" src="{{ asset('Our_result') }}/{{ $results->web_logo }}" alt="">
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row g-3 align-center">
                                                <div class="col-lg-5">
                                                    <div class="form-group">
                                                        <label class="form-label" for="result_image">Result Image</label>
                                                        <!-- <span class="form-note">Specify the Title of your Section.</span> -->
                                                    </div>
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <input type="file" class="form-control  @if(!isset($results->result_image) || $results->result_image == null) serviceinput @endif" id="result_image" name="result_image">
                                                        </div>
                                                    </div>
                                                    @if(isset($results->result_image) && $results->result_image != null)
                                                        <div class="image-container">
                                                            <img height="150px" width="150px" src="{{ asset('Our_result') }}/{{ $results->result_image }}" alt="">
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <hr>
                                            @if(isset($results) && $results->platforms != null && !empty(json_decode($results->platforms,true)))
                                                <div class="parent_container_div">
                                                    <h6 class="title nk-block-title">Platforms</h6>
                                                    <div id="servic_container_div" class="p-2">
                                                        @foreach (json_decode($results->platforms,true) as $data)
                                                            @if($loop->iteration == 1)
                                                                <div class="row g-3 p-2 totalServices">
                                                                    <div class="col-lg-5">
                                                                        <div class="form-group">
                                                                            <label for="">Title</label>
                                                                            <div class="form-control-wrap">
                                                                                <input type="text" class="form-control serviceinput" placeholder="title" name="platform[{{ $loop->iteration }}][title]"  value="{{ $data['title'] ?? '' }}" >
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label for="">Image</label>
                                                                            <input type="hidden" name="platform[{{ $loop->iteration }}][imageVal]"  value="{{ $data['image'] ?? '' }}">
                                                                            <div class="form-control-wrap">
                                                                                <input type="file" class="form-control" name="platform[{{ $loop->iteration }}][image]">
                                                                            </div>
                                                                        </div>
                                                                        <div class="image-container">
                                                                            <img height="100px" width="80px" src="{{ asset('Our_result') }}/{{ $data['image'] ?? '' }}" alt="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @else
                                                                <div class="row g-3 p-2 totalServices">
                                                                    <div class="col-lg-5">
                                                                        <div class="form-group">
                                                                            <label for="">Title</label>
                                                                            <div class="form-control-wrap">
                                                                                <input type="text" class="form-control serviceinput" placeholder="title" name="platform[{{ $loop->iteration }}][title]"  value="{{ $data['title'] ?? '' }}" >
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <input type="hidden" name="platform[{{ $loop->iteration }}][imageVal]"  value="{{ $data['image'] ?? '' }}">
                                                                            <label for="">Image</label>
                                                                            <div class="form-control-wrap">
                                                                                <input type="file" class="form-control" name="platform[{{ $loop->iteration }}][image]"   >
                                                                            </div>
                                                                        </div>
                                                                        <div class="image-container">
                                                                            <img height="100px" width="80px" src="{{ asset('Our_result') }}/{{ $data['image'] ?? '' }}" alt="">
                                                                        </div>
                                                                    </div>
                                                                    <!-- <div class="col-lg-1 pt-3 d-flex flex-end">
                                                                        <span class="remove"><em style="font-size:20px;" class="icon ni ni-trash-fill"></em></span>
                                                                    </div> -->
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @else
                                                <div class="parent_container_div">
                                                    <h6 class="title nk-block-title">Platforms</h6>
                                                    <div id="servic_container_div" class="p-3">
                                                        <div class="row g-3 p-2  totalServices">
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label for="">Title</label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" class="form-control serviceinput" name="platform[0][title]" placeholder="Title"  >
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label for="">Image</label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="file" class="form-control serviceinput" name="platform[0][image]"   >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="row g-3 align-center d-flex justify-content-end">
                                                <!-- <div class="col-lg-7 d-flex justify-content-end">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                           <button type="button" id="add-more" class="btn btn-primary">Add More</button>
                                                        </div>
                                                    </div>
                                                </div> -->
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
            @if(isset($results) && $results->platforms != null && !empty(json_decode($results->platforms,true)))
                let totalresults = "{{ count(json_decode($results->platforms,true)) }}";
            @else
                let totalresults = 0;
            @endif
    
            $('#add-more').click(function() {
                totalresults++;
                let newService = `
                    <div class="row g-3 p-2  totalServices">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Title</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control serviceinput" placeholder="title" name="platform[${totalresults}][title]" >
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label for="">Image</label>
                                <div class="form-control-wrap">
                                    <input type="file" class="form-control serviceinput" name="platform[${totalresults}][image]"   >
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
                    $('#serviceForm').submit();
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