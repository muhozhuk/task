<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Organisation;
use Illuminate\Http\Request;

class UserController extends Controller
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
    public function create(Request $request)
    {
        $organisation_id = $request->input('organisation_id');
        return view('users.create', compact('organisation_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'snils' => 'unique:users,snils'
        ]);

        try {                        
            $user = new User([             
               'first_name' => $request->input('first_name'),
               'last_name' => $request->input('last_name'),
               'middle_name' => $request->input('middle_name'),
               'inn' => $request->input('inn'),
               'snils' => $request->input('snils'),
               'organisation_id' => $request->input('organisation_id'),
               'birth_day' => $request->input('birth_day'),
            ]);
        } catch (\Exception $e) {
            //
        }
        if (isset($user)) {
            $user->save();
        };
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
       //
    }
}
