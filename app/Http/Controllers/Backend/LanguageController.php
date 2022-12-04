<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\LanguageDataTable;
use App\DataTables\LanguageDetailDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StoreLanguageDetailsRequest;
use App\Http\Requests\Backend\StoreLanguageRequest;
use App\Http\Requests\Backend\UpdateLanguageDetailsRequest;
use App\Http\Requests\Backend\UpdateLanguageRequest;
use App\Models\Language;
use App\Models\LanguageDetails;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class LanguageController extends Controller
{
    /**
     * Display a listing of the Language List.
     * @param LanguageDatatable $languageDataTable
     * @return \Illuminate\Http\Response
     */
    public function index(LanguageDataTable $languageDataTable)
    {

        return $languageDataTable->render('backend.language.index');

    }

    /**
     * Show the form for creating a new Language.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.language.create');
    }

    /**
     * Store a newly created resource in Language.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLanguageRequest $request)
    {
        $language = Language::create([
            'name' => $request->name,
            'code' => $request->code,
            'default' => false,
        ]);

        if ($language) {
            Flash::success('Language Successfully Added');
            return redirect()->route('admin.languages.index');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified Language and its Details with Key and value.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(LanguageDetailDataTable $languageDetailDataTable, $id)
    {


        $language = Language::where('id', $id)->first();
        return $languageDetailDataTable->with('id', $id)->render('backend.language.edit', compact('language'));
    }

    /**
     * Update the specified resource in Language.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLanguageRequest $request, $id)
    {
        $language = Language::where('id', $id)->first();
        if (empty($language)) {
            Flash::error('not_found');

            return redirect(route('admin.languages.index'));
        }
        $name = $request->name;
        $code = $request->code;

        $languageUpdate = Language::where('id', $id)
            ->update([
                'name' => $name,
                'code' => $code
            ]);

        if ($languageUpdate) {
            Flash::success('Language Successfully Updated');
            return redirect()->route('admin.languages.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $language = Language::find($id);
        if (empty($language)) {
            Flash::error('Language not found');
            return back;
        }
        $language->delete();
        Flash::success('Language Successfully Deleted');
        return back();
    }


    /**
     * Store a newly created in Language Details.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function storeLanguageDetails(StoreLanguageDetailsRequest $request)
    {
        $languageId = $request->language_id;
        $key = $request->key;
        $value = $request->value;

        $languageDetails = LanguageDetails::create([
            'language_id' => $languageId,
            'key' => $key,
            'value' => $value
        ]);

        if ($languageDetails) {
            return response()->json('Language Key and Value Add Successfully');
        }

    }


    /**
     * Update the specified resource in Language Details.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function updateLanguageDetails(UpdateLanguageDetailsRequest $request)
    {
        $languageDetailId = $request->language_detail_id;
        $languageId = $request->language_id;
        $key = $request->key;
        $value = $request->value;

        $updatedLanguageDetail = LanguageDetails::where('id', $languageDetailId)->where('language_id', $languageId)->update([
            'key' => $key,
            'value' => $value
        ]);


        return response()->json($updatedLanguageDetail);


    }

    /**
     * Remove the specified Language Key and value from language details.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function languageDetailsDestroy($id)
    {
        $languageDetails = LanguageDetails::find($id);
        if (empty($languageDetails)) {
            Flash::error('Language Details not found');
            return back;
        }
        $languageDetails->delete();
        Flash::success('Language Successfully Deleted');
        return back();
    }

    /**
     * Get specified Language Detail
     */
    public function getLanguageDetail(Request $request)
    {
        $languageDetail = LanguageDetails::where('id', $request->id)->first();
        return response()->json($languageDetail);
    }
}
