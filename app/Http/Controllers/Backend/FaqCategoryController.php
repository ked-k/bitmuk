<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\FaqCategoryDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Backend\CreateFaqCategoryRequest;
use App\Http\Requests\Backend\UpdateFaqCategoryRequest;
use App\Models\FaqCategory;
use Flash;
use Response;

class FaqCategoryController extends AppBaseController
{
    /**
     * Display a listing of the FaqCategory.
     *
     * @param FaqCategoryDataTable $faqCategoryDataTable
     * @return Response
     */
    public function index(FaqCategoryDataTable $faqCategoryDataTable)
    {
        return $faqCategoryDataTable->render('backend.faq_categories.index');
    }

    /**
     * Show the form for creating a new FaqCategory.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.faq_categories.create');
    }

    /**
     * Store a newly created FaqCategory in storage.
     *
     * @param CreateFaqCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateFaqCategoryRequest $request)
    {
        $input = $request->all();

        /** @var FaqCategory $faqCategory */
        $faqCategory = FaqCategory::create($input);

        Flash::success('Faq Category saved successfully.');

        return redirect(route('admin.faqCategories.index'));
    }

    /**
     * Display the specified FaqCategory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var FaqCategory $faqCategory */
        $faqCategory = FaqCategory::find($id);

        if (empty($faqCategory)) {
            Flash::error('Faq Category not found');

            return redirect(route('admin.faqCategories.index'));
        }

        return view('backend.faq_categories.show')->with('faqCategory', $faqCategory);
    }

    /**
     * Show the form for editing the specified FaqCategory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var FaqCategory $faqCategory */
        $faqCategory = FaqCategory::find($id);

        if (empty($faqCategory)) {
            Flash::error('Faq Category not found');

            return redirect(route('admin.faqCategories.index'));
        }

        return view('backend.faq_categories.edit')->with('faqCategory', $faqCategory);
    }

    /**
     * Update the specified FaqCategory in storage.
     *
     * @param int $id
     * @param UpdateFaqCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFaqCategoryRequest $request)
    {
        /** @var FaqCategory $faqCategory */
        $faqCategory = FaqCategory::find($id);

        if (empty($faqCategory)) {
            Flash::error('Faq Category not found');

            return redirect(route('admin.faqCategories.index'));
        }

        $faqCategory->fill($request->all());
        $faqCategory->save();

        Flash::success('Faq Category updated successfully.');

        return redirect(route('admin.faqCategories.index'));
    }

    /**
     * Remove the specified FaqCategory from storage.
     *
     * @param int $id
     *
     * @return Response
     * @throws \Exception
     *
     */
    public function destroy($id)
    {
        /** @var FaqCategory $faqCategory */
        $faqCategory = FaqCategory::find($id);

        if (empty($faqCategory)) {
            Flash::error('Faq Category not found');

            return redirect(route('admin.faqCategories.index'));
        }

        $faqCategory->delete();

        Flash::success('Faq Category deleted successfully.');

        return redirect(route('admin.faqCategories.index'));
    }
}
