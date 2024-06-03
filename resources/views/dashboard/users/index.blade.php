@extends('layouts.dashboard.app')
@section('header__title', __("models.users"))
@section('header__icon', 'fa-solid fa-users')
@section('main')
    <div class="content-wrapper">
        <!-- Content -->


        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card">
                <div class="d-flex align-item-center p-4 justify-content-between w-100">

                    <h5 class="card-header p-0">{{__("models.users")}}</h5>
                    <div class="d-flex align-item-center gap-3">
                        <div class="d-felx d-xl-block mr-1"><!-- Hide on small screens -->
                            <button id="deleteSelected" class="btn btn-danger">
                                <i class="fa-regular fa-trash-can"></i>
                            </button>
                            <a class="btn btn-primary" href="{{ route('users.create') }}"><i class="fa fa-plus"></i></a>
                        </div>
                    </div>

                </div>

                <div class="d-flex align-item-center justify-content-between gap-3 mb-4 px-4">

                    <div class="d-flex groups__button align-item-center gap-3">
                        <input type="text" class="form-control" style="width:200px" id="search_input"
                            placeholder="{{ __('models.search') }}" aria-describedby="defaultFormControlHelp" />
                            <select name="myTable_length" aria-controls="myTable" class="dt-input" id="dt-length-0">
                                <option value="10" {{ request()->get('per_page') == 10 ? 'selected' : '' }}>10</option>
                                <option value="25" {{ request()->get('per_page') == 25 ? 'selected' : '' }}>25</option>
                                <option value="50" {{ request()->get('per_page') == 50 ? 'selected' : '' }}>50</option>
                                <option value="100" {{ request()->get('per_page') == 100 ? 'selected' : '' }}>100</option>
                            </select>

                    </div>
                </div>
                <div class="table-responsive text-nowrap px-4">
                    <table class="table text-center" id="myTable">
                        <thead>
                            <tr class="text-nowrap">
                                <th>
                                    <div class="d-flex align-items-center gap-2">
                                        <input class="form-check-input row__check" type="checkbox" value="" id="check__box" />
                                        {{ __("models.name") }}
                                    </div>
                                </th>
                                <th>{{ __("models.phone") }}</th>
                                <th>{{ __("models.img") }}</th>
                                <th>{{ __("models.active") }}</th>
                                <th>{{ __("models.expire_at") }}</th>
                                <th>{{ __("models.action") }}</th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($data as $user)
                                <tr>
                                    <th scope="row">
                                        <div class="d-flex align-items-center gap-2">
                                            <input class="form-check-input row__check" type="checkbox" value="{{ $user->id }}" />


                                            {{ $user->name }}
                                        </div>
                                    </th>
                                    <td> {{ $user->phone }}</td>
                                    <td><img src="{{image_url($user->img)}}" alt="" class="img-thumbnail rounded-circle" style="
                                        max-width: 50px;
                                        height: 50px;">
                                    </td>
                                    <td>
                                        @if ($user->expire_at < now())
                                        <div class="btn btn-icon btn-info"><i class="fa-solid fa-power-off"style="color:#fff"></i></div>
                                        @else
                                        <div class="btn btn-icon btn-dark"><i class="fa-solid fa-power-off"style="color:#fff"></i></div>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $user->expire_at?->format('Y-m-d') }}
                                    </td>
                                    <td class="">
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ route('users.edit', $user->id) }}"><i
                                                        class="bx bx-edit me-1"></i> {{ __('models.edit') }}</a>

                                                <a class="dropdown-item cursor-pointer" data-bs-toggle="modal"
                                                    data-bs-target="#{{"modalToggleActive-$user->id"}}"><i class="fa fa-power-off me-1"></i>
                                                    {{ __('models.active') }}</a>

                                                <a class="dropdown-item cursor-pointer" data-bs-toggle="modal"
                                                    data-bs-target="#{{"modalToggle-$user->id"}}"><i class="bx bx-trash me-1"></i>
                                                    {{ __('models.delete') }}</a>

                                                {{-- <a class="dropdown-item" href="{{ route('users.show', $user->id) }}"><i
                                                        class="bx bx-show me-1"></i> {{ __('models.show') }}</a> --}}
                                            </div>
                                        </div>
                                        @include('components.modalDelete', [
                                            'action' => 'users.destroy',
                                            'name' => $user->name,
                                            'title' => __('models.Are You Delete'),
                                            'modalToggle' => "modalToggle-$user->id",
                                            'id' => $user->id,
                                        ])
                                        @include('components.modalActive', [
                                            'action' => 'users.active',
                                            'name' => $user->name,
                                            'title' => __('models.Are You Active'),
                                            'modalToggle' => "modalToggleActive-$user->id",
                                            'id' => $user->id,
                                        ])
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('scripts-dashboard')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
    <script>
        let table = new DataTable('#myTable');
    </script>
    <script>
        $('#search_input').on('keyup', function() {
            table.search(this.value).draw();
        });

        $(document).ready(function() {
            function initializeDataTable() {
                let table = new DataTable('#myTable');
                return table;
            }
        $("#deleteSelected").click(function() {
            var selectedIds = [];
            $(".row__check:checked").each(function() {
                selectedIds.push($(this).val());
            });

                if (selectedIds.length > 0) {
                    $.ajax({
                        url: "{{ route('users.deleteSelected') }}",
                        type: "POST",
                        data: { ids: selectedIds },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            // Handle success response
                            console.log(response);
                            location.reload();
                        },
                        error: function(xhr, status, error) {
                            // Handle error
                            console.error(xhr.responseText);
                        }
                    });
                } else {
                    alert("Please select at least one item to delete.");
                }
            });
        });

    </script>


@endsection
