<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\PageDataTable;
use App\Helpers\FileHelper;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Backend\CreatePageRequest;
use App\Http\Requests\Backend\UpdatePageRequest;
use App\Models\Page;
use Exception;
use Flash;
use Illuminate\Http\Request;
use Response;
use Str;

class PageController extends AppBaseController
{
    /**
     * Display a listing of the Page.
     *
     * @param PageDataTable $pageDataTable
     * @return Response
     */
    public function index(PageDataTable $pageDataTable)
    {
        return $pageDataTable->render('backend.pages.index');
    }

    /**
     * Show the form for creating a new Page.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.pages.create');
    }

    /**
     * Store a newly created Page in storage.
     *
     * @param CreatePageRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $jsonData = [
            'breadcrumb_image' => FileHelper::uploadImage($request,'breadcrumb_image'),
            'breadcrumb_title' => $input['breadcrumb_title'],
            'section_title' => $input['section_title'],
            'cover_content' => $input['cover_content'],
            'image' => FileHelper::uploadImage($request,'image'),
            'main_content' => $input['main_content'],
        ];

        $data = [
            'label' => $input['page_name'],
            'url' => '/page/' . str::slug($input['page_name'], '-'),
            'component' => json_encode($jsonData),
        ];


        /** @var Page $page */
        $page = Page::create($data);

        Flash::success('Page saved successfully.');

        return redirect(route('admin.pages.index'));
    }

    /**
     * Display the specified Page.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Page $page */
        $page = Page::find($id);

        if (empty($page)) {
            Flash::error('Page not found');

            return redirect(route('admin.pages.index'));
        }

        return view('backend.pages.show')->with('page', $page);
    }

    /**
     * Show the form for editing the specified Page.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Page $page */
        $page = Page::find($id);

        if (empty($page)) {
            Flash::error('Page not found');

            return redirect(route('admin.pages.index'));
        }

        return view('backend.pages.edit')->with('page', $page);
    }

    /**
     * Update the specified Page in storage.
     *
     * @param int $id
     * @param UpdatePageRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        /** @var Page $page */
        $page = Page::find($id);

        if (empty($page)) {
            Flash::error('Page not found');

            return redirect(route('admin.pages.index'));
        }

        $input = $request->except(['_token', '_method', 'page_name']);

        $fillData = json_decode($page->component, true);
        foreach ($input as $key => $value) {

            $imgArray = explode("_", $key);
            $img = in_array('image', $imgArray);

            if ($img) {
                $imageName = FileHelper::uploadImage($request, $key);
                $fillData[$key] = $imageName;
            } else {
                $fillData[$key] = $value;
            }
        }

        $page->fill(array_merge(['component' => json_encode($fillData), 'label' => $request->page_name]));
        $page->save();

        Flash::success('Page updated successfully.');

        return redirect(route('admin.pages.index'));
    }

    /**
     * Remove the specified Page from storage.
     *
     * @param int $id
     *
     * @return Response
     * @throws Exception
     *
     */
    public function destroy($id)
    {
        /** @var Page $page */
        $page = Page::find($id);

        if (empty($page)) {
            Flash::error('Page not found');

            return redirect(route('admin.pages.index'));
        }

        $page->delete();

        Flash::success('Page deleted successfully.');

        return redirect(route('admin.pages.index'));
    }
}
