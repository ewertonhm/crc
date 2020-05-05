--CREATE DATABASE crc;
CREATE TABLE atendente (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(45) NOT NULL,
    login VARCHAR(45) NOT NULL,
    senha VARCHAR(32) NOT NULL,
    permissao INTEGER
);

CREATE TABLE agendamento (
    id SERIAL PRIMARY KEY,
    agendamento VARCHAR(45) NOT NULL
);

CREATE TABLE contrato (
    id SERIAL PRIMARY KEY,
    contrato VARCHAR(45) NOT NULL
);

CREATE TABLE contato (
    id SERIAL PRIMARY KEY,
    contato VARCHAR(45) NOT NULL
);

CREATE TABLE tipo (
    id SERIAL PRIMARY KEY,
    tipo VARCHAR(45) NOT NULL
);

CREATE TABLE motivo (
    id SERIAL PRIMARY KEY,
    motivo VARCHAR(45) NOT NULL
);

CREATE TABLE tag (
    id SERIAL PRIMARY KEY,
    tag VARCHAR(45) NOT NULL
);

CREATE TABLE solicitacao (
    id SERIAL PRIMARY KEY,
    solicitacao VARCHAR(45)
);

CREATE TABLE estado (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(45) NOT NULL,
    uf VARCHAR(45) NOT NULL
);

CREATE TABLE cidade (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(45) NOT NULL,
    estado_id INT REFERENCES estado(id)
);

CREATE TABLE bairro (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(45) NOT NULL ,
    cidade_id INT REFERENCES cidade(id)
);

CREATE TABLE atendimento (
    id SERIAL PRIMARY KEY,
    data VARCHAR(10) NOT NULL,
    hora VARCHAR(8) NOT NULL,
    cadastro INT,
    cliente VARCHAR(100) NOT NULL,
    tipo_id INT REFERENCES tipo(id),
    bairro_id INT REFERENCES bairro(id),
    cidade_id INT REFERENCES cidade(id),
    estado_id INT REFERENCES estado(id),
    contato_id INT REFERENCES contato(id),
    solicitacao_id INT REFERENCES solicitacao(id),
    motivo_id INT REFERENCES motivo(id),
    contrato_id INT REFERENCES contato(id),
    agendamento_id INT REFERENCES agendamento(id),
    telefone VARCHAR(13) NOT NULL,
    tag_id INT REFERENCES tag(id)
);