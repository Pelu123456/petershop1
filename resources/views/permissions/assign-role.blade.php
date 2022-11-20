@extends('admin.admin-layout',[
'title' => __($title ?? 'Dashboard')
])
@section('main')

    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin /</span>Assign Permission</h4>

            <div class="card">

                <h4>Assigning Role</h4>
                <h4>Current User: {{ $user->FULLNAME }}</h4>

                <form method="POST" action="{{ route('admin.insert-role', [$user->id]) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('Patch')
                    @if ($get_colum_roles == null)
                        <h6>Not have roles yet !</h6>
                    @else
                        <h6></h6>
                    @endif
                    <h5>add Role</h5>
                    @foreach ($role as $roles)
                        @if (isset($get_colum_roles))
                            <div class="form-check">
                                <input class="form-check-input" {{ $roles->id == $get_colum_roles->id ? 'checked' : '' }}
                                    type="checkbox" name="role[]" id="{{ $roles->id }}" value="{{ $roles->name }}">
                                <label class="form-check-label" for="{{ $roles->id }}">
                                    {{ $roles->name }}
                                </label>
                            </div>
                        @else
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="role[]" id="{{ $roles->id }}"
                                    value="{{ $roles->name }}">
                                <label class="form-check-label" for="{{ $roles->id }}">
                                    {{ $roles->name }}
                                </label>
                            </div>
                        @endif
                    @endforeach
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection