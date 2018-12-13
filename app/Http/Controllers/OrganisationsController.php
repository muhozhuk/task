<?php

namespace App\Http\Controllers;

use App\Models\Organisation;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;

class OrganisationsController extends Controller
{
    use ValidatesRequests;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response['organisations'] = Organisation::all();

        return view('organisations.index', $response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('organisations.create');
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
            'oktmo' => 'unique:organisations,oktmo'
        ]);
        try {
            $organisation = new Organisation([
               'name' => $request->input('name'),
               'ogrn' => $request->input('ogrn'),
               'oktmo' => $request->input('oktmo')
            ]);
        } catch (\Exception $e) {
            //Some cool output
        }
        if (isset($organisation)) {
            $organisation->save();
        };

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Organisation  $organisation
     * @return \Illuminate\Http\Response
     */
    public function show(Organisation $organisation)
    {
        $organisation->load('users');
        return view('organisations.show', $organisation);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Organisation  $organisation
     * @return \Illuminate\Http\Response
     */
    public function edit(Organisation $organisation)
    {
        $response['organisation'] = $organisation;

        return view('organisations.edit', $response);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organisation  $organisation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Organisation $organisation)
    {
         $this->validate($request, [
            'oktmo' => 'unique:organisations,oktmo'
        ]);
         
        try {
            $organisation['name'] = $request->input('name');
            $organisation['ogrn'] = $request->input('ogrn');
            $organisation['oktmo'] = $request->input('oktmo');
            $organisation->save();
        } catch (\Exception $e) {
            return response('Error updating Organisation');
        }
        return redirect('/');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Organisation 
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organisation $organisation)
    {
        try {
            $organisation->delete();
        } catch (\Exception $e) {
            return response('', 404);
        }
        return redirect('/');
    }
}
