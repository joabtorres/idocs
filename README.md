# iDocs - Versão 1.0
1.	Nome do projeto?

    `iDocs`

2.	Objetivo do projeto:

    `A Aplicação responsável por criar, organizar e gerenciar tipos de documentos como memorando, ofícios e etc.`

3. Instituição solicitante do projeto:

     `Instituto Federal do Pará - Campus Belem`


# DOCUMENTAÇÃO

## - REQUISITOS FUNCIONAIS
1.	Configurações importantes?

        1.1. Será criado o controle de instituição;

        1.2. Será necessário criar setores para qual o usuário fará parte;

        1.3. Será necessário criar controle de usuários vinculados ao setor;

        1.4. Será necessário criar e configurar as nomenclaturas de cada documento (por exemplo Oficio nº 0001/2023/SEMMA/PMC/CASTANHAL)

        1.5. Será necessário criar e configura os status do documento (cancelado, enviado, aguardando encaminhamento, etc);


        1.6. Será necessário criar o cadastro de um novo número de documento, informando por exemplo:
            1.6.1. Tipo do documento (Memorando, oficio, etc) ~~ definido no;
            1.6.2. Data;
            1.6.3. Setor solicitante;
            1.6.4. Status (Cancelado, não enviado, aguardando encaminhamento, Enviado);
            1.6.5. Destinatário
            1.6.5.1. Instituição;
            1.6.5.2. Nome do Destinatário;
            1.6.5.3. Endereço;

        1.7. Será necessário anexar o documento criado em softwares terceiros após a geração do número do documento pelo sistema;

     1.8.	Será necessário criar um histórico do documento criado no sistema para fins de observação;

<br>

2.	Relatórios?

        2.1. Relatórios de documentos gerados (com classificação por tipo do documento, data, setor solicitante; destinatário; status e número do documento);
            
        2.2. Ficha do documento criado;

<br>
3. Gráficos?

        3.1. Total de documentos criados (memorandos, ofícios, etc);
        3.2. Gráfico de total de documentos criados mensal (nos últimos 12 meses);
        3.3. Tabela quantitativa por documentos e status;

## - REQUISITOS NÃO FUNCIONAIS
1.	Todo o fluxo do sistema dependerá da seguinte ordem:

        1.1. Criação dos dados da instituição;
        1.2. Criação dos setores;
        1.3. Criação dos usuários de acesso;
        1.4. Criação dos tipos de documentos e suas respectivas nomenclaturas;
        1.5. Criação dos status dos documentos;
        1.6. Criação dos documentos;
        1.7. Anexação do documento com o novo número gerado;
        1.8. Criação do historio do documento com mudança de status;

2.	Funções do usuário:

        2.1. Terá 3 níveis de acesso;
            2.1.1. Básico – só irá visualizar os documentos gerados;
            2.1.2. Moderado – Visualiza, cadastrar e edita os documentos gerados;
            2.1.3. Administrador – Acesso total ao sistema, inclusive a controle dos usuários;

3.	Modo de acesso ao sistema:

        3.1.Inicialmente o acesso será totalmente via web, a aplicação será responsiva, então se adaptara a qualquer dispositivo.

4. Funcionalidade adicionais ao sistema:

        4.1. Possibilidade de recuperação de senha de acesso;
        4.2. Emissão relatório em PDF dos documentos registrados;
        4.3. Emissão em PDF da ficha do relatório criado no sistema;


## - BANCO DE DADOS
