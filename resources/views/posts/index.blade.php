@extends('layouts.app')

@section('title') Index @endsection



@section('content')
    <div class="text-center">
        <a href="{{ route('posts.create') }}" class="btn btn-success">Create Post</a>
    </div>

    <div class="row mt-4">
        @foreach($posts as $post)
 
            <div class="col-md-4">
                <div class="card mb-4 shadow">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Posted By: {{ $post->user ? $post->user->name : 'Not found' }}</h6>
                        <p class="card-text">Created At: {{ $post->created_at->format('Y-m-d') }}</p>
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-warning">View</a>
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                        <form style="display: inline;" method="POST" action="{{ route('posts.destroy', $post->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
