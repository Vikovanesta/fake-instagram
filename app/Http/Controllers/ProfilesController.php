<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function index(User $user)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        $postCount = Cache::remember(
            'count.posts.'.$user->id,           //This is the cache key (eg. count.posts.1)
            now()->addSeconds(30),              //This is the cache expiration (expires in 30 seconds)
            function () use ($user) {           //This is the cache value. Runs if no cache found
                return $user->posts->count();
            });
        
        $followersCount = Cache::remember(
            'count.followers.'.$user->id,
            now()->addSeconds(30),
            function () use ($user) {
                return $user->profile->followers->count();
            });

        $followingCount = Cache::remember(
            'count.following.'.$user->id,
            now()->addSeconds(30),
            function () use ($user) {
                return $user->following->count();
            });

        return view('profiles.index', compact('user', 'follows', 'postCount', 'followersCount', 'followingCount'));
    }

    public function edit(User $user)
    {
        //This is the policy. See app/Policies/ProfilePolicy.php
        // User cannot edit if they're not the owner of said profile
        $this->authorize('update', $user->profile);

        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        //This is the policy. See app/Policies/ProfilePolicy.php
        // User cannot update if they're not the owner of said profile
        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => '',
        ]);

        // If the request has an image, save image to storage/$imagePath
        if (request('image')) {
            $imagePath = request('image')->store('profile', 'public');  //store(image, disk)

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000); //Resize image to 1000x1000
            $image->save();

            $imageArray = ['image' => $imagePath];
        }

        // Update 'image' column in database ('image' format: path where the image is stored)
        // eg. 'image' => "profile/imageName.jpeg"
        // array_merge() is used to convert image to image path
        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? []  //return empty array if no image provided
        ));

        return redirect("/profile/{$user->id}");
    }
}
