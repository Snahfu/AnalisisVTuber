@extends('layouts.app')

@section('title')
    Analysis Manager
@endsection

@section('menu')
    <li><a href="{{ route('manager.home') }}">Home</a></li>
    <li><a href="{{ route('manager.crawl') }}">Crawling</a></li>
    <li><a href="{{ route('manager.analysis') }}" class="active">Analysis</a></li>
    <li><a href="{{ route('manager.history') }}">History</a></li>
@endsection

@section('style')
    <style>
        .overlay-text-left {
            position: absolute;
            top: 0;
            left: 0;
            width: 50%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
        .overlay-text-left:hover{
            color:cyan;
            background-color: rgba(0, 0, 0, 0.7);
        }
        .overlay-text-right {
            position: absolute;
            top: 0;
            right: 0;
            width: 50%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
        .overlay-text-right:hover{
            color:cyan;
            background-color: rgba(0, 0, 0, 0.7);
        }

        .tambahan {
            position: relative;
        }
    </style>
@endsection

@section('content')
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('assets/img/page-background.jpg');">

        </div>
    </div>

    <div class="tambahan overflow-hidden">
        <div class="row">
            <div class="col" style="margin: 0px; padding: 0px;">
                <img src="{{ asset('assets/img/manager-background.png') }}" width="100%" height="auto"
                    alt="Deskripsi Gambar">
                <a href="{{ route('manager.analysis.management') }}" class="overlay-text-left fs-1">Analysis Agency</a>
            </div>
            <div class="col" style="margin: 0px; padding: 0px;">
                <img src="{{ asset('assets/img/virtualyoutuber-backgrounds.png') }}" width="100%" height="auto"
                    alt="Deskripsi Gambar">
                <a href="{{ route('manager.analysis.vtuber') }}" class="overlay-text-right fs-1">Analysis Talent VTuber</a>
            </div>
        </div>
    </div>
@endsection
