@extends('admin_layout.master')
@section('content')
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <!-- <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Sales Overview</h3>
                                <div class="nk-block-des text-soft">
                                    <p>Welcome Back.</p>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="nk-block">
                        <div class="row g-gs">
                            <div class="col-md-6 col-xxl-4">
                                <div class="card card-bordered card-full">
                                    <div class="card-inner border-bottom">
                                        <div class="card-title-group">
                                            <div class="card-title">
                                                <h6 class="title">Recent Subscriptions</h6>
                                            </div>
                                            <div class="card-tools">
                                                <ul class="card-tools-nav">
                                                    <!-- <li><a href="#"><span>Cancel</span></a></li> -->
                                                    <a href="{{ route('admin.dashboard.emails') }}" class="link">View All</a>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="nk-activity">
                                        @if( isset($allemail) && $allemail->isNotEmpty())
                                            @foreach($allemail as $edata)
                                                <li class="nk-activity-item">
                                                    <div class="nk-activity-media user-avatar bg-success"><em class="icon ni ni-user-fill"></em></div>
                                                    <div class="nk-activity-data">
                                                        <div class="label"><a href="mailto:{{ $edata->email }}">{{ $edata->email }}</a> Subscribe to our Newsletter.</div>
                                                        <span class="time">{{ $edata->created_at->format('j F, Y') }}</span>
                                                    </div>
                                                </li>
                                            @endforeach
                                        @else
                                            <p>No latest Record.</p>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6 col-xxl-4">
                                <div class="card card-bordered card-full">
                                    <div class="card-inner-group">
                                        <div class="card-inner">
                                            <div class="card-title-group">
                                                <div class="card-title">
                                                    <h6 class="title">New Users</h6>
                                                </div>
                                                <div class="card-tools">
                                                    <a href="{{ route('admin.dashboard.clients') }}" class="link">View All</a>
                                                </div>
                                            </div>
                                        </div>
                                        @if( isset($alldata) && $alldata->isNotEmpty())
                                            @foreach($alldata as $data)
                                                <div class="card-inner card-inner-md">
                                                    <div class="user-card">
                                                        <div class="user-avatar bg-primary-dim">
                                                            <span><em class="icon ni ni-user-fill"></em></span>
                                                        </div>
                                                        <div class="user-info">
                                                            <span class="lead-text">{{ $data->name }}</span>
                                                            <span class="sub-text">{{ $data->email }}</span>
                                                        </div>
                                                        <div class="user-action">
                                                            <div class="drodown">
                                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger me-n1" data-bs-toggle="dropdown" aria-expanded="false"><em class="icon ni ni-more-h"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-end">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        <li><a type="button" class="" style="cursor: pointer;"data-bs-toggle="modal" data-bs-target="#modal{{ $data->id }}"><em class="icon ni ni-eye"></em><span>view</span></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade zoom" tabindex="-1" id="modal{{ $data->id }}">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                <em class="icon ni ni-cross"></em>
                                                            </a>
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">{{ $data->name }}</h5>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p><strong>Apply For:</strong>&nbsp;{{ $data->apply_for }}</p>
                                                                <p><strong>Email:</strong>&nbsp;{{ $data->email }}</p>
                                                                <p><strong>Contact {{ $data->contact_method }}:</strong>&nbsp;{{ $data->contact }}</p>
                                                                <p><strong>Instagram:</strong>&nbsp;{{ $data->social_media_account }}</p>
                                                                <p><strong>Able to travel:</strong>&nbsp;{{ $data->able_to_tarvel }}</p>
                                                            </div>
                                                            <div class="modal-footer bg-light">
                                                                <span class="sub-text"><a href="#" class="btn btn-dark" data-bs-dismiss="modal" aria-label="Close">Close</a></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <p>No latest Record.</p>   
                                        @endif 
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