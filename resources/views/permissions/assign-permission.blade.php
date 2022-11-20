@extends('admin.admin-layout',[
'title' => __($title ?? 'Dashboard')
])
@section('main')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin /</span>Assign Permisson</h4>

        <div class="card">
              <div class="card-inner p-0">
                <h4>Role Current: {{ $role->name }}</h4>
                <h5>Add Permission</h5>

                <form method="POST"
                    action="{{ route('admin.insert-permission', [$role->id]) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('Patch')
                    @foreach ($permission as $key => $permission)
                    <div class="form-check">
                        <input class="check" type="checkbox"
                        @foreach ($get_permission as
                            $key=>$get_per)
                        @if ($get_per->id==$permission->id)
                        checked
                        @endif
                        @endforeach
                        name="permission[]"
                        id="{{$permission->id}}" value="{{$permission->name}}">
                        <label class="form-check-label" for="{{$permission->id}}">
                            {{$permission->name}}
                        </label>
                    </div>
                    @endforeach
                    <button type="submit" class="btn btn-primary">Assign</button>

                </form>
            </div>
          </div>
    </div>
</div>
@endsection