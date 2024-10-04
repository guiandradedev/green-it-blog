# Green IT Blog

## Descrição do projeto 

Este repositório contém o código-fonte do projeto **Blog TI Verde**, desenvolvido como parte da disciplina **Desenvolvimento Sustentável na Engenharia** do quarto semestre do curso de **Engenharia da Computação** na **PUC-Campinas**. O projeto visa aprofundar os conceitos de desenvolvimento de sistemas web a partir da realização de um blog a respeito do tema **TI Verde**, conteúdo da disciplina.

## Funcionalidades
<ul>
    <li>Realização de postagens ❌</li>
    <li>Comentários ❌</li>
    <li>Login social ❌</li>
    <li>Entre outros...</li>
</ul>

## Como rodar


### Clonar repositório do Github
*Pelo site do github:*
```
https://github.com/guiandradedev/green-it-blog.git
```
```sh
cd sistema-administrativo/
```


Crie o Arquivo .env
```sh
cp .env.example .env
```

Atualize as variáveis de ambiente do arquivo .env
```dosini
APP_URL=http://localhost:8989
GOOGLE_CLIENT_ID=""
GOOGLE_CLIENT_SECRET=""
GOOGLE_REDIRECT=http://127.0.0.1:8000/auth/google/callback
```

Instalar as dependências PHP do projeto
```sh
composer install
```

Configure o sail
```sh
code ~/.bashrc
alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'
source ~/.bashrc
```

> O código acima cadastra um "apelido" no terminal para reduzir os comandos a serem executados no container do laravel


<br>

Suba os containers do projeto
```sh
sail up -d --build
```
ou caso não tenha aplicado o alias
```sh
./vendor/bin/sail up -d --build
```


Gerar a key do projeto Laravel
```sh
sail artisan key:generate
```

Executar as migrations
```sh
sail artisan migrate
```

Inicializar os valores base no banco de dados
```sh
sail artisan db:seed
```

Fora do terminal docker, executar
```sh
npm install
npm run dev
```

Em um terceiro terminal, executar
```sh
sail artisan serve
```

Caso as imagens iniciais não renderizem, tente dentro do docker: 
```sh
sail artisan storage:link
```

Acessar o projeto
<!-- [http://localhost:8080](http://localhost:8080) -->