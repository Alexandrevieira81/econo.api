ALEXANDRE DE SOUZA VIEIRA
HENRICK BUENO SANTIAGO

Criar um banco no postgresql com o nome de econo.me.api
Instalação e configuração seguiram as aulas.
Para instalação dos módulos executar o comando composer install
Para configuração do postgres esses atributos devem ser alterados:
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=econo.me.api
DB_USERNAME=seu-usuário
DB_PASSWORD=sua-senha

Os teste foram realizados com o cliente HTTP Insomnia, os scripts para realizar os testes, assim como o tipo de requisição e URL seguem abaixo.

Para melhor utilização do scripts, execute-os na ordem em que se encontram neste documento.
CADASTRO DE USUÁRIOS
POST http://127.0.0.1:8000/api/users/
{
"nome":"Alexandre01",
"usuario":"@alex1",
"senha":"123456",
"cpf":"12345678999",
"email":"vieira@gmail.com.com",
"telefone_celular":"42991023310",
"data_nascimento":"2022-12-05",
"nome_mae":"Garona"
}
{
"nome":"Alexandre02",
"usuario":"@alex2",
"senha":"123456",
"cpf":"12345678910",
"email":"souza@gmail.com.com",
"telefone_celular":"42991023310",
"data_nascimento":"2022-12-10",
"nome_mae":"Garona"
}
{
"nome":"Alexandre03",
"usuario":"@alex3",
"senha":"123456",
"cpf":"1234567830",
"email":"teste@gmail.com.com",
"telefone_celular":"429910233101",
"data_nascimento":"2022-12-25",
"nome_mae":"Garona"
}

{
"nome":"Alexandre04",
"usuario":"@alex4",
"senha":"123456",
"cpf":"12345678950",
"email":"utfpr@gmail.com.com",
"telefone_celular":"42991023310",
"data_nascimento":"2022-12-13",
"nome_mae":"Garona"
}

{
"nome":"Alexandre05",
"usuario":"@alex5",
"senha":"123456",
"cpf":"12345678970",
"email":"utfpr2022@gmail.com.com",
"telefone_celular":"42991023310",
"data_nascimento":"2022-12-12",
"nome_mae":"Garona"
}

BUSCAR TODOS OS USUÁRIOS PELO CPF
GET http://127.0.0.1:8000/api/users/12345678999


BUSCAR TODOS OS USUÁRIOS
GET http://127.0.0.1:8000/api/users

CADASTRAR UMA CONTA
POST http://127.0.0.1:8000/api/billing
COM USUÁRIO INEXISTENTE
{  
"nome":"Alexandre",
"usuario":"@alex13",
"senha":"123457",
"cpf":"99945678955",
"email":"pain.veira@hotmail.com",
"telefone_celular":"42991023310",
"data_nascimento":"2022-05-22",
"nome_mae":"Garona",

"conta":"Fatura cartão de crédito",
"valor":300.25,
"tipo":"Fixa"
}

CADASTRAR CONTA COM USUÁRIO JÁ CADASTRADO
POST http://127.0.0.1:8000/api/billing
{
    " id":1,
    "conta":"Fatura cartão de crédito",
    "valor":300.25,
    "tipo":"Fixa"
}


BUSCAR CONTAS DE UM USUÁRIO, BUSCA POR CPF
GET  http://127.0.0.1:8000/api/billingclient/12345678999

BUSCAR UMA CONTA ESPECÍFICA
GET http://127.0.0.1:8000/api/billing/2


ALTERAR USUÁRIO
PUT http://127.0.0.1:8000/api/users
{
   "id":1,
   "nome":"Alexandre Vieira",
   "cpf":"12345678910",
   "email":"pain.vieira@ig.com",
   "telefone_celular":"42991023310",
   "data_nascimento":"2022-05-22",
   "nome_mae":"Garona"
}

ALTERAR UMA CONTA
PUT http://127.0.0.1:8000/api/billing
{	
"id":1,	
"conta":"conta de qualquer COISA",
"valor":100.25,
"tipo":"Fixa"
}

DELETAR UM USUÁRIO
DELETE   http://127.0.0.1:8000/api/users/2

DELETAR UMA CONTA 
DELETE http://127.0.0.1:8000/api/billing

