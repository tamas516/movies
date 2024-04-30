@extends('layout.layout')
@section('title',$user->name)

@section('content')
<div class="row">
    <h1>{{ $user->name }} Profile Page</h1>
    <div class="col-12">
        @include('shared.success-message')
        @include('users.user-edit')
        @forelse ($movies as $movie)
        <div class="mt-3">
            @include('movies.movie-card')
        </div>
        @empty
        <p class="text-center mt-4">No results found!</p>
        @endforelse
        <div class="mt-3">
            {{ $movies->withQueryString()->links() }}
        </div>
    </div>
</div>
@endsection
