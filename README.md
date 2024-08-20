# Formulario Trabalhe Conosco

## Tecnologias Utilizadas

- Backend: PHP com Laravel
- Frontend: HTML, CSS, JavaScript (integrado com Blade para renderização no Laravel)
- Banco de Dados: MySQL, configurado em Docker containers

## Estrutura do Projeto

- **Docker Compose:** Define dois containers, um para o MySQL e outro para a aplicação Laravel.
- **Laravel:** Configurado para integrar com o Docker e o MySQL.

## Instruções para Configuração e Execução

1. **Construir e subir os containers:**

    ```bash
    docker-compose up --build
    ```

2. **Acessar a aplicação:**
   - Navegue até `http://localhost:8000/trabalhe-conosco` no seu navegador.

3. **Configuração Adicional:**
   - Certifique-se de que o arquivo `.env` está configurado corretamente para conectar ao banco de dados MySQL.

## Descrição Geral da Aplicação

A aplicação permite que os usuários enviem um formulário "Trabalhe Conosco" com os seguintes campos:
- Nome
- Email
- Telefone
- Resumo
- Descrição
- Upload de arquivo

Os dados são validados e armazenados no banco de dados MySQL, e o arquivo é salvo no diretório `storage`.

## Melhorias Futuras

- Implementar segurança adicional (proteção contra CSRF e validação de arquivos de upload).
- Adicionar uma interface de administração para gerenciar os dados recebidos.
