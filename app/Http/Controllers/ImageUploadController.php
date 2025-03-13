<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ImageUploadController extends Controller
{
    public function index(): View
    {
        $photos = Photo::query()->get();

        return view('image-upload.index', [
            'photos' => $photos,
        ]);
    }

    public function create(): View
    {
        return view('image-upload.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => ['required', 'string'],
                'image_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            if ($request->file('image_path')) {
                $path = $request->file('image_path')->store('uploads', 'public');

                $photo = Photo::create([
                    'image_path' => $path,
                ]);

                return response()->json(['success' => true, 'path' => $path]);
            }

            return response()->json(['success' => false]);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->validator->errors()], 422);
        }
    }

    public function edit(Photo $photo)
    {
        return view('image-upload.edit', [
            'user' => $photo,
        ]);
    }

    public function update(Request $request, Photo $photo)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string',
                'email' => 'required|email|unique:photos,email,' . $photo->id,
                'password' => 'nullable',
                'avatar' => 'nullable|image',
            ]);

            $photo->name = $validatedData['name'];
            $photo->email = $validatedData['email'];

            if (!empty($validatedData['password'])) {
                $photo->password = bcrypt($validatedData['password']);
            }

            if ($request->hasFile('avatar')) {
                $imagePath = $request->file('avatar')->store('avatars', 'public');
                $photo->avatar = $imagePath;
            }

            $photo->save();

            return redirect()->route('user.index')->with('success', 'Photo Updated Successfully.');
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->validator->errors()], 422);
        }
    }

    public function destroy(Photo $photo)
    {
        $photo->delete();
        return redirect()->route('user.index')->with('success', 'Photo deleted successfully.');
    }
}
