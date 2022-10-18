<?php

namespace App\Http\Controllers;

use App\Http\Resources\TermsPageResource;
use App\Models\TermsPage;
use Illuminate\Http\Request;

class TermsPageController extends Controller
{
    public function index ()
    {
        $terms_pages = TermsPage::orderBy('id')->get();
        return TermsPageResource::collection($terms_pages);
    }

    public function show (TermsPage $terms_page)
    {
        return new TermsPageResource($terms_page);
    }

    protected function validateRequest ()
    {
        return request()->validate([
            'text' => 'required'
        ]);
    }

    public function store ()
    {
        $data = $this->validateRequest();

        $terms_page = TermsPage::create($data);

        return new TermsPageResource($terms_page);
    }

    public function update (Request $request, TermsPage $terms_page)
    {

        $terms_page->update($request->all());

        return $terms_page;
    }

    public function destroy (TermsPage $terms_page)
    {
        $terms_page->delete();

        return response()->noContent();
    }
}
