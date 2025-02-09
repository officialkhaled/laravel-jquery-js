<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(): View
    {
        return view('crud.index');
    }

    public function create(): View
    {
        return view('crud.create');
    }

    public function store(Request $request)
    {
        return view('crud.create');
    }

    public function edit()
    {
        return view('crud.create');
    }

    public function update()
    {
        return view('crud.create');
    }

    public function destroy()
    {
        return view('crud.create');
    }
}
