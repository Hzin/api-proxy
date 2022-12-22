## Instalação
  ### Requisitos
    - Docker >= 17.12
  
  ### Passo a passo
    1. Iniciar o docker na sua máquina
    2. Rodar o comando: docker-compose up -d nginx postgres
    3. Após isso a api estará rodando na porta 3334, caso precise mudar essa porta
      entre no arquivo \api-proxy\laradock\.env
      e altere para sua porta de preferência. OBS: Se essa porta for alterada, lembre-se
      de altera-lá também no projeto front-end.

## Extra
  - Comando para entrar no workspace onde está rodando o projeto em laravel:
    docker-compose exec --user=laradock workspace bash
