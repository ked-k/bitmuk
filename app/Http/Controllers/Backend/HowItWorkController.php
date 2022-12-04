<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\HowItWorkDataTable;
use App\Http\Requests\Backend;
use App\Http\Requests\Backend\CreateHowItWorkRequest;
use App\Http\Requests\Backend\UpdateHowItWorkRequest;
use App\Models\HowItWork;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class HowItWorkController extends AppBaseController
{
    /**
     * Display a listing of the HowItWork.
     *
     * @param HowItWorkDataTable $howItWorkDataTable
     * @return Response
     */
    public function index(HowItWorkDataTable $howItWorkDataTable)
    {
        return $howItWorkDataTable->render('backend.how_it_works.index');
    }

    /**
     * Show the form for creating a new HowItWork.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.how_it_works.create');
    }

    /**
     * Store a newly created HowItWork in storage.
     *
     * @param CreateHowItWorkRequest $request
     *
     * @return Response
     */
    public function store(CreateHowItWorkRequest $request)
    {
        $input = $request->all();

        /** @var HowItWork $howItWork */
        $howItWork = HowItWork::create($input);

        Flash::success('How It Work saved successfully.');

        return redirect(route('admin.howItWorks.index'));
    }

    /**
     * Display the specified HowItWork.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var HowItWork $howItWork */
        $howItWork = HowItWork::find($id);

        if (empty($howItWork)) {
            Flash::error('How It Work not found');

            return redirect(route('admin.howItWorks.index'));
        }

        return view('backend.how_it_works.show')->with('howItWork', $howItWork);
    }

    /**
     * Show the form for editing the specified HowItWork.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var HowItWork $howItWork */
        $howItWork = HowItWork::find($id);

        if (empty($howItWork)) {
            Flash::error('How It Work not found');

            return redirect(route('admin.howItWorks.index'));
        }

        return view('backend.how_it_works.edit')->with('howItWork', $howItWork);
    }

    /**
     * Update the specified HowItWork in storage.
     *
     * @param  int              $id
     * @param UpdateHowItWorkRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHowItWorkRequest $request)
    {
        /** @var HowItWork $howItWork */
        $howItWork = HowItWork::find($id);

        if (empty($howItWork)) {
            Flash::error('How It Work not found');

            return redirect(route('admin.howItWorks.index'));
        }

        $howItWork->fill($request->all());
        $howItWork->save();

        Flash::success('How It Work updated successfully.');

        return redirect(route('admin.howItWorks.index'));
    }

    /**
     * Remove the specified HowItWork from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var HowItWork $howItWork */
        $howItWork = HowItWork::find($id);

        if (empty($howItWork)) {
            Flash::error('How It Work not found');

            return redirect(route('admin.howItWorks.index'));
        }

        $howItWork->delete();

        Flash::success('How It Work deleted successfully.');

        return redirect(route('admin.howItWorks.index'));
    }
}
