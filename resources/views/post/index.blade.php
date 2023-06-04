@extends('layouts.app')
@section('content')
 

    @if (session('msg'))
    <div class="alert alert-success">
        {{ session('msg') }}
    </div> 
    @endif

  

    <h1>Hallo Selamat Datang {{ $user != null ? $user->name: "" }}</h1>
@endsection