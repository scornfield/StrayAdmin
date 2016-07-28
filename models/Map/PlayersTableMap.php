<?php

namespace Map;

use \Players;
use \PlayersQuery;
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
 * This class defines the structure of the 'players' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class PlayersTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.PlayersTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'players';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Players';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Players';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 20;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 20;

    /**
     * the column name for the ID field
     */
    const COL_ID = 'players.ID';

    /**
     * the column name for the lastn field
     */
    const COL_LASTN = 'players.lastn';

    /**
     * the column name for the bats field
     */
    const COL_BATS = 'players.bats';

    /**
     * the column name for the bday field
     */
    const COL_BDAY = 'players.bday';

    /**
     * the column name for the age field
     */
    const COL_AGE = 'players.age';

    /**
     * the column name for the mlb field
     */
    const COL_MLB = 'players.mlb';

    /**
     * the column name for the draft_year field
     */
    const COL_DRAFT_YEAR = 'players.draft_year';

    /**
     * the column name for the position field
     */
    const COL_POSITION = 'players.position';

    /**
     * the column name for the card field
     */
    const COL_CARD = 'players.card';

    /**
     * the column name for the d_e field
     */
    const COL_D_E = 'players.d_e';

    /**
     * the column name for the lg field
     */
    const COL_LG = 'players.lg';

    /**
     * the column name for the mwbl field
     */
    const COL_MWBL = 'players.mwbl';

    /**
     * the column name for the category field
     */
    const COL_CATEGORY = 'players.category';

    /**
     * the column name for the comment field
     */
    const COL_COMMENT = 'players.comment';

    /**
     * the column name for the mwbl_link field
     */
    const COL_MWBL_LINK = 'players.mwbl_link';

    /**
     * the column name for the mlb_link field
     */
    const COL_MLB_LINK = 'players.mlb_link';

    /**
     * the column name for the mwbl_link_enabled field
     */
    const COL_MWBL_LINK_ENABLED = 'players.mwbl_link_enabled';

    /**
     * the column name for the mlb_link_enabled field
     */
    const COL_MLB_LINK_ENABLED = 'players.mlb_link_enabled';

    /**
     * the column name for the create_ts field
     */
    const COL_CREATE_TS = 'players.create_ts';

    /**
     * the column name for the maint_ts field
     */
    const COL_MAINT_TS = 'players.maint_ts';

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
        self::TYPE_PHPNAME       => array('Id', 'Lastn', 'Bats', 'Bday', 'Age', 'Mlb', 'DraftYear', 'Position', 'Card', 'DE', 'Lg', 'Mwbl', 'Category', 'Comment', 'MwblLink', 'MlbLink', 'MwblLinkEnabled', 'MlbLinkEnabled', 'CreateTs', 'MaintTs', ),
        self::TYPE_CAMELNAME     => array('id', 'lastn', 'bats', 'bday', 'age', 'mlb', 'draftYear', 'position', 'card', 'dE', 'lg', 'mwbl', 'category', 'comment', 'mwblLink', 'mlbLink', 'mwblLinkEnabled', 'mlbLinkEnabled', 'createTs', 'maintTs', ),
        self::TYPE_COLNAME       => array(PlayersTableMap::COL_ID, PlayersTableMap::COL_LASTN, PlayersTableMap::COL_BATS, PlayersTableMap::COL_BDAY, PlayersTableMap::COL_AGE, PlayersTableMap::COL_MLB, PlayersTableMap::COL_DRAFT_YEAR, PlayersTableMap::COL_POSITION, PlayersTableMap::COL_CARD, PlayersTableMap::COL_D_E, PlayersTableMap::COL_LG, PlayersTableMap::COL_MWBL, PlayersTableMap::COL_CATEGORY, PlayersTableMap::COL_COMMENT, PlayersTableMap::COL_MWBL_LINK, PlayersTableMap::COL_MLB_LINK, PlayersTableMap::COL_MWBL_LINK_ENABLED, PlayersTableMap::COL_MLB_LINK_ENABLED, PlayersTableMap::COL_CREATE_TS, PlayersTableMap::COL_MAINT_TS, ),
        self::TYPE_FIELDNAME     => array('ID', 'lastn', 'bats', 'bday', 'age', 'mlb', 'draft_year', 'position', 'card', 'd_e', 'lg', 'mwbl', 'category', 'comment', 'mwbl_link', 'mlb_link', 'mwbl_link_enabled', 'mlb_link_enabled', 'create_ts', 'maint_ts', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Lastn' => 1, 'Bats' => 2, 'Bday' => 3, 'Age' => 4, 'Mlb' => 5, 'DraftYear' => 6, 'Position' => 7, 'Card' => 8, 'DE' => 9, 'Lg' => 10, 'Mwbl' => 11, 'Category' => 12, 'Comment' => 13, 'MwblLink' => 14, 'MlbLink' => 15, 'MwblLinkEnabled' => 16, 'MlbLinkEnabled' => 17, 'CreateTs' => 18, 'MaintTs' => 19, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'lastn' => 1, 'bats' => 2, 'bday' => 3, 'age' => 4, 'mlb' => 5, 'draftYear' => 6, 'position' => 7, 'card' => 8, 'dE' => 9, 'lg' => 10, 'mwbl' => 11, 'category' => 12, 'comment' => 13, 'mwblLink' => 14, 'mlbLink' => 15, 'mwblLinkEnabled' => 16, 'mlbLinkEnabled' => 17, 'createTs' => 18, 'maintTs' => 19, ),
        self::TYPE_COLNAME       => array(PlayersTableMap::COL_ID => 0, PlayersTableMap::COL_LASTN => 1, PlayersTableMap::COL_BATS => 2, PlayersTableMap::COL_BDAY => 3, PlayersTableMap::COL_AGE => 4, PlayersTableMap::COL_MLB => 5, PlayersTableMap::COL_DRAFT_YEAR => 6, PlayersTableMap::COL_POSITION => 7, PlayersTableMap::COL_CARD => 8, PlayersTableMap::COL_D_E => 9, PlayersTableMap::COL_LG => 10, PlayersTableMap::COL_MWBL => 11, PlayersTableMap::COL_CATEGORY => 12, PlayersTableMap::COL_COMMENT => 13, PlayersTableMap::COL_MWBL_LINK => 14, PlayersTableMap::COL_MLB_LINK => 15, PlayersTableMap::COL_MWBL_LINK_ENABLED => 16, PlayersTableMap::COL_MLB_LINK_ENABLED => 17, PlayersTableMap::COL_CREATE_TS => 18, PlayersTableMap::COL_MAINT_TS => 19, ),
        self::TYPE_FIELDNAME     => array('ID' => 0, 'lastn' => 1, 'bats' => 2, 'bday' => 3, 'age' => 4, 'mlb' => 5, 'draft_year' => 6, 'position' => 7, 'card' => 8, 'd_e' => 9, 'lg' => 10, 'mwbl' => 11, 'category' => 12, 'comment' => 13, 'mwbl_link' => 14, 'mlb_link' => 15, 'mwbl_link_enabled' => 16, 'mlb_link_enabled' => 17, 'create_ts' => 18, 'maint_ts' => 19, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, )
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
        $this->setName('players');
        $this->setPhpName('Players');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Players');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('lastn', 'Lastn', 'VARCHAR', true, 255, '');
        $this->addColumn('bats', 'Bats', 'VARCHAR', false, 3, '');
        $this->addColumn('bday', 'Bday', 'DATE', false, null, null);
        $this->addColumn('age', 'Age', 'INTEGER', false, null, null);
        $this->addForeignKey('mlb', 'Mlb', 'VARCHAR', 'mlb_team_ref', 'mlb', false, 4, '');
        $this->addColumn('draft_year', 'DraftYear', 'VARCHAR', false, 4, '');
        $this->addForeignKey('position', 'Position', 'VARCHAR', 'position_ref', 'position', false, 3, '');
        $this->addForeignKey('card', 'Card', 'BOOLEAN', 'card_ref', 'card', false, 1, null);
        $this->addColumn('d_e', 'DE', 'VARCHAR', false, 4, '');
        $this->addForeignKey('lg', 'Lg', 'VARCHAR', 'division_ref', 'division', false, 2, '');
        $this->addForeignKey('mwbl', 'Mwbl', 'VARCHAR', 'Teams', 'Team_Abbrev', false, 5, '');
        $this->addColumn('category', 'Category', 'VARCHAR', false, 255, '');
        $this->addColumn('comment', 'Comment', 'LONGVARCHAR', false, null, null);
        $this->addColumn('mwbl_link', 'MwblLink', 'VARCHAR', false, 500, '');
        $this->addColumn('mlb_link', 'MlbLink', 'VARCHAR', false, 500, '');
        $this->addColumn('mwbl_link_enabled', 'MwblLinkEnabled', 'BOOLEAN', false, 1, null);
        $this->addColumn('mlb_link_enabled', 'MlbLinkEnabled', 'BOOLEAN', false, 1, null);
        $this->addColumn('create_ts', 'CreateTs', 'TIMESTAMP', true, null, 'CURRENT_TIMESTAMP');
        $this->addColumn('maint_ts', 'MaintTs', 'TIMESTAMP', true, null, 'CURRENT_TIMESTAMP');
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('MlbTeamRef', '\\MlbTeamRef', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':mlb',
    1 => ':mlb',
  ),
), null, null, null, false);
        $this->addRelation('CardRef', '\\CardRef', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':card',
    1 => ':card',
  ),
), null, null, null, false);
        $this->addRelation('DivisionRef', '\\DivisionRef', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':lg',
    1 => ':division',
  ),
), null, null, null, false);
        $this->addRelation('PositionRef', '\\PositionRef', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':position',
    1 => ':position',
  ),
), null, null, null, false);
        $this->addRelation('Teams', '\\Teams', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':mwbl',
    1 => ':Team_Abbrev',
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
        return $withPrefix ? PlayersTableMap::CLASS_DEFAULT : PlayersTableMap::OM_CLASS;
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
     * @return array           (Players object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = PlayersTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = PlayersTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + PlayersTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = PlayersTableMap::OM_CLASS;
            /** @var Players $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            PlayersTableMap::addInstanceToPool($obj, $key);
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
            $key = PlayersTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = PlayersTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Players $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                PlayersTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(PlayersTableMap::COL_ID);
            $criteria->addSelectColumn(PlayersTableMap::COL_LASTN);
            $criteria->addSelectColumn(PlayersTableMap::COL_BATS);
            $criteria->addSelectColumn(PlayersTableMap::COL_BDAY);
            $criteria->addSelectColumn(PlayersTableMap::COL_AGE);
            $criteria->addSelectColumn(PlayersTableMap::COL_MLB);
            $criteria->addSelectColumn(PlayersTableMap::COL_DRAFT_YEAR);
            $criteria->addSelectColumn(PlayersTableMap::COL_POSITION);
            $criteria->addSelectColumn(PlayersTableMap::COL_CARD);
            $criteria->addSelectColumn(PlayersTableMap::COL_D_E);
            $criteria->addSelectColumn(PlayersTableMap::COL_LG);
            $criteria->addSelectColumn(PlayersTableMap::COL_MWBL);
            $criteria->addSelectColumn(PlayersTableMap::COL_CATEGORY);
            $criteria->addSelectColumn(PlayersTableMap::COL_COMMENT);
            $criteria->addSelectColumn(PlayersTableMap::COL_MWBL_LINK);
            $criteria->addSelectColumn(PlayersTableMap::COL_MLB_LINK);
            $criteria->addSelectColumn(PlayersTableMap::COL_MWBL_LINK_ENABLED);
            $criteria->addSelectColumn(PlayersTableMap::COL_MLB_LINK_ENABLED);
            $criteria->addSelectColumn(PlayersTableMap::COL_CREATE_TS);
            $criteria->addSelectColumn(PlayersTableMap::COL_MAINT_TS);
        } else {
            $criteria->addSelectColumn($alias . '.ID');
            $criteria->addSelectColumn($alias . '.lastn');
            $criteria->addSelectColumn($alias . '.bats');
            $criteria->addSelectColumn($alias . '.bday');
            $criteria->addSelectColumn($alias . '.age');
            $criteria->addSelectColumn($alias . '.mlb');
            $criteria->addSelectColumn($alias . '.draft_year');
            $criteria->addSelectColumn($alias . '.position');
            $criteria->addSelectColumn($alias . '.card');
            $criteria->addSelectColumn($alias . '.d_e');
            $criteria->addSelectColumn($alias . '.lg');
            $criteria->addSelectColumn($alias . '.mwbl');
            $criteria->addSelectColumn($alias . '.category');
            $criteria->addSelectColumn($alias . '.comment');
            $criteria->addSelectColumn($alias . '.mwbl_link');
            $criteria->addSelectColumn($alias . '.mlb_link');
            $criteria->addSelectColumn($alias . '.mwbl_link_enabled');
            $criteria->addSelectColumn($alias . '.mlb_link_enabled');
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
        return Propel::getServiceContainer()->getDatabaseMap(PlayersTableMap::DATABASE_NAME)->getTable(PlayersTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(PlayersTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(PlayersTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new PlayersTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Players or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Players object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(PlayersTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Players) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(PlayersTableMap::DATABASE_NAME);
            $criteria->add(PlayersTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = PlayersQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            PlayersTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                PlayersTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the players table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return PlayersQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Players or Criteria object.
     *
     * @param mixed               $criteria Criteria or Players object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PlayersTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Players object
        }

        if ($criteria->containsKey(PlayersTableMap::COL_ID) && $criteria->keyContainsValue(PlayersTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.PlayersTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = PlayersQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // PlayersTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
PlayersTableMap::buildTableMap();
