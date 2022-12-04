<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\HomeTestimonialDataTable;
use App\Helpers\FileHelper;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Backend\CreateHomeTestimonialRequest;
use App\Http\Requests\Backend\UpdateHomeTestimonialRequest;
use App\Models\HomeTestimonial;
use Flash;
use Response;

class HomeTestimonialController extends AppBaseController
{
    /**
     * Display a listing of the HomeTestimonial.
     *
     * @param HomeTestimonialDataTable $homeTestimonialDataTable
     * @return Response
     */
    public function index(HomeTestimonialDataTable $homeTestimonialDataTable)
    {
        return $homeTestimonialDataTable->render('backend.home_testimonials.index');
    }

    /**
     * Show the form for creating a new HomeTestimonial.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.home_testimonials.create');
    }

    /**
     * Store a newly created HomeTestimonial in storage.
     *
     * @param CreateHomeTestimonialRequest $request
     *
     * @return Response
     */
    public function store(CreateHomeTestimonialRequest $request)
    {
        $input = $request->all();

        $image = FileHelper::uploadImage($request);
        /** @var HomeTestimonial $homeTestimonial */
        $homeTestimonial = HomeTestimonial::create(array_merge($input, ['image' => $image]));

        Flash::success('Home Testimonial saved successfully.');

        return redirect(route('admin.homeTestimonials.index'));
    }

    /**
     * Display the specified HomeTestimonial.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var HomeTestimonial $homeTestimonial */
        $homeTestimonial = HomeTestimonial::find($id);

        if (empty($homeTestimonial)) {
            Flash::error('Home Testimonial not found');

            return redirect(route('admin.homeTestimonials.index'));
        }

        return view('backend.home_testimonials.show')->with('homeTestimonial', $homeTestimonial);
    }

    /**
     * Show the form for editing the specified HomeTestimonial.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var HomeTestimonial $homeTestimonial */
        $homeTestimonial = HomeTestimonial::find($id);

        if (empty($homeTestimonial)) {
            Flash::error('Home Testimonial not found');

            return redirect(route('admin.homeTestimonials.index'));
        }

        return view('backend.home_testimonials.edit')->with('homeTestimonial', $homeTestimonial);
    }

    /**
     * Update the specified HomeTestimonial in storage.
     *
     * @param int $id
     * @param UpdateHomeTestimonialRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHomeTestimonialRequest $request)
    {
        /** @var HomeTestimonial $homeTestimonial */
        $homeTestimonial = HomeTestimonial::find($id);

        if (empty($homeTestimonial)) {
            Flash::error('Home Testimonial not found');

            return redirect(route('admin.homeTestimonials.index'));
        }

        $image = FileHelper::uploadImage($request, 'image', $homeTestimonial);
        $homeTestimonial->fill(array_merge($request->all(), ['image' => $image]));
        $homeTestimonial->save();

        Flash::success('Home Testimonial updated successfully.');

        return redirect(route('admin.homeTestimonials.index'));
    }

    /**
     * Remove the specified HomeTestimonial from storage.
     *
     * @param int $id
     *
     * @return Response
     * @throws \Exception
     *
     */
    public function destroy($id)
    {
        /** @var HomeTestimonial $homeTestimonial */
        $homeTestimonial = HomeTestimonial::find($id);

        if (empty($homeTestimonial)) {
            Flash::error('Home Testimonial not found');

            return redirect(route('admin.homeTestimonials.index'));
        }

        FileHelper::deleteImage($homeTestimonial, 'image');
        $homeTestimonial->delete();

        Flash::success('Home Testimonial deleted successfully.');

        return redirect(route('admin.homeTestimonials.index'));
    }
}
