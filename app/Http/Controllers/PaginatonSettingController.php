<?php

namespace App\Http\Controllers;

use App\Models\PaginatonSetting;
use Illuminate\Http\Request;

class PaginatonSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginatonSettings = PaginatonSetting::all();
        return view ('paginationsetting.index', ['paginatonSettings'=>$paginatonSettings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('paginationsetting.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $paginatonSetting = new PaginatonSetting;

        $paginatonSetting->title=$request->pagination_title;
        $paginatonSetting->value=$request->pagination_value;

        $paginatonSetting->save();
        return redirect()->route('paginationsetting.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaginatonSetting  $paginatonSetting
     * @return \Illuminate\Http\Response
     */
    public function show(PaginatonSetting $paginatonSetting)
    {
        return redirect()->route('paginationsetting.show', ['paginatonSetting'=> $paginatonSetting]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaginatonSetting  $paginatonSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(PaginatonSetting $paginatonSetting)
    {
        return redirect()->route('paginationsetting.edit', ['paginatonSetting'=> $paginatonSetting]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaginatonSetting  $paginatonSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaginatonSetting $paginatonSetting)
    {
        $paginatonSetting->title=$request->pagination_title;
        $paginatonSetting->value=$request->pagination_value;

        $paginatonSetting->save();
        return redirect()->route('paginationsetting.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaginatonSetting  $paginatonSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaginatonSetting $paginatonSetting)
    {
        $paginatonSetting->delete();
        return redirect()->route('paginatonsetting.index');
    }
}
