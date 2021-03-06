<?php

namespace Base;

use \Tipo as ChildTipo;
use \TipoQuery as ChildTipoQuery;
use \Exception;
use \PDO;
use Map\TipoTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'tipo' table.
 *
 *
 *
 * @method     ChildTipoQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildTipoQuery orderByTipo($order = Criteria::ASC) Order by the tipo column
 * @method     ChildTipoQuery orderByDesabilitado($order = Criteria::ASC) Order by the desabilitado column
 *
 * @method     ChildTipoQuery groupById() Group by the id column
 * @method     ChildTipoQuery groupByTipo() Group by the tipo column
 * @method     ChildTipoQuery groupByDesabilitado() Group by the desabilitado column
 *
 * @method     ChildTipoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTipoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTipoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTipoQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildTipoQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildTipoQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildTipoQuery leftJoinAtendimento($relationAlias = null) Adds a LEFT JOIN clause to the query using the Atendimento relation
 * @method     ChildTipoQuery rightJoinAtendimento($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Atendimento relation
 * @method     ChildTipoQuery innerJoinAtendimento($relationAlias = null) Adds a INNER JOIN clause to the query using the Atendimento relation
 *
 * @method     ChildTipoQuery joinWithAtendimento($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Atendimento relation
 *
 * @method     ChildTipoQuery leftJoinWithAtendimento() Adds a LEFT JOIN clause and with to the query using the Atendimento relation
 * @method     ChildTipoQuery rightJoinWithAtendimento() Adds a RIGHT JOIN clause and with to the query using the Atendimento relation
 * @method     ChildTipoQuery innerJoinWithAtendimento() Adds a INNER JOIN clause and with to the query using the Atendimento relation
 *
 * @method     \AtendimentoQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildTipo findOne(ConnectionInterface $con = null) Return the first ChildTipo matching the query
 * @method     ChildTipo findOneOrCreate(ConnectionInterface $con = null) Return the first ChildTipo matching the query, or a new ChildTipo object populated from the query conditions when no match is found
 *
 * @method     ChildTipo findOneById(int $id) Return the first ChildTipo filtered by the id column
 * @method     ChildTipo findOneByTipo(string $tipo) Return the first ChildTipo filtered by the tipo column
 * @method     ChildTipo findOneByDesabilitado(int $desabilitado) Return the first ChildTipo filtered by the desabilitado column *

 * @method     ChildTipo requirePk($key, ConnectionInterface $con = null) Return the ChildTipo by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTipo requireOne(ConnectionInterface $con = null) Return the first ChildTipo matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTipo requireOneById(int $id) Return the first ChildTipo filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTipo requireOneByTipo(string $tipo) Return the first ChildTipo filtered by the tipo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTipo requireOneByDesabilitado(int $desabilitado) Return the first ChildTipo filtered by the desabilitado column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTipo[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildTipo objects based on current ModelCriteria
 * @method     ChildTipo[]|ObjectCollection findById(int $id) Return ChildTipo objects filtered by the id column
 * @method     ChildTipo[]|ObjectCollection findByTipo(string $tipo) Return ChildTipo objects filtered by the tipo column
 * @method     ChildTipo[]|ObjectCollection findByDesabilitado(int $desabilitado) Return ChildTipo objects filtered by the desabilitado column
 * @method     ChildTipo[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class TipoQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\TipoQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Tipo', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildTipoQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildTipoQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildTipoQuery) {
            return $criteria;
        }
        $query = new ChildTipoQuery();
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
     * @return ChildTipo|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TipoTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = TipoTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildTipo A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, tipo, desabilitado FROM tipo WHERE id = :p0';
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
            /** @var ChildTipo $obj */
            $obj = new ChildTipo();
            $obj->hydrate($row);
            TipoTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildTipo|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildTipoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TipoTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildTipoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TipoTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildTipoQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(TipoTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(TipoTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TipoTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the tipo column
     *
     * Example usage:
     * <code>
     * $query->filterByTipo('fooValue');   // WHERE tipo = 'fooValue'
     * $query->filterByTipo('%fooValue%', Criteria::LIKE); // WHERE tipo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tipo The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTipoQuery The current query, for fluid interface
     */
    public function filterByTipo($tipo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tipo)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TipoTableMap::COL_TIPO, $tipo, $comparison);
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
     * @return $this|ChildTipoQuery The current query, for fluid interface
     */
    public function filterByDesabilitado($desabilitado = null, $comparison = null)
    {
        if (is_array($desabilitado)) {
            $useMinMax = false;
            if (isset($desabilitado['min'])) {
                $this->addUsingAlias(TipoTableMap::COL_DESABILITADO, $desabilitado['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($desabilitado['max'])) {
                $this->addUsingAlias(TipoTableMap::COL_DESABILITADO, $desabilitado['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TipoTableMap::COL_DESABILITADO, $desabilitado, $comparison);
    }

    /**
     * Filter the query by a related \Atendimento object
     *
     * @param \Atendimento|ObjectCollection $atendimento the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildTipoQuery The current query, for fluid interface
     */
    public function filterByAtendimento($atendimento, $comparison = null)
    {
        if ($atendimento instanceof \Atendimento) {
            return $this
                ->addUsingAlias(TipoTableMap::COL_ID, $atendimento->getTipoId(), $comparison);
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
     * @return $this|ChildTipoQuery The current query, for fluid interface
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
     * @param   ChildTipo $tipo Object to remove from the list of results
     *
     * @return $this|ChildTipoQuery The current query, for fluid interface
     */
    public function prune($tipo = null)
    {
        if ($tipo) {
            $this->addUsingAlias(TipoTableMap::COL_ID, $tipo->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the tipo table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TipoTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TipoTableMap::clearInstancePool();
            TipoTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(TipoTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(TipoTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            TipoTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            TipoTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // TipoQuery
