@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 pt-5 px-5">
            <img src="/img/kokopanda.jpg" width="200px" height="auto" class="rounded-circle" alt="">
        </div>
        <div class="col-9 ps-5 pt-5">
            <div><h1>Hailpanda</h1></div>
            <div class="d-flex gap-4">
                <div><strong>153</strong> posts</div>
                <div><strong>10k</strong> followers</div>
                <div><strong>101</strong> following</div>
            </div>
            <div class="pt-4 fw-bold">Hailpanda.co.id</div>
            <div>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quidem, provident.</div>
            <div><a href="#">www.hailpanda.co.id</a></div>
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
