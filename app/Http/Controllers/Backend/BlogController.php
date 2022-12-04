<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\BlogDataTable;
use App\Helpers\FileHelper;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Backend\CreateBlogRequest;
use App\Http\Requests\Backend\UpdateBlogRequest;
use App\Models\Blog;
use Flash;
use Response;

class BlogController extends AppBaseController
{
    /**
     * Display a listing of the Blog.
     *
     * @param BlogDataTable $blogDataTable
     * @return Response
     */
    public function index(BlogDataTable $blogDataTable)
    {
        return $blogDataTable->render('backend.blogs.index');
    }

    /**
     * Show the form for creating a new Blog.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.blogs.create');
    }

    /**
     * Store a newly created Blog in storage.
     *
     * @param CreateBlogRequest $request
     *
     * @return Response
     */
    public function store(CreateBlogRequest $request)
    {
        $input = $request->all();

        $image = FileHelper::uploadImage($request);

        /** @var Blog $blog */
        $blog = Blog::create(array_merge($input, ['image' => $image]));

        Flash::success('Blog saved successfully.');

        return redirect(route('admin.blogs.index'));
    }

    /**
     * Display the specified Blog.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Blog $blog */
        $blog = Blog::find($id);
        if (empty($blog)) {
            Flash::error('Blog not found');

            return redirect(route('admin.blogs.index'));
        }
        return view('backend.blogs.show')->with('blog', $blog);
    }

    /**
     * Show the form for editing the specified Blog.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Blog $blog */
        $blog = Blog::find($id);

        if (empty($blog)) {
            Flash::error('Blog not found');

            return redirect(route('admin.blogs.index'));
        }

        return view('backend.blogs.edit')->with('blog', $blog);
    }

    /**
     * Update the specified Blog in storage.
     *
     * @param int $id
     * @param UpdateBlogRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBlogRequest $request)
    {
        /** @var Blog $blog */
        $blog = Blog::find($id);

        if (empty($blog)) {
            Flash::error('Blog not found');

            return redirect(route('admin.blogs.index'));
        }

        $image = FileHelper::uploadImage($request, 'image', $blog);

        if ($image) {
            $fillData = array_merge($request->all(), ['image' => $image]);
        } else {
            $fillData = $request->all();
        }

        $blog->fill($fillData);
        $blog->save();

        Flash::success('Blog updated successfully.');

        return redirect(route('admin.blogs.index'));
    }

    /**
     * Remove the specified Blog from storage.
     *
     * @param int $id
     *
     * @return Response
     * @throws \Exception
     *
     */
    public function destroy($id)
    {
        /** @var Blog $blog */
        $blog = Blog::find($id);

        if (empty($blog)) {
            Flash::error('Blog not found');

            return redirect(route('admin.blogs.index'));
        }
        FileHelper::deleteImage($blog);
        $blog->delete();

        Flash::success('Blog deleted successfully.');

        return redirect(route('admin.blogs.index'));
    }
}
