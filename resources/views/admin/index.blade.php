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
                <div class="col-md-7">
                    <div class="card card-default">
                        <div class="card-header">
                            <h2>User Registration</h2>
                        </div>
                        <div class="card-body">
                            <div class="chart-wrapper">
                                <canvas id="user-registration-chart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card card-default"  style="height: 86%">
                        <div class="card-header">
                            <h2>Gender Distribution</h2>
                        <div class="card-body">
                            <div class="chart-wrapper">
                                <canvas id="genderChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="card card-default">
                        <div class="card-header">
                            <h2>User Points</h2>
                        </div>
                        <div class="card-body">
                            <div class="chart-wrapper">
                                <canvas id="user-points-chart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-default">
                        <div class="card-header">
                            <h2>Category Sales</h2>
                        </div>
                        <div class="card-body">
                            <div class="chart-wrapper">
                                <canvas id="category-sales-chart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                var userRegistrationChartCanvas = document.getElementById("user-registration-chart").getContext("2d");
                var userRegistrationChart = new Chart(userRegistrationChartCanvas, {
                    type: 'bar',
                    data: {
                        labels: {!! json_encode($labels) !!},
                        datasets: [{
                            label: 'Number of Users Registered',
                            data: {!! json_encode($data) !!},
                            backgroundColor: "rgba(158, 109, 224, .5)",
                            borderColor: 'rgba(158, 109, 224, 1)',
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
            
            <script>
                var categorySalesChartCanvas = document.getElementById("category-sales-chart").getContext("2d");
                var categorySalesChart = new Chart(categorySalesChartCanvas, {
                    type: 'bar',
                    data: {
                        labels: {!! json_encode($labels2) !!},
                        datasets: [{
                            label: 'Number of Sales',
                            data: {!! json_encode($data2) !!},
                            backgroundColor: 'rgba(255, 99, 132, 0.5)',
                            borderColor: 'rgba(255, 99, 132, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: 'Number of Sales'
                                }
                            },
                            x: {
                                title: {
                                    display: true,
                                    text: 'Category'
                                }
                            }
                        }
                    }
                });
            </script>
            
            <script>
                // Get chart data from PHP
                var labelsUser = {!! json_encode($labelsUser) !!};
                var dataPoint = {!! json_encode($dataPoint) !!};
            
                // Render chart
                var ctx = document.getElementById('user-points-chart').getContext('2d');
                var userPointsChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labelsUser,
                        datasets: [{
                            label: 'User Points',
                            data: dataPoint,
                            backgroundColor: 'rgba(242, 224, 82, .5)',
                            borderColor: 'rgba(242, 224, 82, 1)',
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
            </script>
              <script>
                // Data for the chart
                var data = {
                    labels: ['Male', 'Female'],
                    datasets: [{
                        data: [{{ $malePercentage }}, {{ $femalePercentage }}],
                        backgroundColor: ['#36a2eb', '#ff6384']
                    }]
                };
        
                // Configuration options
                var options = {
                    responsive: true,
                    maintainAspectRatio: false,
                    legend: {
                        position: 'bottom',
                        labels: {
                            boxWidth: 15
                        }
                    }
                };
        
                // Get the context of the canvas element we want to select
                var ctx = document.getElementById('genderChart').getContext('2d');
        
                // Create the chart
                var myDoughnutChart = new Chart(ctx, {
                    type: 'doughnut',
                    data: data,
                    options: options
                });
            </script>


        </div>

    </div>
@endsection
