# BSIS - Sistema de Gestão de Montagens, Assistências e Fechamentos

> 🎓 **Projeto de Estudo e Aprendizado**  
> Este projeto foi desenvolvido com o objetivo de estudo prático, aplicando conceitos de arquitetura Web moderna, padrão MVC, ORM Eloquent, Blade Templates e boas práticas com o framework **Laravel 12**, a partir da recriação/modernização de um sistema legado.

---

## 📌 Sobre o Projeto

O **BSIS** é um sistema para gerenciamento operacional e financeiro de serviços de montagem de móveis e assistências técnicas. Ele permite controlar desde o cadastro de produtos, clientes, montadores e lojas, até o ciclo completo de emissão de Ordens de Montagem, solicitações de Assistência Técnica e geração de Fechamentos Financeiros periódicos.

---

## 🚀 Funcionalidades Principais

- 📊 **Dashboard Analítico**: Visão geral de métricas do sistema, ordens ativas, assistências e fechamentos.
- 🏬 **Gestão de Lojas**: Cadastro e controle das lojas contratantes.
- 👥 **Gestão de Clientes**: Registro completo de clientes com busca e histórico.
- 🛠️ **Gestão de Montadores**: Controle dos profissionais responsáveis pela montagem.
- 📦 **Controle de Produtos**: Cadastro de produtos com código, descrição e controle de saldo de estoque.
- 📋 **Ordens de Montagem (O.M.)**:
  - Emissão de novas ordens associadas a clientes, lojas e montadores.
  - Seleção dinâmica de itens e cálculo automático de valores.
  - Controle de status (Pendente, Em Andamento, Concluída, Cancelada).
  - Impressão otimizada para comprovantes/vias de montagem.
- 🔧 **Ordens de Assistência Técnica**:
  - Registro de chamados de assistência técnica pós-venda/montagem.
  - Acompanhamento de solução de divergências.
- 💰 **Fechamentos Financeiros**:
  - Agrupamento de ordens concluídas por período e montador.
  - Cálculo de totais e comissões para acerto financeiro.
  - Relatório impresso de fechamento.

---

## 🛠️ Tecnologias Utilizadas

- **Linguagem**: [PHP 8.2+](https://www.php.net/)
- **Framework Web**: [Laravel 12](https://laravel.com/)
- **Camada de Visão**: Blade Templates com HTML5, CSS3 / Tailwind CSS
- **Banco de Dados**: SQLite / MySQL
- **Gerenciador de Dependências**: [Composer](https://getcomposer.org/)

---

## 💻 Como Executar o Projeto Localmente

### Pré-requisitos
- PHP >= 8.2
- Composer
- Node.js & NPM (opcional, para compilação de assets frontend)

### Passo a Passo

1. **Clonar o repositório:**
   ```bash
   git clone https://github.com/hildanilo/bsis-v1.0.0.git
   cd bsis-v1.0.0
   ```

2. **Instalar as dependências do PHP:**
   ```bash
   composer install
   ```

3. **Configurar as variáveis de ambiente:**
   ```bash
   cp .env.example .env
   ```

4. **Gerar a chave da aplicação:**
   ```bash
   php artisan key:generate
   ```

5. **Executar as migrações do banco de dados (com dados iniciais de teste):**
   ```bash
   php artisan migrate --seed
   ```

6. **Iniciar o servidor local de desenvolvimento:**
   ```bash
   php artisan serve
   ```

7. **Acessar no navegador:**
   Navegue até `http://localhost:8000` para utilizar o sistema.

---

## 📄 Licença e Aviso Legal

Este repositório possui fins estritamente **educacionais e de estudo**. Sinta-se à vontade para explorar a estrutura de código, clonar e utilizar como referência de estudos em Laravel!
