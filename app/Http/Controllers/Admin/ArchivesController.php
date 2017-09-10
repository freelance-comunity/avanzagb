<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Archive;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use \Excel;
use Illuminate\Http\Response;
use Yajra\Datatables\Facades\Datatables;


class ArchivesController extends Controller
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
        $this->validate($request, ['credit_id' => 'required', 'client_id' => 'required', 'group' => 'required', 'product' => 'required', 'client' => 'required', 'start_date' => 'required', 'brach' => 'required', 'source_of_funding' => 'required', 'status' => 'required', 'archivist' => 'required', 'drawer' => 'required' ]);

        Archive::create($request->all());

        Session::flash('message', '¡Expediente creado exitosamente!');
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
        $this->validate($request, ['credit_id' => 'required', 'client_id' => 'required', 'group' => 'required', 'product' => 'required', 'client' => 'required', 'start_date' => 'required', 'brach' => 'required', 'source_of_funding' => 'required','status' => 'required','archivist' => 'required', 'drawer' => 'required' ]);

        $archive = Archive::findOrFail($id);
        $archive->update($request->all());

        Session::flash('message', '¡Expediente actualizado exitosamente!');
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

        Session::flash('message', '¡Expediente eliminado exitosamente!');
        Session::flash('status', 'success');

        return redirect('admin/archives');
    }

    public function importArchives(Request $request)
    {   
        //$this->validate($request, ['exel' => 'required|mimes:xls']);

        \Excel::load($request->excel, function($reader) {

            $excel = $reader->get();

            //iteración
            $reader->each(function($row) {
                $archive = new archive;
                $archive->credit_id = $row->credit_id;
                $archive->client_id = $row->client_id;
                $archive->group = $row->group;
                $archive->product = $row->product;
                $archive->client = $row->client;
                $archive->start_date = $row->start_date;
                $archive->brach = $row->brach;
                $archive->source_of_funding = $row->source_of_funding;
                $archive->status = $row->status;
                $archive->archivist = $row->archivist;
                $archive->drawer = $row->drawer;
                $archive->save();
            });

        });

        Session::flash('message', 'Archive added!');
        Session::flash('status', 'success');

        return redirect('admin/archives');
    }

    public function importFile(Request $request)
    {   
        $id = $request->input('archive_id');
        $archive = Archive::findOrFail($id);

        if ($file = $request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path() . '/uploads/documents';
            $file->move($destinationPath, $filename);
        }

        $archive->file = $filename;
        $archive->save();
        
        
        Session::flash('message', '¡Archivo cargado exitosamente!');
        Session::flash('status', 'success');

        return redirect('admin/archives');
    }

    public function getDownload($id)
    {

        //PDF file is stored under project/public/download/info.pdf
        $archive = Archive::findOrFail($id);
        $file= public_path(). "/uploads/documents/".$archive->file;   

        return response()->download($file);
    }

}
