@extends('admin_layout.master')
@section('content')
    <div class="nk-content">
        <style>
            .hidden {
                display: none !important;
            }
            .visible {
                display: block !important;
            }
        </style>
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block">
                        <div class="card card-bordered">
                            <div class="card-aside-wrap">
                                <div id="personal-info" class="profileSection card-inner card-inner-lg">
                                    <div class="nk-block-head nk-block-head-lg">
                                        <div class="nk-block-between">
                                            <div class="nk-block-head-content">
                                                <h4 class="nk-block-title">Personal Information</h4>
                                                <div class="nk-block-des">
                                                    <p>Basic info, like your name and address, that you use on this Platform.</p>
                                                </div>
                                            </div>
                                            <div class="nk-block-head-content align-self-start d-lg-none">
                                                <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                            </div>
                                        </div>
                                    </div><!-- .nk-block-head -->
                                    <div class="nk-block">
                                        <div class="nk-data data-list">
                                            <div class="data-head">
                                                <h6 class="overline-title">Basics</h6>
                                            </div>
                                            <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                                                <div class="data-col">
                                                    <span class="data-label">Full Name</span>
                                                    <span class="data-value">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</span>
                                                </div>
                                                <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                                            </div>
                                            <div class="data-item">
                                                <div class="data-col">
                                                    <span class="data-label">Email</span>
                                                    <span class="data-value">{{ auth()->user()->email }}</span>
                                                </div>
                                                <div class="data-col data-col-end"><span class="data-more disable"><em class="icon ni ni-lock-alt"></em></span></div>
                                            </div>
                                            <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                                                <div class="data-col">
                                                    <span class="data-label">Phone Number</span>
                                                    <span class="data-value text-soft">{{ auth()->user()->phone_number ?? 'Not add yet' }}</span>
                                                </div>
                                                <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                                            </div>
                                            {{-- <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit" data-tab-target="#address">
                                                <div class="data-col">
                                                    <span class="data-label">Address</span>
                                                    <span class="data-value">2337 Kildeer Drive,<br>Kentucky, Canada</span>
                                                </div>
                                                <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                                            </div> --}}
                                        </div>
                                        <!-- <div class="nk-data data-list">
                                            <div class="data-head">
                                                <h6 class="overline-title">Preferences</h6>
                                            </div>
                                            <div class="data-item">
                                                <div class="data-col">
                                                    <span class="data-label">Language</span>
                                                    <span class="data-value">English (United State)</span>
                                                </div>
                                                <div class="data-col data-col-end"><a href="#" class="link link-primary">Change Language</a></div>
                                            </div>
                                            <div class="data-item">
                                                <div class="data-col">
                                                    <span class="data-label">Date Format</span>
                                                    <span class="data-value">M d, YYYY</span>
                                                </div>
                                                <div class="data-col data-col-end"><a href="#" class="link link-primary">Change</a></div>
                                            </div>
                                            <div class="data-item">
                                                <div class="data-col">
                                                    <span class="data-label">Timezone</span>
                                                    <span class="data-value">Bangladesh (GMT +6)</span>
                                                </div>
                                                <div class="data-col data-col-end"><a href="#" class="link link-primary">Change</a></div>
                                            </div>
                                        </div> data-list --> 
                                    </div><!-- .nk-block -->
                                </div>
                                <div id="security-info" style="display:none;" class="profileSection card-inner card-inner-lg">
                                    <div class="nk-block-head nk-block-head-lg">
                                        <div class="nk-block-between">
                                            <div class="nk-block-head-content">
                                                <h4 class="nk-block-title">Security Settings</h4>
                                                <div class="nk-block-des">
                                                    <p>These settings are helps you keep your account secure.</p>
                                                </div>
                                            </div>
                                            <div class="nk-block-head-content align-self-start d-lg-none">
                                                <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                            </div>
                                        </div>
                                    </div><!-- .nk-block-head -->
                                    <div class="nk-block">
                                        <div class="card card-bordered">
                                            <div class="card-inner-group">
                                                <div class="card-inner">
                                                    <div id="change-password-BtnDiv" class="between-center flex-wrap g-3 visible">
                                                        <div class="nk-block-text">
                                                            <h6>Change Password</h6>
                                                            <p>Set a unique password to protect your account.</p>
                                                        </div>
                                                        <div class="nk-block-actions flex-shrink-sm-0">
                                                            <ul class="align-center flex-wrap flex-sm-nowrap gx-3 gy-2">
                                                                <li class="order-md-last">
                                                                    <a id="Change_password_btn" class="btn btn-primary">Change Password</a>
                                                                </li>
                                                                <li>
                                                                    <em class="text-soft text-date fs-12px">Last changed: <span>{{ auth()->user()->last_update ? \Illuminate\Support\Carbon::createFromFormat('Y-m-d', auth()->user()->last_update)->format('M j, Y') : auth()->user()->created_at->format('M j, Y') }}</span></em>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div id="change-passwordDiv"  class="between-center flex-wrap g-3 col-lg-12 hidden">
                                                        <div class="nk-block-text">
                                                            <h6>Change Password</h6>
                                                            <p>Set a unique password to protect your account.</p>
                                                        </div>
                                                        <div class="nk-block-actions flex-shrink-sm-0 col-lg-12">
                                                            <form id="changePasswordForm" >
                                                                @csrf
                                                                <ul class="align-center flex-wrap flex-sm-nowrap gx-3 gy-2">
                                                                    <li class="order-md-last col-lg-8">
                                                                        <div class="form-control-wrap">
                                                                            <a  class="form-icon form-icon-right passcode-switch lg" data-target="current_password">
                                                                                <em class="passcode-icon icon-hide icon ni ni-eye"></em>
                                                                                <em class="passcode-icon icon-show icon ni ni-eye-off"></em>
                                                                            </a>
                                                                            <input type="password" name="current_password" class="form-control form-control-lg" id="current_password" placeholder="Enter Current Password">
                                                                        </div>
                                                                        <span id="current_password_error" class="text-danger error-container" ></span>
                                                                        {{-- <input type="password" name="current_password" id="current_password" class="form-control" placeholder="*****"> --}}
                                                                    </li>
                                                                    <li class="col-lg-4">
                                                                        <em class="text-soft text-date fs-15px">Current Password: </em>
                                                                    </li>
                                                                </ul>
                                                                <ul class="align-center flex-wrap flex-sm-nowrap gx-3 gy-2">
                                                                    <li class="order-md-last col-lg-8">
                                                                        {{-- <input type="password" name="password" id="password" class="form-control" placeholder="*****"> --}}
                                                                        <div class="form-control-wrap">
                                                                            <a  class="form-icon form-icon-right passcode-switch lg" data-target="password">
                                                                                <em class="passcode-icon icon-hide icon ni ni-eye"></em>
                                                                                <em class="passcode-icon icon-show icon ni ni-eye-off"></em>
                                                                            </a>
                                                                            <input type="password" name="password" class="form-control form-control-lg" id="password" placeholder="New Password">
                                                                        </div>
                                                                        <span id="password_error" class="text-danger error-container" ></span>
                                                                    </li>
                                                                    <li class="col-lg-4">
                                                                        <em class="text-soft text-date fs-15px">New Password: </em>
                                                                    </li>
                                                                </ul>
                                                                <ul class="align-center flex-wrap flex-sm-nowrap gx-3 gy-2">
                                                                    <li class="order-md-last col-lg-8">
                                                                        <div class="form-control-wrap">
                                                                            <a  class="form-icon form-icon-right passcode-switch lg" data-target="confirmation_password">
                                                                                <em class="passcode-icon icon-hide icon ni ni-eye"></em>
                                                                                <em class="passcode-icon icon-show icon ni ni-eye-off"></em>
                                                                            </a>
                                                                            <input type="password" name="password_confirmation" class="form-control form-control-lg" id="password_confirmation" placeholder="Re-Enter Password">
                                                                        </div>
                                                                        <span id="password_confirmation_error" class="text-danger error-container" ></span>
                                                                        {{-- <input type="password" name="confirmation_password" id="confirmation_password" class="form-control" placeholder="*****"> --}}
                                                                    </li>
                                                                    <li class="col-lg-4">
                                                                        <em class="text-soft text-date fs-15px">Confirm Password: </em>
                                                                    </li>
                                                                </ul>
                                                                <ul class="align-center flex-wrap flex-sm-nowrap gx-3 gy-2">
                                                                    <li class="col-lg-8">
                                                                        
                                                                    </li>
                                                                    <li class="col-lg-4">
                                                                        <div class="d-flex justify-content-between">
                                                                            <button type="button" class="btn btn-dark" id="cancelBtn">Cancel</button>
                                                                            <button type="submit" class="btn btn-primary" >Update</button>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-lg toggle-screen-lg" data-toggle-body="true" data-content="userAside" data-toggle-screen="lg" data-toggle-overlay="true">
                                    <div class="card-inner-group" data-simplebar="init"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: auto; overflow: hidden;"><div class="simplebar-content" style="padding: 0px;">
                                        <div class="card-inner">
                                            <div class="user-card">
                                                <div class="user-avatar bg-primary">
                                                    @if(isset(auth()->user()->profile_photo) && auth()->user()->profile_photo != null)
                                                        <span><img  src="{{ asset('admin/images') }}/{{ auth()->user()->profile_photo }}"  alt="logo"></span>
                                                    @else
                                                        <span>{{ strtoupper(substr(auth()->user()->first_name, 0, 1)) }}{{ strtoupper(substr(auth()->user()->last_name, 0, 1)) }}</span>
                                                    @endif
                                                </div>
                                                <div class="user-info">
                                                    <span class="lead-text">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</span>
                                                    <span class="sub-text">{{ auth()->user()->email }}</span>
                                                </div>
                                                <div class="user-action">
                                                    <div class="dropdown">
                                                        <a class="btn btn-icon btn-trigger me-n2" data-bs-toggle="dropdown" href="#" aria-expanded="false"><em class="icon ni ni-more-v"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-end" style="">
                                                            <ul class="link-list-opt no-bdr">
                                                                <li><a id="ChangeProfilePhoto"><em class="icon ni ni-camera-fill"></em><span>Change Photo</span></a></li>
                                                                <form action="{{ route('profile.image.update') }}" method="POST" id="profileImageForm" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <input type="file" name="profile_photo" id="profile_photo" style="display:none">
                                                                </form>
                                                                {{-- <li><a href="#"><em class="icon ni ni-edit-fill"></em><span>Update Profile</span></a></li> --}}
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-inner p-0">
                                            <ul class="link-list-menu">
                                                <li><a class="sideLink active" data-div="personal-info" ><em class="icon ni ni-user-fill-c"></em><span>Personal Infomation</span></a></li>
                                                {{-- <li><a href="html/user-profile-notification.html"><em class="icon ni ni-bell-fill"></em><span>Notifications</span></a></li> --}}
                                                {{-- <li><a href="html/user-profile-activity.html"><em class="icon ni ni-activity-round-fill"></em><span>Account Activity</span></a></li> --}}
                                                <li><a class="sideLink" data-div="security-info"><em class="icon ni ni-lock-alt-fill"></em><span>Security Settings</span></a></li>
                                                {{-- <li><a href="html/user-profile-social.html"><em class="icon ni ni-grid-add-fill-c"></em><span>Connected with Social</span></a></li> --}}
                                            </ul>
                                        </div>
                                    </div></div></div></div><div class="simplebar-placeholder" style="width: auto; height: 504px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: hidden;"><div class="simplebar-scrollbar" style="height: 0px; display: none;"></div></div></div><!-- .card-inner-group -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="profile-edit" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-lg">
                    <h5 class="title">Update Profile</h5>
                    <ul class="nk-nav nav nav-tabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" data-bs-toggle="tab" href="#personal" aria-selected="true" role="tab">Personal</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active show" id="personal" role="tabpanel">
                            <form action="{{ route('admin.profile.update') }}" method="POST">
                                @csrf
                                <div class="row gy-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="first-name">First Name</label>
                                            <input type="text" name="first_name" class="form-control form-control-lg" id="first-name" value="{{ auth()->user()->first_name }}" placeholder="Enter first name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="last-name">Last Name</label>
                                            <input type="text" name="last_name" class="form-control form-control-lg" id="last-name" value="{{ auth()->user()->last_name }}" placeholder="Enter last name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="phone_number">Phone Number</label>
                                            <input type="text" class="form-control form-control-lg" id="phone_number" name="phone_number" value="{{ auth()->user()->phone_number }}" placeholder="Phone Number">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                            <li>
                                                <button type="submit" class="btn btn-lg btn-primary" >Update Profile</button>
                                            </li>
                                            <li>
                                                <a href="#" data-bs-dismiss="modal" class="link link-light">Cancel</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </form>
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
                $('.profileSection').hide();
                $('#'+target_div).show();
                $('.sideLink').removeClass('active');
                $(this).addClass('active');
            });
            $('#Change_password_btn').on('click',function(){
                $('#change-passwordDiv').removeClass('hidden').addClass('visible');
                $('#change-password-BtnDiv').removeClass('visible').addClass('hidden');
                
            });
            $('#cancelBtn').on('click',function(){
                $('#change-passwordDiv').removeClass('visible').addClass('hidden');
                $('#change-password-BtnDiv').removeClass('hidden').addClass('visible');
            });

            $('#changePasswordForm').submit(function(event) {
                event.preventDefault();
                setTimeout(function() {
                    $('#loading-screen').fadeOut();
                }, 2000); 
                var formData = $(this).serialize();
                
                $.ajax({
                    url: "{{ route('admin.password.update') }}",
                    method: 'POST',
                    data: formData,
                    success: function(response) {
                        toastr.clear();
                        NioApp.Toast('Password Changed Successfully', 'info', {
                            position: 'top-right'
                        });

                        window.location.reload();
                    },
                    error: function(xhr) {
                        var errors = xhr.responseJSON.errors;
                        if (errors) {
                            $('.error-container').text('');
                            $.each(errors, function(key, value) {
                                $('#'+key+'_error').text(value[0]);
                            });
                        }
                    }
                });
            });

            $('#ChangeProfilePhoto').on('click',function(){
                $('#profile_photo').click();
            });

            $('#profile_photo').on('change',function(){
                $('#profileImageForm').submit();
                // var form_Data = new FormData($('#profileImageForm')[0]);
                // $.ajax({
                //     url: "{{ route('profile.image.update') }}",
                //     method: 'POST',
                //     data: form_Data,
                //     contentType: false,
                //     processData: false,
                //     success: function(response) {
                //         toastr.clear();
                //         NioApp.Toast('Password Changed Successfully', 'info', {
                //             position: 'top-right'
                //         });

                //         window.location.reload();
                //     },
                //     error: function(xhr) {
                //         var errors = xhr.responseJSON.errors;
                //         if (errors) {
                //             $('.error-container').text('');
                //             $.each(errors, function(key, value) {
                //                 $('#'+key+'_error').text(value[0]);
                //             });
                //         }
                //     }
                // });
            });
        });
    </script>
@endsection