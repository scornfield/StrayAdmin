<?php

namespace Base;

use \CardRef as ChildCardRef;
use \CardRefQuery as ChildCardRefQuery;
use \DivisionRef as ChildDivisionRef;
use \DivisionRefQuery as ChildDivisionRefQuery;
use \MlbTeamRef as ChildMlbTeamRef;
use \MlbTeamRefQuery as ChildMlbTeamRefQuery;
use \PlayersQuery as ChildPlayersQuery;
use \PositionRef as ChildPositionRef;
use \PositionRefQuery as ChildPositionRefQuery;
use \Teams as ChildTeams;
use \TeamsQuery as ChildTeamsQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\PlayersTableMap;
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
use Propel\Runtime\Util\PropelDateTime;

/**
 * Base class that represents a row from the 'players' table.
 *
 *
 *
* @package    propel.generator..Base
*/
abstract class Players implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\PlayersTableMap';


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
     * @var        int
     */
    protected $id;

    /**
     * The value for the lastn field.
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $lastn;

    /**
     * The value for the bats field.
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $bats;

    /**
     * The value for the bday field.
     * @var        \DateTime
     */
    protected $bday;

    /**
     * The value for the age field.
     * @var        int
     */
    protected $age;

    /**
     * The value for the mlb field.
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $mlb;

    /**
     * The value for the draft_year field.
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $draft_year;

    /**
     * The value for the position field.
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $position;

    /**
     * The value for the card field.
     * @var        boolean
     */
    protected $card;

    /**
     * The value for the d_e field.
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $d_e;

    /**
     * The value for the lg field.
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $lg;

    /**
     * The value for the mwbl field.
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $mwbl;

    /**
     * The value for the category field.
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $category;

    /**
     * The value for the comment field.
     * @var        string
     */
    protected $comment;

    /**
     * The value for the mwbl_link field.
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $mwbl_link;

    /**
     * The value for the mlb_link field.
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $mlb_link;

    /**
     * The value for the mwbl_link_enabled field.
     * @var        boolean
     */
    protected $mwbl_link_enabled;

    /**
     * The value for the mlb_link_enabled field.
     * @var        boolean
     */
    protected $mlb_link_enabled;

    /**
     * The value for the create_ts field.
     * Note: this column has a database default value of: (expression) CURRENT_TIMESTAMP
     * @var        \DateTime
     */
    protected $create_ts;

    /**
     * The value for the maint_ts field.
     * Note: this column has a database default value of: (expression) CURRENT_TIMESTAMP
     * @var        \DateTime
     */
    protected $maint_ts;

    /**
     * @var        ChildMlbTeamRef
     */
    protected $aMlbTeamRef;

    /**
     * @var        ChildCardRef
     */
    protected $aCardRef;

    /**
     * @var        ChildDivisionRef
     */
    protected $aDivisionRef;

    /**
     * @var        ChildPositionRef
     */
    protected $aPositionRef;

    /**
     * @var        ChildTeams
     */
    protected $aTeams;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
        $this->lastn = '';
        $this->bats = '';
        $this->mlb = '';
        $this->draft_year = '';
        $this->position = '';
        $this->d_e = '';
        $this->lg = '';
        $this->mwbl = '';
        $this->category = '';
        $this->mwbl_link = '';
        $this->mlb_link = '';
    }

    /**
     * Initializes internal state of Base\Players object.
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
     * Compares this with another <code>Players</code> instance.  If
     * <code>obj</code> is an instance of <code>Players</code>, delegates to
     * <code>equals(Players)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|Players The current object, for fluid interface
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
     * Get the [id] column value.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the [lastn] column value.
     *
     * @return string
     */
    public function getLastn()
    {
        return $this->lastn;
    }

    /**
     * Get the [bats] column value.
     *
     * @return string
     */
    public function getBats()
    {
        return $this->bats;
    }

    /**
     * Get the [optionally formatted] temporal [bday] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getBday($format = NULL)
    {
        if ($format === null) {
            return $this->bday;
        } else {
            return $this->bday instanceof \DateTime ? $this->bday->format($format) : null;
        }
    }

    /**
     * Get the [age] column value.
     *
     * @return int
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Get the [mlb] column value.
     *
     * @return string
     */
    public function getMlb()
    {
        return $this->mlb;
    }

    /**
     * Get the [draft_year] column value.
     *
     * @return string
     */
    public function getDraftYear()
    {
        return $this->draft_year;
    }

    /**
     * Get the [position] column value.
     *
     * @return string
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Get the [card] column value.
     *
     * @return boolean
     */
    public function getCard()
    {
        return $this->card;
    }

    /**
     * Get the [card] column value.
     *
     * @return boolean
     */
    public function isCard()
    {
        return $this->getCard();
    }

    /**
     * Get the [d_e] column value.
     *
     * @return string
     */
    public function getDE()
    {
        return $this->d_e;
    }

    /**
     * Get the [lg] column value.
     *
     * @return string
     */
    public function getLg()
    {
        return $this->lg;
    }

    /**
     * Get the [mwbl] column value.
     *
     * @return string
     */
    public function getMwbl()
    {
        return $this->mwbl;
    }

    /**
     * Get the [category] column value.
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Get the [comment] column value.
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Get the [mwbl_link] column value.
     *
     * @return string
     */
    public function getMwblLink()
    {
        return $this->mwbl_link;
    }

    /**
     * Get the [mlb_link] column value.
     *
     * @return string
     */
    public function getMlbLink()
    {
        return $this->mlb_link;
    }

    /**
     * Get the [mwbl_link_enabled] column value.
     *
     * @return boolean
     */
    public function getMwblLinkEnabled()
    {
        return $this->mwbl_link_enabled;
    }

    /**
     * Get the [mwbl_link_enabled] column value.
     *
     * @return boolean
     */
    public function isMwblLinkEnabled()
    {
        return $this->getMwblLinkEnabled();
    }

    /**
     * Get the [mlb_link_enabled] column value.
     *
     * @return boolean
     */
    public function getMlbLinkEnabled()
    {
        return $this->mlb_link_enabled;
    }

    /**
     * Get the [mlb_link_enabled] column value.
     *
     * @return boolean
     */
    public function isMlbLinkEnabled()
    {
        return $this->getMlbLinkEnabled();
    }

    /**
     * Get the [optionally formatted] temporal [create_ts] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getCreateTs($format = NULL)
    {
        if ($format === null) {
            return $this->create_ts;
        } else {
            return $this->create_ts instanceof \DateTime ? $this->create_ts->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [maint_ts] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getMaintTs($format = NULL)
    {
        if ($format === null) {
            return $this->maint_ts;
        } else {
            return $this->maint_ts instanceof \DateTime ? $this->maint_ts->format($format) : null;
        }
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return $this|\Players The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[PlayersTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [lastn] column.
     *
     * @param string $v new value
     * @return $this|\Players The current object (for fluent API support)
     */
    public function setLastn($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->lastn !== $v) {
            $this->lastn = $v;
            $this->modifiedColumns[PlayersTableMap::COL_LASTN] = true;
        }

        return $this;
    } // setLastn()

    /**
     * Set the value of [bats] column.
     *
     * @param string $v new value
     * @return $this|\Players The current object (for fluent API support)
     */
    public function setBats($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->bats !== $v) {
            $this->bats = $v;
            $this->modifiedColumns[PlayersTableMap::COL_BATS] = true;
        }

        return $this;
    } // setBats()

    /**
     * Sets the value of [bday] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return $this|\Players The current object (for fluent API support)
     */
    public function setBday($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->bday !== null || $dt !== null) {
            if ($this->bday === null || $dt === null || $dt->format("Y-m-d") !== $this->bday->format("Y-m-d")) {
                $this->bday = $dt === null ? null : clone $dt;
                $this->modifiedColumns[PlayersTableMap::COL_BDAY] = true;
            }
        } // if either are not null

        return $this;
    } // setBday()

    /**
     * Set the value of [age] column.
     *
     * @param int $v new value
     * @return $this|\Players The current object (for fluent API support)
     */
    public function setAge($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->age !== $v) {
            $this->age = $v;
            $this->modifiedColumns[PlayersTableMap::COL_AGE] = true;
        }

        return $this;
    } // setAge()

    /**
     * Set the value of [mlb] column.
     *
     * @param string $v new value
     * @return $this|\Players The current object (for fluent API support)
     */
    public function setMlb($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->mlb !== $v) {
            $this->mlb = $v;
            $this->modifiedColumns[PlayersTableMap::COL_MLB] = true;
        }

        if ($this->aMlbTeamRef !== null && $this->aMlbTeamRef->getMlb() !== $v) {
            $this->aMlbTeamRef = null;
        }

        return $this;
    } // setMlb()

    /**
     * Set the value of [draft_year] column.
     *
     * @param string $v new value
     * @return $this|\Players The current object (for fluent API support)
     */
    public function setDraftYear($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->draft_year !== $v) {
            $this->draft_year = $v;
            $this->modifiedColumns[PlayersTableMap::COL_DRAFT_YEAR] = true;
        }

        return $this;
    } // setDraftYear()

    /**
     * Set the value of [position] column.
     *
     * @param string $v new value
     * @return $this|\Players The current object (for fluent API support)
     */
    public function setPosition($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->position !== $v) {
            $this->position = $v;
            $this->modifiedColumns[PlayersTableMap::COL_POSITION] = true;
        }

        if ($this->aPositionRef !== null && $this->aPositionRef->getPosition() !== $v) {
            $this->aPositionRef = null;
        }

        return $this;
    } // setPosition()

    /**
     * Sets the value of the [card] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\Players The current object (for fluent API support)
     */
    public function setCard($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->card !== $v) {
            $this->card = $v;
            $this->modifiedColumns[PlayersTableMap::COL_CARD] = true;
        }

        if ($this->aCardRef !== null && $this->aCardRef->getCard() !== $v) {
            $this->aCardRef = null;
        }

        return $this;
    } // setCard()

    /**
     * Set the value of [d_e] column.
     *
     * @param string $v new value
     * @return $this|\Players The current object (for fluent API support)
     */
    public function setDE($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->d_e !== $v) {
            $this->d_e = $v;
            $this->modifiedColumns[PlayersTableMap::COL_D_E] = true;
        }

        return $this;
    } // setDE()

    /**
     * Set the value of [lg] column.
     *
     * @param string $v new value
     * @return $this|\Players The current object (for fluent API support)
     */
    public function setLg($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->lg !== $v) {
            $this->lg = $v;
            $this->modifiedColumns[PlayersTableMap::COL_LG] = true;
        }

        if ($this->aDivisionRef !== null && $this->aDivisionRef->getDivision() !== $v) {
            $this->aDivisionRef = null;
        }

        return $this;
    } // setLg()

    /**
     * Set the value of [mwbl] column.
     *
     * @param string $v new value
     * @return $this|\Players The current object (for fluent API support)
     */
    public function setMwbl($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->mwbl !== $v) {
            $this->mwbl = $v;
            $this->modifiedColumns[PlayersTableMap::COL_MWBL] = true;
        }

        if ($this->aTeams !== null && $this->aTeams->getTeamAbbrev() !== $v) {
            $this->aTeams = null;
        }

        return $this;
    } // setMwbl()

    /**
     * Set the value of [category] column.
     *
     * @param string $v new value
     * @return $this|\Players The current object (for fluent API support)
     */
    public function setCategory($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->category !== $v) {
            $this->category = $v;
            $this->modifiedColumns[PlayersTableMap::COL_CATEGORY] = true;
        }

        return $this;
    } // setCategory()

    /**
     * Set the value of [comment] column.
     *
     * @param string $v new value
     * @return $this|\Players The current object (for fluent API support)
     */
    public function setComment($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->comment !== $v) {
            $this->comment = $v;
            $this->modifiedColumns[PlayersTableMap::COL_COMMENT] = true;
        }

        return $this;
    } // setComment()

    /**
     * Set the value of [mwbl_link] column.
     *
     * @param string $v new value
     * @return $this|\Players The current object (for fluent API support)
     */
    public function setMwblLink($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->mwbl_link !== $v) {
            $this->mwbl_link = $v;
            $this->modifiedColumns[PlayersTableMap::COL_MWBL_LINK] = true;
        }

        return $this;
    } // setMwblLink()

    /**
     * Set the value of [mlb_link] column.
     *
     * @param string $v new value
     * @return $this|\Players The current object (for fluent API support)
     */
    public function setMlbLink($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->mlb_link !== $v) {
            $this->mlb_link = $v;
            $this->modifiedColumns[PlayersTableMap::COL_MLB_LINK] = true;
        }

        return $this;
    } // setMlbLink()

    /**
     * Sets the value of the [mwbl_link_enabled] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\Players The current object (for fluent API support)
     */
    public function setMwblLinkEnabled($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->mwbl_link_enabled !== $v) {
            $this->mwbl_link_enabled = $v;
            $this->modifiedColumns[PlayersTableMap::COL_MWBL_LINK_ENABLED] = true;
        }

        return $this;
    } // setMwblLinkEnabled()

    /**
     * Sets the value of the [mlb_link_enabled] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\Players The current object (for fluent API support)
     */
    public function setMlbLinkEnabled($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->mlb_link_enabled !== $v) {
            $this->mlb_link_enabled = $v;
            $this->modifiedColumns[PlayersTableMap::COL_MLB_LINK_ENABLED] = true;
        }

        return $this;
    } // setMlbLinkEnabled()

    /**
     * Sets the value of [create_ts] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return $this|\Players The current object (for fluent API support)
     */
    public function setCreateTs($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_ts !== null || $dt !== null) {
            if ($this->create_ts === null || $dt === null || $dt->format("Y-m-d H:i:s") !== $this->create_ts->format("Y-m-d H:i:s")) {
                $this->create_ts = $dt === null ? null : clone $dt;
                $this->modifiedColumns[PlayersTableMap::COL_CREATE_TS] = true;
            }
        } // if either are not null

        return $this;
    } // setCreateTs()

    /**
     * Sets the value of [maint_ts] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return $this|\Players The current object (for fluent API support)
     */
    public function setMaintTs($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->maint_ts !== null || $dt !== null) {
            if ($this->maint_ts === null || $dt === null || $dt->format("Y-m-d H:i:s") !== $this->maint_ts->format("Y-m-d H:i:s")) {
                $this->maint_ts = $dt === null ? null : clone $dt;
                $this->modifiedColumns[PlayersTableMap::COL_MAINT_TS] = true;
            }
        } // if either are not null

        return $this;
    } // setMaintTs()

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
            if ($this->lastn !== '') {
                return false;
            }

            if ($this->bats !== '') {
                return false;
            }

            if ($this->mlb !== '') {
                return false;
            }

            if ($this->draft_year !== '') {
                return false;
            }

            if ($this->position !== '') {
                return false;
            }

            if ($this->d_e !== '') {
                return false;
            }

            if ($this->lg !== '') {
                return false;
            }

            if ($this->mwbl !== '') {
                return false;
            }

            if ($this->category !== '') {
                return false;
            }

            if ($this->mwbl_link !== '') {
                return false;
            }

            if ($this->mlb_link !== '') {
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : PlayersTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : PlayersTableMap::translateFieldName('Lastn', TableMap::TYPE_PHPNAME, $indexType)];
            $this->lastn = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : PlayersTableMap::translateFieldName('Bats', TableMap::TYPE_PHPNAME, $indexType)];
            $this->bats = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : PlayersTableMap::translateFieldName('Bday', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->bday = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : PlayersTableMap::translateFieldName('Age', TableMap::TYPE_PHPNAME, $indexType)];
            $this->age = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : PlayersTableMap::translateFieldName('Mlb', TableMap::TYPE_PHPNAME, $indexType)];
            $this->mlb = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : PlayersTableMap::translateFieldName('DraftYear', TableMap::TYPE_PHPNAME, $indexType)];
            $this->draft_year = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : PlayersTableMap::translateFieldName('Position', TableMap::TYPE_PHPNAME, $indexType)];
            $this->position = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : PlayersTableMap::translateFieldName('Card', TableMap::TYPE_PHPNAME, $indexType)];
            $this->card = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : PlayersTableMap::translateFieldName('DE', TableMap::TYPE_PHPNAME, $indexType)];
            $this->d_e = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : PlayersTableMap::translateFieldName('Lg', TableMap::TYPE_PHPNAME, $indexType)];
            $this->lg = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : PlayersTableMap::translateFieldName('Mwbl', TableMap::TYPE_PHPNAME, $indexType)];
            $this->mwbl = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : PlayersTableMap::translateFieldName('Category', TableMap::TYPE_PHPNAME, $indexType)];
            $this->category = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : PlayersTableMap::translateFieldName('Comment', TableMap::TYPE_PHPNAME, $indexType)];
            $this->comment = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : PlayersTableMap::translateFieldName('MwblLink', TableMap::TYPE_PHPNAME, $indexType)];
            $this->mwbl_link = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : PlayersTableMap::translateFieldName('MlbLink', TableMap::TYPE_PHPNAME, $indexType)];
            $this->mlb_link = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : PlayersTableMap::translateFieldName('MwblLinkEnabled', TableMap::TYPE_PHPNAME, $indexType)];
            $this->mwbl_link_enabled = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : PlayersTableMap::translateFieldName('MlbLinkEnabled', TableMap::TYPE_PHPNAME, $indexType)];
            $this->mlb_link_enabled = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : PlayersTableMap::translateFieldName('CreateTs', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->create_ts = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : PlayersTableMap::translateFieldName('MaintTs', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->maint_ts = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 20; // 20 = PlayersTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Players'), 0, $e);
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
        if ($this->aMlbTeamRef !== null && $this->mlb !== $this->aMlbTeamRef->getMlb()) {
            $this->aMlbTeamRef = null;
        }
        if ($this->aPositionRef !== null && $this->position !== $this->aPositionRef->getPosition()) {
            $this->aPositionRef = null;
        }
        if ($this->aCardRef !== null && $this->card !== $this->aCardRef->getCard()) {
            $this->aCardRef = null;
        }
        if ($this->aDivisionRef !== null && $this->lg !== $this->aDivisionRef->getDivision()) {
            $this->aDivisionRef = null;
        }
        if ($this->aTeams !== null && $this->mwbl !== $this->aTeams->getTeamAbbrev()) {
            $this->aTeams = null;
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
            $con = Propel::getServiceContainer()->getReadConnection(PlayersTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildPlayersQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aMlbTeamRef = null;
            $this->aCardRef = null;
            $this->aDivisionRef = null;
            $this->aPositionRef = null;
            $this->aTeams = null;
        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Players::setDeleted()
     * @see Players::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(PlayersTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildPlayersQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(PlayersTableMap::DATABASE_NAME);
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
                PlayersTableMap::addInstanceToPool($this);
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

            if ($this->aMlbTeamRef !== null) {
                if ($this->aMlbTeamRef->isModified() || $this->aMlbTeamRef->isNew()) {
                    $affectedRows += $this->aMlbTeamRef->save($con);
                }
                $this->setMlbTeamRef($this->aMlbTeamRef);
            }

            if ($this->aCardRef !== null) {
                if ($this->aCardRef->isModified() || $this->aCardRef->isNew()) {
                    $affectedRows += $this->aCardRef->save($con);
                }
                $this->setCardRef($this->aCardRef);
            }

            if ($this->aDivisionRef !== null) {
                if ($this->aDivisionRef->isModified() || $this->aDivisionRef->isNew()) {
                    $affectedRows += $this->aDivisionRef->save($con);
                }
                $this->setDivisionRef($this->aDivisionRef);
            }

            if ($this->aPositionRef !== null) {
                if ($this->aPositionRef->isModified() || $this->aPositionRef->isNew()) {
                    $affectedRows += $this->aPositionRef->save($con);
                }
                $this->setPositionRef($this->aPositionRef);
            }

            if ($this->aTeams !== null) {
                if ($this->aTeams->isModified() || $this->aTeams->isNew()) {
                    $affectedRows += $this->aTeams->save($con);
                }
                $this->setTeams($this->aTeams);
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

        $this->modifiedColumns[PlayersTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . PlayersTableMap::COL_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(PlayersTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'ID';
        }
        if ($this->isColumnModified(PlayersTableMap::COL_LASTN)) {
            $modifiedColumns[':p' . $index++]  = 'lastn';
        }
        if ($this->isColumnModified(PlayersTableMap::COL_BATS)) {
            $modifiedColumns[':p' . $index++]  = 'bats';
        }
        if ($this->isColumnModified(PlayersTableMap::COL_BDAY)) {
            $modifiedColumns[':p' . $index++]  = 'bday';
        }
        if ($this->isColumnModified(PlayersTableMap::COL_AGE)) {
            $modifiedColumns[':p' . $index++]  = 'age';
        }
        if ($this->isColumnModified(PlayersTableMap::COL_MLB)) {
            $modifiedColumns[':p' . $index++]  = 'mlb';
        }
        if ($this->isColumnModified(PlayersTableMap::COL_DRAFT_YEAR)) {
            $modifiedColumns[':p' . $index++]  = 'draft_year';
        }
        if ($this->isColumnModified(PlayersTableMap::COL_POSITION)) {
            $modifiedColumns[':p' . $index++]  = 'position';
        }
        if ($this->isColumnModified(PlayersTableMap::COL_CARD)) {
            $modifiedColumns[':p' . $index++]  = 'card';
        }
        if ($this->isColumnModified(PlayersTableMap::COL_D_E)) {
            $modifiedColumns[':p' . $index++]  = 'd_e';
        }
        if ($this->isColumnModified(PlayersTableMap::COL_LG)) {
            $modifiedColumns[':p' . $index++]  = 'lg';
        }
        if ($this->isColumnModified(PlayersTableMap::COL_MWBL)) {
            $modifiedColumns[':p' . $index++]  = 'mwbl';
        }
        if ($this->isColumnModified(PlayersTableMap::COL_CATEGORY)) {
            $modifiedColumns[':p' . $index++]  = 'category';
        }
        if ($this->isColumnModified(PlayersTableMap::COL_COMMENT)) {
            $modifiedColumns[':p' . $index++]  = 'comment';
        }
        if ($this->isColumnModified(PlayersTableMap::COL_MWBL_LINK)) {
            $modifiedColumns[':p' . $index++]  = 'mwbl_link';
        }
        if ($this->isColumnModified(PlayersTableMap::COL_MLB_LINK)) {
            $modifiedColumns[':p' . $index++]  = 'mlb_link';
        }
        if ($this->isColumnModified(PlayersTableMap::COL_MWBL_LINK_ENABLED)) {
            $modifiedColumns[':p' . $index++]  = 'mwbl_link_enabled';
        }
        if ($this->isColumnModified(PlayersTableMap::COL_MLB_LINK_ENABLED)) {
            $modifiedColumns[':p' . $index++]  = 'mlb_link_enabled';
        }
        if ($this->isColumnModified(PlayersTableMap::COL_CREATE_TS)) {
            $modifiedColumns[':p' . $index++]  = 'create_ts';
        }
        if ($this->isColumnModified(PlayersTableMap::COL_MAINT_TS)) {
            $modifiedColumns[':p' . $index++]  = 'maint_ts';
        }

        $sql = sprintf(
            'INSERT INTO players (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'ID':
                        $stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
                        break;
                    case 'lastn':
                        $stmt->bindValue($identifier, $this->lastn, PDO::PARAM_STR);
                        break;
                    case 'bats':
                        $stmt->bindValue($identifier, $this->bats, PDO::PARAM_STR);
                        break;
                    case 'bday':
                        $stmt->bindValue($identifier, $this->bday ? $this->bday->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
                        break;
                    case 'age':
                        $stmt->bindValue($identifier, $this->age, PDO::PARAM_INT);
                        break;
                    case 'mlb':
                        $stmt->bindValue($identifier, $this->mlb, PDO::PARAM_STR);
                        break;
                    case 'draft_year':
                        $stmt->bindValue($identifier, $this->draft_year, PDO::PARAM_STR);
                        break;
                    case 'position':
                        $stmt->bindValue($identifier, $this->position, PDO::PARAM_STR);
                        break;
                    case 'card':
                        $stmt->bindValue($identifier, (int) $this->card, PDO::PARAM_INT);
                        break;
                    case 'd_e':
                        $stmt->bindValue($identifier, $this->d_e, PDO::PARAM_STR);
                        break;
                    case 'lg':
                        $stmt->bindValue($identifier, $this->lg, PDO::PARAM_STR);
                        break;
                    case 'mwbl':
                        $stmt->bindValue($identifier, $this->mwbl, PDO::PARAM_STR);
                        break;
                    case 'category':
                        $stmt->bindValue($identifier, $this->category, PDO::PARAM_STR);
                        break;
                    case 'comment':
                        $stmt->bindValue($identifier, $this->comment, PDO::PARAM_STR);
                        break;
                    case 'mwbl_link':
                        $stmt->bindValue($identifier, $this->mwbl_link, PDO::PARAM_STR);
                        break;
                    case 'mlb_link':
                        $stmt->bindValue($identifier, $this->mlb_link, PDO::PARAM_STR);
                        break;
                    case 'mwbl_link_enabled':
                        $stmt->bindValue($identifier, (int) $this->mwbl_link_enabled, PDO::PARAM_INT);
                        break;
                    case 'mlb_link_enabled':
                        $stmt->bindValue($identifier, (int) $this->mlb_link_enabled, PDO::PARAM_INT);
                        break;
                    case 'create_ts':
                        $stmt->bindValue($identifier, $this->create_ts ? $this->create_ts->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
                        break;
                    case 'maint_ts':
                        $stmt->bindValue($identifier, $this->maint_ts ? $this->maint_ts->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setId($pk);

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
        $pos = PlayersTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getLastn();
                break;
            case 2:
                return $this->getBats();
                break;
            case 3:
                return $this->getBday();
                break;
            case 4:
                return $this->getAge();
                break;
            case 5:
                return $this->getMlb();
                break;
            case 6:
                return $this->getDraftYear();
                break;
            case 7:
                return $this->getPosition();
                break;
            case 8:
                return $this->getCard();
                break;
            case 9:
                return $this->getDE();
                break;
            case 10:
                return $this->getLg();
                break;
            case 11:
                return $this->getMwbl();
                break;
            case 12:
                return $this->getCategory();
                break;
            case 13:
                return $this->getComment();
                break;
            case 14:
                return $this->getMwblLink();
                break;
            case 15:
                return $this->getMlbLink();
                break;
            case 16:
                return $this->getMwblLinkEnabled();
                break;
            case 17:
                return $this->getMlbLinkEnabled();
                break;
            case 18:
                return $this->getCreateTs();
                break;
            case 19:
                return $this->getMaintTs();
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

        if (isset($alreadyDumpedObjects['Players'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Players'][$this->hashCode()] = true;
        $keys = PlayersTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getLastn(),
            $keys[2] => $this->getBats(),
            $keys[3] => $this->getBday(),
            $keys[4] => $this->getAge(),
            $keys[5] => $this->getMlb(),
            $keys[6] => $this->getDraftYear(),
            $keys[7] => $this->getPosition(),
            $keys[8] => $this->getCard(),
            $keys[9] => $this->getDE(),
            $keys[10] => $this->getLg(),
            $keys[11] => $this->getMwbl(),
            $keys[12] => $this->getCategory(),
            $keys[13] => $this->getComment(),
            $keys[14] => $this->getMwblLink(),
            $keys[15] => $this->getMlbLink(),
            $keys[16] => $this->getMwblLinkEnabled(),
            $keys[17] => $this->getMlbLinkEnabled(),
            $keys[18] => $this->getCreateTs(),
            $keys[19] => $this->getMaintTs(),
        );

        $utc = new \DateTimeZone('utc');
        if ($result[$keys[3]] instanceof \DateTime) {
            // When changing timezone we don't want to change existing instances
            $dateTime = clone $result[$keys[3]];
            $result[$keys[3]] = $dateTime->setTimezone($utc)->format('Y-m-d\TH:i:s\Z');
        }

        if ($result[$keys[18]] instanceof \DateTime) {
            // When changing timezone we don't want to change existing instances
            $dateTime = clone $result[$keys[18]];
            $result[$keys[18]] = $dateTime->setTimezone($utc)->format('Y-m-d\TH:i:s\Z');
        }

        if ($result[$keys[19]] instanceof \DateTime) {
            // When changing timezone we don't want to change existing instances
            $dateTime = clone $result[$keys[19]];
            $result[$keys[19]] = $dateTime->setTimezone($utc)->format('Y-m-d\TH:i:s\Z');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aMlbTeamRef) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'mlbTeamRef';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'mlb_team_ref';
                        break;
                    default:
                        $key = 'MlbTeamRef';
                }

                $result[$key] = $this->aMlbTeamRef->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aCardRef) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'cardRef';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'card_ref';
                        break;
                    default:
                        $key = 'CardRef';
                }

                $result[$key] = $this->aCardRef->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aDivisionRef) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'divisionRef';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'division_ref';
                        break;
                    default:
                        $key = 'DivisionRef';
                }

                $result[$key] = $this->aDivisionRef->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aPositionRef) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'positionRef';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'position_ref';
                        break;
                    default:
                        $key = 'PositionRef';
                }

                $result[$key] = $this->aPositionRef->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aTeams) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'teams';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'Teams';
                        break;
                    default:
                        $key = 'Teams';
                }

                $result[$key] = $this->aTeams->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
     * @return $this|\Players
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = PlayersTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Players
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setLastn($value);
                break;
            case 2:
                $this->setBats($value);
                break;
            case 3:
                $this->setBday($value);
                break;
            case 4:
                $this->setAge($value);
                break;
            case 5:
                $this->setMlb($value);
                break;
            case 6:
                $this->setDraftYear($value);
                break;
            case 7:
                $this->setPosition($value);
                break;
            case 8:
                $this->setCard($value);
                break;
            case 9:
                $this->setDE($value);
                break;
            case 10:
                $this->setLg($value);
                break;
            case 11:
                $this->setMwbl($value);
                break;
            case 12:
                $this->setCategory($value);
                break;
            case 13:
                $this->setComment($value);
                break;
            case 14:
                $this->setMwblLink($value);
                break;
            case 15:
                $this->setMlbLink($value);
                break;
            case 16:
                $this->setMwblLinkEnabled($value);
                break;
            case 17:
                $this->setMlbLinkEnabled($value);
                break;
            case 18:
                $this->setCreateTs($value);
                break;
            case 19:
                $this->setMaintTs($value);
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
        $keys = PlayersTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setLastn($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setBats($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setBday($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setAge($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setMlb($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setDraftYear($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setPosition($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setCard($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setDE($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setLg($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setMwbl($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setCategory($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setComment($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setMwblLink($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setMlbLink($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setMwblLinkEnabled($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setMlbLinkEnabled($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setCreateTs($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setMaintTs($arr[$keys[19]]);
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
     * @return $this|\Players The current object, for fluid interface
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
        $criteria = new Criteria(PlayersTableMap::DATABASE_NAME);

        if ($this->isColumnModified(PlayersTableMap::COL_ID)) {
            $criteria->add(PlayersTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(PlayersTableMap::COL_LASTN)) {
            $criteria->add(PlayersTableMap::COL_LASTN, $this->lastn);
        }
        if ($this->isColumnModified(PlayersTableMap::COL_BATS)) {
            $criteria->add(PlayersTableMap::COL_BATS, $this->bats);
        }
        if ($this->isColumnModified(PlayersTableMap::COL_BDAY)) {
            $criteria->add(PlayersTableMap::COL_BDAY, $this->bday);
        }
        if ($this->isColumnModified(PlayersTableMap::COL_AGE)) {
            $criteria->add(PlayersTableMap::COL_AGE, $this->age);
        }
        if ($this->isColumnModified(PlayersTableMap::COL_MLB)) {
            $criteria->add(PlayersTableMap::COL_MLB, $this->mlb);
        }
        if ($this->isColumnModified(PlayersTableMap::COL_DRAFT_YEAR)) {
            $criteria->add(PlayersTableMap::COL_DRAFT_YEAR, $this->draft_year);
        }
        if ($this->isColumnModified(PlayersTableMap::COL_POSITION)) {
            $criteria->add(PlayersTableMap::COL_POSITION, $this->position);
        }
        if ($this->isColumnModified(PlayersTableMap::COL_CARD)) {
            $criteria->add(PlayersTableMap::COL_CARD, $this->card);
        }
        if ($this->isColumnModified(PlayersTableMap::COL_D_E)) {
            $criteria->add(PlayersTableMap::COL_D_E, $this->d_e);
        }
        if ($this->isColumnModified(PlayersTableMap::COL_LG)) {
            $criteria->add(PlayersTableMap::COL_LG, $this->lg);
        }
        if ($this->isColumnModified(PlayersTableMap::COL_MWBL)) {
            $criteria->add(PlayersTableMap::COL_MWBL, $this->mwbl);
        }
        if ($this->isColumnModified(PlayersTableMap::COL_CATEGORY)) {
            $criteria->add(PlayersTableMap::COL_CATEGORY, $this->category);
        }
        if ($this->isColumnModified(PlayersTableMap::COL_COMMENT)) {
            $criteria->add(PlayersTableMap::COL_COMMENT, $this->comment);
        }
        if ($this->isColumnModified(PlayersTableMap::COL_MWBL_LINK)) {
            $criteria->add(PlayersTableMap::COL_MWBL_LINK, $this->mwbl_link);
        }
        if ($this->isColumnModified(PlayersTableMap::COL_MLB_LINK)) {
            $criteria->add(PlayersTableMap::COL_MLB_LINK, $this->mlb_link);
        }
        if ($this->isColumnModified(PlayersTableMap::COL_MWBL_LINK_ENABLED)) {
            $criteria->add(PlayersTableMap::COL_MWBL_LINK_ENABLED, $this->mwbl_link_enabled);
        }
        if ($this->isColumnModified(PlayersTableMap::COL_MLB_LINK_ENABLED)) {
            $criteria->add(PlayersTableMap::COL_MLB_LINK_ENABLED, $this->mlb_link_enabled);
        }
        if ($this->isColumnModified(PlayersTableMap::COL_CREATE_TS)) {
            $criteria->add(PlayersTableMap::COL_CREATE_TS, $this->create_ts);
        }
        if ($this->isColumnModified(PlayersTableMap::COL_MAINT_TS)) {
            $criteria->add(PlayersTableMap::COL_MAINT_TS, $this->maint_ts);
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
        $criteria = ChildPlayersQuery::create();
        $criteria->add(PlayersTableMap::COL_ID, $this->id);

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
     * @param      object $copyObj An object of \Players (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setLastn($this->getLastn());
        $copyObj->setBats($this->getBats());
        $copyObj->setBday($this->getBday());
        $copyObj->setAge($this->getAge());
        $copyObj->setMlb($this->getMlb());
        $copyObj->setDraftYear($this->getDraftYear());
        $copyObj->setPosition($this->getPosition());
        $copyObj->setCard($this->getCard());
        $copyObj->setDE($this->getDE());
        $copyObj->setLg($this->getLg());
        $copyObj->setMwbl($this->getMwbl());
        $copyObj->setCategory($this->getCategory());
        $copyObj->setComment($this->getComment());
        $copyObj->setMwblLink($this->getMwblLink());
        $copyObj->setMlbLink($this->getMlbLink());
        $copyObj->setMwblLinkEnabled($this->getMwblLinkEnabled());
        $copyObj->setMlbLinkEnabled($this->getMlbLinkEnabled());
        $copyObj->setCreateTs($this->getCreateTs());
        $copyObj->setMaintTs($this->getMaintTs());
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
     * @return \Players Clone of current object.
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
     * Declares an association between this object and a ChildMlbTeamRef object.
     *
     * @param  ChildMlbTeamRef $v
     * @return $this|\Players The current object (for fluent API support)
     * @throws PropelException
     */
    public function setMlbTeamRef(ChildMlbTeamRef $v = null)
    {
        if ($v === null) {
            $this->setMlb('');
        } else {
            $this->setMlb($v->getMlb());
        }

        $this->aMlbTeamRef = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildMlbTeamRef object, it will not be re-added.
        if ($v !== null) {
            $v->addPlayers($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildMlbTeamRef object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildMlbTeamRef The associated ChildMlbTeamRef object.
     * @throws PropelException
     */
    public function getMlbTeamRef(ConnectionInterface $con = null)
    {
        if ($this->aMlbTeamRef === null && (($this->mlb !== "" && $this->mlb !== null))) {
            $this->aMlbTeamRef = ChildMlbTeamRefQuery::create()->findPk($this->mlb, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aMlbTeamRef->addPlayerss($this);
             */
        }

        return $this->aMlbTeamRef;
    }

    /**
     * Declares an association between this object and a ChildCardRef object.
     *
     * @param  ChildCardRef $v
     * @return $this|\Players The current object (for fluent API support)
     * @throws PropelException
     */
    public function setCardRef(ChildCardRef $v = null)
    {
        if ($v === null) {
            $this->setCard(NULL);
        } else {
            $this->setCard($v->getCard());
        }

        $this->aCardRef = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildCardRef object, it will not be re-added.
        if ($v !== null) {
            $v->addPlayers($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildCardRef object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildCardRef The associated ChildCardRef object.
     * @throws PropelException
     */
    public function getCardRef(ConnectionInterface $con = null)
    {
        if ($this->aCardRef === null && ($this->card !== null)) {
            $this->aCardRef = ChildCardRefQuery::create()->findPk($this->card, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aCardRef->addPlayerss($this);
             */
        }

        return $this->aCardRef;
    }

    /**
     * Declares an association between this object and a ChildDivisionRef object.
     *
     * @param  ChildDivisionRef $v
     * @return $this|\Players The current object (for fluent API support)
     * @throws PropelException
     */
    public function setDivisionRef(ChildDivisionRef $v = null)
    {
        if ($v === null) {
            $this->setLg('');
        } else {
            $this->setLg($v->getDivision());
        }

        $this->aDivisionRef = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildDivisionRef object, it will not be re-added.
        if ($v !== null) {
            $v->addPlayers($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildDivisionRef object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildDivisionRef The associated ChildDivisionRef object.
     * @throws PropelException
     */
    public function getDivisionRef(ConnectionInterface $con = null)
    {
        if ($this->aDivisionRef === null && (($this->lg !== "" && $this->lg !== null))) {
            $this->aDivisionRef = ChildDivisionRefQuery::create()->findPk($this->lg, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aDivisionRef->addPlayerss($this);
             */
        }

        return $this->aDivisionRef;
    }

    /**
     * Declares an association between this object and a ChildPositionRef object.
     *
     * @param  ChildPositionRef $v
     * @return $this|\Players The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPositionRef(ChildPositionRef $v = null)
    {
        if ($v === null) {
            $this->setPosition('');
        } else {
            $this->setPosition($v->getPosition());
        }

        $this->aPositionRef = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildPositionRef object, it will not be re-added.
        if ($v !== null) {
            $v->addPlayers($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildPositionRef object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildPositionRef The associated ChildPositionRef object.
     * @throws PropelException
     */
    public function getPositionRef(ConnectionInterface $con = null)
    {
        if ($this->aPositionRef === null && (($this->position !== "" && $this->position !== null))) {
            $this->aPositionRef = ChildPositionRefQuery::create()->findPk($this->position, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPositionRef->addPlayerss($this);
             */
        }

        return $this->aPositionRef;
    }

    /**
     * Declares an association between this object and a ChildTeams object.
     *
     * @param  ChildTeams $v
     * @return $this|\Players The current object (for fluent API support)
     * @throws PropelException
     */
    public function setTeams(ChildTeams $v = null)
    {
        if ($v === null) {
            $this->setMwbl('');
        } else {
            $this->setMwbl($v->getTeamAbbrev());
        }

        $this->aTeams = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildTeams object, it will not be re-added.
        if ($v !== null) {
            $v->addPlayers($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildTeams object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildTeams The associated ChildTeams object.
     * @throws PropelException
     */
    public function getTeams(ConnectionInterface $con = null)
    {
        if ($this->aTeams === null && (($this->mwbl !== "" && $this->mwbl !== null))) {
            $this->aTeams = ChildTeamsQuery::create()
                ->filterByPlayers($this) // here
                ->findOne($con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aTeams->addPlayerss($this);
             */
        }

        return $this->aTeams;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aMlbTeamRef) {
            $this->aMlbTeamRef->removePlayers($this);
        }
        if (null !== $this->aCardRef) {
            $this->aCardRef->removePlayers($this);
        }
        if (null !== $this->aDivisionRef) {
            $this->aDivisionRef->removePlayers($this);
        }
        if (null !== $this->aPositionRef) {
            $this->aPositionRef->removePlayers($this);
        }
        if (null !== $this->aTeams) {
            $this->aTeams->removePlayers($this);
        }
        $this->id = null;
        $this->lastn = null;
        $this->bats = null;
        $this->bday = null;
        $this->age = null;
        $this->mlb = null;
        $this->draft_year = null;
        $this->position = null;
        $this->card = null;
        $this->d_e = null;
        $this->lg = null;
        $this->mwbl = null;
        $this->category = null;
        $this->comment = null;
        $this->mwbl_link = null;
        $this->mlb_link = null;
        $this->mwbl_link_enabled = null;
        $this->mlb_link_enabled = null;
        $this->create_ts = null;
        $this->maint_ts = null;
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
        } // if ($deep)

        $this->aMlbTeamRef = null;
        $this->aCardRef = null;
        $this->aDivisionRef = null;
        $this->aPositionRef = null;
        $this->aTeams = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(PlayersTableMap::DEFAULT_STRING_FORMAT);
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
