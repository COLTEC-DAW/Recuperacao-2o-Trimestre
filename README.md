# Arquivos Relevantes ao Trabalho

## Controladores

Os controladores estão dentro da pasta app/http/controllers. Os dois controladores, ObrasController e UsuarioController, possuem contratos diferentes com as models existentes no trabalho.


* **ObrasController** se comunica com a model **obra**.

* **UsuarioController** se comunica com a model **cadastro**.

## Models

As models estão dentro da pasta app, são os dois útimos arquivos, **cadastro.php** e **obra.php**. Essas models estão relacionadas com as representações das tabelas manipuladas, essas representações são as migrations **2018_09_20_232516_create_cadastros_table** e **2018_09_28_212707_create_obras_table**, contidas na pasta database/migrations. 

## Migrations

Já mencionadas acima, são elas que são responsáveis pela manipulação direta das tabelas as quais correspondem no banco de dados.

## Herokuapp

O trabalho foi feito com a integração entre **Laravel** e a plataforma **Herokuapp**. Por padrão a plataforma já define o diretório root como principal, no entanto o Laravel trabalho com o diretório *public* como principal, a reconfiguração desse aspecto é feita no arquivo *Procfile*.
Além dessa alteração foi nessessário a configuração da chave do projeto,
o código da chave está contida no arquivo **.env.example**.

## ClearDB

Foi o banco de dados utilizado pra guardar os registros das tabelas.

## Mapa de Commits

