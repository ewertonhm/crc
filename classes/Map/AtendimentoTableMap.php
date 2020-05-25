<?php

namespace Map;

use \Atendimento;
use \AtendimentoQuery;
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
 * This class defines the structure of the 'atendimento' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class AtendimentoTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.AtendimentoTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'atendimento';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Atendimento';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Atendimento';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 18;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 18;

    /**
     * the column name for the id field
     */
    const COL_ID = 'atendimento.id';

    /**
     * the column name for the data field
     */
    const COL_DATA = 'atendimento.data';

    /**
     * the column name for the hora field
     */
    const COL_HORA = 'atendimento.hora';

    /**
     * the column name for the cadastro field
     */
    const COL_CADASTRO = 'atendimento.cadastro';

    /**
     * the column name for the cliente field
     */
    const COL_CLIENTE = 'atendimento.cliente';

    /**
     * the column name for the tipo_id field
     */
    const COL_TIPO_ID = 'atendimento.tipo_id';

    /**
     * the column name for the bairro_id field
     */
    const COL_BAIRRO_ID = 'atendimento.bairro_id';

    /**
     * the column name for the cidade_id field
     */
    const COL_CIDADE_ID = 'atendimento.cidade_id';

    /**
     * the column name for the estado_id field
     */
    const COL_ESTADO_ID = 'atendimento.estado_id';

    /**
     * the column name for the contato_id field
     */
    const COL_CONTATO_ID = 'atendimento.contato_id';

    /**
     * the column name for the solicitacao_id field
     */
    const COL_SOLICITACAO_ID = 'atendimento.solicitacao_id';

    /**
     * the column name for the motivo_id field
     */
    const COL_MOTIVO_ID = 'atendimento.motivo_id';

    /**
     * the column name for the contrato_id field
     */
    const COL_CONTRATO_ID = 'atendimento.contrato_id';

    /**
     * the column name for the agendamento_id field
     */
    const COL_AGENDAMENTO_ID = 'atendimento.agendamento_id';

    /**
     * the column name for the atendente_id field
     */
    const COL_ATENDENTE_ID = 'atendimento.atendente_id';

    /**
     * the column name for the telefone field
     */
    const COL_TELEFONE = 'atendimento.telefone';

    /**
     * the column name for the tag_id field
     */
    const COL_TAG_ID = 'atendimento.tag_id';

    /**
     * the column name for the conferido field
     */
    const COL_CONFERIDO = 'atendimento.conferido';

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
        self::TYPE_PHPNAME       => array('Id', 'Data', 'Hora', 'Cadastro', 'Cliente', 'TipoId', 'BairroId', 'CidadeId', 'EstadoId', 'ContatoId', 'SolicitacaoId', 'MotivoId', 'ContratoId', 'AgendamentoId', 'AtendenteId', 'Telefone', 'TagId', 'Conferido', ),
        self::TYPE_CAMELNAME     => array('id', 'data', 'hora', 'cadastro', 'cliente', 'tipoId', 'bairroId', 'cidadeId', 'estadoId', 'contatoId', 'solicitacaoId', 'motivoId', 'contratoId', 'agendamentoId', 'atendenteId', 'telefone', 'tagId', 'conferido', ),
        self::TYPE_COLNAME       => array(AtendimentoTableMap::COL_ID, AtendimentoTableMap::COL_DATA, AtendimentoTableMap::COL_HORA, AtendimentoTableMap::COL_CADASTRO, AtendimentoTableMap::COL_CLIENTE, AtendimentoTableMap::COL_TIPO_ID, AtendimentoTableMap::COL_BAIRRO_ID, AtendimentoTableMap::COL_CIDADE_ID, AtendimentoTableMap::COL_ESTADO_ID, AtendimentoTableMap::COL_CONTATO_ID, AtendimentoTableMap::COL_SOLICITACAO_ID, AtendimentoTableMap::COL_MOTIVO_ID, AtendimentoTableMap::COL_CONTRATO_ID, AtendimentoTableMap::COL_AGENDAMENTO_ID, AtendimentoTableMap::COL_ATENDENTE_ID, AtendimentoTableMap::COL_TELEFONE, AtendimentoTableMap::COL_TAG_ID, AtendimentoTableMap::COL_CONFERIDO, ),
        self::TYPE_FIELDNAME     => array('id', 'data', 'hora', 'cadastro', 'cliente', 'tipo_id', 'bairro_id', 'cidade_id', 'estado_id', 'contato_id', 'solicitacao_id', 'motivo_id', 'contrato_id', 'agendamento_id', 'atendente_id', 'telefone', 'tag_id', 'conferido', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Data' => 1, 'Hora' => 2, 'Cadastro' => 3, 'Cliente' => 4, 'TipoId' => 5, 'BairroId' => 6, 'CidadeId' => 7, 'EstadoId' => 8, 'ContatoId' => 9, 'SolicitacaoId' => 10, 'MotivoId' => 11, 'ContratoId' => 12, 'AgendamentoId' => 13, 'AtendenteId' => 14, 'Telefone' => 15, 'TagId' => 16, 'Conferido' => 17, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'data' => 1, 'hora' => 2, 'cadastro' => 3, 'cliente' => 4, 'tipoId' => 5, 'bairroId' => 6, 'cidadeId' => 7, 'estadoId' => 8, 'contatoId' => 9, 'solicitacaoId' => 10, 'motivoId' => 11, 'contratoId' => 12, 'agendamentoId' => 13, 'atendenteId' => 14, 'telefone' => 15, 'tagId' => 16, 'conferido' => 17, ),
        self::TYPE_COLNAME       => array(AtendimentoTableMap::COL_ID => 0, AtendimentoTableMap::COL_DATA => 1, AtendimentoTableMap::COL_HORA => 2, AtendimentoTableMap::COL_CADASTRO => 3, AtendimentoTableMap::COL_CLIENTE => 4, AtendimentoTableMap::COL_TIPO_ID => 5, AtendimentoTableMap::COL_BAIRRO_ID => 6, AtendimentoTableMap::COL_CIDADE_ID => 7, AtendimentoTableMap::COL_ESTADO_ID => 8, AtendimentoTableMap::COL_CONTATO_ID => 9, AtendimentoTableMap::COL_SOLICITACAO_ID => 10, AtendimentoTableMap::COL_MOTIVO_ID => 11, AtendimentoTableMap::COL_CONTRATO_ID => 12, AtendimentoTableMap::COL_AGENDAMENTO_ID => 13, AtendimentoTableMap::COL_ATENDENTE_ID => 14, AtendimentoTableMap::COL_TELEFONE => 15, AtendimentoTableMap::COL_TAG_ID => 16, AtendimentoTableMap::COL_CONFERIDO => 17, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'data' => 1, 'hora' => 2, 'cadastro' => 3, 'cliente' => 4, 'tipo_id' => 5, 'bairro_id' => 6, 'cidade_id' => 7, 'estado_id' => 8, 'contato_id' => 9, 'solicitacao_id' => 10, 'motivo_id' => 11, 'contrato_id' => 12, 'agendamento_id' => 13, 'atendente_id' => 14, 'telefone' => 15, 'tag_id' => 16, 'conferido' => 17, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
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
        $this->setName('atendimento');
        $this->setPhpName('Atendimento');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Atendimento');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        $this->setPrimaryKeyMethodInfo('atendimento_id_seq');
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('data', 'Data', 'VARCHAR', true, 10, null);
        $this->addColumn('hora', 'Hora', 'VARCHAR', true, 8, null);
        $this->addColumn('cadastro', 'Cadastro', 'INTEGER', false, null, null);
        $this->addColumn('cliente', 'Cliente', 'VARCHAR', true, 100, null);
        $this->addForeignKey('tipo_id', 'TipoId', 'INTEGER', 'tipo', 'id', false, null, null);
        $this->addForeignKey('bairro_id', 'BairroId', 'INTEGER', 'bairro', 'id', false, null, null);
        $this->addForeignKey('cidade_id', 'CidadeId', 'INTEGER', 'cidade', 'id', false, null, null);
        $this->addForeignKey('estado_id', 'EstadoId', 'INTEGER', 'estado', 'id', false, null, null);
        $this->addForeignKey('contato_id', 'ContatoId', 'INTEGER', 'contato', 'id', false, null, null);
        $this->addForeignKey('solicitacao_id', 'SolicitacaoId', 'INTEGER', 'solicitacao', 'id', false, null, null);
        $this->addForeignKey('motivo_id', 'MotivoId', 'INTEGER', 'motivo', 'id', false, null, null);
        $this->addForeignKey('contrato_id', 'ContratoId', 'INTEGER', 'contrato', 'id', false, null, null);
        $this->addForeignKey('agendamento_id', 'AgendamentoId', 'INTEGER', 'agendamento', 'id', false, null, null);
        $this->addForeignKey('atendente_id', 'AtendenteId', 'INTEGER', 'atendente', 'id', false, null, null);
        $this->addColumn('telefone', 'Telefone', 'VARCHAR', true, 40, null);
        $this->addForeignKey('tag_id', 'TagId', 'INTEGER', 'tag', 'id', false, null, null);
        $this->addColumn('conferido', 'Conferido', 'INTEGER', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Agendamento', '\\Agendamento', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':agendamento_id',
    1 => ':id',
  ),
), null, null, null, false);
        $this->addRelation('Atendente', '\\Atendente', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':atendente_id',
    1 => ':id',
  ),
), null, null, null, false);
        $this->addRelation('Bairro', '\\Bairro', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':bairro_id',
    1 => ':id',
  ),
), null, null, null, false);
        $this->addRelation('Cidade', '\\Cidade', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':cidade_id',
    1 => ':id',
  ),
), null, null, null, false);
        $this->addRelation('Contato', '\\Contato', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':contato_id',
    1 => ':id',
  ),
), null, null, null, false);
        $this->addRelation('Contrato', '\\Contrato', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':contrato_id',
    1 => ':id',
  ),
), null, null, null, false);
        $this->addRelation('Estado', '\\Estado', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':estado_id',
    1 => ':id',
  ),
), null, null, null, false);
        $this->addRelation('Motivo', '\\Motivo', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':motivo_id',
    1 => ':id',
  ),
), null, null, null, false);
        $this->addRelation('Solicitacao', '\\Solicitacao', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':solicitacao_id',
    1 => ':id',
  ),
), null, null, null, false);
        $this->addRelation('Tag', '\\Tag', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':tag_id',
    1 => ':id',
  ),
), null, null, null, false);
        $this->addRelation('Tipo', '\\Tipo', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':tipo_id',
    1 => ':id',
  ),
), null, null, null, false);
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
        return $withPrefix ? AtendimentoTableMap::CLASS_DEFAULT : AtendimentoTableMap::OM_CLASS;
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
     * @return array           (Atendimento object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AtendimentoTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AtendimentoTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AtendimentoTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AtendimentoTableMap::OM_CLASS;
            /** @var Atendimento $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AtendimentoTableMap::addInstanceToPool($obj, $key);
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
            $key = AtendimentoTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AtendimentoTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Atendimento $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AtendimentoTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AtendimentoTableMap::COL_ID);
            $criteria->addSelectColumn(AtendimentoTableMap::COL_DATA);
            $criteria->addSelectColumn(AtendimentoTableMap::COL_HORA);
            $criteria->addSelectColumn(AtendimentoTableMap::COL_CADASTRO);
            $criteria->addSelectColumn(AtendimentoTableMap::COL_CLIENTE);
            $criteria->addSelectColumn(AtendimentoTableMap::COL_TIPO_ID);
            $criteria->addSelectColumn(AtendimentoTableMap::COL_BAIRRO_ID);
            $criteria->addSelectColumn(AtendimentoTableMap::COL_CIDADE_ID);
            $criteria->addSelectColumn(AtendimentoTableMap::COL_ESTADO_ID);
            $criteria->addSelectColumn(AtendimentoTableMap::COL_CONTATO_ID);
            $criteria->addSelectColumn(AtendimentoTableMap::COL_SOLICITACAO_ID);
            $criteria->addSelectColumn(AtendimentoTableMap::COL_MOTIVO_ID);
            $criteria->addSelectColumn(AtendimentoTableMap::COL_CONTRATO_ID);
            $criteria->addSelectColumn(AtendimentoTableMap::COL_AGENDAMENTO_ID);
            $criteria->addSelectColumn(AtendimentoTableMap::COL_ATENDENTE_ID);
            $criteria->addSelectColumn(AtendimentoTableMap::COL_TELEFONE);
            $criteria->addSelectColumn(AtendimentoTableMap::COL_TAG_ID);
            $criteria->addSelectColumn(AtendimentoTableMap::COL_CONFERIDO);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.data');
            $criteria->addSelectColumn($alias . '.hora');
            $criteria->addSelectColumn($alias . '.cadastro');
            $criteria->addSelectColumn($alias . '.cliente');
            $criteria->addSelectColumn($alias . '.tipo_id');
            $criteria->addSelectColumn($alias . '.bairro_id');
            $criteria->addSelectColumn($alias . '.cidade_id');
            $criteria->addSelectColumn($alias . '.estado_id');
            $criteria->addSelectColumn($alias . '.contato_id');
            $criteria->addSelectColumn($alias . '.solicitacao_id');
            $criteria->addSelectColumn($alias . '.motivo_id');
            $criteria->addSelectColumn($alias . '.contrato_id');
            $criteria->addSelectColumn($alias . '.agendamento_id');
            $criteria->addSelectColumn($alias . '.atendente_id');
            $criteria->addSelectColumn($alias . '.telefone');
            $criteria->addSelectColumn($alias . '.tag_id');
            $criteria->addSelectColumn($alias . '.conferido');
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
        return Propel::getServiceContainer()->getDatabaseMap(AtendimentoTableMap::DATABASE_NAME)->getTable(AtendimentoTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AtendimentoTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AtendimentoTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AtendimentoTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Atendimento or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Atendimento object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AtendimentoTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Atendimento) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AtendimentoTableMap::DATABASE_NAME);
            $criteria->add(AtendimentoTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AtendimentoQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AtendimentoTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AtendimentoTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the atendimento table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AtendimentoQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Atendimento or Criteria object.
     *
     * @param mixed               $criteria Criteria or Atendimento object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AtendimentoTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Atendimento object
        }

        if ($criteria->containsKey(AtendimentoTableMap::COL_ID) && $criteria->keyContainsValue(AtendimentoTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AtendimentoTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AtendimentoQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AtendimentoTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AtendimentoTableMap::buildTableMap();
