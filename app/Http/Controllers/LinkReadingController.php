<?php

namespace App\Http\Controllers;

use App\Models\LinkReading;
use Illuminate\Http\Request;

class LinkReadingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //



        try {
            //code...

            $links = LinkReading::all();
            return response()->json(['response'=>['message'=>true, 'data'=>$links]],200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['response'=>['message'=>false, 'data'=>null ,'exception'=>$th->getMessage()]],500);

    }


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

        $data = $request->except('_token');

     LinkReading::create([
            'id_zona'=>$data['zone'],
            'id_utilizador'=>$data['agent']

        ]);

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LinkReading  $linkReading
     * @return \Illuminate\Http\Response
     */
    public function show(LinkReading $linkReading)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LinkReading  $linkReading
     * @return \Illuminate\Http\Response
     */
    public function edit(LinkReading $linkReading)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LinkReading  $linkReading
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LinkReading $linkReading)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LinkReading  $linkReading
     * @return \Illuminate\Http\Response
     */
    public function destroy(LinkReading $linkReading)
    {
        //
    }
}
