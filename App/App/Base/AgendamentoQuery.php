<?php

namespace App\App\Base;

use \Exception;
use \PDO;
use App\App\Agendamento as ChildAgendamento;
use App\App\AgendamentoQuery as ChildAgendamentoQuery;
use App\App\Map\AgendamentoTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'agendamento' table.
 *
 *
 *
 * @method     ChildAgendamentoQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAgendamentoQuery orderByAgendamento($order = Criteria::ASC) Order by the agendamento column
 *
 * @method     ChildAgendamentoQuery groupById() Group by the id column
 * @method     ChildAgendamentoQuery groupByAgendamento() Group by the agendamento column
 *
 * @method     ChildAgendamentoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAgendamentoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAgendamentoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAgendamentoQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAgendamentoQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAgendamentoQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAgendamentoQuery leftJoinAtendimento($relationAlias = null) Adds a LEFT JOIN clause to the query using the Atendimento relation
 * @method     ChildAgendamentoQuery rightJoinAtendimento($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Atendimento relation
 * @method     ChildAgendamentoQuery innerJoinAtendimento($relationAlias = null) Adds a INNER JOIN clause to the query using the Atendimento relation
 *
 * @method     ChildAgendamentoQuery joinWithAtendimento($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Atendimento relation
 *
 * @method     ChildAgendamentoQuery leftJoinWithAtendimento() Adds a LEFT JOIN clause and with to the query using the Atendimento relation
 * @method     ChildAgendamentoQuery rightJoinWithAtendimento() Adds a RIGHT JOIN clause and with to the query using the Atendimento relation
 * @method     ChildAgendamentoQuery innerJoinWithAtendimento() Adds a INNER JOIN clause and with to the query using the Atendimento relation
 *
 * @method     \App\App\AtendimentoQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildAgendamento findOne(ConnectionInterface $con = null) Return the first ChildAgendamento matching the query
 * @method     ChildAgendamento findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAgendamento matching the query, or a new ChildAgendamento object populated from the query conditions when no match is found
 *
 * @method     ChildAgendamento findOneById(int $id) Return the first ChildAgendamento filtered by the id column
 * @method     ChildAgendamento findOneByAgendamento(string $agendamento) Return the first ChildAgendamento filtered by the agendamento column *

 * @method     ChildAgendamento requirePk($key, ConnectionInterface $con = null) Return the ChildAgendamento by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAgendamento requireOne(ConnectionInterface $con = null) Return the first ChildAgendamento matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAgendamento requireOneById(int $id) Return the first ChildAgendamento filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAgendamento requireOneByAgendamento(string $agendamento) Return the first ChildAgendamento filtered by the agendamento column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAgendamento[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAgendamento objects based on current ModelCriteria
 * @method     ChildAgendamento[]|ObjectCollection findById(int $id) Return ChildAgendamento objects filtered by the id column
 * @method     ChildAgendamento[]|ObjectCollection findByAgendamento(string $agendamento) Return ChildAgendamento objects filtered by the agendamento column
 * @method     ChildAgendamento[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AgendamentoQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \App\App\Base\AgendamentoQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\App\\App\\Agendamento', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAgendamentoQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAgendamentoQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAgendamentoQuery) {
            return $criteria;
        }
        $query = new ChildAgendamentoQuery();
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
     * @return ChildAgendamento|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AgendamentoTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AgendamentoTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAgendamento A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, agendamento FROM agendamento WHERE id = :p0';
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
            /** @var ChildAgendamento $obj */
            $obj = new ChildAgendamento();
            $obj->hydrate($row);
            AgendamentoTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAgendamento|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAgendamentoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AgendamentoTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAgendamentoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AgendamentoTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAgendamentoQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AgendamentoTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AgendamentoTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AgendamentoTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the agendamento column
     *
     * Example usage:
     * <code>
     * $query->filterByAgendamento('fooValue');   // WHERE agendamento = 'fooValue'
     * $query->filterByAgendamento('%fooValue%', Criteria::LIKE); // WHERE agendamento LIKE '%fooValue%'
     * </code>
     *
     * @param     string $agendamento The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAgendamentoQuery The current query, for fluid interface
     */
    public function filterByAgendamento($agendamento = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($agendamento)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AgendamentoTableMap::COL_AGENDAMENTO, $agendamento, $comparison);
    }

    /**
     * Filter the query by a related \App\App\Atendimento object
     *
     * @param \App\App\Atendimento|ObjectCollection $atendimento the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildAgendamentoQuery The current query, for fluid interface
     */
    public function filterByAtendimento($atendimento, $comparison = null)
    {
        if ($atendimento instanceof \App\App\Atendimento) {
            return $this
                ->addUsingAlias(AgendamentoTableMap::COL_ID, $atendimento->getAgendamentoId(), $comparison);
        } elseif ($atendimento instanceof ObjectCollection) {
            return $this
                ->useAtendimentoQuery()
                ->filterByPrimaryKeys($atendimento->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAtendimento() only accepts arguments of type \App\App\Atendimento or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Atendimento relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildAgendamentoQuery The current query, for fluid interface
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
     * @return \App\App\AtendimentoQuery A secondary query class using the current class as primary query
     */
    public function useAtendimentoQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinAtendimento($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Atendimento', '\App\App\AtendimentoQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAgendamento $agendamento Object to remove from the list of results
     *
     * @return $this|ChildAgendamentoQuery The current query, for fluid interface
     */
    public function prune($agendamento = null)
    {
        if ($agendamento) {
            $this->addUsingAlias(AgendamentoTableMap::COL_ID, $agendamento->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the agendamento table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AgendamentoTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AgendamentoTableMap::clearInstancePool();
            AgendamentoTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AgendamentoTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AgendamentoTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AgendamentoTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AgendamentoTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AgendamentoQuery
