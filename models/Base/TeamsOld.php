<?php

namespace Base;

use \TeamsOldQuery as ChildTeamsOldQuery;
use \Exception;
use \PDO;
use Map\TeamsOldTableMap;
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
 * Base class that represents a row from the 'Teams_old' table.
 *
 *
 *
* @package    propel.generator..Base
*/
abstract class TeamsOld implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\TeamsOldTableMap';


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
     * The value for the link field.
     * @var        string
     */
    protected $link;

    /**
     * The value for the owner field.
     * @var        string
     */
    protected $owner;

    /**
     * The value for the name field.
     * @var        string
     */
    protected $name;

    /**
     * The value for the nickname field.
     * @var        string
     */
    protected $nickname;

    /**
     * The value for the team_abbrev field.
     * @var        string
     */
    protected $team_abbrev;

    /**
     * The value for the division field.
     * @var        string
     */
    protected $division;

    /**
     * The value for the email field.
     * @var        string
     */
    protected $email;

    /**
     * The value for the status field.
     * @var        string
     */
    protected $status;

    /**
     * The value for the comment field.
     * @var        string
     */
    protected $comment;

    /**
     * The value for the league field.
     * @var        string
     */
    protected $league;

    /**
     * The value for the used field.
     * @var        string
     */
    protected $used;

    /**
     * The value for the email2 field.
     * @var        string
     */
    protected $email2;

    /**
     * The value for the address field.
     * @var        string
     */
    protected $address;

    /**
     * The value for the city field.
     * @var        string
     */
    protected $city;

    /**
     * The value for the state field.
     * @var        string
     */
    protected $state;

    /**
     * The value for the zip field.
     * @var        string
     */
    protected $zip;

    /**
     * The value for the phone field.
     * @var        string
     */
    protected $phone;

    /**
     * The value for the team_link field.
     * @var        string
     */
    protected $team_link;

    /**
     * The value for the trade_link field.
     * @var        string
     */
    protected $trade_link;

    /**
     * The value for the draft_link field.
     * @var        string
     */
    protected $draft_link;

    /**
     * The value for the awards_link field.
     * @var        string
     */
    protected $awards_link;

    /**
     * The value for the aim field.
     * @var        string
     */
    protected $aim;

    /**
     * The value for the yahoo field.
     * @var        string
     */
    protected $yahoo;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Initializes internal state of Base\TeamsOld object.
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
     * Compares this with another <code>TeamsOld</code> instance.  If
     * <code>obj</code> is an instance of <code>TeamsOld</code>, delegates to
     * <code>equals(TeamsOld)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|TeamsOld The current object, for fluid interface
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
     * Get the [link] column value.
     *
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Get the [owner] column value.
     *
     * @return string
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Get the [name] column value.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the [nickname] column value.
     *
     * @return string
     */
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * Get the [team_abbrev] column value.
     *
     * @return string
     */
    public function getTeamAbbrev()
    {
        return $this->team_abbrev;
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
     * Get the [email] column value.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get the [status] column value.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
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
     * Get the [league] column value.
     *
     * @return string
     */
    public function getLeague()
    {
        return $this->league;
    }

    /**
     * Get the [used] column value.
     *
     * @return string
     */
    public function getUsed()
    {
        return $this->used;
    }

    /**
     * Get the [email2] column value.
     *
     * @return string
     */
    public function getEmail2()
    {
        return $this->email2;
    }

    /**
     * Get the [address] column value.
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Get the [city] column value.
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Get the [state] column value.
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Get the [zip] column value.
     *
     * @return string
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * Get the [phone] column value.
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Get the [team_link] column value.
     *
     * @return string
     */
    public function getTeamLink()
    {
        return $this->team_link;
    }

    /**
     * Get the [trade_link] column value.
     *
     * @return string
     */
    public function getTradeLink()
    {
        return $this->trade_link;
    }

    /**
     * Get the [draft_link] column value.
     *
     * @return string
     */
    public function getDraftLink()
    {
        return $this->draft_link;
    }

    /**
     * Get the [awards_link] column value.
     *
     * @return string
     */
    public function getAwardsLink()
    {
        return $this->awards_link;
    }

    /**
     * Get the [aim] column value.
     *
     * @return string
     */
    public function getAim()
    {
        return $this->aim;
    }

    /**
     * Get the [yahoo] column value.
     *
     * @return string
     */
    public function getYahoo()
    {
        return $this->yahoo;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return $this|\TeamsOld The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[TeamsOldTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [link] column.
     *
     * @param string $v new value
     * @return $this|\TeamsOld The current object (for fluent API support)
     */
    public function setLink($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->link !== $v) {
            $this->link = $v;
            $this->modifiedColumns[TeamsOldTableMap::COL_LINK] = true;
        }

        return $this;
    } // setLink()

    /**
     * Set the value of [owner] column.
     *
     * @param string $v new value
     * @return $this|\TeamsOld The current object (for fluent API support)
     */
    public function setOwner($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->owner !== $v) {
            $this->owner = $v;
            $this->modifiedColumns[TeamsOldTableMap::COL_OWNER] = true;
        }

        return $this;
    } // setOwner()

    /**
     * Set the value of [name] column.
     *
     * @param string $v new value
     * @return $this|\TeamsOld The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[TeamsOldTableMap::COL_NAME] = true;
        }

        return $this;
    } // setName()

    /**
     * Set the value of [nickname] column.
     *
     * @param string $v new value
     * @return $this|\TeamsOld The current object (for fluent API support)
     */
    public function setNickname($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->nickname !== $v) {
            $this->nickname = $v;
            $this->modifiedColumns[TeamsOldTableMap::COL_NICKNAME] = true;
        }

        return $this;
    } // setNickname()

    /**
     * Set the value of [team_abbrev] column.
     *
     * @param string $v new value
     * @return $this|\TeamsOld The current object (for fluent API support)
     */
    public function setTeamAbbrev($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->team_abbrev !== $v) {
            $this->team_abbrev = $v;
            $this->modifiedColumns[TeamsOldTableMap::COL_TEAM_ABBREV] = true;
        }

        return $this;
    } // setTeamAbbrev()

    /**
     * Set the value of [division] column.
     *
     * @param string $v new value
     * @return $this|\TeamsOld The current object (for fluent API support)
     */
    public function setDivision($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->division !== $v) {
            $this->division = $v;
            $this->modifiedColumns[TeamsOldTableMap::COL_DIVISION] = true;
        }

        return $this;
    } // setDivision()

    /**
     * Set the value of [email] column.
     *
     * @param string $v new value
     * @return $this|\TeamsOld The current object (for fluent API support)
     */
    public function setEmail($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->email !== $v) {
            $this->email = $v;
            $this->modifiedColumns[TeamsOldTableMap::COL_EMAIL] = true;
        }

        return $this;
    } // setEmail()

    /**
     * Set the value of [status] column.
     *
     * @param string $v new value
     * @return $this|\TeamsOld The current object (for fluent API support)
     */
    public function setStatus($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->status !== $v) {
            $this->status = $v;
            $this->modifiedColumns[TeamsOldTableMap::COL_STATUS] = true;
        }

        return $this;
    } // setStatus()

    /**
     * Set the value of [comment] column.
     *
     * @param string $v new value
     * @return $this|\TeamsOld The current object (for fluent API support)
     */
    public function setComment($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->comment !== $v) {
            $this->comment = $v;
            $this->modifiedColumns[TeamsOldTableMap::COL_COMMENT] = true;
        }

        return $this;
    } // setComment()

    /**
     * Set the value of [league] column.
     *
     * @param string $v new value
     * @return $this|\TeamsOld The current object (for fluent API support)
     */
    public function setLeague($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->league !== $v) {
            $this->league = $v;
            $this->modifiedColumns[TeamsOldTableMap::COL_LEAGUE] = true;
        }

        return $this;
    } // setLeague()

    /**
     * Set the value of [used] column.
     *
     * @param string $v new value
     * @return $this|\TeamsOld The current object (for fluent API support)
     */
    public function setUsed($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->used !== $v) {
            $this->used = $v;
            $this->modifiedColumns[TeamsOldTableMap::COL_USED] = true;
        }

        return $this;
    } // setUsed()

    /**
     * Set the value of [email2] column.
     *
     * @param string $v new value
     * @return $this|\TeamsOld The current object (for fluent API support)
     */
    public function setEmail2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->email2 !== $v) {
            $this->email2 = $v;
            $this->modifiedColumns[TeamsOldTableMap::COL_EMAIL2] = true;
        }

        return $this;
    } // setEmail2()

    /**
     * Set the value of [address] column.
     *
     * @param string $v new value
     * @return $this|\TeamsOld The current object (for fluent API support)
     */
    public function setAddress($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->address !== $v) {
            $this->address = $v;
            $this->modifiedColumns[TeamsOldTableMap::COL_ADDRESS] = true;
        }

        return $this;
    } // setAddress()

    /**
     * Set the value of [city] column.
     *
     * @param string $v new value
     * @return $this|\TeamsOld The current object (for fluent API support)
     */
    public function setCity($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->city !== $v) {
            $this->city = $v;
            $this->modifiedColumns[TeamsOldTableMap::COL_CITY] = true;
        }

        return $this;
    } // setCity()

    /**
     * Set the value of [state] column.
     *
     * @param string $v new value
     * @return $this|\TeamsOld The current object (for fluent API support)
     */
    public function setState($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->state !== $v) {
            $this->state = $v;
            $this->modifiedColumns[TeamsOldTableMap::COL_STATE] = true;
        }

        return $this;
    } // setState()

    /**
     * Set the value of [zip] column.
     *
     * @param string $v new value
     * @return $this|\TeamsOld The current object (for fluent API support)
     */
    public function setZip($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->zip !== $v) {
            $this->zip = $v;
            $this->modifiedColumns[TeamsOldTableMap::COL_ZIP] = true;
        }

        return $this;
    } // setZip()

    /**
     * Set the value of [phone] column.
     *
     * @param string $v new value
     * @return $this|\TeamsOld The current object (for fluent API support)
     */
    public function setPhone($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->phone !== $v) {
            $this->phone = $v;
            $this->modifiedColumns[TeamsOldTableMap::COL_PHONE] = true;
        }

        return $this;
    } // setPhone()

    /**
     * Set the value of [team_link] column.
     *
     * @param string $v new value
     * @return $this|\TeamsOld The current object (for fluent API support)
     */
    public function setTeamLink($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->team_link !== $v) {
            $this->team_link = $v;
            $this->modifiedColumns[TeamsOldTableMap::COL_TEAM_LINK] = true;
        }

        return $this;
    } // setTeamLink()

    /**
     * Set the value of [trade_link] column.
     *
     * @param string $v new value
     * @return $this|\TeamsOld The current object (for fluent API support)
     */
    public function setTradeLink($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->trade_link !== $v) {
            $this->trade_link = $v;
            $this->modifiedColumns[TeamsOldTableMap::COL_TRADE_LINK] = true;
        }

        return $this;
    } // setTradeLink()

    /**
     * Set the value of [draft_link] column.
     *
     * @param string $v new value
     * @return $this|\TeamsOld The current object (for fluent API support)
     */
    public function setDraftLink($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->draft_link !== $v) {
            $this->draft_link = $v;
            $this->modifiedColumns[TeamsOldTableMap::COL_DRAFT_LINK] = true;
        }

        return $this;
    } // setDraftLink()

    /**
     * Set the value of [awards_link] column.
     *
     * @param string $v new value
     * @return $this|\TeamsOld The current object (for fluent API support)
     */
    public function setAwardsLink($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->awards_link !== $v) {
            $this->awards_link = $v;
            $this->modifiedColumns[TeamsOldTableMap::COL_AWARDS_LINK] = true;
        }

        return $this;
    } // setAwardsLink()

    /**
     * Set the value of [aim] column.
     *
     * @param string $v new value
     * @return $this|\TeamsOld The current object (for fluent API support)
     */
    public function setAim($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->aim !== $v) {
            $this->aim = $v;
            $this->modifiedColumns[TeamsOldTableMap::COL_AIM] = true;
        }

        return $this;
    } // setAim()

    /**
     * Set the value of [yahoo] column.
     *
     * @param string $v new value
     * @return $this|\TeamsOld The current object (for fluent API support)
     */
    public function setYahoo($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->yahoo !== $v) {
            $this->yahoo = $v;
            $this->modifiedColumns[TeamsOldTableMap::COL_YAHOO] = true;
        }

        return $this;
    } // setYahoo()

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : TeamsOldTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : TeamsOldTableMap::translateFieldName('Link', TableMap::TYPE_PHPNAME, $indexType)];
            $this->link = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : TeamsOldTableMap::translateFieldName('Owner', TableMap::TYPE_PHPNAME, $indexType)];
            $this->owner = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : TeamsOldTableMap::translateFieldName('Name', TableMap::TYPE_PHPNAME, $indexType)];
            $this->name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : TeamsOldTableMap::translateFieldName('Nickname', TableMap::TYPE_PHPNAME, $indexType)];
            $this->nickname = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : TeamsOldTableMap::translateFieldName('TeamAbbrev', TableMap::TYPE_PHPNAME, $indexType)];
            $this->team_abbrev = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : TeamsOldTableMap::translateFieldName('Division', TableMap::TYPE_PHPNAME, $indexType)];
            $this->division = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : TeamsOldTableMap::translateFieldName('Email', TableMap::TYPE_PHPNAME, $indexType)];
            $this->email = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : TeamsOldTableMap::translateFieldName('Status', TableMap::TYPE_PHPNAME, $indexType)];
            $this->status = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : TeamsOldTableMap::translateFieldName('Comment', TableMap::TYPE_PHPNAME, $indexType)];
            $this->comment = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : TeamsOldTableMap::translateFieldName('League', TableMap::TYPE_PHPNAME, $indexType)];
            $this->league = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : TeamsOldTableMap::translateFieldName('Used', TableMap::TYPE_PHPNAME, $indexType)];
            $this->used = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : TeamsOldTableMap::translateFieldName('Email2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->email2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : TeamsOldTableMap::translateFieldName('Address', TableMap::TYPE_PHPNAME, $indexType)];
            $this->address = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : TeamsOldTableMap::translateFieldName('City', TableMap::TYPE_PHPNAME, $indexType)];
            $this->city = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : TeamsOldTableMap::translateFieldName('State', TableMap::TYPE_PHPNAME, $indexType)];
            $this->state = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : TeamsOldTableMap::translateFieldName('Zip', TableMap::TYPE_PHPNAME, $indexType)];
            $this->zip = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : TeamsOldTableMap::translateFieldName('Phone', TableMap::TYPE_PHPNAME, $indexType)];
            $this->phone = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : TeamsOldTableMap::translateFieldName('TeamLink', TableMap::TYPE_PHPNAME, $indexType)];
            $this->team_link = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : TeamsOldTableMap::translateFieldName('TradeLink', TableMap::TYPE_PHPNAME, $indexType)];
            $this->trade_link = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : TeamsOldTableMap::translateFieldName('DraftLink', TableMap::TYPE_PHPNAME, $indexType)];
            $this->draft_link = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 21 + $startcol : TeamsOldTableMap::translateFieldName('AwardsLink', TableMap::TYPE_PHPNAME, $indexType)];
            $this->awards_link = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 22 + $startcol : TeamsOldTableMap::translateFieldName('Aim', TableMap::TYPE_PHPNAME, $indexType)];
            $this->aim = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 23 + $startcol : TeamsOldTableMap::translateFieldName('Yahoo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->yahoo = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 24; // 24 = TeamsOldTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\TeamsOld'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(TeamsOldTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildTeamsOldQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see TeamsOld::setDeleted()
     * @see TeamsOld::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(TeamsOldTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildTeamsOldQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(TeamsOldTableMap::DATABASE_NAME);
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
                TeamsOldTableMap::addInstanceToPool($this);
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
        if ($this->isColumnModified(TeamsOldTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'ID';
        }
        if ($this->isColumnModified(TeamsOldTableMap::COL_LINK)) {
            $modifiedColumns[':p' . $index++]  = 'link';
        }
        if ($this->isColumnModified(TeamsOldTableMap::COL_OWNER)) {
            $modifiedColumns[':p' . $index++]  = 'Owner';
        }
        if ($this->isColumnModified(TeamsOldTableMap::COL_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'Name';
        }
        if ($this->isColumnModified(TeamsOldTableMap::COL_NICKNAME)) {
            $modifiedColumns[':p' . $index++]  = 'nickname';
        }
        if ($this->isColumnModified(TeamsOldTableMap::COL_TEAM_ABBREV)) {
            $modifiedColumns[':p' . $index++]  = 'Team_Abbrev';
        }
        if ($this->isColumnModified(TeamsOldTableMap::COL_DIVISION)) {
            $modifiedColumns[':p' . $index++]  = 'Division';
        }
        if ($this->isColumnModified(TeamsOldTableMap::COL_EMAIL)) {
            $modifiedColumns[':p' . $index++]  = 'email';
        }
        if ($this->isColumnModified(TeamsOldTableMap::COL_STATUS)) {
            $modifiedColumns[':p' . $index++]  = 'status';
        }
        if ($this->isColumnModified(TeamsOldTableMap::COL_COMMENT)) {
            $modifiedColumns[':p' . $index++]  = 'comment';
        }
        if ($this->isColumnModified(TeamsOldTableMap::COL_LEAGUE)) {
            $modifiedColumns[':p' . $index++]  = 'league';
        }
        if ($this->isColumnModified(TeamsOldTableMap::COL_USED)) {
            $modifiedColumns[':p' . $index++]  = 'used';
        }
        if ($this->isColumnModified(TeamsOldTableMap::COL_EMAIL2)) {
            $modifiedColumns[':p' . $index++]  = 'email2';
        }
        if ($this->isColumnModified(TeamsOldTableMap::COL_ADDRESS)) {
            $modifiedColumns[':p' . $index++]  = 'address';
        }
        if ($this->isColumnModified(TeamsOldTableMap::COL_CITY)) {
            $modifiedColumns[':p' . $index++]  = 'city';
        }
        if ($this->isColumnModified(TeamsOldTableMap::COL_STATE)) {
            $modifiedColumns[':p' . $index++]  = 'state';
        }
        if ($this->isColumnModified(TeamsOldTableMap::COL_ZIP)) {
            $modifiedColumns[':p' . $index++]  = 'zip';
        }
        if ($this->isColumnModified(TeamsOldTableMap::COL_PHONE)) {
            $modifiedColumns[':p' . $index++]  = 'phone';
        }
        if ($this->isColumnModified(TeamsOldTableMap::COL_TEAM_LINK)) {
            $modifiedColumns[':p' . $index++]  = 'team_link';
        }
        if ($this->isColumnModified(TeamsOldTableMap::COL_TRADE_LINK)) {
            $modifiedColumns[':p' . $index++]  = 'trade_link';
        }
        if ($this->isColumnModified(TeamsOldTableMap::COL_DRAFT_LINK)) {
            $modifiedColumns[':p' . $index++]  = 'draft_link';
        }
        if ($this->isColumnModified(TeamsOldTableMap::COL_AWARDS_LINK)) {
            $modifiedColumns[':p' . $index++]  = 'awards_link';
        }
        if ($this->isColumnModified(TeamsOldTableMap::COL_AIM)) {
            $modifiedColumns[':p' . $index++]  = 'aim';
        }
        if ($this->isColumnModified(TeamsOldTableMap::COL_YAHOO)) {
            $modifiedColumns[':p' . $index++]  = 'yahoo';
        }

        $sql = sprintf(
            'INSERT INTO Teams_old (%s) VALUES (%s)',
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
                    case 'link':
                        $stmt->bindValue($identifier, $this->link, PDO::PARAM_STR);
                        break;
                    case 'Owner':
                        $stmt->bindValue($identifier, $this->owner, PDO::PARAM_STR);
                        break;
                    case 'Name':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case 'nickname':
                        $stmt->bindValue($identifier, $this->nickname, PDO::PARAM_STR);
                        break;
                    case 'Team_Abbrev':
                        $stmt->bindValue($identifier, $this->team_abbrev, PDO::PARAM_STR);
                        break;
                    case 'Division':
                        $stmt->bindValue($identifier, $this->division, PDO::PARAM_STR);
                        break;
                    case 'email':
                        $stmt->bindValue($identifier, $this->email, PDO::PARAM_STR);
                        break;
                    case 'status':
                        $stmt->bindValue($identifier, $this->status, PDO::PARAM_STR);
                        break;
                    case 'comment':
                        $stmt->bindValue($identifier, $this->comment, PDO::PARAM_STR);
                        break;
                    case 'league':
                        $stmt->bindValue($identifier, $this->league, PDO::PARAM_STR);
                        break;
                    case 'used':
                        $stmt->bindValue($identifier, $this->used, PDO::PARAM_STR);
                        break;
                    case 'email2':
                        $stmt->bindValue($identifier, $this->email2, PDO::PARAM_STR);
                        break;
                    case 'address':
                        $stmt->bindValue($identifier, $this->address, PDO::PARAM_STR);
                        break;
                    case 'city':
                        $stmt->bindValue($identifier, $this->city, PDO::PARAM_STR);
                        break;
                    case 'state':
                        $stmt->bindValue($identifier, $this->state, PDO::PARAM_STR);
                        break;
                    case 'zip':
                        $stmt->bindValue($identifier, $this->zip, PDO::PARAM_STR);
                        break;
                    case 'phone':
                        $stmt->bindValue($identifier, $this->phone, PDO::PARAM_STR);
                        break;
                    case 'team_link':
                        $stmt->bindValue($identifier, $this->team_link, PDO::PARAM_STR);
                        break;
                    case 'trade_link':
                        $stmt->bindValue($identifier, $this->trade_link, PDO::PARAM_STR);
                        break;
                    case 'draft_link':
                        $stmt->bindValue($identifier, $this->draft_link, PDO::PARAM_STR);
                        break;
                    case 'awards_link':
                        $stmt->bindValue($identifier, $this->awards_link, PDO::PARAM_STR);
                        break;
                    case 'aim':
                        $stmt->bindValue($identifier, $this->aim, PDO::PARAM_STR);
                        break;
                    case 'yahoo':
                        $stmt->bindValue($identifier, $this->yahoo, PDO::PARAM_STR);
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
        $pos = TeamsOldTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getLink();
                break;
            case 2:
                return $this->getOwner();
                break;
            case 3:
                return $this->getName();
                break;
            case 4:
                return $this->getNickname();
                break;
            case 5:
                return $this->getTeamAbbrev();
                break;
            case 6:
                return $this->getDivision();
                break;
            case 7:
                return $this->getEmail();
                break;
            case 8:
                return $this->getStatus();
                break;
            case 9:
                return $this->getComment();
                break;
            case 10:
                return $this->getLeague();
                break;
            case 11:
                return $this->getUsed();
                break;
            case 12:
                return $this->getEmail2();
                break;
            case 13:
                return $this->getAddress();
                break;
            case 14:
                return $this->getCity();
                break;
            case 15:
                return $this->getState();
                break;
            case 16:
                return $this->getZip();
                break;
            case 17:
                return $this->getPhone();
                break;
            case 18:
                return $this->getTeamLink();
                break;
            case 19:
                return $this->getTradeLink();
                break;
            case 20:
                return $this->getDraftLink();
                break;
            case 21:
                return $this->getAwardsLink();
                break;
            case 22:
                return $this->getAim();
                break;
            case 23:
                return $this->getYahoo();
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
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array())
    {

        if (isset($alreadyDumpedObjects['TeamsOld'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['TeamsOld'][$this->hashCode()] = true;
        $keys = TeamsOldTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getLink(),
            $keys[2] => $this->getOwner(),
            $keys[3] => $this->getName(),
            $keys[4] => $this->getNickname(),
            $keys[5] => $this->getTeamAbbrev(),
            $keys[6] => $this->getDivision(),
            $keys[7] => $this->getEmail(),
            $keys[8] => $this->getStatus(),
            $keys[9] => $this->getComment(),
            $keys[10] => $this->getLeague(),
            $keys[11] => $this->getUsed(),
            $keys[12] => $this->getEmail2(),
            $keys[13] => $this->getAddress(),
            $keys[14] => $this->getCity(),
            $keys[15] => $this->getState(),
            $keys[16] => $this->getZip(),
            $keys[17] => $this->getPhone(),
            $keys[18] => $this->getTeamLink(),
            $keys[19] => $this->getTradeLink(),
            $keys[20] => $this->getDraftLink(),
            $keys[21] => $this->getAwardsLink(),
            $keys[22] => $this->getAim(),
            $keys[23] => $this->getYahoo(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
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
     * @return $this|\TeamsOld
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = TeamsOldTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\TeamsOld
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setLink($value);
                break;
            case 2:
                $this->setOwner($value);
                break;
            case 3:
                $this->setName($value);
                break;
            case 4:
                $this->setNickname($value);
                break;
            case 5:
                $this->setTeamAbbrev($value);
                break;
            case 6:
                $this->setDivision($value);
                break;
            case 7:
                $this->setEmail($value);
                break;
            case 8:
                $this->setStatus($value);
                break;
            case 9:
                $this->setComment($value);
                break;
            case 10:
                $this->setLeague($value);
                break;
            case 11:
                $this->setUsed($value);
                break;
            case 12:
                $this->setEmail2($value);
                break;
            case 13:
                $this->setAddress($value);
                break;
            case 14:
                $this->setCity($value);
                break;
            case 15:
                $this->setState($value);
                break;
            case 16:
                $this->setZip($value);
                break;
            case 17:
                $this->setPhone($value);
                break;
            case 18:
                $this->setTeamLink($value);
                break;
            case 19:
                $this->setTradeLink($value);
                break;
            case 20:
                $this->setDraftLink($value);
                break;
            case 21:
                $this->setAwardsLink($value);
                break;
            case 22:
                $this->setAim($value);
                break;
            case 23:
                $this->setYahoo($value);
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
        $keys = TeamsOldTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setLink($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setOwner($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setName($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setNickname($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setTeamAbbrev($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setDivision($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setEmail($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setStatus($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setComment($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setLeague($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setUsed($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setEmail2($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setAddress($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setCity($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setState($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setZip($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setPhone($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setTeamLink($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setTradeLink($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setDraftLink($arr[$keys[20]]);
        }
        if (array_key_exists($keys[21], $arr)) {
            $this->setAwardsLink($arr[$keys[21]]);
        }
        if (array_key_exists($keys[22], $arr)) {
            $this->setAim($arr[$keys[22]]);
        }
        if (array_key_exists($keys[23], $arr)) {
            $this->setYahoo($arr[$keys[23]]);
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
     * @return $this|\TeamsOld The current object, for fluid interface
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
        $criteria = new Criteria(TeamsOldTableMap::DATABASE_NAME);

        if ($this->isColumnModified(TeamsOldTableMap::COL_ID)) {
            $criteria->add(TeamsOldTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(TeamsOldTableMap::COL_LINK)) {
            $criteria->add(TeamsOldTableMap::COL_LINK, $this->link);
        }
        if ($this->isColumnModified(TeamsOldTableMap::COL_OWNER)) {
            $criteria->add(TeamsOldTableMap::COL_OWNER, $this->owner);
        }
        if ($this->isColumnModified(TeamsOldTableMap::COL_NAME)) {
            $criteria->add(TeamsOldTableMap::COL_NAME, $this->name);
        }
        if ($this->isColumnModified(TeamsOldTableMap::COL_NICKNAME)) {
            $criteria->add(TeamsOldTableMap::COL_NICKNAME, $this->nickname);
        }
        if ($this->isColumnModified(TeamsOldTableMap::COL_TEAM_ABBREV)) {
            $criteria->add(TeamsOldTableMap::COL_TEAM_ABBREV, $this->team_abbrev);
        }
        if ($this->isColumnModified(TeamsOldTableMap::COL_DIVISION)) {
            $criteria->add(TeamsOldTableMap::COL_DIVISION, $this->division);
        }
        if ($this->isColumnModified(TeamsOldTableMap::COL_EMAIL)) {
            $criteria->add(TeamsOldTableMap::COL_EMAIL, $this->email);
        }
        if ($this->isColumnModified(TeamsOldTableMap::COL_STATUS)) {
            $criteria->add(TeamsOldTableMap::COL_STATUS, $this->status);
        }
        if ($this->isColumnModified(TeamsOldTableMap::COL_COMMENT)) {
            $criteria->add(TeamsOldTableMap::COL_COMMENT, $this->comment);
        }
        if ($this->isColumnModified(TeamsOldTableMap::COL_LEAGUE)) {
            $criteria->add(TeamsOldTableMap::COL_LEAGUE, $this->league);
        }
        if ($this->isColumnModified(TeamsOldTableMap::COL_USED)) {
            $criteria->add(TeamsOldTableMap::COL_USED, $this->used);
        }
        if ($this->isColumnModified(TeamsOldTableMap::COL_EMAIL2)) {
            $criteria->add(TeamsOldTableMap::COL_EMAIL2, $this->email2);
        }
        if ($this->isColumnModified(TeamsOldTableMap::COL_ADDRESS)) {
            $criteria->add(TeamsOldTableMap::COL_ADDRESS, $this->address);
        }
        if ($this->isColumnModified(TeamsOldTableMap::COL_CITY)) {
            $criteria->add(TeamsOldTableMap::COL_CITY, $this->city);
        }
        if ($this->isColumnModified(TeamsOldTableMap::COL_STATE)) {
            $criteria->add(TeamsOldTableMap::COL_STATE, $this->state);
        }
        if ($this->isColumnModified(TeamsOldTableMap::COL_ZIP)) {
            $criteria->add(TeamsOldTableMap::COL_ZIP, $this->zip);
        }
        if ($this->isColumnModified(TeamsOldTableMap::COL_PHONE)) {
            $criteria->add(TeamsOldTableMap::COL_PHONE, $this->phone);
        }
        if ($this->isColumnModified(TeamsOldTableMap::COL_TEAM_LINK)) {
            $criteria->add(TeamsOldTableMap::COL_TEAM_LINK, $this->team_link);
        }
        if ($this->isColumnModified(TeamsOldTableMap::COL_TRADE_LINK)) {
            $criteria->add(TeamsOldTableMap::COL_TRADE_LINK, $this->trade_link);
        }
        if ($this->isColumnModified(TeamsOldTableMap::COL_DRAFT_LINK)) {
            $criteria->add(TeamsOldTableMap::COL_DRAFT_LINK, $this->draft_link);
        }
        if ($this->isColumnModified(TeamsOldTableMap::COL_AWARDS_LINK)) {
            $criteria->add(TeamsOldTableMap::COL_AWARDS_LINK, $this->awards_link);
        }
        if ($this->isColumnModified(TeamsOldTableMap::COL_AIM)) {
            $criteria->add(TeamsOldTableMap::COL_AIM, $this->aim);
        }
        if ($this->isColumnModified(TeamsOldTableMap::COL_YAHOO)) {
            $criteria->add(TeamsOldTableMap::COL_YAHOO, $this->yahoo);
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
        throw new LogicException('The TeamsOld object has no primary key');

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
        $validPk = false;

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
     * Returns NULL since this table doesn't have a primary key.
     * This method exists only for BC and is deprecated!
     * @return null
     */
    public function getPrimaryKey()
    {
        return null;
    }

    /**
     * Dummy primary key setter.
     *
     * This function only exists to preserve backwards compatibility.  It is no longer
     * needed or required by the Persistent interface.  It will be removed in next BC-breaking
     * release of Propel.
     *
     * @deprecated
     */
    public function setPrimaryKey($pk)
    {
        // do nothing, because this object doesn't have any primary keys
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return ;
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \TeamsOld (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setId($this->getId());
        $copyObj->setLink($this->getLink());
        $copyObj->setOwner($this->getOwner());
        $copyObj->setName($this->getName());
        $copyObj->setNickname($this->getNickname());
        $copyObj->setTeamAbbrev($this->getTeamAbbrev());
        $copyObj->setDivision($this->getDivision());
        $copyObj->setEmail($this->getEmail());
        $copyObj->setStatus($this->getStatus());
        $copyObj->setComment($this->getComment());
        $copyObj->setLeague($this->getLeague());
        $copyObj->setUsed($this->getUsed());
        $copyObj->setEmail2($this->getEmail2());
        $copyObj->setAddress($this->getAddress());
        $copyObj->setCity($this->getCity());
        $copyObj->setState($this->getState());
        $copyObj->setZip($this->getZip());
        $copyObj->setPhone($this->getPhone());
        $copyObj->setTeamLink($this->getTeamLink());
        $copyObj->setTradeLink($this->getTradeLink());
        $copyObj->setDraftLink($this->getDraftLink());
        $copyObj->setAwardsLink($this->getAwardsLink());
        $copyObj->setAim($this->getAim());
        $copyObj->setYahoo($this->getYahoo());
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
     * @return \TeamsOld Clone of current object.
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
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        $this->id = null;
        $this->link = null;
        $this->owner = null;
        $this->name = null;
        $this->nickname = null;
        $this->team_abbrev = null;
        $this->division = null;
        $this->email = null;
        $this->status = null;
        $this->comment = null;
        $this->league = null;
        $this->used = null;
        $this->email2 = null;
        $this->address = null;
        $this->city = null;
        $this->state = null;
        $this->zip = null;
        $this->phone = null;
        $this->team_link = null;
        $this->trade_link = null;
        $this->draft_link = null;
        $this->awards_link = null;
        $this->aim = null;
        $this->yahoo = null;
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

    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(TeamsOldTableMap::DEFAULT_STRING_FORMAT);
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
