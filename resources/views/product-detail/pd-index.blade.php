@extends('admin.admin-layout',[
'title' => __($title ?? 'Type')
])
@section('main')
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Type</h3>
                            </div><!-- .nk-block-head-content -->
                            <div class="nk-block-head-content">
                                <div class="toggle-wrap nk-block-tools-toggle">
                                    <a href="" class="btn btn-icon btn-trigger toggle-expand mr-n1"
                                        data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                    <div class="toggle-expand-content" data-content="pageMenu">
                                        <ul class="nk-block-tools g-3">
                                            <li>
                                                <div class="form-control-wrap">
                                                    <div class="form-icon form-icon-right">
                                                        <em class="icon ni ni-search"></em>
                                                    </div>
                                                    <input type="text" class="form-control" id="default-04"
                                                        placeholder="Quick search by id">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="drodown">
                                                    <a href="#"
                                                        class="dropdown-toggle dropdown-indicator btn btn-outline-light btn-white"
                                                        data-toggle="dropdown">Status</a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <ul class="link-list-opt no-bdr">
                                                            <li><a href="#"><span>New Items</span></a></li>
                                                            <li><a href="#"><span>Featured</span></a></li>
                                                            <li><a href="#"><span>Out of Stock</span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="nk-block-tools-opt">
                                                <a href="#" data-target="addProduct"
                                                    class="toggle btn btn-icon btn-primary d-md-none"><em
                                                        class="icon ni ni-plus"></em></a>
                                                <a href="#" data-target="addProduct"
                                                    class="toggle btn btn-primary d-none d-md-inline-flex"><em
                                                        class="icon ni ni-plus"></em><span>Add Type</span></a>
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
                                                <div class="nk-tb-col tb-col-sm"><span>Name</span></div>
                                            </div><!-- .nk-tb-item -->
                                            @foreach($detail as $key => $value)
                                            <div class="nk-tb-item">
                                                <div class="nk-tb-col">
                                                    <span class="tb-sub">{{ $key+1 }}</span>
                                                </div>
                                                <div class="nk-tb-col tb-col-sm">
                                                    <span class="tb-product">
                                                        <span class="title">{{$value->PRD_TYPE}}</span>
                                                    </span>
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
                                                                        <li><a href="{{route('edit-detail',$value->id)}}"><em
                                                                                    class="icon ni ni-edit"></em><span>Edit
                                                                                    Type</span></a></li>
                                                                        <li><a href="{{route('destroy-detail',['id' => $value->id])}}"><em
                                                                                    class="icon ni ni-trash"></em><span>Remove
                                                                                    Type</span></a></li>
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
                        <form class='card p-3 bg-light' method="POST" action="{{ route('store-detail') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="nk-add-product toggle-slide toggle-slide-right" data-content="addProduct"
                                data-toggle-screen="any" data-toggle-overlay="true" data-toggle-body="true" data-simplebar>
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h5 class="nk-block-title">New Product Type</h5>
                                        <div class="nk-block-des">
                                            <p>Add information and add new Type.</p>
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label" for="product-title">Product Type</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" name="PRD_TYPE">
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
