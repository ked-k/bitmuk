<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\HomeStepDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Backend\CreateHomeStepRequest;
use App\Http\Requests\Backend\UpdateHomeStepRequest;
use App\Models\HomeStep;
use Flash;
use Response;

class HomeStepController extends AppBaseController
{
    /**
     * Display a listing of the HomeStep.
     *
     * @param HomeStepDataTable $homeStepDataTable
     * @return Response
     */
    public function index(HomeStepDataTable $homeStepDataTable)
    {
        return $homeStepDataTable->render('backend.home_steps.index');
    }

    /**
     * Show the form for creating a new HomeStep.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.home_steps.create');
    }

    /**
     * Store a newly created HomeStep in storage.
     *
     * @param CreateHomeStepRequest $request
     *
     * @return Response
     */
    public function store(CreateHomeStepRequest $request)
    {
        $input = $request->all();

        /** @var HomeStep $homeStep */
        $homeStep = HomeStep::create($input);

        Flash::success('Home Step saved successfully.');

        return redirect(route('admin.homeSteps.index'));
    }

    /**
     * Display the specified HomeStep.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var HomeStep $homeStep */
        $homeStep = HomeStep::find($id);

        if (empty($homeStep)) {
            Flash::error('Home Step not found');

            return redirect(route('admin.homeSteps.index'));
        }

        return view('backend.home_steps.show')->with('homeStep', $homeStep);
    }

    /**
     * Show the form for editing the specified HomeStep.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var HomeStep $homeStep */
        $homeStep = HomeStep::find($id);

        if (empty($homeStep)) {
            Flash::error('Home Step not found');

            return redirect(route('admin.homeSteps.index'));
        }

        return view('backend.home_steps.edit')->with('homeStep', $homeStep);
    }

    /**
     * Update the specified HomeStep in storage.
     *
     * @param int $id
     * @param UpdateHomeStepRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHomeStepRequest $request)
    {
        /** @var HomeStep $homeStep */
        $homeStep = HomeStep::find($id);

        if (empty($homeStep)) {
            Flash::error('Home Step not found');

            return redirect(route('admin.homeSteps.index'));
        }

        $homeStep->fill($request->all());
        $homeStep->save();

        Flash::success('Home Step updated successfully.');

        return redirect(route('admin.homeSteps.index'));
    }

    /**
     * Remove the specified HomeStep from storage.
     *
     * @param int $id
     *
     * @return Response
     * @throws \Exception
     *
     */
    public function destroy($id)
    {
        /** @var HomeStep $homeStep */
        $homeStep = HomeStep::find($id);

        if (empty($homeStep)) {
            Flash::error('Home Step not found');

            return redirect(route('admin.homeSteps.index'));
        }

        $homeStep->delete();

        Flash::success('Home Step deleted successfully.');

        return redirect(route('admin.homeSteps.index'));
    }
}
