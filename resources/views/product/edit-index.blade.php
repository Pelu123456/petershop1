@extends('admin.admin-layout',[
'title' => __($title ?? 'Dashboard')
])
@section('main')

             

                                    <div class="row g-gs">
                                   
                                            <div class="col-lg-6">
                                                <div class="card card-bordered h-100">
                                                    <div class="card-inner">
                                                        <div class="card-head">
                                                            <h5 class="card-title">Product Info</h5>
                                                        </div>
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
                                                        <form method="POST" action="{{route('update-product',['id' => $product->id])}}" enctype="multipart/form-data">
                                                        @method('PATCH')
                                                        @csrf
                                                            <div class="form-group">
                                                                <label class="form-label" for="full-name">Product Name</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" name="PR_NAME" value="{{$product->PR_NAME}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label" for="email-address">Price</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" name="PR_PRICE" value="{{$product->PR_PRICE}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label" for="phone-no">Stock</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" name="PR_STOCK" value="{{$product->PR_STOCK}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label" for="phone-no">Type</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" name="PR_TYPE" value="{{$product->PR_TYPE}}">
                                                                </div>
                                                            </div>
                                                    
                                                            <div class="form-group">
                                                                <label class="form-label" for="phone-no">Color</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" name="PR_COLOR" value="{{$product->PR_COLOR}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label" for="phone-no">Note</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" name="PR_NOTE" value="{{$product->PR_NOTE}}">
                                                                </div>
                                                            </div>
                    
                                                            

                                                            <div class="form-group">
                                                <label class="form-label" for="tags">Picture </label>
                                                <div class="form-control-wrap">
                                                    <input type="file" class="form-control-file" id="imgInp"
                                                        name="PR_PIC">
                                                        <img src="../../{{$product->PR_PIC}}" alt="" class="thumb">
                                                    <p>Preview</p>
                                                    <img id="preview" width="50%" />
                                                </div>
                                            </div>
                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-lg btn-primary">Save Informations</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>         
                                        <script>
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                preview.src = URL.createObjectURL(file)
            }
        }
    </script>       
 @endsection                                       