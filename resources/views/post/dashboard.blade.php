@extends('layouts.app')
@section('content')


  

<table class="table">
  <thead class="thead-light">
    <tr>
      
      <th scope="col">Id</th>
      <th scope="col">Title</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
      
    </tr>
  </thead>
  <tbody>
    @foreach ($myPosts as $post)
    <tr>
      <th scope="row">{{ $post->id }}</th>
      <td>{{ $post->title }}</td>
      <th scope="row">
        <a href="{{ route('post.edit' , $post->id) }}" class="btn btn-success">Edit</a>
      </th>
      <td>
        <a href="" class="btn btn-danger">Delete</a>
      </td>
      
      
    </tr>
    @endforeach
  </tbody>
</table>


@endsection