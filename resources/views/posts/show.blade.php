@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <img src="/storage/{{ $post->image }}" class="w-100" alt="">
        </div>
        <div class="col-4">
            <div>
                <div class="d-flex align-items-center gap-2 mb-3">
                    <img src="{{ $post->user->profile->profileImage() }}" class="rounded-circle img-fluid" style="max-height: 40px">
                    <span class="m-0 fw-semibold">
                        <a class="text-dark text-decoration-none" href="/profile/{{ $post->user->id }}">{{ $post->user->username }}</a>
                    </span>
                    -
                    <a class="text-decoration-none" href="#">Follow</a>
                </div>
                <hr>
                <p>
                    <span class="m-0 fw-semibold">
                        <a class="text-dark text-decoration-none" href="/profile/{{ $post->user->id }}">{{ $post->user->username }}</a>
                    </span> {{ $post->caption }}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
