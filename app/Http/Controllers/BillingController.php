<?php

namespace App\Http\Controllers;

use App\Models\Billing;
use App\Models\Client;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Database\Eloquent\Casts\AsCollection;
use Illuminate\Support\Facades\Validator;

class BillingController extends Controller
{
    public function insert(Request $request)
    {

     
        $validator = Validator::make(
            $request->all(),
            [
                /* A linha 'usuario' => 'unique:clients' não permite
                cadastrar um usuário duplicado, caso não seja fornecido dados se usuário
                vai para a condição if que verifica se foi informado um id de usuário
                simulando um combo-box*/

                'id' => 'exists:clients,id',

                //validação dos dados do usuário
                'nome' => 'min:6|max:100',
                'usuario' => 'unique:clients',
                "senha" => 'min:6|max:12',
                "cpf" => 'digits:11|unique:clients',
                "email" => 'email|unique:clients',
                "telefone_celular" => 'min:10|max:11',
                "data_nascimento" => 'date',
                "nome_mae" => 'min:6|max:100',
                //validação dados da conta
                'conta' => 'required|min:6|max:100',
                'valor' => 'required|numeric',
                'tipo' => 'required|min:4|max:15'

            ]
        );

        //dd($request->id);


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

            if ($request->id == null) {

                
                $cliente = Client::firstOrCreate([

                    "nome" => $request->nome,
                    "usuario" => $request->usuario,
                    "senha" => $request->senha,
                    "cpf" => $request->cpf,
                    "email" =>  $request->email,
                    "telefone_celular" => $request->telefone_celular,
                    "data_nascimento" => $request->data_nascimento,
                    "nome_mae" => $request->nome_mae,

                ]);
            } else {
                

                $cliente = new Client();
                $cliente->id =  $request->id;
            }

            $conta = new Billing;
            $conta->conta = $request->conta;
            $conta->valor = $request->valor;
            $conta->tipo = $request->tipo;
            $conta->client_id = $cliente->id;
            $conta->save();
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

                'conta' => 'required|min:6|max:100',
                'valor' => 'required|numeric',
                'tipo' => 'required|min:4|max:15'

            ]
        );

        try {

            if ($validator->fails()) {

                throw new Exception($validator->errors());
            }


            $conta = Billing::find($request->id);

            if ($conta) {
                $conta->conta = $request->conta;
                $conta->valor = $request->valor;
                $conta->tipo = $request->tipo;
                $conta->update();
                return ('{"errMsg":"Alterado com Sucesso"}');
            } else {
                throw new Exception('{"errMsg":"Fatura não encontrada!"}');
            }
        
            //code...
        } catch (Exception $e) {
            return ($e->getMessage());
        }
    }

    public function delete($id)
    {

        try {

            $conta = Billing::find($id);
            if ($conta) {
                $conta->delete();
                return ('{"errMsg":"Excluído com Sucesso"}');
            } else {
                throw new Exception('{"errMsg":"Erro ao excluir a fatura"}');
            }
        } catch (Exception $e) {
            return ($e->getMessage());
        }
    }


    public function listAll($cpf)
    {
        //busca todas as conta com o cliente associado
        try {
            

            $cliente = Client::where('cpf', $cpf)->first();

            if ((empty($cliente))) {

                throw new Exception('{"errMsg":"Não existe usuário cadastrado com esse CPF!"}');
            } 

            $conta_usuarios = Billing::with('clients')
                ->where('client_id', $cliente->id)
                ->orderBy('conta', 'ASC')
                ->get();



            if ((sizeof($conta_usuarios) == 0)) {

                throw new Exception('{"errMsg":"Não existem faturas para este usuário!"}');
            } else {

                return $conta_usuarios;
            }
        } catch (Exception $e) {

            return ($e->getMessage());
        }
    }

    public function find($id)
    {

        //busca a conta mas já trás o cliente associado

        try {

            $conta = Billing::with('clients')->find($id);
            if ((empty($conta))) {


                throw new Exception('{"errMsg":"Fatura Inexistente!"}');
            } else {

                return $conta;
            }
        } catch (Exception $e) {

            return ($e->getMessage());
        }
    }
}
