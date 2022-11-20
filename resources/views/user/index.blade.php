@extends('admin.admin-layout',[
'title' => __($title ?? 'Dashboard')
])
@section('main')

             

                                    <div class="row g-gs">
                                   
                                            <div class="col-lg-6">
                                                <div class="card card-bordered h-100">
                                                    <div class="card-inner">
                                                        <div class="card-head">
                                                            <h5 class="card-title">User Informations</h5>
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
                                                        <form method="POST" action="{{route('update-user', ['id' => Auth::user()->id])}}" enctype="multipart/form-data">
                                                        @method('PATCH')
                                                        @csrf
                                                            <div class="form-group">
                                                                <label class="form-label" for="full-name">Full Name</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" name="FULLNAME" value="{{Auth::user()->FULLNAME}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label" for="email-address">Email</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" name="email" value="{{Auth::user()->email}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label" for="phone-no">Phone</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" name="PHONENUMBER" value="{{Auth::user()->PHONENUMBER}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label" for="phone-no">address</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" name="ADRESS" value="{{Auth::user()->ADRESS}}">
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