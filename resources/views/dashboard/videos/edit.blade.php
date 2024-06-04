@extends('layouts.dashboard.app')
@section('header__title', __('models.admin'))

@section('main')
    <div class="content-wrapper">
        <!-- Content -->


        <div class="container-xxl flex-grow-1 container-p-y">

            <div class="card">
                <div class="d-flex p-3 px-4 align-items-center justify-content-between w-100">
                    <h5 class="card-header p-0">{{ __('models.edit_admin') }}</h5>
                    <a href="{{ route('videos.index') }}" style="width: fit-content">
                        <button type="button" class="btn btn-dark d-flex align-items-center gap-2"> <i
                                class="fa-solid fa-backward"></i>
                        </button>
                    </a>
                </div>

                <div class="card-body">
                    <form class="row g-3 needs-validation" method="POST" action="{{ route('videos.update',$data->id) }}"
                        enctype="multipart/form-data" novalidate>
                        @method('PUT')
                        @csrf

                        {{--  name_ar  --}}
                        <div class="col-md-6">
                            <label for="name_ar" class="form-label">{{ __('models.name_ar') }}</label>
                            <input type="text" class="form-control  @error('name_ar') is-invalid @enderror"
                                name="name_ar" value="{{ old('name_ar',$data->name_ar) }}" id="name_ar" required>
                            @error('name_ar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        {{--  name_en  --}}
                        <div class="col-md-6">
                            <label for="name_en" class="form-label">{{ __('models.name_en') }}</label>
                            <input type="text" class="form-control  @error('name_en') is-invalid @enderror"
                                name="name_en" value="{{ old('name_en',$data->name_en) }}" id="name_en" required>
                            @error('name_en')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{--  desc_ar  --}}
                        <div class="col-md-6">
                            <label for="desc_ar" class="form-label">{{ __('models.desc_ar') }}</label>
                            <input type="text" class="form-control  @error('desc_ar') is-invalid @enderror"
                                name="desc_ar" value="{{ old('desc_ar',$data->desc_ar) }}" id="desc_ar" required>
                            @error('desc_ar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        {{--  desc_en  --}}
                        <div class="col-md-6">
                            <label for="name_en" class="form-label">{{ __('models.desc_en') }}</label>
                            <input type="text" class="form-control  @error('desc_en') is-invalid @enderror"
                                name="desc_en" value="{{ old('desc_en',$data->desc_en) }}" id="desc_en" required>
                            @error('desc_en')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>


                        <div class="form-group mb-3">
                            <label>{{ __('models.img') }}</label>
                            <input type="file" name="img" class="form-control @error('img') is-invalid @enderror"
                                id="imageInput" accept="image/*">
                            @error('img')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <img id="imagePreview" class="image-preview mb-3"
                            src="{{ isset($data) && $data->img ? image_url($data->img) : '' }}" alt="Image Preview"
                            style="{{ isset($data) && $data->img ? '' : 'display:none;' }}">





                        {{-- card video  --}}
                        <div class="card">
                            <div class="card-body">

                                {{--  video  --}}
                                <div class="container pt-4">
                                    <div class="row justify-content-center">
                                        <div class="col-md-8">
                                            <div class="card">
                                                <div class="card-header text-center">
                                                    <h5>تحميل فيديو</h5>
                                                </div>

                                                <div class="card-body">
                                                    <div id="upload-container" class="text-center">
                                                        <a href="#" type="button" id="browseFile"
                                                            class="btn btn-primary">ملفات الجهاز</a>
                                                    </div>
                                                    <div style="display: none" class="progress mt-3" style="height: 25px">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated"
                                                            role="progressbar" aria-valuenow="10" aria-valuemin="0"
                                                            aria-valuemax="25" style="width: 75%; height: 100%">75%</div>
                                                    </div>
                                                </div>

                                                <div class="card-footer p-4" style="display: none">
                                                    <video id="videoPreview" src="" controls
                                                        style="width: 100%; height: auto"></video>
                                                </div>
                                            </div>
                                            <p>الصيغ المتاحة : mp4 - flv - m3u8 - ts - 3gp - mov - avi - wmv -
                                                mkv</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        {{--  end card  --}}
                        <div class="col-12">
                            <button type="submit" class="btn btn-success m-2">{{ __("Submit") }}</button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts-dashboard')
    @include('dashboard.videos.js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


@endsection
