<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Archive;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class ArchivesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $archives = Archive::all();

        return view('backEnd.admin.archives.index', compact('archives'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backEnd.admin.archives.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['credit_id' => 'required', 'client_id' => 'required', 'group' => 'required', 'product' => 'required', 'client' => 'required', 'start_date' => 'required', 'brach' => 'required', 'source_of_funding' => 'required', ]);

        Archive::create($request->all());

        Session::flash('message', 'Archive added!');
        Session::flash('status', 'success');

        return redirect('admin/archives');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function show($id)
    {
        $archive = Archive::findOrFail($id);

        return view('backEnd.admin.archives.show', compact('archive'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $archive = Archive::findOrFail($id);

        return view('backEnd.admin.archives.edit', compact('archive'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $this->validate($request, ['credit_id' => 'required', 'client_id' => 'required', 'group' => 'required', 'product' => 'required', 'client' => 'required', 'start_date' => 'required', 'brach' => 'required', 'source_of_funding' => 'required', ]);

        $archive = Archive::findOrFail($id);
        $archive->update($request->all());

        Session::flash('message', 'Archive updated!');
        Session::flash('status', 'success');

        return redirect('admin/archives');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $archive = Archive::findOrFail($id);

        $archive->delete();

        Session::flash('message', 'Archive deleted!');
        Session::flash('status', 'success');

        return redirect('admin/archives');
    }

}
