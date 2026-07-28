<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# 📦 Sistema de Eventos IFMS

Sistema desenvolvido em **Laravel**, para gestão de eventos do IFMS - Campus Coxim, utilizando o padrão MVC e as melhores práticas do framework.

## 🚀 Funcionalidades

- ✅ Cadastro e autenticação de usuários  
- ✅ CRUD completo de recursos  
- ✅ Rotas protegidas por autenticação  
- ✅ Validação de formulários  
- ✅ Integração com banco de dados via Eloquent ORM  

## 🛠️ Tecnologias Utilizadas

- PHP 8.x  
- Laravel 10.x  
- MySQL  
- Composer  
- Blade Templating  

## ▶️ Como Executar o Projeto

1. Clone o repositório:  
```bash
   git clone https://github.com/Legiano/sistema-eventos-ifms.git
   cd sistema-eventos-ifms
```

2. Instale as dependências:  
```bash
   composer install
```

3. Copie o arquivo de ambiente e gere a chave da aplicação:  
```bash
   cp .env.example .env
   php artisan key:generate
```

4. Configure o banco de dados no `.env` e rode as migrations:  
```bash
   php artisan migrate
```

5. Suba o servidor:  
```bash
   php artisan serve
```

## 🎓 Contexto acadêmico

Projeto desenvolvido no âmbito do curso de Tecnologia em Sistemas para Internet (TSI) do IFMS - Campus Coxim.

   php artisan serve
```
