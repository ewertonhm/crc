<?php

namespace Base;

use \Atendimento as ChildAtendimento;
use \AtendimentoQuery as ChildAtendimentoQuery;
use \Exception;
use \PDO;
use Map\AtendimentoTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'atendimento' table.
 *
 *
 *
 * @method     ChildAtendimentoQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAtendimentoQuery orderByData($order = Criteria::ASC) Order by the data column
 * @method     ChildAtendimentoQuery orderByHora($order = Criteria::ASC) Order by the hora column
 * @method     ChildAtendimentoQuery orderByCadastro($order = Criteria::ASC) Order by the cadastro column
 * @method     ChildAtendimentoQuery orderByCliente($order = Criteria::ASC) Order by the cliente column
 * @method     ChildAtendimentoQuery orderByTipoId($order = Criteria::ASC) Order by the tipo_id column
 * @method     ChildAtendimentoQuery orderByBairroId($order = Criteria::ASC) Order by the bairro_id column
 * @method     ChildAtendimentoQuery orderByCidadeId($order = Criteria::ASC) Order by the cidade_id column
 * @method     ChildAtendimentoQuery orderByEstadoId($order = Criteria::ASC) Order by the estado_id column
 * @method     ChildAtendimentoQuery orderByContatoId($order = Criteria::ASC) Order by the contato_id column
 * @method     ChildAtendimentoQuery orderBySolicitacaoId($order = Criteria::ASC) Order by the solicitacao_id column
 * @method     ChildAtendimentoQuery orderByMotivoId($order = Criteria::ASC) Order by the motivo_id column
 * @method     ChildAtendimentoQuery orderByContratoId($order = Criteria::ASC) Order by the contrato_id column
 * @method     ChildAtendimentoQuery orderByAgendamentoId($order = Criteria::ASC) Order by the agendamento_id column
 * @method     ChildAtendimentoQuery orderByAtendenteId($order = Criteria::ASC) Order by the atendente_id column
 * @method     ChildAtendimentoQuery orderByTelefone($order = Criteria::ASC) Order by the telefone column
 * @method     ChildAtendimentoQuery orderByTagId($order = Criteria::ASC) Order by the tag_id column
 *
 * @method     ChildAtendimentoQuery groupById() Group by the id column
 * @method     ChildAtendimentoQuery groupByData() Group by the data column
 * @method     ChildAtendimentoQuery groupByHora() Group by the hora column
 * @method     ChildAtendimentoQuery groupByCadastro() Group by the cadastro column
 * @method     ChildAtendimentoQuery groupByCliente() Group by the cliente column
 * @method     ChildAtendimentoQuery groupByTipoId() Group by the tipo_id column
 * @method     ChildAtendimentoQuery groupByBairroId() Group by the bairro_id column
 * @method     ChildAtendimentoQuery groupByCidadeId() Group by the cidade_id column
 * @method     ChildAtendimentoQuery groupByEstadoId() Group by the estado_id column
 * @method     ChildAtendimentoQuery groupByContatoId() Group by the contato_id column
 * @method     ChildAtendimentoQuery groupBySolicitacaoId() Group by the solicitacao_id column
 * @method     ChildAtendimentoQuery groupByMotivoId() Group by the motivo_id column
 * @method     ChildAtendimentoQuery groupByContratoId() Group by the contrato_id column
 * @method     ChildAtendimentoQuery groupByAgendamentoId() Group by the agendamento_id column
 * @method     ChildAtendimentoQuery groupByAtendenteId() Group by the atendente_id column
 * @method     ChildAtendimentoQuery groupByTelefone() Group by the telefone column
 * @method     ChildAtendimentoQuery groupByTagId() Group by the tag_id column
 *
 * @method     ChildAtendimentoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAtendimentoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAtendimentoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAtendimentoQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAtendimentoQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAtendimentoQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAtendimentoQuery leftJoinAgendamento($relationAlias = null) Adds a LEFT JOIN clause to the query using the Agendamento relation
 * @method     ChildAtendimentoQuery rightJoinAgendamento($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Agendamento relation
 * @method     ChildAtendimentoQuery innerJoinAgendamento($relationAlias = null) Adds a INNER JOIN clause to the query using the Agendamento relation
 *
 * @method     ChildAtendimentoQuery joinWithAgendamento($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Agendamento relation
 *
 * @method     ChildAtendimentoQuery leftJoinWithAgendamento() Adds a LEFT JOIN clause and with to the query using the Agendamento relation
 * @method     ChildAtendimentoQuery rightJoinWithAgendamento() Adds a RIGHT JOIN clause and with to the query using the Agendamento relation
 * @method     ChildAtendimentoQuery innerJoinWithAgendamento() Adds a INNER JOIN clause and with to the query using the Agendamento relation
 *
 * @method     ChildAtendimentoQuery leftJoinAtendente($relationAlias = null) Adds a LEFT JOIN clause to the query using the Atendente relation
 * @method     ChildAtendimentoQuery rightJoinAtendente($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Atendente relation
 * @method     ChildAtendimentoQuery innerJoinAtendente($relationAlias = null) Adds a INNER JOIN clause to the query using the Atendente relation
 *
 * @method     ChildAtendimentoQuery joinWithAtendente($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Atendente relation
 *
 * @method     ChildAtendimentoQuery leftJoinWithAtendente() Adds a LEFT JOIN clause and with to the query using the Atendente relation
 * @method     ChildAtendimentoQuery rightJoinWithAtendente() Adds a RIGHT JOIN clause and with to the query using the Atendente relation
 * @method     ChildAtendimentoQuery innerJoinWithAtendente() Adds a INNER JOIN clause and with to the query using the Atendente relation
 *
 * @method     ChildAtendimentoQuery leftJoinBairro($relationAlias = null) Adds a LEFT JOIN clause to the query using the Bairro relation
 * @method     ChildAtendimentoQuery rightJoinBairro($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Bairro relation
 * @method     ChildAtendimentoQuery innerJoinBairro($relationAlias = null) Adds a INNER JOIN clause to the query using the Bairro relation
 *
 * @method     ChildAtendimentoQuery joinWithBairro($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Bairro relation
 *
 * @method     ChildAtendimentoQuery leftJoinWithBairro() Adds a LEFT JOIN clause and with to the query using the Bairro relation
 * @method     ChildAtendimentoQuery rightJoinWithBairro() Adds a RIGHT JOIN clause and with to the query using the Bairro relation
 * @method     ChildAtendimentoQuery innerJoinWithBairro() Adds a INNER JOIN clause and with to the query using the Bairro relation
 *
 * @method     ChildAtendimentoQuery leftJoinCidade($relationAlias = null) Adds a LEFT JOIN clause to the query using the Cidade relation
 * @method     ChildAtendimentoQuery rightJoinCidade($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Cidade relation
 * @method     ChildAtendimentoQuery innerJoinCidade($relationAlias = null) Adds a INNER JOIN clause to the query using the Cidade relation
 *
 * @method     ChildAtendimentoQuery joinWithCidade($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Cidade relation
 *
 * @method     ChildAtendimentoQuery leftJoinWithCidade() Adds a LEFT JOIN clause and with to the query using the Cidade relation
 * @method     ChildAtendimentoQuery rightJoinWithCidade() Adds a RIGHT JOIN clause and with to the query using the Cidade relation
 * @method     ChildAtendimentoQuery innerJoinWithCidade() Adds a INNER JOIN clause and with to the query using the Cidade relation
 *
 * @method     ChildAtendimentoQuery leftJoinContato($relationAlias = null) Adds a LEFT JOIN clause to the query using the Contato relation
 * @method     ChildAtendimentoQuery rightJoinContato($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Contato relation
 * @method     ChildAtendimentoQuery innerJoinContato($relationAlias = null) Adds a INNER JOIN clause to the query using the Contato relation
 *
 * @method     ChildAtendimentoQuery joinWithContato($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Contato relation
 *
 * @method     ChildAtendimentoQuery leftJoinWithContato() Adds a LEFT JOIN clause and with to the query using the Contato relation
 * @method     ChildAtendimentoQuery rightJoinWithContato() Adds a RIGHT JOIN clause and with to the query using the Contato relation
 * @method     ChildAtendimentoQuery innerJoinWithContato() Adds a INNER JOIN clause and with to the query using the Contato relation
 *
 * @method     ChildAtendimentoQuery leftJoinContrato($relationAlias = null) Adds a LEFT JOIN clause to the query using the Contrato relation
 * @method     ChildAtendimentoQuery rightJoinContrato($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Contrato relation
 * @method     ChildAtendimentoQuery innerJoinContrato($relationAlias = null) Adds a INNER JOIN clause to the query using the Contrato relation
 *
 * @method     ChildAtendimentoQuery joinWithContrato($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Contrato relation
 *
 * @method     ChildAtendimentoQuery leftJoinWithContrato() Adds a LEFT JOIN clause and with to the query using the Contrato relation
 * @method     ChildAtendimentoQuery rightJoinWithContrato() Adds a RIGHT JOIN clause and with to the query using the Contrato relation
 * @method     ChildAtendimentoQuery innerJoinWithContrato() Adds a INNER JOIN clause and with to the query using the Contrato relation
 *
 * @method     ChildAtendimentoQuery leftJoinEstado($relationAlias = null) Adds a LEFT JOIN clause to the query using the Estado relation
 * @method     ChildAtendimentoQuery rightJoinEstado($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Estado relation
 * @method     ChildAtendimentoQuery innerJoinEstado($relationAlias = null) Adds a INNER JOIN clause to the query using the Estado relation
 *
 * @method     ChildAtendimentoQuery joinWithEstado($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Estado relation
 *
 * @method     ChildAtendimentoQuery leftJoinWithEstado() Adds a LEFT JOIN clause and with to the query using the Estado relation
 * @method     ChildAtendimentoQuery rightJoinWithEstado() Adds a RIGHT JOIN clause and with to the query using the Estado relation
 * @method     ChildAtendimentoQuery innerJoinWithEstado() Adds a INNER JOIN clause and with to the query using the Estado relation
 *
 * @method     ChildAtendimentoQuery leftJoinMotivo($relationAlias = null) Adds a LEFT JOIN clause to the query using the Motivo relation
 * @method     ChildAtendimentoQuery rightJoinMotivo($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Motivo relation
 * @method     ChildAtendimentoQuery innerJoinMotivo($relationAlias = null) Adds a INNER JOIN clause to the query using the Motivo relation
 *
 * @method     ChildAtendimentoQuery joinWithMotivo($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Motivo relation
 *
 * @method     ChildAtendimentoQuery leftJoinWithMotivo() Adds a LEFT JOIN clause and with to the query using the Motivo relation
 * @method     ChildAtendimentoQuery rightJoinWithMotivo() Adds a RIGHT JOIN clause and with to the query using the Motivo relation
 * @method     ChildAtendimentoQuery innerJoinWithMotivo() Adds a INNER JOIN clause and with to the query using the Motivo relation
 *
 * @method     ChildAtendimentoQuery leftJoinSolicitacao($relationAlias = null) Adds a LEFT JOIN clause to the query using the Solicitacao relation
 * @method     ChildAtendimentoQuery rightJoinSolicitacao($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Solicitacao relation
 * @method     ChildAtendimentoQuery innerJoinSolicitacao($relationAlias = null) Adds a INNER JOIN clause to the query using the Solicitacao relation
 *
 * @method     ChildAtendimentoQuery joinWithSolicitacao($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Solicitacao relation
 *
 * @method     ChildAtendimentoQuery leftJoinWithSolicitacao() Adds a LEFT JOIN clause and with to the query using the Solicitacao relation
 * @method     ChildAtendimentoQuery rightJoinWithSolicitacao() Adds a RIGHT JOIN clause and with to the query using the Solicitacao relation
 * @method     ChildAtendimentoQuery innerJoinWithSolicitacao() Adds a INNER JOIN clause and with to the query using the Solicitacao relation
 *
 * @method     ChildAtendimentoQuery leftJoinTag($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tag relation
 * @method     ChildAtendimentoQuery rightJoinTag($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tag relation
 * @method     ChildAtendimentoQuery innerJoinTag($relationAlias = null) Adds a INNER JOIN clause to the query using the Tag relation
 *
 * @method     ChildAtendimentoQuery joinWithTag($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Tag relation
 *
 * @method     ChildAtendimentoQuery leftJoinWithTag() Adds a LEFT JOIN clause and with to the query using the Tag relation
 * @method     ChildAtendimentoQuery rightJoinWithTag() Adds a RIGHT JOIN clause and with to the query using the Tag relation
 * @method     ChildAtendimentoQuery innerJoinWithTag() Adds a INNER JOIN clause and with to the query using the Tag relation
 *
 * @method     ChildAtendimentoQuery leftJoinTipo($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tipo relation
 * @method     ChildAtendimentoQuery rightJoinTipo($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tipo relation
 * @method     ChildAtendimentoQuery innerJoinTipo($relationAlias = null) Adds a INNER JOIN clause to the query using the Tipo relation
 *
 * @method     ChildAtendimentoQuery joinWithTipo($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Tipo relation
 *
 * @method     ChildAtendimentoQuery leftJoinWithTipo() Adds a LEFT JOIN clause and with to the query using the Tipo relation
 * @method     ChildAtendimentoQuery rightJoinWithTipo() Adds a RIGHT JOIN clause and with to the query using the Tipo relation
 * @method     ChildAtendimentoQuery innerJoinWithTipo() Adds a INNER JOIN clause and with to the query using the Tipo relation
 *
 * @method     \AgendamentoQuery|\AtendenteQuery|\BairroQuery|\CidadeQuery|\ContatoQuery|\ContratoQuery|\EstadoQuery|\MotivoQuery|\SolicitacaoQuery|\TagQuery|\TipoQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildAtendimento findOne(ConnectionInterface $con = null) Return the first ChildAtendimento matching the query
 * @method     ChildAtendimento findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAtendimento matching the query, or a new ChildAtendimento object populated from the query conditions when no match is found
 *
 * @method     ChildAtendimento findOneById(int $id) Return the first ChildAtendimento filtered by the id column
 * @method     ChildAtendimento findOneByData(string $data) Return the first ChildAtendimento filtered by the data column
 * @method     ChildAtendimento findOneByHora(string $hora) Return the first ChildAtendimento filtered by the hora column
 * @method     ChildAtendimento findOneByCadastro(int $cadastro) Return the first ChildAtendimento filtered by the cadastro column
 * @method     ChildAtendimento findOneByCliente(string $cliente) Return the first ChildAtendimento filtered by the cliente column
 * @method     ChildAtendimento findOneByTipoId(int $tipo_id) Return the first ChildAtendimento filtered by the tipo_id column
 * @method     ChildAtendimento findOneByBairroId(int $bairro_id) Return the first ChildAtendimento filtered by the bairro_id column
 * @method     ChildAtendimento findOneByCidadeId(int $cidade_id) Return the first ChildAtendimento filtered by the cidade_id column
 * @method     ChildAtendimento findOneByEstadoId(int $estado_id) Return the first ChildAtendimento filtered by the estado_id column
 * @method     ChildAtendimento findOneByContatoId(int $contato_id) Return the first ChildAtendimento filtered by the contato_id column
 * @method     ChildAtendimento findOneBySolicitacaoId(int $solicitacao_id) Return the first ChildAtendimento filtered by the solicitacao_id column
 * @method     ChildAtendimento findOneByMotivoId(int $motivo_id) Return the first ChildAtendimento filtered by the motivo_id column
 * @method     ChildAtendimento findOneByContratoId(int $contrato_id) Return the first ChildAtendimento filtered by the contrato_id column
 * @method     ChildAtendimento findOneByAgendamentoId(int $agendamento_id) Return the first ChildAtendimento filtered by the agendamento_id column
 * @method     ChildAtendimento findOneByAtendenteId(int $atendente_id) Return the first ChildAtendimento filtered by the atendente_id column
 * @method     ChildAtendimento findOneByTelefone(string $telefone) Return the first ChildAtendimento filtered by the telefone column
 * @method     ChildAtendimento findOneByTagId(int $tag_id) Return the first ChildAtendimento filtered by the tag_id column *

 * @method     ChildAtendimento requirePk($key, ConnectionInterface $con = null) Return the ChildAtendimento by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAtendimento requireOne(ConnectionInterface $con = null) Return the first ChildAtendimento matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAtendimento requireOneById(int $id) Return the first ChildAtendimento filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAtendimento requireOneByData(string $data) Return the first ChildAtendimento filtered by the data column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAtendimento requireOneByHora(string $hora) Return the first ChildAtendimento filtered by the hora column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAtendimento requireOneByCadastro(int $cadastro) Return the first ChildAtendimento filtered by the cadastro column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAtendimento requireOneByCliente(string $cliente) Return the first ChildAtendimento filtered by the cliente column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAtendimento requireOneByTipoId(int $tipo_id) Return the first ChildAtendimento filtered by the tipo_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAtendimento requireOneByBairroId(int $bairro_id) Return the first ChildAtendimento filtered by the bairro_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAtendimento requireOneByCidadeId(int $cidade_id) Return the first ChildAtendimento filtered by the cidade_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAtendimento requireOneByEstadoId(int $estado_id) Return the first ChildAtendimento filtered by the estado_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAtendimento requireOneByContatoId(int $contato_id) Return the first ChildAtendimento filtered by the contato_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAtendimento requireOneBySolicitacaoId(int $solicitacao_id) Return the first ChildAtendimento filtered by the solicitacao_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAtendimento requireOneByMotivoId(int $motivo_id) Return the first ChildAtendimento filtered by the motivo_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAtendimento requireOneByContratoId(int $contrato_id) Return the first ChildAtendimento filtered by the contrato_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAtendimento requireOneByAgendamentoId(int $agendamento_id) Return the first ChildAtendimento filtered by the agendamento_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAtendimento requireOneByAtendenteId(int $atendente_id) Return the first ChildAtendimento filtered by the atendente_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAtendimento requireOneByTelefone(string $telefone) Return the first ChildAtendimento filtered by the telefone column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAtendimento requireOneByTagId(int $tag_id) Return the first ChildAtendimento filtered by the tag_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAtendimento[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAtendimento objects based on current ModelCriteria
 * @method     ChildAtendimento[]|ObjectCollection findById(int $id) Return ChildAtendimento objects filtered by the id column
 * @method     ChildAtendimento[]|ObjectCollection findByData(string $data) Return ChildAtendimento objects filtered by the data column
 * @method     ChildAtendimento[]|ObjectCollection findByHora(string $hora) Return ChildAtendimento objects filtered by the hora column
 * @method     ChildAtendimento[]|ObjectCollection findByCadastro(int $cadastro) Return ChildAtendimento objects filtered by the cadastro column
 * @method     ChildAtendimento[]|ObjectCollection findByCliente(string $cliente) Return ChildAtendimento objects filtered by the cliente column
 * @method     ChildAtendimento[]|ObjectCollection findByTipoId(int $tipo_id) Return ChildAtendimento objects filtered by the tipo_id column
 * @method     ChildAtendimento[]|ObjectCollection findByBairroId(int $bairro_id) Return ChildAtendimento objects filtered by the bairro_id column
 * @method     ChildAtendimento[]|ObjectCollection findByCidadeId(int $cidade_id) Return ChildAtendimento objects filtered by the cidade_id column
 * @method     ChildAtendimento[]|ObjectCollection findByEstadoId(int $estado_id) Return ChildAtendimento objects filtered by the estado_id column
 * @method     ChildAtendimento[]|ObjectCollection findByContatoId(int $contato_id) Return ChildAtendimento objects filtered by the contato_id column
 * @method     ChildAtendimento[]|ObjectCollection findBySolicitacaoId(int $solicitacao_id) Return ChildAtendimento objects filtered by the solicitacao_id column
 * @method     ChildAtendimento[]|ObjectCollection findByMotivoId(int $motivo_id) Return ChildAtendimento objects filtered by the motivo_id column
 * @method     ChildAtendimento[]|ObjectCollection findByContratoId(int $contrato_id) Return ChildAtendimento objects filtered by the contrato_id column
 * @method     ChildAtendimento[]|ObjectCollection findByAgendamentoId(int $agendamento_id) Return ChildAtendimento objects filtered by the agendamento_id column
 * @method     ChildAtendimento[]|ObjectCollection findByAtendenteId(int $atendente_id) Return ChildAtendimento objects filtered by the atendente_id column
 * @method     ChildAtendimento[]|ObjectCollection findByTelefone(string $telefone) Return ChildAtendimento objects filtered by the telefone column
 * @method     ChildAtendimento[]|ObjectCollection findByTagId(int $tag_id) Return ChildAtendimento objects filtered by the tag_id column
 * @method     ChildAtendimento[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AtendimentoQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\AtendimentoQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Atendimento', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAtendimentoQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAtendimentoQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAtendimentoQuery) {
            return $criteria;
        }
        $query = new ChildAtendimentoQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildAtendimento|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AtendimentoTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AtendimentoTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildAtendimento A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, data, hora, cadastro, cliente, tipo_id, bairro_id, cidade_id, estado_id, contato_id, solicitacao_id, motivo_id, contrato_id, agendamento_id, atendente_id, telefone, tag_id FROM atendimento WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildAtendimento $obj */
            $obj = new ChildAtendimento();
            $obj->hydrate($row);
            AtendimentoTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildAtendimento|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildAtendimentoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AtendimentoTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAtendimentoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AtendimentoTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAtendimentoQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AtendimentoTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AtendimentoTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AtendimentoTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the data column
     *
     * Example usage:
     * <code>
     * $query->filterByData('fooValue');   // WHERE data = 'fooValue'
     * $query->filterByData('%fooValue%', Criteria::LIKE); // WHERE data LIKE '%fooValue%'
     * </code>
     *
     * @param     string $data The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAtendimentoQuery The current query, for fluid interface
     */
    public function filterByData($data = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($data)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AtendimentoTableMap::COL_DATA, $data, $comparison);
    }

    /**
     * Filter the query on the hora column
     *
     * Example usage:
     * <code>
     * $query->filterByHora('fooValue');   // WHERE hora = 'fooValue'
     * $query->filterByHora('%fooValue%', Criteria::LIKE); // WHERE hora LIKE '%fooValue%'
     * </code>
     *
     * @param     string $hora The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAtendimentoQuery The current query, for fluid interface
     */
    public function filterByHora($hora = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($hora)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AtendimentoTableMap::COL_HORA, $hora, $comparison);
    }

    /**
     * Filter the query on the cadastro column
     *
     * Example usage:
     * <code>
     * $query->filterByCadastro(1234); // WHERE cadastro = 1234
     * $query->filterByCadastro(array(12, 34)); // WHERE cadastro IN (12, 34)
     * $query->filterByCadastro(array('min' => 12)); // WHERE cadastro > 12
     * </code>
     *
     * @param     mixed $cadastro The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAtendimentoQuery The current query, for fluid interface
     */
    public function filterByCadastro($cadastro = null, $comparison = null)
    {
        if (is_array($cadastro)) {
            $useMinMax = false;
            if (isset($cadastro['min'])) {
                $this->addUsingAlias(AtendimentoTableMap::COL_CADASTRO, $cadastro['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cadastro['max'])) {
                $this->addUsingAlias(AtendimentoTableMap::COL_CADASTRO, $cadastro['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AtendimentoTableMap::COL_CADASTRO, $cadastro, $comparison);
    }

    /**
     * Filter the query on the cliente column
     *
     * Example usage:
     * <code>
     * $query->filterByCliente('fooValue');   // WHERE cliente = 'fooValue'
     * $query->filterByCliente('%fooValue%', Criteria::LIKE); // WHERE cliente LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cliente The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAtendimentoQuery The current query, for fluid interface
     */
    public function filterByCliente($cliente = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cliente)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AtendimentoTableMap::COL_CLIENTE, $cliente, $comparison);
    }

    /**
     * Filter the query on the tipo_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTipoId(1234); // WHERE tipo_id = 1234
     * $query->filterByTipoId(array(12, 34)); // WHERE tipo_id IN (12, 34)
     * $query->filterByTipoId(array('min' => 12)); // WHERE tipo_id > 12
     * </code>
     *
     * @see       filterByTipo()
     *
     * @param     mixed $tipoId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAtendimentoQuery The current query, for fluid interface
     */
    public function filterByTipoId($tipoId = null, $comparison = null)
    {
        if (is_array($tipoId)) {
            $useMinMax = false;
            if (isset($tipoId['min'])) {
                $this->addUsingAlias(AtendimentoTableMap::COL_TIPO_ID, $tipoId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tipoId['max'])) {
                $this->addUsingAlias(AtendimentoTableMap::COL_TIPO_ID, $tipoId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AtendimentoTableMap::COL_TIPO_ID, $tipoId, $comparison);
    }

    /**
     * Filter the query on the bairro_id column
     *
     * Example usage:
     * <code>
     * $query->filterByBairroId(1234); // WHERE bairro_id = 1234
     * $query->filterByBairroId(array(12, 34)); // WHERE bairro_id IN (12, 34)
     * $query->filterByBairroId(array('min' => 12)); // WHERE bairro_id > 12
     * </code>
     *
     * @see       filterByBairro()
     *
     * @param     mixed $bairroId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAtendimentoQuery The current query, for fluid interface
     */
    public function filterByBairroId($bairroId = null, $comparison = null)
    {
        if (is_array($bairroId)) {
            $useMinMax = false;
            if (isset($bairroId['min'])) {
                $this->addUsingAlias(AtendimentoTableMap::COL_BAIRRO_ID, $bairroId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bairroId['max'])) {
                $this->addUsingAlias(AtendimentoTableMap::COL_BAIRRO_ID, $bairroId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AtendimentoTableMap::COL_BAIRRO_ID, $bairroId, $comparison);
    }

    /**
     * Filter the query on the cidade_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCidadeId(1234); // WHERE cidade_id = 1234
     * $query->filterByCidadeId(array(12, 34)); // WHERE cidade_id IN (12, 34)
     * $query->filterByCidadeId(array('min' => 12)); // WHERE cidade_id > 12
     * </code>
     *
     * @see       filterByCidade()
     *
     * @param     mixed $cidadeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAtendimentoQuery The current query, for fluid interface
     */
    public function filterByCidadeId($cidadeId = null, $comparison = null)
    {
        if (is_array($cidadeId)) {
            $useMinMax = false;
            if (isset($cidadeId['min'])) {
                $this->addUsingAlias(AtendimentoTableMap::COL_CIDADE_ID, $cidadeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cidadeId['max'])) {
                $this->addUsingAlias(AtendimentoTableMap::COL_CIDADE_ID, $cidadeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AtendimentoTableMap::COL_CIDADE_ID, $cidadeId, $comparison);
    }

    /**
     * Filter the query on the estado_id column
     *
     * Example usage:
     * <code>
     * $query->filterByEstadoId(1234); // WHERE estado_id = 1234
     * $query->filterByEstadoId(array(12, 34)); // WHERE estado_id IN (12, 34)
     * $query->filterByEstadoId(array('min' => 12)); // WHERE estado_id > 12
     * </code>
     *
     * @see       filterByEstado()
     *
     * @param     mixed $estadoId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAtendimentoQuery The current query, for fluid interface
     */
    public function filterByEstadoId($estadoId = null, $comparison = null)
    {
        if (is_array($estadoId)) {
            $useMinMax = false;
            if (isset($estadoId['min'])) {
                $this->addUsingAlias(AtendimentoTableMap::COL_ESTADO_ID, $estadoId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($estadoId['max'])) {
                $this->addUsingAlias(AtendimentoTableMap::COL_ESTADO_ID, $estadoId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AtendimentoTableMap::COL_ESTADO_ID, $estadoId, $comparison);
    }

    /**
     * Filter the query on the contato_id column
     *
     * Example usage:
     * <code>
     * $query->filterByContatoId(1234); // WHERE contato_id = 1234
     * $query->filterByContatoId(array(12, 34)); // WHERE contato_id IN (12, 34)
     * $query->filterByContatoId(array('min' => 12)); // WHERE contato_id > 12
     * </code>
     *
     * @see       filterByContato()
     *
     * @param     mixed $contatoId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAtendimentoQuery The current query, for fluid interface
     */
    public function filterByContatoId($contatoId = null, $comparison = null)
    {
        if (is_array($contatoId)) {
            $useMinMax = false;
            if (isset($contatoId['min'])) {
                $this->addUsingAlias(AtendimentoTableMap::COL_CONTATO_ID, $contatoId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($contatoId['max'])) {
                $this->addUsingAlias(AtendimentoTableMap::COL_CONTATO_ID, $contatoId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AtendimentoTableMap::COL_CONTATO_ID, $contatoId, $comparison);
    }

    /**
     * Filter the query on the solicitacao_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySolicitacaoId(1234); // WHERE solicitacao_id = 1234
     * $query->filterBySolicitacaoId(array(12, 34)); // WHERE solicitacao_id IN (12, 34)
     * $query->filterBySolicitacaoId(array('min' => 12)); // WHERE solicitacao_id > 12
     * </code>
     *
     * @see       filterBySolicitacao()
     *
     * @param     mixed $solicitacaoId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAtendimentoQuery The current query, for fluid interface
     */
    public function filterBySolicitacaoId($solicitacaoId = null, $comparison = null)
    {
        if (is_array($solicitacaoId)) {
            $useMinMax = false;
            if (isset($solicitacaoId['min'])) {
                $this->addUsingAlias(AtendimentoTableMap::COL_SOLICITACAO_ID, $solicitacaoId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($solicitacaoId['max'])) {
                $this->addUsingAlias(AtendimentoTableMap::COL_SOLICITACAO_ID, $solicitacaoId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AtendimentoTableMap::COL_SOLICITACAO_ID, $solicitacaoId, $comparison);
    }

    /**
     * Filter the query on the motivo_id column
     *
     * Example usage:
     * <code>
     * $query->filterByMotivoId(1234); // WHERE motivo_id = 1234
     * $query->filterByMotivoId(array(12, 34)); // WHERE motivo_id IN (12, 34)
     * $query->filterByMotivoId(array('min' => 12)); // WHERE motivo_id > 12
     * </code>
     *
     * @see       filterByMotivo()
     *
     * @param     mixed $motivoId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAtendimentoQuery The current query, for fluid interface
     */
    public function filterByMotivoId($motivoId = null, $comparison = null)
    {
        if (is_array($motivoId)) {
            $useMinMax = false;
            if (isset($motivoId['min'])) {
                $this->addUsingAlias(AtendimentoTableMap::COL_MOTIVO_ID, $motivoId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($motivoId['max'])) {
                $this->addUsingAlias(AtendimentoTableMap::COL_MOTIVO_ID, $motivoId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AtendimentoTableMap::COL_MOTIVO_ID, $motivoId, $comparison);
    }

    /**
     * Filter the query on the contrato_id column
     *
     * Example usage:
     * <code>
     * $query->filterByContratoId(1234); // WHERE contrato_id = 1234
     * $query->filterByContratoId(array(12, 34)); // WHERE contrato_id IN (12, 34)
     * $query->filterByContratoId(array('min' => 12)); // WHERE contrato_id > 12
     * </code>
     *
     * @see       filterByContrato()
     *
     * @param     mixed $contratoId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAtendimentoQuery The current query, for fluid interface
     */
    public function filterByContratoId($contratoId = null, $comparison = null)
    {
        if (is_array($contratoId)) {
            $useMinMax = false;
            if (isset($contratoId['min'])) {
                $this->addUsingAlias(AtendimentoTableMap::COL_CONTRATO_ID, $contratoId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($contratoId['max'])) {
                $this->addUsingAlias(AtendimentoTableMap::COL_CONTRATO_ID, $contratoId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AtendimentoTableMap::COL_CONTRATO_ID, $contratoId, $comparison);
    }

    /**
     * Filter the query on the agendamento_id column
     *
     * Example usage:
     * <code>
     * $query->filterByAgendamentoId(1234); // WHERE agendamento_id = 1234
     * $query->filterByAgendamentoId(array(12, 34)); // WHERE agendamento_id IN (12, 34)
     * $query->filterByAgendamentoId(array('min' => 12)); // WHERE agendamento_id > 12
     * </code>
     *
     * @see       filterByAgendamento()
     *
     * @param     mixed $agendamentoId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAtendimentoQuery The current query, for fluid interface
     */
    public function filterByAgendamentoId($agendamentoId = null, $comparison = null)
    {
        if (is_array($agendamentoId)) {
            $useMinMax = false;
            if (isset($agendamentoId['min'])) {
                $this->addUsingAlias(AtendimentoTableMap::COL_AGENDAMENTO_ID, $agendamentoId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($agendamentoId['max'])) {
                $this->addUsingAlias(AtendimentoTableMap::COL_AGENDAMENTO_ID, $agendamentoId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AtendimentoTableMap::COL_AGENDAMENTO_ID, $agendamentoId, $comparison);
    }

    /**
     * Filter the query on the atendente_id column
     *
     * Example usage:
     * <code>
     * $query->filterByAtendenteId(1234); // WHERE atendente_id = 1234
     * $query->filterByAtendenteId(array(12, 34)); // WHERE atendente_id IN (12, 34)
     * $query->filterByAtendenteId(array('min' => 12)); // WHERE atendente_id > 12
     * </code>
     *
     * @see       filterByAtendente()
     *
     * @param     mixed $atendenteId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAtendimentoQuery The current query, for fluid interface
     */
    public function filterByAtendenteId($atendenteId = null, $comparison = null)
    {
        if (is_array($atendenteId)) {
            $useMinMax = false;
            if (isset($atendenteId['min'])) {
                $this->addUsingAlias(AtendimentoTableMap::COL_ATENDENTE_ID, $atendenteId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($atendenteId['max'])) {
                $this->addUsingAlias(AtendimentoTableMap::COL_ATENDENTE_ID, $atendenteId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AtendimentoTableMap::COL_ATENDENTE_ID, $atendenteId, $comparison);
    }

    /**
     * Filter the query on the telefone column
     *
     * Example usage:
     * <code>
     * $query->filterByTelefone('fooValue');   // WHERE telefone = 'fooValue'
     * $query->filterByTelefone('%fooValue%', Criteria::LIKE); // WHERE telefone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $telefone The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAtendimentoQuery The current query, for fluid interface
     */
    public function filterByTelefone($telefone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($telefone)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AtendimentoTableMap::COL_TELEFONE, $telefone, $comparison);
    }

    /**
     * Filter the query on the tag_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTagId(1234); // WHERE tag_id = 1234
     * $query->filterByTagId(array(12, 34)); // WHERE tag_id IN (12, 34)
     * $query->filterByTagId(array('min' => 12)); // WHERE tag_id > 12
     * </code>
     *
     * @see       filterByTag()
     *
     * @param     mixed $tagId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAtendimentoQuery The current query, for fluid interface
     */
    public function filterByTagId($tagId = null, $comparison = null)
    {
        if (is_array($tagId)) {
            $useMinMax = false;
            if (isset($tagId['min'])) {
                $this->addUsingAlias(AtendimentoTableMap::COL_TAG_ID, $tagId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tagId['max'])) {
                $this->addUsingAlias(AtendimentoTableMap::COL_TAG_ID, $tagId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AtendimentoTableMap::COL_TAG_ID, $tagId, $comparison);
    }

    /**
     * Filter the query by a related \Agendamento object
     *
     * @param \Agendamento|ObjectCollection $agendamento The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildAtendimentoQuery The current query, for fluid interface
     */
    public function filterByAgendamento($agendamento, $comparison = null)
    {
        if ($agendamento instanceof \Agendamento) {
            return $this
                ->addUsingAlias(AtendimentoTableMap::COL_AGENDAMENTO_ID, $agendamento->getId(), $comparison);
        } elseif ($agendamento instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AtendimentoTableMap::COL_AGENDAMENTO_ID, $agendamento->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByAgendamento() only accepts arguments of type \Agendamento or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Agendamento relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildAtendimentoQuery The current query, for fluid interface
     */
    public function joinAgendamento($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Agendamento');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Agendamento');
        }

        return $this;
    }

    /**
     * Use the Agendamento relation Agendamento object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \AgendamentoQuery A secondary query class using the current class as primary query
     */
    public function useAgendamentoQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinAgendamento($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Agendamento', '\AgendamentoQuery');
    }

    /**
     * Filter the query by a related \Atendente object
     *
     * @param \Atendente|ObjectCollection $atendente The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildAtendimentoQuery The current query, for fluid interface
     */
    public function filterByAtendente($atendente, $comparison = null)
    {
        if ($atendente instanceof \Atendente) {
            return $this
                ->addUsingAlias(AtendimentoTableMap::COL_ATENDENTE_ID, $atendente->getId(), $comparison);
        } elseif ($atendente instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AtendimentoTableMap::COL_ATENDENTE_ID, $atendente->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByAtendente() only accepts arguments of type \Atendente or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Atendente relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildAtendimentoQuery The current query, for fluid interface
     */
    public function joinAtendente($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Atendente');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Atendente');
        }

        return $this;
    }

    /**
     * Use the Atendente relation Atendente object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \AtendenteQuery A secondary query class using the current class as primary query
     */
    public function useAtendenteQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinAtendente($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Atendente', '\AtendenteQuery');
    }

    /**
     * Filter the query by a related \Bairro object
     *
     * @param \Bairro|ObjectCollection $bairro The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildAtendimentoQuery The current query, for fluid interface
     */
    public function filterByBairro($bairro, $comparison = null)
    {
        if ($bairro instanceof \Bairro) {
            return $this
                ->addUsingAlias(AtendimentoTableMap::COL_BAIRRO_ID, $bairro->getId(), $comparison);
        } elseif ($bairro instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AtendimentoTableMap::COL_BAIRRO_ID, $bairro->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByBairro() only accepts arguments of type \Bairro or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Bairro relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildAtendimentoQuery The current query, for fluid interface
     */
    public function joinBairro($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Bairro');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Bairro');
        }

        return $this;
    }

    /**
     * Use the Bairro relation Bairro object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \BairroQuery A secondary query class using the current class as primary query
     */
    public function useBairroQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinBairro($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Bairro', '\BairroQuery');
    }

    /**
     * Filter the query by a related \Cidade object
     *
     * @param \Cidade|ObjectCollection $cidade The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildAtendimentoQuery The current query, for fluid interface
     */
    public function filterByCidade($cidade, $comparison = null)
    {
        if ($cidade instanceof \Cidade) {
            return $this
                ->addUsingAlias(AtendimentoTableMap::COL_CIDADE_ID, $cidade->getId(), $comparison);
        } elseif ($cidade instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AtendimentoTableMap::COL_CIDADE_ID, $cidade->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByCidade() only accepts arguments of type \Cidade or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Cidade relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildAtendimentoQuery The current query, for fluid interface
     */
    public function joinCidade($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Cidade');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Cidade');
        }

        return $this;
    }

    /**
     * Use the Cidade relation Cidade object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CidadeQuery A secondary query class using the current class as primary query
     */
    public function useCidadeQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCidade($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Cidade', '\CidadeQuery');
    }

    /**
     * Filter the query by a related \Contato object
     *
     * @param \Contato|ObjectCollection $contato The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildAtendimentoQuery The current query, for fluid interface
     */
    public function filterByContato($contato, $comparison = null)
    {
        if ($contato instanceof \Contato) {
            return $this
                ->addUsingAlias(AtendimentoTableMap::COL_CONTATO_ID, $contato->getId(), $comparison);
        } elseif ($contato instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AtendimentoTableMap::COL_CONTATO_ID, $contato->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByContato() only accepts arguments of type \Contato or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Contato relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildAtendimentoQuery The current query, for fluid interface
     */
    public function joinContato($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Contato');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Contato');
        }

        return $this;
    }

    /**
     * Use the Contato relation Contato object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ContatoQuery A secondary query class using the current class as primary query
     */
    public function useContatoQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinContato($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Contato', '\ContatoQuery');
    }

    /**
     * Filter the query by a related \Contrato object
     *
     * @param \Contrato|ObjectCollection $contrato The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildAtendimentoQuery The current query, for fluid interface
     */
    public function filterByContrato($contrato, $comparison = null)
    {
        if ($contrato instanceof \Contrato) {
            return $this
                ->addUsingAlias(AtendimentoTableMap::COL_CONTRATO_ID, $contrato->getId(), $comparison);
        } elseif ($contrato instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AtendimentoTableMap::COL_CONTRATO_ID, $contrato->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByContrato() only accepts arguments of type \Contrato or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Contrato relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildAtendimentoQuery The current query, for fluid interface
     */
    public function joinContrato($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Contrato');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Contrato');
        }

        return $this;
    }

    /**
     * Use the Contrato relation Contrato object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ContratoQuery A secondary query class using the current class as primary query
     */
    public function useContratoQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinContrato($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Contrato', '\ContratoQuery');
    }

    /**
     * Filter the query by a related \Estado object
     *
     * @param \Estado|ObjectCollection $estado The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildAtendimentoQuery The current query, for fluid interface
     */
    public function filterByEstado($estado, $comparison = null)
    {
        if ($estado instanceof \Estado) {
            return $this
                ->addUsingAlias(AtendimentoTableMap::COL_ESTADO_ID, $estado->getId(), $comparison);
        } elseif ($estado instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AtendimentoTableMap::COL_ESTADO_ID, $estado->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByEstado() only accepts arguments of type \Estado or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Estado relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildAtendimentoQuery The current query, for fluid interface
     */
    public function joinEstado($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Estado');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Estado');
        }

        return $this;
    }

    /**
     * Use the Estado relation Estado object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EstadoQuery A secondary query class using the current class as primary query
     */
    public function useEstadoQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinEstado($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Estado', '\EstadoQuery');
    }

    /**
     * Filter the query by a related \Motivo object
     *
     * @param \Motivo|ObjectCollection $motivo The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildAtendimentoQuery The current query, for fluid interface
     */
    public function filterByMotivo($motivo, $comparison = null)
    {
        if ($motivo instanceof \Motivo) {
            return $this
                ->addUsingAlias(AtendimentoTableMap::COL_MOTIVO_ID, $motivo->getId(), $comparison);
        } elseif ($motivo instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AtendimentoTableMap::COL_MOTIVO_ID, $motivo->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByMotivo() only accepts arguments of type \Motivo or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Motivo relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildAtendimentoQuery The current query, for fluid interface
     */
    public function joinMotivo($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Motivo');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Motivo');
        }

        return $this;
    }

    /**
     * Use the Motivo relation Motivo object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \MotivoQuery A secondary query class using the current class as primary query
     */
    public function useMotivoQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinMotivo($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Motivo', '\MotivoQuery');
    }

    /**
     * Filter the query by a related \Solicitacao object
     *
     * @param \Solicitacao|ObjectCollection $solicitacao The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildAtendimentoQuery The current query, for fluid interface
     */
    public function filterBySolicitacao($solicitacao, $comparison = null)
    {
        if ($solicitacao instanceof \Solicitacao) {
            return $this
                ->addUsingAlias(AtendimentoTableMap::COL_SOLICITACAO_ID, $solicitacao->getId(), $comparison);
        } elseif ($solicitacao instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AtendimentoTableMap::COL_SOLICITACAO_ID, $solicitacao->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterBySolicitacao() only accepts arguments of type \Solicitacao or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Solicitacao relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildAtendimentoQuery The current query, for fluid interface
     */
    public function joinSolicitacao($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Solicitacao');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Solicitacao');
        }

        return $this;
    }

    /**
     * Use the Solicitacao relation Solicitacao object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \SolicitacaoQuery A secondary query class using the current class as primary query
     */
    public function useSolicitacaoQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSolicitacao($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Solicitacao', '\SolicitacaoQuery');
    }

    /**
     * Filter the query by a related \Tag object
     *
     * @param \Tag|ObjectCollection $tag The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildAtendimentoQuery The current query, for fluid interface
     */
    public function filterByTag($tag, $comparison = null)
    {
        if ($tag instanceof \Tag) {
            return $this
                ->addUsingAlias(AtendimentoTableMap::COL_TAG_ID, $tag->getId(), $comparison);
        } elseif ($tag instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AtendimentoTableMap::COL_TAG_ID, $tag->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByTag() only accepts arguments of type \Tag or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Tag relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildAtendimentoQuery The current query, for fluid interface
     */
    public function joinTag($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Tag');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Tag');
        }

        return $this;
    }

    /**
     * Use the Tag relation Tag object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \TagQuery A secondary query class using the current class as primary query
     */
    public function useTagQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinTag($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Tag', '\TagQuery');
    }

    /**
     * Filter the query by a related \Tipo object
     *
     * @param \Tipo|ObjectCollection $tipo The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildAtendimentoQuery The current query, for fluid interface
     */
    public function filterByTipo($tipo, $comparison = null)
    {
        if ($tipo instanceof \Tipo) {
            return $this
                ->addUsingAlias(AtendimentoTableMap::COL_TIPO_ID, $tipo->getId(), $comparison);
        } elseif ($tipo instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AtendimentoTableMap::COL_TIPO_ID, $tipo->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByTipo() only accepts arguments of type \Tipo or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Tipo relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildAtendimentoQuery The current query, for fluid interface
     */
    public function joinTipo($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Tipo');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Tipo');
        }

        return $this;
    }

    /**
     * Use the Tipo relation Tipo object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \TipoQuery A secondary query class using the current class as primary query
     */
    public function useTipoQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinTipo($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Tipo', '\TipoQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAtendimento $atendimento Object to remove from the list of results
     *
     * @return $this|ChildAtendimentoQuery The current query, for fluid interface
     */
    public function prune($atendimento = null)
    {
        if ($atendimento) {
            $this->addUsingAlias(AtendimentoTableMap::COL_ID, $atendimento->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the atendimento table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AtendimentoTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AtendimentoTableMap::clearInstancePool();
            AtendimentoTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AtendimentoTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AtendimentoTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AtendimentoTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AtendimentoTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AtendimentoQuery
