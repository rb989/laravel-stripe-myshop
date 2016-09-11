<?php

namespace App\Http\Controllers;

use App\Http\Models\Page;
use Illuminate\Http\Request;
use App\Http\Requests\PageRequest;
use App\Http\Requests;

/**
 * Class PageController
 *
 * @category Main
 *
 * @package App\Http\Controllers
 *
 * @author acev <aasisvinayak@gmail.com>
 *
 * @license https://github.com/aasisvinayak/flymyshop/blob/master/LICENSE  GPL-3.0
 *
 * @link https://github.com/aasisvinayak/flymyshop
 */
class PageController extends Controller
{
    /**
     * Paginated listing of all shop pages
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $pages= Page ::paginate(10);
        return view('admin/pages',compact('pages'));
    }

    /**
     * Show the form for creating a new page.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/add-page');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PageRequest $request New Page Request
     *
     * @return Response
     */
    public function store(PageRequest $request)
    {
        $page= Page::create($request->all());
        $page->status=1;
        $page->page_id=str_random(50);
        $page->save();
        return redirect('admin/pages/');
    }

    /**
     * Fetch page by id
     *
     * @param int $id page id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page= Page::findorFail($id);
        return view('shop/page', compact('page'));
    }

    /**
     * Show the form for editing the page.
     *
     * @param int $id page id
     *
     * @return Response
     */
    public function edit($id)
    {
        $page=Page::findorFail($id);
        return view('admin/edit-page', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PageRequest $request page update request
     * @param int         $id      page id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(PageRequest $request, $id)
    {
        $page= Page::findorFail($id);
        $page->update($request->all());
        return redirect('admin/pages/');
    }

    /**
     * Remove the specified page from storage.
     *
     * @param int $id page id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Page::findorFail($id)->delete();
        return redirect('admin/pages/');
    }
}
