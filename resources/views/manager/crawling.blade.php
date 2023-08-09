@extends('layouts.app')

@section('title')
    Crawling Manager
@endsection

@section('menu')
    <li><a href="{{route('manager.home')}}">Home</a></li>
    <li><a href="{{route('manager.crawl')}}" class="active">Crawling</a></li>
    <li><a href="{{route('manager.analysis')}}">Analysis</a></li>
    <li><a href="{{route('manager.history')}}">History</a></li>
@endsection

@section('style')
@endsection

@section('content')
@endsection