<h1> Store-Laravel</h1>
<p align="justify">Bem-vindo ao repositório do Store-Laravel! Este projeto foi desenvolvido como parte de um curso de aprendizagem do Laravel, utilizando a versão 7.x do framework PHP (versão 7.2). Aqui você encontrará um sistema quase completo de mostruário de roupas, com recursos como criação de conta, login, adição, edição e remoção de produtos, além da opção de sair da conta.</p>
<div id="sumario">
    <h1>Sumário</h1>
	<ul>
		<li>
            <a href="#prerequisitos"> <b>Pré-requisitos</b> </a> 
        </li>
        <li>
            <a href="#instalacao"> <b>Instalação</b> </a> 
        </li>
        <li>
            <a href="#funcionalidades"> <b>Funcionalidades</b> </a> 
        </li>
		<li>
            <a href="#referencias"> <b>Referências</b> </a> 
        </li>
	</ul>	
</div>

<h2 id="prerequisitos"> Pré-requisitos </h2>
Certifique-se de que seu ambiente atenda aos seguintes requisitos antes de iniciar:

Antes de começar, você vai precisar ter instalado em sua máquina as seguintes ferramentas:
[Git](https://git-scm.com), [Laravel](https://laravel.com/docs/7.x/installation), [Composer](https://getcomposer.org/download), [PHP](https://www.php.net/downloads), versão > 7 e [SQLite3](https://www.sqlite.org/download.html). 
Além disto é bom ter um editor para trabalhar com o código como [VSCode](https://code.visualstudio.com/).

<h2 id="instalacao">🎲 Instalação</h2>

```bash

#Configuração do php.ini - (Remova o /;/):
    # ;extension=pdo_sqlite 
    # ;extension=sqlite3
    # -- Isso para funcionar o migrate.

# Clone este repositório
$ git clone <https://github.com/danrleiaraujo/Store-Laravel>

# Acesse a pasta do projeto no terminal/cmd
$ cd Store-Laravel

# Instale as dependências utilizando o Composer:
$ composer install

# Configure o arquivo .env com as informações do banco de dados e outros parâmetros necessários.

#Crie uma chave:
$ php artisan key:generate

#Execute as migrações para criar as tabelas do banco de dados:
$ php artisan migrate

# Para rodar o bootstrap:
$ npm install ou npm i
$ npm run dev

# Inicie o servidor local
$ php artisan server

# O servidor inciará na porta:8000
$ Acesse <http://localhost:8000> em seu navegador para explorar a página web Store-Lavel.
```

<h2 id="funcionalidades">Funcionalidades</h2>
Após a instalação, você pode acessar as seguintes funcionalidades:

<ul>
    <li><b>Criação de Conta:</b></li> 
    Registre-se para obter uma conta no sistema.
    <li><b>Login:</b></li> 
    Faça login na sua conta.
    <li><b>Adição de Produto:</b></li> 
    Adicione novos produtos ao mostruário.
    <li><b>Edição de Produto:</b></li> Atualize as informações de produtos existentes.
    <li><b>Remoção de Produto:</b></li> Remova produtos do mostruário.
    <li><b>Sair da Conta:</b></li> Encerre a sessão da sua conta.
</ul>	

<div id="referencias"> 
	<h2>Referências</h2>
	<li align="justify">Documentação laravel 7x. Disponível em: https://laravel.com/docs/7.x. Acesso em: 16 jan. 2024.‌</li>
</div>