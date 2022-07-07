<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $services = Service::orderBy('created_at')->get();
        
        return redirect()->route('allServices');
    }
}
