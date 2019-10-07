# Laravel-sistema-de-controle-de-produtos

![php-image]
![l-image]



### Sobre

*Sistema de cadastro de produtos, usuários (vendedores) e controle de venda.*

### Instalação

1. Clone repositório

2. Mude para o diretório

3. Instalar dependências 
```
composer install
```
4. Update do composer
```
composer update
```
5. Renomei o arquivo .env.exemple para .env

6. Gerando a chave para a aplicação
```
php artisan key:generate
```
7. Subir servidor
```
php artisan serve
```






#### Erro

Se ocorrer o erro:
```
[Tue Oct  1 15:38:53 2019] PHP Fatal error:  Unknown: Failed opening required 'C:\Users\Evelym\Documents\Milena-2019\LARAVEL-minhas aplicacoes\controle-serie-site-alura\server.php' (include_path='.;C:\php\pear') in Unknown on line 0
```
Crie um arquivo server.php com o seguinte conteúdo:
```
<?php
/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */
$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);
// This file allows us to emulate Apache's "mod_rewrite" functionality from the
// built-in PHP web server. This provides a convenient way to test a Laravel
// application without having installed a "real" web server software here.
if ($uri !== '/' && file_exists(__DIR__.'/public'.$uri)) {
    return false;
}
require_once __DIR__.'/public/index.php';
```

[php-image]:https://img.shields.io/badge/php-v7.3.8-blue

[l-image]:https://img.shields.io/badge/laravel-v5.8.*-orange




