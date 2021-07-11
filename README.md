# Processo Seletivo da LigaMagic :computer:

Este software foi desenvolvido como proposta do processo seletivo oferecido pela LigaMagic, para a criação desse software utilizei meus conhecimentos sobre WebServices, dessa forma eu pude desenvolver uma API utilizando a linguagem de programação PHP, com a qual utilizei o paradigma de Orientação a Objetos, padrão de arquitetura MVC, padrão de projetos DAO para isolar o acesso ao banco de dados, biblioteca PDO para realizar a conexão com o banco de dados, por fim eu meu utilizei do sistema de rotas para fornecer os END-POINTS necessários para servir uma aplicação externa.

No lado do cliente, eu me utilizei das tecnologias HTML5 em conjunto com o Framework Bootstrap para a criação de um layout responsivo. Utilizando JavaScript e sua biblioteca jQuery, eu realizei a manipulação dos elementos na DOM e por meio do ajax, a aplicação é capaz de consumir a API oferecida pelo Back-End, fornecendo os dados ao usuário.

## Instalação :arrow_down:

- Para utilizar ambas as aplicações, é necessário primeiramente possuir instalado um servidor web, PHP 7 ou mais atual e um servidor de banco de dados MySQL.
- Após realizar o clone do projeto, você precisa importar o banco de dados que se encontra na raiz da API.
- Modificar o arquivo /API/config.php conforme o seu banco de dados para realizar o acesso corretamente.
- Você pode inicializar as aplicações a partir da raiz de cada uma com a ajuda do composer, um gerenciador de pacotes do PHP.

```bash
composer start
```

- Após esses procedimentos, acesse o Browser por meio do link abaixo:
[Clique Aqui](http://localhost:5500)

## Autor

André Moura

## License
[MIT](https://choosealicense.com/licenses/mit/)