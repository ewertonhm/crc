<?php

namespace App\App\Base;

use \Exception;
use \PDO;
use App\App\Contato as ChildContato;
use App\App\ContatoQuery as ChildContatoQuery;
use App\App\Map\ContatoTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'contato' table.
 *
 *
 *
 * @method     ChildContatoQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildContatoQuery orderByContato($order = Criteria::ASC) Order by the contato column
 *
 * @method     ChildContatoQuery groupById() Group by the id column
 * @method     ChildContatoQuery groupByContato() Group by the contato column
 *
 * @method     ChildContatoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildContatoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildContatoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildContatoQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildContatoQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildContatoQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildContatoQuery leftJoinAtendimentoRelatedByContatoId($relationAlias = null) Adds a LEFT JOIN clause to the query using the AtendimentoRelatedByContatoId relation
 * @method     ChildContatoQuery rightJoinAtendimentoRelatedByContatoId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AtendimentoRelatedByContatoId relation
 * @method     ChildContatoQuery innerJoinAtendimentoRelatedByContatoId($relationAlias = null) Adds a INNER JOIN clause to the query using the AtendimentoRelatedByContatoId relation
 *
 * @method     ChildContatoQuery joinWithAtendimentoRelatedByContatoId($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the AtendimentoRelatedByContatoId relation
 *
 * @method     ChildContatoQuery leftJoinWithAtendimentoRelatedByContatoId() Adds a LEFT JOIN clause and with to the query using the AtendimentoRelatedByContatoId relation
 * @method     ChildContatoQuery rightJoinWithAtendimentoRelatedByContatoId() Adds a RIGHT JOIN clause and with to the query using the AtendimentoRelatedByContatoId relation
 * @method     ChildContatoQuery innerJoinWithAtendimentoRelatedByContatoId() Adds a INNER JOIN clause and with to the query using the AtendimentoRelatedByContatoId relation
 *
 * @method     ChildContatoQuery leftJoinAtendimentoRelatedByContratoId($relationAlias = null) Adds a LEFT JOIN clause to the query using the AtendimentoRelatedByContratoId relation
 * @method     ChildContatoQuery rightJoinAtendimentoRelatedByContratoId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AtendimentoRelatedByContratoId relation
 * @method     ChildContatoQuery innerJoinAtendimentoRelatedByContratoId($relationAlias = null) Adds a INNER JOIN clause to the query using the AtendimentoRelatedByContratoId relation
 *
 * @method     ChildContatoQuery joinWithAtendimentoRelatedByContratoId($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the AtendimentoRelatedByContratoId relation
 *
 * @method     ChildContatoQuery leftJoinWithAtendimentoRelatedByContratoId() Adds a LEFT JOIN clause and with to the query using the AtendimentoRelatedByContratoId relation
 * @method     ChildContatoQuery rightJoinWithAtendimentoRelatedByContratoId() Adds a RIGHT JOIN clause and with to the query using the AtendimentoRelatedByContratoId relation
 * @method     ChildContatoQuery innerJoinWithAtendimentoRelatedByContratoId() Adds a INNER JOIN clause and with to the query using the AtendimentoRelatedByContratoId relation
 *
 * @method     \App\App\AtendimentoQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildContato findOne(ConnectionInterface $con = null) Return the first ChildContato matching the query
 * @method     ChildContato findOneOrCreate(ConnectionInterface $con = null) Return the first ChildContato matching the query, or a new ChildContato object populated from the query conditions when no match is found
 *
 * @method     ChildContato findOneById(int $id) Return the first ChildContato filtered by the id column
 * @method     ChildContato findOneByContato(string $contato) Return the first ChildContato filtered by the contato column *

 * @method     ChildContato requirePk($key, ConnectionInterface $con = null) Return the ChildContato by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildContato requireOne(ConnectionInterface $con = null) Return the first ChildContato matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildContato requireOneById(int $id) Return the first ChildContato filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildContato requireOneByContato(string $contato) Return the first ChildContato filtered by the contato column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildContato[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildContato objects based on current ModelCriteria
 * @method     ChildContato[]|ObjectCollection findById(int $id) Return ChildContato objects filtered by the id column
 * @method     ChildContato[]|ObjectCollection findByContato(string $contato) Return ChildContato objects filtered by the contato column
 * @method     ChildContato[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ContatoQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \App\App\Base\ContatoQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\App\\App\\Contato', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildContatoQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildContatoQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildContatoQuery) {
            return $criteria;
        }
        $query = new ChildContatoQuery();
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
     * @return ChildContato|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ContatoTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ContatoTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildContato A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, contato FROM contato WHERE id = :p0';
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
            /** @var ChildContato $obj */
            $obj = new ChildContato();
            $obj->hydrate($row);
            ContatoTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildContato|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildContatoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ContatoTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildContatoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ContatoTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildContatoQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ContatoTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ContatoTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContatoTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the contato column
     *
     * Example usage:
     * <code>
     * $query->filterByContato('fooValue');   // WHERE contato = 'fooValue'
     * $query->filterByContato('%fooValue%', Criteria::LIKE); // WHERE contato LIKE '%fooValue%'
     * </code>
     *
     * @param     string $contato The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildContatoQuery The current query, for fluid interface
     */
    public function filterByContato($contato = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($contato)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContatoTableMap::COL_CONTATO, $contato, $comparison);
    }

    /**
     * Filter the query by a related \App\App\Atendimento object
     *
     * @param \App\App\Atendimento|ObjectCollection $atendimento the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildContatoQuery The current query, for fluid interface
     */
    public function filterByAtendimentoRelatedByContatoId($atendimento, $comparison = null)
    {
        if ($atendimento instanceof \App\App\Atendimento) {
            return $this
                ->addUsingAlias(ContatoTableMap::COL_ID, $atendimento->getContatoId(), $comparison);
        } elseif ($atendimento instanceof ObjectCollection) {
            return $this
                ->useAtendimentoRelatedByContatoIdQuery()
                ->filterByPrimaryKeys($atendimento->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAtendimentoRelatedByContatoId() only accepts arguments of type \App\App\Atendimento or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AtendimentoRelatedByContatoId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildContatoQuery The current query, for fluid interface
     */
    public function joinAtendimentoRelatedByContatoId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AtendimentoRelatedByContatoId');

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
            $this->addJoinObject($join, 'AtendimentoRelatedByContatoId');
        }

        return $this;
    }

    /**
     * Use the AtendimentoRelatedByContatoId relation Atendimento object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \App\App\AtendimentoQuery A secondary query class using the current class as primary query
     */
    public function useAtendimentoRelatedByContatoIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinAtendimentoRelatedByContatoId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AtendimentoRelatedByContatoId', '\App\App\AtendimentoQuery');
    }

    /**
     * Filter the query by a related \App\App\Atendimento object
     *
     * @param \App\App\Atendimento|ObjectCollection $atendimento the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildContatoQuery The current query, for fluid interface
     */
    public function filterByAtendimentoRelatedByContratoId($atendimento, $comparison = null)
    {
        if ($atendimento instanceof \App\App\Atendimento) {
            return $this
                ->addUsingAlias(ContatoTableMap::COL_ID, $atendimento->getContratoId(), $comparison);
        } elseif ($atendimento instanceof ObjectCollection) {
            return $this
                ->useAtendimentoRelatedByContratoIdQuery()
                ->filterByPrimaryKeys($atendimento->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAtendimentoRelatedByContratoId() only accepts arguments of type \App\App\Atendimento or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AtendimentoRelatedByContratoId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildContatoQuery The current query, for fluid interface
     */
    public function joinAtendimentoRelatedByContratoId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AtendimentoRelatedByContratoId');

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
            $this->addJoinObject($join, 'AtendimentoRelatedByContratoId');
        }

        return $this;
    }

    /**
     * Use the AtendimentoRelatedByContratoId relation Atendimento object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \App\App\AtendimentoQuery A secondary query class using the current class as primary query
     */
    public function useAtendimentoRelatedByContratoIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinAtendimentoRelatedByContratoId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AtendimentoRelatedByContratoId', '\App\App\AtendimentoQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildContato $contato Object to remove from the list of results
     *
     * @return $this|ChildContatoQuery The current query, for fluid interface
     */
    public function prune($contato = null)
    {
        if ($contato) {
            $this->addUsingAlias(ContatoTableMap::COL_ID, $contato->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the contato table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ContatoTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ContatoTableMap::clearInstancePool();
            ContatoTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ContatoTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ContatoTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ContatoTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ContatoTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ContatoQuery
