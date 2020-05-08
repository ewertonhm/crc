--CREATE DATABASE crc;
CREATE TABLE atendente (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(45) NOT NULL,
    login VARCHAR(45) NOT NULL,
    senha VARCHAR(32) NOT NULL,
    permissao INTEGER
);

INSERT INTO atendente (nome,login,senha,permissao) VALUES ('Administrador','admin','c289ffe12a30c94530b7fc4e532e2f42',0); -- senha é admin23

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
    solicitacao VARCHAR(60)
);

INSERT INTO solicitacao (solicitacao) VALUES ('Suporte');
INSERT INTO solicitacao (solicitacao) VALUES ('Alteração de Plano');
INSERT INTO solicitacao (solicitacao) VALUES ('Alteração de Titularidade');
INSERT INTO solicitacao (solicitacao) VALUES ('Alteração de Endereço');
INSERT INTO solicitacao (solicitacao) VALUES ('Cancelamento');
INSERT INTO solicitacao (solicitacao) VALUES ('Adesão');
INSERT INTO solicitacao (solicitacao) VALUES ('Informações');
INSERT INTO solicitacao (solicitacao) VALUES ('Financeiro');
INSERT INTO solicitacao (solicitacao) VALUES ('Alteração Cadastral');
INSERT INTO solicitacao (solicitacao) VALUES ('Outros');
INSERT INTO solicitacao (solicitacao) VALUES ('Retenção');




CREATE TABLE estado (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(45) NOT NULL,
    uf VARCHAR(45) NOT NULL
);

INSERT INTO estado (nome, uf) VALUES ('Paraná', 'PR');
INSERT INTO estado (nome, uf) VALUES ('Santa Catarina', 'SC');


CREATE TABLE cidade (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(45) NOT NULL,
    estado_id INT REFERENCES estado(id)
);

INSERT INTO cidade (nome, estado_id) VALUES ('União da Vitória', 1);
INSERT INTO cidade (nome, estado_id) VALUES ('Porto União', 2);
INSERT INTO cidade (nome, estado_id) VALUES ('Paula Freitas', 1);
INSERT INTO cidade (nome, estado_id) VALUES ('Irati', 1);
INSERT INTO cidade (nome, estado_id) VALUES ('Mallet', 1);
INSERT INTO cidade (nome, estado_id) VALUES ('Paulo Frontin', 1);
INSERT INTO cidade (nome, estado_id) VALUES ('Curitiba', 1);


CREATE TABLE bairro (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(60) NOT NULL ,
    cidade_id INT REFERENCES cidade(id)
);

INSERT INTO bairro (nome, cidade_id) VALUES ('Bela Vista',1);
INSERT INTO bairro (nome, cidade_id) VALUES ('Bento Munhoz da Rocha',1);
INSERT INTO bairro (nome, cidade_id) VALUES ('Bom Jesus',1);
INSERT INTO bairro (nome, cidade_id) VALUES ('Centro',1);
INSERT INTO bairro (nome, cidade_id) VALUES ('Cidade Jardim',1);
INSERT INTO bairro (nome, cidade_id) VALUES ('Cristo Rei',1);
INSERT INTO bairro (nome, cidade_id) VALUES ('Dona Mercedes',1);
INSERT INTO bairro (nome, cidade_id) VALUES ('Limeira',1);
INSERT INTO bairro (nome, cidade_id) VALUES ('Navegantes',1);
INSERT INTO bairro (nome, cidade_id) VALUES ('Nossa Senhora da Salete',1);
INSERT INTO bairro (nome, cidade_id) VALUES ('Nossa Senhora das Graças',1);
INSERT INTO bairro (nome, cidade_id) VALUES ('Ouro Verde',1);
INSERT INTO bairro (nome, cidade_id) VALUES ('Ponte Nova',1);
INSERT INTO bairro (nome, cidade_id) VALUES ('Rio d’Areia',1);
INSERT INTO bairro (nome, cidade_id) VALUES ('Rocio',1);
INSERT INTO bairro (nome, cidade_id) VALUES ('Sagrada Família',1);
INSERT INTO bairro (nome, cidade_id) VALUES ('São Basílio Magno',1);
INSERT INTO bairro (nome, cidade_id) VALUES ('São Bernardo',1);
INSERT INTO bairro (nome, cidade_id) VALUES ('São Braz',1);
INSERT INTO bairro (nome, cidade_id) VALUES ('São Gabriel',1);
INSERT INTO bairro (nome, cidade_id) VALUES ('São Joaquim',1);
INSERT INTO bairro (nome, cidade_id) VALUES ('São Sebastião',1);
INSERT INTO bairro (nome, cidade_id) VALUES ('Outro',1);

INSERT INTO bairro (nome, cidade_id) VALUES ('Area Industrial', 2);
INSERT INTO bairro (nome, cidade_id) VALUES ('Boa Vista', 2);
INSERT INTO bairro (nome, cidade_id) VALUES ('Centro', 2);
INSERT INTO bairro (nome, cidade_id) VALUES ('Cidade Nova', 2);
INSERT INTO bairro (nome, cidade_id) VALUES ('Bela Vista', 2);
INSERT INTO bairro (nome, cidade_id) VALUES ('Jardim Brasília', 2);
INSERT INTO bairro (nome, cidade_id) VALUES ('Pintado', 2);
INSERT INTO bairro (nome, cidade_id) VALUES ('Porto União', 2);
INSERT INTO bairro (nome, cidade_id) VALUES ('São Judas Tadeu', 2);
INSERT INTO bairro (nome, cidade_id) VALUES ('São Miguel da Serra', 2);
INSERT INTO bairro (nome, cidade_id) VALUES ('São Pedro', 2);
INSERT INTO bairro (nome, cidade_id) VALUES ('Santa Cruz do Timbo', 2);
INSERT INTO bairro (nome, cidade_id) VALUES ('Santa Rosa', 2);
INSERT INTO bairro (nome, cidade_id) VALUES ('São Bernardo do Campo', 2);
INSERT INTO bairro (nome, cidade_id) VALUES ('São Francisco', 2);
INSERT INTO bairro (nome, cidade_id) VALUES ('São Miguel da Serra', 2);
INSERT INTO bairro (nome, cidade_id) VALUES ('São Pedro', 2);
INSERT INTO bairro (nome, cidade_id) VALUES ('Vice-king', 2);
INSERT INTO bairro (nome, cidade_id) VALUES ('Outro', 2);

INSERT INTO bairro (nome, cidade_id) VALUES ('Área Industrial', 3);
INSERT INTO bairro (nome, cidade_id) VALUES ('Barão 476', 3);
INSERT INTO bairro (nome, cidade_id) VALUES ('Centro', 3);
INSERT INTO bairro (nome, cidade_id) VALUES ('Colônia Dona Júlia', 3);
INSERT INTO bairro (nome, cidade_id) VALUES ('Colônioa Santa Luzia', 3);
INSERT INTO bairro (nome, cidade_id) VALUES ('Faxinal', 3);
INSERT INTO bairro (nome, cidade_id) VALUES ('Jarim Andreia', 3);
INSERT INTO bairro (nome, cidade_id) VALUES ('Jardim Maria Anísia', 3);
INSERT INTO bairro (nome, cidade_id) VALUES ('Localidade de Vargem Grande', 3);
INSERT INTO bairro (nome, cidade_id) VALUES ('Rondinha', 3);
INSERT INTO bairro (nome, cidade_id) VALUES ('Vila Ucraniana', 3);
INSERT INTO bairro (nome, cidade_id) VALUES ('Outro', 3);

INSERT INTO bairro (nome, cidade_id) VALUES ('Alto da Lagoa', 4);
INSERT INTO bairro (nome, cidade_id) VALUES ('Bairro Industrial', 4);
INSERT INTO bairro (nome, cidade_id) VALUES ('Campina de Guamirim', 4);
INSERT INTO bairro (nome, cidade_id) VALUES ('Canesianas', 4);
INSERT INTO bairro (nome, cidade_id) VALUES ('Centro', 4);
INSERT INTO bairro (nome, cidade_id) VALUES ('Cochinhos', 4);
INSERT INTO bairro (nome, cidade_id) VALUES ('Colina Nossa Senhora das Graças', 4);
INSERT INTO bairro (nome, cidade_id) VALUES ('Contundo Fragatas', 4);
INSERT INTO bairro (nome, cidade_id) VALUES ('Dallegra', 4);
INSERT INTO bairro (nome, cidade_id) VALUES ('DER', 4);
INSERT INTO bairro (nome, cidade_id) VALUES ('Engenheiro Gutierrez', 4);
INSERT INTO bairro (nome, cidade_id) VALUES ('Fernando Gomes', 4);
INSERT INTO bairro (nome, cidade_id) VALUES ('Floresta', 4);
INSERT INTO bairro (nome, cidade_id) VALUES ('Fósforo', 4);
INSERT INTO bairro (nome, cidade_id) VALUES ('Gonçalves Jr', 4);
INSERT INTO bairro (nome, cidade_id) VALUES ('Guamirim', 4);
INSERT INTO bairro (nome, cidade_id) VALUES ('Irati', 4);
INSERT INTO bairro (nome, cidade_id) VALUES ('Jardim Aeroporto', 4);
INSERT INTO bairro (nome, cidade_id) VALUES ('Jardim Califórnia', 4);
INSERT INTO bairro (nome, cidade_id) VALUES ('Jardim Kenidi', 4);
INSERT INTO bairro (nome, cidade_id) VALUES ('Jardim Ouro Verde', 4);
INSERT INTO bairro (nome, cidade_id) VALUES ('Jardim Planalto', 4);
INSERT INTO bairro (nome, cidade_id) VALUES ('Jardim Virgínia', 4);
INSERT INTO bairro (nome, cidade_id) VALUES ('Lagoa', 4);
INSERT INTO bairro (nome, cidade_id) VALUES ('Lajeadinho', 4);
INSERT INTO bairro (nome, cidade_id) VALUES ('Lamil', 4);
INSERT INTO bairro (nome, cidade_id) VALUES ('Largo', 4);
INSERT INTO bairro (nome, cidade_id) VALUES ('Linha Pinho', 4);
INSERT INTO bairro (nome, cidade_id) VALUES ('Loteamento Ouro Verde', 4);
INSERT INTO bairro (nome, cidade_id) VALUES ('Loteamento Pabis', 4);
INSERT INTO bairro (nome, cidade_id) VALUES ('Loteamento Pabis', 4);
INSERT INTO bairro (nome, cidade_id) VALUES ('Loteamento Vitório Marcelo', 4);
INSERT INTO bairro (nome, cidade_id) VALUES ('Luiz Fernando Gomes', 4);
INSERT INTO bairro (nome, cidade_id) VALUES ('Morro da Santa', 4);
INSERT INTO bairro (nome, cidade_id) VALUES ('Nhapindazal', 4);
INSERT INTO bairro (nome, cidade_id) VALUES ('Ouro Verde', 4);
INSERT INTO bairro (nome, cidade_id) VALUES ('Rio Bonito', 4);
INSERT INTO bairro (nome, cidade_id) VALUES ('Riozinho', 4);
INSERT INTO bairro (nome, cidade_id) VALUES ('São Francisco', 4);
INSERT INTO bairro (nome, cidade_id) VALUES ('São Pedro', 4);
INSERT INTO bairro (nome, cidade_id) VALUES ('Santa Terezinha', 4);
INSERT INTO bairro (nome, cidade_id) VALUES ('Santana', 4);
INSERT INTO bairro (nome, cidade_id) VALUES ('São João', 4);
INSERT INTO bairro (nome, cidade_id) VALUES ('Stroparo', 4);
INSERT INTO bairro (nome, cidade_id) VALUES ('Vila Batista', 4);
INSERT INTO bairro (nome, cidade_id) VALUES ('Vila Flor', 4);
INSERT INTO bairro (nome, cidade_id) VALUES ('Vila Matilde', 4);
INSERT INTO bairro (nome, cidade_id) VALUES ('Vila Nova', 4);
INSERT INTO bairro (nome, cidade_id) VALUES ('Vila São João', 4);
INSERT INTO bairro (nome, cidade_id) VALUES ('Outro', 4);

INSERT INTO bairro (nome, cidade_id) VALUES ('Dorizon', 5);
INSERT INTO bairro (nome, cidade_id) VALUES ('Eldorado', 5);
INSERT INTO bairro (nome, cidade_id) VALUES ('Jardim Emília', 5);
INSERT INTO bairro (nome, cidade_id) VALUES ('Centro', 5);
INSERT INTO bairro (nome, cidade_id) VALUES ('Rio Claro', 5);
INSERT INTO bairro (nome, cidade_id) VALUES ('Ronda', 5);
INSERT INTO bairro (nome, cidade_id) VALUES ('São Pedro', 5);
INSERT INTO bairro (nome, cidade_id) VALUES ('Vila Caroline', 5);
INSERT INTO bairro (nome, cidade_id) VALUES ('Vila Lopacinski', 5);
INSERT INTO bairro (nome, cidade_id) VALUES ('Vila Maria', 5);
INSERT INTO bairro (nome, cidade_id) VALUES ('Vila Mariana', 5);
INSERT INTO bairro (nome, cidade_id) VALUES ('Vila São Pedro', 5);
INSERT INTO bairro (nome, cidade_id) VALUES ('Outro', 5);

INSERT INTO bairro (nome, cidade_id) VALUES ('Alto Paraíso', 6);
INSERT INTO bairro (nome, cidade_id) VALUES ('Centro', 6);
INSERT INTO bairro (nome, cidade_id) VALUES ('Colonia Jacu', 6);
INSERT INTO bairro (nome, cidade_id) VALUES ('Colonia São Roque', 6);
INSERT INTO bairro (nome, cidade_id) VALUES ('Colonia Tancredo Neves', 6);
INSERT INTO bairro (nome, cidade_id) VALUES ('Vera Guarani', 6);
INSERT INTO bairro (nome, cidade_id) VALUES ('Outro', 6);

INSERT INTO bairro (nome, cidade_id) VALUES ('Araucária', 7);
INSERT INTO bairro (nome, cidade_id) VALUES ('Barigui', 7);
INSERT INTO bairro (nome, cidade_id) VALUES ('Boa Vista', 7);
INSERT INTO bairro (nome, cidade_id) VALUES ('Boqueirão', 7);
INSERT INTO bairro (nome, cidade_id) VALUES ('Butiatuva', 7);
INSERT INTO bairro (nome, cidade_id) VALUES ('Cachoeira', 7);
INSERT INTO bairro (nome, cidade_id) VALUES ('Campina da Barra', 7);
INSERT INTO bairro (nome, cidade_id) VALUES ('Centro', 7);
INSERT INTO bairro (nome, cidade_id) VALUES ('Sabiá', 7);
INSERT INTO bairro (nome, cidade_id) VALUES ('Outro', 7);


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
    contrato_id INT REFERENCES contrato(id),
    agendamento_id INT REFERENCES agendamento(id),
    atendente_id INT REFERENCES atendente(id),
    telefone VARCHAR(40) NOT NULL,
    tag_id INT REFERENCES tag(id)
);