<?php

namespace App\Http\Controllers\Kalab;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlottingController extends Controller
{
    public function index()
    {
        return view('role.kalab.plotting');
    }
}
