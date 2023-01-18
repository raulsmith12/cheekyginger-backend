<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    protected function validateRequest ()
    {
        return request()->validate([
            'name' => 'required|min:1|max:255',
            'email' => 'required',
            'message' => 'required',
            'phone_no' => 'sometimes'
        ]);
    }

    public function store ()
    {
        $data = $this->validateRequest();

        Mail::to('webmaster@cheekygingerstudio.com')->send(new ContactMail($data));
    }
}
