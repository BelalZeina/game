@extends('layouts.dashboard.app')
@section('header__title', __('models.users'))

@section('main')
    <div class="content-wrapper">
        <!-- Content -->


        <div class="container-xxl flex-grow-1 container-p-y">

            <div class="card">
                <div class="d-flex p-3 px-4 align-items-center justify-content-between w-100">
                    <h5 class="card-header p-0">{{ __('models.edit_user') }}</h5>
                    <a href="{{ route('users.index') }}" style="width: fit-content">
                        <button type="button" class="btn btn-dark d-flex align-items-center gap-2"> <i
                                class="fa-solid fa-backward"></i>
                        </button>
                    </a>
                </div>

                <div class="card-body">
                    <form class="forms-sample" method="POST" action="{{ route('users.update', $data->id) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group mb-3">
                            <label>{{ __('models.name') }}</label>
                            <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputName1"
                                placeholder="{{ __('models.name') }}" value="{{ old('name', $data->name) }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>{{ __('models.phone') }}</label>
                            <input name="phone" type="text" class="form-control @error('phone') is-invalid @enderror" id="exampleInputEmail3"
                                placeholder="{{ __('models.phone') }}" value="{{ old('phone', $data->phone) }}">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>{{ __('models.password') }}</label>
                            <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword4"
                                placeholder="{{ __('models.password') }}">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>{{ __('models.level') }}</label>
                            <select name="level" class="form-control" required>
                                <option value="">{{ __('models.select') }}</option>
                                @foreach ($levels as $key=>$level)
                                    <option value="{{ $key+1 }}" {{ $data->level== $key+1? 'selected' : '' }}>{{ $level->name }}</option>
                                @endforeach
                            </select>
                            @error('role')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>{{ __('models.img') }}</label>
                            <input type="file" name="img" class="form-control @error('img') is-invalid @enderror" id="imageInput" accept="image/*">
                            @error('img')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <img id="imagePreview" class="image-preview" src="{{ $data->img ? image_url($data->img) : '' }}"
                            alt="Image Preview" style="{{ $data->img ? '' : 'display:none;' }}">
                        <br>
                        <button type="submit" class="btn btn-success m-2">{{ __('models.submit') }}</button>
                    </form>


                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts-dashboard')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
    <script>
        $('#search_input').on('keyup', function() {
            table.search(this.value).draw();
        });
        $(document).ready(function() {
            // When the header checkbox is clicked
            $('#check__box').click(function() {
                // Check if it's checked or not
                var isChecked = $(this).prop('checked');

                // Iterate through each row in the table
                $('#myTable tbody tr').each(function() {
                    // Set the checkbox in each row to the same state as the header checkbox
                    $(this).find('.form-check-input.row__check').prop('checked', isChecked);
                });
            });
        });
    </script>
    <script>
        let table = new DataTable('#myTable');
    </script>

@endsection
