<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Store;
use App\Models\StoreAdmin;
use Illuminate\Http\Request;

class StoreAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('store_admin.index', ['stores' => Store::with('category')->get(), 'categories' => Category::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StoreAdmin  $storeAdmin
     * @return \Illuminate\Http\Response
     */
    public function show(StoreAdmin $storeAdmin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StoreAdmin  $storeAdmin
     * @return \Illuminate\Http\Response
     */
    public function edit(StoreAdmin $storeAdmin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StoreAdmin  $storeAdmin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StoreAdmin $storeAdmin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StoreAdmin  $storeAdmin
     * @return \Illuminate\Http\Response
     */
    public function destroy(StoreAdmin $storeAdmin)
    {
        //
    }
}
