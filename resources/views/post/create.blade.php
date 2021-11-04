@extends('layout.main')

@section('content')
<form action="{{ route('post.create') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-6 col-lg-5 mx-auto">
            <h4 class="display-4">{{ __('Publish') }}</h4>
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label class="mb-2">{{ __('Title') }}</label>
                        <input type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}">
                        @if ($errors->has('title'))
                            <p class="invalid-feedback">{{ $errors->first('title') }}</p>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="mb-2">{{ __('Topic') }}</label>
                        <select name="topic_id" class="form-control{{ $errors->has('topic_id') ? ' is-invalid' : '' }}">
                            <option value="">Please choose</option>
                            @foreach($topic_options as $topic)
                            <option value="{{ $topic->id }}" {{ old('topic_id') == $topic->id ? 'selected' : ''}}>
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
                        <textarea name="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}">{{ old('description') }}</textarea>
                        @if ($errors->has('description'))
                            <p class="invalid-feedback">{{ $errors->first('description') }}</p>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="mb-2">{{ __('Content') }}</label>
                        <textarea name="content" class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}">{{ old('content') }}</textarea>
                        @if ($errors->has('content'))
                            <p class="invalid-feedback">{{ $errors->first('content') }}</p>
                        @endif
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-primary btn-lg" type="submit">
                            {{ __('Publish') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
