<div class="card mb-5">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <div>
                    <h5>{{ $movie->title }}</h5>
                    @auth
                    @if (Auth::user()->follows($movie))
                    <form method="POST" action="{{ route('users.unfollow',$movie->id) }}">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm"> Unfollow </button>
                    </form>
                    @else
                    <form method="POST" action="{{ route('users.follow',$movie->id) }}">
                        @csrf
                        <button type="submit" class="btn btn-primary btn-sm"> Follow </button>
                    </form>
                    @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <p class="fs-6 fw-light text-muted">
            {{ $movie->genre }}
        </p>
        <div class="d-flex justify-content-between">
            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                    {{ $movie->date }} </span>
            </div>
        </div>
        @include('movies.comments')
    </div>
</div>
