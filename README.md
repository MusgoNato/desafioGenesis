# Sistema de Controle de Viagens

Sistema desenvolvido em **Laravel** para gerenciamento de veículos, motoristas e viagens.

---

## Tecnologias Utilizadas

- PHP 8+
- Laravel 12+
- PostgreSQL 14+
- TailwindCSS / DaisyUI para interface
- Docker para ambiente de banco de dados

---

## Funcionalidades

### Veículos
- CRUD completo de veículos
- Campos:
  - Modelo
  - Ano
  - Data de aquisição
  - KMs rodados na aquisição
  - Renavam (único)
  - Placa (única, validação Mercosul antiga e atual)
- Validação para impedir que um veículo seja alocado em duas viagens em andamento ao mesmo tempo

### Motoristas
- CRUD completo de motoristas
- Campos:
  - Nome
  - Data de nascimento (mínimo 18 anos)
  - Número da CNH (única para cada motorista)
- Validação para impedir que motoristas estejam em duas viagens em andamento ao mesmo tempo

### Viagens
- CRUD completo de viagens
- Campos:
  - Nome da viagem
  - Veículo
  - Motoristas (um ou mais)
  - KM inicial
  - KM final (opcional para viagens em andamento)
  - Data e hora de início
  - Data e hora de fim (opcional para viagens em andamento)
- Validações:
  - Motoristas e veículos não podem estar em outra viagem em andamento
  - Permite criar viagens retroativas (com KM final e data final)
  - Garantia de consistência de KM inicial/final e datas

---

## Requisitos

- Docker (opcional, para banco de dados)
- Composer
- PHP 8+
- PostgreSQL 14+
- Node.js e npm (para assets do frontend)

---

## Instalação

1. Clone o repositório e acesse a pasta:

```bash
git clone https://github.com/MusgoNato/desafioGenesis.git
cd <desafioGenesis>
```

2. Instale as dependências PHP:

```bash
composer install
```

3. Instale dependências:

```bash
npm install
```

4. Configure o `.env`:

```bash
# Configure o arquivo .env para as mesmas credenciais do seu banco de dados (Neste caso o arquivo docker incluido no projeto) 
```

5. Execute as migrations caso deseje popular o banco com dados aleatórios:

```bash
php artisan db:seed
```

6. Inicialize o servidor Laravel:

```bash
composer run dev
```

---

## Rotas Principais

- `/` -> Home
- `/veiculos` → Listagem de veículos  
- `/veiculos/create` → Criar veículo  
- `/veiculos/{id}` → Detalhes do veículo  
- `/motoristas` → Listagem de motoristas  
- `/motoristas/create` → Criar motorista  
- `/motoristas/{id}` → Detalhes do motorista  
- `/viagens` → Listagem de viagens  
- `/viagens/create` → Criar viagem  
- `/viagens/{id}` → Detalhes da viagem

---

## Validações importantes

- **Veículos e motoristas** não podem ser alocados em viagens em andamento simultaneamente.
- **Viagens retroativas** (com data final e KM final preenchidos) podem usar qualquer motorista ou veículo.
- **Placa e Renavam** e **N° CNH** são únicos.
- Motoristas devem ter pelo menos **18 anos**.

---

## Observações
- Certifique-se de configurar corretamente o `.env` antes de rodar o projeto.

---

## Autor

- Desenvolvedor: [Hugo josue lema das neves]  
- GitHub: [https://github.com/MusgoNato]
