<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\University;

class UniversityController extends Controller
{
    public function index(University $university)
    {
        return view('universities.index')->with(['posts' => $university->getByUniversity(), 'university_name' => $university->name]);
    }
}
