@extends('layouts.dashboard.app')
@section('header__title', __('models.dashboard'))
@section('header__icon', 'fa-solid fa-house')

@section('main')
    {{-- <div class="container"> --}}

    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Card Border Shadow -->
        <div class="row">
            <div class="col-sm-6 col-lg-3 mb-4">
                <div class="card card-border-shadow-primary h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2 pb-1">
                            <div class="avatar me-2">
                                <span class="avatar-initial rounded bg-label-primary"><i class="fa fa-users"></i></span>
                            </div>
                            <h4 class="ms-1 mb-0">{{ \App\Models\User::count() }}</h4>
                        </div>
                        <p class="mb-1 h4">{{ __('models.students') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-4">
                <div class="card card-border-shadow-warning h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2 pb-1">
                            <div class="avatar me-2">
                                <span class="avatar-initial rounded bg-label-warning"><i class="fa fa-users"></i></span>
                            </div>
                            <h4 class="ms-1 mb-0">{{ \App\Models\Admin::count() }}</h4>
                        </div>
                        <p class="mb-1 h4">{{ __('models.admins') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-4">
                <div class="card card-border-shadow-danger h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2 pb-1">
                            <div class="avatar me-2">
                                <span class="avatar-initial rounded bg-label-danger"><i
                                        class="fa-solid fa-file-circle-question"></i></span>
                            </div>
                            <h4 class="ms-1 mb-0">{{ \App\Models\Exam::count() }}</h4>
                        </div>
                        <p class="mb-1 h4">{{ __('models.exams') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-4">
                <div class="card card-border-shadow-info h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2 pb-1">
                            <div class="avatar me-2">
                                <span class="avatar-initial rounded bg-label-info"><i class="fa fa-video"></i></span>
                            </div>
                            <h4 class="ms-1 mb-0">{{ \App\Models\Video::count() }}</h4>
                        </div>
                        <p class="mb-1 h4">{{ __('models.videos') }}</p>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Card Border Shadow -->
        <div class="row">
            <!-- Vehicles overview -->
            <div class="col-lg-6 col-xxl-6 mb-4 order-3 order-xxl-1">
                <div class="card h-100">
                    <div class="card-header">
                        <div class="card-title mb-0">
                            <h5 class="m-0">{{__("models.top 5 users in exams")}}</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table card-table">
                                <thead>
                                    <tr class="text-nowrap">
                                        <th>
                                            {{ __('models.name') }}
                                        </th>
                                        <th>{{ __('models.average_score') }}</th>
                                        <th>{{ __('models.exams_count') }}</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">

                                    @foreach ($top_users as $user)
                                        <tr>
                                            <td>
                                                <div class="d-flex justify-content-start align-items-center">
                                                  <div class="avatar me-2">
                                                    <img src="{{image_url($user->img)}}" alt="Avatar" class="rounded-circle">
                                                  </div>
                                                  <div class="d-flex flex-column">
                                                    <h6 class="mb-0 text-truncate">{{$user->name}}</h6>
                                                  </div>
                                                </div>
                                              </td>
                                            <td> {{ $user->average_score }}</td>
                                            <td>{{$user->exams_count}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Vehicles overview -->
            <!-- Shipment statistics-->
            <div class="col-lg-6 col-xxl-6 mb-4 order-3 order-xxl-1">
                <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        {{ __('models.Number of Users in levels') }}
                    </div>
                    <div class="card-body" style="position: relative;">
                        <div style=" margin: auto;">
                            <canvas id="userCountChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xxl-6 mb-4 order-3 order-xxl-1">
                <div class="card h-100">
                    <div class="card-header">
                        <h5 class="m-0">{{ __('models.Level Completion Rates') }}</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="examCompletionRatesChart"></canvas>
                    </div>
                </div>
            </div>


            <div class="col-lg-6 col-xxl-6 mb-4 order-3 order-xxl-1">
                    <div class="card h-100">
                      <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="card-title m-0 me-2">{{__("models.The last 5 users have joined")}}</h5>
                      </div>
                      <div class="table-responsive">
                        <table class="table table-borderless">
                          <thead>
                            <tr>
                                <th>{{ __('models.name') }}</th>
                                <th>{{ __('models.phone') }}</th>
                                <th>{{ __('models.level') }}</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($last_users as $item)
                            <tr>
                              <td>
                                <div class="d-flex justify-content-start align-items-center">
                                  <div class="avatar me-2">
                                    <img src="{{image_url($item->img)}}" alt="Avatar" class="rounded-circle">
                                  </div>
                                  <div class="d-flex flex-column">
                                    <h6 class="mb-0 text-truncate">{{$item->name}}</h6><small class="text-truncate text-muted">level {{$item->level}}</small>
                                  </div>
                                </div>
                              </td>
                              <td><span class="badge bg-label-primary rounded-pill text-uppercase">{{$item->phone}}</span></td>
                              <td><small class="fw-medium">{{$item->level}}/9</small></td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
            </div>

        </div>
        <!--/ On route vehicles Table -->
    </div>
    {{-- </div> --}}
@endsection
{{-- https://demos.themeselection.com/sneat-bootstrap-html-admin-template/html/vertical-menu-template/app-logistics-dashboard.html --}}
@section('scripts-dashboard')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        let data = {!! $chart_user !!}
        $(document).ready(function() {
            const levels = data.map(item => item.level);
            const userCounts = data.map(item => item.user_count);

            const ctx = document.getElementById('userCountChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: levels,
                    datasets: [{
                        label: 'Number of Users in levels',
                        data: userCounts,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            const examCompletionRates = {!! $levelCompletionRates !!};
            const examTitles = examCompletionRates.map(item => item.level_id);
            const completionRates = examCompletionRates.map(item => item.completion_rate);

            const ctxExamCompletionRates = document.getElementById('examCompletionRatesChart').getContext('2d');
            new Chart(ctxExamCompletionRates, {
                type: 'pie',
                data: {
                    labels: examTitles,
                    datasets: [{
                        label: '{{ __("models.Completion Rate (%)") }}',
                        data: completionRates,

                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
@endsection
