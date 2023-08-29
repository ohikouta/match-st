<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Base;

class BaseController extends Controller
{
    public function start(Base $base)
    {
        // return view('bases.index')->with(['bases' => $base->getPaginateByLimit(10)]);
        return view('start')->with(['bases' => $base->getPaginateByLimit(10)]);
    }
    
    public function index(Base $base)
    {
        return view('users.index')->with(['bases' => $base->getPaginateByLimit(10)]);
    }
}
