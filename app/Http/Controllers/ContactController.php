<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Gate::allows('access-admin')) {
            return response([
                'message' => 'pas autorisé'
            ],403);
        }
        $contacts = Contact::all();
        return [
            'contacts' => $contacts
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if(auth('sanctum')->user()==null)
        {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'message' => 'required'
            ]);

            if ($contact = Contact::create($request->all())) {
                return [
                    "success" => true,
                    "message" => "Enregistrement effectué",
                    "data" => $contact
                ];
            }else{
                return [
                    "success" => false,
                    "message" => "Une erreur s'est produite"
                ];
            }

        }else{
            $user = auth('sanctum')->user();
            if ($contact = Contact::create([
                'name' => $user->name,
                'email' => $user->email,
                'message' => $request->message,
                'user_id' => $user->id
            ]))
            {
                return [
                    "success" => true,
                    "message" => "Enregistrement effectué",
                    "data" => $contact
                ];
            }else{
                return [
                    "success" => false,
                    "message" => "Une erreur s'est produite"
                ];
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
        if (!Gate::allows('access-admin')) {
            return response([
                'message' => 'pas autorisé'
            ],403);
        }
        return [
            'contact' => $contact
        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
        if (!Gate::allows('access-admin')) {
            return response([
                'message' => 'pas autorisé'
            ],403);
        }
        if ($contact->delete()) {
            return [
                "success" => true,
                "message" => "Enregistrement supprimé",
                "data" => $contact
            ];
        }
    }
}
