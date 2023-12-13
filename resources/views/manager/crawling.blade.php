@extends('layouts.app')

@section('title')
    Crawling Manager
@endsection

@section('menu')
    <li><a href="{{ route('manager.home') }}">Home</a></li>
    <li><a href="{{ route('manager.crawl') }}" class="active">Crawling</a></li>
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
                    <li><a href="#">Crawling</a></li>
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
                        <button class="btn btn-primary" id="buttonCrawling" onclick="crawlingRequest()" type="button">Crawling!</button>
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
    <div class="row justify-content-center" id="chart_crawling" hidden>
        <div class="col-xl-5 col-6 mb-4">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">Sentiment Chart</h3>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin::Chart-->
                    <div id="chart_1" class="d-flex justify-content-center"></div>
                    <!--end::Chart-->
                </div>
            </div>
            <!--end::Card-->
        </div>
        <div class="col-xl-5 col-6 mb-4">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">Category Chart</h3>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin::Chart-->
                    <div id="chart_2" class="d-flex justify-content-center"></div>
                    <!--end::Chart-->
                </div>
            </div>
            <!--end::Card-->
        </div>
    </div>
    <!-- Donut Chart Ends-->

    <!--begin::Card-->
    <div id="table-crawling" hidden>
        <div class="card mx-5 mt-2 mb-5" >
            <div class="card-header">
                <h4 class="card-title">Result Crawling</h4>
            </div>
            <div class="card-body bg-custom h5 text-dark">
                <table class="table table-bordered table-striped table-light table-hover table-responsive">
                    <thead>
                        <tr class="text-center">
                            <th>Comments</th>
                            <th>Author</th>
                            <th>Total Like</th>
                            <th>Sentiment</th>
                            <th>Category</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Senaaaa imuttt bangettt sihhh>< 
                            <td>@zahraersa7969</td>
                            <td> 2 </td>
                            <td> Positif </td>
                            <td> Engagement </td>
                        </tr>
                        <tr>
                            <td>Sen Request game android Modern Warship lebih bagus dari pada World of Warship 😎</td>
                            <td>@a.b.fbima23LEGEND</td>
                            <td>0</td>
                            <td>Positif</td>
                            <td>Feedback</td>
                        </tr>
                        <tr>
                            <td>Upload nya lama banget
                            </td>
                            <td>
                                @muhammadnarendrapratama</td>
                            <td>
                                0
                            </td>
                            <td>Negatif</td>
                            <td>Feedback</td>
                            
                        </tr>
                        <tr>
                            <td>Dame dame ~dame yo dame nanoyo, gak bakat mancing chi KSABAR crot
                            </td>
                            <td>@ZidanAseli</td>
                            <td>
                                1
                            </td>
                            <td>Netral</td>
                            <td>Others</td>
                            
                        </tr>
                        <tr>
                            <td>Nice~! Aku ga sabar pengen lihat model barumu~ 💜
                            </td>
                            <td>
                                @ArielDemonLady512</td>
                            <td>
                                1
                            </td>
                            <td>Positif</td>
                            <td>Engagement</td>
                            
                        </tr>
                        <tr>
                            <td>kak main resident evil 4
                            </td>
                            <td>@vividesu299</td>
                            <td>
                                0
                            </td>
                            <td>Positif</td>
                            <td>Feedback</td>
                            
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--end::Card-->
@endsection

@section('scripts')
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
        const chartCrawlingResult = document.getElementById('chart_crawling');
        buttonStartCrawling.addEventListener('click', function() {
            if (radio1.checked) {
                alert('Crawling pada Instagram');
            } else {
                alert('Crawling pada Youtube');
            }
            // Update table lalu baru tampilkan
            tableCrawlingResult.removeAttribute('hidden');
            chartCrawlingResult.removeAttribute('hidden');
        });

        // Chart Setup
        var sentimen_chart = function() {
            const sentimentChart = "#chart_1";
            var options = {
                series: [13, 43, 22],
                chart: {
                    width: 380,
                    type: 'pie',
                },
                labels: ['Team C', 'Team D', 'Team E'],
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }],
                colors: ['#ff0000', '#00ff00', '#0000ff']
            };

            var chart = new ApexCharts(document.querySelector(sentimentChart), options);
            chart.render();

        }

        var kategori_chart = function() {
            const categoryChart = "#chart_2";
            var options = {
                series: [13, 43, 22],
                chart: {
                    width: 380,
                    type: 'pie',
                },
                labels: ['Team C', 'Team D', 'Team E'],
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }],
                colors: ['#ff0000', '#00ff00', '#0000ff']
            };

            var chart = new ApexCharts(document.querySelector(categoryChart), options);
            chart.render();

        }

        $(document).ready(function() {
            sentimen_chart();
            kategori_chart();
        });

        function crawlingRequest() {
            var data = {
                "sumber": $('input[name="inlineRadioOptions"]:checked').val(),
                "url": document.getElementById('crawlingText').value,
            };

            $.ajax({
                url: 'http://localhost:5000/crawling',
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify(data),
                success: function(response) {
                    console.log('Crawling Request Result:', response);

                },
                error: function(error) {
                    console.error('Error:', error);

                }
            });
        }

        function trainModelRequest() {
            var data = {
                "ArrayKomentar": ["Komentar 1", "Komentar 2", "Komentar 3"]
            };

            $.ajax({
                url: 'http://localhost:5000/train-model', 
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify(data),
                success: function(response) {
                    console.log('Train Model Request Result:', response);

                },
                error: function(error) {
                    console.error('Error:', error);

                }
            });
        }
    </script>
@endsection
