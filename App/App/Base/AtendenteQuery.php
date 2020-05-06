<?php

namespace App\App\Base;

use \Exception;
use \PDO;
use App\App\Atendente as ChildAtendente;
use App\App\AtendenteQuery as ChildAtendenteQuery;
use App\App\Map\AtendenteTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'atendente' table.
 *
 *
 *
 * @method     ChildAtendenteQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAtendenteQuery orderByNome($order = Criteria::ASC) Order by the nome column
 * @method     ChildAtendenteQuery orderByLogin($order = Criteria::ASC) Order by the login column
 * @method     ChildAtendenteQuery orderBySenha($order = Criteria::ASC) Order by the senha column
 * @method     ChildAtendenteQuery orderByPermissao($order = Criteria::ASC) Order by the permissao column
 *
 * @method     ChildAtendenteQuery groupById() Group by the id column
 * @method     ChildAtendenteQuery groupByNome() Group by the nome column
 * @method     ChildAtendenteQuery groupByLogin() Group by the login column
 * @method     ChildAtendenteQuery groupBySenha() Group by the senha column
 * @method     ChildAtendenteQuery groupByPermissao() Group by the permissao column
 *
 * @method     ChildAtendenteQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAtendenteQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAtendenteQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAtendenteQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAtendenteQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAtendenteQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAtendente findOne(ConnectionInterface $con = null) Return the first ChildAtendente matching the query
 * @method     ChildAtendente findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAtendente matching the query, or a new ChildAtendente object populated from the query conditions when no match is found
 *
 * @method     ChildAtendente findOneById(int $id) Return the first ChildAtendente filtered by the id column
 * @method     ChildAtendente findOneByNome(string $nome) Return the first ChildAtendente filtered by the nome column
 * @method     ChildAtendente findOneByLogin(string $login) Return the first ChildAtendente filtered by the login column
 * @method     ChildAtendente findOneBySenha(string $senha) Return the first ChildAtendente filtered by the senha column
 * @method     ChildAtendente findOneByPermissao(int $permissao) Return the first ChildAtendente filtered by the permissao column *

 * @method     ChildAtendente requirePk($key, ConnectionInterface $con = null) Return the ChildAtendente by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAtendente requireOne(ConnectionInterface $con = null) Return the first ChildAtendente matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAtendente requireOneById(int $id) Return the first ChildAtendente filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAtendente requireOneByNome(string $nome) Return the first ChildAtendente filtered by the nome column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAtendente requireOneByLogin(string $login) Return the first ChildAtendente filtered by the login column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAtendente requireOneBySenha(string $senha) Return the first ChildAtendente filtered by the senha column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAtendente requireOneByPermissao(int $permissao) Return the first ChildAtendente filtered by the permissao column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAtendente[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAtendente objects based on current ModelCriteria
 * @method     ChildAtendente[]|ObjectCollection findById(int $id) Return ChildAtendente objects filtered by the id column
 * @method     ChildAtendente[]|ObjectCollection findByNome(string $nome) Return ChildAtendente objects filtered by the nome column
 * @method     ChildAtendente[]|ObjectCollection findByLogin(string $login) Return ChildAtendente objects filtered by the login column
 * @method     ChildAtendente[]|ObjectCollection findBySenha(string $senha) Return ChildAtendente objects filtered by the senha column
 * @method     ChildAtendente[]|ObjectCollection findByPermissao(int $permissao) Return ChildAtendente objects filtered by the permissao column
 * @method     ChildAtendente[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AtendenteQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \App\App\Base\AtendenteQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\App\\App\\Atendente', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAtendenteQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAtendenteQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAtendenteQuery) {
            return $criteria;
        }
        $query = new ChildAtendenteQuery();
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
     * @return ChildAtendente|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AtendenteTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AtendenteTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAtendente A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, nome, login, senha, permissao FROM atendente WHERE id = :p0';
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
            /** @var ChildAtendente $obj */
            $obj = new ChildAtendente();
            $obj->hydrate($row);
            AtendenteTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAtendente|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAtendenteQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AtendenteTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAtendenteQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AtendenteTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAtendenteQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AtendenteTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AtendenteTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AtendenteTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildAtendenteQuery The current query, for fluid interface
     */
    public function filterByNome($nome = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nome)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AtendenteTableMap::COL_NOME, $nome, $comparison);
    }

    /**
     * Filter the query on the login column
     *
     * Example usage:
     * <code>
     * $query->filterByLogin('fooValue');   // WHERE login = 'fooValue'
     * $query->filterByLogin('%fooValue%', Criteria::LIKE); // WHERE login LIKE '%fooValue%'
     * </code>
     *
     * @param     string $login The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAtendenteQuery The current query, for fluid interface
     */
    public function filterByLogin($login = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($login)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AtendenteTableMap::COL_LOGIN, $login, $comparison);
    }

    /**
     * Filter the query on the senha column
     *
     * Example usage:
     * <code>
     * $query->filterBySenha('fooValue');   // WHERE senha = 'fooValue'
     * $query->filterBySenha('%fooValue%', Criteria::LIKE); // WHERE senha LIKE '%fooValue%'
     * </code>
     *
     * @param     string $senha The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAtendenteQuery The current query, for fluid interface
     */
    public function filterBySenha($senha = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($senha)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AtendenteTableMap::COL_SENHA, $senha, $comparison);
    }

    /**
     * Filter the query on the permissao column
     *
     * Example usage:
     * <code>
     * $query->filterByPermissao(1234); // WHERE permissao = 1234
     * $query->filterByPermissao(array(12, 34)); // WHERE permissao IN (12, 34)
     * $query->filterByPermissao(array('min' => 12)); // WHERE permissao > 12
     * </code>
     *
     * @param     mixed $permissao The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAtendenteQuery The current query, for fluid interface
     */
    public function filterByPermissao($permissao = null, $comparison = null)
    {
        if (is_array($permissao)) {
            $useMinMax = false;
            if (isset($permissao['min'])) {
                $this->addUsingAlias(AtendenteTableMap::COL_PERMISSAO, $permissao['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($permissao['max'])) {
                $this->addUsingAlias(AtendenteTableMap::COL_PERMISSAO, $permissao['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AtendenteTableMap::COL_PERMISSAO, $permissao, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAtendente $atendente Object to remove from the list of results
     *
     * @return $this|ChildAtendenteQuery The current query, for fluid interface
     */
    public function prune($atendente = null)
    {
        if ($atendente) {
            $this->addUsingAlias(AtendenteTableMap::COL_ID, $atendente->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the atendente table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AtendenteTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AtendenteTableMap::clearInstancePool();
            AtendenteTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AtendenteTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AtendenteTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AtendenteTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AtendenteTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AtendenteQuery
