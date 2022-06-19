<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Exception;
use Illuminate\Support\Facades\Validator;


class ClientController extends Controller
{
    public function store(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'nome' => 'required|min:6|max:100',
                'usuario' => 'required|unique:clients',
                "senha" => 'required|min:6|max:12',
                "cpf" => 'required|digits:11|unique:clients',
                "email" => 'required|email|unique:clients',
                "telefone_celular" => 'required|min:10|max:11',
                "data_nascimento" => 'required|date',
                "nome_mae" => 'required|min:6|max:100'

            ]
        );

        try {

            if ($validator->fails()) {

                /*
                  Essa validação funciona perfeitamente, porém foi substituida para
                  que ocorra a resposta de sucesso no cadastro do banco
                  return response()
                ->json($validator->errors()); 
                
                */
                throw new Exception($validator->errors());
            }

            $usuario = new Client;
            $usuario->nome = $request->nome;
            $usuario->usuario = $request->usuario;
            $usuario->senha = $request->senha;
            $usuario->cpf = $request->cpf;
            $usuario->email =  $request->email;
            $usuario->telefone_celular = $request->telefone_celular;
            $usuario->data_nascimento =  $request->data_nascimento;
            $usuario->nome_mae = $request->nome_mae;
            $usuario->save();
            return ('{"errMsg":"Cadastrado com Sucesso"}');
            //code...
        } catch (Exception $e) {

            return ($e->getMessage());
        }
    }

    public function update(Request $request)
    {


        $validator = Validator::make(
            $request->all(),
            [
                'nome' => 'required|min:6|max:100',
                "cpf" => 'required|digits:11',
                "email" => 'required|email',
                "telefone_celular" => 'required|min:10|max:11',
                "data_nascimento" => 'required|date',
                "nome_mae" => 'required|min:6|max:100'

            ]
        );

        try {

            if ($validator->fails()) {

                /*
                  Essa validação funciona perfeitamente, porém foi substituida para
                  que ocorra a resposta de sucesso no cadastro do banco
                  return response()
                ->json($validator->errors()); 
                
                */
                throw new Exception($validator->errors());
            }

            $usuario = Client::find($request->id);
            $usuario->nome = $request->nome;
            $usuario->email =  $request->email;
            $usuario->telefone_celular = $request->telefone_celular;
            $usuario->data_nascimento =  $request->data_nascimento;
            $usuario->nome_mae = $request->nome_mae;
            $usuario->update();
            return ('{"errMsg":"Alterado com Sucesso"}');
            //code...
        } catch (Exception $e) {

            return ($e->getMessage());
        }
    }

    public function delete($id)
    {


        try {

            $usuario = Client::find($id);
            if ($usuario) {
                $usuario->delete();
                return ('{"errMsg":"Excluído com Sucesso"}');
            } else {
                throw new Exception('{"errMsg":"Erro ao excluir o Usuário"}');
            }
        } catch (Exception $e) {
            return ($e->getMessage());
        }
    }


    public function listAll()
    {
        //apenas lista todos os usuários


        try {

            $lista_usuarios = Client::all();
            if ((sizeof($lista_usuarios) == 0)) {

                throw new Exception('{"errMsg":"Não existem usuários cadastrados!"}');
            } else {

                return $lista_usuarios;
            }
        } catch (Exception $e) {
            return ($e->getMessage());
        }
    }
    public function find($cpf)
    {
       /* busca o cliente pelo parâmetro cpf as funções que recebem id,
        para realizar alguma tarefa, são alimentadas por essa função, ou seja,
        o id passado para a função delete veio de uma consulta feita por essa função*/



        try {

            $cliente = Client::where('cpf', $cpf)->get();
            if ((sizeof($cliente) == 0)) {



                throw new Exception('{"errMsg":"Usuário Inexistente!"}');
            } else {

                return $cliente;
            }
        } catch (Exception $e) {
            return ($e->getMessage());
        }
    }
}
