<?php

namespace Base;

use \Bairro as ChildBairro;
use \BairroQuery as ChildBairroQuery;
use \Exception;
use \PDO;
use Map\BairroTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'bairro' table.
 *
 *
 *
 * @method     ChildBairroQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildBairroQuery orderByNome($order = Criteria::ASC) Order by the nome column
 * @method     ChildBairroQuery orderByCidadeId($order = Criteria::ASC) Order by the cidade_id column
 * @method     ChildBairroQuery orderByDesabilitado($order = Criteria::ASC) Order by the desabilitado column
 *
 * @method     ChildBairroQuery groupById() Group by the id column
 * @method     ChildBairroQuery groupByNome() Group by the nome column
 * @method     ChildBairroQuery groupByCidadeId() Group by the cidade_id column
 * @method     ChildBairroQuery groupByDesabilitado() Group by the desabilitado column
 *
 * @method     ChildBairroQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildBairroQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildBairroQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildBairroQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildBairroQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildBairroQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildBairroQuery leftJoinCidade($relationAlias = null) Adds a LEFT JOIN clause to the query using the Cidade relation
 * @method     ChildBairroQuery rightJoinCidade($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Cidade relation
 * @method     ChildBairroQuery innerJoinCidade($relationAlias = null) Adds a INNER JOIN clause to the query using the Cidade relation
 *
 * @method     ChildBairroQuery joinWithCidade($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Cidade relation
 *
 * @method     ChildBairroQuery leftJoinWithCidade() Adds a LEFT JOIN clause and with to the query using the Cidade relation
 * @method     ChildBairroQuery rightJoinWithCidade() Adds a RIGHT JOIN clause and with to the query using the Cidade relation
 * @method     ChildBairroQuery innerJoinWithCidade() Adds a INNER JOIN clause and with to the query using the Cidade relation
 *
 * @method     ChildBairroQuery leftJoinAtendimento($relationAlias = null) Adds a LEFT JOIN clause to the query using the Atendimento relation
 * @method     ChildBairroQuery rightJoinAtendimento($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Atendimento relation
 * @method     ChildBairroQuery innerJoinAtendimento($relationAlias = null) Adds a INNER JOIN clause to the query using the Atendimento relation
 *
 * @method     ChildBairroQuery joinWithAtendimento($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Atendimento relation
 *
 * @method     ChildBairroQuery leftJoinWithAtendimento() Adds a LEFT JOIN clause and with to the query using the Atendimento relation
 * @method     ChildBairroQuery rightJoinWithAtendimento() Adds a RIGHT JOIN clause and with to the query using the Atendimento relation
 * @method     ChildBairroQuery innerJoinWithAtendimento() Adds a INNER JOIN clause and with to the query using the Atendimento relation
 *
 * @method     \CidadeQuery|\AtendimentoQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildBairro findOne(ConnectionInterface $con = null) Return the first ChildBairro matching the query
 * @method     ChildBairro findOneOrCreate(ConnectionInterface $con = null) Return the first ChildBairro matching the query, or a new ChildBairro object populated from the query conditions when no match is found
 *
 * @method     ChildBairro findOneById(int $id) Return the first ChildBairro filtered by the id column
 * @method     ChildBairro findOneByNome(string $nome) Return the first ChildBairro filtered by the nome column
 * @method     ChildBairro findOneByCidadeId(int $cidade_id) Return the first ChildBairro filtered by the cidade_id column
 * @method     ChildBairro findOneByDesabilitado(int $desabilitado) Return the first ChildBairro filtered by the desabilitado column *

 * @method     ChildBairro requirePk($key, ConnectionInterface $con = null) Return the ChildBairro by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBairro requireOne(ConnectionInterface $con = null) Return the first ChildBairro matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildBairro requireOneById(int $id) Return the first ChildBairro filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBairro requireOneByNome(string $nome) Return the first ChildBairro filtered by the nome column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBairro requireOneByCidadeId(int $cidade_id) Return the first ChildBairro filtered by the cidade_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBairro requireOneByDesabilitado(int $desabilitado) Return the first ChildBairro filtered by the desabilitado column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildBairro[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildBairro objects based on current ModelCriteria
 * @method     ChildBairro[]|ObjectCollection findById(int $id) Return ChildBairro objects filtered by the id column
 * @method     ChildBairro[]|ObjectCollection findByNome(string $nome) Return ChildBairro objects filtered by the nome column
 * @method     ChildBairro[]|ObjectCollection findByCidadeId(int $cidade_id) Return ChildBairro objects filtered by the cidade_id column
 * @method     ChildBairro[]|ObjectCollection findByDesabilitado(int $desabilitado) Return ChildBairro objects filtered by the desabilitado column
 * @method     ChildBairro[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class BairroQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\BairroQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Bairro', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildBairroQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildBairroQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildBairroQuery) {
            return $criteria;
        }
        $query = new ChildBairroQuery();
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
     * @return ChildBairro|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(BairroTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = BairroTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildBairro A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, nome, cidade_id, desabilitado FROM bairro WHERE id = :p0';
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
            /** @var ChildBairro $obj */
            $obj = new ChildBairro();
            $obj->hydrate($row);
            BairroTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildBairro|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildBairroQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(BairroTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildBairroQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(BairroTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildBairroQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(BairroTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(BairroTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BairroTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the nome column
     *
     * Example usage:
     * <code>
     * $query->filterByNome('fooValue');   // WHERE nome = 'fooValue'
     * $query->filterByNome('%fooValue%', Criteria::LIKE); // WHERE nome LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nome The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBairroQuery The current query, for fluid interface
     */
    public function filterByNome($nome = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nome)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BairroTableMap::COL_NOME, $nome, $comparison);
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
     * @return $this|ChildBairroQuery The current query, for fluid interface
     */
    public function filterByCidadeId($cidadeId = null, $comparison = null)
    {
        if (is_array($cidadeId)) {
            $useMinMax = false;
            if (isset($cidadeId['min'])) {
                $this->addUsingAlias(BairroTableMap::COL_CIDADE_ID, $cidadeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cidadeId['max'])) {
                $this->addUsingAlias(BairroTableMap::COL_CIDADE_ID, $cidadeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BairroTableMap::COL_CIDADE_ID, $cidadeId, $comparison);
    }

    /**
     * Filter the query on the desabilitado column
     *
     * Example usage:
     * <code>
     * $query->filterByDesabilitado(1234); // WHERE desabilitado = 1234
     * $query->filterByDesabilitado(array(12, 34)); // WHERE desabilitado IN (12, 34)
     * $query->filterByDesabilitado(array('min' => 12)); // WHERE desabilitado > 12
     * </code>
     *
     * @param     mixed $desabilitado The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBairroQuery The current query, for fluid interface
     */
    public function filterByDesabilitado($desabilitado = null, $comparison = null)
    {
        if (is_array($desabilitado)) {
            $useMinMax = false;
            if (isset($desabilitado['min'])) {
                $this->addUsingAlias(BairroTableMap::COL_DESABILITADO, $desabilitado['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($desabilitado['max'])) {
                $this->addUsingAlias(BairroTableMap::COL_DESABILITADO, $desabilitado['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BairroTableMap::COL_DESABILITADO, $desabilitado, $comparison);
    }

    /**
     * Filter the query by a related \Cidade object
     *
     * @param \Cidade|ObjectCollection $cidade The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildBairroQuery The current query, for fluid interface
     */
    public function filterByCidade($cidade, $comparison = null)
    {
        if ($cidade instanceof \Cidade) {
            return $this
                ->addUsingAlias(BairroTableMap::COL_CIDADE_ID, $cidade->getId(), $comparison);
        } elseif ($cidade instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BairroTableMap::COL_CIDADE_ID, $cidade->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildBairroQuery The current query, for fluid interface
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
     * Filter the query by a related \Atendimento object
     *
     * @param \Atendimento|ObjectCollection $atendimento the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildBairroQuery The current query, for fluid interface
     */
    public function filterByAtendimento($atendimento, $comparison = null)
    {
        if ($atendimento instanceof \Atendimento) {
            return $this
                ->addUsingAlias(BairroTableMap::COL_ID, $atendimento->getBairroId(), $comparison);
        } elseif ($atendimento instanceof ObjectCollection) {
            return $this
                ->useAtendimentoQuery()
                ->filterByPrimaryKeys($atendimento->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAtendimento() only accepts arguments of type \Atendimento or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Atendimento relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildBairroQuery The current query, for fluid interface
     */
    public function joinAtendimento($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Atendimento');

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
            $this->addJoinObject($join, 'Atendimento');
        }

        return $this;
    }

    /**
     * Use the Atendimento relation Atendimento object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \AtendimentoQuery A secondary query class using the current class as primary query
     */
    public function useAtendimentoQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinAtendimento($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Atendimento', '\AtendimentoQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildBairro $bairro Object to remove from the list of results
     *
     * @return $this|ChildBairroQuery The current query, for fluid interface
     */
    public function prune($bairro = null)
    {
        if ($bairro) {
            $this->addUsingAlias(BairroTableMap::COL_ID, $bairro->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the bairro table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(BairroTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            BairroTableMap::clearInstancePool();
            BairroTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(BairroTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(BairroTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            BairroTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            BairroTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // BairroQuery
