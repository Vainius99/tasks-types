<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $owners = Owner::sortable()->paginate(5);
        return view('owner.index', ['owners'=> $owners]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('owner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $owner = new Owner;

        $validateVar = $request->validate([
            'owner_name' => 'required|min:2|max:15|alpha',
            'owner_surname' => 'required|min:2|max:15|alpha',
            'owner_email' => 'required|email',
            'owner_phone' => 'required|numeric|integer|digits:7',
            // (86|\+3706) \d{3} \d{4} -- lt numerio tikrinimas

        ]);

        $owner  ->name = $request->owner_name;
        $owner  ->surname = $request->owner_surname;
        $owner  ->email = $request->owner_email;
        $owner  ->phone = "+3706".$request->owner_phone;
        // $request->owner_phone;
        $owner  ->save();

        return redirect()->route('owner.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function show(Owner $owner)
    {
        return view("owner.show", ["owner" => $owner]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function edit(Owner $owner)
    {
        return view("owner.edit", ["owner" => $owner]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Owner $owner)
    {



        $owner  ->name = $request->owner_name;
        $owner  ->surname = $request->owner_surname;
        $owner  ->email = $request->owner_email;
        $owner  ->phone = $request->owner_phone;

        $owner  ->save();

        return redirect()->route('owner.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Owner $owner)
    {
        $owner->delete();
        return redirect()->route('owner.index');
    }
}
