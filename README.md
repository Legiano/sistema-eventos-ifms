# 📦 Sistema de Eventos IFMS

![Laravel](https://img.shields.io/badge/Laravel-10-red)
![PHP](https://img.shields.io/badge/PHP-8.x-blue)
![MySQL](https://img.shields.io/badge/MySQL-Database-orange)
![Status](https://img.shields.io/badge/Status-Concluído-success)
![License](https://img.shields.io/badge/License-Acadêmico-lightgrey)

Sistema web desenvolvido em **Laravel** para gerenciamento de eventos do **Instituto Federal de Mato Grosso do Sul (IFMS) – Campus Coxim**.

O projeto foi desenvolvido durante o curso de **Tecnologia em Sistemas para Internet (TSI)** com o objetivo de aplicar conceitos de desenvolvimento web utilizando a arquitetura **MVC (Model-View-Controller)**, autenticação de usuários, operações CRUD e integração com banco de dados.

---

## 📖 Sobre o Projeto

O Sistema de Eventos IFMS foi desenvolvido para facilitar o gerenciamento de eventos acadêmicos, permitindo o cadastro, organização e administração das informações por meio de uma interface web intuitiva.

Durante o desenvolvimento foram aplicados conceitos importantes do framework Laravel, como:

- Arquitetura MVC
- Rotas
- Controllers
- Models
- Blade Templates
- Middleware
- Validação de Formulários
- Eloquent ORM
- Autenticação de Usuários

---

## ✨ Funcionalidades

- 🔐 Cadastro e autenticação de usuários
- 👤 Login e Logout
- 📝 Cadastro de eventos
- ✏️ Edição de eventos
- 🗑️ Exclusão de eventos
- 📋 Listagem de eventos
- 🔒 Rotas protegidas por autenticação
- ✅ Validação de formulários
- 💾 Persistência de dados utilizando MySQL

---

## 🛠 Tecnologias Utilizadas

- PHP 8.x
- Laravel 10.x
- MySQL
- Composer
- Blade
- HTML5
- CSS3
- Bootstrap
- JavaScript
---

## 📂 Estrutura do Projeto

app/
bootstrap/
config/
database/
public/
resources/
routes/
storage/
tests/

---

## 🚀 Como Executar o Projeto

### 1. Clone o repositório
```bash
git clone https://github.com/Legiano/sistema-eventos-ifms.git
cd sistema-eventos-ifms
```

### 2. Instale as dependências
```bash
composer install
```

### 3. Configure o ambiente
Copie o arquivo `.env.example` para `.env`
```bash
cp .env.example .env
```

Depois gere a chave da aplicação:
```bash
php artisan key:generate
```

---

### 4. Configure o banco de dados
Edite o arquivo `.env` e configure as informações do seu banco de dados:
```env
DB_DATABASE=nome_do_banco
DB_USERNAME=usuario
DB_PASSWORD=senha
```

---

### 5. Execute as migrations
```bash
php artisan migrate
```

---

### 6. Inicie o servidor
```bash
php artisan serve
```

O sistema ficará disponível em:
http://127.0.0.1:8000

---

## 📸 Demonstração

*(em breve)*

Adicione aqui imagens do sistema.
Exemplo:
docs/
home.png
login.png
dashboard.png

Depois basta inserir:
```markdown
![Tela Inicial](docs/home.png)
![Login](docs/login.png)
![Dashboard](docs/dashboard.png)
```

---

## 🎓 Contexto Acadêmico

Projeto desenvolvido durante o curso de **Tecnologia em Sistemas para Internet (TSI)** do **Instituto Federal de Mato Grosso do Sul (IFMS) – Campus Coxim**, com o objetivo de aplicar na prática os conhecimentos adquiridos nas disciplinas de desenvolvimento web utilizando o framework Laravel.

---

## 📄 Licença

Este projeto foi desenvolvido para fins acadêmicos.

---

## 📂 Estrutura do Projeto
