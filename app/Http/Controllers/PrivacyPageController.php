<?php

namespace App\Http\Controllers;

use App\Http\Resources\PrivacyPageResource;
use App\Models\PrivacyPage;
use Illuminate\Http\Request;

class PrivacyPageController extends Controller
{
    public function index ()
    {
        $privacy_pages = PrivacyPage::orderBy('id')->get();
        return PrivacyPageResource::collection($privacy_pages);
    }

    public function show (PrivacyPage $privacy_page)
    {
        return new PrivacyPageResource($privacy_page);
    }

    protected function validateRequest ()
    {
        return request()->validate([
            'tag' => 'required'
        ]);
    }

    public function store ()
    {
        $data = $this->validateRequest();

        $privacy_page = PrivacyPage::create($data);

        return new PrivacyPageResource($privacy_page);
    }

    public function update (PrivacyPage $privacy_page)
    {
        $data = $this->validateRequest();

        $privacy_page->update($data);

        return new PrivacyPageResource($privacy_page);
    }

    public function destroy (PrivacyPage $privacy_page)
    {
        $privacy_page->delete();

        return response()->noContent();
    }
}
