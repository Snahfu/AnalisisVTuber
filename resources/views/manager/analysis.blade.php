@extends('layouts.app')

@section('title')
    Analysis Manager
@endsection

@section('menu')
    <li><a href="{{route('manager.home')}}">Home</a></li>
    <li><a href="{{route('manager.crawl')}}">Crawling</a></li>
    <li><a href="{{route('manager.analysis')}}" class="active">Analysis</a></li>
    <li><a href="{{route('manager.history')}}">History</a></li>
@endsection

@section('style')
@endsection

@section('content')
@endsection