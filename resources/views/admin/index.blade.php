@extends('admin.layouts.master')
@section('title', 'Admin Dashboard')
@section('content')
    <!-- ====================================
                                                                                                                        ——— CONTENT WRAPPER
                                                                                                                        ===================================== -->
    <div class="content-wrapper">
        <div class="content">
            <!-- Top Statistics -->
            <div class="row">
                <div class="col-xl-3 col-sm-6">
                    <div class="card card-default card-mini">
                        <div class="card-header">
                            <h2>Members</h2>
                            <div class="dropdown">
                                <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                            <div class="sub-title">
                                {{-- <h4 class="mr-1">{{ $members->count() }}</h4> --}}
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-wrapper">
                                <div>
                                    <div id="spline-area-1"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card card-default card-mini">
                        <div class="card-header">
                            <h2>Number</h2>
                            <div class="dropdown">
                                <a class="dropdown-toggle icon-burger-mini" href="#" role="button"
                                    id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                            <div class="sub-title">
                                {{-- <h4 class="mr-1">{{ $news->count() }}</h4> --}}
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-wrapper">
                                <div>
                                    <div id="spline-area-2"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card card-default card-mini">
                        <div class="card-header">
                            <h2>Events</h2>
                            <div class="dropdown">
                                <a class="dropdown-toggle icon-burger-mini" href="#" role="button"
                                    id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                            <div class="sub-title">
                                {{-- <h4 class="mr-1">{{ $events->count() }}</h4> --}}
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-wrapper">
                                <div>
                                    <div id="spline-area-3"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card card-default card-mini">
                        <div class="card-header">
                            <h2>Media</h2>
                            <div class="dropdown">
                                <a class="dropdown-toggle icon-burger-mini" href="#" role="button"
                                    id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                            <div class="sub-title">
                                {{-- <h4 class="mr-1">{{ $media->count() }}</h4> --}}
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-wrapper">
                                <div>
                                    <div id="spline-area-4"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>







           





            <div class="row">
                <div class="col-xl-8">

                    <!-- Income and Express -->
                    <div class="card card-default">
                        <div class="card-header">
                            <h2>User Registration</h2>
                        </div>
                        <div class="card-body">
                            <div class="chart-wrapper">
                                <canvas id="mixed-chart-1"></canvas>
                            </div>
                        </div>
                    </div>
                
                    <script>
                        var userChartCanvas = document.getElementById("mixed-chart-1").getContext("2d");
                        var userChart = new Chart(userChartCanvas, {
                            type: 'bar',
                            data: {
                                labels: {!! json_encode($labels) !!}, // Ensure $labels is an array
                                datasets: [{
                                    label: 'Number of Users Registered',
                                    data: {!! json_encode($data) !!}, // Ensure $data is an array
                                    backgroundColor: "#9e6de0",
                                    borderColor: 'rgba( 158, 109, 224, 1)',
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true,
                                        title: {
                                            display: true,
                                            text: 'Number of Users'
                                        }
                                    },
                                    x: {
                                        title: {
                                            display: true,
                                            text: 'Month'
                                        }
                                    }
                
                                }
                            }
                        });
                    </script>


                </div>
                <div class="col-xl-4">
                    <!-- Current Users  -->
                    <div class="card card-default">
                        <div class="card-header">
                            <h2>Current Users</h2>
                            <span>Realtime</span>
                        </div>
                        <div class="card-body">
                            <div id="barchartlg2"></div>
                        </div>
                        <div class="card-footer bg-white py-4">
                            <a href="#" class="text-uppercase">Current Users Overview</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
