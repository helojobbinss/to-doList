# Projeto To-Do List PHP com Docker

## Descriçaõ
Projeto simples em PHP de lista de tarefas criada para estudo rodando dentro de um container docker

## Requisitos
- Docker
- Docker Compose

## Setup

1. Copie `.env.example` para `.env` e atualize as credenciais do banco de dados caso seja necessário

2. Construa e inicie o container:
```bash
docker-compose up --build
```

3. Acesse a aplicação em `http://localhost:8080`

## Database

- O banco de dados MySQL é inicializado utilizando as credencias presentes no arquivo `.env`.

## Notas

- A conexão com o banco de dados utiliza variáveis de ambiente para as credenciais.

## License

MIT License
