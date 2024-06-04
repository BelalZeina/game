@extends('layouts.dashboard.app')
@section('header__title', __('models.roles'))
@section('header__icon', 'fa-solid fa-earth-americas')
@section('main')
    <div class="content-wrapper">
        <!-- Content -->


        <div class="container-xxl flex-grow-1 container-p-y">

            <div class="card">
                <div class="d-flex p-3 px-4 align-items-center justify-content-between w-100">
                    <h5 class="card-header p-0">{{ __('models.edit_role') }}</h5>
                    <a href="{{ route('roles.index') }}" style="width: fit-content">
                        <button type="button" class="btn btn-dark d-flex align-items-center gap-2"> <i
                                class="fa-solid fa-backward"></i>
                        </button>
                    </a>
                </div>

                <div class="card-body">
                    <form class="row g-3 needs-validation" method="POST" action="{{ route('roles.update', $role->id) }}" enctype="multipart/form-data" novalidate>
                        @method('PUT')
                        @csrf

                        {{--  name  --}}
                        <div class="col-md-6">
                            <label for="name" class="form-label">{{ __('models.name') }}</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name', $role->name) }}"
                                id="name" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            @error('name')
                                <span class="text-danger">
                                    <small class="errorTxt">{{ $message }}</small>
                                </span>
                            @enderror
                        </div>


                        <div class="table-responsive table-card mt-3 mb-1">
                            <table class="table align-middle table-nowrap" id="customerTable">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col" style="width: 50px;">

                                        </th>
                                        <th class="sort">{{ __('models.model') }}</th>
                                        <th class="sort">{{ __('models.permissions') }}</th>
                                        </th>

                                    </tr>
                                </thead>
                                <tbody class="list form-check-all">

                                    @foreach (config('laratrust_seeder.roles_structure.owner') as $model => $permissions)
                                        <tr>
                                            <th scope="row">
                                            </th>

                                            <td>{{ __('models.' . $model) }}</td>

                                            <td>
                                                <div class="permissions">


                                                    @foreach (explode(',', $permissions) as $permission)
                                                        <input type="checkbox"
                                                            value="{{ $model }}-{{ config('laratrust_seeder.permissions_map')[$permission] }}"
                                                            name="permissions[]" class="{{ $model }}"
                                                            {{ $role->hasPermission($model . '-' . config('laratrust_seeder.permissions_map')[$permission]) ? 'checked' : '' }}>
                                                        <label>{{ __('models.' . $permission) }}</label>
                                                    @endforeach

                                                </div>
                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>

                        </div>


                        <div class="col-12">
                            <button type="submit" class="btn btn-success m-2">{{ __('Submit') }}</button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>




@endsection


@section('js')
    <script src="{{ asset('dashboard/assets/js/preview-image.js') }}"></script>

@endsection
