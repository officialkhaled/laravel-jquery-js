<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::query()->get();

        return view('crud.index', [
            'users' => $users,
        ]);
    }

    public function create(): View
    {
        return view('crud.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6',
                'avatar' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            ]);

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);

            if ($request->avatar) {
                $imageName = "avatars/" . time() . '.' . $request->avatar->extension();
                $request->avatar->move(storage_path('app/public/avatars'), $imageName);
                $user->avatar = $imageName;
            }

            $user->save();

            return redirect()->route('user.index')->with('success', 'User created successfully.');
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->validator->errors()], 422);
        }
    }

    public function edit(User $user)
    {
        return view('crud.edit', [
            'user' => $user,
        ]);
    }

    public function update(Request $request, User $user)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6',
                'avatar' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            ]);

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);

            if ($request->avatar) {
                $imageName = "avatars/" . time() . '.' . $request->avatar->extension();
                $request->avatar->move(storage_path('app/public/avatars'), $imageName);
                $user->avatar = $imageName;
            }

            $user->save();

            return redirect()->route('user.index')->with('success', 'User created successfully.');

        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->validator->errors()], 422);
        }
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User deleted successfully.');
    }
}
