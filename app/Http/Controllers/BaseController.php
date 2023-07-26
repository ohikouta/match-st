<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Base;

class BaseController extends Controller
{
    public function index(Base $base)
    {
        return $base->get();
    }
}
