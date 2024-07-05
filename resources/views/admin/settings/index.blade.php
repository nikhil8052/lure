@extends('admin_layout.master')
@section('content')
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Website Settings</h3>
                            </div>
                        </div>
                    </div>
                    <div class="nk-block nk-block-lg">
                        <div class="card card-bordered card-stretch">
                            <ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#site" aria-selected="true" role="tab"><em class="icon ni ni-laptop"></em><span>General settings</span></a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#socialMedia" aria-selected="false" tabindex="-1" role="tab"><em class="icon ni ni-user-alt"></em><span>Social Links</span></a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="site" role="tabpanel">
                                    <div class="card-inner pt-0">
                                        <h4 class="title nk-block-title">General setting</h4>
                                        <p>Here is your basic store setting of your app.</p>
                                        <form action="{{ route('update.setting') }}" method="POST" enctype="multipart/form-data" class="gy-3 form-settings">
                                            @csrf
                                            <input type="hidden" name="type" value="general">
                                            {{-- <div class="row g-3 align-center">
                                                <div class="col-lg-5">
                                                    <div class="form-group">
                                                        <label class="form-label" for="comp-name">Company Name</label>
                                                        <span class="form-note">Specify the name of your Company.</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control"  id="comp-name" value="Company Name">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
                                            <div class="row g-3 align-center">
                                                <div class="col-lg-5">
                                                    <div class="form-group">
                                                        <label class="form-label" for="comp-email">Company Email</label>
                                                        <span class="form-note">Specify the email address of your Company.</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <input type="email" class="form-control" name="comp_email" placeholder="info@gmail.com" id="comp-email" value="{{ $siteContent->site_email ?? '' }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row g-3 align-center">
                                                <div class="col-lg-5">
                                                    <div class="form-group">
                                                        <label class="form-label" for="comp_number">Company Number</label>
                                                        <span class="form-note">Specify the Contact Number of your Company.</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" name="comp_number" id="comp_number" placeholder="+888" value="{{ $siteContent->site_number ?? '' }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                            <div class="row g-3 align-center">
                                                <div class="col-lg-5">
                                                    <div class="form-group">
                                                        <label class="form-label" for="company_address"> Company Address</label>
                                                        <span class="form-note">Address of your Office.</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <div class="form-control-wrap">
                                                                <textarea style="min-height: 60px" class="form-control form-control" id="company_address" name="company_address"  placeholder="address....">{{ $siteContent->company_address ?? '' }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row g-3 align-center">
                                                <div class="col-lg-5">
                                                    <div class="form-group">
                                                        <label class="form-label" for="website_description">Website Message</label>
                                                        {{-- <span class="form-note">Describe your website.</span> --}}
                                                    </div>
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <div class="form-control-wrap">
                                                                <input type="text" name="comp_message" class="form-control" placeholder="Achive more" id="comp_message" value="{{ $siteContent->site_message ?? '' }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row g-3 align-center">
                                                <div class="col-lg-5">
                                                    <div class="form-group">
                                                        <label class="form-label" for="comp-copyright">Company Copyright</label>
                                                        <span class="form-note">Copyright information of your Company.</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" name="comp_copyright" placeholder="Copyright" id="comp-copyright" value="{{ $siteContent->site_copyrights ?? '' }}">
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
                                <div class="tab-pane" id="socialMedia" role="tabpanel">
                                    <div class="card-inner pt-0">
                                        <h4 class="title nk-block-title">Social Media Links</h4>
                                        <p>Here is your links of social media apps.</p>
                                        <form action="{{ route('update.setting') }}" method="POST" enctype="multipart/form-data" class="gy-3 form-settings">
                                            @csrf
                                            <input type="hidden" name="type" value="social">
                                            <div class="row g-3 align-center">
                                                <div class="col-lg-5">
                                                    <div class="form-group">
                                                        <label class="form-label" for="comp-name">Instagram</label>
                                                        {{-- <span class="form-note">Specify the name of your Company.</span> --}}
                                                    </div>
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" name="instagram" id="instagram" placeholder="#" value="{{ $siteContent->instagram_link ?? '' }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row g-3 align-center">
                                                <div class="col-lg-5">
                                                    <div class="form-group">
                                                        <label class="form-label" for="comp-name">Facebook</label>
                                                        {{-- <span class="form-note">Specify the name of your Company.</span> --}}
                                                    </div>
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" name="facebook" id="facebook" placeholder="#" value="{{ $siteContent->facebook_link ?? '' }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row g-3 align-center">
                                                <div class="col-lg-5">
                                                    <div class="form-group">
                                                        <label class="form-label" for="comp-name">LinkedIn</label>
                                                        {{-- <span class="form-note">Specify the name of your Company.</span> --}}
                                                    </div>
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" name="linkedin" id="linkedin" placeholder="#" value="{{ $siteContent->linkedin_link ?? '' }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row g-3 align-center">
                                                <div class="col-lg-5">
                                                    <div class="form-group">
                                                        <label class="form-label" for="site-name">Team description</label>
                                                        <span class="form-note">Describe your Social Media Team.</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <div class="form-control-wrap">
                                                                <textarea class="form-control form-control" id="about_team" placeholder="Lorem ipsum...." name="about_team">{{ $siteContent->about_team ?? '' }}</textarea>
                                                            </div>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection