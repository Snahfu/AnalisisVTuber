@extends('layouts.app')

@section('title')
    Analysis VTuber
@endsection

@section('menu')
    <li><a href="{{ route('vtuber.home') }}" class="active">Home</a></li>
    <li><a href="{{ route('vtuber.crawl') }}">Crawling</a></li>
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
                    <li><a href="index.html">Analysis</a></li>
                </ol>
            </div>
        </nav>
    </div>
@endsection
