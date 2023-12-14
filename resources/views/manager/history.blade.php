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
            <button type="button" class="btn btn-info" onclick="getAllKomentar()">Train Model Baru</button>
        </div>
        <!--end::Card-->
    </div>

    {{-- Modal Loading Begin --}}
    <div class="modal fade" id="loadingModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title">Loading</h5>
                </div>
                <div class="modal-body">
                    <div class="text-center centered">
                        <lottie-player src="https://lottie.host/36be3621-14d0-4474-bf57-12d076a5b7bf/xsrm6ezVFS.json"
                            background="transparent" speed="1" style="width: 300px; height: 300px" direction="1"
                            mode="normal" loop autoplay></lottie-player>
                    </div>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    {{-- Modal Loading End --}}

    {{-- Modal Alert Begin --}}
    <div class="modal fade" id="alertModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="alertModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div id="alertModalTitle" class="modal-header bg-success">
                    <h5 class="modal-title" id="alertModalLabel">Alert</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label" id="responseController"></label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Oke</button>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal Alert End --}}
@endsection

@section('scripts')
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#historyTable').DataTable();
        });

        function getAllKomentar() {
            $('#loadingModal').modal('show');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('semua.comment') }}",
                type: 'POST',
                data: {

                },
                dataType: 'json',
                success: function(response) {
                    console.log(response.listKomentar);
                    trainModelRequest(response.listKomentar)
                },
                error: function(error) {
                    $('#loadingModal').modal('hide');
                    console.log('Error:', error);
                    
                    alertUpdate("Terdapat Kesalahan Pada Sistem", "error")
                }
            });
        }

        function trainModelRequest(listKomentar) {
            var data = {
                "ArrayKomentar": listKomentar
            };
            $.ajax({
                url: 'http://localhost:5000/train-model',
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify(data),
                success: function(response) {
                    $('#loadingModal').modal('hide');
                    console.log('Train Model Request Result:', response);
                    
                    alertUpdate(response.result, "success")
                },
                error: function(error) {
                    $('#loadingModal').modal('hide');
                    console.error('Error:', error);
                    alertUpdate("Terdapat Kesalahan Pada Sistem", "error")
                }
            });
        }

        function alertUpdate(msg, status) {
            var alertModalTitle = document.getElementById('alertModalTitle');
            if (status == "success") {
                alertModalTitle.classList.remove('bg-danger');
                alertModalTitle.classList.add('bg-success');
                $('#responseController').html(msg);
                $('#alertModal').modal('show');
            } else {
                alertModalTitle.classList.remove('bg-success');
                alertModalTitle.classList.add('bg-danger');
                $('#responseController').html(msg);
                $('#alertModal').modal('show');
            }
        }
    </script>
@endsection
