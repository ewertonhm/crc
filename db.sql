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

INSERT INTO agendamento (agendamento) VALUES ('Não');
INSERT INTO agendamento (agendamento) VALUES ('Visita Técnica');
INSERT INTO agendamento (agendamento) VALUES ('Instalação');

CREATE TABLE contrato (
    id SERIAL PRIMARY KEY,
    contrato VARCHAR(90) NOT NULL
);

INSERT INTO contrato (contrato) VALUES ('Enterprise');
INSERT INTO contrato (contrato) VALUES ('Business');

INSERT INTO contrato (contrato) VALUES ('15mb Plano Toque');
INSERT INTO contrato (contrato) VALUES ('30mb Plano Toque');
INSERT INTO contrato (contrato) VALUES ('60mb Plano Toque');
INSERT INTO contrato (contrato) VALUES ('120mb Plano Toque');
INSERT INTO contrato (contrato) VALUES ('240mb Plano Toque');

INSERT INTO contrato (contrato) VALUES ('10mb Plano Toque Mais (Exclusivo / Descontinuado');
INSERT INTO contrato (contrato) VALUES ('15mb Plano Toque Mais (Exclusivo / Descontinuado');
INSERT INTO contrato (contrato) VALUES ('25mb Plano Toque Mais (Exclusivo / Descontinuado');

INSERT INTO contrato (contrato) VALUES ('20mb Light (Plano Descontinuado)');
INSERT INTO contrato (contrato) VALUES ('30mb Ultra (Plano Descontinuado)');
INSERT INTO contrato (contrato) VALUES ('45mb Ultra (Plano Descontinuado)');

INSERT INTO contrato (contrato) VALUES ('100mb Plano Toque Mais (Descontinuado)');

INSERT INTO contrato (contrato) VALUES ('1mb Rádio');
INSERT INTO contrato (contrato) VALUES ('2mb Rádio');
INSERT INTO contrato (contrato) VALUES ('3mb Rádio');
INSERT INTO contrato (contrato) VALUES ('4mb Rádio');
INSERT INTO contrato (contrato) VALUES ('6mb Rádio');

INSERT INTO contrato (contrato) VALUES ('Licitação/Contrato Exclusivo');

CREATE TABLE contato (
    id SERIAL PRIMARY KEY,
    contato VARCHAR(45) NOT NULL
);

INSERT INTO contato (contato) VALUES ('Presencial');
INSERT INTO contato (contato) VALUES ('Telefone');
INSERT INTO contato (contato) VALUES ('Retorno');
INSERT INTO contato (contato) VALUES ('Facebook');
INSERT INTO contato (contato) VALUES ('Whatsapp');
INSERT INTO contato (contato) VALUES ('Email');
INSERT INTO contato (contato) VALUES ('Solicitação Interna');
INSERT INTO contato (contato) VALUES ('Pipedrive');

CREATE TABLE tipo (
    id SERIAL PRIMARY KEY,
    tipo VARCHAR(45) NOT NULL
);

INSERT INTO tipo (tipo) VALUES ('Pessoa Física');
INSERT INTO tipo (tipo) VALUES ('Pessoa Jurídica');

CREATE TABLE motivo (
    id SERIAL PRIMARY KEY,
    motivo VARCHAR(60) NOT NULL
);

INSERT INTO motivo (motivo) VALUES ('Sem conexão');
INSERT INTO motivo (motivo) VALUES ('Lentidão');
INSERT INTO motivo (motivo) VALUES ('Insatisfação');
INSERT INTO motivo (motivo) VALUES ('Configuração de Equipamento');
INSERT INTO motivo (motivo) VALUES ('Solicitação de Visita/Reparo');
INSERT INTO motivo (motivo) VALUES ('Segunda Via Boleto');
INSERT INTO motivo (motivo) VALUES ('Bloqueio Financeiro');
INSERT INTO motivo (motivo) VALUES ('Upgrade');
INSERT INTO motivo (motivo) VALUES ('Downgrade');
INSERT INTO motivo (motivo) VALUES ('Desistiu de Cancelar');
INSERT INTO motivo (motivo) VALUES ('Degustação de Plano');
INSERT INTO motivo (motivo) VALUES ('Alteração de data de vencimento');
INSERT INTO motivo (motivo) VALUES ('Informações');
INSERT INTO motivo (motivo) VALUES ('Bloqueio Temporário');
INSERT INTO motivo (motivo) VALUES ('Fone Fácil');
INSERT INTO motivo (motivo) VALUES ('Uniguaçu');
INSERT INTO motivo (motivo) VALUES ('Venda');



CREATE TABLE tag (
    id SERIAL PRIMARY KEY,
    tag VARCHAR(45) NOT NULL
);

CREATE TABLE solicitacao (
    id SERIAL PRIMARY KEY,
    solicitacao VARCHAR(45)
);

INSERT INTO solicitacao (solicitacao) VALUES ('Suporte');
INSERT INTO solicitacao (solicitacao) VALUES ('Alteração de Plano');
INSERT INTO solicitacao (solicitacao) VALUES ('Alteração de Titularidade');
INSERT INTO solicitacao (solicitacao) VALUES ('Alteração de Endereço');
INSERT INTO solicitacao (solicitacao) VALUES ('Cancelamento');
INSERT INTO solicitacao (solicitacao) VALUES ('Adesão');
INSERT INTO solicitacao (solicitacao) VALUES ('Informações');
INSERT INTO solicitacao (solicitacao) VALUES ('Informações');
INSERT INTO solicitacao (solicitacao) VALUES ('Informações');
INSERT INTO solicitacao (solicitacao) VALUES ('Informações');
INSERT INTO solicitacao (solicitacao) VALUES ('Informações');




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