<div class="mt-4">
    @auth
    @if (Auth::user()->likesMovie($movie))
    <form action="{{ route('movies.unlike',$movie->id) }}" method="POST">
        @csrf
        <button type="submit" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
            </span> {{ $movie->likes()->count() }} </button>
    </form>
    @else
    <form action="{{ route('movies.like',$movie->id) }}" method="POST">
        @csrf
        <button type="submit" class="fw-light nav-link fs-6"> <span class="far fa-heart me-1">
            </span> {{ $movie->likes()->count() }} </button>
    </form>
    @endif
    @endauth
    @guest
    <a href="{{ route('login') }}" class="fw-light nav-link fs-6"> <span class="far fa-heart me-1">
    </span> {{ $movie->likes()->count() }} </a>
    @endguest
</div>
