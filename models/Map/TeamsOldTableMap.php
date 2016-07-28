<?php

namespace Map;

use \TeamsOld;
use \TeamsOldQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'Teams_old' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class TeamsOldTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.TeamsOldTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'Teams_old';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\TeamsOld';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'TeamsOld';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 24;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 24;

    /**
     * the column name for the ID field
     */
    const COL_ID = 'Teams_old.ID';

    /**
     * the column name for the link field
     */
    const COL_LINK = 'Teams_old.link';

    /**
     * the column name for the Owner field
     */
    const COL_OWNER = 'Teams_old.Owner';

    /**
     * the column name for the Name field
     */
    const COL_NAME = 'Teams_old.Name';

    /**
     * the column name for the nickname field
     */
    const COL_NICKNAME = 'Teams_old.nickname';

    /**
     * the column name for the Team_Abbrev field
     */
    const COL_TEAM_ABBREV = 'Teams_old.Team_Abbrev';

    /**
     * the column name for the Division field
     */
    const COL_DIVISION = 'Teams_old.Division';

    /**
     * the column name for the email field
     */
    const COL_EMAIL = 'Teams_old.email';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'Teams_old.status';

    /**
     * the column name for the comment field
     */
    const COL_COMMENT = 'Teams_old.comment';

    /**
     * the column name for the league field
     */
    const COL_LEAGUE = 'Teams_old.league';

    /**
     * the column name for the used field
     */
    const COL_USED = 'Teams_old.used';

    /**
     * the column name for the email2 field
     */
    const COL_EMAIL2 = 'Teams_old.email2';

    /**
     * the column name for the address field
     */
    const COL_ADDRESS = 'Teams_old.address';

    /**
     * the column name for the city field
     */
    const COL_CITY = 'Teams_old.city';

    /**
     * the column name for the state field
     */
    const COL_STATE = 'Teams_old.state';

    /**
     * the column name for the zip field
     */
    const COL_ZIP = 'Teams_old.zip';

    /**
     * the column name for the phone field
     */
    const COL_PHONE = 'Teams_old.phone';

    /**
     * the column name for the team_link field
     */
    const COL_TEAM_LINK = 'Teams_old.team_link';

    /**
     * the column name for the trade_link field
     */
    const COL_TRADE_LINK = 'Teams_old.trade_link';

    /**
     * the column name for the draft_link field
     */
    const COL_DRAFT_LINK = 'Teams_old.draft_link';

    /**
     * the column name for the awards_link field
     */
    const COL_AWARDS_LINK = 'Teams_old.awards_link';

    /**
     * the column name for the aim field
     */
    const COL_AIM = 'Teams_old.aim';

    /**
     * the column name for the yahoo field
     */
    const COL_YAHOO = 'Teams_old.yahoo';

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
        self::TYPE_PHPNAME       => array('Id', 'Link', 'Owner', 'Name', 'Nickname', 'TeamAbbrev', 'Division', 'Email', 'Status', 'Comment', 'League', 'Used', 'Email2', 'Address', 'City', 'State', 'Zip', 'Phone', 'TeamLink', 'TradeLink', 'DraftLink', 'AwardsLink', 'Aim', 'Yahoo', ),
        self::TYPE_CAMELNAME     => array('id', 'link', 'owner', 'name', 'nickname', 'teamAbbrev', 'division', 'email', 'status', 'comment', 'league', 'used', 'email2', 'address', 'city', 'state', 'zip', 'phone', 'teamLink', 'tradeLink', 'draftLink', 'awardsLink', 'aim', 'yahoo', ),
        self::TYPE_COLNAME       => array(TeamsOldTableMap::COL_ID, TeamsOldTableMap::COL_LINK, TeamsOldTableMap::COL_OWNER, TeamsOldTableMap::COL_NAME, TeamsOldTableMap::COL_NICKNAME, TeamsOldTableMap::COL_TEAM_ABBREV, TeamsOldTableMap::COL_DIVISION, TeamsOldTableMap::COL_EMAIL, TeamsOldTableMap::COL_STATUS, TeamsOldTableMap::COL_COMMENT, TeamsOldTableMap::COL_LEAGUE, TeamsOldTableMap::COL_USED, TeamsOldTableMap::COL_EMAIL2, TeamsOldTableMap::COL_ADDRESS, TeamsOldTableMap::COL_CITY, TeamsOldTableMap::COL_STATE, TeamsOldTableMap::COL_ZIP, TeamsOldTableMap::COL_PHONE, TeamsOldTableMap::COL_TEAM_LINK, TeamsOldTableMap::COL_TRADE_LINK, TeamsOldTableMap::COL_DRAFT_LINK, TeamsOldTableMap::COL_AWARDS_LINK, TeamsOldTableMap::COL_AIM, TeamsOldTableMap::COL_YAHOO, ),
        self::TYPE_FIELDNAME     => array('ID', 'link', 'Owner', 'Name', 'nickname', 'Team_Abbrev', 'Division', 'email', 'status', 'comment', 'league', 'used', 'email2', 'address', 'city', 'state', 'zip', 'phone', 'team_link', 'trade_link', 'draft_link', 'awards_link', 'aim', 'yahoo', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Link' => 1, 'Owner' => 2, 'Name' => 3, 'Nickname' => 4, 'TeamAbbrev' => 5, 'Division' => 6, 'Email' => 7, 'Status' => 8, 'Comment' => 9, 'League' => 10, 'Used' => 11, 'Email2' => 12, 'Address' => 13, 'City' => 14, 'State' => 15, 'Zip' => 16, 'Phone' => 17, 'TeamLink' => 18, 'TradeLink' => 19, 'DraftLink' => 20, 'AwardsLink' => 21, 'Aim' => 22, 'Yahoo' => 23, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'link' => 1, 'owner' => 2, 'name' => 3, 'nickname' => 4, 'teamAbbrev' => 5, 'division' => 6, 'email' => 7, 'status' => 8, 'comment' => 9, 'league' => 10, 'used' => 11, 'email2' => 12, 'address' => 13, 'city' => 14, 'state' => 15, 'zip' => 16, 'phone' => 17, 'teamLink' => 18, 'tradeLink' => 19, 'draftLink' => 20, 'awardsLink' => 21, 'aim' => 22, 'yahoo' => 23, ),
        self::TYPE_COLNAME       => array(TeamsOldTableMap::COL_ID => 0, TeamsOldTableMap::COL_LINK => 1, TeamsOldTableMap::COL_OWNER => 2, TeamsOldTableMap::COL_NAME => 3, TeamsOldTableMap::COL_NICKNAME => 4, TeamsOldTableMap::COL_TEAM_ABBREV => 5, TeamsOldTableMap::COL_DIVISION => 6, TeamsOldTableMap::COL_EMAIL => 7, TeamsOldTableMap::COL_STATUS => 8, TeamsOldTableMap::COL_COMMENT => 9, TeamsOldTableMap::COL_LEAGUE => 10, TeamsOldTableMap::COL_USED => 11, TeamsOldTableMap::COL_EMAIL2 => 12, TeamsOldTableMap::COL_ADDRESS => 13, TeamsOldTableMap::COL_CITY => 14, TeamsOldTableMap::COL_STATE => 15, TeamsOldTableMap::COL_ZIP => 16, TeamsOldTableMap::COL_PHONE => 17, TeamsOldTableMap::COL_TEAM_LINK => 18, TeamsOldTableMap::COL_TRADE_LINK => 19, TeamsOldTableMap::COL_DRAFT_LINK => 20, TeamsOldTableMap::COL_AWARDS_LINK => 21, TeamsOldTableMap::COL_AIM => 22, TeamsOldTableMap::COL_YAHOO => 23, ),
        self::TYPE_FIELDNAME     => array('ID' => 0, 'link' => 1, 'Owner' => 2, 'Name' => 3, 'nickname' => 4, 'Team_Abbrev' => 5, 'Division' => 6, 'email' => 7, 'status' => 8, 'comment' => 9, 'league' => 10, 'used' => 11, 'email2' => 12, 'address' => 13, 'city' => 14, 'state' => 15, 'zip' => 16, 'phone' => 17, 'team_link' => 18, 'trade_link' => 19, 'draft_link' => 20, 'awards_link' => 21, 'aim' => 22, 'yahoo' => 23, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, )
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
        $this->setName('Teams_old');
        $this->setPhpName('TeamsOld');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\TeamsOld');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addColumn('ID', 'Id', 'INTEGER', false, null, null);
        $this->addColumn('link', 'Link', 'LONGVARCHAR', false, null, null);
        $this->addColumn('Owner', 'Owner', 'LONGVARCHAR', false, null, null);
        $this->addColumn('Name', 'Name', 'LONGVARCHAR', false, null, null);
        $this->addColumn('nickname', 'Nickname', 'LONGVARCHAR', false, null, null);
        $this->addColumn('Team_Abbrev', 'TeamAbbrev', 'LONGVARCHAR', false, null, null);
        $this->addColumn('Division', 'Division', 'LONGVARCHAR', false, null, null);
        $this->addColumn('email', 'Email', 'LONGVARCHAR', false, null, null);
        $this->addColumn('status', 'Status', 'LONGVARCHAR', false, null, null);
        $this->addColumn('comment', 'Comment', 'LONGVARCHAR', false, null, null);
        $this->addColumn('league', 'League', 'LONGVARCHAR', false, null, null);
        $this->addColumn('used', 'Used', 'LONGVARCHAR', false, null, null);
        $this->addColumn('email2', 'Email2', 'LONGVARCHAR', false, null, null);
        $this->addColumn('address', 'Address', 'LONGVARCHAR', false, null, null);
        $this->addColumn('city', 'City', 'LONGVARCHAR', false, null, null);
        $this->addColumn('state', 'State', 'LONGVARCHAR', false, null, null);
        $this->addColumn('zip', 'Zip', 'LONGVARCHAR', false, null, null);
        $this->addColumn('phone', 'Phone', 'LONGVARCHAR', false, null, null);
        $this->addColumn('team_link', 'TeamLink', 'LONGVARCHAR', false, null, null);
        $this->addColumn('trade_link', 'TradeLink', 'LONGVARCHAR', false, null, null);
        $this->addColumn('draft_link', 'DraftLink', 'LONGVARCHAR', false, null, null);
        $this->addColumn('awards_link', 'AwardsLink', 'LONGVARCHAR', false, null, null);
        $this->addColumn('aim', 'Aim', 'LONGVARCHAR', false, null, null);
        $this->addColumn('yahoo', 'Yahoo', 'LONGVARCHAR', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
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
        return null;
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
        return '';
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
        return $withPrefix ? TeamsOldTableMap::CLASS_DEFAULT : TeamsOldTableMap::OM_CLASS;
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
     * @return array           (TeamsOld object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = TeamsOldTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = TeamsOldTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + TeamsOldTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = TeamsOldTableMap::OM_CLASS;
            /** @var TeamsOld $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            TeamsOldTableMap::addInstanceToPool($obj, $key);
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
            $key = TeamsOldTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = TeamsOldTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var TeamsOld $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                TeamsOldTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(TeamsOldTableMap::COL_ID);
            $criteria->addSelectColumn(TeamsOldTableMap::COL_LINK);
            $criteria->addSelectColumn(TeamsOldTableMap::COL_OWNER);
            $criteria->addSelectColumn(TeamsOldTableMap::COL_NAME);
            $criteria->addSelectColumn(TeamsOldTableMap::COL_NICKNAME);
            $criteria->addSelectColumn(TeamsOldTableMap::COL_TEAM_ABBREV);
            $criteria->addSelectColumn(TeamsOldTableMap::COL_DIVISION);
            $criteria->addSelectColumn(TeamsOldTableMap::COL_EMAIL);
            $criteria->addSelectColumn(TeamsOldTableMap::COL_STATUS);
            $criteria->addSelectColumn(TeamsOldTableMap::COL_COMMENT);
            $criteria->addSelectColumn(TeamsOldTableMap::COL_LEAGUE);
            $criteria->addSelectColumn(TeamsOldTableMap::COL_USED);
            $criteria->addSelectColumn(TeamsOldTableMap::COL_EMAIL2);
            $criteria->addSelectColumn(TeamsOldTableMap::COL_ADDRESS);
            $criteria->addSelectColumn(TeamsOldTableMap::COL_CITY);
            $criteria->addSelectColumn(TeamsOldTableMap::COL_STATE);
            $criteria->addSelectColumn(TeamsOldTableMap::COL_ZIP);
            $criteria->addSelectColumn(TeamsOldTableMap::COL_PHONE);
            $criteria->addSelectColumn(TeamsOldTableMap::COL_TEAM_LINK);
            $criteria->addSelectColumn(TeamsOldTableMap::COL_TRADE_LINK);
            $criteria->addSelectColumn(TeamsOldTableMap::COL_DRAFT_LINK);
            $criteria->addSelectColumn(TeamsOldTableMap::COL_AWARDS_LINK);
            $criteria->addSelectColumn(TeamsOldTableMap::COL_AIM);
            $criteria->addSelectColumn(TeamsOldTableMap::COL_YAHOO);
        } else {
            $criteria->addSelectColumn($alias . '.ID');
            $criteria->addSelectColumn($alias . '.link');
            $criteria->addSelectColumn($alias . '.Owner');
            $criteria->addSelectColumn($alias . '.Name');
            $criteria->addSelectColumn($alias . '.nickname');
            $criteria->addSelectColumn($alias . '.Team_Abbrev');
            $criteria->addSelectColumn($alias . '.Division');
            $criteria->addSelectColumn($alias . '.email');
            $criteria->addSelectColumn($alias . '.status');
            $criteria->addSelectColumn($alias . '.comment');
            $criteria->addSelectColumn($alias . '.league');
            $criteria->addSelectColumn($alias . '.used');
            $criteria->addSelectColumn($alias . '.email2');
            $criteria->addSelectColumn($alias . '.address');
            $criteria->addSelectColumn($alias . '.city');
            $criteria->addSelectColumn($alias . '.state');
            $criteria->addSelectColumn($alias . '.zip');
            $criteria->addSelectColumn($alias . '.phone');
            $criteria->addSelectColumn($alias . '.team_link');
            $criteria->addSelectColumn($alias . '.trade_link');
            $criteria->addSelectColumn($alias . '.draft_link');
            $criteria->addSelectColumn($alias . '.awards_link');
            $criteria->addSelectColumn($alias . '.aim');
            $criteria->addSelectColumn($alias . '.yahoo');
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
        return Propel::getServiceContainer()->getDatabaseMap(TeamsOldTableMap::DATABASE_NAME)->getTable(TeamsOldTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(TeamsOldTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(TeamsOldTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new TeamsOldTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a TeamsOld or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or TeamsOld object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(TeamsOldTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \TeamsOld) { // it's a model object
            // create criteria based on pk value
            $criteria = $values->buildCriteria();
        } else { // it's a primary key, or an array of pks
            throw new LogicException('The TeamsOld object has no primary key');
        }

        $query = TeamsOldQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            TeamsOldTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                TeamsOldTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the Teams_old table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return TeamsOldQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a TeamsOld or Criteria object.
     *
     * @param mixed               $criteria Criteria or TeamsOld object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TeamsOldTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from TeamsOld object
        }


        // Set the correct dbName
        $query = TeamsOldQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // TeamsOldTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
TeamsOldTableMap::buildTableMap();
