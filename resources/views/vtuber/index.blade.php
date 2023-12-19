@extends('layouts.app')

@section('title')
    Dashboard VTuber
@endsection

@section('menu')
    <li><a href="{{ route('vtuber.home') }}" class="active">Home</a></li>
    <li><a href="{{ route('vtuber.crawl') }}">Crawling</a></li>
    <li><a href="{{ route('vtuber.analysis') }}">Analysis</a></li>
    <li><a href="{{ route('vtuber.history') }}">History</a></li>
@endsection

@section('style')
    <style>
        .containerwidget {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 240px;
            margin: 0;
            background-color: #f0f0f0;
        }

        .circle-graph {
            position: relative;
        }

        .circle {
            width: 150px;
            height: 150px;
            background-color: #ddd;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;

            z-index: 0;
        }

        .circle-positive {
            background: conic-gradient(from 0deg, transparent 50%, #93F03B 0);
        }

        .circle-negative {
            background: conic-gradient(from 0deg, transparent 50%, #F54F52 0);
        }

        .circle-netral {
            background: conic-gradient(from 0deg, transparent 50%, #FFEC21 0);
        }

        .circle-feedback {
            background: conic-gradient(from 0deg, transparent 50%, #378AFF 0);
        }

        .circle-engagement {
            background: conic-gradient(from 0deg, transparent 50%, #9552EA 0);
        }

        .circle-pertanyaan {
            background: conic-gradient(from 0deg, transparent 50%, #FFA32F 0);
        }

        .circle-inner {
            width: 90%;
            height: 90%;
            background-color: #fff;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            position: absolute;
            z-index: 1;
        }

        #percentage {
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }
    </style>
@endsection

@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('assets/img/page-background.jpg');">
            <div class="container position-relative">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2>Welcome! Reynard Blanc</h2>
                        {{-- <p>Here VTuberTECH will help you to perform Sentiment Analysis about your content in 
                            Youtube and Instagram. Hope this program helps your career as Virtual Youtuber in 
                            Digital Entertainment Industry of Indonesia.
                        </p> --}}
                        <p>Here VTuberTECH will help you to perform Sentiment Analysis about your VTubers content in
                            Youtube and Instagram. Hope this program helps your job to help your VTubers.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <nav>
            <div class="container">
                <ol>
                    <li><a href="{{ (Auth::user()->role == "Manager") ? route('manager.home') : route('vtuber.home') }}">Home</a></li>
                </ol>
            </div>
        </nav>
    </div>
    <!-- End Breadcrumbs -->

    <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services">
        <div class="container">
            <h3 class="mb-3 text-primary">Your Recent Activities</h3>
            <div class="row gy-4">
                @foreach ($vtuber_content as $content)
                    <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up">
                        <div class="icon flex-shrink-0"><i class="bi {{ ($content->sources == "Youtube") ? "bi-youtube" : "bi-instagram" }}"></i></div>
                        <div>
                            <h4 class="title">{{$content->creator}}</h4>
                            <p class="description">{{$content->title}}</p>
                            <p class="description"><i class="bi bi-chat"></i> {{$content->total_comments}}</p>
                            <a href="#" class="readmore stretched-link"><span>Detail</span><i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </section>
    <!-- End Featured Services Section -->

    <section id="service" class="services pt-0">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <span>Your Sentiment Analysis Summary</span>
                <h2>Your Sentiment Analysis Summary</h2>
            </div>
            @php
                $total_semua_sentimen = $jumlah_positif + $jumlah_positif_y + $jumlah_negatif + $jumlah_negatif_y + $jumlah_netral_y + $jumlah_netral;
                $total_semua_kategori = $jumlah_engagement + $jumlah_engagement_y + $jumlah_feedback + $jumlah_feedback_y + $jumlah_pertanyaan + $jumlah_pertanyaan_y;
            @endphp
            <div class="row gy-4 mb-4">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="card-title">Total Positive</h4>
                        </div>
                        <div class="card-body p-0">
                            <div class="containerwidget">
                                <div class="circle-graph">
                                    <div class="circle circle-positive">
                                        <div class="circle-inner">
                                            <span
                                                id="percentage">{{ round((($jumlah_positif + $jumlah_positif_y) / $total_semua_sentimen) * 100,2) }}%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row border-top text-center mx-0">
                                <div class="col-6 bord er-end py-1">
                                    <p class="card-text text-muted mb-0">Positif</p>
                                    <h3 class="fw-bolder mb-0">{{ $jumlah_positif + $jumlah_positif_y }}</h3>
                                </div>
                                <div class="col-6 py-1">
                                    <p class="card-text text-muted mb-0">Total Data</p>
                                    <h3 class="fw-bolder mb-0">{{ $total_semua_sentimen }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="card-title">Total Netral</h4>
                        </div>
                        <div class="card-body p-0">
                            <div class="containerwidget">
                                <div class="circle-graph">
                                    <div class="circle circle-netral">
                                        <div class="circle-inner">
                                            <span
                                                id="percentage">{{ round((($jumlah_netral + $jumlah_netral_y) / $total_semua_sentimen) * 100,2) }}%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row border-top text-center mx-0">
                                <div class="col-6 border-end py-1">
                                    <p class="card-text text-muted mb-0">Netral</p>
                                    <h3 class="fw-bolder mb-0">{{ $jumlah_netral + $jumlah_netral_y }}</h3>
                                </div>
                                <div class="col-6 py-1">
                                    <p class="card-text text-muted mb-0">Total Data</p>
                                    <h3 class="fw-bolder mb-0">{{ $total_semua_sentimen }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="card-title">Total Negative</h4>
                        </div>
                        <div class="card-body p-0">
                            <div class="containerwidget">
                                <div class="circle-graph">
                                    <div class="circle circle-negative">
                                        <div class="circle-inner">
                                            <span
                                                id="percentage">{{ round((($jumlah_negatif + $jumlah_negatif_y) / $total_semua_sentimen) * 100,2) }}%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row border-top text-center mx-0">
                                <div class="col-6 border-end py-1">
                                    <p class="card-text text-muted mb-0">Negative</p>
                                    <h3 class="fw-bolder mb-0">{{ $jumlah_negatif + $jumlah_negatif_y }}</h3>
                                </div>
                                <div class="col-6 py-1">
                                    <p class="card-text text-muted mb-0">Total Data</p>
                                    <h3 class="fw-bolder mb-0">{{ $total_semua_sentimen }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Section Kategory --}}
            <div class="row gy-4 mb-4">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="card-title">Total Feedback</h4>
                        </div>
                        <div class="card-body p-0">
                            <div class="containerwidget">
                                <div class="circle-graph">
                                    <div class="circle circle-feedback">
                                        <div class="circle-inner">
                                            <span
                                                id="percentage">{{ round((($jumlah_feedback + $jumlah_feedback_y) / $total_semua_kategori) * 100,2) }}%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row border-top text-center mx-0">
                                <div class="col-6 bord er-end py-1">
                                    <p class="card-text text-muted mb-0">Feedback</p>
                                    <h3 class="fw-bolder mb-0">{{ $jumlah_feedback + $jumlah_feedback_y }}</h3>
                                </div>
                                <div class="col-6 py-1">
                                    <p class="card-text text-muted mb-0">Total Data</p>
                                    <h3 class="fw-bolder mb-0">{{ $total_semua_kategori }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="card-title">Total Engagement</h4>
                        </div>
                        <div class="card-body p-0">
                            <div class="containerwidget">
                                <div class="circle-graph">
                                    <div class="circle circle-engagement">
                                        <div class="circle-inner">
                                            <span
                                                id="percentage">{{ round((($jumlah_engagement + $jumlah_engagement_y) / $total_semua_kategori) * 100,2) }}%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row border-top text-center mx-0">
                                <div class="col-6 border-end py-1">
                                    <p class="card-text text-muted mb-0">Engagement</p>
                                    <h3 class="fw-bolder mb-0">{{ $jumlah_engagement + $jumlah_engagement_y }}</h3>
                                </div>
                                <div class="col-6 py-1">
                                    <p class="card-text text-muted mb-0">Total Data</p>
                                    <h3 class="fw-bolder mb-0">{{ $total_semua_kategori }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="card-title">Total Pertanyaan</h4>
                        </div>
                        <div class="card-body p-0">
                            <div class="containerwidget">
                                <div class="circle-graph">
                                    <div class="circle circle-pertanyaan">
                                        <div class="circle-inner">
                                            <span
                                                id="percentage">{{ round((($jumlah_pertanyaan + $jumlah_pertanyaan_y) / $total_semua_kategori) * 100,2) }}%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row border-top text-center mx-0">
                                <div class="col-6 border-end py-1">
                                    <p class="card-text text-muted mb-0">Pertanyaan</p>
                                    <h3 class="fw-bolder mb-0">{{ $jumlah_pertanyaan + $jumlah_pertanyaan_y }}</h3>
                                </div>
                                <div class="col-6 py-1">
                                    <p class="card-text text-muted mb-0">Total Data</p>
                                    <h3 class="fw-bolder mb-0">{{ $total_semua_kategori }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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

        var total_semua_sentimen = jumlah_positif + jumlah_positif_y + jumlah_negatif + jumlah_negatif_y + jumlah_netral_y +
            jumlah_netral;
        var total_semua_kategori = jumlah_engagement + jumlah_engagement_y + jumlah_feedback + jumlah_feedback_y +
            jumlah_pertanyaan + jumlah_pertanyaan_y;
        var total_positif = (jumlah_positif + jumlah_positif_y) / total_semua_sentimen * 100;
        var total_negatif = (jumlah_negatif + jumlah_negatif_y) / total_semua_sentimen * 100;
        var total_netral = (jumlah_netral + jumlah_netral_y) / total_semua_sentimen * 100;
        var total_pertanyaan = (jumlah_pertanyaan + jumlah_pertanyaan_y) / total_semua_kategori * 100;
        var total_feedback = (jumlah_feedback + jumlah_feedback_y) / total_semua_kategori * 100;
        var total_engagement = (jumlah_engagement + jumlah_engagement_y) / total_semua_kategori * 100;

        const circles = document.querySelectorAll('.circle');
        const percentages = [total_positif, total_netral, total_negatif, total_feedback, total_engagement,
        total_pertanyaan];

        // Loop through each circle element
        circles.forEach((circle, index) => {
            const totalScore = 100;

            const angle = (percentages[index] / 100) * 360;
            if (circle.classList.contains('circle-positive')) {
                circle.style.background =
                    `conic-gradient(#93F03B 0deg, #93F03B ${0 + angle}deg, #ffffff ${0 + angle}deg)`;
            } else if (circle.classList.contains('circle-negative')) {
                circle.style.background =
                    `conic-gradient(#F54F52 0deg, #F54F52 ${0 + angle}deg, #ffffff ${0 + angle}deg)`;
            } else if (circle.classList.contains('circle-netral')) {
                circle.style.background =
                    `conic-gradient(#FFEC21 0deg, #FFEC21 ${0 + angle}deg, #ffffff ${0 + angle}deg)`;
            } else if (circle.classList.contains('circle-feedback')) {
                circle.style.background =
                    `conic-gradient(#378AFF 0deg, #378AFF ${0 + angle}deg, #ffffff ${0 + angle}deg)`;
            } else if (circle.classList.contains('circle-engagement')) {
                circle.style.background =
                    `conic-gradient(#9552EA 0deg, #9552EA ${0 + angle}deg, #ffffff ${0 + angle}deg)`;
            } else if (circle.classList.contains('circle-pertanyaan')) {
                circle.style.background =
                    `conic-gradient(#FFA32F 0deg, #FFA32F ${0 + angle}deg, #ffffff ${0 + angle}deg)`;
            }
        });
    </script>
@endsection
