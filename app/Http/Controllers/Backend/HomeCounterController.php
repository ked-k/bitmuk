<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\HomeCounterDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Backend\CreateHomeCounterRequest;
use App\Http\Requests\Backend\UpdateHomeCounterRequest;
use App\Models\HomeCounter;
use Flash;
use Response;

class HomeCounterController extends AppBaseController
{
    /**
     * Display a listing of the HomeCounter.
     *
     * @param HomeCounterDataTable $homeCounterDataTable
     * @return Response
     */
    public function index(HomeCounterDataTable $homeCounterDataTable)
    {
        return $homeCounterDataTable->render('backend.home_counters.index');
    }

    /**
     * Show the form for creating a new HomeCounter.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.home_counters.create');
    }

    /**
     * Store a newly created HomeCounter in storage.
     *
     * @param CreateHomeCounterRequest $request
     *
     * @return Response
     */
    public function store(CreateHomeCounterRequest $request)
    {
        $input = $request->all();

        /** @var HomeCounter $homeCounter */
        $homeCounter = HomeCounter::create($input);

        Flash::success('Home Counter saved successfully.');

        return redirect(route('admin.homeCounters.index'));
    }

    /**
     * Display the specified HomeCounter.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var HomeCounter $homeCounter */
        $homeCounter = HomeCounter::find($id);

        if (empty($homeCounter)) {
            Flash::error('Home Counter not found');

            return redirect(route('admin.homeCounters.index'));
        }

        return view('backend.home_counters.show')->with('homeCounter', $homeCounter);
    }

    /**
     * Show the form for editing the specified HomeCounter.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var HomeCounter $homeCounter */
        $homeCounter = HomeCounter::find($id);

        if (empty($homeCounter)) {
            Flash::error('Home Counter not found');

            return redirect(route('admin.homeCounters.index'));
        }

        return view('backend.home_counters.edit')->with('homeCounter', $homeCounter);
    }

    /**
     * Update the specified HomeCounter in storage.
     *
     * @param int $id
     * @param UpdateHomeCounterRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHomeCounterRequest $request)
    {
        /** @var HomeCounter $homeCounter */
        $homeCounter = HomeCounter::find($id);

        if (empty($homeCounter)) {
            Flash::error('Home Counter not found');

            return redirect(route('admin.homeCounters.index'));
        }

        $homeCounter->fill($request->all());
        $homeCounter->save();

        Flash::success('Home Counter updated successfully.');

        return redirect(route('admin.homeCounters.index'));
    }

    /**
     * Remove the specified HomeCounter from storage.
     *
     * @param int $id
     *
     * @return Response
     * @throws \Exception
     *
     */
    public function destroy($id)
    {
        /** @var HomeCounter $homeCounter */
        $homeCounter = HomeCounter::find($id);

        if (empty($homeCounter)) {
            Flash::error('Home Counter not found');

            return redirect(route('admin.homeCounters.index'));
        }

        $homeCounter->delete();

        Flash::success('Home Counter deleted successfully.');

        return redirect(route('admin.homeCounters.index'));
    }
}
