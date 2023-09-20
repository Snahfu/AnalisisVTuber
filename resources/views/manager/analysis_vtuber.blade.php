@extends('layouts.app')

@section('title')
    Analysis Manager
@endsection

@section('menu')
    <li><a href="{{route('manager.home')}}">Home</a></li>
    <li><a href="{{route('manager.crawl')}}">Crawling</a></li>
    <li><a href="{{route('manager.analysis')}}" class="active">Analysis</a></li>
    <li><a href="{{route('manager.history')}}">History</a></li>
@endsection

@section('style')
@endsection

@section('content')
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('assets/img/page-background.jpg');">

        </div>

        <nav>
            <div class="container">
                <ol>
                    <li><a href="index.html">Analysis</a></li>
                    <li><a href="index.html">VTuber</a></li>
                </ol>
            </div>
        </nav>
    </div>

    <div class="card mt-3 mx-3 mb-3">
        <div class="card-header">
            <h4 class="card-title">Overall Analysis</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-xl-6 col-12 mb-4">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b">
                        <div class="card-header">
                            <div class="card-title">
                                <h3 class="card-label">Sentiment Chart</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <!--begin::Chart-->
                            <div id="overall_sentiment" class="d-flex justify-content-center"></div>
                            <!--end::Chart-->
                        </div>
                    </div>
                    <!--end::Card-->
                </div>
                <div class="col-xl-6 col-12 mb-4">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b">
                        <div class="card-header">
                            <div class="card-title">
                                <h3 class="card-label">Category Chart</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <!--begin::Chart-->
                            <div id="overall_category" class="d-flex justify-content-center"></div>
                            <!--end::Chart-->
                        </div>
                    </div>
                    <!--end::Card-->
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-12 mb-4">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b">
                        <div class="card-header">
                            <div class="card-title">
                                <h3 class="card-label">Total Like</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <!--begin::Chart-->
                            <div id="overall_total_like" class="d-flex justify-content-center"></div>
                            <!--end::Chart-->
                        </div>
                    </div>
                    <!--end::Card-->
                </div>
                <div class="col-xl-6 col-12 mb-4">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b">
                        <div class="card-header">
                            <div class="card-title">
                                <h3 class="card-label">Like Analysis</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <!--begin::Chart-->
                            <div id="overall_like" class="d-flex justify-content-center"></div>
                            <!--end::Chart-->
                        </div>
                    </div>
                    <!--end::Card-->
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-3 mx-3 mb-3">
        <div class="card-header">
            <h4 class="card-title">Youtube Analysis</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-xl-6 col-12 mb-4">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b">
                        <div class="card-header">
                            <div class="card-title">
                                <h3 class="card-label">Sentiment Chart</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <!--begin::Chart-->
                            <div id="youtube_sentiment" class="d-flex justify-content-center"></div>
                            <!--end::Chart-->
                        </div>
                    </div>
                    <!--end::Card-->
                </div>
                <div class="col-xl-6 col-12 mb-4">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b">
                        <div class="card-header">
                            <div class="card-title">
                                <h3 class="card-label">Category Chart</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <!--begin::Chart-->
                            <div id="youtube_category" class="d-flex justify-content-center"></div>
                            <!--end::Chart-->
                        </div>
                    </div>
                    <!--end::Card-->
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-12 mb-4">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b">
                        <div class="card-header">
                            <div class="card-title">
                                <h3 class="card-label">Total Like</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <!--begin::Chart-->
                            <div id="youtube_total_like" class="d-flex justify-content-center"></div>
                            <!--end::Chart-->
                        </div>
                    </div>
                    <!--end::Card-->
                </div>
                <div class="col-xl-6 col-12 mb-4">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b">
                        <div class="card-header">
                            <div class="card-title">
                                <h3 class="card-label">Like Analysis</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <!--begin::Chart-->
                            <div id="youtube_like" class="d-flex justify-content-center"></div>
                            <!--end::Chart-->
                        </div>
                    </div>
                    <!--end::Card-->
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-3 mx-3 mb-3">
        <div class="card-header">
            <h4 class="card-title">Instagram Analysis</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-xl-6 col-12 mb-4">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b">
                        <div class="card-header">
                            <div class="card-title">
                                <h3 class="card-label">Sentiment Chart</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <!--begin::Chart-->
                            <div id="ig_sentiment" class="d-flex justify-content-center"></div>
                            <!--end::Chart-->
                        </div>
                    </div>
                    <!--end::Card-->
                </div>
                <div class="col-xl-6 col-12 mb-4">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b">
                        <div class="card-header">
                            <div class="card-title">
                                <h3 class="card-label">Category Chart</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <!--begin::Chart-->
                            <div id="ig_category" class="d-flex justify-content-center"></div>
                            <!--end::Chart-->
                        </div>
                    </div>
                    <!--end::Card-->
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-12 mb-4">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b">
                        <div class="card-header">
                            <div class="card-title">
                                <h3 class="card-label">Total Like</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <!--begin::Chart-->
                            <div id="ig_total_like" class="d-flex justify-content-center"></div>
                            <!--end::Chart-->
                        </div>
                    </div>
                    <!--end::Card-->
                </div>
                <div class="col-xl-6 col-12 mb-4">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b">
                        <div class="card-header">
                            <div class="card-title">
                                <h3 class="card-label">Like Analysis</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <!--begin::Chart-->
                            <div id="ig_like" class="d-flex justify-content-center"></div>
                            <!--end::Chart-->
                        </div>
                    </div>
                    <!--end::Card-->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Sentiment
        var overallSentiment = function() {
            const sentimentChart = "#overall_sentiment";
            var options = {
                series: [1000, 86, 70],
                chart: {
                    width: 380,
                    type: 'pie',
                },
                labels: ['Positif', 'Negatif', 'Netral'],
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }],
                colors: ['#00ff00', '#ff0000', '#dddddd']
            };
            var chart = new ApexCharts(document.querySelector(sentimentChart), options);
            chart.render();
        }
        var youtubeSentimen = function() {
            const sentimentChart = "#youtube_sentiment";
            var options = {
                series: [800, 23, 62],
                chart: {
                    width: 380,
                    type: 'pie',
                },
                labels: ['Positif', 'Negatif', 'Netral'],
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }],
                colors: ['#00ff00', '#ff0000', '#dddddd']
            };
            var chart = new ApexCharts(document.querySelector(sentimentChart), options);
            chart.render();
        }
        var instagramSentimen = function() {
            const sentimentChart = "#ig_sentiment";
            var options = {
                series: [450, 73, 12],
                chart: {
                    width: 380,
                    type: 'pie',
                },
                labels: ['Positif', 'Negatif', 'Netral'],
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }],
                colors: ['#00ff00', '#ff0000', '#dddddd']
            };
            var chart = new ApexCharts(document.querySelector(sentimentChart), options);
            chart.render();
        }

        // CATEGORY
        var overallCategory = function() {
            const categoryChart = "#overall_category";
            var options = {
                series: [1000, 86, 70],
                chart: {
                    width: 380,
                    type: 'pie',
                },
                labels: ['Feedback', 'Engagement', 'Other'],
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }],
                colors: ['#43ff34', '#aa2277', '#eeddaa']
            };
            var chart = new ApexCharts(document.querySelector(categoryChart), options);
            chart.render();
        }
        var youtubeCategory = function() {
            const categoryChart = "#youtube_category";
            var options = {
                series: [1000, 86, 70],
                chart: {
                    width: 380,
                    type: 'pie',
                },
                labels: ['Feedback', 'Engagement', 'Other'],
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }],
                colors: ['#43ff34', '#aa2277', '#eeddaa']
            };
            var chart = new ApexCharts(document.querySelector(categoryChart), options);
            chart.render();
        }
        var instagramCategory = function() {
            const categoryChart = "#ig_category";
            var options = {
                series: [1000, 86, 70],
                chart: {
                    width: 380,
                    type: 'pie',
                },
                labels: ['Feedback', 'Engagement', 'Other'],
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }],
                colors: ['#43ff34', '#aa2277', '#eeddaa']
            };
            var chart = new ApexCharts(document.querySelector(categoryChart), options);
            chart.render();
        }

        // TOTAL LIKE
        var overallTLike = function() {
            const totalLikeChart = "#overall_total_like";
            var options = {
                series: [1000, 2000],
                chart: {
                    width: 380,
                    type: 'pie',
                },
                labels: ['Content Like', 'Comment Like'],
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }],
                colors: ['#00ffff', '#ff00ff']
            };
            var chart = new ApexCharts(document.querySelector(totalLikeChart), options);
            chart.render();
        }
        var youtubeTLike = function() {
            const totalLikeChart = "#youtube_total_like";
            var options = {
                series: [1000, 2000],
                chart: {
                    width: 380,
                    type: 'pie',
                },
                labels: ['Content Like', 'Comment Like'],
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }],
                colors: ['#00ffff', '#ff00ff']
            };
            var chart = new ApexCharts(document.querySelector(totalLikeChart), options);
            chart.render();
        }
        var instagramTLike = function() {
            const totalLikeChart = "#ig_total_like";
            var options = {
                series: [1000, 2000],
                chart: {
                    width: 380,
                    type: 'pie',
                },
                labels: ['Content Like', 'Comment Like'],
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }],
                colors: ['#00ffff', '#ff00ff']
            };
            var chart = new ApexCharts(document.querySelector(totalLikeChart), options);
            chart.render();
        }

        // LIKE
        var overallLike = function() {
            const likeChart = "#overall_like";
            var options = {
                series: [1000, 86, 70],
                chart: {
                    width: 380,
                    type: 'pie',
                },
                labels: ['Positif', 'Negatif', 'Netral'],
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }],
                colors: ['#00ff00', '#ff0000', '#dddddd']
            };
            var chart = new ApexCharts(document.querySelector(likeChart), options);
            chart.render();
        }
        var youtubeLike = function() {
            const likeChart = "#youtube_like";
            var options = {
                series: [800, 23, 62],
                chart: {
                    width: 380,
                    type: 'pie',
                },
                labels: ['Positif', 'Negatif', 'Netral'],
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }],
                colors: ['#00ff00', '#ff0000', '#dddddd']
            };
            var chart = new ApexCharts(document.querySelector(likeChart), options);
            chart.render();
        }
        var instagramLike = function() {
            const likeChart = "#ig_like";
            var options = {
                series: [450, 73, 12],
                chart: {
                    width: 380,
                    type: 'pie',
                },
                labels: ['Positif', 'Negatif', 'Netral'],
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }],
                colors: ['#00ff00', '#ff0000', '#dddddd']
            };
            var chart = new ApexCharts(document.querySelector(likeChart), options);
            chart.render();
        }

        $(document).ready(function() {
            overallSentiment();
            youtubeSentimen();
            instagramSentimen();
            overallCategory();
            youtubeCategory();
            instagramCategory();
            overallTLike();
            youtubeTLike();
            instagramTLike();
            overallLike();
            youtubeLike();
            instagramLike();
        });
    </script>
@endsection