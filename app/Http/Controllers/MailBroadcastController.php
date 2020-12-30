<?php

namespace App\Http\Controllers;

use App\Models\MailBroadcast;
use Illuminate\Http\Request;

class MailBroadcastController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mailbroadcasts.index');
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
     * @param  \App\Models\MailBroadcast  $mailBroadcast
     * @return \Illuminate\Http\Response
     */
    public function show(MailBroadcast $mailBroadcast)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MailBroadcast  $mailBroadcast
     * @return \Illuminate\Http\Response
     */
    public function edit(MailBroadcast $mailBroadcast)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MailBroadcast  $mailBroadcast
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MailBroadcast $mailBroadcast)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MailBroadcast  $mailBroadcast
     * @return \Illuminate\Http\Response
     */
    public function destroy(MailBroadcast $mailBroadcast)
    {
        //
    }
}
