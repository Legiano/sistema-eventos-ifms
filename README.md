# 📦 Sistema de Eventos IFMS

Sistema web desenvolvido em **Laravel** para gestão de eventos do IFMS - Campus Coxim, permitindo o cadastro, organização e acompanhamento de eventos institucionais.

## 🚀 Funcionalidades

- ✅ Cadastro e autenticação de usuários
- ✅ CRUD completo de eventos
- ✅ Rotas protegidas por autenticação
- ✅ Validação de formulários
- ✅ Integração com banco de dados via Eloquent ORM

## 🛠️ Tecnologias Utilizadas

- PHP 8.x
- Laravel 10.x
- MySQL
- Composer
- Blade Templating
- Tailwind CSS + Vite

## ▶️ Como Executar o Projeto

```bash
# Clonar o repositório
git clone https://github.com/Legiano/sistema-eventos-ifms.git
cd sistema-eventos-ifms

# Instalar dependências PHP
composer install

# Instalar dependências JS
npm install

# Copiar o arquivo de ambiente
cp .env.example .env

# Gerar a chave da aplicação
php artisan key:generate

# Configurar o banco de dados no .env e rodar as migrations
php artisan migrate

# Rodar o servidor
php artisan serve
npm run dev
```

## 🎓 Contexto acadêmico

Projeto desenvolvido no âmbito do curso de Tecnologia em Sistemas para Internet (TSI) do IFMS - Campus Coxim.
