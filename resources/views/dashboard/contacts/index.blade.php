@extends('layouts.dashboard.app')
@section('header__title', "الموقع الخارجى")
@section('header__icon', 'fa-solid fa-earth-americas')
@section('main')
    <div class="content-wrapper">
        <!-- Content -->


        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card">
                <div class="d-flex align-item-center p-4 justify-content-between w-100">

                    <h5 class="card-header p-0">تواصل معنا </h5>
                    <div class="d-flex align-item-center gap-3">
                        <button type="button" class="btn btn-danger">
                            <i class="fa-regular fa-trash-can"></i>
                           حذف
                        </button>

                    </div>

                </div>

                <div class="d-flex align-item-center justify-content-between gap-3 mb-4 px-4">

                    <div class="d-flex groups__button align-item-center gap-3">
                        <input type="text" class="form-control" style="width:200px" id="search_input"
                            placeholder="{{ __('home.Search') }}" aria-describedby="defaultFormControlHelp" />
                        <select name="myTable_length" aria-controls="myTable" class="dt-input" id="dt-length-0"
                            fdprocessedid="0z9mam">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                       
                        

                    </div>


                </div>
                <div class="table-responsive text-nowrap px-4">
                    <table class="table" id="myTable">
                        <thead>
                            <tr class="text-nowrap">
                                <th>
                                    <div class="d-flex align-items-center gap-2">
                                        <input class="form-check-input row__check" type="checkbox" value=""
                                            id="check__box" />
                                      الاسم
                                    </div>
                                </th>
                                <th>الايميل</th>
                                <th>رقم الهاتف</th>
                                <th>الرساله</th>
                                <th>الحددث</th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($admins as $admin)
                                <tr>
                                    <th scope="row">
                                        <div class="d-flex align-items-center gap-2">
                                            <input class="form-check-input row__check" type="checkbox" value=""
                                                id="defaultCheck3" />

                                            {{ $admin->name }}
                                        </div>
                                    </th>
                                    <td> {{ $admin->email }}</td>
                                    <td> {{ $admin->phone }}</td>
                                    <td> {{ $admin->msg }}</td>

                                    <td class="">
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                               
                                                <a class="dropdown-item cursor-pointer" data-bs-toggle="modal"
                                                    data-bs-target="#modalToggle"><i class="bx bx-trash me-1"></i>
                                                    {{ __('home.Delete') }}</a>
                                                <a class="dropdown-item"
                                                    href="{{ route('contacts.show', $admin->id) }}"><i
                                                        class="bx bx-show me-1"></i> {{ __('home.Show') }}</a>
                                            </div>
                                        </div>
                                        @include('components.modalDelete', [
                                            'action' => 'contacts.destroy',
                                            'name' => $admin->name,
                                            'title' => __('home.Are You Delete'),
                                            'modalToggle' => 'modalToggle',
                                            'id' => $admin->id,
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
