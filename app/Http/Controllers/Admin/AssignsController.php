<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Assign;
use App\Archive;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class AssignsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $assigns = Assign::all();

        return view('backEnd.admin.assigns.index', compact('assigns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backEnd.admin.assigns.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {   
        $id = $request->input('archive_id');

        $this->validate($request, ['name' => 'required', 'reason' => 'required', 'date_assign' => 'required', 'return_date' => 'required', 'archive_id' => 'required' ]);

        Assign::create($request->all());

        Session::flash('message', '¡Expediente asignado!');
        Session::flash('status', 'success');
        
        $archive = Archive::findOrFail($id);
        $archive->status = 'ASIGNADO';
        $archive->save();

        return redirect()->back();
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
        $assign = Assign::findOrFail($id);

        return view('backEnd.admin.assigns.show', compact('assign'));
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
        $assign = Assign::findOrFail($id);

        return view('backEnd.admin.assigns.edit', compact('assign'));
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
        $this->validate($request, ['name' => 'required', 'reason' => 'required', 'date_assign' => 'required', 'return_date' => 'required', ]);

        $assign = Assign::findOrFail($id);
        $assign->update($request->all());

        Session::flash('message', 'Assign updated!');
        Session::flash('status', 'success');

        return redirect('admin/assigns');
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
        $assign = Assign::findOrFail($id);

        $assign->delete();

        Session::flash('message', 'Assign deleted!');
        Session::flash('status', 'success');

        return redirect('admin/assigns');
    }

}
