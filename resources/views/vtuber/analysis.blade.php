@extends('layouts.app')

@section('title')
    Analysis VTuber
@endsection

@section('menu')
    <li><a href="{{ route('vtuber.home') }}">Home</a></li>
    <li><a href="{{ route('vtuber.crawl') }}">Crawling</a></li>
    <li><a href="{{ route('vtuber.analysis') }}" class="active">Analysis</a></li>
    <li><a href="{{ route('vtuber.history') }}">History</a></li>
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
                    <li><a href="#">Analysis</a></li>
                </ol>
            </div>
        </nav>
    </div>

    @if (!$vtuber_content->isEmpty())
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
                            <div class="card-footer">
                                <div>Keyword Positif:</div>
                                <span> {{ implode(', ', $keywords_positif) }}, </span>
                                <span> {{ implode(', ', $keywords_positif_y) }} </span>
                                <div>Keyword Negatif:</div>
                                <span> {{ implode(', ', $keywords_negatif) }}, </span>
                                <span> {{ implode(', ', $keywords_negatif_y) }} </span>
                                <div>Keyword Netral:</div>
                                <span> {{ implode(', ', $keywords_netral) }}, </span>
                                <span> {{ implode(', ', $keywords_netral_y) }} </span>
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
                            <div class="card-footer">
                                <div>Keyword Feedback:</div>
                                <span> {{ implode(', ', $keywords_feedback) }}, </span>
                                <span> {{ implode(', ', $keywords_feedback_y) }} </span>
                                <div>Keyword Pertanyaan:</div>
                                <span> {{ implode(', ', $keywords_pertanyaan) }}, </span>
                                <span> {{ implode(', ', $keywords_pertanyaan_y) }} </span>
                                <div>Keyword Engagement:</div>
                                <span> {{ implode(', ', $keywords_engagement) }}, </span>
                                <span> {{ implode(', ', $keywords_engagement_y) }} </span>
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
                            <div class="card-footer">
                                <div>Keyword Positif:</div>
                                <span> {{ implode(', ', $keywords_positif_y) }} </span>
                                <div>Keyword Negatif:</div>
                                <span> {{ implode(', ', $keywords_negatif_y) }} </span>
                                <div>Keyword Netral:</div>
                                <span> {{ implode(', ', $keywords_netral_y) }} </span>
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
                            <div class="card-footer">
                                <div>Keyword Feedback:</div>
                                <span> {{ implode(', ', $keywords_feedback_y) }} </span>
                                <div>Keyword Pertanyaan:</div>
                                <span> {{ implode(', ', $keywords_pertanyaan_y) }} </span>
                                <div>Keyword Engagement:</div>
                                <span> {{ implode(', ', $keywords_engagement_y) }} </span>
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
                            <div class="card-footer">
                                <div>Keyword Positif:</div>
                                <span> {{ implode(', ', $keywords_positif) }}, </span>
                                <div>Keyword Negatif:</div>
                                <span> {{ implode(', ', $keywords_negatif) }}, </span>
                                <div>Keyword Netral:</div>
                                <span> {{ implode(', ', $keywords_netral) }}, </span>
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
                            <div class="card-footer">
                                <div>Keyword Feedback:</div>
                                <span> {{ implode(', ', $keywords_feedback) }}, </span>
                                <div>Keyword Pertanyaan:</div>
                                <span> {{ implode(', ', $keywords_pertanyaan) }}, </span>
                                <div>Keyword Engagement:</div>
                                <span> {{ implode(', ', $keywords_engagement) }}, </span>
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
    @else
        <section id="featured-services" class="featured-services">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-12 col-md-12 service-item d-flex justify-content-center align-items-center"
                        data-aos="fade-up">
                        <h4 class="text-center text-warning">
                            Tidak Ada Data yang Ditampilkan
                        </h4>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection

@section('scripts')
    <script>
        var jumlah_pertanyaan = @json($jumlah_pertanyaan);
        var jumlah_feedback = @json($jumlah_feedback);
        var jumlah_engagement = @json($jumlah_engagement);
        var jumlah_positif = @json($jumlah_positif);
        var jumlah_negatif = @json($jumlah_negatif);
        var jumlah_netral = @json($jumlah_netral);
        var jumlah_pertanyaan_y = @json($jumlah_pertanyaan_y);
        var jumlah_feedback_y = @json($jumlah_feedback_y);
        var jumlah_engagement_y = @json($jumlah_engagement_y);
        var jumlah_positif_y = @json($jumlah_positif_y);
        var jumlah_negatif_y = @json($jumlah_negatif_y);
        var jumlah_netral_y = @json($jumlah_netral_y);
        var jumlah_like_ig = @json($jumlah_like_ig);
        var jumlah_like_y = @json($jumlah_like_y);
        var jumlah_like_positif = @json($jumlah_like_positif);
        var jumlah_like_positif_y = @json($jumlah_like_positif_y);
        var jumlah_like_netral = @json($jumlah_like_netral);
        var jumlah_like_netral_y = @json($jumlah_like_netral_y);
        var jumlah_like_negatif = @json($jumlah_like_negatif);
        var jumlah_like_negatif_y = @json($jumlah_like_negatif_y);

        // Sentiment
        var overallSentiment = function() {
            const sentimentChart = "#overall_sentiment";
            var options = {
                series: [jumlah_positif + jumlah_positif_y, jumlah_negatif + jumlah_negatif_y, jumlah_netral +
                    jumlah_netral_y
                ],
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
                series: [jumlah_positif_y, jumlah_negatif_y, jumlah_netral_y],
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
                series: [jumlah_positif, jumlah_negatif, jumlah_netral],
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
                series: [jumlah_feedback + jumlah_feedback_y, jumlah_engagement + jumlah_engagement_y,
                    jumlah_pertanyaan + jumlah_pertanyaan_y
                ],
                chart: {
                    width: 410,
                    type: 'pie',
                },
                labels: ['Feedback', 'Engagement', 'Pertanyaan'],
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
                series: [jumlah_feedback_y, jumlah_engagement_y, jumlah_pertanyaan_y],
                chart: {
                    width: 410,
                    type: 'pie',
                },
                labels: ['Feedback', 'Engagement', 'Pertanyaan'],
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
                series: [jumlah_feedback, jumlah_engagement, jumlah_pertanyaan],
                chart: {
                    width: 410,
                    type: 'pie',
                },
                labels: ['Feedback', 'Engagement', 'Pertanyaan'],
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
                series: [jumlah_like_ig + jumlah_like_y, jumlah_like_negatif + jumlah_like_negatif_y +
                    jumlah_like_netral + jumlah_like_netral_y + jumlah_like_positif + jumlah_like_positif_y
                ],
                chart: {
                    width: 410,
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
                series: [jumlah_like_y, jumlah_like_negatif_y + jumlah_like_netral_y + jumlah_like_positif_y],
                chart: {
                    width: 410,
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
                series: [jumlah_like_ig, jumlah_like_negatif + jumlah_like_netral + jumlah_like_positif],
                chart: {
                    width: 410,
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
                series: [jumlah_like_positif + jumlah_like_positif_y, jumlah_like_negatif_y + jumlah_like_negatif,
                    jumlah_like_netral + jumlah_like_netral_y
                ],
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
                series: [jumlah_like_positif_y, jumlah_like_negatif_y, jumlah_like_netral_y],
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
                series: [jumlah_like_positif, jumlah_like_negatif, jumlah_like_netral],
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
