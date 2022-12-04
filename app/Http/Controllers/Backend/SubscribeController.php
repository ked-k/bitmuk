<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\SubscribeDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Backend\CreateSubscribeRequest;
use App\Http\Requests\Backend\UpdateSubscribeRequest;
use App\Models\Subscribe;
use Flash;
use Response;

class SubscribeController extends AppBaseController
{
    /**
     * Display a listing of the Subscribe.
     *
     * @param SubscribeDataTable $subscribeDataTable
     * @return Response
     */
    public function index(SubscribeDataTable $subscribeDataTable)
    {
        return $subscribeDataTable->render('backend.subscribes.index');
    }

    /**
     * Show the form for creating a new Subscribe.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.subscribes.create');
    }

    /**
     * Store a newly created Subscribe in storage.
     *
     * @param CreateSubscribeRequest $request
     *
     * @return Response
     */
    public function store(CreateSubscribeRequest $request)
    {
        $input = $request->all();

        /** @var Subscribe $subscribe */
        $subscribe = Subscribe::create($input);

        Flash::success('Subscribe saved successfully.');

        return redirect(route('admin.subscribes.index'));
    }

    /**
     * Display the specified Subscribe.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Subscribe $subscribe */
        $subscribe = Subscribe::find($id);

        if (empty($subscribe)) {
            Flash::error('Subscribe not found');

            return redirect(route('admin.subscribes.index'));
        }

        return view('backend.subscribes.show')->with('subscribe', $subscribe);
    }

    /**
     * Show the form for editing the specified Subscribe.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Subscribe $subscribe */
        $subscribe = Subscribe::find($id);

        if (empty($subscribe)) {
            Flash::error('Subscribe not found');

            return redirect(route('admin.subscribes.index'));
        }

        return view('backend.subscribes.edit')->with('subscribe', $subscribe);
    }

    /**
     * Update the specified Subscribe in storage.
     *
     * @param int $id
     * @param UpdateSubscribeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSubscribeRequest $request)
    {
        /** @var Subscribe $subscribe */
        $subscribe = Subscribe::find($id);

        if (empty($subscribe)) {
            Flash::error('Subscribe not found');

            return redirect(route('admin.subscribes.index'));
        }

        $subscribe->fill($request->all());
        $subscribe->save();

        Flash::success('Subscribe updated successfully.');

        return redirect(route('admin.subscribes.index'));
    }

    /**
     * Remove the specified Subscribe from storage.
     *
     * @param int $id
     *
     * @return Response
     * @throws \Exception
     *
     */
    public function destroy($id)
    {
        /** @var Subscribe $subscribe */
        $subscribe = Subscribe::find($id);

        if (empty($subscribe)) {
            Flash::error('Subscribe not found');

            return redirect(route('admin.subscribes.index'));
        }

        $subscribe->delete();

        Flash::success('Subscribe deleted successfully.');

        return redirect(route('admin.subscribes.index'));
    }
}
