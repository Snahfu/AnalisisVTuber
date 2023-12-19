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
    <style>
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
                        <button class="btn btn-primary" id="buttonCrawling" onclick="crawlingRequest()"
                            type="button">Crawling!</button>
                    </div>
                    <div class="form-check form-check-inline mb-2">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadioInstagram"
                            value="Instagram" />
                        <label class="form-check-label" for="inlineRadioInstagram">Instagram</label>
                    </div>
                    <div class="form-check form-check-inline mb-2">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadioYoutube"
                            value="Youtube" checked />
                        <label class="form-check-label" for="inlineRadioYoutube">Youtube</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Inputs Group with Buttons end -->


    <!-- Donut Chart Starts-->
    <div id="chart_crawling" hidden>
        <div class="row justify-content-center">
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
    </div>
    <!-- Donut Chart Ends-->

    <!--begin::Card-->
    <div id="table-crawling" hidden>
        <div class="card mx-5 mt-2 mb-5">
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
                    <tbody id="table_body">

                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <a href="#" id="btn_detail_konten" class="btn btn-primary btn-small">Detail</a>
            </div>
        </div>
    </div>
    <!--end::Card-->

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
    <script>
        // RADIO SETUP
        const radio1 = document.getElementById('inlineRadioInstagram');
        const radio2 = document.getElementById('inlineRadioYoutube');
        const inputText = document.getElementById('crawlingText');
        var chartSentimen;
        var chartKategori;
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

        // Chart Setup
        var sentimen_chart = function(positif, negatif, netral) {
            const sentimentChart = "#chart_1";
            var options = {
                series: [positif, negatif, netral],
                chart: {
                    width: 380,
                    type: 'pie',
                },
                labels: ['Positif', 'Negatif', 'Netral'],
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
                colors: ['#00ff00', '#ff0000', '#dddddd']
            };

            chartSentimen = new ApexCharts(document.querySelector(sentimentChart), options);
            chartSentimen.render();
        }

        var kategori_chart = function(engagement, feedback, pertanyaan) {
            const categoryChart = "#chart_2";
            var options = {
                series: [engagement, feedback, pertanyaan],
                chart: {
                    width: 410,
                    type: 'pie',
                },
                labels: ['Engagement', 'Feedback', 'Pertanyaan'],
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
                colors: ['#43ff34', '#aa2277', '#eeddaa']
            };

            chartKategori = new ApexCharts(document.querySelector(categoryChart), options);
            chartKategori.render();
        }

        $(document).ready(function() {
            sentimen_chart(1, 1, 1);
            kategori_chart(1, 1, 1);
        });

        function crawlingRequest() {
            var sumber = $('input[name="inlineRadioOptions"]:checked').val()
            var data = {
                "sumber": sumber,
                "url": document.getElementById('crawlingText').value,
            };

            if (data.url.includes(sumber.toLowerCase())) {
                $('#loadingModal').modal('show');

                $.ajax({
                    url: '{{ env('API_URL') }}/crawling',
                    type: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify(data),
                    success: function(response) {
                        if (response.status == "success") {
                            // Update Chart
                            dataChartKategori = response.category_chart
                            dataChartSentimen = response.sentiment_chart

                            // Update Table
                            updateTabel(response.result.length, response.result)
                            chartKategori.destroy();
                            chartSentimen.destroy();
                            tableCrawlingResult.removeAttribute('hidden');
                            chartCrawlingResult.removeAttribute('hidden');
                            kategori_chart(dataChartKategori.Engagement, dataChartKategori.Feedback,
                                dataChartKategori.Pertanyaan)
                            sentimen_chart(dataChartSentimen.Positif, dataChartSentimen.Negatif,
                                dataChartSentimen
                                .Netral)
                            // Masukan Konten ke Database
                            masukanKonten(response.title[0], response.caption[0], response.creator[0], response
                                .like_count[0],
                                response.date[0], sumber, response.sourcesId, response.result)
                        } else {
                            alertUpdate(response.msg, response.status)
                        }
                        console.log('Crawling Request Result:', response);
                        $('#loadingModal').modal('hide');
                    },
                    error: function(error) {
                        console.error('Error:', error);

                        $('#loadingModal').modal('hide');
                        alertUpdate("Terdapat Kesalahan Pada Sistem", "error")
                    }
                });
            } else {
                alertUpdate("Silahkan pilih radio button yang tepat", "error")
            }


        }

        function updateTabel(length, result) {
            var stringHTML = ``;
            if (length < 10) {
                for (var i = 0; i < result.length; i++) {
                    stringHTML +=
                        `
                            <tr>
                                <td>${result[i].komentar}</td>
                                <td>${result[i].authors}</td>
                                <td>${result[i].likes}</td>
                                <td>${result[i].Sentimen}</td>
                                <td>${result[i].Kategori}</td>
                            </tr>
                        `
                }
            } else {
                for (var i = 0; i < 10; i++) {
                    stringHTML +=
                        `
                            <tr>
                                <td>${result[i].komentar}</td>
                                <td>${result[i].authors}</td>
                                <td>${result[i].likes}</td>
                                <td>${result[i].Sentimen}</td>
                                <td>${result[i].Kategori}</td>
                            </tr>
                        `
                }
            }

            document.getElementById('table_body').innerHTML = stringHTML;
        }

        function masukanKonten(title, caption, creator, like_count, date, sources, sourcesId, listKomentar) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('insert.content') }}",
                type: 'POST',
                data: {
                    'title': title,
                    'caption': caption,
                    'creator': creator,
                    'like_count': like_count,
                    'date': date,
                    'sources': sources,
                    'sourcesId': sourcesId,
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status == "success") {
                        console.log('Success:', "Berhasil Menambahkan data Konten");
                        // Masukan komentar ke database
                        masukanKomentar(listKomentar, response.dataId, response.dataSourceId)
                        // Membuat link button detail untuk melakukan perubahan data komentar
                        var linkElement = document.getElementById('btn_detail_konten');
                        linkElement.setAttribute('href', "{{ url('detail-content') }}/" + response.dataId +
                            "/" + response.dataSourceId);
                    } else {
                        alertUpdate("Terdapat Kesalahan Pada Database", response.status)
                    }
                },
                error: function(error) {
                    console.log('Error:', error);
                    alertUpdate("Terdapat Kesalahan Pada Sistem", "error")
                }
            });
        }

        function masukanKomentar(listKomentar, id, sourcesId) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('insert.comment') }}",
                type: 'POST',
                data: {
                    'listKomentar': listKomentar,
                    'id': id,
                    'sourcesId': sourcesId,
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status == "success") {
                        console.log("Berhasil Menambahkan data Komentar")
                    } else {
                        alertUpdate("Terdapat Kesalahan Pada Database", response.status)
                    }
                },
                error: function(error) {
                    console.log('Error:', error);
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
