@extends('layouts.app')
@section('content')


<div class="container">
    <div class="row">
       
        <div class="card">
            <div class="card-header">
                {{ $post->title }}
                <div>{{ $post->user->name }}</div>
                <div>{{ $post->created_at->diffForHumans() }}</div>
            </div>
            <div class="card-body">
                <p class="card-text">{{ $post->content }}</p>
                <a href="{{ route('post.index') }}" class="btn btn-success">Back</a>
            </div>
        </div>
    </div>
    
</div>

@endsection
