<?php

namespace App\Http\Controllers;

use App\Models\User;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function index(User $user)
    {
        return view('profiles.index', compact('user'));
    }

    public function edit(User $user)
    {
        // User cannot edit if they're not the owner of said profile
        $this->authorize('update', $user->profile);
        
        return view('profiles.edit', compact('user'));
    }
    
    public function update(User $user) 
    {
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
            $imagePath = request('image')->store('profile', 'public');
            
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();

            $imageArray = ['image' => $imagePath];
        }

        // Update image column in database (image format: path where the image is stored)
        // eg. 'image' => "profile/imageName.jpeg"
        // array_merge() is used to convert image to image path
        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? []  //return empty array if no image provided
        ));
        
        return redirect("/profile/{$user->id}");
    }
}
