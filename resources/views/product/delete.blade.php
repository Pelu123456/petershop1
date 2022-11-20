@extends('admin.admin-layout',[ 'title' => __($title ?? 'Dashboard') ])
@section('main')

<div class="row g-gs">
  <div class="col-lg-6">
    <div class="card card-bordered h-100">
      <div class="card-inner">
        <div class="card-head">
          <h5 class="card-title">Product Info</h5>
        </div>
        <div class="card">
          <form
            method="POST"
            action="{{route('delete-product',[$product->id])}}"
            enctype="multipart/form-data"
          >
            @method('DELETE') @csrf
            <div class="form-group">
              </div>
            </div>
            <div class="form-group">
              </div>
            </div>
            <div class="form-group">
              <label class="form-label" for="full-name">Are You Sure About That ?</label>
              </div>
            </div>
              </div>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-lg btn-primary">
                YES
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  @endsection
</div>
