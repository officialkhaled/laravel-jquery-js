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
                'name' => 'required|string',
                'email' => 'required|email|unique:photos,email',
                'password' => 'required',
                'avatar' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif,svg',
            ]);

            $photo = new Photo();
            $photo->name = $request->name;
            $photo->email = $request->email;
            $photo->password = bcrypt($request->password);

            if ($request->avatar) {
                $imageName = "avatars/" . time() . '.' . $request->avatar->extension();
                $request->avatar->move(storage_path('app/public/avatars'), $imageName);
                $photo->avatar = $imageName;
            }

            $photo->save();

            return redirect()->route('user.index')->with('success', 'Photo Created Successfully.');
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
