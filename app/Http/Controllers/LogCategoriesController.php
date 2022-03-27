<?php

namespace App\Http\Controllers;

use App\Models\LogCategories;
use App\Http\Requests\StoreLogCategoriesRequest;
use App\Http\Requests\UpdateLogCategoriesRequest;

class LogCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreLogCategoriesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLogCategoriesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LogCategories  $logCategories
     * @return \Illuminate\Http\Response
     */
    public function show(LogCategories $logCategories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LogCategories  $logCategories
     * @return \Illuminate\Http\Response
     */
    public function edit(LogCategories $logCategories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLogCategoriesRequest  $request
     * @param  \App\Models\LogCategories  $logCategories
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLogCategoriesRequest $request, LogCategories $logCategories)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LogCategories  $logCategories
     * @return \Illuminate\Http\Response
     */
    public function destroy(LogCategories $logCategories)
    {
        //
    }
}
