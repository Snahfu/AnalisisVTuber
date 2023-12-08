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
        <div class="page-header d-flex align-items-center" style="background-image: url('assets/img/page-background.jpg');">

        </div>

        <nav>
            <div class="container">
                <ol>
                    <li><a href="{{ (Auth::user()->role == "Manager") ? route('manager.home') : route('vtuber.home') }}">Home</a></li>
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
            <form>
                <fieldset>
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="judul" aria-describedby="judulhelp" placeholder="Streaming sampai besok pagi!">
                        {{-- <div id="judulhelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                    </div>
                    <div class="mb-3">
                        <label for="pencipta" class="form-label">Pencipta</label>
                        <input type="text" class="form-control" id="pencipta" aria-describedby="penciptahelp" placeholder="HeroIsGod">
                        {{-- <div id="penciptahelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal Dibuat</label>
                        <input type="text" class="form-control" id="tanggal" aria-describedby="tanggalhelp" placeholder="7 Februari 2022">
                        {{-- <div id="tanggalhelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                    </div>
                </fieldset>
                {{-- <div class="row">
                    <div class="col-6">
                        <label for="sentiment" class="form-label">Jenis Sentiment</label>
                        <select class="mb-3 form-select" id="sentiment" aria-label="Default select example">
                            <option selected disabled>Ubah Sentimen</option>
                            <option value="positif">Positif</option>
                            <option value="negatif">Negatif</option>
                            <option value="netral">Netral</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <label for="kategoris" class="form-label">Jenis Kategori</label>
                        <select class="mb-3 form-select" id="kategoris" aria-label="Default select example">
                            <option selected disabled>Ubah Kategori</option>
                            <option value="feedback">Feedback</option>
                            <option value="engagement">Engagement</option>
                            <option value="others">Others</option>
                        </select>
                    </div>
                </div> --}}

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <div class="card mx-5 mt-3 mb-3">
        <div class="card-header">
            <h4 class="card-title">Data Komentar</h4>
        </div>
        <div class="card-body bg-custom h5 text-dark">
            <table class="table table-bordered table-striped table-light table-hover table-responsive">
                <thead>
                    <tr class="text-center">
                        <th>No.</th>
                        <th>Comments</th>
                        <th>Author</th>
                        <th>Total Like</th>
                        <th>Sentiment</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Senaaaa imuttt bangettt sihhh>< <td>@zahraersa7969</td>
                        <td> 2 </td>
                        <td> Positif </td>
                        <td> Engagement </td>
                        <td class="text-center">
                            <button class="btn btn-circle bg-danger text-light">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Sen Request game android Modern Warship lebih bagus dari pada World of Warship 😎</td>
                        <td>@a.b.fbima23LEGEND</td>
                        <td>0</td>
                        <td>Positif</td>
                        <td>Feedback</td>
                        <td class="text-center">
                            <button class="btn btn-circle bg-danger text-light">Delete</button>

                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Upload nya lama banget
                        </td>
                        <td>
                            @muhammadnarendrapratama</td>
                        <td>
                            0
                        </td>
                        <td>Negatif</td>
                        <td>Feedback</td>
                        <td class="text-center">
                            <button class="btn btn-circle bg-danger text-light">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Dame dame ~dame yo dame nanoyo, gak bakat mancing chi KSABAR crot
                        </td>
                        <td>@ZidanAseli</td>
                        <td>
                            1
                        </td>
                        <td>Netral</td>
                        <td>Others</td>
                        <td class="text-center">
                            <button class="btn btn-circle bg-danger text-light">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Nice~! Aku ga sabar pengen lihat model barumu~ 💜
                        </td>
                        <td>
                            @ArielDemonLady512</td>
                        <td>
                            1
                        </td>
                        <td>Positif</td>
                        <td>Engagement</td>
                        <td class="text-center">
                            <button class="btn btn-circle bg-danger text-light">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>kak main resident evil 4
                        </td>
                        <td>@vividesu299</td>
                        <td>
                            0
                        </td>
                        <td>Positif</td>
                        <td>Feedback</td>
                        <td class="text-center">
                            <button class="btn btn-circle bg-danger text-light">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
