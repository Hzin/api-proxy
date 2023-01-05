## Instalação
  ### Requisitos
    - Docker >= 17.12
  
  ### Passo a passo
    1. Iniciar o docker na sua máquina
    2. Entrar na pasta laradock. Ex: cd laradock
    3. Rodar o comando: docker-compose up -d nginx postgres
    4. Após isso a api estará rodando na porta 3334, caso precise mudar essa porta
      entre no arquivo \api-proxy\laradock\.env
      e altere para sua porta de preferência. OBS: Se essa porta for alterada, lembre-se
      de altera-lá também no projeto front-end.
      
**Obs: Para rodar os comandos do docker você deve estar na pasta laradock, portanto lembre-se disso antes de tentar rodar os comandos acima.**

## Extra
  - Comando para entrar no workspace onde está rodando o projeto em laravel:
    docker-compose exec --user=laradock workspace bash
