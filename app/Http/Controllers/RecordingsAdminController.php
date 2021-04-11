<?php

namespace App\Http\Controllers;

use App\Models\Recording;
use Illuminate\Http\Request;

class RecordingsAdminController extends Controller
{
    public function index()
    {
        return view('recordings_admin.index', ['recordings' => Recording::all()]);
    }
}
