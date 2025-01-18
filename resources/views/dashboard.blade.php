@extends('layout')
@section('title','DashBoard')

@section('content')
@if(session('success'))
    {{session('success')}}
@endsession
@endsection