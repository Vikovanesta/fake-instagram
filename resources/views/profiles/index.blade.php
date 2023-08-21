@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 d-flex align-items-center">
            <img src="/img/kokopanda.jpg" class="rounded-circle img-fluid" alt="">
        </div>
        <div class="col-9 ps-3 pt-5">
            <div class='d-flex justify-content-between align-items-baseline'>
                <h1>{{ $user->username }}</h1>
                <a href="#">Add New Post</a>
            </div>
            <div class="d-flex gap-4">
                <div><strong>153</strong> posts</div>
                <div><strong>10k</strong> followers</div>
                <div><strong>101</strong> following</div>
            </div>
            <div class="pt-4 fw-bold">{{ $user->profile->title }}</div>
            <div>{{ $user->profile->description }}</div>
            <div><a href="#">{{ $user->profile->url }}</a></div>
        </div>
    </div>
    <div class="row pt-5">
        <div class="col-4">
            <img src="/img/comedy-tragedy.png" class="w-100 h-50" alt="">
        </div>
        <div class="col-4">
            <img src="/img/tavern.jpg" class="w-100 h-50" alt="">
        </div>
        <div class="col-4">
            <img src="/img/Mumei's friend.png" class="w-100 h-50" alt="">
        </div>
    </div>
</div>
@endsection
