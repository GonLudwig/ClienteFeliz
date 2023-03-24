@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/home.css')}}">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Adicionar Cliente
                </div>
                <div class="card-body">
                    <div class="adicionarCliente">
                        <input class="input-group-text" name="nome" type="text" placeholder="Nome">
                        <input class="input-group-text" name="telefone" type="text" placeholder="Telefone">
                        <input class="input-group-text" name="email" type="text" placeholder="E-mail">
                        <input class="input-group-text" name="ultima_compra" type="text" placeholder="Ultima Compra">
                        <button class="btn btn-success" onclick="criar(this)" >Adicionar</button>
                    </div>
                </div>
            </div>
            <div class="tabelaDataTable">
                <table id="clienteTable" class="display">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Telefone</th>
                            <th>E-mail</th>
                            <th>Ultima Compra</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/home.js')}}"></script>
@endsection
