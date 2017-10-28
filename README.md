# Casa-das-Marmitas
Sistema implementado para o portfólio individual do 5º Semestre de ADS - UNOPAR

<ul>
    <li>Portfólio inidividual do 5º Semestre</li>
    <li>Autor: Antônio Abrantes</li>
    <li>Curso: Análise e Desenvolvimento de Sistemas</li>
    <li>Faculdade: UNOPAR</li>
    <li>Data: Outubro de 2017</li>
    <li>Recursos utilizados
        <ul>
            <li>Slim Framework 3.8.1</li>
            <li>Banco de dados Mysql</li>
            <li>PHP 7.1.4</li>
            <li>HTML 5</li>
            <li>CSS</li>
            <li>JavaScript</li>
            <li>Bootstrap 3.3</li>
            <li>FontAwesome</li>
            <li>jQuery</li>
            <li>jQuery UI</li>
        </ul>
    </li>
</ul>

<h2>Tela inical do sistema</h2>

<img src="https://firebasestorage.googleapis.com/v0/b/curso-fb-7081c.appspot.com/o/casa-das-marmitas%2Findex.jpg?alt=media&token=1f8d818e-caa2-4425-8a3e-166861b2bd58" alt="">

<h3>Requisitos para o desenvolvimento do trabalho</h3>
<ol type="1">
    <li>
        <p>
            Controle de Cliente: Neste controle é necessário o nome do cliente, telefone de
            contato, endereço, ponto de referência e data de nascimento.
            Com base nestes dados, no momento do pedido, o atendente realizará uma pesquisa
            pelo número do telefone do cliente, caso esteja cadastrado, os seus dados deverão
            ser exibidos, caso contrário, deverá cadastrá-lo.
        </p>
    </li>
    <li>
        Controle de Entregadores: Neste controle, o serviço é terceirizado, onde os
        motoboys são vinculados a uma empresa e recebem apenas pelas entregas
        realizadas. Os dados necessários são: nome do entregador, CPF, RG, celular e
        Empresa vinculada (nome da empresa que o motoboy trabalha), ou seja, também
        será necessário que a empresa esteja cadastrada no sistema.
    </li>
    <li>
        Controle das Empresas terceirizadas: Empresas onde os motoboys são
        vinculados, sendo necessários os seguintes dados: Nome da empresa, CNPJ,
        endereço, telefone e e-mail.
    </li>
    <li>
        Controle do Produto: Neste caso os produtos são as marmitas a serem vendidas,
        sendo necessária a inclusão dos dados, nome do produto, descrição, tamanho e
        custo.
        Neste empreendimento tem-se: <br>
        Marmita1: Arroz, feijão, bife e salada de tomate. <br>
        Marmita2: Arroz, feijão, bife e ovo frito. <br>
        Marmita3: Arroz, feijão, file de frango, creme de milho. <br>
        Marmita4: Arroz, feijão, file de frango e salada de tomate. <br>
        Tabela de preços: <br>
        Marmita1: R$ 15,00 <br>
        Marmita2: R$ 18,00 <br>
        Marmita3: R$ 14,00 <br>
        Marmita4: R$ 10,00 <br>
        Taxa de entrega: R$ 4,50 <br>
    </li>
    <li>
        Controle de Pedido: Para gerenciar os pedidos realizados pelo cliente, o atendente
        deverá informar no registro do pedido: nome do cliente, nome do produto,
        quantidade, tamanho e etc. <br>
        Automaticamente o sistema deverá calcular o valor total do pedido, por exemplo: <br>
        Pedido 1 <br>
        o Marmita3: R$ 14,00 <br>
        o Marmita4: R$ 10,00 <br>
        Resultando no valor total de R$ 24,00, mais a taxa de entrega. <br>
        Caso necessário, é registrado no sistema o troco. <br>
        Os pedidos serão atendidos com base nas ligações recebidas e o atendimento ao <br>
        pedido deverá respeitar a ordem das ligações. Os pedidos ficarão nos seguintes status: <br>
        o Pendente: Quando o atendente da entrada no pedido. <br>
    </li>
</ol>
