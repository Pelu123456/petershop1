@extends('admin.admin-layout',[
'title' => __($title ?? 'Role')
])
@section('main')
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">ROLE</h3>
                            </div><!-- .nk-block-head-content -->
                            <div class="nk-block-head-content">
                                <div class="toggle-wrap nk-block-tools-toggle">
                                    <a href="" class="btn btn-icon btn-trigger toggle-expand mr-n1"
                                        data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                    <div class="toggle-expand-content" data-content="pageMenu">
                                        <ul class="nk-block-tools g-3">
                                            <li class="nk-block-tools-opt">
                                                <a href="#" data-target="addProduct"
                                                    class="toggle btn btn-icon btn-primary d-md-none"><em
                                                        class="icon ni ni-plus"></em></a>
                                                <a href="#" data-target="addProduct"
                                                    class="toggle btn btn-primary d-none d-md-inline-flex"><em
                                                        class="icon ni ni-plus"></em><span>Add Role</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!-- .nk-block-head-content -->
                        </div><!-- .nk-block-between -->
                    </div><!-- .nk-block-head -->
                    <div class="nk-block">

                        <div class="card">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <div class="card-inner-group">
                                    <div class="card-inner p-0">
                                        <div class="nk-tb-list">
                                            <div class="nk-tb-item nk-tb-head">
                                                <div class="nk-tb-col tb-col-sm"><span>ID</span></div>
                                                <div class="nk-tb-col tb-col-sm"><span>Roles</span></div>    
                                                <div class="nk-tb-col tb-col-sm"><span>Guard</span></div>    

                                            </div><!-- .nk-tb-item -->
                                            @foreach($role as $key => $value)
                                            <div class="nk-tb-item">
                                                <div class="nk-tb-col">
                                                    <span class="tb-sub">{{ $key+1 }}</span>
                                                </div>
                                                <div class="nk-tb-col tb-col-sm">
                                                    <span class="tb-product">
                                                    {{$value->name}}
                                                        <span class="title"></span>
                                                    </span>
                                                </div>
                                                <div class="nk-tb-col">
                                                <span class="tb-product">
                                                    {{$value->guard_name}}
                                                    <span class="tb-sub"></span>
                                                </div>
                                                <div class="nk-tb-col">
                                                    <span class="tb-sub"></span>
                                                </div>
                                                <div class="nk-tb-col tb-col-md">
                                                    <span class="tb-sub"></span>
                                                </div>
                                                <div class="nk-tb-col nk-tb-col-tools">
                                                    <ul class="nk-tb-actions gx-1 my-n1">
                                                        <li class="mr-n1">
                                                            <div class="dropdown">
                                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                                                    data-toggle="dropdown"><em
                                                                        class="icon ni ni-more-h"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        <li><a href="{{route('admin.edit-role',$value->id)}}"><em
                                                                                    class="icon ni ni-edit"></em><span>Edit
                                                                                    role</span></a></li>
                                                                        <li><a href="{{route('admin.assign-permission',$value->id)}}"><em
                                                                                    class="icon ni ni-edit"></em><span>Add
                                                                                    Permission</span></a></li>
                                                                        <li><a href="{{route('admin.destroy-role',['id' => $value->id])}}"><em
                                                                                    class="icon ni ni-trash"></em><span>Remove
                                                                                    role (Undefine Error)</span></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            @endforeach
                                            <!-- .nk-tb-item -->


                                            <!-- .nk-tb-item -->
                                        </div><!-- .nk-tb-list -->
                                    </div>
                                </div>
                            </div>
                        </div><!-- .nk-block -->
                        <form class='card p-3 bg-light' method="POST" action="{{ route('admin.store-role') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="nk-add-product toggle-slide toggle-slide-right" data-content="addProduct"
                                data-toggle-screen="any" data-toggle-overlay="true" data-toggle-body="true" data-simplebar>
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h5 class="nk-block-title">New Role</h5>
                                        <div class="nk-block-des">
                                            <p> add new Roles.</p>
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label" for="product-title"></label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" name="name">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="col-12">
                                                    <div class="upload-zone small bg-lighter my-2">
                                                        <div class="dz-message">
                                                            <span class="dz-message-text">Drag and drop file</span>
                                                        </div>
                                                    </div>
                                                </div> -->

                                        <div class="col-12">
                                            <button class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Add
                                                    New</span></button>
                                        </div>
                                    </div>

                                </div>
                        </form> <!-- .nk-block -->
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
