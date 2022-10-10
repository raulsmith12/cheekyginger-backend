<?php

namespace App\Http\Controllers;

use App\Http\Resources\SocialResource;
use App\Models\Social;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function index ()
    {
        $socials = Social::orderBy('id')->get();
        return SocialResource::collection($socials);
    }

    public function show (Social $social)
    {
        return new SocialResource($social);
    }

    protected function validateRequest ()
    {
        return request()->validate([
            'img_url' => 'required',
            'url' => 'required'
        ]);
    }

    public function store ()
    {
        $data = $this->validateRequest();

        $social = Social::create($data);

        return new SocialResource($social);
    }

    public function update (Social $social)
    {
        $data = $this->validateRequest();

        $social->update($data);

        return new SocialResource($social);
    }

    public function destroy (Social $social)
    {
        $social->delete();

        return response()->noContent();
    }
}
