@extends('layouts.app')

@section('title') time line @endsection

@section('content')
@foreach ($posts as $post)
    <div class="card m-5 col-md-8 mx-auto shadow" style="max-width: 600px;  ">
        <div class="card-header">
            <p class="fw-bold">{{$post->user ? $post->user->name : 'not found'}}</p>
            <p class="card-text">Email: {{$post->user ? $post->user->email : 'not found'}} <br>
                Created At: {{$post->user ? $post->user->created_at : 'not found'}}</p>
        </div>

        <div class="card-body"> 
            <h5 class="card-title">Title: {{$post->title}}</h5>
            <p class="card-text">Description: {{$post->description}}</p>
            
            @if ($post->pic)
                <img src="{{ asset('storage/uploads/' . $post->pic) }}" alt="Post Image" style="max-width: 100%; max-height: 500px; object-fit: cover;" class="img-fluid">
            @else
                <p>No image available</p>
            @endif        </div>
    </div>

@endforeach


@endsection