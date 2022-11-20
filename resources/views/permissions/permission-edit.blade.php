@extends('admin.admin-layout',[
'title' => __($title ?? 'Dashboard')
])
@section('main')

             

                                    <div class="row g-gs">
                                   
                                            <div class="col-lg-6">
                                                <div class="card card-bordered h-100">
                                                    <div class="card-inner">
                                                        <div class="card-head">
                                                            <h5 class="card-title">Pet Info</h5>
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
                                                        <form method="POST" action="{{route('admin.update-permission',['id' => $permission->id])}}" enctype="multipart/form-data">
                                                        @method('PATCH')
                                                        @csrf
                                                            <div class="form-group">
                                                                <label class="form-label" for="full-name">Permission Name</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" name="name" value="{{$permission->name}}">
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
                                    
 @endsection                                       