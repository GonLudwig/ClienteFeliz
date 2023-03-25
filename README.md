# Projeto Cliente Feliz

## Sobre

Este projeto teve como intuito testar um pouco dos meus conhecimentos de laravel com a utilização de Ajax na renderização de dados e DataTable para exibição dos dados.

### Pré-requisito

Será necessário somente a instalação do [docker](https://docs.docker.com/engine/install/ubuntu/) e [docker compose](https://docs.docker.com/compose/install/)

### Instalação
Adicione a url personalizada no arquivo "hosts" da sua maquina
```
127.0.0.1       backend.com.br
```
Criar os arquivos .env
```
cp .env.example .env
```
Gostaria de reforçar que para o funcionamento do projeto as variáveis com prefixo mail são importantes para todo sistema de autenticação
```
cp ./app/.env.example ./app/.env
```
Instalação dos pacotes do composer
```
docker-compose run --rm laravel php composer.phar install
```
Criação da key do laravel
```
docker-compose run --rm laravel php artisan key:generate
```
Criação do banco de dados
```
docker-compose run --rm laravel php artisan migrate
```
Subir todas os serviços
```
docker-compose up
```
E pronto e só acessar [backend](http://backend.com.br) para utilização do sistema