<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\KycDataTable;
use App\Http\Controllers\AppBaseController;
use App\Models\Kyc;
use Flash;
use Response;

class KycController extends AppBaseController
{
    /**
     * Display a listing of the Kyc.
     *
     * @param KycDataTable $kycDataTable
     * @return Response
     */
    public function index(KycDataTable $kycDataTable)
    {
        return $kycDataTable->render('backend.kycs.index');
    }

    /**
     * Display the specified Kyc.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Kyc $kyc */
        $kyc = Kyc::find($id);

        if (empty($kyc)) {
            Flash::error('Kyc not found');

            return redirect(route('admin.kycs.index'));
        }

        return view('backend.kycs.show')->with('kyc', $kyc);
    }


}
