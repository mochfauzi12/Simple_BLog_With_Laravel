@extends('layouts.app')
@section('content')

@if (session('msg'))
    <div class="alert alert-success">
        {{ session('msg') }}
    </div>
@endif
  

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
        <form action="{{route ('post.destroy',$post) }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger" onClick=" return  confirm ('Are you Sure') "> Delete </button>
        </form>  
      </td>
      
      
    </tr>
    @endforeach
  </tbody>
</table>
<div>{{ $myPosts->links()}}</div>


@endsection