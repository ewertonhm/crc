<?php

namespace Map;

use \Atendente;
use \AtendenteQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'atendente' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class AtendenteTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.AtendenteTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'atendente';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Atendente';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Atendente';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 9;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 9;

    /**
     * the column name for the id field
     */
    const COL_ID = 'atendente.id';

    /**
     * the column name for the nome field
     */
    const COL_NOME = 'atendente.nome';

    /**
     * the column name for the login field
     */
    const COL_LOGIN = 'atendente.login';

    /**
     * the column name for the senha field
     */
    const COL_SENHA = 'atendente.senha';

    /**
     * the column name for the permissao field
     */
    const COL_PERMISSAO = 'atendente.permissao';

    /**
     * the column name for the lista field
     */
    const COL_LISTA = 'atendente.lista';

    /**
     * the column name for the form field
     */
    const COL_FORM = 'atendente.form';

    /**
     * the column name for the tentativas field
     */
    const COL_TENTATIVAS = 'atendente.tentativas';

    /**
     * the column name for the desabilitado field
     */
    const COL_DESABILITADO = 'atendente.desabilitado';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Id', 'Nome', 'Login', 'Senha', 'Permissao', 'Lista', 'Form', 'Tentativas', 'Desabilitado', ),
        self::TYPE_CAMELNAME     => array('id', 'nome', 'login', 'senha', 'permissao', 'lista', 'form', 'tentativas', 'desabilitado', ),
        self::TYPE_COLNAME       => array(AtendenteTableMap::COL_ID, AtendenteTableMap::COL_NOME, AtendenteTableMap::COL_LOGIN, AtendenteTableMap::COL_SENHA, AtendenteTableMap::COL_PERMISSAO, AtendenteTableMap::COL_LISTA, AtendenteTableMap::COL_FORM, AtendenteTableMap::COL_TENTATIVAS, AtendenteTableMap::COL_DESABILITADO, ),
        self::TYPE_FIELDNAME     => array('id', 'nome', 'login', 'senha', 'permissao', 'lista', 'form', 'tentativas', 'desabilitado', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Nome' => 1, 'Login' => 2, 'Senha' => 3, 'Permissao' => 4, 'Lista' => 5, 'Form' => 6, 'Tentativas' => 7, 'Desabilitado' => 8, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'nome' => 1, 'login' => 2, 'senha' => 3, 'permissao' => 4, 'lista' => 5, 'form' => 6, 'tentativas' => 7, 'desabilitado' => 8, ),
        self::TYPE_COLNAME       => array(AtendenteTableMap::COL_ID => 0, AtendenteTableMap::COL_NOME => 1, AtendenteTableMap::COL_LOGIN => 2, AtendenteTableMap::COL_SENHA => 3, AtendenteTableMap::COL_PERMISSAO => 4, AtendenteTableMap::COL_LISTA => 5, AtendenteTableMap::COL_FORM => 6, AtendenteTableMap::COL_TENTATIVAS => 7, AtendenteTableMap::COL_DESABILITADO => 8, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'nome' => 1, 'login' => 2, 'senha' => 3, 'permissao' => 4, 'lista' => 5, 'form' => 6, 'tentativas' => 7, 'desabilitado' => 8, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('atendente');
        $this->setPhpName('Atendente');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Atendente');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        $this->setPrimaryKeyMethodInfo('atendente_id_seq');
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('nome', 'Nome', 'VARCHAR', true, 45, null);
        $this->addColumn('login', 'Login', 'VARCHAR', true, 45, null);
        $this->addColumn('senha', 'Senha', 'VARCHAR', true, 32, null);
        $this->addColumn('permissao', 'Permissao', 'INTEGER', false, null, null);
        $this->addColumn('lista', 'Lista', 'INTEGER', false, null, null);
        $this->addColumn('form', 'Form', 'INTEGER', false, null, null);
        $this->addColumn('tentativas', 'Tentativas', 'INTEGER', false, null, null);
        $this->addColumn('desabilitado', 'Desabilitado', 'INTEGER', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Atendimento', '\\Atendimento', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':atendente_id',
    1 => ':id',
  ),
), null, null, 'Atendimentos', false);
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? AtendenteTableMap::CLASS_DEFAULT : AtendenteTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (Atendente object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AtendenteTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AtendenteTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AtendenteTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AtendenteTableMap::OM_CLASS;
            /** @var Atendente $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AtendenteTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = AtendenteTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AtendenteTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Atendente $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AtendenteTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(AtendenteTableMap::COL_ID);
            $criteria->addSelectColumn(AtendenteTableMap::COL_NOME);
            $criteria->addSelectColumn(AtendenteTableMap::COL_LOGIN);
            $criteria->addSelectColumn(AtendenteTableMap::COL_SENHA);
            $criteria->addSelectColumn(AtendenteTableMap::COL_PERMISSAO);
            $criteria->addSelectColumn(AtendenteTableMap::COL_LISTA);
            $criteria->addSelectColumn(AtendenteTableMap::COL_FORM);
            $criteria->addSelectColumn(AtendenteTableMap::COL_TENTATIVAS);
            $criteria->addSelectColumn(AtendenteTableMap::COL_DESABILITADO);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.nome');
            $criteria->addSelectColumn($alias . '.login');
            $criteria->addSelectColumn($alias . '.senha');
            $criteria->addSelectColumn($alias . '.permissao');
            $criteria->addSelectColumn($alias . '.lista');
            $criteria->addSelectColumn($alias . '.form');
            $criteria->addSelectColumn($alias . '.tentativas');
            $criteria->addSelectColumn($alias . '.desabilitado');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(AtendenteTableMap::DATABASE_NAME)->getTable(AtendenteTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AtendenteTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AtendenteTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AtendenteTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Atendente or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Atendente object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AtendenteTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Atendente) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AtendenteTableMap::DATABASE_NAME);
            $criteria->add(AtendenteTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AtendenteQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AtendenteTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AtendenteTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the atendente table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AtendenteQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Atendente or Criteria object.
     *
     * @param mixed               $criteria Criteria or Atendente object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AtendenteTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Atendente object
        }

        if ($criteria->containsKey(AtendenteTableMap::COL_ID) && $criteria->keyContainsValue(AtendenteTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AtendenteTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AtendenteQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AtendenteTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AtendenteTableMap::buildTableMap();
