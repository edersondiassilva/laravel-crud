<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Document;
use App\Client;
use Request;
use App\Http\Requests\DocumentsRequest;
use Carbon\Carbon;
use DateTime;

class DocumentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Carbon::setToStringFormat('Y-m-d');
        
        $documents = Document::all();
        
        return view('document.index')->with('documents', $documents);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::pluck('name','id');
        $status = array('Aguardando'=>'Aguardando', 'Aprovado'=>'Aprovado', 'Irregular'=>'Irregular');

        return view('document.create', compact('clients'))
            ->with('status', $status);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DocumentsRequest $request)
    {
        $document = $request->all();
        $document = Document::create($document);
        
        session()->flash('message', 'Documento cadastrado com sucesso!');
        return redirect()->action('DocumentController@edit', ['d'=>$document['id']]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $clients = Client::pluck('name','id');
        $status = array('Aguardando'=>'Aguardando', 'Aprovado'=>'Aprovado', 'Irregular'=>'Irregular');
        $document = Document::find($id);

        return view('document.edit', compact('clients'))
            ->with('d', $document)
            ->with('status', $status);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DocumentsRequest $request)
    {
        $request = (Request::all());
        $document = Document::find($request['id']);
        
        $document->document = $request['document'];
        $document->status = $request['status'];
        $document->save();
        
        session()->flash('message', 'Documento alterado com sucesso!');
        return redirect()->action('DocumentController@edit', ['d'=>$document['id']]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Document::destroy($id);
        session()->flash('message', 'Documento excluído com sucesso!');
        return redirect()->action('DocumentController@index');
    }
}