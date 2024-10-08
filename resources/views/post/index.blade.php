@extends('layouts.app')

@section('content')
<div class="posts">
    <a href="{{ route('post.create') }}">create post</a>
    @foreach ($posts as $post)
    <div class="post">
        <p>Title:
            <a href="{{ route('post.show', $post->id) }}">
                {{ $post->title }}
            </a>
        </p>
        <p>Content: {{ $post->content }}</p>
        <p>Author: {{ $post->user->name }}</p>
        <p>created: {{ $post->created_at }}</p>
    </div>
    @endforeach
</div>
@endsection
