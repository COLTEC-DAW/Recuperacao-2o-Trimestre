# Desenvolvimento de Aplicações Web

**Data de Apresentação: 07/10/2022**

**Valor: 35 pontos**

**Trabalho a ser desenvolvido em dupla**

## Recuperação 2o Trimestre

Neste trabalho de recuperação, você deverá utilizar os conhecimentos adquiridos no tópico de PHP para desenvolver um protótipo de um sistema de informação.
A equipe poderá escolher um dos seguintes tópicos como tema de implementação do sistema:

- Lista de desejos, onde o usuário cadastraria e visualizaria uma lista de itens que ele deseja ganhar/comprar
- Sistema Acadêmico, onde o aluno cadastraria as disciplinas junto das notas que ele obteve
- Histórico de viagens, onde o usuário armazenaria uma lista de locais para onde ele viajou
- Divisor de contas de restaurantes, o sistema calcula---com base no valor e número de pessoas---o valor de uma conta cadastrada no sistema, por pessoa
- Diário, onde o usuário registra seus pensamentos e reflexões ao longo do dia
- Livros e filmes favoritos, onde o usuário armazena uma lista de filmes e livros dos quais ele mais gostou de ler/assistir
- Ficha de academia, onde o usuário cadastra uma lista com os exercícios a serem realizados em uma academia
- Aplicativo de receitas, onde são armazenados as receitas culináreas do usuário
- Rastreador de investimentos, onde o usuário cadastraria a lista de ativos que ele tem comprado/investido no momento
- Histórico de vacinação, onde se cadastraria para um determinado usuário as vacinas que ele já tomou
- colinha da eleição, onde o usuário cadastra para uma determinada eleição os números de seus candidatos
- Greengo dictionary, um dicionário com gírias em outras línguas e seu significado em português
- Palpites da Mega, um sistema que armazenaria os palpites que um usuário fez para seus jogos da mega sena

Independente do tema, a equipe deverá implementar as seguintes funcionalidades:

1. Cadastro e login de usuários no sistema
1. Cadastro de novos itens do sistema
1. Exibição dos itens do sistema

Você pode verificar em mais detalhes cada uma das funcionalidades abaixo.

### Cadastro e login de usuários

Para o cadastro de usuário, deverão ser fornecidos pelos menos os seguintes atributos:

- Nome
- Login
- Senha
- Email

O armazenamento do cadastro deverá ser feito em arquivo.

Já para o login, ele deverá ser feito através dos campos `login` e `senha` cadastrados anteriormente.
A manutenção do login deverá ser feito por meio de sessão, sendo destruída toda vez que o usuário realizar um logout do sistema.

### Cadastro de novos itens

O usuário---uma vez logado---poderá realizar o cadastro de novos itens por meio de um formulário.
Esse formulário deverá implementar mecanismos básicos de validação (tipo dos campos, formatação, etc.).

Em relação ao item a ser cadastrado, ele deverá ter pelo menos cinco atributos a serem definidos pela equipe de desenvolvimento, e deverão estar necessariamente atrelados ao usuário que os cadastrou.
Os itens também deverão ser cadastrados em arquivo para posterior exibição.

### Exibição dos itens do sistema

Assim que fizer o login, o usuário ser redirecionado a tela de exibição.
Esta tela deverá exibir todos os itens cadastrados pelo usuário em formato tabular, onde cada linha apresentará todos os atributos do item cadastrado.
Por fim, deverá ser implementado uma barra de pesquisa no topo desta página.
Essa barra deverá realizar a pesquisa com base em um dos atributos do item do sistema.

## Entrega

A apresentação do trabalho ocorrerá no dia **07/10/2022**, por meio de uma apresentação no laboratório amarelo.
**OBS: O código quanto e apresentação serão levados em consideração no momento da avaliação!**

## Pilha de Tecnologias

Você estará livre para utilizar as bibliotecas e frameworks que considerar necessários. 
O uso de tais recursos inclusive é incentivado!!
**Porém, é fundamental que a equipe saiba explicar o que essa ferramenta faz no sistema, pra que ela serve, e como ela funciona!!**
Além disso, desenvolvimento do trabalho **deve** englobar os seguintes conceitos:

* HTML
* PHP: Classes, funções, etc.
* PHP: Sessões/Cookies
* PHP: Arquivos