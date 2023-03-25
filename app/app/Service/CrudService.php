<?php

namespace App\Service;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class CrudService {

    public static function buscar(Model $model) {
        
        $dado = $model::all();

        if ($dado) {
            $response['data'] = $dado;
            return $response;
        }

        return [
            'message' => 'Dados não foram encontrados'
        ];
    }

    public static function criar(Model $model, Request $request) {
        $dado = $model::create($request->validated());

        if ($dado) {
            return [
                'message' => 'Dados foram criados com sucesso'
            ];
        }

        return [
            'message' => 'Não foi possivel salvar os dados'
        ];
    }

    public static function atualizar(Model $model, Request $request, String $id) {
        $dado = $model::find($id);

        if ($dado) {
            $dado->update($request->validated());
            return [
                'message' => 'Dados atualizados com sucesso'
            ];
        }

        return [
            'message' => 'Dado não foi encontrado'
        ];
    }

    public static function deletar(Model $model, String $id) {
        $dado = $model::find($id);

        if ($dado) {
            $dado->delete();
            return [
                'message' => 'Dados deletados com sucesso'
            ];
        }

        return [
            'message' => 'Dado não foi encontrado'
        ];
    }
}