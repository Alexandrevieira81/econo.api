<h1 align="left">Alexandre de Souza Vieira<br>Henrick Santiago</h1>

###

<p align="left">Ao baixar o projeto, deve-se rodar o comando 'composer install' para a instalação de todas as dependências</p>

###

<h2 align="left">Banco de dados 🎲</h2>

###

<p align="left">• Criar um banco no postgresql com o nome de econo.me.api<br>• Alterar nome do arquivo '.env.example' para '.env' (para as configs serem lidas)<br>• Alterar em '.env' os atributos: <br>       DB_USERNAME=seu-usuário <br>       DB_PASSWORD=sua-senha<br>• Rodar o comando 'php artisan migrate' para criar as tabelas do BD</p>

###

<h2 align="left">Rodar API 💨</h2>

###

<p align="left">• Rodar o comando 'php artisan serve'</p>

###

<h2 align="left">Testes 🤖</h2>

###

<p align="left">CADASTRO DE USUÁRIO<br>• METHOD: POST<br>• URL: http://127.0.0.1:8000/api/users/ <br>• BODY: <br>{<br>   "nome":"Alexandre01",<br>   "usuario":"@alex1",<br>   "senha":"123456",<br>   "cpf":"12345678999",<br>   "email":"vieira@gmail.com.com",<br>   "telefone_celular":"42991023310",<br>   "data_nascimento":"2022-12-05",<br>   "nome_mae":"Garona"<br>}<br>-----------------------------------------------<br>{<br>   "nome":"Alexandre02",<br>   "usuario":"@alex2",<br>   "senha":"123456",<br>   "cpf":"12345678910",<br>   "email":"souza@gmail.com.com",<br>   "telefone_celular":"42991023310",<br>   "data_nascimento":"2022-12-10",<br>   "nome_mae":"Garona"<br>}<br>-----------------------------------------------<br>INVÁLIDO - TELEFONE E CPF<br>{<br>   "nome":"Alexandre03",<br>   "usuario":"@alex3",<br>   "senha":"123456",<br>   "cpf":"1234567830",<br>   "email":"teste@gmail.com.com",<br>   "telefone_celular":"429910233101",<br>   "data_nascimento":"2022-12-25",<br>   "nome_mae":"Garona"<br>}<br>-----------------------------------------------</p>

###

<p align="left">BUSCAR USUÁRIO POR CPF<br>• METHOD: GET<br>• URL: http://127.0.0.1:8000/api/users/12345678999</p>

###

<p align="left">BUSCAR TODOS OS USUÁRIOS<br>• METHOD: GET<br>• URL: http://127.0.0.1:8000/api/users/</p>

###

<p align="left">CADASTRAR UMA CONTA COM USUÁRIO INEXISTENTE<br>• METHOD: POST<br>• URL: http://127.0.0.1:8000/api/billing<br>• BODY: <br>{<br>   "nome":"Alexandre",<br>   "usuario":"@alex13",<br>   "senha":"123457",<br>   "cpf":"99945678955",<br>   "email":"pain.veira@hotmail.com",<br>   "telefone_celular":"42991023310",<br>   "data_nascimento":"2022-05-22",<br>   "nome_mae":"Garona",<br>   "conta":"Fatura cartão de crédito",<br>   "valor":300.25,<br>   "tipo":"Fixa"<br>}</p>

###

<p align="left">CADASTRAR UMA CONTA COM USUÁRIO EXISTENTE<br>• METHOD: POST<br>• URL: http://127.0.0.1:8000/api/billing<br>• BODY: <br>{<br>   "id":1,<br>   "conta":"Fatura cartão de crédito",<br>   "valor":300.25,<br>   "tipo":"Fixa"<br>}</p>

###

<p align="left">BUSCAR CONTAS POR CPF<br>• METHOD: GET<br>• URL: http://127.0.0.1:8000/api/billingclient/12345678999</p>

###

<p align="left">ALTERAR USUÁRIO EXISTENTE<br>• METHOD: PUT<br>• URL: http://127.0.0.1:8000/api/users<br>• BODY: <br>{<br>   "id":1,<br>   "nome":"Alexandre Vieira",<br>   "cpf":"12345678910",<br>   "email":"pain.vieira@ig.com",<br>   "telefone_celular":"42991023310",<br>   "data_nascimento":"2022-05-22",<br>   "nome_mae":"Garona"<br>}</p>

###

<p align="left">ALTERAR CONTA EXISTENTE<br>• METHOD: PUT<br>• URL: http://127.0.0.1:8000/api/billing<br>• BODY: <br>{<br>   "id":1,<br>   "conta":"conta de qualquer COISA",<br>   "valor":100.25,<br>   "tipo":"Fixa"<br>}</p>

###

<p align="left">DELETAR USUÁRIO<br>• METHOD: DELETE<br>• URL: http://127.0.0.1:8000/api/users/2</p>

###

<p align="left">DELETAR CONTA<br>• METHOD: DELETE<br>• URL: http://127.0.0.1:8000/api/billing/1</p>

###

<h2 align="left">Feito em:</h2>

###

<div align="left">
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/vscode/vscode-original.svg" height="40" width="52" alt="vscode logo"  />
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/composer/composer-original.svg" height="40" width="52" alt="composer logo"  />
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg" height="40" width="52" alt="php logo"  />
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/laravel/laravel-plain.svg" height="40" width="52" alt="laravel logo"  />
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/postgresql/postgresql-original.svg" height="40" width="52" alt="postgresql logo"  />
</div>

###
