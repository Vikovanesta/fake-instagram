@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 d-flex align-items-center">
            <img src="/storage/{{ $user->profile->image }}" class="rounded-circle img-fluid" alt="">
        </div>
        <div class="col-9 ps-3 pt-5">
            <div class='d-flex justify-content-between align-items-baseline'>
                <h1>{{ $user->username }}</h1>

                {{-- Only visible when user is allow to update this profile --}}
                @can('update', $user->profile)
                    <a href="/post/create">Add New Post</a>
                @endcan
                
            </div>
            
            {{-- Only visible when user is allowed to update this profile --}}
            @can('update', $user->profile)
                <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
            @endcan

            <div class="d-flex gap-4">
                <div><strong>{{  $user->posts->count() }}</strong> posts</div>
                <div><strong>10k</strong> followers</div>
                <div><strong>101</strong> following</div>
            </div>
            <div class="pt-4 fw-bold">{{ $user->profile->title }}</div>
            <div>{{ $user->profile->description }}</div>
            <div><a href="#">{{ $user->profile->url }}</a></div>
        </div>
    </div>
    <div class="row pt-5">
        @foreach($user->posts as $post)
        <div class="col-4 pb-4">
            <a 
                href="/post/{{ $post->id  }}"><img src="/storage/{{ $post->image }}" class="w-100" alt="">
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection
