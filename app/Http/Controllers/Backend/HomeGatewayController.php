<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\HomeGatewayDataTable;
use App\Helpers\FileHelper;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Backend\CreateHomeGatewayRequest;
use App\Http\Requests\Backend\UpdateHomeGatewayRequest;
use App\Models\HomeGateway;
use Flash;
use Response;

class HomeGatewayController extends AppBaseController
{
    /**
     * Display a listing of the HomeGateway.
     *
     * @param HomeGatewayDataTable $homeGatewayDataTable
     * @return Response
     */
    public function index(HomeGatewayDataTable $homeGatewayDataTable)
    {
        return $homeGatewayDataTable->render('backend.home_gateways.index');
    }

    /**
     * Show the form for creating a new HomeGateway.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.home_gateways.create');
    }

    /**
     * Store a newly created HomeGateway in storage.
     *
     * @param CreateHomeGatewayRequest $request
     *
     * @return Response
     */
    public function store(CreateHomeGatewayRequest $request)
    {
        $input = $request->all();
        $image = FileHelper::uploadImage($request);

        /** @var HomeGateway $homeGateway */
        $homeGateway = HomeGateway::create(array_merge($input, ['image' => $image]));


        Flash::success('Home Gateway saved successfully.');

        return redirect(route('admin.homeGateways.index'));
    }

    /**
     * Display the specified HomeGateway.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var HomeGateway $homeGateway */
        $homeGateway = HomeGateway::find($id);

        if (empty($homeGateway)) {
            Flash::error('Home Gateway not found');

            return redirect(route('admin.homeGateways.index'));
        }

        return view('backend.home_gateways.show')->with('homeGateway', $homeGateway);
    }

    /**
     * Show the form for editing the specified HomeGateway.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var HomeGateway $homeGateway */
        $homeGateway = HomeGateway::find($id);

        if (empty($homeGateway)) {
            Flash::error('Home Gateway not found');

            return redirect(route('admin.homeGateways.index'));
        }

        return view('backend.home_gateways.edit')->with('homeGateway', $homeGateway);
    }

    /**
     * Update the specified HomeGateway in storage.
     *
     * @param int $id
     * @param UpdateHomeGatewayRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHomeGatewayRequest $request)
    {
        /** @var HomeGateway $homeGateway */
        $homeGateway = HomeGateway::find($id);

        if (empty($homeGateway)) {
            Flash::error('Home Gateway not found');

            return redirect(route('admin.homeGateways.index'));
        }

        $image = FileHelper::uploadImage($request, 'image', $homeGateway);
        $homeGateway->fill(array_merge($request->all(), ['image' => $image]));
        $homeGateway->save();

        Flash::success('Home Gateway updated successfully.');

        return redirect(route('admin.homeGateways.index'));
    }

    /**
     * Remove the specified HomeGateway from storage.
     *
     * @param int $id
     *
     * @return Response
     * @throws \Exception
     *
     */
    public function destroy($id)
    {
        /** @var HomeGateway $homeGateway */
        $homeGateway = HomeGateway::find($id);

        if (empty($homeGateway)) {
            Flash::error('Home Gateway not found');

            return redirect(route('admin.homeGateways.index'));
        }
        FileHelper::deleteImage($homeGateway, 'image');
        $homeGateway->delete();

        Flash::success('Home Gateway deleted successfully.');

        return redirect(route('admin.homeGateways.index'));
    }
}
