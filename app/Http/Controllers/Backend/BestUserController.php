<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\BestUserDataTable;
use App\Helpers\FileHelper;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Backend\CreateBestUserRequest;
use App\Http\Requests\Backend\UpdateBestUserRequest;
use App\Models\BestUser;
use Flash;
use Response;

class BestUserController extends AppBaseController
{
    /**
     * Display a listing of the BestUser.
     *
     * @param BestUserDataTable $bestUserDataTable
     * @return Response
     */
    public function index(BestUserDataTable $bestUserDataTable)
    {
        return $bestUserDataTable->render('backend.best_users.index');
    }

    /**
     * Show the form for creating a new BestUser.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.best_users.create');
    }

    /**
     * Store a newly created BestUser in storage.
     *
     * @param CreateBestUserRequest $request
     *
     * @return Response
     */
    public function store(CreateBestUserRequest $request)
    {
        $input = $request->all();

        $image = FileHelper::uploadImage($request);

        /** @var BestUser $bestUser */
        $bestUser = BestUser::create(array_merge($input, ['image' => $image]));

        Flash::success('Best User saved successfully.');

        return redirect(route('admin.bestUsers.index'));
    }

    /**
     * Display the specified BestUser.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var BestUser $bestUser */
        $bestUser = BestUser::find($id);

        if (empty($bestUser)) {
            Flash::error('Best User not found');

            return redirect(route('admin.bestUsers.index'));
        }

        return view('backend.best_users.show')->with('bestUser', $bestUser);
    }

    /**
     * Show the form for editing the specified BestUser.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var BestUser $bestUser */
        $bestUser = BestUser::find($id);

        if (empty($bestUser)) {
            Flash::error('Best User not found');

            return redirect(route('admin.bestUsers.index'));
        }

        return view('backend.best_users.edit')->with('bestUser', $bestUser);
    }

    /**
     * Update the specified BestUser in storage.
     *
     * @param int $id
     * @param UpdateBestUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBestUserRequest $request)
    {
        /** @var BestUser $bestUser */
        $bestUser = BestUser::find($id);

        if (empty($bestUser)) {
            Flash::error('Best User not found');

            return redirect(route('admin.bestUsers.index'));
        }
        $image = FileHelper::uploadImage($request, 'image', $bestUser);
        $bestUser->fill(array_merge($request->all(), ['image' => $image]));
        $bestUser->save();

        Flash::success('Best User updated successfully.');

        return redirect(route('admin.bestUsers.index'));
    }

    /**
     * Remove the specified BestUser from storage.
     *
     * @param int $id
     *
     * @return Response
     * @throws \Exception
     *
     */
    public function destroy($id)
    {
        /** @var BestUser $bestUser */
        $bestUser = BestUser::find($id);
        if (empty($bestUser)) {
            Flash::error('Best User not found');

            return redirect(route('admin.bestUsers.index'));
        }

        FileHelper::deleteImage($bestUser);
        $bestUser->delete();

        Flash::success('Best User deleted successfully.');

        return redirect(route('admin.bestUsers.index'));
    }
}
