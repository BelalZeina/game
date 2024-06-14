@extends('layouts.dashboard.app')
@section('header__title', __('models.levels'))
@section('header__icon', 'fa-solid fa-layer-group')
@section('main')
    <div class="content-wrapper">
        <!-- Content -->
        @php
            use Carbon\Carbon;
        @endphp
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card">
                <div class="d-flex align-item-center p-4 justify-content-between w-100">

                    <h5 class="card-header p-0">{{__("models.levels")}}</h5>
                    <div class="d-flex align-item-center gap-3">
                        <div class="d-felx d-xl-block mr-1"><!-- Hide on small screens -->
                            <button id="deleteSelected" class="btn btn-danger">
                                <i class="fa-regular fa-trash-can"></i>
                            </button>
                            <a class="btn btn-primary" href="{{ route('levels.create') }}"><i class="fa fa-plus"></i></a>
                        </div>
                    </div>

                </div>

                <div class="d-flex align-item-center justify-content-between gap-3 mb-4 px-4">

                    <div class="d-flex groups__button align-item-center gap-3">
                        <input type="text" class="form-control" style="width:200px" id="search_input"
                            placeholder="{{ __('models.search') }}" aria-describedby="defaultFormControlHelp" />

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
                                <th>{{ __("models.created_at") }}</th>
                                <th>{{ __("models.action") }}</th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($data as $level)
                                <tr>
                                    <th scope="row">
                                        <div class="d-flex align-items-center gap-2">
                                            <input class="form-check-input row__check" type="checkbox" value="{{ $level->id }}" />


                                            {{ $level->name }}
                                        </div>
                                    </th>
                                    <td>
                                        {{ optional(Carbon::parse($level->created_at))->format('Y-m-d') }}
                                    </td>

                                    <td class="">
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ route('levels.edit', $level->id) }}"><i
                                                        class="bx bx-edit me-1"></i> {{ __('models.edit') }}</a>

                                                <a class="dropdown-item cursor-pointer" data-bs-toggle="modal"
                                                    data-bs-target='{{"#modalToggle-$level->id"}}'><i class="bx bx-trash me-1"></i>
                                                    {{ __('models.d') }}</a>

                                                {{-- <a class="dropdown-item" href="{{ route('levels.show', $level->id) }}"><i
                                                        class="bx bx-show me-1"></i> {{ __('models.show') }}</a> --}}
                                            </div>
                                        </div>
                                        @include('components.modalDelete', [
                                            'action' => 'levels.destroy',
                                            'name' => $level->name,
                                            'title' => __('models.Are You Delete'),
                                            'modalToggle' => "modalToggle-$level->id",
                                            'id' => $level->id,
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
<link href="{{ asset('asset/datatables/datatables.bundle.rtl.css') }}" rel="stylesheet"
        type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
    <script>
        let table = new DataTable('#myTable', {
                "order": [] // Disable initial ordering
            });
    </script>
    <script>
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
                        url: "{{ route('levels.deleteSelected') }}",
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
