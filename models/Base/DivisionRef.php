<?php

namespace Base;

use \DivisionRef as ChildDivisionRef;
use \DivisionRefQuery as ChildDivisionRefQuery;
use \Players as ChildPlayers;
use \PlayersQuery as ChildPlayersQuery;
use \Teams as ChildTeams;
use \TeamsQuery as ChildTeamsQuery;
use \Exception;
use \PDO;
use Map\DivisionRefTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;

/**
 * Base class that represents a row from the 'division_ref' table.
 *
 *
 *
* @package    propel.generator..Base
*/
abstract class DivisionRef implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\DivisionRefTableMap';


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
     * The value for the division field.
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $division;

    /**
     * @var        ObjectCollection|ChildTeams[] Collection to store aggregation of ChildTeams objects.
     */
    protected $collTeamss;
    protected $collTeamssPartial;

    /**
     * @var        ObjectCollection|ChildPlayers[] Collection to store aggregation of ChildPlayers objects.
     */
    protected $collPlayerss;
    protected $collPlayerssPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildTeams[]
     */
    protected $teamssScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildPlayers[]
     */
    protected $playerssScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
        $this->division = '';
    }

    /**
     * Initializes internal state of Base\DivisionRef object.
     * @see applyDefaults()
     */
    public function __construct()
    {
        $this->applyDefaultValues();
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
     * Compares this with another <code>DivisionRef</code> instance.  If
     * <code>obj</code> is an instance of <code>DivisionRef</code>, delegates to
     * <code>equals(DivisionRef)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|DivisionRef The current object, for fluid interface
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

        return array_keys(get_object_vars($this));
    }

    /**
     * Get the [division] column value.
     *
     * @return string
     */
    public function getDivision()
    {
        return $this->division;
    }

    /**
     * Set the value of [division] column.
     *
     * @param string $v new value
     * @return $this|\DivisionRef The current object (for fluent API support)
     */
    public function setDivision($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->division !== $v) {
            $this->division = $v;
            $this->modifiedColumns[DivisionRefTableMap::COL_DIVISION] = true;
        }

        return $this;
    } // setDivision()

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
            if ($this->division !== '') {
                return false;
            }

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : DivisionRefTableMap::translateFieldName('Division', TableMap::TYPE_PHPNAME, $indexType)];
            $this->division = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 1; // 1 = DivisionRefTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\DivisionRef'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(DivisionRefTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildDivisionRefQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collTeamss = null;

            $this->collPlayerss = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see DivisionRef::setDeleted()
     * @see DivisionRef::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(DivisionRefTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildDivisionRefQuery::create()
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

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(DivisionRefTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $isInsert = $this->isNew();
            $ret = $this->preSave($con);
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
                DivisionRefTableMap::addInstanceToPool($this);
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

            if ($this->teamssScheduledForDeletion !== null) {
                if (!$this->teamssScheduledForDeletion->isEmpty()) {
                    foreach ($this->teamssScheduledForDeletion as $teams) {
                        // need to save related object because we set the relation to null
                        $teams->save($con);
                    }
                    $this->teamssScheduledForDeletion = null;
                }
            }

            if ($this->collTeamss !== null) {
                foreach ($this->collTeamss as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->playerssScheduledForDeletion !== null) {
                if (!$this->playerssScheduledForDeletion->isEmpty()) {
                    foreach ($this->playerssScheduledForDeletion as $players) {
                        // need to save related object because we set the relation to null
                        $players->save($con);
                    }
                    $this->playerssScheduledForDeletion = null;
                }
            }

            if ($this->collPlayerss !== null) {
                foreach ($this->collPlayerss as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
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


         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(DivisionRefTableMap::COL_DIVISION)) {
            $modifiedColumns[':p' . $index++]  = 'division';
        }

        $sql = sprintf(
            'INSERT INTO division_ref (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'division':
                        $stmt->bindValue($identifier, $this->division, PDO::PARAM_STR);
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
        $pos = DivisionRefTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getDivision();
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

        if (isset($alreadyDumpedObjects['DivisionRef'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['DivisionRef'][$this->hashCode()] = true;
        $keys = DivisionRefTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getDivision(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->collTeamss) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'teamss';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'Teamss';
                        break;
                    default:
                        $key = 'Teamss';
                }

                $result[$key] = $this->collTeamss->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPlayerss) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'playerss';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'playerss';
                        break;
                    default:
                        $key = 'Playerss';
                }

                $result[$key] = $this->collPlayerss->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
     * @return $this|\DivisionRef
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = DivisionRefTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\DivisionRef
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setDivision($value);
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
        $keys = DivisionRefTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setDivision($arr[$keys[0]]);
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
     * @return $this|\DivisionRef The current object, for fluid interface
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
        $criteria = new Criteria(DivisionRefTableMap::DATABASE_NAME);

        if ($this->isColumnModified(DivisionRefTableMap::COL_DIVISION)) {
            $criteria->add(DivisionRefTableMap::COL_DIVISION, $this->division);
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
        $criteria = ChildDivisionRefQuery::create();
        $criteria->add(DivisionRefTableMap::COL_DIVISION, $this->division);

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
        $validPk = null !== $this->getDivision();

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
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getDivision();
    }

    /**
     * Generic method to set the primary key (division column).
     *
     * @param       string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setDivision($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getDivision();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \DivisionRef (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setDivision($this->getDivision());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getTeamss() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTeams($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPlayerss() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPlayers($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
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
     * @return \DivisionRef Clone of current object.
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
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param      string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('Teams' == $relationName) {
            return $this->initTeamss();
        }
        if ('Players' == $relationName) {
            return $this->initPlayerss();
        }
    }

    /**
     * Clears out the collTeamss collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addTeamss()
     */
    public function clearTeamss()
    {
        $this->collTeamss = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collTeamss collection loaded partially.
     */
    public function resetPartialTeamss($v = true)
    {
        $this->collTeamssPartial = $v;
    }

    /**
     * Initializes the collTeamss collection.
     *
     * By default this just sets the collTeamss collection to an empty array (like clearcollTeamss());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTeamss($overrideExisting = true)
    {
        if (null !== $this->collTeamss && !$overrideExisting) {
            return;
        }
        $this->collTeamss = new ObjectCollection();
        $this->collTeamss->setModel('\Teams');
    }

    /**
     * Gets an array of ChildTeams objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildDivisionRef is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildTeams[] List of ChildTeams objects
     * @throws PropelException
     */
    public function getTeamss(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collTeamssPartial && !$this->isNew();
        if (null === $this->collTeamss || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTeamss) {
                // return empty collection
                $this->initTeamss();
            } else {
                $collTeamss = ChildTeamsQuery::create(null, $criteria)
                    ->filterByDivisionRef($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collTeamssPartial && count($collTeamss)) {
                        $this->initTeamss(false);

                        foreach ($collTeamss as $obj) {
                            if (false == $this->collTeamss->contains($obj)) {
                                $this->collTeamss->append($obj);
                            }
                        }

                        $this->collTeamssPartial = true;
                    }

                    return $collTeamss;
                }

                if ($partial && $this->collTeamss) {
                    foreach ($this->collTeamss as $obj) {
                        if ($obj->isNew()) {
                            $collTeamss[] = $obj;
                        }
                    }
                }

                $this->collTeamss = $collTeamss;
                $this->collTeamssPartial = false;
            }
        }

        return $this->collTeamss;
    }

    /**
     * Sets a collection of ChildTeams objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $teamss A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildDivisionRef The current object (for fluent API support)
     */
    public function setTeamss(Collection $teamss, ConnectionInterface $con = null)
    {
        /** @var ChildTeams[] $teamssToDelete */
        $teamssToDelete = $this->getTeamss(new Criteria(), $con)->diff($teamss);


        $this->teamssScheduledForDeletion = $teamssToDelete;

        foreach ($teamssToDelete as $teamsRemoved) {
            $teamsRemoved->setDivisionRef(null);
        }

        $this->collTeamss = null;
        foreach ($teamss as $teams) {
            $this->addTeams($teams);
        }

        $this->collTeamss = $teamss;
        $this->collTeamssPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Teams objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Teams objects.
     * @throws PropelException
     */
    public function countTeamss(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collTeamssPartial && !$this->isNew();
        if (null === $this->collTeamss || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTeamss) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getTeamss());
            }

            $query = ChildTeamsQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByDivisionRef($this)
                ->count($con);
        }

        return count($this->collTeamss);
    }

    /**
     * Method called to associate a ChildTeams object to this object
     * through the ChildTeams foreign key attribute.
     *
     * @param  ChildTeams $l ChildTeams
     * @return $this|\DivisionRef The current object (for fluent API support)
     */
    public function addTeams(ChildTeams $l)
    {
        if ($this->collTeamss === null) {
            $this->initTeamss();
            $this->collTeamssPartial = true;
        }

        if (!$this->collTeamss->contains($l)) {
            $this->doAddTeams($l);
        }

        return $this;
    }

    /**
     * @param ChildTeams $teams The ChildTeams object to add.
     */
    protected function doAddTeams(ChildTeams $teams)
    {
        $this->collTeamss[]= $teams;
        $teams->setDivisionRef($this);
    }

    /**
     * @param  ChildTeams $teams The ChildTeams object to remove.
     * @return $this|ChildDivisionRef The current object (for fluent API support)
     */
    public function removeTeams(ChildTeams $teams)
    {
        if ($this->getTeamss()->contains($teams)) {
            $pos = $this->collTeamss->search($teams);
            $this->collTeamss->remove($pos);
            if (null === $this->teamssScheduledForDeletion) {
                $this->teamssScheduledForDeletion = clone $this->collTeamss;
                $this->teamssScheduledForDeletion->clear();
            }
            $this->teamssScheduledForDeletion[]= $teams;
            $teams->setDivisionRef(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this DivisionRef is new, it will return
     * an empty collection; or if this DivisionRef has previously
     * been saved, it will retrieve related Teamss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in DivisionRef.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildTeams[] List of ChildTeams objects
     */
    public function getTeamssJoinLeagueRef(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildTeamsQuery::create(null, $criteria);
        $query->joinWith('LeagueRef', $joinBehavior);

        return $this->getTeamss($query, $con);
    }

    /**
     * Clears out the collPlayerss collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addPlayerss()
     */
    public function clearPlayerss()
    {
        $this->collPlayerss = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collPlayerss collection loaded partially.
     */
    public function resetPartialPlayerss($v = true)
    {
        $this->collPlayerssPartial = $v;
    }

    /**
     * Initializes the collPlayerss collection.
     *
     * By default this just sets the collPlayerss collection to an empty array (like clearcollPlayerss());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPlayerss($overrideExisting = true)
    {
        if (null !== $this->collPlayerss && !$overrideExisting) {
            return;
        }
        $this->collPlayerss = new ObjectCollection();
        $this->collPlayerss->setModel('\Players');
    }

    /**
     * Gets an array of ChildPlayers objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildDivisionRef is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildPlayers[] List of ChildPlayers objects
     * @throws PropelException
     */
    public function getPlayerss(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collPlayerssPartial && !$this->isNew();
        if (null === $this->collPlayerss || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPlayerss) {
                // return empty collection
                $this->initPlayerss();
            } else {
                $collPlayerss = ChildPlayersQuery::create(null, $criteria)
                    ->filterByDivisionRef($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collPlayerssPartial && count($collPlayerss)) {
                        $this->initPlayerss(false);

                        foreach ($collPlayerss as $obj) {
                            if (false == $this->collPlayerss->contains($obj)) {
                                $this->collPlayerss->append($obj);
                            }
                        }

                        $this->collPlayerssPartial = true;
                    }

                    return $collPlayerss;
                }

                if ($partial && $this->collPlayerss) {
                    foreach ($this->collPlayerss as $obj) {
                        if ($obj->isNew()) {
                            $collPlayerss[] = $obj;
                        }
                    }
                }

                $this->collPlayerss = $collPlayerss;
                $this->collPlayerssPartial = false;
            }
        }

        return $this->collPlayerss;
    }

    /**
     * Sets a collection of ChildPlayers objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $playerss A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildDivisionRef The current object (for fluent API support)
     */
    public function setPlayerss(Collection $playerss, ConnectionInterface $con = null)
    {
        /** @var ChildPlayers[] $playerssToDelete */
        $playerssToDelete = $this->getPlayerss(new Criteria(), $con)->diff($playerss);


        $this->playerssScheduledForDeletion = $playerssToDelete;

        foreach ($playerssToDelete as $playersRemoved) {
            $playersRemoved->setDivisionRef(null);
        }

        $this->collPlayerss = null;
        foreach ($playerss as $players) {
            $this->addPlayers($players);
        }

        $this->collPlayerss = $playerss;
        $this->collPlayerssPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Players objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Players objects.
     * @throws PropelException
     */
    public function countPlayerss(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collPlayerssPartial && !$this->isNew();
        if (null === $this->collPlayerss || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPlayerss) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getPlayerss());
            }

            $query = ChildPlayersQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByDivisionRef($this)
                ->count($con);
        }

        return count($this->collPlayerss);
    }

    /**
     * Method called to associate a ChildPlayers object to this object
     * through the ChildPlayers foreign key attribute.
     *
     * @param  ChildPlayers $l ChildPlayers
     * @return $this|\DivisionRef The current object (for fluent API support)
     */
    public function addPlayers(ChildPlayers $l)
    {
        if ($this->collPlayerss === null) {
            $this->initPlayerss();
            $this->collPlayerssPartial = true;
        }

        if (!$this->collPlayerss->contains($l)) {
            $this->doAddPlayers($l);
        }

        return $this;
    }

    /**
     * @param ChildPlayers $players The ChildPlayers object to add.
     */
    protected function doAddPlayers(ChildPlayers $players)
    {
        $this->collPlayerss[]= $players;
        $players->setDivisionRef($this);
    }

    /**
     * @param  ChildPlayers $players The ChildPlayers object to remove.
     * @return $this|ChildDivisionRef The current object (for fluent API support)
     */
    public function removePlayers(ChildPlayers $players)
    {
        if ($this->getPlayerss()->contains($players)) {
            $pos = $this->collPlayerss->search($players);
            $this->collPlayerss->remove($pos);
            if (null === $this->playerssScheduledForDeletion) {
                $this->playerssScheduledForDeletion = clone $this->collPlayerss;
                $this->playerssScheduledForDeletion->clear();
            }
            $this->playerssScheduledForDeletion[]= $players;
            $players->setDivisionRef(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this DivisionRef is new, it will return
     * an empty collection; or if this DivisionRef has previously
     * been saved, it will retrieve related Playerss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in DivisionRef.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildPlayers[] List of ChildPlayers objects
     */
    public function getPlayerssJoinMlbTeamRef(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildPlayersQuery::create(null, $criteria);
        $query->joinWith('MlbTeamRef', $joinBehavior);

        return $this->getPlayerss($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this DivisionRef is new, it will return
     * an empty collection; or if this DivisionRef has previously
     * been saved, it will retrieve related Playerss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in DivisionRef.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildPlayers[] List of ChildPlayers objects
     */
    public function getPlayerssJoinCardRef(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildPlayersQuery::create(null, $criteria);
        $query->joinWith('CardRef', $joinBehavior);

        return $this->getPlayerss($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this DivisionRef is new, it will return
     * an empty collection; or if this DivisionRef has previously
     * been saved, it will retrieve related Playerss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in DivisionRef.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildPlayers[] List of ChildPlayers objects
     */
    public function getPlayerssJoinPositionRef(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildPlayersQuery::create(null, $criteria);
        $query->joinWith('PositionRef', $joinBehavior);

        return $this->getPlayerss($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this DivisionRef is new, it will return
     * an empty collection; or if this DivisionRef has previously
     * been saved, it will retrieve related Playerss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in DivisionRef.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildPlayers[] List of ChildPlayers objects
     */
    public function getPlayerssJoinTeams(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildPlayersQuery::create(null, $criteria);
        $query->joinWith('Teams', $joinBehavior);

        return $this->getPlayerss($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        $this->division = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->applyDefaultValues();
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
            if ($this->collTeamss) {
                foreach ($this->collTeamss as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPlayerss) {
                foreach ($this->collPlayerss as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collTeamss = null;
        $this->collPlayerss = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(DivisionRefTableMap::DEFAULT_STRING_FORMAT);
    }

    /**
     * Code to be run before persisting the object
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preSave(ConnectionInterface $con = null)
    {
        return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface $con
     */
    public function postSave(ConnectionInterface $con = null)
    {

    }

    /**
     * Code to be run before inserting to database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preInsert(ConnectionInterface $con = null)
    {
        return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface $con
     */
    public function postInsert(ConnectionInterface $con = null)
    {

    }

    /**
     * Code to be run before updating the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preUpdate(ConnectionInterface $con = null)
    {
        return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface $con
     */
    public function postUpdate(ConnectionInterface $con = null)
    {

    }

    /**
     * Code to be run before deleting the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preDelete(ConnectionInterface $con = null)
    {
        return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface $con
     */
    public function postDelete(ConnectionInterface $con = null)
    {

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
