<?php

namespace Base;

use \Agendamento as ChildAgendamento;
use \AgendamentoQuery as ChildAgendamentoQuery;
use \Atendente as ChildAtendente;
use \AtendenteQuery as ChildAtendenteQuery;
use \AtendimentoQuery as ChildAtendimentoQuery;
use \Bairro as ChildBairro;
use \BairroQuery as ChildBairroQuery;
use \Cidade as ChildCidade;
use \CidadeQuery as ChildCidadeQuery;
use \Contato as ChildContato;
use \ContatoQuery as ChildContatoQuery;
use \Contrato as ChildContrato;
use \ContratoQuery as ChildContratoQuery;
use \Estado as ChildEstado;
use \EstadoQuery as ChildEstadoQuery;
use \Motivo as ChildMotivo;
use \MotivoQuery as ChildMotivoQuery;
use \Solicitacao as ChildSolicitacao;
use \SolicitacaoQuery as ChildSolicitacaoQuery;
use \Tag as ChildTag;
use \TagQuery as ChildTagQuery;
use \Tipo as ChildTipo;
use \TipoQuery as ChildTipoQuery;
use \Exception;
use \PDO;
use Map\AtendimentoTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;

/**
 * Base class that represents a row from the 'atendimento' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class Atendimento implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\AtendimentoTableMap';


    /**
     * attribute to determine if this object has previously been saved.
     * @var boolean
     */
    protected $new = true;

    /**
     * attribute to determine whether this object has been deleted.
     * @var boolean
     */
    protected $deleted = false;

    /**
     * The columns that have been modified in current object.
     * Tracking modified columns allows us to only update modified columns.
     * @var array
     */
    protected $modifiedColumns = array();

    /**
     * The (virtual) columns that are added at runtime
     * The formatters can add supplementary columns based on a resultset
     * @var array
     */
    protected $virtualColumns = array();

    /**
     * The value for the id field.
     *
     * @var        int
     */
    protected $id;

    /**
     * The value for the data field.
     *
     * @var        string
     */
    protected $data;

    /**
     * The value for the hora field.
     *
     * @var        string
     */
    protected $hora;

    /**
     * The value for the cadastro field.
     *
     * @var        int
     */
    protected $cadastro;

    /**
     * The value for the cliente field.
     *
     * @var        string
     */
    protected $cliente;

    /**
     * The value for the tipo_id field.
     *
     * @var        int
     */
    protected $tipo_id;

    /**
     * The value for the bairro_id field.
     *
     * @var        int
     */
    protected $bairro_id;

    /**
     * The value for the cidade_id field.
     *
     * @var        int
     */
    protected $cidade_id;

    /**
     * The value for the estado_id field.
     *
     * @var        int
     */
    protected $estado_id;

    /**
     * The value for the contato_id field.
     *
     * @var        int
     */
    protected $contato_id;

    /**
     * The value for the solicitacao_id field.
     *
     * @var        int
     */
    protected $solicitacao_id;

    /**
     * The value for the motivo_id field.
     *
     * @var        int
     */
    protected $motivo_id;

    /**
     * The value for the contrato_id field.
     *
     * @var        int
     */
    protected $contrato_id;

    /**
     * The value for the agendamento_id field.
     *
     * @var        int
     */
    protected $agendamento_id;

    /**
     * The value for the atendente_id field.
     *
     * @var        int
     */
    protected $atendente_id;

    /**
     * The value for the telefone field.
     *
     * @var        string
     */
    protected $telefone;

    /**
     * The value for the tag_id field.
     *
     * @var        int
     */
    protected $tag_id;

    /**
     * @var        ChildAgendamento
     */
    protected $aAgendamento;

    /**
     * @var        ChildAtendente
     */
    protected $aAtendente;

    /**
     * @var        ChildBairro
     */
    protected $aBairro;

    /**
     * @var        ChildCidade
     */
    protected $aCidade;

    /**
     * @var        ChildContato
     */
    protected $aContato;

    /**
     * @var        ChildContrato
     */
    protected $aContrato;

    /**
     * @var        ChildEstado
     */
    protected $aEstado;

    /**
     * @var        ChildMotivo
     */
    protected $aMotivo;

    /**
     * @var        ChildSolicitacao
     */
    protected $aSolicitacao;

    /**
     * @var        ChildTag
     */
    protected $aTag;

    /**
     * @var        ChildTipo
     */
    protected $aTipo;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Initializes internal state of Base\Atendimento object.
     */
    public function __construct()
    {
    }

    /**
     * Returns whether the object has been modified.
     *
     * @return boolean True if the object has been modified.
     */
    public function isModified()
    {
        return !!$this->modifiedColumns;
    }

    /**
     * Has specified column been modified?
     *
     * @param  string  $col column fully qualified name (TableMap::TYPE_COLNAME), e.g. Book::AUTHOR_ID
     * @return boolean True if $col has been modified.
     */
    public function isColumnModified($col)
    {
        return $this->modifiedColumns && isset($this->modifiedColumns[$col]);
    }

    /**
     * Get the columns that have been modified in this object.
     * @return array A unique list of the modified column names for this object.
     */
    public function getModifiedColumns()
    {
        return $this->modifiedColumns ? array_keys($this->modifiedColumns) : [];
    }

    /**
     * Returns whether the object has ever been saved.  This will
     * be false, if the object was retrieved from storage or was created
     * and then saved.
     *
     * @return boolean true, if the object has never been persisted.
     */
    public function isNew()
    {
        return $this->new;
    }

    /**
     * Setter for the isNew attribute.  This method will be called
     * by Propel-generated children and objects.
     *
     * @param boolean $b the state of the object.
     */
    public function setNew($b)
    {
        $this->new = (boolean) $b;
    }

    /**
     * Whether this object has been deleted.
     * @return boolean The deleted state of this object.
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Specify whether this object has been deleted.
     * @param  boolean $b The deleted state of this object.
     * @return void
     */
    public function setDeleted($b)
    {
        $this->deleted = (boolean) $b;
    }

    /**
     * Sets the modified state for the object to be false.
     * @param  string $col If supplied, only the specified column is reset.
     * @return void
     */
    public function resetModified($col = null)
    {
        if (null !== $col) {
            if (isset($this->modifiedColumns[$col])) {
                unset($this->modifiedColumns[$col]);
            }
        } else {
            $this->modifiedColumns = array();
        }
    }

    /**
     * Compares this with another <code>Atendimento</code> instance.  If
     * <code>obj</code> is an instance of <code>Atendimento</code>, delegates to
     * <code>equals(Atendimento)</code>.  Otherwise, returns <code>false</code>.
     *
     * @param  mixed   $obj The object to compare to.
     * @return boolean Whether equal to the object specified.
     */
    public function equals($obj)
    {
        if (!$obj instanceof static) {
            return false;
        }

        if ($this === $obj) {
            return true;
        }

        if (null === $this->getPrimaryKey() || null === $obj->getPrimaryKey()) {
            return false;
        }

        return $this->getPrimaryKey() === $obj->getPrimaryKey();
    }

    /**
     * Get the associative array of the virtual columns in this object
     *
     * @return array
     */
    public function getVirtualColumns()
    {
        return $this->virtualColumns;
    }

    /**
     * Checks the existence of a virtual column in this object
     *
     * @param  string  $name The virtual column name
     * @return boolean
     */
    public function hasVirtualColumn($name)
    {
        return array_key_exists($name, $this->virtualColumns);
    }

    /**
     * Get the value of a virtual column in this object
     *
     * @param  string $name The virtual column name
     * @return mixed
     *
     * @throws PropelException
     */
    public function getVirtualColumn($name)
    {
        if (!$this->hasVirtualColumn($name)) {
            throw new PropelException(sprintf('Cannot get value of inexistent virtual column %s.', $name));
        }

        return $this->virtualColumns[$name];
    }

    /**
     * Set the value of a virtual column in this object
     *
     * @param string $name  The virtual column name
     * @param mixed  $value The value to give to the virtual column
     *
     * @return $this|Atendimento The current object, for fluid interface
     */
    public function setVirtualColumn($name, $value)
    {
        $this->virtualColumns[$name] = $value;

        return $this;
    }

    /**
     * Logs a message using Propel::log().
     *
     * @param  string  $msg
     * @param  int     $priority One of the Propel::LOG_* logging levels
     * @return boolean
     */
    protected function log($msg, $priority = Propel::LOG_INFO)
    {
        return Propel::log(get_class($this) . ': ' . $msg, $priority);
    }

    /**
     * Export the current object properties to a string, using a given parser format
     * <code>
     * $book = BookQuery::create()->findPk(9012);
     * echo $book->exportTo('JSON');
     *  => {"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * @param  mixed   $parser                 A AbstractParser instance, or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param  boolean $includeLazyLoadColumns (optional) Whether to include lazy load(ed) columns. Defaults to TRUE.
     * @return string  The exported data
     */
    public function exportTo($parser, $includeLazyLoadColumns = true)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        return $parser->fromArray($this->toArray(TableMap::TYPE_PHPNAME, $includeLazyLoadColumns, array(), true));
    }

    /**
     * Clean up internal collections prior to serializing
     * Avoids recursive loops that turn into segmentation faults when serializing
     */
    public function __sleep()
    {
        $this->clearAllReferences();

        $cls = new \ReflectionClass($this);
        $propertyNames = [];
        $serializableProperties = array_diff($cls->getProperties(), $cls->getProperties(\ReflectionProperty::IS_STATIC));

        foreach($serializableProperties as $property) {
            $propertyNames[] = $property->getName();
        }

        return $propertyNames;
    }

    /**
     * Get the [id] column value.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the [data] column value.
     *
     * @return string
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Get the [hora] column value.
     *
     * @return string
     */
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * Get the [cadastro] column value.
     *
     * @return int
     */
    public function getCadastro()
    {
        return $this->cadastro;
    }

    /**
     * Get the [cliente] column value.
     *
     * @return string
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * Get the [tipo_id] column value.
     *
     * @return int
     */
    public function getTipoId()
    {
        return $this->tipo_id;
    }

    /**
     * Get the [bairro_id] column value.
     *
     * @return int
     */
    public function getBairroId()
    {
        return $this->bairro_id;
    }

    /**
     * Get the [cidade_id] column value.
     *
     * @return int
     */
    public function getCidadeId()
    {
        return $this->cidade_id;
    }

    /**
     * Get the [estado_id] column value.
     *
     * @return int
     */
    public function getEstadoId()
    {
        return $this->estado_id;
    }

    /**
     * Get the [contato_id] column value.
     *
     * @return int
     */
    public function getContatoId()
    {
        return $this->contato_id;
    }

    /**
     * Get the [solicitacao_id] column value.
     *
     * @return int
     */
    public function getSolicitacaoId()
    {
        return $this->solicitacao_id;
    }

    /**
     * Get the [motivo_id] column value.
     *
     * @return int
     */
    public function getMotivoId()
    {
        return $this->motivo_id;
    }

    /**
     * Get the [contrato_id] column value.
     *
     * @return int
     */
    public function getContratoId()
    {
        return $this->contrato_id;
    }

    /**
     * Get the [agendamento_id] column value.
     *
     * @return int
     */
    public function getAgendamentoId()
    {
        return $this->agendamento_id;
    }

    /**
     * Get the [atendente_id] column value.
     *
     * @return int
     */
    public function getAtendenteId()
    {
        return $this->atendente_id;
    }

    /**
     * Get the [telefone] column value.
     *
     * @return string
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * Get the [tag_id] column value.
     *
     * @return int
     */
    public function getTagId()
    {
        return $this->tag_id;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return $this|\Atendimento The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[AtendimentoTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [data] column.
     *
     * @param string $v new value
     * @return $this|\Atendimento The current object (for fluent API support)
     */
    public function setData($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->data !== $v) {
            $this->data = $v;
            $this->modifiedColumns[AtendimentoTableMap::COL_DATA] = true;
        }

        return $this;
    } // setData()

    /**
     * Set the value of [hora] column.
     *
     * @param string $v new value
     * @return $this|\Atendimento The current object (for fluent API support)
     */
    public function setHora($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->hora !== $v) {
            $this->hora = $v;
            $this->modifiedColumns[AtendimentoTableMap::COL_HORA] = true;
        }

        return $this;
    } // setHora()

    /**
     * Set the value of [cadastro] column.
     *
     * @param int $v new value
     * @return $this|\Atendimento The current object (for fluent API support)
     */
    public function setCadastro($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->cadastro !== $v) {
            $this->cadastro = $v;
            $this->modifiedColumns[AtendimentoTableMap::COL_CADASTRO] = true;
        }

        return $this;
    } // setCadastro()

    /**
     * Set the value of [cliente] column.
     *
     * @param string $v new value
     * @return $this|\Atendimento The current object (for fluent API support)
     */
    public function setCliente($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cliente !== $v) {
            $this->cliente = $v;
            $this->modifiedColumns[AtendimentoTableMap::COL_CLIENTE] = true;
        }

        return $this;
    } // setCliente()

    /**
     * Set the value of [tipo_id] column.
     *
     * @param int $v new value
     * @return $this|\Atendimento The current object (for fluent API support)
     */
    public function setTipoId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->tipo_id !== $v) {
            $this->tipo_id = $v;
            $this->modifiedColumns[AtendimentoTableMap::COL_TIPO_ID] = true;
        }

        if ($this->aTipo !== null && $this->aTipo->getId() !== $v) {
            $this->aTipo = null;
        }

        return $this;
    } // setTipoId()

    /**
     * Set the value of [bairro_id] column.
     *
     * @param int $v new value
     * @return $this|\Atendimento The current object (for fluent API support)
     */
    public function setBairroId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->bairro_id !== $v) {
            $this->bairro_id = $v;
            $this->modifiedColumns[AtendimentoTableMap::COL_BAIRRO_ID] = true;
        }

        if ($this->aBairro !== null && $this->aBairro->getId() !== $v) {
            $this->aBairro = null;
        }

        return $this;
    } // setBairroId()

    /**
     * Set the value of [cidade_id] column.
     *
     * @param int $v new value
     * @return $this|\Atendimento The current object (for fluent API support)
     */
    public function setCidadeId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->cidade_id !== $v) {
            $this->cidade_id = $v;
            $this->modifiedColumns[AtendimentoTableMap::COL_CIDADE_ID] = true;
        }

        if ($this->aCidade !== null && $this->aCidade->getId() !== $v) {
            $this->aCidade = null;
        }

        return $this;
    } // setCidadeId()

    /**
     * Set the value of [estado_id] column.
     *
     * @param int $v new value
     * @return $this|\Atendimento The current object (for fluent API support)
     */
    public function setEstadoId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->estado_id !== $v) {
            $this->estado_id = $v;
            $this->modifiedColumns[AtendimentoTableMap::COL_ESTADO_ID] = true;
        }

        if ($this->aEstado !== null && $this->aEstado->getId() !== $v) {
            $this->aEstado = null;
        }

        return $this;
    } // setEstadoId()

    /**
     * Set the value of [contato_id] column.
     *
     * @param int $v new value
     * @return $this|\Atendimento The current object (for fluent API support)
     */
    public function setContatoId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->contato_id !== $v) {
            $this->contato_id = $v;
            $this->modifiedColumns[AtendimentoTableMap::COL_CONTATO_ID] = true;
        }

        if ($this->aContato !== null && $this->aContato->getId() !== $v) {
            $this->aContato = null;
        }

        return $this;
    } // setContatoId()

    /**
     * Set the value of [solicitacao_id] column.
     *
     * @param int $v new value
     * @return $this|\Atendimento The current object (for fluent API support)
     */
    public function setSolicitacaoId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->solicitacao_id !== $v) {
            $this->solicitacao_id = $v;
            $this->modifiedColumns[AtendimentoTableMap::COL_SOLICITACAO_ID] = true;
        }

        if ($this->aSolicitacao !== null && $this->aSolicitacao->getId() !== $v) {
            $this->aSolicitacao = null;
        }

        return $this;
    } // setSolicitacaoId()

    /**
     * Set the value of [motivo_id] column.
     *
     * @param int $v new value
     * @return $this|\Atendimento The current object (for fluent API support)
     */
    public function setMotivoId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->motivo_id !== $v) {
            $this->motivo_id = $v;
            $this->modifiedColumns[AtendimentoTableMap::COL_MOTIVO_ID] = true;
        }

        if ($this->aMotivo !== null && $this->aMotivo->getId() !== $v) {
            $this->aMotivo = null;
        }

        return $this;
    } // setMotivoId()

    /**
     * Set the value of [contrato_id] column.
     *
     * @param int $v new value
     * @return $this|\Atendimento The current object (for fluent API support)
     */
    public function setContratoId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->contrato_id !== $v) {
            $this->contrato_id = $v;
            $this->modifiedColumns[AtendimentoTableMap::COL_CONTRATO_ID] = true;
        }

        if ($this->aContrato !== null && $this->aContrato->getId() !== $v) {
            $this->aContrato = null;
        }

        return $this;
    } // setContratoId()

    /**
     * Set the value of [agendamento_id] column.
     *
     * @param int $v new value
     * @return $this|\Atendimento The current object (for fluent API support)
     */
    public function setAgendamentoId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->agendamento_id !== $v) {
            $this->agendamento_id = $v;
            $this->modifiedColumns[AtendimentoTableMap::COL_AGENDAMENTO_ID] = true;
        }

        if ($this->aAgendamento !== null && $this->aAgendamento->getId() !== $v) {
            $this->aAgendamento = null;
        }

        return $this;
    } // setAgendamentoId()

    /**
     * Set the value of [atendente_id] column.
     *
     * @param int $v new value
     * @return $this|\Atendimento The current object (for fluent API support)
     */
    public function setAtendenteId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->atendente_id !== $v) {
            $this->atendente_id = $v;
            $this->modifiedColumns[AtendimentoTableMap::COL_ATENDENTE_ID] = true;
        }

        if ($this->aAtendente !== null && $this->aAtendente->getId() !== $v) {
            $this->aAtendente = null;
        }

        return $this;
    } // setAtendenteId()

    /**
     * Set the value of [telefone] column.
     *
     * @param string $v new value
     * @return $this|\Atendimento The current object (for fluent API support)
     */
    public function setTelefone($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->telefone !== $v) {
            $this->telefone = $v;
            $this->modifiedColumns[AtendimentoTableMap::COL_TELEFONE] = true;
        }

        return $this;
    } // setTelefone()

    /**
     * Set the value of [tag_id] column.
     *
     * @param int $v new value
     * @return $this|\Atendimento The current object (for fluent API support)
     */
    public function setTagId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->tag_id !== $v) {
            $this->tag_id = $v;
            $this->modifiedColumns[AtendimentoTableMap::COL_TAG_ID] = true;
        }

        if ($this->aTag !== null && $this->aTag->getId() !== $v) {
            $this->aTag = null;
        }

        return $this;
    } // setTagId()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
        // otherwise, everything was equal, so return TRUE
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array   $row       The row returned by DataFetcher->fetch().
     * @param int     $startcol  0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @param string  $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                  One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                            TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false, $indexType = TableMap::TYPE_NUM)
    {
        try {

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : AtendimentoTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : AtendimentoTableMap::translateFieldName('Data', TableMap::TYPE_PHPNAME, $indexType)];
            $this->data = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : AtendimentoTableMap::translateFieldName('Hora', TableMap::TYPE_PHPNAME, $indexType)];
            $this->hora = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : AtendimentoTableMap::translateFieldName('Cadastro', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cadastro = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : AtendimentoTableMap::translateFieldName('Cliente', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cliente = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : AtendimentoTableMap::translateFieldName('TipoId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tipo_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : AtendimentoTableMap::translateFieldName('BairroId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->bairro_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : AtendimentoTableMap::translateFieldName('CidadeId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cidade_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : AtendimentoTableMap::translateFieldName('EstadoId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->estado_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : AtendimentoTableMap::translateFieldName('ContatoId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->contato_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : AtendimentoTableMap::translateFieldName('SolicitacaoId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->solicitacao_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : AtendimentoTableMap::translateFieldName('MotivoId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->motivo_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : AtendimentoTableMap::translateFieldName('ContratoId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->contrato_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : AtendimentoTableMap::translateFieldName('AgendamentoId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->agendamento_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : AtendimentoTableMap::translateFieldName('AtendenteId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->atendente_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : AtendimentoTableMap::translateFieldName('Telefone', TableMap::TYPE_PHPNAME, $indexType)];
            $this->telefone = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : AtendimentoTableMap::translateFieldName('TagId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tag_id = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 17; // 17 = AtendimentoTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Atendimento'), 0, $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {
        if ($this->aTipo !== null && $this->tipo_id !== $this->aTipo->getId()) {
            $this->aTipo = null;
        }
        if ($this->aBairro !== null && $this->bairro_id !== $this->aBairro->getId()) {
            $this->aBairro = null;
        }
        if ($this->aCidade !== null && $this->cidade_id !== $this->aCidade->getId()) {
            $this->aCidade = null;
        }
        if ($this->aEstado !== null && $this->estado_id !== $this->aEstado->getId()) {
            $this->aEstado = null;
        }
        if ($this->aContato !== null && $this->contato_id !== $this->aContato->getId()) {
            $this->aContato = null;
        }
        if ($this->aSolicitacao !== null && $this->solicitacao_id !== $this->aSolicitacao->getId()) {
            $this->aSolicitacao = null;
        }
        if ($this->aMotivo !== null && $this->motivo_id !== $this->aMotivo->getId()) {
            $this->aMotivo = null;
        }
        if ($this->aContrato !== null && $this->contrato_id !== $this->aContrato->getId()) {
            $this->aContrato = null;
        }
        if ($this->aAgendamento !== null && $this->agendamento_id !== $this->aAgendamento->getId()) {
            $this->aAgendamento = null;
        }
        if ($this->aAtendente !== null && $this->atendente_id !== $this->aAtendente->getId()) {
            $this->aAtendente = null;
        }
        if ($this->aTag !== null && $this->tag_id !== $this->aTag->getId()) {
            $this->aTag = null;
        }
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      ConnectionInterface $con (optional) The ConnectionInterface connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AtendimentoTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildAtendimentoQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aAgendamento = null;
            $this->aAtendente = null;
            $this->aBairro = null;
            $this->aCidade = null;
            $this->aContato = null;
            $this->aContrato = null;
            $this->aEstado = null;
            $this->aMotivo = null;
            $this->aSolicitacao = null;
            $this->aTag = null;
            $this->aTipo = null;
        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Atendimento::setDeleted()
     * @see Atendimento::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(AtendimentoTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildAtendimentoQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $this->setDeleted(true);
            }
        });
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see doSave()
     */
    public function save(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($this->alreadyInSave) {
            return 0;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(AtendimentoTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $ret = $this->preSave($con);
            $isInsert = $this->isNew();
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                AtendimentoTableMap::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }

            return $affectedRows;
        });
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see save()
     */
    protected function doSave(ConnectionInterface $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            // We call the save method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aAgendamento !== null) {
                if ($this->aAgendamento->isModified() || $this->aAgendamento->isNew()) {
                    $affectedRows += $this->aAgendamento->save($con);
                }
                $this->setAgendamento($this->aAgendamento);
            }

            if ($this->aAtendente !== null) {
                if ($this->aAtendente->isModified() || $this->aAtendente->isNew()) {
                    $affectedRows += $this->aAtendente->save($con);
                }
                $this->setAtendente($this->aAtendente);
            }

            if ($this->aBairro !== null) {
                if ($this->aBairro->isModified() || $this->aBairro->isNew()) {
                    $affectedRows += $this->aBairro->save($con);
                }
                $this->setBairro($this->aBairro);
            }

            if ($this->aCidade !== null) {
                if ($this->aCidade->isModified() || $this->aCidade->isNew()) {
                    $affectedRows += $this->aCidade->save($con);
                }
                $this->setCidade($this->aCidade);
            }

            if ($this->aContato !== null) {
                if ($this->aContato->isModified() || $this->aContato->isNew()) {
                    $affectedRows += $this->aContato->save($con);
                }
                $this->setContato($this->aContato);
            }

            if ($this->aContrato !== null) {
                if ($this->aContrato->isModified() || $this->aContrato->isNew()) {
                    $affectedRows += $this->aContrato->save($con);
                }
                $this->setContrato($this->aContrato);
            }

            if ($this->aEstado !== null) {
                if ($this->aEstado->isModified() || $this->aEstado->isNew()) {
                    $affectedRows += $this->aEstado->save($con);
                }
                $this->setEstado($this->aEstado);
            }

            if ($this->aMotivo !== null) {
                if ($this->aMotivo->isModified() || $this->aMotivo->isNew()) {
                    $affectedRows += $this->aMotivo->save($con);
                }
                $this->setMotivo($this->aMotivo);
            }

            if ($this->aSolicitacao !== null) {
                if ($this->aSolicitacao->isModified() || $this->aSolicitacao->isNew()) {
                    $affectedRows += $this->aSolicitacao->save($con);
                }
                $this->setSolicitacao($this->aSolicitacao);
            }

            if ($this->aTag !== null) {
                if ($this->aTag->isModified() || $this->aTag->isNew()) {
                    $affectedRows += $this->aTag->save($con);
                }
                $this->setTag($this->aTag);
            }

            if ($this->aTipo !== null) {
                if ($this->aTipo->isModified() || $this->aTipo->isNew()) {
                    $affectedRows += $this->aTipo->save($con);
                }
                $this->setTipo($this->aTipo);
            }

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                    $affectedRows += 1;
                } else {
                    $affectedRows += $this->doUpdate($con);
                }
                $this->resetModified();
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @throws PropelException
     * @see doSave()
     */
    protected function doInsert(ConnectionInterface $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[AtendimentoTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . AtendimentoTableMap::COL_ID . ')');
        }
        if (null === $this->id) {
            try {
                $dataFetcher = $con->query("SELECT nextval('atendimento_id_seq')");
                $this->id = (int) $dataFetcher->fetchColumn();
            } catch (Exception $e) {
                throw new PropelException('Unable to get sequence id.', 0, $e);
            }
        }


         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(AtendimentoTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'id';
        }
        if ($this->isColumnModified(AtendimentoTableMap::COL_DATA)) {
            $modifiedColumns[':p' . $index++]  = 'data';
        }
        if ($this->isColumnModified(AtendimentoTableMap::COL_HORA)) {
            $modifiedColumns[':p' . $index++]  = 'hora';
        }
        if ($this->isColumnModified(AtendimentoTableMap::COL_CADASTRO)) {
            $modifiedColumns[':p' . $index++]  = 'cadastro';
        }
        if ($this->isColumnModified(AtendimentoTableMap::COL_CLIENTE)) {
            $modifiedColumns[':p' . $index++]  = 'cliente';
        }
        if ($this->isColumnModified(AtendimentoTableMap::COL_TIPO_ID)) {
            $modifiedColumns[':p' . $index++]  = 'tipo_id';
        }
        if ($this->isColumnModified(AtendimentoTableMap::COL_BAIRRO_ID)) {
            $modifiedColumns[':p' . $index++]  = 'bairro_id';
        }
        if ($this->isColumnModified(AtendimentoTableMap::COL_CIDADE_ID)) {
            $modifiedColumns[':p' . $index++]  = 'cidade_id';
        }
        if ($this->isColumnModified(AtendimentoTableMap::COL_ESTADO_ID)) {
            $modifiedColumns[':p' . $index++]  = 'estado_id';
        }
        if ($this->isColumnModified(AtendimentoTableMap::COL_CONTATO_ID)) {
            $modifiedColumns[':p' . $index++]  = 'contato_id';
        }
        if ($this->isColumnModified(AtendimentoTableMap::COL_SOLICITACAO_ID)) {
            $modifiedColumns[':p' . $index++]  = 'solicitacao_id';
        }
        if ($this->isColumnModified(AtendimentoTableMap::COL_MOTIVO_ID)) {
            $modifiedColumns[':p' . $index++]  = 'motivo_id';
        }
        if ($this->isColumnModified(AtendimentoTableMap::COL_CONTRATO_ID)) {
            $modifiedColumns[':p' . $index++]  = 'contrato_id';
        }
        if ($this->isColumnModified(AtendimentoTableMap::COL_AGENDAMENTO_ID)) {
            $modifiedColumns[':p' . $index++]  = 'agendamento_id';
        }
        if ($this->isColumnModified(AtendimentoTableMap::COL_ATENDENTE_ID)) {
            $modifiedColumns[':p' . $index++]  = 'atendente_id';
        }
        if ($this->isColumnModified(AtendimentoTableMap::COL_TELEFONE)) {
            $modifiedColumns[':p' . $index++]  = 'telefone';
        }
        if ($this->isColumnModified(AtendimentoTableMap::COL_TAG_ID)) {
            $modifiedColumns[':p' . $index++]  = 'tag_id';
        }

        $sql = sprintf(
            'INSERT INTO atendimento (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id':
                        $stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
                        break;
                    case 'data':
                        $stmt->bindValue($identifier, $this->data, PDO::PARAM_STR);
                        break;
                    case 'hora':
                        $stmt->bindValue($identifier, $this->hora, PDO::PARAM_STR);
                        break;
                    case 'cadastro':
                        $stmt->bindValue($identifier, $this->cadastro, PDO::PARAM_INT);
                        break;
                    case 'cliente':
                        $stmt->bindValue($identifier, $this->cliente, PDO::PARAM_STR);
                        break;
                    case 'tipo_id':
                        $stmt->bindValue($identifier, $this->tipo_id, PDO::PARAM_INT);
                        break;
                    case 'bairro_id':
                        $stmt->bindValue($identifier, $this->bairro_id, PDO::PARAM_INT);
                        break;
                    case 'cidade_id':
                        $stmt->bindValue($identifier, $this->cidade_id, PDO::PARAM_INT);
                        break;
                    case 'estado_id':
                        $stmt->bindValue($identifier, $this->estado_id, PDO::PARAM_INT);
                        break;
                    case 'contato_id':
                        $stmt->bindValue($identifier, $this->contato_id, PDO::PARAM_INT);
                        break;
                    case 'solicitacao_id':
                        $stmt->bindValue($identifier, $this->solicitacao_id, PDO::PARAM_INT);
                        break;
                    case 'motivo_id':
                        $stmt->bindValue($identifier, $this->motivo_id, PDO::PARAM_INT);
                        break;
                    case 'contrato_id':
                        $stmt->bindValue($identifier, $this->contrato_id, PDO::PARAM_INT);
                        break;
                    case 'agendamento_id':
                        $stmt->bindValue($identifier, $this->agendamento_id, PDO::PARAM_INT);
                        break;
                    case 'atendente_id':
                        $stmt->bindValue($identifier, $this->atendente_id, PDO::PARAM_INT);
                        break;
                    case 'telefone':
                        $stmt->bindValue($identifier, $this->telefone, PDO::PARAM_STR);
                        break;
                    case 'tag_id':
                        $stmt->bindValue($identifier, $this->tag_id, PDO::PARAM_INT);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @return Integer Number of updated rows
     * @see doSave()
     */
    protected function doUpdate(ConnectionInterface $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();

        return $selectCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                     TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                     Defaults to TableMap::TYPE_PHPNAME.
     * @return mixed Value of field.
     */
    public function getByName($name, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = AtendimentoTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getId();
                break;
            case 1:
                return $this->getData();
                break;
            case 2:
                return $this->getHora();
                break;
            case 3:
                return $this->getCadastro();
                break;
            case 4:
                return $this->getCliente();
                break;
            case 5:
                return $this->getTipoId();
                break;
            case 6:
                return $this->getBairroId();
                break;
            case 7:
                return $this->getCidadeId();
                break;
            case 8:
                return $this->getEstadoId();
                break;
            case 9:
                return $this->getContatoId();
                break;
            case 10:
                return $this->getSolicitacaoId();
                break;
            case 11:
                return $this->getMotivoId();
                break;
            case 12:
                return $this->getContratoId();
                break;
            case 13:
                return $this->getAgendamentoId();
                break;
            case 14:
                return $this->getAtendenteId();
                break;
            case 15:
                return $this->getTelefone();
                break;
            case 16:
                return $this->getTagId();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     *                    TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                    Defaults to TableMap::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {

        if (isset($alreadyDumpedObjects['Atendimento'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Atendimento'][$this->hashCode()] = true;
        $keys = AtendimentoTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getData(),
            $keys[2] => $this->getHora(),
            $keys[3] => $this->getCadastro(),
            $keys[4] => $this->getCliente(),
            $keys[5] => $this->getTipoId(),
            $keys[6] => $this->getBairroId(),
            $keys[7] => $this->getCidadeId(),
            $keys[8] => $this->getEstadoId(),
            $keys[9] => $this->getContatoId(),
            $keys[10] => $this->getSolicitacaoId(),
            $keys[11] => $this->getMotivoId(),
            $keys[12] => $this->getContratoId(),
            $keys[13] => $this->getAgendamentoId(),
            $keys[14] => $this->getAtendenteId(),
            $keys[15] => $this->getTelefone(),
            $keys[16] => $this->getTagId(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aAgendamento) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'agendamento';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'agendamento';
                        break;
                    default:
                        $key = 'Agendamento';
                }

                $result[$key] = $this->aAgendamento->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aAtendente) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'atendente';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'atendente';
                        break;
                    default:
                        $key = 'Atendente';
                }

                $result[$key] = $this->aAtendente->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aBairro) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'bairro';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'bairro';
                        break;
                    default:
                        $key = 'Bairro';
                }

                $result[$key] = $this->aBairro->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aCidade) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'cidade';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'cidade';
                        break;
                    default:
                        $key = 'Cidade';
                }

                $result[$key] = $this->aCidade->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aContato) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'contato';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'contato';
                        break;
                    default:
                        $key = 'Contato';
                }

                $result[$key] = $this->aContato->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aContrato) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'contrato';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'contrato';
                        break;
                    default:
                        $key = 'Contrato';
                }

                $result[$key] = $this->aContrato->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aEstado) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'estado';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'estado';
                        break;
                    default:
                        $key = 'Estado';
                }

                $result[$key] = $this->aEstado->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aMotivo) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'motivo';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'motivo';
                        break;
                    default:
                        $key = 'Motivo';
                }

                $result[$key] = $this->aMotivo->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aSolicitacao) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'solicitacao';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'solicitacao';
                        break;
                    default:
                        $key = 'Solicitacao';
                }

                $result[$key] = $this->aSolicitacao->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aTag) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'tag';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'tag';
                        break;
                    default:
                        $key = 'Tag';
                }

                $result[$key] = $this->aTag->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aTipo) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'tipo';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'tipo';
                        break;
                    default:
                        $key = 'Tipo';
                }

                $result[$key] = $this->aTipo->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param  string $name
     * @param  mixed  $value field value
     * @param  string $type The type of fieldname the $name is of:
     *                one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                Defaults to TableMap::TYPE_PHPNAME.
     * @return $this|\Atendimento
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = AtendimentoTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Atendimento
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setData($value);
                break;
            case 2:
                $this->setHora($value);
                break;
            case 3:
                $this->setCadastro($value);
                break;
            case 4:
                $this->setCliente($value);
                break;
            case 5:
                $this->setTipoId($value);
                break;
            case 6:
                $this->setBairroId($value);
                break;
            case 7:
                $this->setCidadeId($value);
                break;
            case 8:
                $this->setEstadoId($value);
                break;
            case 9:
                $this->setContatoId($value);
                break;
            case 10:
                $this->setSolicitacaoId($value);
                break;
            case 11:
                $this->setMotivoId($value);
                break;
            case 12:
                $this->setContratoId($value);
                break;
            case 13:
                $this->setAgendamentoId($value);
                break;
            case 14:
                $this->setAtendenteId($value);
                break;
            case 15:
                $this->setTelefone($value);
                break;
            case 16:
                $this->setTagId($value);
                break;
        } // switch()

        return $this;
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = TableMap::TYPE_PHPNAME)
    {
        $keys = AtendimentoTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setData($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setHora($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setCadastro($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setCliente($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setTipoId($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setBairroId($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setCidadeId($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setEstadoId($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setContatoId($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setSolicitacaoId($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setMotivoId($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setContratoId($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setAgendamentoId($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setAtendenteId($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setTelefone($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setTagId($arr[$keys[16]]);
        }
    }

     /**
     * Populate the current object from a string, using a given parser format
     * <code>
     * $book = new Book();
     * $book->importFrom('JSON', '{"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param mixed $parser A AbstractParser instance,
     *                       or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param string $data The source data to import from
     * @param string $keyType The type of keys the array uses.
     *
     * @return $this|\Atendimento The current object, for fluid interface
     */
    public function importFrom($parser, $data, $keyType = TableMap::TYPE_PHPNAME)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        $this->fromArray($parser->toArray($data), $keyType);

        return $this;
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(AtendimentoTableMap::DATABASE_NAME);

        if ($this->isColumnModified(AtendimentoTableMap::COL_ID)) {
            $criteria->add(AtendimentoTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(AtendimentoTableMap::COL_DATA)) {
            $criteria->add(AtendimentoTableMap::COL_DATA, $this->data);
        }
        if ($this->isColumnModified(AtendimentoTableMap::COL_HORA)) {
            $criteria->add(AtendimentoTableMap::COL_HORA, $this->hora);
        }
        if ($this->isColumnModified(AtendimentoTableMap::COL_CADASTRO)) {
            $criteria->add(AtendimentoTableMap::COL_CADASTRO, $this->cadastro);
        }
        if ($this->isColumnModified(AtendimentoTableMap::COL_CLIENTE)) {
            $criteria->add(AtendimentoTableMap::COL_CLIENTE, $this->cliente);
        }
        if ($this->isColumnModified(AtendimentoTableMap::COL_TIPO_ID)) {
            $criteria->add(AtendimentoTableMap::COL_TIPO_ID, $this->tipo_id);
        }
        if ($this->isColumnModified(AtendimentoTableMap::COL_BAIRRO_ID)) {
            $criteria->add(AtendimentoTableMap::COL_BAIRRO_ID, $this->bairro_id);
        }
        if ($this->isColumnModified(AtendimentoTableMap::COL_CIDADE_ID)) {
            $criteria->add(AtendimentoTableMap::COL_CIDADE_ID, $this->cidade_id);
        }
        if ($this->isColumnModified(AtendimentoTableMap::COL_ESTADO_ID)) {
            $criteria->add(AtendimentoTableMap::COL_ESTADO_ID, $this->estado_id);
        }
        if ($this->isColumnModified(AtendimentoTableMap::COL_CONTATO_ID)) {
            $criteria->add(AtendimentoTableMap::COL_CONTATO_ID, $this->contato_id);
        }
        if ($this->isColumnModified(AtendimentoTableMap::COL_SOLICITACAO_ID)) {
            $criteria->add(AtendimentoTableMap::COL_SOLICITACAO_ID, $this->solicitacao_id);
        }
        if ($this->isColumnModified(AtendimentoTableMap::COL_MOTIVO_ID)) {
            $criteria->add(AtendimentoTableMap::COL_MOTIVO_ID, $this->motivo_id);
        }
        if ($this->isColumnModified(AtendimentoTableMap::COL_CONTRATO_ID)) {
            $criteria->add(AtendimentoTableMap::COL_CONTRATO_ID, $this->contrato_id);
        }
        if ($this->isColumnModified(AtendimentoTableMap::COL_AGENDAMENTO_ID)) {
            $criteria->add(AtendimentoTableMap::COL_AGENDAMENTO_ID, $this->agendamento_id);
        }
        if ($this->isColumnModified(AtendimentoTableMap::COL_ATENDENTE_ID)) {
            $criteria->add(AtendimentoTableMap::COL_ATENDENTE_ID, $this->atendente_id);
        }
        if ($this->isColumnModified(AtendimentoTableMap::COL_TELEFONE)) {
            $criteria->add(AtendimentoTableMap::COL_TELEFONE, $this->telefone);
        }
        if ($this->isColumnModified(AtendimentoTableMap::COL_TAG_ID)) {
            $criteria->add(AtendimentoTableMap::COL_TAG_ID, $this->tag_id);
        }

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @throws LogicException if no primary key is defined
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = ChildAtendimentoQuery::create();
        $criteria->add(AtendimentoTableMap::COL_ID, $this->id);

        return $criteria;
    }

    /**
     * If the primary key is not null, return the hashcode of the
     * primary key. Otherwise, return the hash code of the object.
     *
     * @return int Hashcode
     */
    public function hashCode()
    {
        $validPk = null !== $this->getId();

        $validPrimaryKeyFKs = 0;
        $primaryKeyFKs = [];

        if ($validPk) {
            return crc32(json_encode($this->getPrimaryKey(), JSON_UNESCAPED_UNICODE));
        } elseif ($validPrimaryKeyFKs) {
            return crc32(json_encode($primaryKeyFKs, JSON_UNESCAPED_UNICODE));
        }

        return spl_object_hash($this);
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getId();
    }

    /**
     * Generic method to set the primary key (id column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Atendimento (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setData($this->getData());
        $copyObj->setHora($this->getHora());
        $copyObj->setCadastro($this->getCadastro());
        $copyObj->setCliente($this->getCliente());
        $copyObj->setTipoId($this->getTipoId());
        $copyObj->setBairroId($this->getBairroId());
        $copyObj->setCidadeId($this->getCidadeId());
        $copyObj->setEstadoId($this->getEstadoId());
        $copyObj->setContatoId($this->getContatoId());
        $copyObj->setSolicitacaoId($this->getSolicitacaoId());
        $copyObj->setMotivoId($this->getMotivoId());
        $copyObj->setContratoId($this->getContratoId());
        $copyObj->setAgendamentoId($this->getAgendamentoId());
        $copyObj->setAtendenteId($this->getAtendenteId());
        $copyObj->setTelefone($this->getTelefone());
        $copyObj->setTagId($this->getTagId());
        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setId(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param  boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return \Atendimento Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Declares an association between this object and a ChildAgendamento object.
     *
     * @param  ChildAgendamento $v
     * @return $this|\Atendimento The current object (for fluent API support)
     * @throws PropelException
     */
    public function setAgendamento(ChildAgendamento $v = null)
    {
        if ($v === null) {
            $this->setAgendamentoId(NULL);
        } else {
            $this->setAgendamentoId($v->getId());
        }

        $this->aAgendamento = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildAgendamento object, it will not be re-added.
        if ($v !== null) {
            $v->addAtendimento($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildAgendamento object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildAgendamento The associated ChildAgendamento object.
     * @throws PropelException
     */
    public function getAgendamento(ConnectionInterface $con = null)
    {
        if ($this->aAgendamento === null && ($this->agendamento_id != 0)) {
            $this->aAgendamento = ChildAgendamentoQuery::create()->findPk($this->agendamento_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aAgendamento->addAtendimentos($this);
             */
        }

        return $this->aAgendamento;
    }

    /**
     * Declares an association between this object and a ChildAtendente object.
     *
     * @param  ChildAtendente $v
     * @return $this|\Atendimento The current object (for fluent API support)
     * @throws PropelException
     */
    public function setAtendente(ChildAtendente $v = null)
    {
        if ($v === null) {
            $this->setAtendenteId(NULL);
        } else {
            $this->setAtendenteId($v->getId());
        }

        $this->aAtendente = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildAtendente object, it will not be re-added.
        if ($v !== null) {
            $v->addAtendimento($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildAtendente object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildAtendente The associated ChildAtendente object.
     * @throws PropelException
     */
    public function getAtendente(ConnectionInterface $con = null)
    {
        if ($this->aAtendente === null && ($this->atendente_id != 0)) {
            $this->aAtendente = ChildAtendenteQuery::create()->findPk($this->atendente_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aAtendente->addAtendimentos($this);
             */
        }

        return $this->aAtendente;
    }

    /**
     * Declares an association between this object and a ChildBairro object.
     *
     * @param  ChildBairro $v
     * @return $this|\Atendimento The current object (for fluent API support)
     * @throws PropelException
     */
    public function setBairro(ChildBairro $v = null)
    {
        if ($v === null) {
            $this->setBairroId(NULL);
        } else {
            $this->setBairroId($v->getId());
        }

        $this->aBairro = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildBairro object, it will not be re-added.
        if ($v !== null) {
            $v->addAtendimento($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildBairro object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildBairro The associated ChildBairro object.
     * @throws PropelException
     */
    public function getBairro(ConnectionInterface $con = null)
    {
        if ($this->aBairro === null && ($this->bairro_id != 0)) {
            $this->aBairro = ChildBairroQuery::create()->findPk($this->bairro_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aBairro->addAtendimentos($this);
             */
        }

        return $this->aBairro;
    }

    /**
     * Declares an association between this object and a ChildCidade object.
     *
     * @param  ChildCidade $v
     * @return $this|\Atendimento The current object (for fluent API support)
     * @throws PropelException
     */
    public function setCidade(ChildCidade $v = null)
    {
        if ($v === null) {
            $this->setCidadeId(NULL);
        } else {
            $this->setCidadeId($v->getId());
        }

        $this->aCidade = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildCidade object, it will not be re-added.
        if ($v !== null) {
            $v->addAtendimento($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildCidade object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildCidade The associated ChildCidade object.
     * @throws PropelException
     */
    public function getCidade(ConnectionInterface $con = null)
    {
        if ($this->aCidade === null && ($this->cidade_id != 0)) {
            $this->aCidade = ChildCidadeQuery::create()->findPk($this->cidade_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aCidade->addAtendimentos($this);
             */
        }

        return $this->aCidade;
    }

    /**
     * Declares an association between this object and a ChildContato object.
     *
     * @param  ChildContato $v
     * @return $this|\Atendimento The current object (for fluent API support)
     * @throws PropelException
     */
    public function setContato(ChildContato $v = null)
    {
        if ($v === null) {
            $this->setContatoId(NULL);
        } else {
            $this->setContatoId($v->getId());
        }

        $this->aContato = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildContato object, it will not be re-added.
        if ($v !== null) {
            $v->addAtendimento($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildContato object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildContato The associated ChildContato object.
     * @throws PropelException
     */
    public function getContato(ConnectionInterface $con = null)
    {
        if ($this->aContato === null && ($this->contato_id != 0)) {
            $this->aContato = ChildContatoQuery::create()->findPk($this->contato_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aContato->addAtendimentos($this);
             */
        }

        return $this->aContato;
    }

    /**
     * Declares an association between this object and a ChildContrato object.
     *
     * @param  ChildContrato $v
     * @return $this|\Atendimento The current object (for fluent API support)
     * @throws PropelException
     */
    public function setContrato(ChildContrato $v = null)
    {
        if ($v === null) {
            $this->setContratoId(NULL);
        } else {
            $this->setContratoId($v->getId());
        }

        $this->aContrato = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildContrato object, it will not be re-added.
        if ($v !== null) {
            $v->addAtendimento($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildContrato object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildContrato The associated ChildContrato object.
     * @throws PropelException
     */
    public function getContrato(ConnectionInterface $con = null)
    {
        if ($this->aContrato === null && ($this->contrato_id != 0)) {
            $this->aContrato = ChildContratoQuery::create()->findPk($this->contrato_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aContrato->addAtendimentos($this);
             */
        }

        return $this->aContrato;
    }

    /**
     * Declares an association between this object and a ChildEstado object.
     *
     * @param  ChildEstado $v
     * @return $this|\Atendimento The current object (for fluent API support)
     * @throws PropelException
     */
    public function setEstado(ChildEstado $v = null)
    {
        if ($v === null) {
            $this->setEstadoId(NULL);
        } else {
            $this->setEstadoId($v->getId());
        }

        $this->aEstado = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildEstado object, it will not be re-added.
        if ($v !== null) {
            $v->addAtendimento($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildEstado object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildEstado The associated ChildEstado object.
     * @throws PropelException
     */
    public function getEstado(ConnectionInterface $con = null)
    {
        if ($this->aEstado === null && ($this->estado_id != 0)) {
            $this->aEstado = ChildEstadoQuery::create()->findPk($this->estado_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aEstado->addAtendimentos($this);
             */
        }

        return $this->aEstado;
    }

    /**
     * Declares an association between this object and a ChildMotivo object.
     *
     * @param  ChildMotivo $v
     * @return $this|\Atendimento The current object (for fluent API support)
     * @throws PropelException
     */
    public function setMotivo(ChildMotivo $v = null)
    {
        if ($v === null) {
            $this->setMotivoId(NULL);
        } else {
            $this->setMotivoId($v->getId());
        }

        $this->aMotivo = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildMotivo object, it will not be re-added.
        if ($v !== null) {
            $v->addAtendimento($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildMotivo object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildMotivo The associated ChildMotivo object.
     * @throws PropelException
     */
    public function getMotivo(ConnectionInterface $con = null)
    {
        if ($this->aMotivo === null && ($this->motivo_id != 0)) {
            $this->aMotivo = ChildMotivoQuery::create()->findPk($this->motivo_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aMotivo->addAtendimentos($this);
             */
        }

        return $this->aMotivo;
    }

    /**
     * Declares an association between this object and a ChildSolicitacao object.
     *
     * @param  ChildSolicitacao $v
     * @return $this|\Atendimento The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSolicitacao(ChildSolicitacao $v = null)
    {
        if ($v === null) {
            $this->setSolicitacaoId(NULL);
        } else {
            $this->setSolicitacaoId($v->getId());
        }

        $this->aSolicitacao = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildSolicitacao object, it will not be re-added.
        if ($v !== null) {
            $v->addAtendimento($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildSolicitacao object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildSolicitacao The associated ChildSolicitacao object.
     * @throws PropelException
     */
    public function getSolicitacao(ConnectionInterface $con = null)
    {
        if ($this->aSolicitacao === null && ($this->solicitacao_id != 0)) {
            $this->aSolicitacao = ChildSolicitacaoQuery::create()->findPk($this->solicitacao_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aSolicitacao->addAtendimentos($this);
             */
        }

        return $this->aSolicitacao;
    }

    /**
     * Declares an association between this object and a ChildTag object.
     *
     * @param  ChildTag $v
     * @return $this|\Atendimento The current object (for fluent API support)
     * @throws PropelException
     */
    public function setTag(ChildTag $v = null)
    {
        if ($v === null) {
            $this->setTagId(NULL);
        } else {
            $this->setTagId($v->getId());
        }

        $this->aTag = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildTag object, it will not be re-added.
        if ($v !== null) {
            $v->addAtendimento($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildTag object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildTag The associated ChildTag object.
     * @throws PropelException
     */
    public function getTag(ConnectionInterface $con = null)
    {
        if ($this->aTag === null && ($this->tag_id != 0)) {
            $this->aTag = ChildTagQuery::create()->findPk($this->tag_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aTag->addAtendimentos($this);
             */
        }

        return $this->aTag;
    }

    /**
     * Declares an association between this object and a ChildTipo object.
     *
     * @param  ChildTipo $v
     * @return $this|\Atendimento The current object (for fluent API support)
     * @throws PropelException
     */
    public function setTipo(ChildTipo $v = null)
    {
        if ($v === null) {
            $this->setTipoId(NULL);
        } else {
            $this->setTipoId($v->getId());
        }

        $this->aTipo = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildTipo object, it will not be re-added.
        if ($v !== null) {
            $v->addAtendimento($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildTipo object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildTipo The associated ChildTipo object.
     * @throws PropelException
     */
    public function getTipo(ConnectionInterface $con = null)
    {
        if ($this->aTipo === null && ($this->tipo_id != 0)) {
            $this->aTipo = ChildTipoQuery::create()->findPk($this->tipo_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aTipo->addAtendimentos($this);
             */
        }

        return $this->aTipo;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aAgendamento) {
            $this->aAgendamento->removeAtendimento($this);
        }
        if (null !== $this->aAtendente) {
            $this->aAtendente->removeAtendimento($this);
        }
        if (null !== $this->aBairro) {
            $this->aBairro->removeAtendimento($this);
        }
        if (null !== $this->aCidade) {
            $this->aCidade->removeAtendimento($this);
        }
        if (null !== $this->aContato) {
            $this->aContato->removeAtendimento($this);
        }
        if (null !== $this->aContrato) {
            $this->aContrato->removeAtendimento($this);
        }
        if (null !== $this->aEstado) {
            $this->aEstado->removeAtendimento($this);
        }
        if (null !== $this->aMotivo) {
            $this->aMotivo->removeAtendimento($this);
        }
        if (null !== $this->aSolicitacao) {
            $this->aSolicitacao->removeAtendimento($this);
        }
        if (null !== $this->aTag) {
            $this->aTag->removeAtendimento($this);
        }
        if (null !== $this->aTipo) {
            $this->aTipo->removeAtendimento($this);
        }
        $this->id = null;
        $this->data = null;
        $this->hora = null;
        $this->cadastro = null;
        $this->cliente = null;
        $this->tipo_id = null;
        $this->bairro_id = null;
        $this->cidade_id = null;
        $this->estado_id = null;
        $this->contato_id = null;
        $this->solicitacao_id = null;
        $this->motivo_id = null;
        $this->contrato_id = null;
        $this->agendamento_id = null;
        $this->atendente_id = null;
        $this->telefone = null;
        $this->tag_id = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references and back-references to other model objects or collections of model objects.
     *
     * This method is used to reset all php object references (not the actual reference in the database).
     * Necessary for object serialisation.
     *
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
        } // if ($deep)

        $this->aAgendamento = null;
        $this->aAtendente = null;
        $this->aBairro = null;
        $this->aCidade = null;
        $this->aContato = null;
        $this->aContrato = null;
        $this->aEstado = null;
        $this->aMotivo = null;
        $this->aSolicitacao = null;
        $this->aTag = null;
        $this->aTipo = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(AtendimentoTableMap::DEFAULT_STRING_FORMAT);
    }

    /**
     * Code to be run before persisting the object
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preSave')) {
            return parent::preSave($con);
        }
        return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface $con
     */
    public function postSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postSave')) {
            parent::postSave($con);
        }
    }

    /**
     * Code to be run before inserting to database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preInsert')) {
            return parent::preInsert($con);
        }
        return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface $con
     */
    public function postInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postInsert')) {
            parent::postInsert($con);
        }
    }

    /**
     * Code to be run before updating the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preUpdate')) {
            return parent::preUpdate($con);
        }
        return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface $con
     */
    public function postUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postUpdate')) {
            parent::postUpdate($con);
        }
    }

    /**
     * Code to be run before deleting the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preDelete')) {
            return parent::preDelete($con);
        }
        return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface $con
     */
    public function postDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postDelete')) {
            parent::postDelete($con);
        }
    }


    /**
     * Derived method to catches calls to undefined methods.
     *
     * Provides magic import/export method support (fromXML()/toXML(), fromYAML()/toYAML(), etc.).
     * Allows to define default __call() behavior if you overwrite __call()
     *
     * @param string $name
     * @param mixed  $params
     *
     * @return array|string
     */
    public function __call($name, $params)
    {
        if (0 === strpos($name, 'get')) {
            $virtualColumn = substr($name, 3);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }

            $virtualColumn = lcfirst($virtualColumn);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }
        }

        if (0 === strpos($name, 'from')) {
            $format = substr($name, 4);

            return $this->importFrom($format, reset($params));
        }

        if (0 === strpos($name, 'to')) {
            $format = substr($name, 2);
            $includeLazyLoadColumns = isset($params[0]) ? $params[0] : true;

            return $this->exportTo($format, $includeLazyLoadColumns);
        }

        throw new BadMethodCallException(sprintf('Call to undefined method: %s.', $name));
    }

}
