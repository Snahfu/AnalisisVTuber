@extends('layouts.app')

@section('title')
    History Manager
@endsection

@section('menu')
    <li><a href="{{ route('manager.home') }}">Home</a></li>
    <li><a href="{{ route('manager.crawl') }}">Crawling</a></li>
    <li><a href="{{ route('manager.analysis') }}">Analysis</a></li>
    <li><a href="{{ route('manager.history') }}" class="active">History</a></li>
@endsection

@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
    <link href="assets/css/datatable.css" rel="stylesheet">
    <style>
        .bg-instagram {
            background-color: #C13584;
        }

        .bg-custom {
            background-color: #cfe2ff;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #c8defe;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown-content a {
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            color: black;
        }

        .dropdown-content a:hover {
            background-color: #b9b9b9;
        }

        .settings-icon {
            margin-right: 8px;
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
    <div class="container mb-5 mt-5">
        <!--begin::Card-->
        <div class="card card-custom">
            <div class="card-body bg-custom h5 text-dark">
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
                                        class="badge rounded-pill {{ $history->sources == 'Youtube' ? 'bg-danger' : 'bg-instagram' }}">{{ $history->sources }}</span>
                                </td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <span class="settings-icon"><i class="fas fa-cog"></i></span>
                                        <div class="dropdown-content">
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
            <button type="button" class="btn btn-info">Train Model Baru</button>
        </div>
        <!--end::Card-->
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#historyTable').DataTable();
        });
    </script>
@endsection
