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
                        <tr>
                            <td>1</td>
                            <td>hboule0@hp.com</td>
                            <td>Hayes Boule</td>
                            <td>27 Januari 2018</td>
                            <td class="text-center"><span class="badge rounded-pill bg-danger">Youtube</span></td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <span class="settings-icon"><i class="fas fa-cog"></i></span>
                                    <div class="dropdown-content">
                                        <a href="https://www.youtube.com/watch?v=6n2kQjQTc5k">Link</a>
                                        <a href="#">Detail</a>
                                        <a href="#">Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>hbresnen1@theguardian.com</td>
                            <td>Humbert Bresnen</td>
                            <td>Hodkiewicz and Sons</td>
                            <td class="text-center"><span class="badge rounded-pill bg-instagram">Instagram</span></td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <span class="settings-icon"><i class="fas fa-cog"></i></span>
                                    <div class="dropdown-content">
                                        <a href="https://www.youtube.com/watch?v=6n2kQjQTc5k">Link</a>
                                        <a href="#">Detail</a>
                                        <a href="#">Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>jlabro2@kickstarter.com</td>
                            <td>Jareb Labro</td>
                            <td>Kuhlman Inc</td>
                            <td class="text-center"><span class="badge rounded-pill bg-instagram">Instagram</span></td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <span class="settings-icon"><i class="fas fa-cog"></i></span>
                                    <div class="dropdown-content">
                                        <a href="https://www.youtube.com/watch?v=6n2kQjQTc5k">Link</a>
                                        <a href="#">Detail</a>
                                        <a href="#">Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>ktosspell3@flickr.com</td>
                            <td>Krishnah Tosspell</td>
                            <td>Prosacco-Kessler</td>
                            <td class="text-center"><span class="badge rounded-pill bg-instagram">Instagram</span></td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <span class="settings-icon"><i class="fas fa-cog"></i></span>
                                    <div class="dropdown-content">
                                        <a href="https://www.youtube.com/watch?v=6n2kQjQTc5k">Link</a>
                                        <a href="#">Detail</a>
                                        <a href="#">Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>dkernan4@mapquest.com</td>
                            <td>Dale Kernan</td>
                            <td>Bernier and Sons</td>
                            <td class="text-center"><span class="badge rounded-pill bg-instagram">Instagram</span></td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <span class="settings-icon"><i class="fas fa-cog"></i></span>
                                    <div class="dropdown-content">
                                        <a href="https://www.youtube.com/watch?v=6n2kQjQTc5k">Link</a>
                                        <a href="#">Detail</a>
                                        <a href="#">Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>hbentham5@nih.gov</td>
                            <td>Halley Bentham</td>
                            <td>Schoen-Metz</td>
                            <td class="text-center"><span class="badge rounded-pill bg-instagram">Instagram</span></td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <span class="settings-icon"><i class="fas fa-cog"></i></span>
                                    <div class="dropdown-content">
                                        <a href="https://www.youtube.com/watch?v=6n2kQjQTc5k">Link</a>
                                        <a href="#">Detail</a>
                                        <a href="#">Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>bpenddreth6@example.com</td>
                            <td>Burgess Penddreth</td>
                            <td>DuBuque, Stanton and Stanton</td>
                            <td class="text-center"><span class="badge rounded-pill bg-instagram">Instagram</span></td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <span class="settings-icon"><i class="fas fa-cog"></i></span>
                                    <div class="dropdown-content">
                                        <a href="https://www.youtube.com/watch?v=6n2kQjQTc5k">Link</a>
                                        <a href="#">Detail</a>
                                        <a href="#">Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>csedwick7@wikispaces.com</td>
                            <td>Cob Sedwick</td>
                            <td>Homenick-Nolan</td>
                            <td class="text-center"><span class="badge rounded-pill bg-instagram">Instagram</span></td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <span class="settings-icon"><i class="fas fa-cog"></i></span>
                                    <div class="dropdown-content">
                                        <a href="https://www.youtube.com/watch?v=6n2kQjQTc5k">Link</a>
                                        <a href="#">Detail</a>
                                        <a href="#">Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>tcallaghan8@squidoo.com</td>
                            <td>Tabby Callaghan</td>
                            <td>Daugherty-Considine</td>
                            <td class="text-center"><span class="badge rounded-pill bg-instagram">Instagram</span></td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <span class="settings-icon"><i class="fas fa-cog"></i></span>
                                    <div class="dropdown-content">
                                        <a href="https://www.youtube.com/watch?v=6n2kQjQTc5k">Link</a>
                                        <a href="#">Detail</a>
                                        <a href="#">Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>bjarry9@craigslist.org</td>
                            <td>Broddy Jarry</td>
                            <td>Walter Group</td>
                            <td class="text-center"><span class="badge rounded-pill bg-instagram">Instagram</span></td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <span class="settings-icon"><i class="fas fa-cog"></i></span>
                                    <div class="dropdown-content">
                                        <a href="https://www.youtube.com/watch?v=6n2kQjQTc5k">Link</a>
                                        <a href="#">Detail</a>
                                        <a href="#">Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>11</td>
                            <td>mmcgougana@dion.ne.jp</td>
                            <td>Marjorie McGougan</td>
                            <td>Littel and Sons</td>
                            <td class="text-center"><span class="badge rounded-pill bg-danger">Youtube</span></td>
                            <td nowrap="nowrap"></td>
                        </tr>
                        <tr>
                            <td>12</td>
                            <td>espriggingb@china.com.cn</td>
                            <td>Edsel Sprigging</td>
                            <td>Kulas, Huels and Strosin</td>
                            <td class="text-center"><span class="badge rounded-pill bg-danger">Youtube</span></td>
                            <td nowrap="nowrap"></td>
                        </tr>
                        <tr>
                            <td>13</td>
                            <td>jgouldebyc@cocolog-nifty.com</td>
                            <td>Jess Gouldeby</td>
                            <td>Moen Group</td>
                            <td class="text-center"><span class="badge rounded-pill bg-danger">Youtube</span></td>
                            <td nowrap="nowrap"></td>
                        </tr>
                        <tr>
                            <td>14</td>
                            <td>mmatzld@msn.com</td>
                            <td>Marys Matzl</td>
                            <td>Emard-Gerhold</td>
                            <td class="text-center"><span class="badge rounded-pill bg-danger">Youtube</span></td>
                            <td nowrap="nowrap"></td>
                        </tr>
                        <tr>
                            <td>15</td>
                            <td>gfranscionie@craigslist.org</td>
                            <td>Gabrila Franscioni</td>
                            <td>Gusikowski LLC</td>
                            <td class="text-center"><span class="badge rounded-pill bg-danger">Youtube</span></td>
                            <td nowrap="nowrap"></td>
                        </tr>
                        <tr>
                            <td>16</td>
                            <td>cbookerf@blogs.com</td>
                            <td>Cozmo Booker</td>
                            <td>Dickinson-Klein</td>
                            <td class="text-center"><span class="badge rounded-pill bg-danger">Youtube</span></td>
                            <td nowrap="nowrap"></td>
                        </tr>
                        <tr>
                            <td>17</td>
                            <td>alarkingg@elegantthemes.com</td>
                            <td>Arlie Larking</td>
                            <td>Rosenbaum Group</td>
                            <td class="text-center"><span class="badge rounded-pill bg-danger">Youtube</span></td>
                            <td nowrap="nowrap"></td>
                        </tr>
                        <tr>
                            <td>18</td>
                            <td>yscogingsh@liveinternet.ru</td>
                            <td>Yorker Scogings</td>
                            <td>Gorczany LLC</td>
                            <td class="text-center"><span class="badge rounded-pill bg-danger">Youtube</span></td>
                            <td nowrap="nowrap"></td>
                        </tr>
                        <tr>
                            <td>19</td>
                            <td>dmuscotti@bloomberg.com</td>
                            <td>Dominick Muscott</td>
                            <td>Swaniawski-Sipes</td>
                            <td class="text-center"><span class="badge rounded-pill bg-danger">Youtube</span></td>
                            <td nowrap="nowrap"></td>
                        </tr>
                        <tr>
                            <td>20</td>
                            <td>lkynforthj@meetup.com</td>
                            <td>Laurette Kynforth</td>
                            <td>Torp-Satterfield</td>
                            <td class="text-center"><span class="badge rounded-pill bg-danger">Youtube</span></td>
                            <td nowrap="nowrap"></td>
                        </tr>
                        <tr>
                            <td>21</td>
                            <td>blycettk@t.co</td>
                            <td>Beryl Lycett</td>
                            <td>Schoen Inc</td>
                            <td class="text-center"><span class="badge rounded-pill bg-instagram">Instagram</span></td>
                            <td nowrap="nowrap"></td>
                        </tr>
                        <tr>
                            <td>22</td>
                            <td>cboggasl@quantcast.com</td>
                            <td>Carny Boggas</td>
                            <td>Kuphal LLC</td>
                            <td class="text-center"><span class="badge rounded-pill bg-instagram">Instagram</span></td>
                            <td nowrap="nowrap"></td>
                        </tr>
                        <tr>
                            <td>23</td>
                            <td>daxelbym@about.me</td>
                            <td>Dyana Axelby</td>
                            <td>Runolfsdottir-Hayes</td>
                            <td class="text-center"><span class="badge rounded-pill bg-instagram">Instagram</span></td>
                            <td nowrap="nowrap"></td>
                        </tr>
                        <tr>
                            <td>24</td>
                            <td>oduffyn@de.vu</td>
                            <td>Orelle Duffy</td>
                            <td>Roberts and Sons</td>
                            <td class="text-center"><span class="badge rounded-pill bg-instagram">Instagram</span></td>
                            <td nowrap="nowrap"></td>
                        </tr>
                        <tr>
                            <td>25</td>
                            <td>tkindero@hud.gov</td>
                            <td>Taylor Kinder</td>
                            <td>Terry-Howell</td>
                            <td class="text-center"><span class="badge rounded-pill bg-instagram">Instagram</span></td>
                            <td nowrap="nowrap"></td>
                        </tr>
                        <tr>
                            <td>26</td>
                            <td>eaylesburyp@va.gov</td>
                            <td>Emanuele Aylesbury</td>
                            <td>Torp LLC</td>
                            <td class="text-center"><span class="badge rounded-pill bg-instagram">Instagram</span></td>
                            <td nowrap="nowrap"></td>
                        </tr>
                        <tr>
                            <td>27</td>
                            <td>dgibkeq@multiply.com</td>
                            <td>Dorie Gibke</td>
                            <td>Tremblay and Sons</td>
                            <td class="text-center"><span class="badge rounded-pill bg-instagram">Instagram</span></td>
                            <td nowrap="nowrap"></td>
                        </tr>
                        <tr>
                            <td>28</td>
                            <td>mharraginr@arstechnica.com</td>
                            <td>Melisandra Harragin</td>
                            <td>Turner-Cartwright</td>
                            <td class="text-center"><span class="badge rounded-pill bg-danger">Youtube</span></td>
                            <td nowrap="nowrap"></td>
                        </tr>
                        <tr>
                            <td>29</td>
                            <td>blampetts@behance.net</td>
                            <td>Berenice Lampett</td>
                            <td>Johnston-Fritsch</td>
                            <td class="text-center"><span class="badge rounded-pill bg-danger">Youtube</span></td>
                            <td nowrap="nowrap"></td>
                        </tr>
                        <tr>
                            <td>30</td>
                            <td>tmcmurthyt@psu.edu</td>
                            <td>Tammie McMurthy</td>
                            <td>Sipes, Conn and Stiedemann</td>
                            <td class="text-center"><span class="badge rounded-pill bg-danger">Youtube</span></td>
                            <td nowrap="nowrap"></td>
                        </tr>
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
