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
    <link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
    <style></style>
@endsection

@section('content')
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('assets/img/page-background.jpg');">

        </div>

        <nav>
            <div class="container">
                <ol>
                    <li><a href="index.html">History</a></li>
                </ol>
            </div>
        </nav>
    </div>

    <!--begin::Card-->
    <div class="card card-custom">
        <div class="card-header flex-wrap py-5">
            <div class="card-title">
                <h3 class="card-label">Column Rendering
                    <div class="text-muted pt-2 font-size-sm">custom colu rendering</div>
                </h3>
            </div>
            <div class="card-toolbar">
                <!--begin::Dropdown-->
                <div class="dropdown dropdown-inline mr-2">
                    <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="svg-icon svg-icon-md">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/PenAndRuller.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path
                                        d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z"
                                        fill="#000000" opacity="0.3" />
                                    <path
                                        d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z"
                                        fill="#000000" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>Export</button>
                    <!--begin::Dropdown Menu-->
                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                        <!--begin::Navigation-->
                        <ul class="navi flex-column navi-hover py-2">
                            <li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">Choose
                                an option:</li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="la la-print"></i>
                                    </span>
                                    <span class="navi-text">Print</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="la la-copy"></i>
                                    </span>
                                    <span class="navi-text">Copy</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="la la-file-excel-o"></i>
                                    </span>
                                    <span class="navi-text">Excel</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="la la-file-text-o"></i>
                                    </span>
                                    <span class="navi-text">CSV</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="la la-file-pdf-o"></i>
                                    </span>
                                    <span class="navi-text">PDF</span>
                                </a>
                            </li>
                        </ul>
                        <!--end::Navigation-->
                    </div>
                    <!--end::Dropdown Menu-->
                </div>
                <!--end::Dropdown-->
                <!--begin::Button-->
                <a href="#" class="btn btn-primary font-weight-bolder">
                    <span class="svg-icon svg-icon-md">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                            height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <circle fill="#000000" cx="9" cy="15" r="6" />
                                <path
                                    d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
                                    fill="#000000" opacity="0.3" />
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>New Record</a>
                <!--end::Button-->
            </div>
        </div>
        <div class="card-body">
            <!--begin: Datatable-->
            <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
                <thead>
                    <tr>
                        <th>Record ID</th>
                        <th>Company Email</th>
                        <th>Company Agent</th>
                        <th>Company Name</th>
                        <th>Status</th>
                        <th>Type</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>hboule0@hp.com</td>
                        <td>Hayes Boule</td>
                        <td>Casper-Kerluke</td>
                        <td>5</td>
                        <td>1</td>
                        <td nowrap="nowrap"></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>hbresnen1@theguardian.com</td>
                        <td>Humbert Bresnen</td>
                        <td>Hodkiewicz and Sons</td>
                        <td>2</td>
                        <td>2</td>
                        <td nowrap="nowrap"></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>jlabro2@kickstarter.com</td>
                        <td>Jareb Labro</td>
                        <td>Kuhlman Inc</td>
                        <td>6</td>
                        <td>2</td>
                        <td nowrap="nowrap"></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>ktosspell3@flickr.com</td>
                        <td>Krishnah Tosspell</td>
                        <td>Prosacco-Kessler</td>
                        <td>1</td>
                        <td>1</td>
                        <td nowrap="nowrap"></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>dkernan4@mapquest.com</td>
                        <td>Dale Kernan</td>
                        <td>Bernier and Sons</td>
                        <td>5</td>
                        <td>2</td>
                        <td nowrap="nowrap"></td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>hbentham5@nih.gov</td>
                        <td>Halley Bentham</td>
                        <td>Schoen-Metz</td>
                        <td>1</td>
                        <td>3</td>
                        <td nowrap="nowrap"></td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>bpenddreth6@example.com</td>
                        <td>Burgess Penddreth</td>
                        <td>DuBuque, Stanton and Stanton</td>
                        <td>5</td>
                        <td>2</td>
                        <td nowrap="nowrap"></td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>csedwick7@wikispaces.com</td>
                        <td>Cob Sedwick</td>
                        <td>Homenick-Nolan</td>
                        <td>3</td>
                        <td>2</td>
                        <td nowrap="nowrap"></td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td>tcallaghan8@squidoo.com</td>
                        <td>Tabby Callaghan</td>
                        <td>Daugherty-Considine</td>
                        <td>2</td>
                        <td>2</td>
                        <td nowrap="nowrap"></td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td>bjarry9@craigslist.org</td>
                        <td>Broddy Jarry</td>
                        <td>Walter Group</td>
                        <td>1</td>
                        <td>2</td>
                        <td nowrap="nowrap"></td>
                    </tr>
                    <tr>
                        <td>11</td>
                        <td>mmcgougana@dion.ne.jp</td>
                        <td>Marjorie McGougan</td>
                        <td>Littel and Sons</td>
                        <td>6</td>
                        <td>1</td>
                        <td nowrap="nowrap"></td>
                    </tr>
                    <tr>
                        <td>12</td>
                        <td>espriggingb@china.com.cn</td>
                        <td>Edsel Sprigging</td>
                        <td>Kulas, Huels and Strosin</td>
                        <td>6</td>
                        <td>3</td>
                        <td nowrap="nowrap"></td>
                    </tr>
                    <tr>
                        <td>13</td>
                        <td>jgouldebyc@cocolog-nifty.com</td>
                        <td>Jess Gouldeby</td>
                        <td>Moen Group</td>
                        <td>5</td>
                        <td>1</td>
                        <td nowrap="nowrap"></td>
                    </tr>
                    <tr>
                        <td>14</td>
                        <td>mmatzld@msn.com</td>
                        <td>Marys Matzl</td>
                        <td>Emard-Gerhold</td>
                        <td>2</td>
                        <td>3</td>
                        <td nowrap="nowrap"></td>
                    </tr>
                    <tr>
                        <td>15</td>
                        <td>gfranscionie@craigslist.org</td>
                        <td>Gabrila Franscioni</td>
                        <td>Gusikowski LLC</td>
                        <td>4</td>
                        <td>2</td>
                        <td nowrap="nowrap"></td>
                    </tr>
                    <tr>
                        <td>16</td>
                        <td>cbookerf@blogs.com</td>
                        <td>Cozmo Booker</td>
                        <td>Dickinson-Klein</td>
                        <td>1</td>
                        <td>3</td>
                        <td nowrap="nowrap"></td>
                    </tr>
                    <tr>
                        <td>17</td>
                        <td>alarkingg@elegantthemes.com</td>
                        <td>Arlie Larking</td>
                        <td>Rosenbaum Group</td>
                        <td>4</td>
                        <td>2</td>
                        <td nowrap="nowrap"></td>
                    </tr>
                    <tr>
                        <td>18</td>
                        <td>yscogingsh@liveinternet.ru</td>
                        <td>Yorker Scogings</td>
                        <td>Gorczany LLC</td>
                        <td>2</td>
                        <td>3</td>
                        <td nowrap="nowrap"></td>
                    </tr>
                    <tr>
                        <td>19</td>
                        <td>dmuscotti@bloomberg.com</td>
                        <td>Dominick Muscott</td>
                        <td>Swaniawski-Sipes</td>
                        <td>2</td>
                        <td>2</td>
                        <td nowrap="nowrap"></td>
                    </tr>
                    <tr>
                        <td>20</td>
                        <td>lkynforthj@meetup.com</td>
                        <td>Laurette Kynforth</td>
                        <td>Torp-Satterfield</td>
                        <td>1</td>
                        <td>2</td>
                        <td nowrap="nowrap"></td>
                    </tr>
                    <tr>
                        <td>21</td>
                        <td>blycettk@t.co</td>
                        <td>Beryl Lycett</td>
                        <td>Schoen Inc</td>
                        <td>3</td>
                        <td>3</td>
                        <td nowrap="nowrap"></td>
                    </tr>
                    <tr>
                        <td>22</td>
                        <td>cboggasl@quantcast.com</td>
                        <td>Carny Boggas</td>
                        <td>Kuphal LLC</td>
                        <td>2</td>
                        <td>2</td>
                        <td nowrap="nowrap"></td>
                    </tr>
                    <tr>
                        <td>23</td>
                        <td>daxelbym@about.me</td>
                        <td>Dyana Axelby</td>
                        <td>Runolfsdottir-Hayes</td>
                        <td>2</td>
                        <td>1</td>
                        <td nowrap="nowrap"></td>
                    </tr>
                    <tr>
                        <td>24</td>
                        <td>oduffyn@de.vu</td>
                        <td>Orelle Duffy</td>
                        <td>Roberts and Sons</td>
                        <td>5</td>
                        <td>3</td>
                        <td nowrap="nowrap"></td>
                    </tr>
                    <tr>
                        <td>25</td>
                        <td>tkindero@hud.gov</td>
                        <td>Taylor Kinder</td>
                        <td>Terry-Howell</td>
                        <td>3</td>
                        <td>1</td>
                        <td nowrap="nowrap"></td>
                    </tr>
                    <tr>
                        <td>26</td>
                        <td>eaylesburyp@va.gov</td>
                        <td>Emanuele Aylesbury</td>
                        <td>Torp LLC</td>
                        <td>3</td>
                        <td>1</td>
                        <td nowrap="nowrap"></td>
                    </tr>
                    <tr>
                        <td>27</td>
                        <td>dgibkeq@multiply.com</td>
                        <td>Dorie Gibke</td>
                        <td>Tremblay and Sons</td>
                        <td>1</td>
                        <td>1</td>
                        <td nowrap="nowrap"></td>
                    </tr>
                    <tr>
                        <td>28</td>
                        <td>mharraginr@arstechnica.com</td>
                        <td>Melisandra Harragin</td>
                        <td>Turner-Cartwright</td>
                        <td>5</td>
                        <td>3</td>
                        <td nowrap="nowrap"></td>
                    </tr>
                    <tr>
                        <td>29</td>
                        <td>blampetts@behance.net</td>
                        <td>Berenice Lampett</td>
                        <td>Johnston-Fritsch</td>
                        <td>2</td>
                        <td>2</td>
                        <td nowrap="nowrap"></td>
                    </tr>
                    <tr>
                        <td>30</td>
                        <td>tmcmurthyt@psu.edu</td>
                        <td>Tammie McMurthy</td>
                        <td>Sipes, Conn and Stiedemann</td>
                        <td>2</td>
                        <td>3</td>
                        <td nowrap="nowrap"></td>
                    </tr>
                    <tr>
                        <td>31</td>
                        <td>djoyesu@microsoft.com</td>
                        <td>Dinnie Joyes</td>
                        <td>Keebler Group</td>
                        <td>5</td>
                        <td>1</td>
                        <td nowrap="nowrap"></td>
                    </tr>
                    <tr>
                        <td>32</td>
                        <td>kaxelbeyv@macromedia.com</td>
                        <td>Kerianne Axelbey</td>
                        <td>Wolff, Sporer and Bechtelar</td>
                        <td>6</td>
                        <td>1</td>
                        <td nowrap="nowrap"></td>
                    </tr>
                    <tr>
                        <td>33</td>
                        <td>kmacterlaghw@dailymotion.com</td>
                        <td>Kiley MacTerlagh</td>
                        <td>Hauck Inc</td>
                        <td>2</td>
                        <td>3</td>
                        <td nowrap="nowrap"></td>
                    </tr>
                    <tr>
                        <td>34</td>
                        <td>tshuttlex@washingtonpost.com</td>
                        <td>Trula Shuttle</td>
                        <td>Will-Morissette</td>
                        <td>5</td>
                        <td>1</td>
                        <td nowrap="nowrap"></td>
                    </tr>
                    <tr>
                        <td>35</td>
                        <td>hbrisleny@4shared.com</td>
                        <td>Hollis Brislen</td>
                        <td>Lowe, Jaskolski and Gulgowski</td>
                        <td>4</td>
                        <td>2</td>
                        <td nowrap="nowrap"></td>
                    </tr>
                    <tr>
                        <td>36</td>
                        <td>mbattinz@gov.uk</td>
                        <td>Marsh Battin</td>
                        <td>Fay LLC</td>
                        <td>6</td>
                        <td>1</td>
                        <td nowrap="nowrap"></td>
                    </tr>
                    <tr>
                        <td>37</td>
                        <td>ppinnion10@state.tx.us</td>
                        <td>Patrizio Pinnion</td>
                        <td>Haag-Stokes</td>
                        <td>2</td>
                        <td>3</td>
                        <td nowrap="nowrap"></td>
                    </tr>
                    <tr>
                        <td>38</td>
                        <td>idaouse11@yolasite.com</td>
                        <td>Ilario Daouse</td>
                        <td>Nitzsche, Davis and Romaguera</td>
                        <td>3</td>
                        <td>2</td>
                        <td nowrap="nowrap"></td>
                    </tr>
                    <tr>
                        <td>39</td>
                        <td>bcoleborn12@upenn.edu</td>
                        <td>Blisse Coleborn</td>
                        <td>Bailey, Windler and Marquardt</td>
                        <td>6</td>
                        <td>2</td>
                        <td nowrap="nowrap"></td>
                    </tr>
                    <tr>
                        <td>40</td>
                        <td>ajouannisson13@issuu.com</td>
                        <td>Augustin Jouannisson</td>
                        <td>Witting, Reilly and Morar</td>
                        <td>3</td>
                        <td>3</td>
                        <td nowrap="nowrap"></td>
                    </tr>
                    <tr>
                        <td>41</td>
                        <td>kjennison14@slashdot.org</td>
                        <td>Kaleena Jennison</td>
                        <td>Johnston Inc</td>
                        <td>5</td>
                        <td>3</td>
                        <td nowrap="nowrap"></td>
                    </tr>
                    <tr>
                        <td>42</td>
                        <td>mpetronis15@bandcamp.com</td>
                        <td>Mariel Petronis</td>
                        <td>Mitchell, Bashirian and Schroeder</td>
                        <td>5</td>
                        <td>3</td>
                        <td nowrap="nowrap"></td>
                    </tr>
                    <tr>
                        <td>43</td>
                        <td>ascroggie16@youku.com</td>
                        <td>Adamo Scroggie</td>
                        <td>Cartwright Group</td>
                        <td>4</td>
                        <td>2</td>
                        <td nowrap="nowrap"></td>
                    </tr>
                    <tr>
                        <td>44</td>
                        <td>lkilmartin17@bigcartel.com</td>
                        <td>Lewiss Kilmartin</td>
                        <td>Stroman-Orn</td>
                        <td>3</td>
                        <td>3</td>
                        <td nowrap="nowrap"></td>
                    </tr>
                    <tr>
                        <td>45</td>
                        <td>csachno18@blogs.com</td>
                        <td>Claretta Sachno</td>
                        <td>Zemlak-Cruickshank</td>
                        <td>4</td>
                        <td>1</td>
                        <td nowrap="nowrap"></td>
                    </tr>
                    <tr>
                        <td>46</td>
                        <td>bvan19@ebay.co.uk</td>
                        <td>Bryn Van Castele</td>
                        <td>Beier-Mante</td>
                        <td>5</td>
                        <td>2</td>
                        <td nowrap="nowrap"></td>
                    </tr>
                    <tr>
                        <td>47</td>
                        <td>tgatch1a@4shared.com</td>
                        <td>Tades Gatch</td>
                        <td>Klocko, Koelpin and Nikolaus</td>
                        <td>5</td>
                        <td>2</td>
                        <td nowrap="nowrap"></td>
                    </tr>
                    <tr>
                        <td>48</td>
                        <td>rjolland1b@artisteer.com</td>
                        <td>Reinold Jolland</td>
                        <td>Zieme-Funk</td>
                        <td>4</td>
                        <td>2</td>
                        <td nowrap="nowrap"></td>
                    </tr>
                    <tr>
                        <td>49</td>
                        <td>kbrainsby1c@hibu.com</td>
                        <td>Ky Brainsby</td>
                        <td>Towne Inc</td>
                        <td>2</td>
                        <td>3</td>
                        <td nowrap="nowrap"></td>
                    </tr>
                    <tr>
                        <td>50</td>
                        <td>sgiddings1d@samsung.com</td>
                        <td>Sheryl Giddings</td>
                        <td>Grimes, Ryan and Larkin</td>
                        <td>3</td>
                        <td>1</td>
                        <td nowrap="nowrap"></td>
                    </tr>
                </tbody>
            </table>
            <!--end: Datatable-->
        </div>
    </div>
    <!--end::Card-->
@endsection
