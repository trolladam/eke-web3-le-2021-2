<div class="card mb-4">
    <div class="card-body d-flex">
        <img class="flex-shrink-0 flex-grow-0" src="https://via.placeholder.com/300" height="150" alt="{{ $post->title }}">
        <div class="ms-3 d-flex-col w-100">
            <h4>
                <a href="{{ route('post.show', $post) }}">
                    {{ $post->title }}
                </a>
            </h4>
            <p>
                {{ $post->author->name }} | {{ $post->created_at->diffForHumans() }}
            </p>
            <p>
                {{ $post->description }}
            </p>
            <div class="mt-auto text-end">
                {{ $post->topic->name }}
            </div>
        </div>
    </div>
</div>
