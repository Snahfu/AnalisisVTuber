@extends('layouts.app')

@section('title')
    Dashboard VTuber
@endsection

@section('menu')
    <li><a href="{{route('vtuber.home')}}" class="active">Home</a></li>
    <li><a href="{{route('vtuber.crawl')}}">Crawling</a></li>
    <li><a href="{{route('vtuber.analysis')}}">Analysis</a></li>
    <li><a href="{{route('vtuber.history')}}">History</a></li>
@endsection

@section('style')
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
                <span>Your VTubers</span>
                <h2>Your VTubers</h2>
            </div>
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="card">
                        <div class="card-img">
                            <img src="assets/img/ElaineCelestia.jpeg" alt="not found" class="img-fluid"  width="700px" height="700px">
                        </div>
                        <h3><a href="service-details.html" class="stretched-link">Elaine Celestia</a></h3>
                        <p><i class="bi bi-youtube"></i> https://www.youtube.com/@ElaineCelestia</p>
                        <p><i class="bi bi-instagram"></i> https://www.instagram.com/elaine.celestia/ </p>
                        
                    </div>
                </div>
                <!-- End Card Item -->

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="card">
                        <div class="card-img">
                            <img src="assets/img/NekoyamaSena.jpg" alt="not found" class="img-fluid" width="700px" height="700px">
                        </div>
                        <h3><a href="service-details.html" class="stretched-link">Nekoyama Sena</a></h3>
                        <p><i class="bi bi-youtube"></i> https://www.youtube.com/@NekoyamaSena</p>
                        <p><i class="bi bi-instagram"></i> https://www.instagram.com/nekoyamasena/ </p>
                        
                    </div>
                </div>
                <!-- End Card Item -->

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="card">
                        <div class="card-img">
                            <img src="assets/img/ReynardBlanc.jpg" alt="not found" class="img-fluid"  width="700px" height="700px">
                        </div>
                        <h3><a href="service-details.html" class="stretched-link">Reynard Blanc</a></h3>
                        <p><i class="bi bi-youtube"></i> https://www.youtube.com/@ReynardBlanc</p>
                        <p><i class="bi bi-instagram"></i> https://www.instagram.com/reynardblanc/ </p>
                    </div>
                </div>
                <!-- End Card Item -->
            </div>
        </div>
    </section><!-- End Services Section -->

    {{-- @php
        $api = file_get_contents("http://api.instagram.com/oembed?url=https://www.instagram.com/p/CvhLHhIxza3/");      
        $apiObj = json_decode($api,true);      
        $media_id = $apiObj['media_id'];
    @endphp
    {{ $media_id }} --}}
@endsection
