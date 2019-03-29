<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Client;
use Request;
use App\Http\Requests\ClientsRequest;

class ClientController extends Controller
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
        $clients = Client::withCount('documents')->get();
        
        return view('client.index')->with('clients', $clients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientsRequest $request)
    {
        $client = $request->all();
        $client['user_id'] = Auth::id();
        $client = Client::create($client);
        
        session()->flash('message', 'Cliente cadastrado com sucesso!');
        return redirect()->action('ClientController@edit', ['c'=>$client['id']]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::find($id);
        
        if(empty($client)) {
            return "Cliente não encontrado";
        }
        
        return view('client.edit')->with('c', $client);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClientsRequest $request)
    {
        $request = (Request::all());
        $client = Client::find($request['id']);
        
        $client->bank = $request['bank'];
        $client->agency = $request['agency'];
        $client->number = $request['number'];
        $client->city = $request['city'];
        $client->state = $request['state'];
        $client->save();
        
        session()->flash('message', 'Cliente alterado com sucesso!');
        return redirect()->action('ClientController@edit', ['c'=>$client['id']]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Client::destroy($id);
        session()->flash('message', 'Cliente excluído com sucesso!');
        return redirect()->action('ClientController@index');
    }
}