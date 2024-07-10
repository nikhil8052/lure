@extends('admin_layout.master')
@section('content')
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    {{-- <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Services</h3>
                            </div>
                        </div>
                    </div> --}}
                    <div class="nk-block nk-block-lg">
                        <div class="card card-bordered card-stretch">
                            <ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card" role="tablist">
                                {{-- <li class="nav-item" role="presentation">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#site" aria-selected="true" role="tab"><em class="icon ni ni-laptop"></em><span>General settings</span></a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#socialMedia" aria-selected="false" tabindex="-1" role="tab"><em class="icon ni ni-user-alt"></em><span>Social Links</span></a>
                                </li> --}}
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="site" role="tabpanel">
                                    <div class="card-inner pt-0">
                                        <h4 class="title nk-block-title">Results</h4>
                                        <p>Add your Results.</p>
                                        <form action="{{ route('add.results') }}" id="serviceForm" method="POST" enctype="multipart/form-data" class="gy-3 form-settings">
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
                                                            <input type="text" class="form-control serviceinput" name="title" placeholder="Some of our results" id="title" value="{{ $results->title ?? '' }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            @if(isset($results) && $results->results != null && !empty(json_decode($results->results,true)))
                                                <div class="parent_container_div">
                                                    <h6 class="title nk-block-title">Results</h6>
                                                    <div id="servic_container_div" class="p-2">
                                                        @foreach (json_decode($results->results,true) as $data)
                                                            @if($loop->iteration == 1)
                                                                <div class="row g-3 p-2 totalServices">
                                                                    <div class="col-lg-5">
                                                                        <div class="form-group">
                                                                            <label for="">Title</label>
                                                                            <div class="form-control-wrap">
                                                                                <input type="text" class="form-control serviceinput" name="result[{{ $loop->iteration }}][heading]"  value="{{ $data['heading'] ?? '' }}" >
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="">Image</label>
                                                                            <input type="hidden" name="result[{{ $loop->iteration }}][imageVal]"  value="{{ $data['image'] ?? '' }}">
                                                                            <div class="form-control-wrap">
                                                                                <input type="file" class="form-control" name="result[{{ $loop->iteration }}][image]">
                                                                            </div>
                                                                        </div>
                                                                        <div class="image-container">
                                                                            <img height="150px" width="200px" src="{{ asset('Our_result') }}/{{ $data['image'] ?? '' }}" alt="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-7">
                                                                        <div class="form-group">
                                                                            <div class="form-control-wrap">
                                                                                <label for="">Description</label>
                                                                                <div class="form-control-wrap">
                                                                                    <textarea style="min-height: 120px" class="form-control form-control serviceinput"  name="result[{{ $loop->iteration }}][description]"  placeholder="Lorem ipsum....">{{ $data['description'] ?? '' }}</textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @else
                                                                <div class="row g-3 p-2 totalServices">
                                                                    <div class="col-lg-5">
                                                                        <div class="form-group">
                                                                            <label for="">Title</label>
                                                                            <div class="form-control-wrap">
                                                                                <input type="text" class="form-control serviceinput" name="result[{{ $loop->iteration }}][heading]"  value="{{ $data['heading'] ?? '' }}" >
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <input type="hidden" name="result[{{ $loop->iteration }}][imageVal]"  value="{{ $data['image'] ?? '' }}">
                                                                            <label for="">Image</label>
                                                                            <div class="form-control-wrap">
                                                                                <input type="file" class="form-control" name="result[{{ $loop->iteration }}][image]"   >
                                                                            </div>
                                                                        </div>
                                                                        <div class="image-container">
                                                                            <img height="150px" width="200px" src="{{ asset('Our_result') }}/{{ $data['image'] ?? '' }}" alt="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <div class="form-control-wrap">
                                                                                <label for="">Description</label>
                                                                                <div class="form-control-wrap">
                                                                                    <textarea style="min-height: 120px" class="form-control form-control serviceinput"  name="result[{{ $loop->iteration }}][description]"  placeholder="Lorem ipsum....">{{ $data['description'] ?? '' }}</textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-1 pt-3 d-flex flex-end">
                                                                        <span class="remove"><em style="font-size:20px;" class="icon ni ni-trash-fill"></em></span>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @else
                                                <div class="parent_container_div">
                                                    <h6 class="title nk-block-title">Results</h6>
                                                    <div id="servic_container_div" class="p-3">
                                                        <div class="row g-3 p-2  totalServices">
                                                            <div class="col-lg-5">
                                                                <div class="form-group">
                                                                    <label for="">Title</label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" class="form-control serviceinput" name="result[0][heading]"   >
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Image</label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="file" class="form-control serviceinput" name="result[0][image]"   >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-7">
                                                                <div class="form-group">
                                                                    <div class="form-control-wrap">
                                                                        <label for="">Description</label>
                                                                        <div class="form-control-wrap">
                                                                            <textarea style="min-height: 120px" class="form-control form-control serviceinput"  name="result[0][description]"  placeholder="Lorem ipsum...."></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="row g-3 align-center d-flex justify-content-end">
                                                <div class="col-lg-7 d-flex justify-content-end">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                           <button type="button" id="add-more" class="btn btn-primary">Add More</button>
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