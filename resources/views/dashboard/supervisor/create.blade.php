@extends('layouts.dashboard.app')
@section("header__title", __("models.supervisor"))
@section('main')
    <div class="content-wrapper">
        <!-- Content -->


        <div class="container-xxl flex-grow-1 container-p-y">

            <div class="card">
                <div class="d-flex p-3 px-4 align-items-center justify-content-between w-100">
                    <h5 class="card-header p-0">{{ __('models.add_supervisor') }}</h5>
                    <a href="{{ route('supervisors.index') }}" style="width: fit-content">
                        <button type="button" class="btn btn-dark d-flex align-items-center gap-2"> <i
                                class="fa-solid fa-backward"></i>
                        </button>
                    </a>
                </div>
                <div class="card-body">

                    <form class="forms-sample" method="POST" action="{{ route('supervisors.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label>{{ __("models.name") }}</label>
                            <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputName1" placeholder="{{ __("models.name") }}" value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>{{ __("models.phone") }}</label>
                            <input name="phone" type="text" class="form-control @error('phone') is-invalid @enderror" id="exampleInputEmail3" placeholder="{{ __("models.phone") }}" value="{{ old('phone') }}">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>{{ __("models.password") }}</label>
                            <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword4" placeholder="{{ __("models.password") }}">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>{{ __("models.img") }}</label>
                            <input type="file" name="img" class="form-control @error('img') is-invalid @enderror" id="imageInput" accept="image/*">
                            @error('img')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <img id="imagePreview" class="image-preview mb-3" src="{{ isset($data) && $data->img ? image_url($data->img) : '' }}" alt="Image Preview" style="{{ isset($data) && $data->img ? '' : 'display:none;' }}">
                        <br>
                        <button type="submit" class="btn btn-success m-2">{{ __("Submit") }}</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection


