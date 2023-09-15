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
@endsection
