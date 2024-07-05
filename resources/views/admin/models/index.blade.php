@extends('admin_layout.master')
@section('content')
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between g-3">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Our Models</h3>
                                {{-- <div class="nk-block-des text-soft">
                                    <p>You have total <span class="text-base">1,257</span> Media.</p>
                                </div> --}}
                            </div>
                            <div class="nk-block-head-content">
                                <a id="upload_new" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-upload-cloud"></em><span>Add New</span></a>
                                <a href="#" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-upload-cloud"></em></a>
                                <form id="modelForm" method="POST" action="{{ route('add.models') }}" enctype="multipart/form-data">
                                   @csrf
                                    <input type="file"  id="image" name="image" style="display:none;">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="nk-block">
                        <div class="row g-gs">
                            @if(isset($allModels) && $allModels != null && $allModels->isNotEmpty())
                                @foreach ($allModels as $model)
                                    <div class="col-sm-6 col-lg-4 col-xxl-3">
                                        <div class="gallery card card-bordered">
                                            <a class="gallery-image popup-image" href="{{ asset('Models_Images') }}/{{ $model->image }}">
                                                <img class="w-100 rounded-top" src="{{ asset('Models_Images') }}/{{ $model->image }}" alt="">
                                            </a>
                                            <div class="gallery-body card-inner align-center justify-between flex-wrap g-2">
                                                <div class="user-card">
                                                    <div class="user-info">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" data-id="{{ $model->id }}" id="customSwitch{{ $model->id }}"  name="status[]" class="custom-control-input changeStatus" {{ $model->status ? 'checked' : '' }}>
                                                            <label class="custom-control-label" for="customSwitch{{ $model->id }}">Show</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <a href="{{ url('admin-dashboard/model-image-remove') }}/{{ $model->id }}" class="btn btn-p-0 btn-nofocus"><em class="icon ni ni-trash"></em>Remove</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-sm-6 col-lg-4 col-xxl-3">
                                    <p>No record found</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $('#upload_new').on('click',function(){
                $('#image').trigger('click');
            });

            $('#image').on('change',function(){
               $('#modelForm').submit();
            });

            $('.changeStatus').on('change',function(){
                var dataId = $(this).data('id');
                $.ajax({
                    url: "{{url('/change-model-status')}}" +"/" + dataId, 
                    method: 'GET',
                    data: {
                        _token: '{{ csrf_token() }}' 
                    },
                    success: function(response) {
                        console.log('Order updated successfully.');
                    },
                    error: function(xhr) {
                        console.error('Error updating order.');
                    }
                });
            });
        });

    </script>
@endsection