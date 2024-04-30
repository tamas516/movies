@extends('layout.layout')

@section('title','Movies Main Page')

@section('content')
<div class="row">
    <div class="col-12">
        @include('shared.success-message')
        @foreach ($movies as $movie)
        @include('movies.movie-card')
        @endforeach
        <div class="mt-3">
            {{ $movies->withQueryString()->links() }}
        </div>
    </div>
</div>
@endsection
