@extends('layouts.app')

@section('title')
    Crawling VTuber
@endsection

@section('menu')
    <li><a href="{{ route('vtuber.home') }}">Home</a></li>
    <li><a href="{{ route('vtuber.crawl') }}" class="active">Crawling</a></li>
    <li><a href="{{ route('vtuber.analysis') }}">Analysis</a></li>
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
                    <li><a href="index.html">Home</a></li>
                </ol>
            </div>
        </nav>
    </div>
    <div class="container position-relative mb-5 mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-10 text-center">
                <div class="mb-1">
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" placeholder="Masukan Link/URL dari video/shorts Youtube"
                            aria-describedby="buttonCrawling" id="crawlingText" />
                        <button class="btn btn-primary" id="buttonCrawling" type="button">Crawling!</button>
                    </div>
                    <div class="form-check form-check-inline mb-2">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadioInstagram"
                            value="instagram" />
                        <label class="form-check-label" for="inlineRadioInstagram">Instagram</label>
                    </div>
                    <div class="form-check form-check-inline mb-2">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadioYoutube"
                            value="youtube" checked />
                        <label class="form-check-label" for="inlineRadioYoutube">Youtube</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Inputs Group with Buttons end -->


    <!-- Donut Chart Starts-->
    <div class="col-xl-6 col-12">
        <div class="card">
            <div class="card-header flex-column align-items-start">
                <h4 class="card-title mb-75">Expense Ratio</h4>
                <span class="card-subtitle text-muted">Spending on various categories </span>
            </div>
            <div class="card-body">
                <div id="donut-chart"></div>
            </div>
        </div>
    </div>
    <!-- Donut Chart Ends-->

    <!-- Striped rows start -->
    <div class="row" id="table-crawling" hidden>
        <div class="col-12">
            <div class="card mx-5 mb-5">
                <div class="card-header">
                    <h4 class="card-title">Result Crawling</h4>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
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
                                    <td>
                                        {{-- <img src="{{ asset('images/icons/angular.svg') }}" class="me-75" height="20"
                                            width="20" alt="Angular" />
                                        <span class="fw-bold">Angular Project</span> --}}
                                        Senaaaa imuttt bangettt sihhh>< </td>
                                    <td>@zahraersa7969</td>
                                    <td> 2 </td>
                                    <td> Positif </td>
                                    <td> Engagement </td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0"
                                                data-bs-toggle="dropdown">
                                                <i data-feather="more-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">
                                                    <i data-feather="edit-2" class="me-50"></i>
                                                    <span>Edit</span>
                                                </a>
                                                <a class="dropdown-item" href="#">
                                                    <i data-feather="trash" class="me-50"></i>
                                                    <span>Delete</span>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        {{-- <img src="{{ asset('images/icons/angular.svg') }}" class="me-75" height="20"
                                            width="20" alt="Angular" />
                                        <span class="fw-bold">Angular Project</span> --}}
                                        Sen Request game android Modern Warship lebih bagus dari pada World of Warship 😎
                                    </td>
                                    <td>@a.b.fbima23LEGEND</td>
                                    <td>
                                        0
                                    </td>
                                    <td>Positif</td>
                                    <td>Feedback</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0"
                                                data-bs-toggle="dropdown">
                                                <i data-feather="more-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">
                                                    <i data-feather="edit-2" class="me-50"></i>
                                                    <span>Edit</span>
                                                </a>
                                                <a class="dropdown-item" href="#">
                                                    <i data-feather="trash" class="me-50"></i>
                                                    <span>Delete</span>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        {{-- <img src="{{ asset('images/icons/angular.svg') }}" class="me-75" height="20"
                                            width="20" alt="Angular" />
                                        <span class="fw-bold">Angular Project</span> --}}
                                        Upload nya lama banget
                                    </td>
                                    <td>
                                        @muhammadnarendrapratama</td>
                                    <td>
                                        0
                                    </td>
                                    <td>Negatif</td>
                                    <td>Feedback</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0"
                                                data-bs-toggle="dropdown">
                                                <i data-feather="more-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">
                                                    <i data-feather="edit-2" class="me-50"></i>
                                                    <span>Edit</span>
                                                </a>
                                                <a class="dropdown-item" href="#">
                                                    <i data-feather="trash" class="me-50"></i>
                                                    <span>Delete</span>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        {{-- <img src="{{ asset('images/icons/angular.svg') }}" class="me-75" height="20"
                                            width="20" alt="Angular" />
                                        <span class="fw-bold">Angular Project</span> --}}
                                        Nice~! Aku ga sabar pengen lihat model barumu~ 💜
                                    </td>
                                    <td>
                                        @ArielDemonLady512</td>
                                    <td>
                                        1
                                    </td>
                                    <td>Positif</td>
                                    <td>Engagement</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0"
                                                data-bs-toggle="dropdown">
                                                <i data-feather="more-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">
                                                    <i data-feather="edit-2" class="me-50"></i>
                                                    <span>Edit</span>
                                                </a>
                                                <a class="dropdown-item" href="#">
                                                    <i data-feather="trash" class="me-50"></i>
                                                    <span>Delete</span>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        {{-- <img src="{{ asset('images/icons/angular.svg') }}" class="me-75" height="20"
                                            width="20" alt="Angular" />
                                        <span class="fw-bold">Angular Project</span> --}}
                                        Dame dame ~dame yo dame nanoyo, gak bakat mancing chi KSABAR crot
                                    </td>
                                    <td>@ZidanAseli</td>
                                    <td>
                                        1
                                    </td>
                                    <td>Netral</td>
                                    <td>Others</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0"
                                                data-bs-toggle="dropdown">
                                                <i data-feather="more-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">
                                                    <i data-feather="edit-2" class="me-50"></i>
                                                    <span>Edit</span>
                                                </a>
                                                <a class="dropdown-item" href="#">
                                                    <i data-feather="trash" class="me-50"></i>
                                                    <span>Delete</span>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        {{-- <img src="{{ asset('images/icons/angular.svg') }}" class="me-75" height="20"
                                            width="20" alt="Angular" />
                                        <span class="fw-bold">Angular Project</span> --}}
                                        kak main resident evil 4
                                    </td>
                                    <td>@vividesu299</td>
                                    <td>
                                        0
                                    </td>
                                    <td>Positif</td>
                                    <td>Feedback</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0"
                                                data-bs-toggle="dropdown">
                                                <i data-feather="more-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">
                                                    <i data-feather="edit-2" class="me-50"></i>
                                                    <span>Edit</span>
                                                </a>
                                                <a class="dropdown-item" href="#">
                                                    <i data-feather="trash" class="me-50"></i>
                                                    <span>Delete</span>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Striped rows end -->
    <script>
        // RADIO SETUP
        const radio1 = document.getElementById('inlineRadioInstagram');
        const radio2 = document.getElementById('inlineRadioYoutube');
        const inputText = document.getElementById('crawlingText');

        radio1.addEventListener('click', function() {
            inputText.placeholder = 'Masukan Link/URL Postingan pada Instagram';
        });

        radio2.addEventListener('click', function() {
            inputText.placeholder = 'Masukan Link/URL dari video/shorts Youtube';
        });

        // BUTTON SETUP
        const buttonStartCrawling = document.getElementById('buttonCrawling');
        const tableCrawlingResult = document.getElementById('table-crawling');
        buttonStartCrawling.addEventListener('click', function() {
            if (radio1.checked) {
                alert('Crawling pada Instagram');
            } else {
                alert('Crawling pada Youtube');
            }
            // Update table lalu baru tampilkan
            tableCrawlingResult.removeAttribute('hidden');
        });
    </script>
@endsection
