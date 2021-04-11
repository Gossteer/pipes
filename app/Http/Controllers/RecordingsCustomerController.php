<?php

namespace App\Http\Controllers;

use App\Models\Recording;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecordingsCustomerController extends Controller
{
    public function index()
    {
        return view('recordings_customer.index', ['recordings' => Recording::where('user_id', Auth::user()->id)->get()]);
    }
}
