<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Http\Requests\ClienteRequest;
use App\Service\CrudService;

class ClienteController extends Controller
{
    public function index()
    {
        $response = CrudService::buscar(new Cliente());
        return response()->json($response);
    }

    public function store(ClienteRequest $request)
    {
        $response = CrudService::criar(new Cliente(), $request);
        return response()->json($response);
    }

    public function update(ClienteRequest $request, String $cliente)
    {
        $response = CrudService::atualizar(new Cliente(), $request, $cliente);
        return response()->json($response);
    }

    public function destroy(String $cliente)
    {
        $response = CrudService::deletar(new Cliente(), $cliente);
        return response()->json($response);
    }
}
