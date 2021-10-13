<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    // Controller method definition...
    public function index(Request $request)
    {
        if($request->exists('order')) {
            return Pet::orderBy('name', 'asc')->get();
        }
        return Pet::all();
    }

    // Controller method definition...
    public function show(Request $request, Pet $pet)
    {
        return $pet;
    }
}
