@extends('layout.main')

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>
@endpush

@section('content')
<form action="{{ route('post.edit', $post) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="d-flex mb-5">
        <h4 class="display-4">{{ __('Editing') }}: {{ $post->title }}</h4>
        <button class="btn btn-primary btn-lg ms-auto" type="submit">
            {{ __('Update') }}
        </button>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label class="mb-2">{{ __('Title') }}</label>
                        <input type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title', $post->title) }}">
                        @if ($errors->has('title'))
                            <p class="invalid-feedback">{{ $errors->first('title') }}</p>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="mb-2">{{ __('Topic') }}</label>
                        <select name="topic_id" class="form-control{{ $errors->has('topic_id') ? ' is-invalid' : '' }}">
                            <option value="">Please choose</option>
                            @foreach($topic_options as $topic)
                            <option value="{{ $topic->id }}" {{ old('topic_id', $post->topic_id) == $topic->id ? 'selected' : ''}}>
                                {{ $topic->name }}
                            </option>
                            @endforeach
                        </select>
                        @if ($errors->has('topic_id'))
                            <p class="invalid-feedback">{{ $errors->first('topic_id') }}</p>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="mb-2">{{ __('Description') }}</label>
                        <textarea name="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}">{{ old('description', $post->description) }}</textarea>
                        @if ($errors->has('description'))
                            <p class="invalid-feedback">{{ $errors->first('description') }}</p>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="mb-2">{{ __('Content') }}</label>
                        <textarea id="editor" name="content" class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}">{{ old('content', $post->content) }}</textarea>
                        @if ($errors->has('content'))
                            <p class="invalid-feedback">{{ $errors->first('content') }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <label>Cover image</label>
                    <input type="file" class="form-control" name="cover">
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
