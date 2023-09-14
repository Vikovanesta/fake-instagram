@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($posts as $post)
        <div class="row justify-content-center">
            <div class="row">
                <div class="col-8 offset-2">
                    <a href="/profile/{{ $post->user->id }}">
                        <img src="/storage/{{ $post->image }}" class="w-100" alt="">
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-8 offset-2 pt-2 pb-4">
                    <div>
                        <p>
                            <span class="m-0 fw-semibold">
                                <a class="text-dark text-decoration-none" href="/profile/{{ $post->user->id }}">{{ $post->user->username }}</a>
                            </span> {{ $post->caption }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
