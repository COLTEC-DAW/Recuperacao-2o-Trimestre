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

[Início de Tudo]("https://github.com/IcaroColtec/Recuperacao-2o-Trimestre/commit/e589a19eb22532c1c5b5ed7d0e51724d81a2558d")

[Início da lógica de Login e Cadastro]("https://github.com/IcaroColtec/Recuperacao-2o-Trimestre/commit/c32cc3daceeb038aa6c7ebce0e7ec9ebec037b10")

[Definindo o Arquivo de Procfile do Herokuapp]("https://github.com/IcaroColtec/Recuperacao-2o-Trimestre/commit/9b1156bb57eec38115c625aa2e85ccc2a08482a4")

[Adicionando uma chave de projeto ao Laravel]("https://github.com/IcaroColtec/Recuperacao-2o-Trimestre/commit/466eaa3400c784d2df2c148c5b796a3df674f5b4")

[Alterando a lógica de login e cadastro]("https://github.com/IcaroColtec/Recuperacao-2o-Trimestre/commit/cd8fddec575b3e90d50228cbb5e08b4b7642d863")

[Adcionando a linha de comando do heroku]("https://github.com/IcaroColtec/Recuperacao-2o-Trimestre/commit/15a3421c1b201d8d501c5f52ec90704c2b14428e")

["Configurando a ClearDB"]("https://github.com/IcaroColtec/Recuperacao-2o-Trimestre/commit/ebfa58ad2470f60b1642ef603b9972e2f2150084")

["Validação de login e cadastro"]("https://github.com/IcaroColtec/Recuperacao-2o-Trimestre/commit/e04aafcdb25895a6d6800d02d7fd020fb1d0363c")

["Sistema de login atual"]("https://github.com/IcaroColtec/Recuperacao-2o-Trimestre/commit/543463c53f949c92b8be72b8b9b2ba4c4073462a")

["Mateus entrando na jogada ("Implementação do controller de obras e sua model")"]("https://github.com/IcaroColtec/Recuperacao-2o-Trimestre/commit/fdbcdc56654e1f43b65642a5d4f7a5d50c52c92f")

["Tentando usar cookies =/]("https://github.com/IcaroColtec/Recuperacao-2o-Trimestre/commit/303056538baca5c3b0e508564c0c1dca6895ce7f")

["Começando a estilizar a home"]("https://github.com/IcaroColtec/Recuperacao-2o-Trimestre/commit/1866ab3b23bc23896371a07b4faf53cd2a4c2954")

["Implementando a lógica de validação de campos à model de obras"]("https://github.com/IcaroColtec/Recuperacao-2o-Trimestre/commit/dcf4957273115208a63f676d4d3c7ab71792e8ac")

["Listando as obras na página home"]("https://github.com/IcaroColtec/Recuperacao-2o-Trimestre/commit/e2dc023c5165380b30957395a399e8bba47c527e")

["Implementando a aparência de card as obras HOME"]("https://github.com/IcaroColtec/Recuperacao-2o-Trimestre/commit/e2dc023c5165380b30957395a399e8bba47c527e")

["Implementando a aparência de card as obras Página de Resposta"]("https://github.com/IcaroColtec/Recuperacao-2o-Trimestre/commit/a106714a191c966fda261f11ba63c4414f064b97")

["O nascimento de uma barra de busca"]("https://github.com/IcaroColtec/Recuperacao-2o-Trimestre/commit/3f59bc02d9f0ab3136e9ec98d2950cd4882994bf")

["Nova aparência de tela de login"]("https://github.com/IcaroColtec/Recuperacao-2o-Trimestre/commit/87df86989add4214be69708397f8d90354c974b0")

["Estilizando a sidebar"]("https://github.com/IcaroColtec/Recuperacao-2o-Trimestre/commit/2d4dea38ef695ecf9c4f3415511921849e7622d8")

["Comentando o código pt-1"]("https://github.com/IcaroColtec/Recuperacao-2o-Trimestre/commit/1a2300b458749267b71421e98d8a273fec004a64")

["Comentando o código pt-2"]("https://github.com/IcaroColtec/Recuperacao-2o-Trimestre/commit/06c333c4216ac34ac64e61a1a963b50a96a93fda")

["E no sétimo dia..."]("https://github.com/IcaroColtec/Recuperacao-2o-Trimestre/commit/e41e5dcfdacec3bee2a75f5c261c51662097d1a6")

**Dificilmente terá tudo ai, o restante está no diretório.**

