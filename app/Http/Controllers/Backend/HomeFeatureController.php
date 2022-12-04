<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\HomeFeatureDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Backend\CreateHomeFeatureRequest;
use App\Http\Requests\Backend\UpdateHomeFeatureRequest;
use App\Models\HomeFeature;
use Flash;
use Response;

class HomeFeatureController extends AppBaseController
{
    /**
     * Display a listing of the HomeFeature.
     *
     * @param HomeFeatureDataTable $homeFeatureDataTable
     * @return Response
     */
    public function index(HomeFeatureDataTable $homeFeatureDataTable)
    {
        return $homeFeatureDataTable->render('backend.home_features.index');
    }

    /**
     * Show the form for creating a new HomeFeature.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.home_features.create');
    }

    /**
     * Store a newly created HomeFeature in storage.
     *
     * @param CreateHomeFeatureRequest $request
     *
     * @return Response
     */
    public function store(CreateHomeFeatureRequest $request)
    {
        $input = $request->all();

        /** @var HomeFeature $homeFeature */
        $homeFeature = HomeFeature::create($input);

        Flash::success('Home Feature saved successfully.');

        return redirect(route('admin.homeFeatures.index'));
    }

    /**
     * Display the specified HomeFeature.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var HomeFeature $homeFeature */
        $homeFeature = HomeFeature::find($id);

        if (empty($homeFeature)) {
            Flash::error('Home Feature not found');

            return redirect(route('admin.homeFeatures.index'));
        }

        return view('backend.home_features.show')->with('homeFeature', $homeFeature);
    }

    /**
     * Show the form for editing the specified HomeFeature.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var HomeFeature $homeFeature */
        $homeFeature = HomeFeature::find($id);

        if (empty($homeFeature)) {
            Flash::error('Home Feature not found');

            return redirect(route('admin.homeFeatures.index'));
        }

        return view('backend.home_features.edit')->with('homeFeature', $homeFeature);
    }

    /**
     * Update the specified HomeFeature in storage.
     *
     * @param int $id
     * @param UpdateHomeFeatureRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHomeFeatureRequest $request)
    {
        /** @var HomeFeature $homeFeature */
        $homeFeature = HomeFeature::find($id);

        if (empty($homeFeature)) {
            Flash::error('Home Feature not found');

            return redirect(route('admin.homeFeatures.index'));
        }

        $homeFeature->fill($request->all());
        $homeFeature->save();

        Flash::success('Home Feature updated successfully.');

        return redirect(route('admin.homeFeatures.index'));
    }

    /**
     * Remove the specified HomeFeature from storage.
     *
     * @param int $id
     *
     * @return Response
     * @throws \Exception
     *
     */
    public function destroy($id)
    {
        /** @var HomeFeature $homeFeature */
        $homeFeature = HomeFeature::find($id);

        if (empty($homeFeature)) {
            Flash::error('Home Feature not found');

            return redirect(route('admin.homeFeatures.index'));
        }

        $homeFeature->delete();

        Flash::success('Home Feature deleted successfully.');

        return redirect(route('admin.homeFeatures.index'));
    }
}
