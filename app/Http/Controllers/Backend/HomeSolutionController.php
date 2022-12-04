<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\HomeSolutionDataTable;
use App\Helpers\FileHelper;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Backend\CreateHomeSolutionRequest;
use App\Http\Requests\Backend\UpdateHomeSolutionRequest;
use App\Models\HomeSolution;
use Flash;
use Response;

class HomeSolutionController extends AppBaseController
{
    /**
     * Display a listing of the HomeSolution.
     *
     * @param HomeSolutionDataTable $homeSolutionDataTable
     * @return Response
     */
    public function index(HomeSolutionDataTable $homeSolutionDataTable)
    {
        return $homeSolutionDataTable->render('backend.home_solutions.index');
    }

    /**
     * Show the form for creating a new HomeSolution.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.home_solutions.create');
    }

    /**
     * Store a newly created HomeSolution in storage.
     *
     * @param CreateHomeSolutionRequest $request
     *
     * @return Response
     */
    public function store(CreateHomeSolutionRequest $request)
    {
        $input = $request->all();

        $image = FileHelper::uploadImage($request);

        /** @var HomeSolution $homeSolution */
        $homeSolution = HomeSolution::create(array_merge($input, ['image' => $image]));

        Flash::success('Home Solution saved successfully.');

        return redirect(route('admin.homeSolutions.index'));
    }

    /**
     * Display the specified HomeSolution.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var HomeSolution $homeSolution */
        $homeSolution = HomeSolution::find($id);

        if (empty($homeSolution)) {
            Flash::error('Home Solution not found');

            return redirect(route('admin.homeSolutions.index'));
        }

        return view('backend.home_solutions.show')->with('homeSolution', $homeSolution);
    }

    /**
     * Show the form for editing the specified HomeSolution.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var HomeSolution $homeSolution */
        $homeSolution = HomeSolution::find($id);

        if (empty($homeSolution)) {
            Flash::error('Home Solution not found');

            return redirect(route('admin.homeSolutions.index'));
        }

        return view('backend.home_solutions.edit')->with('homeSolution', $homeSolution);
    }

    /**
     * Update the specified HomeSolution in storage.
     *
     * @param int $id
     * @param UpdateHomeSolutionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHomeSolutionRequest $request)
    {
        /** @var HomeSolution $homeSolution */
        $homeSolution = HomeSolution::find($id);

        if (empty($homeSolution)) {
            Flash::error('Home Solution not found');

            return redirect(route('admin.homeSolutions.index'));
        }

        $image = FileHelper::uploadImage($request, 'image', $homeSolution);
        $homeSolution->fill(array_merge($request->all(), ['image' => $image]));
        $homeSolution->save();

        Flash::success('Home Solution updated successfully.');

        return redirect(route('admin.homeSolutions.index'));
    }

    /**
     * Remove the specified HomeSolution from storage.
     *
     * @param int $id
     *
     * @return Response
     * @throws \Exception
     *
     */
    public function destroy($id)
    {
        /** @var HomeSolution $homeSolution */
        $homeSolution = HomeSolution::find($id);

        if (empty($homeSolution)) {
            Flash::error('Home Solution not found');

            return redirect(route('admin.homeSolutions.index'));
        }

        FileHelper::deleteImage($homeSolution, 'image');
        $homeSolution->delete();

        Flash::success('Home Solution deleted successfully.');

        return redirect(route('admin.homeSolutions.index'));
    }
}
