<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\HomeSpecialDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Backend\CreateHomeSpecialRequest;
use App\Http\Requests\Backend\UpdateHomeSpecialRequest;
use App\Models\HomeSpecial;
use Flash;
use Response;

class HomeSpecialController extends AppBaseController
{
    /**
     * Display a listing of the HomeSpecial.
     *
     * @param HomeSpecialDataTable $homeSpecialDataTable
     * @return Response
     */
    public function index(HomeSpecialDataTable $homeSpecialDataTable)
    {
        return $homeSpecialDataTable->render('backend.home_specials.index');
    }

    /**
     * Show the form for creating a new HomeSpecial.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.home_specials.create');
    }

    /**
     * Store a newly created HomeSpecial in storage.
     *
     * @param CreateHomeSpecialRequest $request
     *
     * @return Response
     */
    public function store(CreateHomeSpecialRequest $request)
    {
        $input = $request->all();

        /** @var HomeSpecial $homeSpecial */
        $homeSpecial = HomeSpecial::create($input);

        Flash::success('Home Special saved successfully.');

        return redirect(route('admin.homeSpecials.index'));
    }

    /**
     * Display the specified HomeSpecial.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var HomeSpecial $homeSpecial */
        $homeSpecial = HomeSpecial::find($id);

        if (empty($homeSpecial)) {
            Flash::error('Home Special not found');

            return redirect(route('admin.homeSpecials.index'));
        }

        return view('backend.home_specials.show')->with('homeSpecial', $homeSpecial);
    }

    /**
     * Show the form for editing the specified HomeSpecial.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var HomeSpecial $homeSpecial */
        $homeSpecial = HomeSpecial::find($id);

        if (empty($homeSpecial)) {
            Flash::error('Home Special not found');

            return redirect(route('admin.homeSpecials.index'));
        }

        return view('backend.home_specials.edit')->with('homeSpecial', $homeSpecial);
    }

    /**
     * Update the specified HomeSpecial in storage.
     *
     * @param int $id
     * @param UpdateHomeSpecialRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHomeSpecialRequest $request)
    {
        /** @var HomeSpecial $homeSpecial */
        $homeSpecial = HomeSpecial::find($id);

        if (empty($homeSpecial)) {
            Flash::error('Home Special not found');

            return redirect(route('admin.homeSpecials.index'));
        }

        $homeSpecial->fill($request->all());
        $homeSpecial->save();

        Flash::success('Home Special updated successfully.');

        return redirect(route('admin.homeSpecials.index'));
    }

    /**
     * Remove the specified HomeSpecial from storage.
     *
     * @param int $id
     *
     * @return Response
     * @throws \Exception
     *
     */
    public function destroy($id)
    {
        /** @var HomeSpecial $homeSpecial */
        $homeSpecial = HomeSpecial::find($id);

        if (empty($homeSpecial)) {
            Flash::error('Home Special not found');

            return redirect(route('admin.homeSpecials.index'));
        }

        $homeSpecial->delete();

        Flash::success('Home Special deleted successfully.');

        return redirect(route('admin.homeSpecials.index'));
    }
}
