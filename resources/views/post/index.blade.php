@extends('layouts.app')
@section('content')

@if (session('msg'))
    <div class="alert alert-success">
        {{ session('msg') }}
    </div>
@endif

<div class="container">
    <div class="row">
        @foreach ($posts as $post)
        <div class="card">
            <div class="card-header">
                {{ $post->title }}
                <div>{{ $post->user->name }}</div>
                <div>{{ $post->created_at->diffForHumans() }}</div>
            </div>
            <div class="card-body">
                <p class="card-text">{{ $post->content }}</p>
                <a href="#" class="btn btn-primary">Show The Post</a>
            </div>
        </div>
        @endforeach
    </div>
    <div>{{$posts->links()}}</div>
</div>

@endsection
