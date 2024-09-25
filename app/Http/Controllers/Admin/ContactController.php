<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts=Contact::where('read_at',null)->get();
        return view('admin.contact.index',compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function readed()
    {
        $contacts=Contact::where('read_at','!=',null)->get();
        return view('admin.contact.readed',compact('contacts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        if(Cookie::has('notification_id')){
    
            $notification_id=Cookie::get('notification_id');
            $notification=Auth::user()->notifications()->where('id',$notification_id)->first();
            $notification->markAsRead();
            Cookie::forget('notification_id');
        }
        $contact=Contact::find($id);
        $contact->update([
            'read_at'=>now(),
        ]);

        return view('admin.contact.show',compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
