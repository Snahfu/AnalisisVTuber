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

        .circle-others {
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
                    <li><a href="index.html">Home</a></li>
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
                <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up">
                    <div class="icon flex-shrink-0"><i class="bi bi-youtube"></i></div>
                    <div>
                        <h4 class="title">Elaine Celestia Ch.『 Re:Memories 』</h4>
                        <p class="description">Hey, How are you?</p>
                        <p class="description"><i class="bi bi-chat"></i> 100</p>
                        <a href="service-details.html" class="readmore stretched-link"><span>Detail</span><i
                                class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                <!-- End Service Item -->

                <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="100">
                    <div class="icon flex-shrink-0"><i class="bi bi-instagram"></i></div>
                    <div>
                        <h4 class="title">Nekoyama Sena</h4>
                        <p class="description">NYAHOO SEMUANYA!!!! 🥰
                            Untuk merayakan kembalinya Sena ke live stream...
                            Hari ini....Sena bakal lanjut... namatin Only up... 💀</p>
                        <p class="description"><i class="bi bi-chat"></i> 13</p>
                        <a href="service-details.html" class="readmore stretched-link"><span>Detail</span><i
                                class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                <!-- End Service Item -->

                <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="200">
                    <div class="icon flex-shrink-0"><i class="bi bi-youtube"></i></div>
                    <div>
                        <h4 class="title">Nekoyama Sena 〘 YumeLive 〙</h4>
                        <p class="description">🐇 Nekoyama Sena! Vtuber Kucing dari Indonesia!【YumeLive🐇】</p>
                        <p class="description"><i class="bi bi-chat"></i> 138</p>
                        <a href="service-details.html" class="readmore stretched-link"><span>Detail</span><i
                                class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                <!-- End Service Item -->

            </div>

        </div>
    </section>
    <!-- End Featured Services Section -->

    <!-- ======= Services Section ======= -->
    <section id="service" class="services pt-0">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <span>Your Sentiment Analysis Summary</span>
                <h2>Your Sentiment Analysis Summary</h2>
            </div>
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
                                            <span id="percentage">50%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row border-top text-center mx-0">
                                <div class="col-6 bord er-end py-1">
                                    <p class="card-text text-muted mb-0">Positif Data</p>
                                    <h3 class="fw-bolder mb-0">786,617</h3>
                                </div>
                                <div class="col-6 py-1">
                                    <p class="card-text text-muted mb-0">Total Data</p>
                                    <h3 class="fw-bolder mb-0">13,561</h3>
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
                                            <span id="percentage">25%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row border-top text-center mx-0">
                                <div class="col-6 border-end py-1">
                                    <p class="card-text text-muted mb-0">Netral Data</p>
                                    <h3 class="fw-bolder mb-0">786,617</h3>
                                </div>
                                <div class="col-6 py-1">
                                    <p class="card-text text-muted mb-0">Total Data</p>
                                    <h3 class="fw-bolder mb-0">13,561</h3>
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
                                            <span id="percentage">25%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row border-top text-center mx-0">
                                <div class="col-6 border-end py-1">
                                    <p class="card-text text-muted mb-0">Negative Data</p>
                                    <h3 class="fw-bolder mb-0">786,617</h3>
                                </div>
                                <div class="col-6 py-1">
                                    <p class="card-text text-muted mb-0">Total Data</p>
                                    <h3 class="fw-bolder mb-0">13,561</h3>
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
                                            <span id="percentage">50%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row border-top text-center mx-0">
                                <div class="col-6 bord er-end py-1">
                                    <p class="card-text text-muted mb-0">Feedback Comment</p>
                                    <h3 class="fw-bolder mb-0">786,617</h3>
                                </div>
                                <div class="col-6 py-1">
                                    <p class="card-text text-muted mb-0">Total Data</p>
                                    <h3 class="fw-bolder mb-0">13,561</h3>
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
                                            <span id="percentage">25%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row border-top text-center mx-0">
                                <div class="col-6 border-end py-1">
                                    <p class="card-text text-muted mb-0">Engagement Comment</p>
                                    <h3 class="fw-bolder mb-0">786,617</h3>
                                </div>
                                <div class="col-6 py-1">
                                    <p class="card-text text-muted mb-0">Total Data</p>
                                    <h3 class="fw-bolder mb-0">13,561</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="card-title">Total Other</h4>
                        </div>
                        <div class="card-body p-0">
                            <div class="containerwidget">
                                <div class="circle-graph">
                                    <div class="circle circle-others">
                                        <div class="circle-inner">
                                            <span id="percentage">25%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row border-top text-center mx-0">
                                <div class="col-6 border-end py-1">
                                    <p class="card-text text-muted mb-0">Other Data</p>
                                    <h3 class="fw-bolder mb-0">786,617</h3>
                                </div>
                                <div class="col-6 py-1">
                                    <p class="card-text text-muted mb-0">Total Data</p>
                                    <h3 class="fw-bolder mb-0">13,561</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Services Section -->

    <script>
        // const percentageElement = document.getElementById('percentage');
        // const circle = document.querySelector('.circle-inner');

        // const score = 80; // Your score here
        // const totalScore = 100; // Total score here

        // const percentage = (score / totalScore) * 100;
        // percentageElement.textContent = `${Math.round(percentage)}%`;

        // // circle.style.backgroundColor = '#fff'; // Customize the circle color here
        // const filledCircle = document.querySelector('.circle');

        // const angle = (percentage / 100) * 360;
        // filledCircle.style.background = `conic-gradient(from -90deg, transparent ${360 - angle}deg, #00ff00 0)`;
        // Get all circle elements
        const circles = document.querySelectorAll('.circle');
        const percentages = ['50', '25', '25', '50', '25', '25'];
        // Loop through each circle element
        circles.forEach((circle, index) => {
            const totalScore = 100; // Total score here

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
            } else if (circle.classList.contains('circle-others')) {
                circle.style.background =
                    `conic-gradient(#FFA32F 0deg, #FFA32F ${0 + angle}deg, #ffffff ${0 + angle}deg)`;
            }
        });
    </script>
    {{-- @php
        $api = file_get_contents("http://api.instagram.com/oembed?url=https://www.instagram.com/p/CvhLHhIxza3/");      
        $apiObj = json_decode($api,true);      
        $media_id = $apiObj['media_id'];
    @endphp
    {{ $media_id }} --}}
@endsection
