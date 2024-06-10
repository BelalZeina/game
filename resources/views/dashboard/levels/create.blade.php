@extends('layouts.dashboard.app')
@section("header__title", __("models.level"))
@section('main')
    <div class="content-wrapper">
        <!-- Content -->


        <div class="container-xxl flex-grow-1 container-p-y">

            <div class="card">
                <div class="d-flex p-3 px-4 align-items-center justify-content-between w-100">
                    <h5 class="card-header p-0">{{ __('models.add_level') }}</h5>
                    <a href="{{ route('levels.index') }}" style="width: fit-content">
                        <button type="button" class="btn btn-dark d-flex align-items-center gap-2"> <i
                                class="fa-solid fa-backward"></i>
                        </button>
                    </a>
                </div>
                <div class="card-body">

                    <form class="forms-sample" method="POST" action="{{ route('levels.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label>{{ __("models.name_ar") }}</label>
                            <input name="name_ar" type="text" class="form-control @error('name_ar') is-invalid @enderror" id="exampleInputname_ar1" placeholder="{{ __("models.name_ar") }}" value="{{ old('name_ar') }}">
                            @error('name_ar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>{{ __("models.name_en") }}</label>
                            <input name="name_en" type="text" class="form-control @error('name_en') is-invalid @enderror" id="exampleInputname_en1" placeholder="{{ __("models.name_en") }}" value="{{ old('name_en') }}">
                            @error('name_en')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success m-2">{{ __("Submit") }}</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection


