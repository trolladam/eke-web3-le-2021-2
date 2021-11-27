@extends('layout.main')

@section('content')
    <h1 class="display-1 text-center">
        {{ $post->title }}
    </h1>
    @if ($post->has_cover)
    <img src="{{ $post->cover_image }}" class="w-100" height="500" style="object-fit: cover">
    @endif
    <div class="mb-4">
        {{ $post->author->name }} | {{ $post->topic->name }} | {{ $post->created_at->diffForHumans() }}
    </div>
    <p class="fw-bold">{{ $post->description }}</p>
    <div>
        {!! $post->content !!}
    </div>
@endsection
