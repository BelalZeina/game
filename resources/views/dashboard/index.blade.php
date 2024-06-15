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
                                <span class="avatar-initial rounded bg-label-primary"><i class="bx bxs-truck"></i></span>
                            </div>
                            <h4 class="ms-1 mb-0">42</h4>
                        </div>
                        <p class="mb-1">On route vehicles</p>
                        <p class="mb-0">
                            <span class="fw-medium me-1">+18.2%</span>
                            <small class="text-muted">than last week</small>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-4">
                <div class="card card-border-shadow-warning h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2 pb-1">
                            <div class="avatar me-2">
                                <span class="avatar-initial rounded bg-label-warning"><i class="bx bx-error"></i></span>
                            </div>
                            <h4 class="ms-1 mb-0">8</h4>
                        </div>
                        <p class="mb-1">Vehicles with errors</p>
                        <p class="mb-0">
                            <span class="fw-medium me-1">-8.7%</span>
                            <small class="text-muted">than last week</small>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-4">
                <div class="card card-border-shadow-danger h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2 pb-1">
                            <div class="avatar me-2">
                                <span class="avatar-initial rounded bg-label-danger"><i
                                        class="bx bx-git-repo-forked"></i></span>
                            </div>
                            <h4 class="ms-1 mb-0">27</h4>
                        </div>
                        <p class="mb-1">Deviated from route</p>
                        <p class="mb-0">
                            <span class="fw-medium me-1">+4.3%</span>
                            <small class="text-muted">than last week</small>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-4">
                <div class="card card-border-shadow-info h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2 pb-1">
                            <div class="avatar me-2">
                                <span class="avatar-initial rounded bg-label-info"><i class="bx bx-time-five"></i></span>
                            </div>
                            <h4 class="ms-1 mb-0">13</h4>
                        </div>
                        <p class="mb-1">Late vehicles</p>
                        <p class="mb-0">
                            <span class="fw-medium me-1">-2.5%</span>
                            <small class="text-muted">than last week</small>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Card Border Shadow -->
        <div class="row">
            <!-- Vehicles overview -->
            <div class="col-xxl-6 mb-4 order-5 order-xxl-0">
                <div class="card h-100">
                    <div class="card-header">
                        <div class="card-title mb-0">
                            <h5 class="m-0">Vehicles overview</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-none d-lg-flex vehicles-progress-labels mb-3">
                            <div class="vehicles-progress-label on-the-way-text" style="width: 39.7%;">On the way</div>
                            <div class="vehicles-progress-label unloading-text" style="width: 28.3%;">Unloading</div>
                            <div class="vehicles-progress-label loading-text" style="width: 17.4%;">Loading</div>
                            <div class="vehicles-progress-label waiting-text" style="width: 14.6%;">Waiting</div>
                        </div>
                        <div class="vehicles-overview-progress progress rounded-2 mb-3" style="height: 46px;">
                            <div class="progress-bar fs-big fw-medium text-start bg-lighter text-body px-1 px-lg-3 rounded-start shadow-none"
                                role="progressbar" style="width: 39.7%" aria-valuenow="39.7" aria-valuemin="0"
                                aria-valuemax="100">39.7%</div>
                            <div class="progress-bar fs-big fw-medium text-start bg-primary px-1 px-lg-3 shadow-none"
                                role="progressbar" style="width: 28.3%" aria-valuenow="28.3" aria-valuemin="0"
                                aria-valuemax="100">28.3%</div>
                            <div class="progress-bar fs-big fw-medium text-start text-bg-info px-1 px-lg-3 shadow-none"
                                role="progressbar" style="width: 17.4%" aria-valuenow="17.4" aria-valuemin="0"
                                aria-valuemax="100">17.4%</div>
                            <div class="progress-bar fs-big fw-medium text-start bg-gray-900 px-1 px-lg-3 rounded-end shadow-none"
                                role="progressbar" style="width: 14.6%" aria-valuenow="14.6" aria-valuemin="0"
                                aria-valuemax="100">14.6%</div>
                        </div>
                        <div class="table-responsive">
                            <table class="table card-table">
                                <tbody class="table-border-bottom-0">
                                    <tr>
                                        <td class="w-50 ps-0">
                                            <div class="d-flex justify-content-start align-items-center">
                                                <div class="me-2">
                                                    <i class="bx bxs-truck"></i>
                                                </div>
                                                <h6 class="mb-0 fw-normal">On the way</h6>
                                            </div>
                                        </td>
                                        <td class="text-end pe-0 text-nowrap">
                                            <h6 class="mb-0">2hr 10min</h6>
                                        </td>
                                        <td class="text-end pe-0">
                                            <span class="fw-medium">39.7%</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w-50 ps-0">
                                            <div class="d-flex justify-content-start align-items-center">
                                                <div class="me-2">
                                                    <i class="bx bx-down-arrow-circle"></i>
                                                </div>
                                                <h6 class="mb-0 fw-normal">Unloading</h6>
                                            </div>
                                        </td>
                                        <td class="text-end pe-0 text-nowrap">
                                            <h6 class="mb-0">3hr 15min</h6>
                                        </td>
                                        <td class="text-end pe-0">
                                            <span class="fw-medium">28.3%</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w-50 ps-0">
                                            <div class="d-flex justify-content-start align-items-center">
                                                <div class="me-2">
                                                    <i class="bx bx-up-arrow-circle"></i>
                                                </div>
                                                <h6 class="mb-0 fw-normal">Loading</h6>
                                            </div>
                                        </td>
                                        <td class="text-end pe-0 text-nowrap">
                                            <h6 class="mb-0">1hr 24min</h6>
                                        </td>
                                        <td class="text-end pe-0">
                                            <span class="fw-medium">17.4%</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w-50 ps-0">
                                            <div class="d-flex justify-content-start align-items-center">
                                                <div class="me-2">
                                                    <i class="bx bx-time-five"></i>
                                                </div>
                                                <h6 class="mb-0 fw-normal">Waiting</h6>
                                            </div>
                                        </td>
                                        <td class="text-end pe-0 text-nowrap">
                                            <h6 class="mb-0">5hr 19min</h6>
                                        </td>
                                        <td class="text-end pe-0">
                                            <span class="fw-medium">14.6%</span>
                                        </td>
                                    </tr>
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
                        <div class="card-title mb-0">
                            <h5 class="m-0 me-2">Shipment statistics</h5>
                            <small class="text-muted">Total number of deliveries 23.8k</small>
                        </div>
                        <div class="dropdown">
                            <button type="button" class="btn btn-label-primary dropdown-toggle"
                                data-bs-toggle="dropdown" aria-expanded="false">January</button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="javascript:void(0);">January</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0);">February</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0);">March</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0);">April</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0);">May</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0);">June</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0);">July</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0);">August</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0);">September</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0);">October</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0);">November</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0);">December</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body" style="position: relative;">
                        <div id="shipmentStatisticsChart" style="min-height: 415px;">
                            <div id="apexchartsw1d3ys6o"
                                class="apexcharts-canvas apexchartsw1d3ys6o apexcharts-theme-light"
                                style="width: 446px; height: 415px;"><svg id="SvgjsSvg1940" width="446"
                                    height="415" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
                                    class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                    style="background: transparent;">
                                    <foreignObject x="0" y="0" width="446" height="415">
                                        <div class="apexcharts-legend apexcharts-align-center apx-legend-position-bottom"
                                            xmlns="http://www.w3.org/1999/xhtml"
                                            style="height: 40px; inset: auto 0px -7px; position: absolute;">
                                            <div class="apexcharts-legend-series" rel="1" seriesname="Shipment"
                                                data:collapsed="false" style="margin: 0px 10px;"><span
                                                    class="apexcharts-legend-marker" rel="1"
                                                    data:collapsed="false"
                                                    style="background: rgb(255, 171, 0) !important; color: rgb(255, 171, 0); height: 8px; width: 8px; left: -3px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span
                                                    class="apexcharts-legend-text" rel="1" i="0"
                                                    data:default-text="Shipment" data:collapsed="false"
                                                    style="color: rgb(86, 106, 127); font-size: 13px; font-weight: 400; font-family: &quot;Public Sans&quot;;">Shipment</span>
                                            </div>
                                            <div class="apexcharts-legend-series" rel="2" seriesname="Delivery"
                                                data:collapsed="false" style="margin: 0px 10px;"><span
                                                    class="apexcharts-legend-marker" rel="2"
                                                    data:collapsed="false"
                                                    style="background: rgb(105, 108, 255) !important; color: rgb(105, 108, 255); height: 8px; width: 8px; left: -3px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span
                                                    class="apexcharts-legend-text" rel="2" i="1"
                                                    data:default-text="Delivery" data:collapsed="false"
                                                    style="color: rgb(86, 106, 127); font-size: 13px; font-weight: 400; font-family: &quot;Public Sans&quot;;">Delivery</span>
                                            </div>
                                        </div>

                                    </foreignObject>
                                    <g id="SvgjsG1942" class="apexcharts-inner apexcharts-graphical"
                                        transform="translate(77.78936269548204, 30)">
                                        <defs id="SvgjsDefs1941">
                                            <clipPath id="gridRectMaskw1d3ys6o">
                                                <rect id="SvgjsRect1948" width="371.68608379364014"
                                                    height="314.878400308609" x="-22.00689199235704" y="-1.5"
                                                    rx="0" ry="0" opacity="1" stroke-width="0"
                                                    stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                            </clipPath>
                                            <clipPath id="forecastMaskw1d3ys6o"></clipPath>
                                            <clipPath id="nonForecastMaskw1d3ys6o"></clipPath>
                                            <clipPath id="gridRectMarkerMaskw1d3ys6o">
                                                <rect id="SvgjsRect1949" width="347.672299808926"
                                                    height="331.878400308609" x="-10" y="-10" rx="0"
                                                    ry="0" opacity="1" stroke-width="0" stroke="none"
                                                    stroke-dasharray="0" fill="#fff"></rect>
                                            </clipPath>
                                        </defs>
                                        <line id="SvgjsLine1947" x1="0" y1="0" x2="0"
                                            y2="311.878400308609" stroke="#b6b6b6" stroke-dasharray="3"
                                            stroke-linecap="butt" class="apexcharts-xcrosshairs" x="0" y="0"
                                            width="1" height="311.878400308609" fill="#b1b9c4" filter="none"
                                            fill-opacity="0.9" stroke-width="1"></line>
                                        <g id="SvgjsG1998" class="apexcharts-xaxis" transform="translate(0, 0)">
                                            <g id="SvgjsG1999" class="apexcharts-xaxis-texts-g"
                                                transform="translate(0, -4)"><text id="SvgjsText2001"
                                                    font-family="Public Sans" x="0" y="340.878400308609"
                                                    text-anchor="middle" dominant-baseline="auto" font-size="10px"
                                                    font-weight="400" fill="#a1acb8"
                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                    style="font-family: &quot;Public Sans&quot;;">
                                                    <tspan id="SvgjsTspan2002">1 Jan</tspan>
                                                    <title>1 Jan</title>
                                                </text><text id="SvgjsText2004" font-family="Public Sans"
                                                    x="36.40803331210289" y="340.878400308609" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="10px" font-weight="400"
                                                    fill="#a1acb8" class="apexcharts-text apexcharts-xaxis-label "
                                                    style="font-family: &quot;Public Sans&quot;;">
                                                    <tspan id="SvgjsTspan2005">2 Jan</tspan>
                                                    <title>2 Jan</title>
                                                </text><text id="SvgjsText2007" font-family="Public Sans"
                                                    x="72.81606662420579" y="340.878400308609" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="10px" font-weight="400"
                                                    fill="#a1acb8" class="apexcharts-text apexcharts-xaxis-label "
                                                    style="font-family: &quot;Public Sans&quot;;">
                                                    <tspan id="SvgjsTspan2008">3 Jan</tspan>
                                                    <title>3 Jan</title>
                                                </text><text id="SvgjsText2010" font-family="Public Sans"
                                                    x="109.22409993630869" y="340.878400308609" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="10px" font-weight="400"
                                                    fill="#a1acb8" class="apexcharts-text apexcharts-xaxis-label "
                                                    style="font-family: &quot;Public Sans&quot;;">
                                                    <tspan id="SvgjsTspan2011">4 Jan</tspan>
                                                    <title>4 Jan</title>
                                                </text><text id="SvgjsText2013" font-family="Public Sans"
                                                    x="145.6321332484116" y="340.878400308609" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="10px" font-weight="400"
                                                    fill="#a1acb8" class="apexcharts-text apexcharts-xaxis-label "
                                                    style="font-family: &quot;Public Sans&quot;;">
                                                    <tspan id="SvgjsTspan2014">5 Jan</tspan>
                                                    <title>5 Jan</title>
                                                </text><text id="SvgjsText2016" font-family="Public Sans"
                                                    x="182.0401665605145" y="340.878400308609" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="10px" font-weight="400"
                                                    fill="#a1acb8" class="apexcharts-text apexcharts-xaxis-label "
                                                    style="font-family: &quot;Public Sans&quot;;">
                                                    <tspan id="SvgjsTspan2017">6 Jan</tspan>
                                                    <title>6 Jan</title>
                                                </text><text id="SvgjsText2019" font-family="Public Sans"
                                                    x="218.4481998726174" y="340.878400308609" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="10px" font-weight="400"
                                                    fill="#a1acb8" class="apexcharts-text apexcharts-xaxis-label "
                                                    style="font-family: &quot;Public Sans&quot;;">
                                                    <tspan id="SvgjsTspan2020">7 Jan</tspan>
                                                    <title>7 Jan</title>
                                                </text><text id="SvgjsText2022" font-family="Public Sans"
                                                    x="254.8562331847203" y="340.878400308609" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="10px" font-weight="400"
                                                    fill="#a1acb8" class="apexcharts-text apexcharts-xaxis-label "
                                                    style="font-family: &quot;Public Sans&quot;;">
                                                    <tspan id="SvgjsTspan2023">8 Jan</tspan>
                                                    <title>8 Jan</title>
                                                </text><text id="SvgjsText2025" font-family="Public Sans"
                                                    x="291.26426649682315" y="340.878400308609" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="10px" font-weight="400"
                                                    fill="#a1acb8" class="apexcharts-text apexcharts-xaxis-label "
                                                    style="font-family: &quot;Public Sans&quot;;">
                                                    <tspan id="SvgjsTspan2026">9 Jan</tspan>
                                                    <title>9 Jan</title>
                                                </text><text id="SvgjsText2028" font-family="Public Sans"
                                                    x="327.672299808926" y="340.878400308609" text-anchor="middle"
                                                    dominant-baseline="auto" font-size="10px" font-weight="400"
                                                    fill="#a1acb8" class="apexcharts-text apexcharts-xaxis-label "
                                                    style="font-family: &quot;Public Sans&quot;;">
                                                    <tspan id="SvgjsTspan2029">10 Jan</tspan>
                                                    <title>10 Jan</title>
                                                </text></g>
                                        </g>
                                        <g id="SvgjsG2042" class="apexcharts-grid">
                                            <g id="SvgjsG2043" class="apexcharts-gridlines-horizontal">
                                                <line id="SvgjsLine2045" x1="-18.50689199235704" y1="0"
                                                    x2="346.1791918012831" y2="0" stroke="#e0e0e0"
                                                    stroke-dasharray="8" stroke-linecap="butt"
                                                    class="apexcharts-gridline"></line>
                                                <line id="SvgjsLine2046" x1="-18.50689199235704" y1="77.96960007715225"
                                                    x2="346.1791918012831" y2="77.96960007715225" stroke="#e0e0e0"
                                                    stroke-dasharray="8" stroke-linecap="butt"
                                                    class="apexcharts-gridline"></line>
                                                <line id="SvgjsLine2047" x1="-18.50689199235704" y1="155.9392001543045"
                                                    x2="346.1791918012831" y2="155.9392001543045" stroke="#e0e0e0"
                                                    stroke-dasharray="8" stroke-linecap="butt"
                                                    class="apexcharts-gridline"></line>
                                                <line id="SvgjsLine2048" x1="-18.50689199235704" y1="233.90880023145675"
                                                    x2="346.1791918012831" y2="233.90880023145675" stroke="#e0e0e0"
                                                    stroke-dasharray="8" stroke-linecap="butt"
                                                    class="apexcharts-gridline"></line>
                                                <line id="SvgjsLine2049" x1="-18.50689199235704" y1="311.878400308609"
                                                    x2="346.1791918012831" y2="311.878400308609" stroke="#e0e0e0"
                                                    stroke-dasharray="8" stroke-linecap="butt"
                                                    class="apexcharts-gridline"></line>
                                            </g>
                                            <g id="SvgjsG2044" class="apexcharts-gridlines-vertical"></g>
                                            <line id="SvgjsLine2051" x1="0" y1="311.878400308609"
                                                x2="327.672299808926" y2="311.878400308609" stroke="transparent"
                                                stroke-dasharray="0" stroke-linecap="butt"></line>
                                            <line id="SvgjsLine2050" x1="0" y1="1" x2="0"
                                                y2="311.878400308609" stroke="transparent" stroke-dasharray="0"
                                                stroke-linecap="butt"></line>
                                        </g>
                                        <g id="SvgjsG1950" class="apexcharts-bar-series apexcharts-plot-series">
                                            <g id="SvgjsG1951" class="apexcharts-series" rel="1"
                                                seriesName="Shipment" data:realIndex="0">
                                                <path id="SvgjsPath1955"
                                                    d="M -9.102008328025724 385.8480003857612L -9.102008328025724 97.56352009258268Q -9.102008328025724 93.56352009258268 -5.102008328025724 93.56352009258268L 5.102008328025724 93.56352009258268Q 9.102008328025724 93.56352009258268 9.102008328025724 97.56352009258268L 9.102008328025724 97.56352009258268L 9.102008328025724 385.8480003857612Q 9.102008328025724 389.8480003857612 5.102008328025724 389.8480003857612L -5.102008328025724 389.8480003857612Q -9.102008328025724 389.8480003857612 -9.102008328025724 385.8480003857612z"
                                                    fill="rgba(255,171,0,1)" fill-opacity="1" stroke-opacity="1"
                                                    stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                    class="apexcharts-bar-area" index="0"
                                                    clip-path="url(#gridRectMaskw1d3ys6o)"
                                                    pathTo="M -9.102008328025724 385.8480003857612L -9.102008328025724 97.56352009258268Q -9.102008328025724 93.56352009258268 -5.102008328025724 93.56352009258268L 5.102008328025724 93.56352009258268Q 9.102008328025724 93.56352009258268 9.102008328025724 97.56352009258268L 9.102008328025724 97.56352009258268L 9.102008328025724 385.8480003857612Q 9.102008328025724 389.8480003857612 5.102008328025724 389.8480003857612L -5.102008328025724 389.8480003857612Q -9.102008328025724 389.8480003857612 -9.102008328025724 385.8480003857612z"
                                                    pathFrom="M -9.102008328025724 385.8480003857612L -9.102008328025724 385.8480003857612L 9.102008328025724 385.8480003857612L 9.102008328025724 385.8480003857612L 9.102008328025724 385.8480003857612L 9.102008328025724 385.8480003857612L 9.102008328025724 385.8480003857612L -9.102008328025724 385.8480003857612"
                                                    cy="93.56352009258268" cx="9.102008328025724" j="0" val="38"
                                                    barHeight="296.28448029317855" barWidth="18.204016656051447"></path>
                                                <path id="SvgjsPath1957"
                                                    d="M 27.30602498407717 385.8480003857612L 27.30602498407717 42.98480003857611Q 27.30602498407717 38.98480003857611 31.30602498407717 38.98480003857611L 41.51004164012862 38.98480003857611Q 45.51004164012862 38.98480003857611 45.51004164012862 42.98480003857611L 45.51004164012862 42.98480003857611L 45.51004164012862 385.8480003857612Q 45.51004164012862 389.8480003857612 41.51004164012862 389.8480003857612L 31.30602498407717 389.8480003857612Q 27.30602498407717 389.8480003857612 27.30602498407717 385.8480003857612z"
                                                    fill="rgba(255,171,0,1)" fill-opacity="1" stroke-opacity="1"
                                                    stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                    class="apexcharts-bar-area" index="0"
                                                    clip-path="url(#gridRectMaskw1d3ys6o)"
                                                    pathTo="M 27.30602498407717 385.8480003857612L 27.30602498407717 42.98480003857611Q 27.30602498407717 38.98480003857611 31.30602498407717 38.98480003857611L 41.51004164012862 38.98480003857611Q 45.51004164012862 38.98480003857611 45.51004164012862 42.98480003857611L 45.51004164012862 42.98480003857611L 45.51004164012862 385.8480003857612Q 45.51004164012862 389.8480003857612 41.51004164012862 389.8480003857612L 31.30602498407717 389.8480003857612Q 27.30602498407717 389.8480003857612 27.30602498407717 385.8480003857612z"
                                                    pathFrom="M 27.30602498407717 385.8480003857612L 27.30602498407717 385.8480003857612L 45.51004164012862 385.8480003857612L 45.51004164012862 385.8480003857612L 45.51004164012862 385.8480003857612L 45.51004164012862 385.8480003857612L 45.51004164012862 385.8480003857612L 27.30602498407717 385.8480003857612"
                                                    cy="38.98480003857611" cx="45.51004164012862" j="1" val="45"
                                                    barHeight="350.8632003471851" barWidth="18.204016656051447"></path>
                                                <path id="SvgjsPath1959"
                                                    d="M 63.71405829618006 385.8480003857612L 63.71405829618006 136.5483201311588Q 63.71405829618006 132.5483201311588 67.71405829618007 132.5483201311588L 77.9180749522315 132.5483201311588Q 81.9180749522315 132.5483201311588 81.9180749522315 136.5483201311588L 81.9180749522315 136.5483201311588L 81.9180749522315 385.8480003857612Q 81.9180749522315 389.8480003857612 77.9180749522315 389.8480003857612L 67.71405829618007 389.8480003857612Q 63.71405829618006 389.8480003857612 63.71405829618006 385.8480003857612z"
                                                    fill="rgba(255,171,0,1)" fill-opacity="1" stroke-opacity="1"
                                                    stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                    class="apexcharts-bar-area" index="0"
                                                    clip-path="url(#gridRectMaskw1d3ys6o)"
                                                    pathTo="M 63.71405829618006 385.8480003857612L 63.71405829618006 136.5483201311588Q 63.71405829618006 132.5483201311588 67.71405829618007 132.5483201311588L 77.9180749522315 132.5483201311588Q 81.9180749522315 132.5483201311588 81.9180749522315 136.5483201311588L 81.9180749522315 136.5483201311588L 81.9180749522315 385.8480003857612Q 81.9180749522315 389.8480003857612 77.9180749522315 389.8480003857612L 67.71405829618007 389.8480003857612Q 63.71405829618006 389.8480003857612 63.71405829618006 385.8480003857612z"
                                                    pathFrom="M 63.71405829618006 385.8480003857612L 63.71405829618006 385.8480003857612L 81.9180749522315 385.8480003857612L 81.9180749522315 385.8480003857612L 81.9180749522315 385.8480003857612L 81.9180749522315 385.8480003857612L 81.9180749522315 385.8480003857612L 63.71405829618006 385.8480003857612"
                                                    cy="132.5483201311588" cx="81.9180749522315" j="2" val="33"
                                                    barHeight="257.29968025460244" barWidth="18.204016656051447"></path>
                                                <path id="SvgjsPath1961"
                                                    d="M 100.12209160828296 385.8480003857612L 100.12209160828296 97.56352009258268Q 100.12209160828296 93.56352009258268 104.12209160828296 93.56352009258268L 114.32610826433441 93.56352009258268Q 118.32610826433441 93.56352009258268 118.32610826433441 97.56352009258268L 118.32610826433441 97.56352009258268L 118.32610826433441 385.8480003857612Q 118.32610826433441 389.8480003857612 114.32610826433441 389.8480003857612L 104.12209160828296 389.8480003857612Q 100.12209160828296 389.8480003857612 100.12209160828296 385.8480003857612z"
                                                    fill="rgba(255,171,0,1)" fill-opacity="1" stroke-opacity="1"
                                                    stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                    class="apexcharts-bar-area" index="0"
                                                    clip-path="url(#gridRectMaskw1d3ys6o)"
                                                    pathTo="M 100.12209160828296 385.8480003857612L 100.12209160828296 97.56352009258268Q 100.12209160828296 93.56352009258268 104.12209160828296 93.56352009258268L 114.32610826433441 93.56352009258268Q 118.32610826433441 93.56352009258268 118.32610826433441 97.56352009258268L 118.32610826433441 97.56352009258268L 118.32610826433441 385.8480003857612Q 118.32610826433441 389.8480003857612 114.32610826433441 389.8480003857612L 104.12209160828296 389.8480003857612Q 100.12209160828296 389.8480003857612 100.12209160828296 385.8480003857612z"
                                                    pathFrom="M 100.12209160828296 385.8480003857612L 100.12209160828296 385.8480003857612L 118.32610826433441 385.8480003857612L 118.32610826433441 385.8480003857612L 118.32610826433441 385.8480003857612L 118.32610826433441 385.8480003857612L 118.32610826433441 385.8480003857612L 100.12209160828296 385.8480003857612"
                                                    cy="93.56352009258268" cx="118.32610826433441" j="3" val="38"
                                                    barHeight="296.28448029317855" barWidth="18.204016656051447"></path>
                                                <path id="SvgjsPath1963"
                                                    d="M 136.53012492038584 385.8480003857612L 136.53012492038584 144.34528013887402Q 136.53012492038584 140.34528013887402 140.53012492038584 140.34528013887402L 150.73414157643728 140.34528013887402Q 154.73414157643728 140.34528013887402 154.73414157643728 144.34528013887402L 154.73414157643728 144.34528013887402L 154.73414157643728 385.8480003857612Q 154.73414157643728 389.8480003857612 150.73414157643728 389.8480003857612L 140.53012492038584 389.8480003857612Q 136.53012492038584 389.8480003857612 136.53012492038584 385.8480003857612z"
                                                    fill="rgba(255,171,0,1)" fill-opacity="1" stroke-opacity="1"
                                                    stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                    class="apexcharts-bar-area" index="0"
                                                    clip-path="url(#gridRectMaskw1d3ys6o)"
                                                    pathTo="M 136.53012492038584 385.8480003857612L 136.53012492038584 144.34528013887402Q 136.53012492038584 140.34528013887402 140.53012492038584 140.34528013887402L 150.73414157643728 140.34528013887402Q 154.73414157643728 140.34528013887402 154.73414157643728 144.34528013887402L 154.73414157643728 144.34528013887402L 154.73414157643728 385.8480003857612Q 154.73414157643728 389.8480003857612 150.73414157643728 389.8480003857612L 140.53012492038584 389.8480003857612Q 136.53012492038584 389.8480003857612 136.53012492038584 385.8480003857612z"
                                                    pathFrom="M 136.53012492038584 385.8480003857612L 136.53012492038584 385.8480003857612L 154.73414157643728 385.8480003857612L 154.73414157643728 385.8480003857612L 154.73414157643728 385.8480003857612L 154.73414157643728 385.8480003857612L 154.73414157643728 385.8480003857612L 136.53012492038584 385.8480003857612"
                                                    cy="140.34528013887402" cx="154.73414157643728" j="4" val="32"
                                                    barHeight="249.5027202468872" barWidth="18.204016656051447"></path>
                                                <path id="SvgjsPath1965"
                                                    d="M 172.93815823248875 385.8480003857612L 172.93815823248875 4Q 172.93815823248875 0 176.93815823248875 0L 187.14217488854018 0Q 191.14217488854018 0 191.14217488854018 4L 191.14217488854018 4L 191.14217488854018 385.8480003857612Q 191.14217488854018 389.8480003857612 187.14217488854018 389.8480003857612L 176.93815823248875 389.8480003857612Q 172.93815823248875 389.8480003857612 172.93815823248875 385.8480003857612z"
                                                    fill="rgba(255,171,0,1)" fill-opacity="1" stroke-opacity="1"
                                                    stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                    class="apexcharts-bar-area" index="0"
                                                    clip-path="url(#gridRectMaskw1d3ys6o)"
                                                    pathTo="M 172.93815823248875 385.8480003857612L 172.93815823248875 4Q 172.93815823248875 0 176.93815823248875 0L 187.14217488854018 0Q 191.14217488854018 0 191.14217488854018 4L 191.14217488854018 4L 191.14217488854018 385.8480003857612Q 191.14217488854018 389.8480003857612 187.14217488854018 389.8480003857612L 176.93815823248875 389.8480003857612Q 172.93815823248875 389.8480003857612 172.93815823248875 385.8480003857612z"
                                                    pathFrom="M 172.93815823248875 385.8480003857612L 172.93815823248875 385.8480003857612L 191.14217488854018 385.8480003857612L 191.14217488854018 385.8480003857612L 191.14217488854018 385.8480003857612L 191.14217488854018 385.8480003857612L 191.14217488854018 385.8480003857612L 172.93815823248875 385.8480003857612"
                                                    cy="0" cx="191.14217488854018" j="5" val="50"
                                                    barHeight="389.8480003857612" barWidth="18.204016656051447"></path>
                                                <path id="SvgjsPath1967"
                                                    d="M 209.34619154459162 385.8480003857612L 209.34619154459162 19.5939200154304Q 209.34619154459162 15.593920015430399 213.34619154459162 15.593920015430399L 223.55020820064306 15.593920015430399Q 227.55020820064306 15.593920015430399 227.55020820064306 19.5939200154304L 227.55020820064306 19.5939200154304L 227.55020820064306 385.8480003857612Q 227.55020820064306 389.8480003857612 223.55020820064306 389.8480003857612L 213.34619154459162 389.8480003857612Q 209.34619154459162 389.8480003857612 209.34619154459162 385.8480003857612z"
                                                    fill="rgba(255,171,0,1)" fill-opacity="1" stroke-opacity="1"
                                                    stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                    class="apexcharts-bar-area" index="0"
                                                    clip-path="url(#gridRectMaskw1d3ys6o)"
                                                    pathTo="M 209.34619154459162 385.8480003857612L 209.34619154459162 19.5939200154304Q 209.34619154459162 15.593920015430399 213.34619154459162 15.593920015430399L 223.55020820064306 15.593920015430399Q 227.55020820064306 15.593920015430399 227.55020820064306 19.5939200154304L 227.55020820064306 19.5939200154304L 227.55020820064306 385.8480003857612Q 227.55020820064306 389.8480003857612 223.55020820064306 389.8480003857612L 213.34619154459162 389.8480003857612Q 209.34619154459162 389.8480003857612 209.34619154459162 385.8480003857612z"
                                                    pathFrom="M 209.34619154459162 385.8480003857612L 209.34619154459162 385.8480003857612L 227.55020820064306 385.8480003857612L 227.55020820064306 385.8480003857612L 227.55020820064306 385.8480003857612L 227.55020820064306 385.8480003857612L 227.55020820064306 385.8480003857612L 209.34619154459162 385.8480003857612"
                                                    cy="15.593920015430399" cx="227.55020820064306" j="6" val="48"
                                                    barHeight="374.2540803703308" barWidth="18.204016656051447"></path>
                                                <path id="SvgjsPath1969"
                                                    d="M 245.75422485669452 385.8480003857612L 245.75422485669452 81.96960007715222Q 245.75422485669452 77.96960007715222 249.75422485669452 77.96960007715222L 259.958241512746 77.96960007715222Q 263.958241512746 77.96960007715222 263.958241512746 81.96960007715222L 263.958241512746 81.96960007715222L 263.958241512746 385.8480003857612Q 263.958241512746 389.8480003857612 259.958241512746 389.8480003857612L 249.75422485669452 389.8480003857612Q 245.75422485669452 389.8480003857612 245.75422485669452 385.8480003857612z"
                                                    fill="rgba(255,171,0,1)" fill-opacity="1" stroke-opacity="1"
                                                    stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                    class="apexcharts-bar-area" index="0"
                                                    clip-path="url(#gridRectMaskw1d3ys6o)"
                                                    pathTo="M 245.75422485669452 385.8480003857612L 245.75422485669452 81.96960007715222Q 245.75422485669452 77.96960007715222 249.75422485669452 77.96960007715222L 259.958241512746 77.96960007715222Q 263.958241512746 77.96960007715222 263.958241512746 81.96960007715222L 263.958241512746 81.96960007715222L 263.958241512746 385.8480003857612Q 263.958241512746 389.8480003857612 259.958241512746 389.8480003857612L 249.75422485669452 389.8480003857612Q 245.75422485669452 389.8480003857612 245.75422485669452 385.8480003857612z"
                                                    pathFrom="M 245.75422485669452 385.8480003857612L 245.75422485669452 385.8480003857612L 263.958241512746 385.8480003857612L 263.958241512746 385.8480003857612L 263.958241512746 385.8480003857612L 263.958241512746 385.8480003857612L 263.958241512746 385.8480003857612L 245.75422485669452 385.8480003857612"
                                                    cy="77.96960007715222" cx="263.958241512746" j="7" val="40"
                                                    barHeight="311.878400308609" barWidth="18.204016656051447"></path>
                                                <path id="SvgjsPath1971"
                                                    d="M 282.16225816879745 385.8480003857612L 282.16225816879745 66.37568006172177Q 282.16225816879745 62.375680061721766 286.16225816879745 62.375680061721766L 296.3662748248489 62.375680061721766Q 300.3662748248489 62.375680061721766 300.3662748248489 66.37568006172177L 300.3662748248489 66.37568006172177L 300.3662748248489 385.8480003857612Q 300.3662748248489 389.8480003857612 296.3662748248489 389.8480003857612L 286.16225816879745 389.8480003857612Q 282.16225816879745 389.8480003857612 282.16225816879745 385.8480003857612z"
                                                    fill="rgba(255,171,0,1)" fill-opacity="1" stroke-opacity="1"
                                                    stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                    class="apexcharts-bar-area" index="0"
                                                    clip-path="url(#gridRectMaskw1d3ys6o)"
                                                    pathTo="M 282.16225816879745 385.8480003857612L 282.16225816879745 66.37568006172177Q 282.16225816879745 62.375680061721766 286.16225816879745 62.375680061721766L 296.3662748248489 62.375680061721766Q 300.3662748248489 62.375680061721766 300.3662748248489 66.37568006172177L 300.3662748248489 66.37568006172177L 300.3662748248489 385.8480003857612Q 300.3662748248489 389.8480003857612 296.3662748248489 389.8480003857612L 286.16225816879745 389.8480003857612Q 282.16225816879745 389.8480003857612 282.16225816879745 385.8480003857612z"
                                                    pathFrom="M 282.16225816879745 385.8480003857612L 282.16225816879745 385.8480003857612L 300.3662748248489 385.8480003857612L 300.3662748248489 385.8480003857612L 300.3662748248489 385.8480003857612L 300.3662748248489 385.8480003857612L 300.3662748248489 385.8480003857612L 282.16225816879745 385.8480003857612"
                                                    cy="62.375680061721766" cx="300.3662748248489" j="8" val="42"
                                                    barHeight="327.47232032403946" barWidth="18.204016656051447"></path>
                                                <path id="SvgjsPath1973"
                                                    d="M 318.5702914809003 385.8480003857612L 318.5702914809003 105.36048010029788Q 318.5702914809003 101.36048010029788 322.5702914809003 101.36048010029788L 332.7743081369518 101.36048010029788Q 336.7743081369518 101.36048010029788 336.7743081369518 105.36048010029788L 336.7743081369518 105.36048010029788L 336.7743081369518 385.8480003857612Q 336.7743081369518 389.8480003857612 332.7743081369518 389.8480003857612L 322.5702914809003 389.8480003857612Q 318.5702914809003 389.8480003857612 318.5702914809003 385.8480003857612z"
                                                    fill="rgba(255,171,0,1)" fill-opacity="1" stroke-opacity="1"
                                                    stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                    class="apexcharts-bar-area" index="0"
                                                    clip-path="url(#gridRectMaskw1d3ys6o)"
                                                    pathTo="M 318.5702914809003 385.8480003857612L 318.5702914809003 105.36048010029788Q 318.5702914809003 101.36048010029788 322.5702914809003 101.36048010029788L 332.7743081369518 101.36048010029788Q 336.7743081369518 101.36048010029788 336.7743081369518 105.36048010029788L 336.7743081369518 105.36048010029788L 336.7743081369518 385.8480003857612Q 336.7743081369518 389.8480003857612 332.7743081369518 389.8480003857612L 322.5702914809003 389.8480003857612Q 318.5702914809003 389.8480003857612 318.5702914809003 385.8480003857612z"
                                                    pathFrom="M 318.5702914809003 385.8480003857612L 318.5702914809003 385.8480003857612L 336.7743081369518 385.8480003857612L 336.7743081369518 385.8480003857612L 336.7743081369518 385.8480003857612L 336.7743081369518 385.8480003857612L 336.7743081369518 385.8480003857612L 318.5702914809003 385.8480003857612"
                                                    cy="101.36048010029788" cx="336.7743081369518" j="9" val="37"
                                                    barHeight="288.48752028546335" barWidth="18.204016656051447"></path>
                                                <g id="SvgjsG1953" class="apexcharts-bar-goals-markers"
                                                    style="pointer-events: none">
                                                    <g id="SvgjsG1954" className="apexcharts-bar-goals-groups"></g>
                                                    <g id="SvgjsG1956" className="apexcharts-bar-goals-groups"></g>
                                                    <g id="SvgjsG1958" className="apexcharts-bar-goals-groups"></g>
                                                    <g id="SvgjsG1960" className="apexcharts-bar-goals-groups"></g>
                                                    <g id="SvgjsG1962" className="apexcharts-bar-goals-groups"></g>
                                                    <g id="SvgjsG1964" className="apexcharts-bar-goals-groups"></g>
                                                    <g id="SvgjsG1966" className="apexcharts-bar-goals-groups"></g>
                                                    <g id="SvgjsG1968" className="apexcharts-bar-goals-groups"></g>
                                                    <g id="SvgjsG1970" className="apexcharts-bar-goals-groups"></g>
                                                    <g id="SvgjsG1972" className="apexcharts-bar-goals-groups"></g>
                                                </g>
                                            </g>
                                        </g>
                                        <g id="SvgjsG1974" class="apexcharts-line-series apexcharts-plot-series">
                                            <g id="SvgjsG1975" class="apexcharts-series" seriesName="Delivery"
                                                data:longestSeries="true" rel="1" data:realIndex="1">
                                                <path id="SvgjsPath1997"
                                                    d="M 0 210.51792020831104C 12.742811659236013 210.51792020831104 23.665221652866883 171.53312016973493 36.408033312102894 171.53312016973493C 49.150844971338906 171.53312016973493 60.07325496496978 210.51792020831104 72.81606662420579 210.51792020831104C 85.5588782834418 210.51792020831104 96.48128827707266 140.34528013887402 109.22409993630868 140.34528013887402C 121.96691159554469 140.34528013887402 132.88932158917555 171.53312016973493 145.63213324841158 171.53312016973493C 158.3749449076476 171.53312016973493 169.29735490127845 46.78176004629131 182.04016656051448 46.78176004629131C 194.78297821975048 46.78176004629131 205.70538821338135 140.34528013887402 218.44819987261735 140.34528013887402C 231.19101153185338 140.34528013887402 242.11342152548423 93.56352009258268 254.85623318472025 93.56352009258268C 267.5990448439563 93.56352009258268 278.52145483758716 187.12704018516538 291.26426649682315 187.12704018516538C 304.00707815605915 187.12704018516538 314.92948814969003 124.75136012344359 327.672299808926 124.75136012344359"
                                                    fill="none" fill-opacity="1" stroke="rgba(105,108,255,1)"
                                                    stroke-opacity="1" stroke-linecap="round" stroke-width="3"
                                                    stroke-dasharray="0" class="apexcharts-line" index="1"
                                                    clip-path="url(#gridRectMaskw1d3ys6o)"
                                                    pathTo="M 0 210.51792020831104C 12.742811659236013 210.51792020831104 23.665221652866883 171.53312016973493 36.408033312102894 171.53312016973493C 49.150844971338906 171.53312016973493 60.07325496496978 210.51792020831104 72.81606662420579 210.51792020831104C 85.5588782834418 210.51792020831104 96.48128827707266 140.34528013887402 109.22409993630868 140.34528013887402C 121.96691159554469 140.34528013887402 132.88932158917555 171.53312016973493 145.63213324841158 171.53312016973493C 158.3749449076476 171.53312016973493 169.29735490127845 46.78176004629131 182.04016656051448 46.78176004629131C 194.78297821975048 46.78176004629131 205.70538821338135 140.34528013887402 218.44819987261735 140.34528013887402C 231.19101153185338 140.34528013887402 242.11342152548423 93.56352009258268 254.85623318472025 93.56352009258268C 267.5990448439563 93.56352009258268 278.52145483758716 187.12704018516538 291.26426649682315 187.12704018516538C 304.00707815605915 187.12704018516538 314.92948814969003 124.75136012344359 327.672299808926 124.75136012344359"
                                                    pathFrom="M -1 389.8480003857612L -1 389.8480003857612L 36.408033312102894 389.8480003857612L 72.81606662420579 389.8480003857612L 109.22409993630868 389.8480003857612L 145.63213324841158 389.8480003857612L 182.04016656051448 389.8480003857612L 218.44819987261735 389.8480003857612L 254.85623318472025 389.8480003857612L 291.26426649682315 389.8480003857612L 327.672299808926 389.8480003857612">
                                                </path>
                                                <g id="SvgjsG1976" class="apexcharts-series-markers-wrap"
                                                    data:realIndex="1">
                                                    <g id="SvgjsG1978" class="apexcharts-series-markers"
                                                        clip-path="url(#gridRectMarkerMaskw1d3ys6o)">
                                                        <circle id="SvgjsCircle1979" r="4" cx="0"
                                                            cy="210.51792020831104" class="apexcharts-marker wj4iu4y8ok"
                                                            stroke="#696cff" fill="#ffffff" fill-opacity="1"
                                                            stroke-width="2" stroke-opacity="0.9" rel="0" j="0"
                                                            index="1" default-marker-size="4"></circle>
                                                        <circle id="SvgjsCircle1980" r="4" cx="36.408033312102894"
                                                            cy="171.53312016973493" class="apexcharts-marker w7ljdnuap"
                                                            stroke="#696cff" fill="#ffffff" fill-opacity="1"
                                                            stroke-width="2" stroke-opacity="0.9" rel="1" j="1"
                                                            index="1" default-marker-size="4"></circle>
                                                    </g>
                                                    <g id="SvgjsG1981" class="apexcharts-series-markers"
                                                        clip-path="url(#gridRectMarkerMaskw1d3ys6o)">
                                                        <circle id="SvgjsCircle1982" r="4" cx="72.81606662420579"
                                                            cy="210.51792020831104" class="apexcharts-marker w646wg2dq"
                                                            stroke="#696cff" fill="#ffffff" fill-opacity="1"
                                                            stroke-width="2" stroke-opacity="0.9" rel="2" j="2"
                                                            index="1" default-marker-size="4"></circle>
                                                    </g>
                                                    <g id="SvgjsG1983" class="apexcharts-series-markers"
                                                        clip-path="url(#gridRectMarkerMaskw1d3ys6o)">
                                                        <circle id="SvgjsCircle1984" r="4" cx="109.22409993630868"
                                                            cy="140.34528013887402" class="apexcharts-marker wewp5wbsn"
                                                            stroke="#696cff" fill="#ffffff" fill-opacity="1"
                                                            stroke-width="2" stroke-opacity="0.9" rel="3" j="3"
                                                            index="1" default-marker-size="4"></circle>
                                                    </g>
                                                    <g id="SvgjsG1985" class="apexcharts-series-markers"
                                                        clip-path="url(#gridRectMarkerMaskw1d3ys6o)">
                                                        <circle id="SvgjsCircle1986" r="4" cx="145.63213324841158"
                                                            cy="171.53312016973493" class="apexcharts-marker wgx7qs2w3"
                                                            stroke="#696cff" fill="#ffffff" fill-opacity="1"
                                                            stroke-width="2" stroke-opacity="0.9" rel="4" j="4"
                                                            index="1" default-marker-size="4"></circle>
                                                    </g>
                                                    <g id="SvgjsG1987" class="apexcharts-series-markers"
                                                        clip-path="url(#gridRectMarkerMaskw1d3ys6o)">
                                                        <circle id="SvgjsCircle1988" r="4" cx="182.04016656051448"
                                                            cy="46.78176004629131" class="apexcharts-marker wahqecqsh"
                                                            stroke="#696cff" fill="#ffffff" fill-opacity="1"
                                                            stroke-width="2" stroke-opacity="0.9" rel="5" j="5"
                                                            index="1" default-marker-size="4"></circle>
                                                    </g>
                                                    <g id="SvgjsG1989" class="apexcharts-series-markers"
                                                        clip-path="url(#gridRectMarkerMaskw1d3ys6o)">
                                                        <circle id="SvgjsCircle1990" r="4" cx="218.44819987261735"
                                                            cy="140.34528013887402" class="apexcharts-marker wo4mp4nue"
                                                            stroke="#696cff" fill="#ffffff" fill-opacity="1"
                                                            stroke-width="2" stroke-opacity="0.9" rel="6" j="6"
                                                            index="1" default-marker-size="4"></circle>
                                                    </g>
                                                    <g id="SvgjsG1991" class="apexcharts-series-markers"
                                                        clip-path="url(#gridRectMarkerMaskw1d3ys6o)">
                                                        <circle id="SvgjsCircle1992" r="4" cx="254.85623318472025"
                                                            cy="93.56352009258268" class="apexcharts-marker wdzmkrw0o"
                                                            stroke="#696cff" fill="#ffffff" fill-opacity="1"
                                                            stroke-width="2" stroke-opacity="0.9" rel="7" j="7"
                                                            index="1" default-marker-size="4"></circle>
                                                    </g>
                                                    <g id="SvgjsG1993" class="apexcharts-series-markers"
                                                        clip-path="url(#gridRectMarkerMaskw1d3ys6o)">
                                                        <circle id="SvgjsCircle1994" r="4" cx="291.26426649682315"
                                                            cy="187.12704018516538" class="apexcharts-marker w0ppu6xm5"
                                                            stroke="#696cff" fill="#ffffff" fill-opacity="1"
                                                            stroke-width="2" stroke-opacity="0.9" rel="8" j="8"
                                                            index="1" default-marker-size="4"></circle>
                                                    </g>
                                                    <g id="SvgjsG1995" class="apexcharts-series-markers"
                                                        clip-path="url(#gridRectMarkerMaskw1d3ys6o)">
                                                        <circle id="SvgjsCircle1996" r="4" cx="327.672299808926"
                                                            cy="124.75136012344359" class="apexcharts-marker wdiaqmfy2"
                                                            stroke="#696cff" fill="#ffffff" fill-opacity="1"
                                                            stroke-width="2" stroke-opacity="0.9" rel="9" j="9"
                                                            index="1" default-marker-size="4"></circle>
                                                    </g>
                                                </g>
                                            </g>
                                            <g id="SvgjsG1952" class="apexcharts-datalabels" data:realIndex="0"></g>
                                            <g id="SvgjsG1977" class="apexcharts-datalabels" data:realIndex="1"></g>
                                        </g>
                                        <line id="SvgjsLine2052" x1="-18.50689199235704" y1="0"
                                            x2="346.1791918012831" y2="0" stroke="#b6b6b6" stroke-dasharray="0"
                                            stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                        <line id="SvgjsLine2053" x1="-18.50689199235704" y1="0"
                                            x2="346.1791918012831" y2="0" stroke-dasharray="0" stroke-width="0"
                                            stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                                        <g id="SvgjsG2054" class="apexcharts-yaxis-annotations"></g>
                                        <g id="SvgjsG2055" class="apexcharts-xaxis-annotations"></g>
                                        <g id="SvgjsG2056" class="apexcharts-point-annotations"></g>
                                    </g>
                                    <rect id="SvgjsRect1946" width="0" height="0" x="0" y="0" rx="0"
                                        ry="0" opacity="1" stroke-width="0" stroke="none"
                                        stroke-dasharray="0" fill="#fefefe"></rect>
                                    <g id="SvgjsG2030" class="apexcharts-yaxis" rel="0"
                                        transform="translate(25.282470703125, 0)">
                                        <g id="SvgjsG2031" class="apexcharts-yaxis-texts-g"><text id="SvgjsText2032"
                                                font-family="Public Sans" x="20" y="31.4" text-anchor="end"
                                                dominant-baseline="auto" font-size="13px" font-weight="400"
                                                fill="#a1acb8" class="apexcharts-text apexcharts-yaxis-label "
                                                style="font-family: &quot;Public Sans&quot;;">
                                                <tspan id="SvgjsTspan2033">50%</tspan>
                                                <title>50%</title>
                                            </text><text id="SvgjsText2034" font-family="Public Sans" x="20"
                                                y="109.36960007715226" text-anchor="end" dominant-baseline="auto"
                                                font-size="13px" font-weight="400" fill="#a1acb8"
                                                class="apexcharts-text apexcharts-yaxis-label "
                                                style="font-family: &quot;Public Sans&quot;;">
                                                <tspan id="SvgjsTspan2035">40%</tspan>
                                                <title>40%</title>
                                            </text><text id="SvgjsText2036" font-family="Public Sans" x="20"
                                                y="187.3392001543045" text-anchor="end" dominant-baseline="auto"
                                                font-size="13px" font-weight="400" fill="#a1acb8"
                                                class="apexcharts-text apexcharts-yaxis-label "
                                                style="font-family: &quot;Public Sans&quot;;">
                                                <tspan id="SvgjsTspan2037">30%</tspan>
                                                <title>30%</title>
                                            </text><text id="SvgjsText2038" font-family="Public Sans" x="20"
                                                y="265.30880023145676" text-anchor="end" dominant-baseline="auto"
                                                font-size="13px" font-weight="400" fill="#a1acb8"
                                                class="apexcharts-text apexcharts-yaxis-label "
                                                style="font-family: &quot;Public Sans&quot;;">
                                                <tspan id="SvgjsTspan2039">20%</tspan>
                                                <title>20%</title>
                                            </text><text id="SvgjsText2040" font-family="Public Sans" x="20"
                                                y="343.278400308609" text-anchor="end" dominant-baseline="auto"
                                                font-size="13px" font-weight="400" fill="#a1acb8"
                                                class="apexcharts-text apexcharts-yaxis-label "
                                                style="font-family: &quot;Public Sans&quot;;">
                                                <tspan id="SvgjsTspan2041">10%</tspan>
                                                <title>10%</title>
                                            </text></g>
                                    </g>
                                    <g id="SvgjsG1943" class="apexcharts-annotations"></g>
                                </svg>
                                <div class="apexcharts-tooltip apexcharts-theme-light">
                                    <div class="apexcharts-tooltip-title"
                                        style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div>
                                    <div class="apexcharts-tooltip-series-group" style="order: 1;"><span
                                            class="apexcharts-tooltip-marker"
                                            style="background-color: rgb(255, 171, 0);"></span>
                                        <div class="apexcharts-tooltip-text"
                                            style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                            <div class="apexcharts-tooltip-y-group"><span
                                                    class="apexcharts-tooltip-text-y-label"></span><span
                                                    class="apexcharts-tooltip-text-y-value"></span></div>
                                            <div class="apexcharts-tooltip-goals-group"><span
                                                    class="apexcharts-tooltip-text-goals-label"></span><span
                                                    class="apexcharts-tooltip-text-goals-value"></span></div>
                                            <div class="apexcharts-tooltip-z-group"><span
                                                    class="apexcharts-tooltip-text-z-label"></span><span
                                                    class="apexcharts-tooltip-text-z-value"></span></div>
                                        </div>
                                    </div>
                                    <div class="apexcharts-tooltip-series-group" style="order: 2;"><span
                                            class="apexcharts-tooltip-marker"
                                            style="background-color: rgb(105, 108, 255);"></span>
                                        <div class="apexcharts-tooltip-text"
                                            style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                            <div class="apexcharts-tooltip-y-group"><span
                                                    class="apexcharts-tooltip-text-y-label"></span><span
                                                    class="apexcharts-tooltip-text-y-value"></span></div>
                                            <div class="apexcharts-tooltip-goals-group"><span
                                                    class="apexcharts-tooltip-text-goals-label"></span><span
                                                    class="apexcharts-tooltip-text-goals-value"></span></div>
                                            <div class="apexcharts-tooltip-z-group"><span
                                                    class="apexcharts-tooltip-text-z-label"></span><span
                                                    class="apexcharts-tooltip-text-z-value"></span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom apexcharts-theme-light">
                                    <div class="apexcharts-xaxistooltip-text"
                                        style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div>
                                </div>
                                <div
                                    class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                    <div class="apexcharts-yaxistooltip-text"></div>
                                </div>
                            </div>
                        </div>
                        <div class="resize-triggers">
                            <div class="expand-trigger">
                                <div style="width: 495px; height: 440px;"></div>
                            </div>
                            <div class="contract-trigger"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--/ On route vehicles Table -->
    </div>
    {{-- </div> --}}
@endsection

@section('scripts')
@endsection
