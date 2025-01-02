<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard()
{
    $services = Service::all();
    return view('user.order.index', compact('services'));
}

}
