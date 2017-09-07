@extends('layouts.admin-list')

@section('title',_t('Dashboard'))

@section('content')

@include('backend.dashboard.include.menu_top')

@endsection
@section('script')
    {{--@parent--}}
@endsection