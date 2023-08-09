@extends('layouts.app')

@section('title')
    History Manager
@endsection

@section('menu')
    <li><a href="{{route('manager.home')}}">Home</a></li>
    <li><a href="{{route('manager.crawl')}}">Crawling</a></li>
    <li><a href="{{route('manager.analysis')}}">Analysis</a></li>
    <li><a href="{{route('manager.history')}}" class="active">History</a></li>
@endsection

@section('style')
@endsection

@section('content')
@endsection