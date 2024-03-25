@extends('layout')
@section('title', 'HomePage')
@section('content')
<h1>Welcome </h1>
@auth
{{auth()->user()->name}}
@endauth
@endsection