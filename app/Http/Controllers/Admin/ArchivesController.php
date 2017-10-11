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
use Yajra\DataTables\DataTables;


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
        /*$archives = Archive::all();
        return Datatables::of($archives)->make(true);*/

        return view('backEnd.admin.archives.index');
        
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
        $this->validate($request, ['excel' => 'required']);

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

        Session::flash('message', '¡Expedientes cargados exitosamente!');
        Session::flash('status', 'success');

        return redirect('admin/archives');
    }

    public function importFile(Request $request)
    {    
        $this->validate($request, ['file' => 'required|file']);

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

        return redirect()->back();
    }

    public function getDownload($id)
    {

        //PDF file is stored under project/public/download/info.pdf
        $archive = Archive::findOrFail($id);
        $file= public_path(). "/uploads/documents/".$archive->file;   

        return response()->download($file);
    }

    public function returnArchive(Request $request)
    {   
        $id = $request->input('archive_id');
        $archive = Archive::findOrFail($id);
        $assign = $archive->assign;

        $archive->status = "EN RESGUARDO";
        $archive->save();

        //$assign->status = "RECEPCIONADO";
        $assign->delete();

        Session::flash('message', '¡Archivo Recepcionado!');
        Session::flash('status', 'success');

        return redirect()->back();
    }

    public function apiArchives()
    {
        $collection = Archive::select(['id', 'client_id', 'credit_id', 'group', 'status','source_of_funding'])->orderBy('client_id');

        $archives = $collection;

        return Datatables::of($archives)
        ->addColumn('actions', function ($archive) {
            return '<a href="archives/'.$archive->id.'" class="btn btn-block btn-xs btn-primary"><i class="fa fa-eye"></i>VER</a>';
        })->rawColumns(['actions'])
        ->make(true);    
    }
    public function returnFinafim()
    {
         return view('backEnd.admin.archives.finafim');
    }

    public function finafim()
    {
        $collection = Archive::select(['id', 'client_id', 'credit_id', 'group', 'status','source_of_funding','brach'])->orderBy('client_id');

        $archives = $collection->where('source_of_funding', 'FINAFIM');

        return Datatables::of($archives)
        ->addColumn('actions', function ($archive) {
            return '<a href="admin/archives/'.$archive->id.'" class="btn btn-block btn-xs btn-primary"><i class="fa fa-eye"></i>VER</a>';
        })->rawColumns(['actions'])
        ->make(true);  
    }

    public function returnFommur()
    {
         return view('backEnd.admin.archives.fommur');
    }

    public function fommur()
    {
        $collection = Archive::select(['id', 'client_id', 'credit_id', 'group', 'status','source_of_funding', 'brach'])->orderBy('client_id');

        $archives = $collection->where('source_of_funding', 'FOMMUR');

        return Datatables::of($archives)
        ->addColumn('actions', function ($archive) {
            return '<a href="admin/archives/'.$archive->id.'" class="btn btn-block btn-xs btn-primary"><i class="fa fa-eye"></i>VER</a>';
        })->rawColumns(['actions'])
        ->make(true);  
    }

    public function returnAbc1()
    {
         return view('backEnd.admin.archives.abc1');
    }

    public function abc1()
    {
        $collection = Archive::select(['id', 'client_id', 'credit_id', 'group', 'status','source_of_funding', 'brach'])->orderBy('client_id');

        $archives = $collection->where('source_of_funding', 'ABC CAPITAL LINEA 1');

        return Datatables::of($archives)
        ->addColumn('actions', function ($archive) {
            return '<a href="admin/archives/'.$archive->id.'" class="btn btn-block btn-xs btn-primary"><i class="fa fa-eye"></i>VER</a>';
        })->rawColumns(['actions'])
        ->make(true);  
    }

    public function returnAbc2()
    {
         return view('backEnd.admin.archives.abc2');
    }

    public function abc2()
    {
        $collection = Archive::select(['id', 'client_id', 'credit_id', 'group', 'status','source_of_funding','brach'])->orderBy('client_id');

        $archives = $collection->where('source_of_funding', 'ABC CAPITAL LINEA 2');

        return Datatables::of($archives)
        ->addColumn('actions', function ($archive) {
            return '<a href="admin/archives/'.$archive->id.'" class="btn btn-block btn-xs btn-primary"><i class="fa fa-eye"></i>VER</a>';
        })->rawColumns(['actions'])
        ->make(true);  
    }

    public function returnSof()
    {
         return view('backEnd.admin.archives.sof');
    }

    public function sof()
    {
        $collection = Archive::select(['id', 'client_id', 'credit_id', 'group', 'status','source_of_funding','brach'])->orderBy('client_id');

        $archives = $collection->where('source_of_funding', 'OTRO RECURSOS SFO');

        return Datatables::of($archives)
        ->addColumn('actions', function ($archive) {
            return '<a href="admin/archives/'.$archive->id.'" class="btn btn-block btn-xs btn-primary"><i class="fa fa-eye"></i>VER</a>';
        })->rawColumns(['actions'])
        ->make(true);  
    }

    public function returnSofsc()
    {
         return view('backEnd.admin.archives.sofsc');
    }

    public function sofsc()
    {
        $collection = Archive::select(['id', 'client_id', 'credit_id', 'group', 'status','source_of_funding','brach'])->orderBy('client_id');

        $archives = $collection->where('source_of_funding', 'FOMMUR SFO');

        return Datatables::of($archives)
        ->addColumn('actions', function ($archive) {
            return '<a href="admin/archives/'.$archive->id.'" class="btn btn-block btn-xs btn-primary"><i class="fa fa-eye"></i>VER</a>';
        })->rawColumns(['actions'])
        ->make(true);  
    }

    public function returnSoffin()
    {
         return view('backEnd.admin.archives.soffin');
    }

    public function soffin()
    {
        $collection = Archive::select(['id', 'client_id', 'credit_id', 'group', 'status','source_of_funding','brach'])->orderBy('client_id');

        $archives = $collection->where('source_of_funding', 'OTROS RECURSOS SFI');

        return Datatables::of($archives)
        ->addColumn('actions', function ($archive) {
            return '<a href="admin/archives/'.$archive->id.'" class="btn btn-block btn-xs btn-primary"><i class="fa fa-eye"></i>VER</a>';
        })->rawColumns(['actions'])
        ->make(true);  
    }

    public function returnLegales()
    {
         return view('backEnd.admin.archives.legales');
    }

    public function legales()
    {
        $collection = Archive::select(['id', 'client_id', 'credit_id', 'group', 'status','source_of_funding','brach'])->orderBy('client_id');

        $archives = $collection->where('source_of_funding', 'LEGALES');

        return Datatables::of($archives)
        ->addColumn('actions', function ($archive) {
            return '<a href="admin/archives/'.$archive->id.'" class="btn btn-block btn-xs btn-primary"><i class="fa fa-eye"></i>VER</a>';
        })->rawColumns(['actions'])
        ->make(true);  
    }

}
