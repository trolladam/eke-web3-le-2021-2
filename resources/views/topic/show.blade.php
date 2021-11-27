@extends('layout.main')

@section('content')
<h1 class="text-center mb-5">{{ $topic->name }}</h1>
<div class="row">
    <div class="col-md-6 mx-auto">
        @forelse($posts as $post)
            @include('post._item')
        @empty
            <div class="alert alert-warning">
                {{ __('No post to show') }}
            </div>
        @endforelse
        <div class="d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection
