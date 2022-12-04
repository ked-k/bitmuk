<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\FaqDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Backend\CreateFaqRequest;
use App\Http\Requests\Backend\UpdateFaqRequest;
use App\Models\Faq;
use App\Models\FaqCategory;
use Flash;
use Response;

class FaqController extends AppBaseController
{
    /**
     * Display a listing of the Faq.
     *
     * @param FaqDataTable $faqDataTable
     * @return Response
     */
    public function index(FaqDataTable $faqDataTable)
    {
        return $faqDataTable->render('backend.faqs.index');
    }

    /**
     * Show the form for creating a new Faq.
     *
     * @return Response
     */
    public function create()
    {
        $faqCategory = FaqCategory::pluck('name', 'id')->toArray();
        return view('backend.faqs.create', compact('faqCategory'));
    }

    /**
     * Store a newly created Faq in storage.
     *
     * @param CreateFaqRequest $request
     *
     * @return Response
     */
    public function store(CreateFaqRequest $request)
    {
        $input = $request->all();

        /** @var Faq $faq */
        $faq = Faq::create($input);

        Flash::success('Faq saved successfully.');

        return redirect(route('admin.faqs.index'));
    }

    /**
     * Display the specified Faq.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Faq $faq */
        $faq = Faq::find($id);


        if (empty($faq)) {
            Flash::error('Faq not found');

            return redirect(route('admin.faqs.index'));
        }

        return view('backend.faqs.show')->with('faq', $faq);
    }

    /**
     * Show the form for editing the specified Faq.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Faq $faq */
        $faq = Faq::find($id);
        $faqCategory = FaqCategory::pluck('name', 'id')->toArray();
        if (empty($faq)) {
            Flash::error('Faq not found');

            return redirect(route('admin.faqs.index'));
        }

        return view('backend.faqs.edit', compact('faqCategory'))->with('faq', $faq);
    }

    /**
     * Update the specified Faq in storage.
     *
     * @param int $id
     * @param UpdateFaqRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFaqRequest $request)
    {
        /** @var Faq $faq */
        $faq = Faq::find($id);

        if (empty($faq)) {
            Flash::error('Faq not found');

            return redirect(route('admin.faqs.index'));
        }

        $faq->fill($request->all());
        $faq->save();

        Flash::success('Faq updated successfully.');

        return redirect(route('admin.faqs.index'));
    }

    /**
     * Remove the specified Faq from storage.
     *
     * @param int $id
     *
     * @return Response
     * @throws \Exception
     *
     */
    public function destroy($id)
    {
        /** @var Faq $faq */
        $faq = Faq::find($id);

        if (empty($faq)) {
            Flash::error('Faq not found');

            return redirect(route('admin.faqs.index'));
        }

        $faq->delete();

        Flash::success('Faq deleted successfully.');

        return redirect(route('admin.faqs.index'));
    }
}
