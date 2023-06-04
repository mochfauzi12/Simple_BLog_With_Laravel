@extends('layouts.app')
@section('content')
    <h1>Hallo Selamat Datang {{ $user != null ? $user->name: "" }}</h1>
@endsection