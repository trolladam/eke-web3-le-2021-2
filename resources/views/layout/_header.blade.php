<div class="container">
    <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-4 pt-1">
                <a class="link-secondary" href="#" aria-label="Search">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"/><path d="M21 21l-5.2-5.2"/></svg>
                </a>
            </div>
            <div class="col-4 text-center">
                <a class="blog-header-logo text-dark" href="{{ route('home') }}">
                    {{ config('app.name') }}
                </a>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">
                @auth
                    <div class="d-flex align-items-center">
                        <img class="rounded-circle" height="25" src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}"/>
                        <span class="ms-2">{{ Auth::user()->name }}</span>
                    </div>
                    <form action="{{ route('auth.logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-sm btn-outline-secondary ms-3">
                            {{ __('Sign out') }}
                        </button>
                    </form>
                @else
                    <a class="btn btn-sm btn-success" href="{{ route('auth.register') }}">
                        {{ __('Sign up') }}
                    </a>
                    <a class="btn btn-sm btn-outline-secondary ms-3" href="{{ route('auth.login') }}">
                        {{ __('Sign in') }}
                    </a>
                @endauth
            </div>
        </div>
    </header>

    <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
            <a class="p-2 link-secondary" href="#">World</a>
            <a class="p-2 link-secondary" href="#">U.S.</a>
            <a class="p-2 link-secondary" href="#">Technology</a>
            <a class="p-2 link-secondary" href="#">Design</a>
            <a class="p-2 link-secondary" href="#">Culture</a>
            <a class="p-2 link-secondary" href="#">Business</a>
            <a class="p-2 link-secondary" href="#">Politics</a>
            <a class="p-2 link-secondary" href="#">Opinion</a>
            <a class="p-2 link-secondary" href="#">Science</a>
            <a class="p-2 link-secondary" href="#">Health</a>
            <a class="p-2 link-secondary" href="#">Style</a>
            <a class="p-2 link-secondary" href="#">Travel</a>
        </nav>
    </div>
</div>
