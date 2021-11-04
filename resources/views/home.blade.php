@extends('layout.main')

@section('content')
<div class="row">
    <div class="col-md-6 mx-auto">
        @foreach ($posts as $post)
            @include('post._item')
        @endforeach
    </div>
    <div class="d-flex justify-content-center">
        {{ $posts->links() }}
    </div>
</div>
@endsection
