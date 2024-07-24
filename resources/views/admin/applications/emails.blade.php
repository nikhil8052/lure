@extends('admin_layout.master')
@section('content')
    <div class="nk-content">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block">
                        <div class="nk-block-head">
                            <div class="nk-block-head-content d-flex justify-content-between">
                                <h4 class="nk-block-title">List</h4>
                            </div>
                        </div>
                        <div class="nk-block">
                            <div class="card card-bordered card-preview">
                                <div class="card-inner">
                                    {{-- <table class="datatable-init nowrap nk-tb-list nk-tb-ulist" data-auto-responsive="true"> --}}
                                        <table class="datatable-init nowrap nk-tb-list nk-tb-ulist" data-auto-responsive="true">
                                        <thead>
                                            <tr class="nk-tb-item nk-tb-head">
                                                <th class="nk-tb-col tb-tnx-id"><span class="sub-text">#</span></th>
                                                <th class="nk-tb-col"><span class="sub-text">Email</span></th>
                                                <th class="nk-tb-col"><span class="sub-text">Date</span></th>
                                                <th class="nk-tb-col nk-tb-col-tools text-end">
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody id="sortable" >
                                            @foreach($alldata as $data )
                                                <tr class="nk-tb-item" >
                                                    <td class="nk-tb-col tb-tnx-id">
                                                        <div class="user-info">
                                                            <span class="tb-lead">{{ $loop->iteration }}</span>
                                                        </div>
                                                    </td>
                                                    <td class="nk-tb-col">
                                                        <div class="user-card">
                                                            <div class="user-info">
                                                                <span class="tb-lead"><a href="mailto:{{ $data->email }}">{{ $data->email }}</a></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="nk-tb-col">
                                                        <div class="user-card">
                                                            <div class="user-info">
                                                                <span class="tb-lead">{{ $data->created_at->format('j F, Y') }}</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="nk-tb-col nk-tb-col-tools text-end">
                                                        <ul class="nk-tb-actions gx-1">
                                                            <li>
                                                                <div class="drodown">
                                                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                                                        data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                    <div class="dropdown-menu dropdown-menu-end">
                                                                        <ul class="link-list-opt no-bdr">
                                                                            <!-- <li><a class="edit-faq" style="cursor: pointer;" data-id="{{ $data->id ?? '' }}"><em class="icon ni ni-edit"></em><span>Edit</span></a></li> -->
                                                                            <li><a href="{{ url('admin-dashboard/remove-email') }}/{{ $data->id }}" class="delete" ><em class="icon ni ni-trash"></em><span>Remove</span></a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection