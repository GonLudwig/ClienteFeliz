@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div>
                <table id="myTable" class="display">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clientes as $cliente)
                            <tr>
                                <td>{{$cliente->id}}</td>
                                <td><input class="input-group-text" name="nome{{$cliente->id}}" value="{{$cliente->nome}}"></td>
                                <td><button class="btn btn-primary" onclick="editar({{$cliente->id}})">Editar</button></td>
                                <td><button class="btn btn-danger" onclick="excluir({{$cliente->id}})">Excluir</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready( function () {
        $('#myTable').DataTable() 
    })

    function excluir(id) {
        $.ajax({
            url: `${window.location.origin}/cliente/${id}`,
            method: "DELETE",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        .done(function () {
            window.location.reload()
        })
    }

    function editar(id) {
        $.ajax({
            url: `${window.location.origin}/cliente/${id}`,
            method: "PUT",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                nome: $(`input[name=nome${id}]`).val()
            }
        })
        .done(function () {
            window.location.reload()
        })
    }

</script>
@endsection
