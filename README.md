# Projeto Laravel Framework 11.20.0

Este projeto utiliza o Laravel Framework 11.20.0 para construir uma aplicação web. Siga as instruções abaixo para configurar e executar o projeto localmente.

## Requisitos

* PHP 8.2 ou superior
* MySQL 8 ou superior
* Composer

## Como rodar o projeto baixado

Duplicar o arquivo ".env.example" e renomear para ".env".<br>
Alterar no arquivo .env as credenciais do banco de dados<br>

Instalar as dependências do PHP
```
composer install
```

Gerar a chave no arquivo .env
```
php artisan key:generate
```

Executar as migration
```
php artisan migrate
```

Executar as seed
```
php artisan db:seed --class=UserSeeder
php artisan db:seed --class=MedicoSeeder
...

Iniciar o projeto criado com Laravel
```
php artisan serve
...