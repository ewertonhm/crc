
BEGIN;

-----------------------------------------------------------------------
-- agendamento
-----------------------------------------------------------------------

DROP TABLE IF EXISTS "agendamento" CASCADE;

CREATE TABLE "agendamento"
(
    "id" serial NOT NULL,
    "agendamento" VARCHAR(45) NOT NULL,
    PRIMARY KEY ("id")
);

-----------------------------------------------------------------------
-- atendente
-----------------------------------------------------------------------

DROP TABLE IF EXISTS "atendente" CASCADE;

CREATE TABLE "atendente"
(
    "id" serial NOT NULL,
    "nome" VARCHAR(45) NOT NULL,
    "login" VARCHAR(45) NOT NULL,
    "senha" VARCHAR(32) NOT NULL,
    "permissao" INTEGER,
    PRIMARY KEY ("id")
);

-----------------------------------------------------------------------
-- atendimento
-----------------------------------------------------------------------

DROP TABLE IF EXISTS "atendimento" CASCADE;

CREATE TABLE "atendimento"
(
    "id" serial NOT NULL,
    "data" VARCHAR(10) NOT NULL,
    "hora" VARCHAR(8) NOT NULL,
    "cadastro" INTEGER,
    "cliente" VARCHAR(100) NOT NULL,
    "tipo_id" INTEGER,
    "bairro_id" INTEGER,
    "cidade_id" INTEGER,
    "estado_id" INTEGER,
    "contato_id" INTEGER,
    "solicitacao_id" INTEGER,
    "motivo_id" INTEGER,
    "contrato_id" INTEGER,
    "agendamento_id" INTEGER,
    "telefone" VARCHAR(13) NOT NULL,
    "tag_id" INTEGER,
    PRIMARY KEY ("id")
);

-----------------------------------------------------------------------
-- bairro
-----------------------------------------------------------------------

DROP TABLE IF EXISTS "bairro" CASCADE;

CREATE TABLE "bairro"
(
    "id" serial NOT NULL,
    "nome" VARCHAR(60) NOT NULL,
    "cidade_id" INTEGER,
    PRIMARY KEY ("id")
);

-----------------------------------------------------------------------
-- cidade
-----------------------------------------------------------------------

DROP TABLE IF EXISTS "cidade" CASCADE;

CREATE TABLE "cidade"
(
    "id" serial NOT NULL,
    "nome" VARCHAR(45) NOT NULL,
    "estado_id" INTEGER,
    PRIMARY KEY ("id")
);

-----------------------------------------------------------------------
-- contato
-----------------------------------------------------------------------

DROP TABLE IF EXISTS "contato" CASCADE;

CREATE TABLE "contato"
(
    "id" serial NOT NULL,
    "contato" VARCHAR(45) NOT NULL,
    PRIMARY KEY ("id")
);

-----------------------------------------------------------------------
-- contrato
-----------------------------------------------------------------------

DROP TABLE IF EXISTS "contrato" CASCADE;

CREATE TABLE "contrato"
(
    "id" serial NOT NULL,
    "contrato" VARCHAR(90) NOT NULL,
    PRIMARY KEY ("id")
);

-----------------------------------------------------------------------
-- estado
-----------------------------------------------------------------------

DROP TABLE IF EXISTS "estado" CASCADE;

CREATE TABLE "estado"
(
    "id" serial NOT NULL,
    "nome" VARCHAR(45) NOT NULL,
    "uf" VARCHAR(45) NOT NULL,
    PRIMARY KEY ("id")
);

-----------------------------------------------------------------------
-- motivo
-----------------------------------------------------------------------

DROP TABLE IF EXISTS "motivo" CASCADE;

CREATE TABLE "motivo"
(
    "id" serial NOT NULL,
    "motivo" VARCHAR(60) NOT NULL,
    PRIMARY KEY ("id")
);

-----------------------------------------------------------------------
-- solicitacao
-----------------------------------------------------------------------

DROP TABLE IF EXISTS "solicitacao" CASCADE;

CREATE TABLE "solicitacao"
(
    "id" serial NOT NULL,
    "solicitacao" VARCHAR(60),
    PRIMARY KEY ("id")
);

-----------------------------------------------------------------------
-- tag
-----------------------------------------------------------------------

DROP TABLE IF EXISTS "tag" CASCADE;

CREATE TABLE "tag"
(
    "id" serial NOT NULL,
    "tag" VARCHAR(45) NOT NULL,
    PRIMARY KEY ("id")
);

-----------------------------------------------------------------------
-- tipo
-----------------------------------------------------------------------

DROP TABLE IF EXISTS "tipo" CASCADE;

CREATE TABLE "tipo"
(
    "id" serial NOT NULL,
    "tipo" VARCHAR(45) NOT NULL,
    PRIMARY KEY ("id")
);

ALTER TABLE "atendimento" ADD CONSTRAINT "atendimento_agendamento_id_fkey"
    FOREIGN KEY ("agendamento_id")
    REFERENCES "agendamento" ("id");

ALTER TABLE "atendimento" ADD CONSTRAINT "atendimento_bairro_id_fkey"
    FOREIGN KEY ("bairro_id")
    REFERENCES "bairro" ("id");

ALTER TABLE "atendimento" ADD CONSTRAINT "atendimento_cidade_id_fkey"
    FOREIGN KEY ("cidade_id")
    REFERENCES "cidade" ("id");

ALTER TABLE "atendimento" ADD CONSTRAINT "atendimento_contato_id_fkey"
    FOREIGN KEY ("contato_id")
    REFERENCES "contato" ("id");

ALTER TABLE "atendimento" ADD CONSTRAINT "atendimento_contrato_id_fkey"
    FOREIGN KEY ("contrato_id")
    REFERENCES "contato" ("id");

ALTER TABLE "atendimento" ADD CONSTRAINT "atendimento_estado_id_fkey"
    FOREIGN KEY ("estado_id")
    REFERENCES "estado" ("id");

ALTER TABLE "atendimento" ADD CONSTRAINT "atendimento_motivo_id_fkey"
    FOREIGN KEY ("motivo_id")
    REFERENCES "motivo" ("id");

ALTER TABLE "atendimento" ADD CONSTRAINT "atendimento_solicitacao_id_fkey"
    FOREIGN KEY ("solicitacao_id")
    REFERENCES "solicitacao" ("id");

ALTER TABLE "atendimento" ADD CONSTRAINT "atendimento_tag_id_fkey"
    FOREIGN KEY ("tag_id")
    REFERENCES "tag" ("id");

ALTER TABLE "atendimento" ADD CONSTRAINT "atendimento_tipo_id_fkey"
    FOREIGN KEY ("tipo_id")
    REFERENCES "tipo" ("id");

ALTER TABLE "bairro" ADD CONSTRAINT "bairro_cidade_id_fkey"
    FOREIGN KEY ("cidade_id")
    REFERENCES "cidade" ("id");

ALTER TABLE "cidade" ADD CONSTRAINT "cidade_estado_id_fkey"
    FOREIGN KEY ("estado_id")
    REFERENCES "estado" ("id");

COMMIT;
