<?php

namespace Map;

use \Teams;
use \TeamsQuery;
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
 * This class defines the structure of the 'Teams' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class TeamsTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.TeamsTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'Teams';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Teams';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Teams';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 26;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 26;

    /**
     * the column name for the ID field
     */
    const COL_ID = 'Teams.ID';

    /**
     * the column name for the link field
     */
    const COL_LINK = 'Teams.link';

    /**
     * the column name for the Owner field
     */
    const COL_OWNER = 'Teams.Owner';

    /**
     * the column name for the Name field
     */
    const COL_NAME = 'Teams.Name';

    /**
     * the column name for the nickname field
     */
    const COL_NICKNAME = 'Teams.nickname';

    /**
     * the column name for the Team_Abbrev field
     */
    const COL_TEAM_ABBREV = 'Teams.Team_Abbrev';

    /**
     * the column name for the Division field
     */
    const COL_DIVISION = 'Teams.Division';

    /**
     * the column name for the email field
     */
    const COL_EMAIL = 'Teams.email';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'Teams.status';

    /**
     * the column name for the comment field
     */
    const COL_COMMENT = 'Teams.comment';

    /**
     * the column name for the league field
     */
    const COL_LEAGUE = 'Teams.league';

    /**
     * the column name for the used field
     */
    const COL_USED = 'Teams.used';

    /**
     * the column name for the email2 field
     */
    const COL_EMAIL2 = 'Teams.email2';

    /**
     * the column name for the address field
     */
    const COL_ADDRESS = 'Teams.address';

    /**
     * the column name for the city field
     */
    const COL_CITY = 'Teams.city';

    /**
     * the column name for the state field
     */
    const COL_STATE = 'Teams.state';

    /**
     * the column name for the zip field
     */
    const COL_ZIP = 'Teams.zip';

    /**
     * the column name for the phone field
     */
    const COL_PHONE = 'Teams.phone';

    /**
     * the column name for the team_link field
     */
    const COL_TEAM_LINK = 'Teams.team_link';

    /**
     * the column name for the trade_link field
     */
    const COL_TRADE_LINK = 'Teams.trade_link';

    /**
     * the column name for the draft_link field
     */
    const COL_DRAFT_LINK = 'Teams.draft_link';

    /**
     * the column name for the awards_link field
     */
    const COL_AWARDS_LINK = 'Teams.awards_link';

    /**
     * the column name for the aim field
     */
    const COL_AIM = 'Teams.aim';

    /**
     * the column name for the yahoo field
     */
    const COL_YAHOO = 'Teams.yahoo';

    /**
     * the column name for the create_ts field
     */
    const COL_CREATE_TS = 'Teams.create_ts';

    /**
     * the column name for the maint_ts field
     */
    const COL_MAINT_TS = 'Teams.maint_ts';

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
        self::TYPE_PHPNAME       => array('Id', 'Link', 'Owner', 'Name', 'Nickname', 'TeamAbbrev', 'Division', 'Email', 'Status', 'Comment', 'League', 'Used', 'Email2', 'Address', 'City', 'State', 'Zip', 'Phone', 'TeamLink', 'TradeLink', 'DraftLink', 'AwardsLink', 'Aim', 'Yahoo', 'CreateTs', 'MaintTs', ),
        self::TYPE_CAMELNAME     => array('id', 'link', 'owner', 'name', 'nickname', 'teamAbbrev', 'division', 'email', 'status', 'comment', 'league', 'used', 'email2', 'address', 'city', 'state', 'zip', 'phone', 'teamLink', 'tradeLink', 'draftLink', 'awardsLink', 'aim', 'yahoo', 'createTs', 'maintTs', ),
        self::TYPE_COLNAME       => array(TeamsTableMap::COL_ID, TeamsTableMap::COL_LINK, TeamsTableMap::COL_OWNER, TeamsTableMap::COL_NAME, TeamsTableMap::COL_NICKNAME, TeamsTableMap::COL_TEAM_ABBREV, TeamsTableMap::COL_DIVISION, TeamsTableMap::COL_EMAIL, TeamsTableMap::COL_STATUS, TeamsTableMap::COL_COMMENT, TeamsTableMap::COL_LEAGUE, TeamsTableMap::COL_USED, TeamsTableMap::COL_EMAIL2, TeamsTableMap::COL_ADDRESS, TeamsTableMap::COL_CITY, TeamsTableMap::COL_STATE, TeamsTableMap::COL_ZIP, TeamsTableMap::COL_PHONE, TeamsTableMap::COL_TEAM_LINK, TeamsTableMap::COL_TRADE_LINK, TeamsTableMap::COL_DRAFT_LINK, TeamsTableMap::COL_AWARDS_LINK, TeamsTableMap::COL_AIM, TeamsTableMap::COL_YAHOO, TeamsTableMap::COL_CREATE_TS, TeamsTableMap::COL_MAINT_TS, ),
        self::TYPE_FIELDNAME     => array('ID', 'link', 'Owner', 'Name', 'nickname', 'Team_Abbrev', 'Division', 'email', 'status', 'comment', 'league', 'used', 'email2', 'address', 'city', 'state', 'zip', 'phone', 'team_link', 'trade_link', 'draft_link', 'awards_link', 'aim', 'yahoo', 'create_ts', 'maint_ts', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Link' => 1, 'Owner' => 2, 'Name' => 3, 'Nickname' => 4, 'TeamAbbrev' => 5, 'Division' => 6, 'Email' => 7, 'Status' => 8, 'Comment' => 9, 'League' => 10, 'Used' => 11, 'Email2' => 12, 'Address' => 13, 'City' => 14, 'State' => 15, 'Zip' => 16, 'Phone' => 17, 'TeamLink' => 18, 'TradeLink' => 19, 'DraftLink' => 20, 'AwardsLink' => 21, 'Aim' => 22, 'Yahoo' => 23, 'CreateTs' => 24, 'MaintTs' => 25, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'link' => 1, 'owner' => 2, 'name' => 3, 'nickname' => 4, 'teamAbbrev' => 5, 'division' => 6, 'email' => 7, 'status' => 8, 'comment' => 9, 'league' => 10, 'used' => 11, 'email2' => 12, 'address' => 13, 'city' => 14, 'state' => 15, 'zip' => 16, 'phone' => 17, 'teamLink' => 18, 'tradeLink' => 19, 'draftLink' => 20, 'awardsLink' => 21, 'aim' => 22, 'yahoo' => 23, 'createTs' => 24, 'maintTs' => 25, ),
        self::TYPE_COLNAME       => array(TeamsTableMap::COL_ID => 0, TeamsTableMap::COL_LINK => 1, TeamsTableMap::COL_OWNER => 2, TeamsTableMap::COL_NAME => 3, TeamsTableMap::COL_NICKNAME => 4, TeamsTableMap::COL_TEAM_ABBREV => 5, TeamsTableMap::COL_DIVISION => 6, TeamsTableMap::COL_EMAIL => 7, TeamsTableMap::COL_STATUS => 8, TeamsTableMap::COL_COMMENT => 9, TeamsTableMap::COL_LEAGUE => 10, TeamsTableMap::COL_USED => 11, TeamsTableMap::COL_EMAIL2 => 12, TeamsTableMap::COL_ADDRESS => 13, TeamsTableMap::COL_CITY => 14, TeamsTableMap::COL_STATE => 15, TeamsTableMap::COL_ZIP => 16, TeamsTableMap::COL_PHONE => 17, TeamsTableMap::COL_TEAM_LINK => 18, TeamsTableMap::COL_TRADE_LINK => 19, TeamsTableMap::COL_DRAFT_LINK => 20, TeamsTableMap::COL_AWARDS_LINK => 21, TeamsTableMap::COL_AIM => 22, TeamsTableMap::COL_YAHOO => 23, TeamsTableMap::COL_CREATE_TS => 24, TeamsTableMap::COL_MAINT_TS => 25, ),
        self::TYPE_FIELDNAME     => array('ID' => 0, 'link' => 1, 'Owner' => 2, 'Name' => 3, 'nickname' => 4, 'Team_Abbrev' => 5, 'Division' => 6, 'email' => 7, 'status' => 8, 'comment' => 9, 'league' => 10, 'used' => 11, 'email2' => 12, 'address' => 13, 'city' => 14, 'state' => 15, 'zip' => 16, 'phone' => 17, 'team_link' => 18, 'trade_link' => 19, 'draft_link' => 20, 'awards_link' => 21, 'aim' => 22, 'yahoo' => 23, 'create_ts' => 24, 'maint_ts' => 25, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, )
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
        $this->setName('Teams');
        $this->setPhpName('Teams');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Teams');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('link', 'Link', 'VARCHAR', false, 500, '');
        $this->addColumn('Owner', 'Owner', 'VARCHAR', false, 255, '');
        $this->addColumn('Name', 'Name', 'VARCHAR', true, 255, '');
        $this->addColumn('nickname', 'Nickname', 'VARCHAR', true, 64, '');
        $this->addColumn('Team_Abbrev', 'TeamAbbrev', 'VARCHAR', true, 5, '');
        $this->addForeignKey('Division', 'Division', 'VARCHAR', 'division_ref', 'division', false, 2, '');
        $this->addColumn('email', 'Email', 'VARCHAR', false, 255, '');
        $this->addColumn('status', 'Status', 'CHAR', true, null, 'DEFUNCT');
        $this->addColumn('comment', 'Comment', 'LONGVARCHAR', false, null, null);
        $this->addForeignKey('league', 'League', 'VARCHAR', 'league_ref', 'league', false, 2, '');
        $this->addColumn('used', 'Used', 'CHAR', true, null, 'NO');
        $this->addColumn('email2', 'Email2', 'VARCHAR', false, 255, '');
        $this->addColumn('address', 'Address', 'VARCHAR', false, 255, '');
        $this->addColumn('city', 'City', 'VARCHAR', false, 255, '');
        $this->addColumn('state', 'State', 'VARCHAR', false, 12, '');
        $this->addColumn('zip', 'Zip', 'VARCHAR', false, 12, '');
        $this->addColumn('phone', 'Phone', 'VARCHAR', false, 255, '');
        $this->addColumn('team_link', 'TeamLink', 'VARCHAR', false, 500, '');
        $this->addColumn('trade_link', 'TradeLink', 'VARCHAR', false, 500, '');
        $this->addColumn('draft_link', 'DraftLink', 'VARCHAR', false, 500, '');
        $this->addColumn('awards_link', 'AwardsLink', 'VARCHAR', false, 500, '');
        $this->addColumn('aim', 'Aim', 'VARCHAR', false, 255, '');
        $this->addColumn('yahoo', 'Yahoo', 'VARCHAR', false, 255, '');
        $this->addColumn('create_ts', 'CreateTs', 'TIMESTAMP', true, null, 'CURRENT_TIMESTAMP');
        $this->addColumn('maint_ts', 'MaintTs', 'TIMESTAMP', true, null, 'CURRENT_TIMESTAMP');
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('DivisionRef', '\\DivisionRef', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':Division',
    1 => ':division',
  ),
), null, null, null, false);
        $this->addRelation('LeagueRef', '\\LeagueRef', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':league',
    1 => ':league',
  ),
), null, null, null, false);
        $this->addRelation('Players', '\\Players', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':mwbl',
    1 => ':Team_Abbrev',
  ),
), null, null, 'Playerss', false);
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

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
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
        return $withPrefix ? TeamsTableMap::CLASS_DEFAULT : TeamsTableMap::OM_CLASS;
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
     * @return array           (Teams object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = TeamsTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = TeamsTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + TeamsTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = TeamsTableMap::OM_CLASS;
            /** @var Teams $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            TeamsTableMap::addInstanceToPool($obj, $key);
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
            $key = TeamsTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = TeamsTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Teams $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                TeamsTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(TeamsTableMap::COL_ID);
            $criteria->addSelectColumn(TeamsTableMap::COL_LINK);
            $criteria->addSelectColumn(TeamsTableMap::COL_OWNER);
            $criteria->addSelectColumn(TeamsTableMap::COL_NAME);
            $criteria->addSelectColumn(TeamsTableMap::COL_NICKNAME);
            $criteria->addSelectColumn(TeamsTableMap::COL_TEAM_ABBREV);
            $criteria->addSelectColumn(TeamsTableMap::COL_DIVISION);
            $criteria->addSelectColumn(TeamsTableMap::COL_EMAIL);
            $criteria->addSelectColumn(TeamsTableMap::COL_STATUS);
            $criteria->addSelectColumn(TeamsTableMap::COL_COMMENT);
            $criteria->addSelectColumn(TeamsTableMap::COL_LEAGUE);
            $criteria->addSelectColumn(TeamsTableMap::COL_USED);
            $criteria->addSelectColumn(TeamsTableMap::COL_EMAIL2);
            $criteria->addSelectColumn(TeamsTableMap::COL_ADDRESS);
            $criteria->addSelectColumn(TeamsTableMap::COL_CITY);
            $criteria->addSelectColumn(TeamsTableMap::COL_STATE);
            $criteria->addSelectColumn(TeamsTableMap::COL_ZIP);
            $criteria->addSelectColumn(TeamsTableMap::COL_PHONE);
            $criteria->addSelectColumn(TeamsTableMap::COL_TEAM_LINK);
            $criteria->addSelectColumn(TeamsTableMap::COL_TRADE_LINK);
            $criteria->addSelectColumn(TeamsTableMap::COL_DRAFT_LINK);
            $criteria->addSelectColumn(TeamsTableMap::COL_AWARDS_LINK);
            $criteria->addSelectColumn(TeamsTableMap::COL_AIM);
            $criteria->addSelectColumn(TeamsTableMap::COL_YAHOO);
            $criteria->addSelectColumn(TeamsTableMap::COL_CREATE_TS);
            $criteria->addSelectColumn(TeamsTableMap::COL_MAINT_TS);
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
            $criteria->addSelectColumn($alias . '.create_ts');
            $criteria->addSelectColumn($alias . '.maint_ts');
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
        return Propel::getServiceContainer()->getDatabaseMap(TeamsTableMap::DATABASE_NAME)->getTable(TeamsTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(TeamsTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(TeamsTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new TeamsTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Teams or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Teams object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(TeamsTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Teams) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(TeamsTableMap::DATABASE_NAME);
            $criteria->add(TeamsTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = TeamsQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            TeamsTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                TeamsTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the Teams table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return TeamsQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Teams or Criteria object.
     *
     * @param mixed               $criteria Criteria or Teams object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TeamsTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Teams object
        }

        if ($criteria->containsKey(TeamsTableMap::COL_ID) && $criteria->keyContainsValue(TeamsTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.TeamsTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = TeamsQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // TeamsTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
TeamsTableMap::buildTableMap();
