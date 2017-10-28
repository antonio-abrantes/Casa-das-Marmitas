
--
-- Banco de dados: bd_marmita
--

CREATE TABLE clientes (
                id INT AUTO_INCREMENT NOT NULL,
                nome VARCHAR(60) NOT NULL,
                nascimento DATE,
                telefone VARCHAR(11) NOT NULL,
                cep VARCHAR(8) NOT NULL,
                cidade VARCHAR(60) NOT NULL,
                bairro VARCHAR(60) NOT NULL,
                logradouro VARCHAR(100) NOT NULL,
                numero_residencial VARCHAR(30) NOT NULL,
                complemento_endereco VARCHAR(30),
                ponto_referencia VARCHAR(30),
                created_at DATETIME,
                updated_at DATETIME,
                PRIMARY KEY (id)
);

CREATE TABLE tamanho_produtos (
  id INT AUTO_INCREMENT NOT NULL,
  tamanho varchar(10) NOT NULL,
  PRIMARY KEY (id)
);


CREATE TABLE produtos (
                id INT AUTO_INCREMENT NOT NULL,
                nome VARCHAR(60) NOT NULL,
                ingredientes LONGTEXT NOT NULL,
                custo DOUBLE PRECISION NOT NULL,
                tamanho SMALLINT NOT NULL,
                created_at DATETIME,
                updated_at DATETIME,
                PRIMARY KEY (id)
);

CREATE TABLE pedidos (
                id BIGINT AUTO_INCREMENT NOT NULL,
                cliente_id INT NOT NULL,
                taxa_id SMALLINT NOT NULL,
                quantidade_total SMALLINT NOT NULL,
                total_pedido DOUBLE PRECISION NOT NULL,
                situacao_pedido SMALLINT NOT NULL,
                created_at DATETIME,
                updated_at DATETIME,
                PRIMARY KEY (id)
);


CREATE TABLE pedido_itens (
                id BIGINT AUTO_INCREMENT NOT NULL,
                pedido_id INT NOT NULL,
                produto_id INT NOT NULL,
                quantidade SMALLINT NOT NULL,
                created_at DATETIME,
                updated_at DATETIME,
                PRIMARY KEY (id)
);


CREATE TABLE entregadores (
                id INT AUTO_INCREMENT NOT NULL,
                empresa_id SMALLINT NOT NULL,
                nome VARCHAR(60) NOT NULL,
                cpf VARCHAR(15) NOT NULL,
                rg VARCHAR(15) NOT NULL,
                celular VARCHAR(15) NOT NULL,
                created_at DATETIME,
                updated_at DATETIME,
                PRIMARY KEY (id)
);

CREATE TABLE entregas (
                id INT AUTO_INCREMENT NOT NULL,
                entregador_id INT NOT NULL,
                pedido_id INT NOT NULL,
                status_id INT NOT NULL,
                data_entrega DATE,
                created_at DATETIME,
                updated_at DATETIME,
                PRIMARY KEY (id)
);

CREATE TABLE status_entregas (
                id SMALLINT AUTO_INCREMENT NOT NULL,
                status VARCHAR(15) NOT NULL,
                PRIMARY KEY (id)
);

CREATE TABLE empresas (
                id SMALLINT AUTO_INCREMENT NOT NULL,
                nome VARCHAR(60) NOT NULL,
                cnpj VARCHAR(15) NOT NULL,
                email VARCHAR(50) NOT NULL,
                telefone VARCHAR(15) NOT NULL,
                cep VARCHAR(10) NOT NULL,
                cidade VARCHAR(60) NOT NULL,
                bairro VARCHAR(60) NOT NULL,
                logradouro VARCHAR(100) NOT NULL,
                numero_imovel VARCHAR(30) NOT NULL,
                complemento_endereco VARCHAR(30),
                ponto_referencia VARCHAR(30),
                created_at DATETIME,
                updated_at DATETIME,
                PRIMARY KEY (id)
);

CREATE TABLE taxas (
                id SMALLINT AUTO_INCREMENT NOT NULL,
                taxa DOUBLE PRECISION NOT NULL,
                tipo_taxa SMALLINT NOT NULL,
                created_at DATETIME,
                updated_at DATETIME,
                PRIMARY KEY (id)
);


CREATE TABLE funcionarios (
                id INT NOT NULL,
                cargo SMALLINT NOT NULL,
                created_at DATETIME,
                updated_at DATETIME,
                PRIMARY KEY (id)
);