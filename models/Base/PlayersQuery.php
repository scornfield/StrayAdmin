<?php

namespace Base;

use \Players as ChildPlayers;
use \PlayersQuery as ChildPlayersQuery;
use \Exception;
use \PDO;
use Map\PlayersTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'players' table.
 *
 *
 *
 * @method     ChildPlayersQuery orderById($order = Criteria::ASC) Order by the ID column
 * @method     ChildPlayersQuery orderByLastn($order = Criteria::ASC) Order by the lastn column
 * @method     ChildPlayersQuery orderByBats($order = Criteria::ASC) Order by the bats column
 * @method     ChildPlayersQuery orderByBday($order = Criteria::ASC) Order by the bday column
 * @method     ChildPlayersQuery orderByAge($order = Criteria::ASC) Order by the age column
 * @method     ChildPlayersQuery orderByMlb($order = Criteria::ASC) Order by the mlb column
 * @method     ChildPlayersQuery orderByDraftYear($order = Criteria::ASC) Order by the draft_year column
 * @method     ChildPlayersQuery orderByPosition($order = Criteria::ASC) Order by the position column
 * @method     ChildPlayersQuery orderByCard($order = Criteria::ASC) Order by the card column
 * @method     ChildPlayersQuery orderByDE($order = Criteria::ASC) Order by the d_e column
 * @method     ChildPlayersQuery orderByLg($order = Criteria::ASC) Order by the lg column
 * @method     ChildPlayersQuery orderByMwbl($order = Criteria::ASC) Order by the mwbl column
 * @method     ChildPlayersQuery orderByCategory($order = Criteria::ASC) Order by the category column
 * @method     ChildPlayersQuery orderByComment($order = Criteria::ASC) Order by the comment column
 * @method     ChildPlayersQuery orderByMwblLink($order = Criteria::ASC) Order by the mwbl_link column
 * @method     ChildPlayersQuery orderByMlbLink($order = Criteria::ASC) Order by the mlb_link column
 * @method     ChildPlayersQuery orderByMwblLinkEnabled($order = Criteria::ASC) Order by the mwbl_link_enabled column
 * @method     ChildPlayersQuery orderByMlbLinkEnabled($order = Criteria::ASC) Order by the mlb_link_enabled column
 * @method     ChildPlayersQuery orderByCreateTs($order = Criteria::ASC) Order by the create_ts column
 * @method     ChildPlayersQuery orderByMaintTs($order = Criteria::ASC) Order by the maint_ts column
 *
 * @method     ChildPlayersQuery groupById() Group by the ID column
 * @method     ChildPlayersQuery groupByLastn() Group by the lastn column
 * @method     ChildPlayersQuery groupByBats() Group by the bats column
 * @method     ChildPlayersQuery groupByBday() Group by the bday column
 * @method     ChildPlayersQuery groupByAge() Group by the age column
 * @method     ChildPlayersQuery groupByMlb() Group by the mlb column
 * @method     ChildPlayersQuery groupByDraftYear() Group by the draft_year column
 * @method     ChildPlayersQuery groupByPosition() Group by the position column
 * @method     ChildPlayersQuery groupByCard() Group by the card column
 * @method     ChildPlayersQuery groupByDE() Group by the d_e column
 * @method     ChildPlayersQuery groupByLg() Group by the lg column
 * @method     ChildPlayersQuery groupByMwbl() Group by the mwbl column
 * @method     ChildPlayersQuery groupByCategory() Group by the category column
 * @method     ChildPlayersQuery groupByComment() Group by the comment column
 * @method     ChildPlayersQuery groupByMwblLink() Group by the mwbl_link column
 * @method     ChildPlayersQuery groupByMlbLink() Group by the mlb_link column
 * @method     ChildPlayersQuery groupByMwblLinkEnabled() Group by the mwbl_link_enabled column
 * @method     ChildPlayersQuery groupByMlbLinkEnabled() Group by the mlb_link_enabled column
 * @method     ChildPlayersQuery groupByCreateTs() Group by the create_ts column
 * @method     ChildPlayersQuery groupByMaintTs() Group by the maint_ts column
 *
 * @method     ChildPlayersQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPlayersQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPlayersQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPlayersQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildPlayersQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildPlayersQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildPlayersQuery leftJoinMlbTeamRef($relationAlias = null) Adds a LEFT JOIN clause to the query using the MlbTeamRef relation
 * @method     ChildPlayersQuery rightJoinMlbTeamRef($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MlbTeamRef relation
 * @method     ChildPlayersQuery innerJoinMlbTeamRef($relationAlias = null) Adds a INNER JOIN clause to the query using the MlbTeamRef relation
 *
 * @method     ChildPlayersQuery joinWithMlbTeamRef($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the MlbTeamRef relation
 *
 * @method     ChildPlayersQuery leftJoinWithMlbTeamRef() Adds a LEFT JOIN clause and with to the query using the MlbTeamRef relation
 * @method     ChildPlayersQuery rightJoinWithMlbTeamRef() Adds a RIGHT JOIN clause and with to the query using the MlbTeamRef relation
 * @method     ChildPlayersQuery innerJoinWithMlbTeamRef() Adds a INNER JOIN clause and with to the query using the MlbTeamRef relation
 *
 * @method     ChildPlayersQuery leftJoinCardRef($relationAlias = null) Adds a LEFT JOIN clause to the query using the CardRef relation
 * @method     ChildPlayersQuery rightJoinCardRef($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CardRef relation
 * @method     ChildPlayersQuery innerJoinCardRef($relationAlias = null) Adds a INNER JOIN clause to the query using the CardRef relation
 *
 * @method     ChildPlayersQuery joinWithCardRef($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CardRef relation
 *
 * @method     ChildPlayersQuery leftJoinWithCardRef() Adds a LEFT JOIN clause and with to the query using the CardRef relation
 * @method     ChildPlayersQuery rightJoinWithCardRef() Adds a RIGHT JOIN clause and with to the query using the CardRef relation
 * @method     ChildPlayersQuery innerJoinWithCardRef() Adds a INNER JOIN clause and with to the query using the CardRef relation
 *
 * @method     ChildPlayersQuery leftJoinDivisionRef($relationAlias = null) Adds a LEFT JOIN clause to the query using the DivisionRef relation
 * @method     ChildPlayersQuery rightJoinDivisionRef($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DivisionRef relation
 * @method     ChildPlayersQuery innerJoinDivisionRef($relationAlias = null) Adds a INNER JOIN clause to the query using the DivisionRef relation
 *
 * @method     ChildPlayersQuery joinWithDivisionRef($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the DivisionRef relation
 *
 * @method     ChildPlayersQuery leftJoinWithDivisionRef() Adds a LEFT JOIN clause and with to the query using the DivisionRef relation
 * @method     ChildPlayersQuery rightJoinWithDivisionRef() Adds a RIGHT JOIN clause and with to the query using the DivisionRef relation
 * @method     ChildPlayersQuery innerJoinWithDivisionRef() Adds a INNER JOIN clause and with to the query using the DivisionRef relation
 *
 * @method     ChildPlayersQuery leftJoinPositionRef($relationAlias = null) Adds a LEFT JOIN clause to the query using the PositionRef relation
 * @method     ChildPlayersQuery rightJoinPositionRef($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PositionRef relation
 * @method     ChildPlayersQuery innerJoinPositionRef($relationAlias = null) Adds a INNER JOIN clause to the query using the PositionRef relation
 *
 * @method     ChildPlayersQuery joinWithPositionRef($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the PositionRef relation
 *
 * @method     ChildPlayersQuery leftJoinWithPositionRef() Adds a LEFT JOIN clause and with to the query using the PositionRef relation
 * @method     ChildPlayersQuery rightJoinWithPositionRef() Adds a RIGHT JOIN clause and with to the query using the PositionRef relation
 * @method     ChildPlayersQuery innerJoinWithPositionRef() Adds a INNER JOIN clause and with to the query using the PositionRef relation
 *
 * @method     ChildPlayersQuery leftJoinTeams($relationAlias = null) Adds a LEFT JOIN clause to the query using the Teams relation
 * @method     ChildPlayersQuery rightJoinTeams($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Teams relation
 * @method     ChildPlayersQuery innerJoinTeams($relationAlias = null) Adds a INNER JOIN clause to the query using the Teams relation
 *
 * @method     ChildPlayersQuery joinWithTeams($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Teams relation
 *
 * @method     ChildPlayersQuery leftJoinWithTeams() Adds a LEFT JOIN clause and with to the query using the Teams relation
 * @method     ChildPlayersQuery rightJoinWithTeams() Adds a RIGHT JOIN clause and with to the query using the Teams relation
 * @method     ChildPlayersQuery innerJoinWithTeams() Adds a INNER JOIN clause and with to the query using the Teams relation
 *
 * @method     \MlbTeamRefQuery|\CardRefQuery|\DivisionRefQuery|\PositionRefQuery|\TeamsQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildPlayers findOne(ConnectionInterface $con = null) Return the first ChildPlayers matching the query
 * @method     ChildPlayers findOneOrCreate(ConnectionInterface $con = null) Return the first ChildPlayers matching the query, or a new ChildPlayers object populated from the query conditions when no match is found
 *
 * @method     ChildPlayers findOneById(int $ID) Return the first ChildPlayers filtered by the ID column
 * @method     ChildPlayers findOneByLastn(string $lastn) Return the first ChildPlayers filtered by the lastn column
 * @method     ChildPlayers findOneByBats(string $bats) Return the first ChildPlayers filtered by the bats column
 * @method     ChildPlayers findOneByBday(string $bday) Return the first ChildPlayers filtered by the bday column
 * @method     ChildPlayers findOneByAge(int $age) Return the first ChildPlayers filtered by the age column
 * @method     ChildPlayers findOneByMlb(string $mlb) Return the first ChildPlayers filtered by the mlb column
 * @method     ChildPlayers findOneByDraftYear(string $draft_year) Return the first ChildPlayers filtered by the draft_year column
 * @method     ChildPlayers findOneByPosition(string $position) Return the first ChildPlayers filtered by the position column
 * @method     ChildPlayers findOneByCard(boolean $card) Return the first ChildPlayers filtered by the card column
 * @method     ChildPlayers findOneByDE(string $d_e) Return the first ChildPlayers filtered by the d_e column
 * @method     ChildPlayers findOneByLg(string $lg) Return the first ChildPlayers filtered by the lg column
 * @method     ChildPlayers findOneByMwbl(string $mwbl) Return the first ChildPlayers filtered by the mwbl column
 * @method     ChildPlayers findOneByCategory(string $category) Return the first ChildPlayers filtered by the category column
 * @method     ChildPlayers findOneByComment(string $comment) Return the first ChildPlayers filtered by the comment column
 * @method     ChildPlayers findOneByMwblLink(string $mwbl_link) Return the first ChildPlayers filtered by the mwbl_link column
 * @method     ChildPlayers findOneByMlbLink(string $mlb_link) Return the first ChildPlayers filtered by the mlb_link column
 * @method     ChildPlayers findOneByMwblLinkEnabled(boolean $mwbl_link_enabled) Return the first ChildPlayers filtered by the mwbl_link_enabled column
 * @method     ChildPlayers findOneByMlbLinkEnabled(boolean $mlb_link_enabled) Return the first ChildPlayers filtered by the mlb_link_enabled column
 * @method     ChildPlayers findOneByCreateTs(string $create_ts) Return the first ChildPlayers filtered by the create_ts column
 * @method     ChildPlayers findOneByMaintTs(string $maint_ts) Return the first ChildPlayers filtered by the maint_ts column *

 * @method     ChildPlayers requirePk($key, ConnectionInterface $con = null) Return the ChildPlayers by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPlayers requireOne(ConnectionInterface $con = null) Return the first ChildPlayers matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPlayers requireOneById(int $ID) Return the first ChildPlayers filtered by the ID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPlayers requireOneByLastn(string $lastn) Return the first ChildPlayers filtered by the lastn column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPlayers requireOneByBats(string $bats) Return the first ChildPlayers filtered by the bats column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPlayers requireOneByBday(string $bday) Return the first ChildPlayers filtered by the bday column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPlayers requireOneByAge(int $age) Return the first ChildPlayers filtered by the age column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPlayers requireOneByMlb(string $mlb) Return the first ChildPlayers filtered by the mlb column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPlayers requireOneByDraftYear(string $draft_year) Return the first ChildPlayers filtered by the draft_year column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPlayers requireOneByPosition(string $position) Return the first ChildPlayers filtered by the position column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPlayers requireOneByCard(boolean $card) Return the first ChildPlayers filtered by the card column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPlayers requireOneByDE(string $d_e) Return the first ChildPlayers filtered by the d_e column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPlayers requireOneByLg(string $lg) Return the first ChildPlayers filtered by the lg column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPlayers requireOneByMwbl(string $mwbl) Return the first ChildPlayers filtered by the mwbl column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPlayers requireOneByCategory(string $category) Return the first ChildPlayers filtered by the category column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPlayers requireOneByComment(string $comment) Return the first ChildPlayers filtered by the comment column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPlayers requireOneByMwblLink(string $mwbl_link) Return the first ChildPlayers filtered by the mwbl_link column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPlayers requireOneByMlbLink(string $mlb_link) Return the first ChildPlayers filtered by the mlb_link column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPlayers requireOneByMwblLinkEnabled(boolean $mwbl_link_enabled) Return the first ChildPlayers filtered by the mwbl_link_enabled column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPlayers requireOneByMlbLinkEnabled(boolean $mlb_link_enabled) Return the first ChildPlayers filtered by the mlb_link_enabled column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPlayers requireOneByCreateTs(string $create_ts) Return the first ChildPlayers filtered by the create_ts column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPlayers requireOneByMaintTs(string $maint_ts) Return the first ChildPlayers filtered by the maint_ts column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPlayers[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildPlayers objects based on current ModelCriteria
 * @method     ChildPlayers[]|ObjectCollection findById(int $ID) Return ChildPlayers objects filtered by the ID column
 * @method     ChildPlayers[]|ObjectCollection findByLastn(string $lastn) Return ChildPlayers objects filtered by the lastn column
 * @method     ChildPlayers[]|ObjectCollection findByBats(string $bats) Return ChildPlayers objects filtered by the bats column
 * @method     ChildPlayers[]|ObjectCollection findByBday(string $bday) Return ChildPlayers objects filtered by the bday column
 * @method     ChildPlayers[]|ObjectCollection findByAge(int $age) Return ChildPlayers objects filtered by the age column
 * @method     ChildPlayers[]|ObjectCollection findByMlb(string $mlb) Return ChildPlayers objects filtered by the mlb column
 * @method     ChildPlayers[]|ObjectCollection findByDraftYear(string $draft_year) Return ChildPlayers objects filtered by the draft_year column
 * @method     ChildPlayers[]|ObjectCollection findByPosition(string $position) Return ChildPlayers objects filtered by the position column
 * @method     ChildPlayers[]|ObjectCollection findByCard(boolean $card) Return ChildPlayers objects filtered by the card column
 * @method     ChildPlayers[]|ObjectCollection findByDE(string $d_e) Return ChildPlayers objects filtered by the d_e column
 * @method     ChildPlayers[]|ObjectCollection findByLg(string $lg) Return ChildPlayers objects filtered by the lg column
 * @method     ChildPlayers[]|ObjectCollection findByMwbl(string $mwbl) Return ChildPlayers objects filtered by the mwbl column
 * @method     ChildPlayers[]|ObjectCollection findByCategory(string $category) Return ChildPlayers objects filtered by the category column
 * @method     ChildPlayers[]|ObjectCollection findByComment(string $comment) Return ChildPlayers objects filtered by the comment column
 * @method     ChildPlayers[]|ObjectCollection findByMwblLink(string $mwbl_link) Return ChildPlayers objects filtered by the mwbl_link column
 * @method     ChildPlayers[]|ObjectCollection findByMlbLink(string $mlb_link) Return ChildPlayers objects filtered by the mlb_link column
 * @method     ChildPlayers[]|ObjectCollection findByMwblLinkEnabled(boolean $mwbl_link_enabled) Return ChildPlayers objects filtered by the mwbl_link_enabled column
 * @method     ChildPlayers[]|ObjectCollection findByMlbLinkEnabled(boolean $mlb_link_enabled) Return ChildPlayers objects filtered by the mlb_link_enabled column
 * @method     ChildPlayers[]|ObjectCollection findByCreateTs(string $create_ts) Return ChildPlayers objects filtered by the create_ts column
 * @method     ChildPlayers[]|ObjectCollection findByMaintTs(string $maint_ts) Return ChildPlayers objects filtered by the maint_ts column
 * @method     ChildPlayers[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class PlayersQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\PlayersQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Players', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildPlayersQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildPlayersQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildPlayersQuery) {
            return $criteria;
        }
        $query = new ChildPlayersQuery();
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
     * @return ChildPlayers|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PlayersTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(PlayersTableMap::DATABASE_NAME);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
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
     * @return ChildPlayers A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT ID, lastn, bats, bday, age, mlb, draft_year, position, card, d_e, lg, mwbl, category, comment, mwbl_link, mlb_link, mwbl_link_enabled, mlb_link_enabled, create_ts, maint_ts FROM players WHERE ID = :p0';
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
            /** @var ChildPlayers $obj */
            $obj = new ChildPlayers();
            $obj->hydrate($row);
            PlayersTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildPlayers|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildPlayersQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PlayersTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildPlayersQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PlayersTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the ID column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE ID = 1234
     * $query->filterById(array(12, 34)); // WHERE ID IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE ID > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPlayersQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(PlayersTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(PlayersTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PlayersTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the lastn column
     *
     * Example usage:
     * <code>
     * $query->filterByLastn('fooValue');   // WHERE lastn = 'fooValue'
     * $query->filterByLastn('%fooValue%'); // WHERE lastn LIKE '%fooValue%'
     * </code>
     *
     * @param     string $lastn The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPlayersQuery The current query, for fluid interface
     */
    public function filterByLastn($lastn = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lastn)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $lastn)) {
                $lastn = str_replace('*', '%', $lastn);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PlayersTableMap::COL_LASTN, $lastn, $comparison);
    }

    /**
     * Filter the query on the bats column
     *
     * Example usage:
     * <code>
     * $query->filterByBats('fooValue');   // WHERE bats = 'fooValue'
     * $query->filterByBats('%fooValue%'); // WHERE bats LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bats The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPlayersQuery The current query, for fluid interface
     */
    public function filterByBats($bats = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bats)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $bats)) {
                $bats = str_replace('*', '%', $bats);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PlayersTableMap::COL_BATS, $bats, $comparison);
    }

    /**
     * Filter the query on the bday column
     *
     * Example usage:
     * <code>
     * $query->filterByBday('2011-03-14'); // WHERE bday = '2011-03-14'
     * $query->filterByBday('now'); // WHERE bday = '2011-03-14'
     * $query->filterByBday(array('max' => 'yesterday')); // WHERE bday > '2011-03-13'
     * </code>
     *
     * @param     mixed $bday The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPlayersQuery The current query, for fluid interface
     */
    public function filterByBday($bday = null, $comparison = null)
    {
        if (is_array($bday)) {
            $useMinMax = false;
            if (isset($bday['min'])) {
                $this->addUsingAlias(PlayersTableMap::COL_BDAY, $bday['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bday['max'])) {
                $this->addUsingAlias(PlayersTableMap::COL_BDAY, $bday['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PlayersTableMap::COL_BDAY, $bday, $comparison);
    }

    /**
     * Filter the query on the age column
     *
     * Example usage:
     * <code>
     * $query->filterByAge(1234); // WHERE age = 1234
     * $query->filterByAge(array(12, 34)); // WHERE age IN (12, 34)
     * $query->filterByAge(array('min' => 12)); // WHERE age > 12
     * </code>
     *
     * @param     mixed $age The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPlayersQuery The current query, for fluid interface
     */
    public function filterByAge($age = null, $comparison = null)
    {
        if (is_array($age)) {
            $useMinMax = false;
            if (isset($age['min'])) {
                $this->addUsingAlias(PlayersTableMap::COL_AGE, $age['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($age['max'])) {
                $this->addUsingAlias(PlayersTableMap::COL_AGE, $age['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PlayersTableMap::COL_AGE, $age, $comparison);
    }

    /**
     * Filter the query on the mlb column
     *
     * Example usage:
     * <code>
     * $query->filterByMlb('fooValue');   // WHERE mlb = 'fooValue'
     * $query->filterByMlb('%fooValue%'); // WHERE mlb LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mlb The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPlayersQuery The current query, for fluid interface
     */
    public function filterByMlb($mlb = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mlb)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $mlb)) {
                $mlb = str_replace('*', '%', $mlb);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PlayersTableMap::COL_MLB, $mlb, $comparison);
    }

    /**
     * Filter the query on the draft_year column
     *
     * Example usage:
     * <code>
     * $query->filterByDraftYear('fooValue');   // WHERE draft_year = 'fooValue'
     * $query->filterByDraftYear('%fooValue%'); // WHERE draft_year LIKE '%fooValue%'
     * </code>
     *
     * @param     string $draftYear The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPlayersQuery The current query, for fluid interface
     */
    public function filterByDraftYear($draftYear = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($draftYear)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $draftYear)) {
                $draftYear = str_replace('*', '%', $draftYear);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PlayersTableMap::COL_DRAFT_YEAR, $draftYear, $comparison);
    }

    /**
     * Filter the query on the position column
     *
     * Example usage:
     * <code>
     * $query->filterByPosition('fooValue');   // WHERE position = 'fooValue'
     * $query->filterByPosition('%fooValue%'); // WHERE position LIKE '%fooValue%'
     * </code>
     *
     * @param     string $position The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPlayersQuery The current query, for fluid interface
     */
    public function filterByPosition($position = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($position)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $position)) {
                $position = str_replace('*', '%', $position);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PlayersTableMap::COL_POSITION, $position, $comparison);
    }

    /**
     * Filter the query on the card column
     *
     * Example usage:
     * <code>
     * $query->filterByCard(true); // WHERE card = true
     * $query->filterByCard('yes'); // WHERE card = true
     * </code>
     *
     * @param     boolean|string $card The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPlayersQuery The current query, for fluid interface
     */
    public function filterByCard($card = null, $comparison = null)
    {
        if (is_string($card)) {
            $card = in_array(strtolower($card), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(PlayersTableMap::COL_CARD, $card, $comparison);
    }

    /**
     * Filter the query on the d_e column
     *
     * Example usage:
     * <code>
     * $query->filterByDE('fooValue');   // WHERE d_e = 'fooValue'
     * $query->filterByDE('%fooValue%'); // WHERE d_e LIKE '%fooValue%'
     * </code>
     *
     * @param     string $dE The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPlayersQuery The current query, for fluid interface
     */
    public function filterByDE($dE = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dE)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $dE)) {
                $dE = str_replace('*', '%', $dE);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PlayersTableMap::COL_D_E, $dE, $comparison);
    }

    /**
     * Filter the query on the lg column
     *
     * Example usage:
     * <code>
     * $query->filterByLg('fooValue');   // WHERE lg = 'fooValue'
     * $query->filterByLg('%fooValue%'); // WHERE lg LIKE '%fooValue%'
     * </code>
     *
     * @param     string $lg The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPlayersQuery The current query, for fluid interface
     */
    public function filterByLg($lg = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lg)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $lg)) {
                $lg = str_replace('*', '%', $lg);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PlayersTableMap::COL_LG, $lg, $comparison);
    }

    /**
     * Filter the query on the mwbl column
     *
     * Example usage:
     * <code>
     * $query->filterByMwbl('fooValue');   // WHERE mwbl = 'fooValue'
     * $query->filterByMwbl('%fooValue%'); // WHERE mwbl LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mwbl The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPlayersQuery The current query, for fluid interface
     */
    public function filterByMwbl($mwbl = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mwbl)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $mwbl)) {
                $mwbl = str_replace('*', '%', $mwbl);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PlayersTableMap::COL_MWBL, $mwbl, $comparison);
    }

    /**
     * Filter the query on the category column
     *
     * Example usage:
     * <code>
     * $query->filterByCategory('fooValue');   // WHERE category = 'fooValue'
     * $query->filterByCategory('%fooValue%'); // WHERE category LIKE '%fooValue%'
     * </code>
     *
     * @param     string $category The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPlayersQuery The current query, for fluid interface
     */
    public function filterByCategory($category = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($category)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $category)) {
                $category = str_replace('*', '%', $category);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PlayersTableMap::COL_CATEGORY, $category, $comparison);
    }

    /**
     * Filter the query on the comment column
     *
     * Example usage:
     * <code>
     * $query->filterByComment('fooValue');   // WHERE comment = 'fooValue'
     * $query->filterByComment('%fooValue%'); // WHERE comment LIKE '%fooValue%'
     * </code>
     *
     * @param     string $comment The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPlayersQuery The current query, for fluid interface
     */
    public function filterByComment($comment = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($comment)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $comment)) {
                $comment = str_replace('*', '%', $comment);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PlayersTableMap::COL_COMMENT, $comment, $comparison);
    }

    /**
     * Filter the query on the mwbl_link column
     *
     * Example usage:
     * <code>
     * $query->filterByMwblLink('fooValue');   // WHERE mwbl_link = 'fooValue'
     * $query->filterByMwblLink('%fooValue%'); // WHERE mwbl_link LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mwblLink The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPlayersQuery The current query, for fluid interface
     */
    public function filterByMwblLink($mwblLink = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mwblLink)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $mwblLink)) {
                $mwblLink = str_replace('*', '%', $mwblLink);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PlayersTableMap::COL_MWBL_LINK, $mwblLink, $comparison);
    }

    /**
     * Filter the query on the mlb_link column
     *
     * Example usage:
     * <code>
     * $query->filterByMlbLink('fooValue');   // WHERE mlb_link = 'fooValue'
     * $query->filterByMlbLink('%fooValue%'); // WHERE mlb_link LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mlbLink The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPlayersQuery The current query, for fluid interface
     */
    public function filterByMlbLink($mlbLink = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mlbLink)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $mlbLink)) {
                $mlbLink = str_replace('*', '%', $mlbLink);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PlayersTableMap::COL_MLB_LINK, $mlbLink, $comparison);
    }

    /**
     * Filter the query on the mwbl_link_enabled column
     *
     * Example usage:
     * <code>
     * $query->filterByMwblLinkEnabled(true); // WHERE mwbl_link_enabled = true
     * $query->filterByMwblLinkEnabled('yes'); // WHERE mwbl_link_enabled = true
     * </code>
     *
     * @param     boolean|string $mwblLinkEnabled The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPlayersQuery The current query, for fluid interface
     */
    public function filterByMwblLinkEnabled($mwblLinkEnabled = null, $comparison = null)
    {
        if (is_string($mwblLinkEnabled)) {
            $mwblLinkEnabled = in_array(strtolower($mwblLinkEnabled), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(PlayersTableMap::COL_MWBL_LINK_ENABLED, $mwblLinkEnabled, $comparison);
    }

    /**
     * Filter the query on the mlb_link_enabled column
     *
     * Example usage:
     * <code>
     * $query->filterByMlbLinkEnabled(true); // WHERE mlb_link_enabled = true
     * $query->filterByMlbLinkEnabled('yes'); // WHERE mlb_link_enabled = true
     * </code>
     *
     * @param     boolean|string $mlbLinkEnabled The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPlayersQuery The current query, for fluid interface
     */
    public function filterByMlbLinkEnabled($mlbLinkEnabled = null, $comparison = null)
    {
        if (is_string($mlbLinkEnabled)) {
            $mlbLinkEnabled = in_array(strtolower($mlbLinkEnabled), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(PlayersTableMap::COL_MLB_LINK_ENABLED, $mlbLinkEnabled, $comparison);
    }

    /**
     * Filter the query on the create_ts column
     *
     * Example usage:
     * <code>
     * $query->filterByCreateTs('2011-03-14'); // WHERE create_ts = '2011-03-14'
     * $query->filterByCreateTs('now'); // WHERE create_ts = '2011-03-14'
     * $query->filterByCreateTs(array('max' => 'yesterday')); // WHERE create_ts > '2011-03-13'
     * </code>
     *
     * @param     mixed $createTs The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPlayersQuery The current query, for fluid interface
     */
    public function filterByCreateTs($createTs = null, $comparison = null)
    {
        if (is_array($createTs)) {
            $useMinMax = false;
            if (isset($createTs['min'])) {
                $this->addUsingAlias(PlayersTableMap::COL_CREATE_TS, $createTs['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createTs['max'])) {
                $this->addUsingAlias(PlayersTableMap::COL_CREATE_TS, $createTs['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PlayersTableMap::COL_CREATE_TS, $createTs, $comparison);
    }

    /**
     * Filter the query on the maint_ts column
     *
     * Example usage:
     * <code>
     * $query->filterByMaintTs('2011-03-14'); // WHERE maint_ts = '2011-03-14'
     * $query->filterByMaintTs('now'); // WHERE maint_ts = '2011-03-14'
     * $query->filterByMaintTs(array('max' => 'yesterday')); // WHERE maint_ts > '2011-03-13'
     * </code>
     *
     * @param     mixed $maintTs The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPlayersQuery The current query, for fluid interface
     */
    public function filterByMaintTs($maintTs = null, $comparison = null)
    {
        if (is_array($maintTs)) {
            $useMinMax = false;
            if (isset($maintTs['min'])) {
                $this->addUsingAlias(PlayersTableMap::COL_MAINT_TS, $maintTs['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($maintTs['max'])) {
                $this->addUsingAlias(PlayersTableMap::COL_MAINT_TS, $maintTs['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PlayersTableMap::COL_MAINT_TS, $maintTs, $comparison);
    }

    /**
     * Filter the query by a related \MlbTeamRef object
     *
     * @param \MlbTeamRef|ObjectCollection $mlbTeamRef The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildPlayersQuery The current query, for fluid interface
     */
    public function filterByMlbTeamRef($mlbTeamRef, $comparison = null)
    {
        if ($mlbTeamRef instanceof \MlbTeamRef) {
            return $this
                ->addUsingAlias(PlayersTableMap::COL_MLB, $mlbTeamRef->getMlb(), $comparison);
        } elseif ($mlbTeamRef instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PlayersTableMap::COL_MLB, $mlbTeamRef->toKeyValue('PrimaryKey', 'Mlb'), $comparison);
        } else {
            throw new PropelException('filterByMlbTeamRef() only accepts arguments of type \MlbTeamRef or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MlbTeamRef relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPlayersQuery The current query, for fluid interface
     */
    public function joinMlbTeamRef($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MlbTeamRef');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'MlbTeamRef');
        }

        return $this;
    }

    /**
     * Use the MlbTeamRef relation MlbTeamRef object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \MlbTeamRefQuery A secondary query class using the current class as primary query
     */
    public function useMlbTeamRefQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinMlbTeamRef($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MlbTeamRef', '\MlbTeamRefQuery');
    }

    /**
     * Filter the query by a related \CardRef object
     *
     * @param \CardRef|ObjectCollection $cardRef The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildPlayersQuery The current query, for fluid interface
     */
    public function filterByCardRef($cardRef, $comparison = null)
    {
        if ($cardRef instanceof \CardRef) {
            return $this
                ->addUsingAlias(PlayersTableMap::COL_CARD, $cardRef->getCard(), $comparison);
        } elseif ($cardRef instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PlayersTableMap::COL_CARD, $cardRef->toKeyValue('PrimaryKey', 'Card'), $comparison);
        } else {
            throw new PropelException('filterByCardRef() only accepts arguments of type \CardRef or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CardRef relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPlayersQuery The current query, for fluid interface
     */
    public function joinCardRef($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CardRef');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'CardRef');
        }

        return $this;
    }

    /**
     * Use the CardRef relation CardRef object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CardRefQuery A secondary query class using the current class as primary query
     */
    public function useCardRefQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCardRef($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CardRef', '\CardRefQuery');
    }

    /**
     * Filter the query by a related \DivisionRef object
     *
     * @param \DivisionRef|ObjectCollection $divisionRef The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildPlayersQuery The current query, for fluid interface
     */
    public function filterByDivisionRef($divisionRef, $comparison = null)
    {
        if ($divisionRef instanceof \DivisionRef) {
            return $this
                ->addUsingAlias(PlayersTableMap::COL_LG, $divisionRef->getDivision(), $comparison);
        } elseif ($divisionRef instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PlayersTableMap::COL_LG, $divisionRef->toKeyValue('PrimaryKey', 'Division'), $comparison);
        } else {
            throw new PropelException('filterByDivisionRef() only accepts arguments of type \DivisionRef or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the DivisionRef relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPlayersQuery The current query, for fluid interface
     */
    public function joinDivisionRef($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('DivisionRef');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'DivisionRef');
        }

        return $this;
    }

    /**
     * Use the DivisionRef relation DivisionRef object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \DivisionRefQuery A secondary query class using the current class as primary query
     */
    public function useDivisionRefQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinDivisionRef($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'DivisionRef', '\DivisionRefQuery');
    }

    /**
     * Filter the query by a related \PositionRef object
     *
     * @param \PositionRef|ObjectCollection $positionRef The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildPlayersQuery The current query, for fluid interface
     */
    public function filterByPositionRef($positionRef, $comparison = null)
    {
        if ($positionRef instanceof \PositionRef) {
            return $this
                ->addUsingAlias(PlayersTableMap::COL_POSITION, $positionRef->getPosition(), $comparison);
        } elseif ($positionRef instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PlayersTableMap::COL_POSITION, $positionRef->toKeyValue('PrimaryKey', 'Position'), $comparison);
        } else {
            throw new PropelException('filterByPositionRef() only accepts arguments of type \PositionRef or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PositionRef relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPlayersQuery The current query, for fluid interface
     */
    public function joinPositionRef($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PositionRef');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'PositionRef');
        }

        return $this;
    }

    /**
     * Use the PositionRef relation PositionRef object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \PositionRefQuery A secondary query class using the current class as primary query
     */
    public function usePositionRefQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPositionRef($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PositionRef', '\PositionRefQuery');
    }

    /**
     * Filter the query by a related \Teams object
     *
     * @param \Teams|ObjectCollection $teams The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildPlayersQuery The current query, for fluid interface
     */
    public function filterByTeams($teams, $comparison = null)
    {
        if ($teams instanceof \Teams) {
            return $this
                ->addUsingAlias(PlayersTableMap::COL_MWBL, $teams->getTeamAbbrev(), $comparison);
        } elseif ($teams instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PlayersTableMap::COL_MWBL, $teams->toKeyValue('PrimaryKey', 'TeamAbbrev'), $comparison);
        } else {
            throw new PropelException('filterByTeams() only accepts arguments of type \Teams or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Teams relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPlayersQuery The current query, for fluid interface
     */
    public function joinTeams($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Teams');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Teams');
        }

        return $this;
    }

    /**
     * Use the Teams relation Teams object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \TeamsQuery A secondary query class using the current class as primary query
     */
    public function useTeamsQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinTeams($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Teams', '\TeamsQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildPlayers $players Object to remove from the list of results
     *
     * @return $this|ChildPlayersQuery The current query, for fluid interface
     */
    public function prune($players = null)
    {
        if ($players) {
            $this->addUsingAlias(PlayersTableMap::COL_ID, $players->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the players table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PlayersTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PlayersTableMap::clearInstancePool();
            PlayersTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(PlayersTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(PlayersTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            PlayersTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            PlayersTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // PlayersQuery
