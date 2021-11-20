<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StarbucksController extends Controller
{
    public function home(){
         return view('admin.starbucks.home');
    }
}
