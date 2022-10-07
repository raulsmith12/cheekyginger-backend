<?php

namespace App\Http\Controllers;

use App\Http\Resources\HomeFieldResource;
use App\Models\HomeField;
use Illuminate\Http\Request;

class HomeFieldController extends Controller
{
    public function index ()
    {
        $home_fields = HomeField::orderBy('id')->get();
        return HomeFieldResource::collection($home_fields);
    }

    public function show (HomeField $home_field)
    {
        return new HomeFieldResource($home_field);
    }

    protected function validateRequest ()
    {
        return request()->validate([
            'title' => 'required',
            'short_desc' => 'required',
            'long_desc' => 'required',
            'category' => 'required',
            'current_bid' => 'required',
            'increment' => 'required'
        ]);
    }

    public function store ()
    {
        $data = $this->validateRequest();

        $home_field = HomeField::create($data);

        return new HomeFieldResource($home_field);
    }

    public function update (HomeField $home_field)
    {
        $data = $this->validateRequest();

        $home_field->update($data);

        return new HomeFieldResource($home_field);
    }

    public function destroy (HomeField $home_field)
    {
        $home_field->delete();

        return response()->noContent();
    }
}
