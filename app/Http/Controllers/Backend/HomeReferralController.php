<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\HomeReferralDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Backend\CreateHomeReferralRequest;
use App\Http\Requests\Backend\UpdateHomeReferralRequest;
use App\Models\HomeReferral;
use Flash;
use Response;

class HomeReferralController extends AppBaseController
{
    /**
     * Display a listing of the HomeReferral.
     *
     * @param HomeReferralDataTable $homeReferralDataTable
     * @return Response
     */
    public function index(HomeReferralDataTable $homeReferralDataTable)
    {
        return $homeReferralDataTable->render('backend.home_referrals.index');
    }

    /**
     * Show the form for creating a new HomeReferral.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.home_referrals.create');
    }

    /**
     * Store a newly created HomeReferral in storage.
     *
     * @param CreateHomeReferralRequest $request
     *
     * @return Response
     */
    public function store(CreateHomeReferralRequest $request)
    {
        $input = $request->all();

        /** @var HomeReferral $homeReferral */
        $homeReferral = HomeReferral::create($input);

        Flash::success('Home Referral saved successfully.');

        return redirect(route('admin.homeReferrals.index'));
    }

    /**
     * Display the specified HomeReferral.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var HomeReferral $homeReferral */
        $homeReferral = HomeReferral::find($id);

        if (empty($homeReferral)) {
            Flash::error('Home Referral not found');

            return redirect(route('admin.homeReferrals.index'));
        }

        return view('backend.home_referrals.show')->with('homeReferral', $homeReferral);
    }

    /**
     * Show the form for editing the specified HomeReferral.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var HomeReferral $homeReferral */
        $homeReferral = HomeReferral::find($id);

        if (empty($homeReferral)) {
            Flash::error('Home Referral not found');

            return redirect(route('admin.homeReferrals.index'));
        }

        return view('backend.home_referrals.edit')->with('homeReferral', $homeReferral);
    }

    /**
     * Update the specified HomeReferral in storage.
     *
     * @param int $id
     * @param UpdateHomeReferralRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHomeReferralRequest $request)
    {
        /** @var HomeReferral $homeReferral */
        $homeReferral = HomeReferral::find($id);

        if (empty($homeReferral)) {
            Flash::error('Home Referral not found');

            return redirect(route('admin.homeReferrals.index'));
        }

        $homeReferral->fill($request->all());
        $homeReferral->save();

        Flash::success('Home Referral updated successfully.');

        return redirect(route('admin.homeReferrals.index'));
    }

    /**
     * Remove the specified HomeReferral from storage.
     *
     * @param int $id
     *
     * @return Response
     * @throws \Exception
     *
     */
    public function destroy($id)
    {
        /** @var HomeReferral $homeReferral */
        $homeReferral = HomeReferral::find($id);

        if (empty($homeReferral)) {
            Flash::error('Home Referral not found');

            return redirect(route('admin.homeReferrals.index'));
        }

        $homeReferral->delete();

        Flash::success('Home Referral deleted successfully.');

        return redirect(route('admin.homeReferrals.index'));
    }
}
