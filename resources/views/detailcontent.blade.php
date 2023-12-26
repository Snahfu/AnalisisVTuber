@extends('layouts.app')

@section('title')
    History Manager
@endsection

@section('menu')
    <li><a href="{{ route('manager.home') }}">Home</a></li>
    <li><a href="{{ route('manager.crawl') }}">Crawling</a></li>
    <li><a href="{{ route('manager.analysis') }}">Analysis</a></li>
    <li><a href="{{ route('manager.history') }}">History</a></li>
@endsection

@section('style')
@endsection

@section('content')
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center"
            style="background-image: url('{{ asset('assets/img/page-background.jpg') }}');">
        </div>

        <nav>
            <div class="container">
                <ol>
                    <li><a
                            href="{{ Auth::user()->role == 'Manager' ? route('manager.home') : route('vtuber.home') }}">Home</a>
                    </li>
                    <li><a href="#">Detail</a></li>
                </ol>
            </div>
        </nav>
    </div>

    <div class="card mx-5 mt-3 mb-3">
        <div class="card-header">
            <h4 class="card-title">Edit Data</h4>
        </div>
        <div class="card-body">
            <fieldset>
                <div class="mb-3">
                    <label for="title" class="form-label">Judul</label>
                    <input type="text" class="form-control" id="title" value="{{ $content->title }}" name="title">
                </div>
                <div class="mb-3">
                    <label for="creator" class="form-label">Pencipta</label>
                    <input type="text" class="form-control" id="creator" value="{{ $content->creator }}"
                        name="creator">
                </div>
                <div class="mb-3">
                    <label for="like_count" class="form-label">Jumlah Like</label>
                    <input type="int" class="form-control" id="like_count" value="{{ $content->like_count }}"
                        name="like_count">
                </div>
            </fieldset>
            <button type="submit" class="btn btn-primary"
                onclick="updateKonten({{ $content->id }}, '{{ $content->sourcesId }}')">Perbaruhi</button>
        </div>
    </div>

    <div class="card mx-5 mt-3 mb-3">
        <div class="card-header">
            <h4 class="card-title">Data Komentar</h4>
        </div>
        <div class="card-body bg-custom h5 text-dark table-responsive">
            <table class="table table-bordered table-striped table-light table-hover" id="listkomentar">
                <thead>
                    <tr class="text-center">
                        <th>Id</th>
                        <th>Comments</th>
                        <th>Author</th>
                        <th>Total Like</th>
                        <th>Sentiment</th>
                        <th>Category</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($content_commentar as $komentar)
                        <tr id="tr_{{ $komentar->id }}">
                            <td>{{ $komentar->id }}</td>
                            <td> {{ $komentar->text }}</td>
                            <td> {{ $komentar->author }} </td>
                            <td> {{ $komentar->like_count }} </td>
                            <td id="td_sentimen_{{ $komentar->id }}"> {{ $komentar->kelas_sentimen }} </td>
                            <td id="td_kategori_{{ $komentar->id }}"> {{ $komentar->kelas_kategori }} </td>
                            <td class="text-center">
                                <button class="btn btn-circle bg-info text-light"
                                    onclick="getKomenData({{ $komentar->id }})">Edit</button>
                            </td>
                            <td class="text-center">
                                <button class="btn btn-circle bg-danger text-light"
                                    onclick="openModal({{ $komentar->id }})">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
            <div class="pagination">
                <a href="{{ $content_commentar->previousPageUrl() }}" class="{{ ($content_commentar->onFirstPage()) ? 'disabled' : '' }}">Previous</a>
                
                <span>&nbsp; Page {{ $content_commentar->currentPage() }} of {{ $content_commentar->lastPage() }} &nbsp;</span>
        
                <a href="{{ $content_commentar->nextPageUrl() }}" class="{{ ($content_commentar->hasMorePages()) ? '' : 'disabled' }}">Next</a>
            </div>
        </div>
    </div>

    {{-- Modal Edit Begin --}}
    <div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Detail Komentar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="editIsiKomentar" class="form-label">Isi Komentar</label>
                        <textarea class="form-control" id="editIsiKomentar" row="4" disabled></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="editPenulisKomentar" class="form-label">Penulis Komentar</label>
                        <input type="text" class="form-control" id="editPenulisKomentar" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="editSentimenKomentar" class="form-label">Sentimen</label>
                        <select type="text" class="form-select" id="editSentimenKomentar">
                            <option value="Positif">Positif</option>
                            <option value="Negatif">Negatif</option>
                            <option value="Netral">Netral</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="editKategoriKomentar" class="form-label">Kategori</label>
                        <select type="text" class="form-select" id="editKategoriKomentar">
                            <option value="Feedback">Feedback</option>
                            <option value="Pertanyaan">Pertanyaan</option>
                            <option value="Engagement">Engagement</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="buttonPerbaruhi"
                        onclick="updateKomentar()">Perbaruhi</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal Edit End --}}

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

    {{-- Modal Konfirmasi Begin --}}
    <div class="modal fade" id="konfirmasiModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="alertModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div id="alertModalTitle" class="modal-header bg-danger">
                    <h5 class="modal-title" id="alertModalLabel">Alert</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label" id="pesanModal"></label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btnHapus"
                        onclick="deleteKomentar(1)">Hapus</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal Konfirmasi End --}}
@endsection

@section('scripts')
    <script>
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

        function getKomenData(id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('detail.comment') }}",
                type: 'GET',
                data: {
                    'id': id,
                },
                dataType: 'json',
                success: function(response) {
                    document.getElementById('editIsiKomentar').value = response.data.text;
                    document.getElementById('editPenulisKomentar').value = response.data.author;
                    document.getElementById('editSentimenKomentar').value = response.data.kelas_sentimen;
                    document.getElementById('editKategoriKomentar').value = response.data.kelas_kategori;

                    $('#buttonPerbaruhi').attr('onclick', 'updateKomentar(' + id + ')');
                    $('#editModal').modal('show');
                },
                error: function(error) {
                    console.log('Error:', error);
                    alertUpdate("Terdapat Kesalahan Pada Sistem", "error")
                }
            });
        }

        function updateKomentar(id) {
            var selectElement = document.getElementById('editKategoriKomentar');
            var selectedIndex = selectElement.selectedIndex;
            var value = selectElement.options[selectedIndex].value;
            var selectElement2 = document.getElementById('editSentimenKomentar');
            var selectedIndex2 = selectElement2.selectedIndex;
            var value2 = selectElement2.options[selectedIndex2].value;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('update.comment') }}",
                type: 'POST',
                data: {
                    'id': id,
                    'kelas_sentimen': value2,
                    'kelas_kategori': value,
                },
                dataType: 'json',
                success: function(response) {
                    $('#editModal').modal('hide');
                    $('#td_kategori_' + id).html(value);
                    $('#td_sentimen_' + id).html(value2);
                    alertUpdate(response.msg, response.status);
                },
                error: function(error) {
                    console.log('Error:', error);
                    alertUpdate("Terdapat Kesalahan Pada Sistem", "error")
                }
            });
        }

        function openModal(id) {
            $('#pesanModal').html("Apakah anda yakin untuk menghapus ini?");
            $('#konfirmasiModal').modal('show');
            $('#btnHapus').attr('onclick', 'deleteKomentar(' + id + ')');
        }

        function deleteKomentar(id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('delete.comment') }}",
                type: 'POST',
                data: {
                    'id': id,
                },
                dataType: 'json',
                success: function(response) {
                    $('#konfirmasiModal').modal('hide');
                    alertUpdate(response.msg, response.status);
                    $("#tr_" + id).remove();
                },
                error: function(error) {
                    console.log('Error:', error);
                    alertUpdate("Terdapat Kesalahan Pada Sistem", "error")
                }
            });
        }

        function updateKonten(id, sourcesId) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('update.content') }}",
                type: 'POST',
                data: {
                    'id': id,
                    'sourcesId': sourcesId,
                    'title': document.getElementById('title').value,
                    'creator': document.getElementById('creator').value,
                    'like_count': document.getElementById('like_count').value,
                },
                dataType: 'json',
                success: function(response) {
                    alertUpdate(response.msg, response.status);
                },
                error: function(error) {
                    console.log('Error:', error);
                    alertUpdate("Terdapat Kesalahan Pada Sistem", "error")
                }
            });
        }
    </script>
@endsection
