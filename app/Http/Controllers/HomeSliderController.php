<?php

namespace App\Http\Controllers;

use App\Http\Resources\HomeSliderResource;
use App\Models\HomeSlider;
use Illuminate\Http\Request;

class HomeSliderController extends Controller
{
    public function index ()
    {
        $home_sliders = HomeSlider::orderBy('id')->get();
        return HomeSliderResource::collection($home_sliders);
    }

    public function show (HomeSlider $home_slider)
    {
        return new HomeSliderResource($home_slider);
    }

    protected function validateRequest ()
    {
        return request()->validate([
            'img_url' => 'required',
            'title' => 'required',
            'description' => 'required',
            'url' => 'required',
            'position' => 'required'
        ]);
    }

    public function store ()
    {
        $data = $this->validateRequest();

        $home_slider = HomeSlider::create($data);

        return new HomeSliderResource($home_slider);
    }

    public function update (HomeSlider $home_slider)
    {
        $data = $this->validateRequest();

        $home_slider->update($data);

        return new HomeSliderResource($home_slider);
    }

    public function destroy (HomeSlider $home_slider)
    {
        $home_slider->delete();

        return response()->noContent();
    }
}
