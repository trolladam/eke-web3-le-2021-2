<div class="card mb-4">
    <div class="card-body d-flex">
        <img class="flex-shrink-0 flex-grow-0" src="{{ $post->cover_image }}" height="150" width="150" alt="{{ $post->title }}" style="object-fit: cover;">
        <div class="ms-3 d-flex-col w-100">
            <div class="d-flex">
                <h4>
                    <a href="{{ route('post.show', $post) }}">
                        {{ $post->title }}
                    </a>
                </h4>
                @can('update', $post)
                    <a class="ms-auto" href="{{ route('post.edit', $post)}}">
                        {{ __('edit') }}
                    </a>
                @endcan
            </div>
            <div class="d-flex align-items-center mb-3">
                <div class="d-flex align-items-center">
                    <img class="rounded-circle" height="25" src="{{ $post->author->avatar }}" alt="{{ $post->author->name }}"/>
                    <span class="ms-2">{{ $post->author->name }}</span>
                </div>
                <div class="ms-3">
                    {{ $post->created_at->diffForHumans() }}
                </div>
                <div class="ms-3">
                    {{ $post->minutesToRead }} minutes to read
                </div>
            </div>
            <p>
                {{ $post->description }}
            </p>
            <div class="mt-auto text-end">
                <a href="{{ route('topic.show', $post->topic)}}">
                    {{ $post->topic->name }}
                </a>
            </div>
        </div>
    </div>
</div>
