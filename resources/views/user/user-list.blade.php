@extends('admin.admin-layout',[
'title' => __($title ?? 'Dashboard')
])
@section('main')
<div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Users Lists</h3>
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="card card-bordered card-stretch">
                                        <div class="card-inner-group">
                                            <div class="card-inner position-relative card-tools-toggle">
                                                <div class="card-title-group">
                                                    <div class="card-tools">
                                        
                                                    </div><!-- .card-tools -->
                                                  
                                                </div><!-- .card-title-group -->
                                                <div class="card-search search-wrap" data-search="search">
                                                    <div class="card-body">
                                                        <div class="search-content">
                                                            <a href="#" class="search-back btn btn-icon toggle-search" data-target="search"><em class="icon ni ni-arrow-left"></em></a>
                                                            <input type="text" class="form-control border-transparent form-focus-none" placeholder="Search by user or email">
                                                            <button class="search-submit btn btn-icon"><em class="icon ni ni-search"></em></button>
                                                        </div>
                                                    </div>
                                                </div><!-- .card-search -->
                                            </div><!-- .card-inner -->
                                            <div class="card-inner p-0">
                                                <div class="nk-tb-list nk-tb-ulist">
                                                    <div class="nk-tb-item nk-tb-head">
                                                        <div class="nk-tb-col"><span class="sub-text">User</span></div>
                                                        <div class="nk-tb-col tb-col-mb"><span class="sub-text">Email</span></div>
                                                        <div class="nk-tb-col tb-col-md"><span class="sub-text">Phone</span></div>
                                                        <div class="nk-tb-col tb-col-lg"><span class="sub-text">Address</span></div>
                                                        <div class="nk-tb-col tb-col-lg"><span class="sub-text">Role</span></div>
                                                       
                                                    </div><!-- .nk-tb-item -->
                                                    @foreach($user as $key => $value)
                                                    <div class="nk-tb-item">
                                                        <div class="nk-tb-col">
                                                            <a href="#">
                                                                <div class="user-card">
                                                               
                                                                    <div class="user-info">
                                                                        <span class="tb-lead">{{$value->FULLNAME}} <span class="dot dot-success d-md-none ml-1"></span></span>
    
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-mb">
                                                            <span class="tb-amount">{{$value->email}}</span>
                                                        </div>
                                                       
                                                        <div class="nk-tb-col tb-col-lg">
                                                            <span>{{$value->PHONENUMBER}}</span>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-lg">
                                                            <span>{{$value->ADRESS}}</span>
                                                        </div>
                                                        @foreach ($value->roles as $role)
                                                        <div class="nk-tb-col tb-col-lg">
                                                            <span>{{$role->name}}</span>
                                                        </div>
                                                        @endforeach
                                                        
                                                        <div class="nk-tb-col nk-tb-col-tools">
                                                            <ul class="nk-tb-actions gx-1">
                                        
                                                                <li>
                                                                    <div class="drodown">
                                                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <ul class="link-list-opt no-bdr">
                                                                                <li><a href="{{route('admin.assign-role',$value->id)}}"><em class="icon ni ni-eye"></em><span>add roles</span></a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    @endforeach<!-- .nk-tb-item -->
                                                </div><!-- .nk-tb-list -->
                                            </div><!-- .card-inner -->
                                           
                                           
                                        </div><!-- .card-inner-group -->
                                    </div><!-- .card -->
                                </div><!-- .nk-block -->
                            </div>
                        </div>
                    </div>
                </div>

@endsection     