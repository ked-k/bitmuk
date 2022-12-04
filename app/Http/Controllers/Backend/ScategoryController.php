<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ScategoryDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CreateScategoryRequest;
use App\Http\Requests\Backend\UpdateScategoryRequest;
use App\Models\Scategory;
use Flash;
use Response;

class ScategoryController extends Controller
{
    /**
     * Display a listing of the Scategory.
     *
     * @param ScategoryDataTable $scategoryDataTable
     * @return Response
     */
    public function index(ScategoryDataTable $scategoryDataTable)
    {
        return $scategoryDataTable->render('backend.scategories.index');
    }

    /**
     * Show the form for creating a new Scategory.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.scategories.create');
    }

    /**
     * Store a newly created Scategory in storage.
     *
     * @param CreateScategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateScategoryRequest $request)
    {
        $input = $request->all();

        /** @var Scategory $scategory */
        $scategory = Scategory::create($input);

        Flash::success('Scategory saved successfully.');

        return redirect(route('admin.scategories.index'));
    }

    /**
     * Display the specified Scategory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Scategory $scategory */
        $scategory = Scategory::find($id);

        if (empty($scategory)) {
            Flash::error('Scategory not found');

            return redirect(route('admin.scategories.index'));
        }

        return view('backend.scategories.show')->with('scategory', $scategory);
    }

    /**
     * Show the form for editing the specified Scategory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Scategory $scategory */
        $scategory = Scategory::find($id);

        if (empty($scategory)) {
            Flash::error('Scategory not found');

            return redirect(route('admin.scategories.index'));
        }

        return view('backend.scategories.edit')->with('scategory', $scategory);
    }

    /**
     * Update the specified Scategory in storage.
     *
     * @param int $id
     * @param UpdateScategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateScategoryRequest $request)
    {
        /** @var Scategory $scategory */
        $scategory = Scategory::find($id);

        if (empty($scategory)) {
            Flash::error('Scategory not found');

            return redirect(route('admin.scategories.index'));
        }

        $scategory->fill($request->all());
        $scategory->save();

        Flash::success('Scategory updated successfully.');

        return redirect(route('admin.scategories.index'));
    }

    /**
     * Remove the specified Scategory from storage.
     *
     * @param int $id
     *
     * @return Response
     * @throws \Exception
     *
     */
    public function destroy($id)
    {
        /** @var Scategory $scategory */
        $scategory = Scategory::find($id);

        if (empty($scategory)) {
            Flash::error('Scategory not found');

            return redirect(route('admin.scategories.index'));
        }

        $scategory->delete();

        Flash::success('Scategory deleted successfully.');

        return redirect(route('admin.scategories.index'));
    }
}
