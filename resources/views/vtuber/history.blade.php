@extends('layouts.app')

@section('title')
    History VTuber
@endsection

@section('menu')
    <li><a href="{{ route('vtuber.home') }}">Home</a></li>
    <li><a href="{{ route('vtuber.crawl') }}">Crawling</a></li>
    <li><a href="{{ route('vtuber.analysis') }}">Analysis</a></li>
    <li><a href="{{ route('vtuber.history') }}" class="active">History</a></li>
@endsection

@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
    <link href="assets/css/datatable.css" rel="stylesheet">
    <style>
        .bg-instagram2 {
            background-color: #C13584;
        }

        .bg-custom2 {
            background-color: #cfe2ff;
        }

        .dropdown2 {
            position: relative;
            display: inline-block;
        }

        .dropdown2-content {
            display: none;
            position: absolute;
            background-color: #c8defe;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown2:hover .dropdown2-content {
            display: block;
        }

        .dropdown2-content a {
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            color: black;
        }

        .dropdown2-content a:hover {
            background-color: #b9b9b9;
        }

        .settings-icon2 {
            margin-right: 8px;
        }

        .centered {
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
@endsection

@section('content')
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('assets/img/page-background.jpg');">

        </div>

        <nav>
            <div class="container">
                <ol>
                    <li><a href="#">History</a></li>
                </ol>
            </div>
        </nav>
    </div>
    @if (!$histories->isEmpty())
        <div class="container mb-5 mt-5">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-body bg-custom2 h5 text-dark">
                    <!--begin: Datatable-->
                    <table class="table caption-top table-bordered table-striped table-primary table-hover table-responsive"
                        id="historyTable">
                        <caption class="text-dark h6"> Crawling Histories </caption>
                        <thead>
                            <tr>
                                <th>Data ID</th>
                                <th>Judul</th>
                                <th>Pencipta</th>
                                <th>Tanggal Konten</th>
                                <th>Sumber</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($histories as $history)
                                <tr id="tr_{{ $history->contents_id }}_{{ $history->contents_sourcesId }}">
                                    <td>{{ $history->contents_id }}</td>
                                    <td>{{ $history->title }}</td>
                                    <td>{{ $history->creator }}</td>
                                    <td>{{ $history->date }}</td>
                                    <td class="text-center"><span
                                            class="badge rounded-pill {{ $history->sources == 'Youtube' ? 'bg-danger' : 'bg-instagram2' }}">{{ $history->sources }}</span>
                                    </td>
                                    <td class="text-center">
                                        <div class="dropdown2">
                                            <span class="settings-icon2"><i class="fas fa-cog"></i></span>
                                            <div class="dropdown2-content">
                                                <a
                                                    href="{{ $history->sources == 'Youtube' ? 'https://www.youtube.com/watch?v' . $history->sourcesId : 'https://www.instagram.com/p/' . $history->sourcesId }}">Link</a>
                                                <a
                                                    href="{{ route('detail.content', ['id' => $history->contents_id, 'sourcesId' => $history->contents_sourcesId]) }}">Detail</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!--end: Datatable-->
                </div>

            </div>
            <!--end::Card-->
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
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#historyTable').DataTable();
        });
    </script>
@endsection
