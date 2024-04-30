<div>
    <form action="{{ route('comments.store',$movie->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <textarea name="content" id="content" class="fs-6 form-control mt-3" rows="1"></textarea>
        </div>
        @error('content')
        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
        @enderror
        <div>
            <button type="submit" class="btn btn-primary btn-sm"> Post Comment </button>
        </div>
    </form>
    <hr>
    @forelse ($movie->comments as $comment)
    <div class="d-flex align-items-start">
        <div class="w-100">
            <div class="d-flex justify-content-between">
                <h6 class="">{{ $comment->user->name }}
                </h6>
                <small class="fs-6 fw-light text-muted"> {{ $comment->created_at->diffForHumans() }} </small>
            </div>
            <p class="fs-6 mt-3 fw-light">
                {{ $comment->content }}
            </p>
            @if(Auth::id()===$comment->user->id)
            <form method="POST" action="{{ route('comments.destroy',$comment) }}">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            @endif
            <hr />
        </div>
    </div>
    @empty
    <p class="text-center mt-4">No comments found!</p>
    @endforelse
</div>
