@extends('layouts.app')

@section('title')
    Dashboard Manager
@endsection

{{-- {{ route('order.transaksi.detail', ['order_id' => $riwayat->id]) }}" --}}
@section('menu')
    <li><a href="{{ route('manager.home') }}" class="active">Home</a></li>
    <li><a href="{{ route('manager.crawl') }}">Crawling</a></li>
    <li><a href="{{ route('manager.analysis') }}">Analysis</a></li>
    <li><a href="{{ route('manager.history') }}">History</a></li>
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
                        <h2>Welcome {{(Auth::user()->role == "Manager") ? "Manager!" : "!" }} {{ Auth::user()->name }}</h2>
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
                    <li><a
                            href="{{ Auth::user()->role == 'Manager' ? route('manager.home') : route('vtuber.home') }}">Home</a>
                    </li>
                </ol>
            </div>
        </nav>
    </div>
    <!-- End Breadcrumbs -->

    <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services">
        <div class="container">
            <h3 class="mb-3 text-primary">Aktivitas Terbaru</h3>
            <div class="row gy-4">
                @if (!$vtuber_content)
                    @foreach ($vtuber_content as $content)
                        <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up">
                            <div class="icon flex-shrink-0"><i class="bi bi-youtube"></i></div>
                            <div>
                                <h4 class="title">{{ $content->creator }}</h4>
                                <p class="description">{{ $content->title }}</p>
                                <p class="description"><i class="bi bi-chat"></i> {{ $content->total_comments }}</p>
                                <a href="#" class="readmore stretched-link"><span>Detail</span><i
                                        class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-lg-12 col-md-12 service-item d-flex justify-content-center align-items-center"
                        data-aos="fade-up">
                        <h4 class="text-center text-warning"> <!-- Ganti warna sesuai keinginanmu -->
                            Tidak ada Aktivitas yang dilakukan
                        </h4>
                    </div>
                @endif
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
                @if (!$vtuber_list)
                    @foreach ($vtuber_list as $vtuber)
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="card">
                                <div class="card-img">
                                    <img src="{{ asset($vtuber->url_gambar) }}" alt="not found" class="img-fluid"
                                        width="700px" height="700px">
                                </div>
                                <h3><a href="#" class="stretched-link">{{ $vtuber->name }}</a></h3>
                                <p><i
                                        class="bi bi-youtube"></i>{{ $vtuber->instagram_link == '' ? '' : $vtuber->instagram_link }}
                                </p>
                                <p><i class="bi bi-instagram"></i>
                                    {{ $vtuber->youtube_link == '' ? '' : $vtuber->youtube_link }} </p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-lg-12 col-md-12 service-item d-flex justify-content-center align-items-center"
                        data-aos="fade-up">
                        <h4 class="text-center text-warning"> <!-- Ganti warna sesuai keinginanmu -->
                            Belum Ada VTuber Yang Kamu Manage
                        </h4>
                    </div>
                @endif
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
