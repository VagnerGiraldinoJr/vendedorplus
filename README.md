# 📦 **VendedorPlus** - Sistema de Vendas Online 🛒

**VendedorPlus** é um sistema de vendas online destinado a empreendedores que comercializam produtos porta a porta. O projeto é construído com Laravel e oferece funcionalidades tanto para clientes quanto para administradores. Ele inclui o gerenciamento de produtos, pedidos, clientes, e um painel administrativo completo.

---

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


## 🔧 **Tecnologias Utilizadas** 🛠️

- **Laravel** (8.x ou superior) 🚀
  - Framework PHP robusto para construção de aplicações web.
- **PHP** (versão 8.0 ou superior) 💻
  - Ambiente de execução necessário para rodar o Laravel.
- **Vite** ⚡️
  - Ferramenta moderna para build e bundling de assets, utilizada para otimizar o carregamento e performance.
- **AdminLTE** 📊
  - Interface de administração responsiva e intuitiva, baseada em Bootstrap.
- **MySQL** 🗄️
  - Banco de dados relacional utilizado para armazenar os dados da aplicação.

---

## ⚙️ **Configuração do Ambiente de Desenvolvimento** 🔧

1. **Instalar Dependências**:
   - Clone o repositório:
     ```bash
     git clone https://github.com/VagnerGiraldinoJr/vendedorplus.git
     ```
   - Navegue até o diretório do projeto:
     ```bash
     cd vendedorplus
     ```
   - Instale as dependências do Composer:
     ```bash
     composer install
     ```
   - Instale as dependências do Vite:
     ```bash
     npm install
     ```

2. **Configurar o Ambiente**:
   - Copie o arquivo `.env.example` para `.env`:
     ```bash
     cp .env.example .env
     ```
   - No arquivo `.env`, configure o acesso ao banco de dados, as chaves de autenticação e as configurações de e-mail.

3. **Gerar as Chaves de Aplicação**:
   - Execute o comando abaixo para gerar a chave de aplicação do Laravel:
     ```bash
     php artisan key:generate
     ```

4. **Rodar as Migrations**:
   - Crie o banco de dados e execute as migrations:
     ```bash
     php artisan migrate
     ```

5. **Rodar o Servidor Local**:
   - Inicie o servidor de desenvolvimento:
     ```bash
     php artisan serve
     ```
   - Acesse a aplicação em: `http://127.0.0.1:8000`

---

## 🌍 **Funcionalidades** 🚀

- **Clientes**:
  - Navegação pelos produtos disponíveis 🛍️
  - Visualização detalhada de produtos 📦
  - Cadastro e login de clientes 🔑
  - Realização de pedidos 📝
  
- **Administradores**:
  - Acesso ao painel administrativo 🖥️
  - Gestão de produtos, clientes e pedidos 📊
  - Visibilidade de pedidos pendentes e detalhes de vendas 📈

---

## 🛠️ **Rotas Importantes** 🚦

- **Público**:
  - `/` - Página inicial com destaque para produtos.
  - `/shop` - Exibe todos os produtos.
  - `/product/{id}` - Exibe o detalhe de um produto.

- **Autenticação**:
  - `/login` - Tela de login.
  - `/register` - Tela de registro.
  - `/logout` - Rota para realizar logout.

- **Painel Administrativo**:
  - `/admin/dashboard` - Dashboard com informações e estatísticas.
  - `/admin/products` - Gestão de produtos.
  - `/admin/clients` - Gestão de clientes.
  - `/admin/orders` - Visualização e gerenciamento de pedidos.

---

## ⚡ **Próximos Passos** 📈

- **Melhorias na UI**: Refinar a interface para tornar o painel administrativo mais funcional e intuitivo.
- **Aprimorar o Sistema de Pedidos**: Adicionar funcionalidades de pagamentos e confirmações de pedidos.
- **Aprimorar as Funções de Administração**: Incluir mais recursos no painel para facilitar o gerenciamento de vendas e clientes.

---

## 🎨 **Contribuições** 🙌

- Faça um fork do repositório, crie uma branch com a sua feature/bugfix, e envie um PR (Pull Request).
- Dúvidas? Pergunte nas Issues do GitHub!

---

 **VendedorPlus**

---
Vagner Giraldino Jr.
🚀🚀🚀🚀🚀🚀🚀🚀🚀
https://pt.gravatar.com/vgiraldino
