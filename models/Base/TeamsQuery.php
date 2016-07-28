<?php

namespace Base;

use \Teams as ChildTeams;
use \TeamsQuery as ChildTeamsQuery;
use \Exception;
use \PDO;
use Map\TeamsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'Teams' table.
 *
 *
 *
 * @method     ChildTeamsQuery orderById($order = Criteria::ASC) Order by the ID column
 * @method     ChildTeamsQuery orderByLink($order = Criteria::ASC) Order by the link column
 * @method     ChildTeamsQuery orderByOwner($order = Criteria::ASC) Order by the Owner column
 * @method     ChildTeamsQuery orderByName($order = Criteria::ASC) Order by the Name column
 * @method     ChildTeamsQuery orderByNickname($order = Criteria::ASC) Order by the nickname column
 * @method     ChildTeamsQuery orderByTeamAbbrev($order = Criteria::ASC) Order by the Team_Abbrev column
 * @method     ChildTeamsQuery orderByDivision($order = Criteria::ASC) Order by the Division column
 * @method     ChildTeamsQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildTeamsQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildTeamsQuery orderByComment($order = Criteria::ASC) Order by the comment column
 * @method     ChildTeamsQuery orderByLeague($order = Criteria::ASC) Order by the league column
 * @method     ChildTeamsQuery orderByUsed($order = Criteria::ASC) Order by the used column
 * @method     ChildTeamsQuery orderByEmail2($order = Criteria::ASC) Order by the email2 column
 * @method     ChildTeamsQuery orderByAddress($order = Criteria::ASC) Order by the address column
 * @method     ChildTeamsQuery orderByCity($order = Criteria::ASC) Order by the city column
 * @method     ChildTeamsQuery orderByState($order = Criteria::ASC) Order by the state column
 * @method     ChildTeamsQuery orderByZip($order = Criteria::ASC) Order by the zip column
 * @method     ChildTeamsQuery orderByPhone($order = Criteria::ASC) Order by the phone column
 * @method     ChildTeamsQuery orderByTeamLink($order = Criteria::ASC) Order by the team_link column
 * @method     ChildTeamsQuery orderByTradeLink($order = Criteria::ASC) Order by the trade_link column
 * @method     ChildTeamsQuery orderByDraftLink($order = Criteria::ASC) Order by the draft_link column
 * @method     ChildTeamsQuery orderByAwardsLink($order = Criteria::ASC) Order by the awards_link column
 * @method     ChildTeamsQuery orderByAim($order = Criteria::ASC) Order by the aim column
 * @method     ChildTeamsQuery orderByYahoo($order = Criteria::ASC) Order by the yahoo column
 * @method     ChildTeamsQuery orderByCreateTs($order = Criteria::ASC) Order by the create_ts column
 * @method     ChildTeamsQuery orderByMaintTs($order = Criteria::ASC) Order by the maint_ts column
 *
 * @method     ChildTeamsQuery groupById() Group by the ID column
 * @method     ChildTeamsQuery groupByLink() Group by the link column
 * @method     ChildTeamsQuery groupByOwner() Group by the Owner column
 * @method     ChildTeamsQuery groupByName() Group by the Name column
 * @method     ChildTeamsQuery groupByNickname() Group by the nickname column
 * @method     ChildTeamsQuery groupByTeamAbbrev() Group by the Team_Abbrev column
 * @method     ChildTeamsQuery groupByDivision() Group by the Division column
 * @method     ChildTeamsQuery groupByEmail() Group by the email column
 * @method     ChildTeamsQuery groupByStatus() Group by the status column
 * @method     ChildTeamsQuery groupByComment() Group by the comment column
 * @method     ChildTeamsQuery groupByLeague() Group by the league column
 * @method     ChildTeamsQuery groupByUsed() Group by the used column
 * @method     ChildTeamsQuery groupByEmail2() Group by the email2 column
 * @method     ChildTeamsQuery groupByAddress() Group by the address column
 * @method     ChildTeamsQuery groupByCity() Group by the city column
 * @method     ChildTeamsQuery groupByState() Group by the state column
 * @method     ChildTeamsQuery groupByZip() Group by the zip column
 * @method     ChildTeamsQuery groupByPhone() Group by the phone column
 * @method     ChildTeamsQuery groupByTeamLink() Group by the team_link column
 * @method     ChildTeamsQuery groupByTradeLink() Group by the trade_link column
 * @method     ChildTeamsQuery groupByDraftLink() Group by the draft_link column
 * @method     ChildTeamsQuery groupByAwardsLink() Group by the awards_link column
 * @method     ChildTeamsQuery groupByAim() Group by the aim column
 * @method     ChildTeamsQuery groupByYahoo() Group by the yahoo column
 * @method     ChildTeamsQuery groupByCreateTs() Group by the create_ts column
 * @method     ChildTeamsQuery groupByMaintTs() Group by the maint_ts column
 *
 * @method     ChildTeamsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTeamsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTeamsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTeamsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildTeamsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildTeamsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildTeamsQuery leftJoinDivisionRef($relationAlias = null) Adds a LEFT JOIN clause to the query using the DivisionRef relation
 * @method     ChildTeamsQuery rightJoinDivisionRef($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DivisionRef relation
 * @method     ChildTeamsQuery innerJoinDivisionRef($relationAlias = null) Adds a INNER JOIN clause to the query using the DivisionRef relation
 *
 * @method     ChildTeamsQuery joinWithDivisionRef($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the DivisionRef relation
 *
 * @method     ChildTeamsQuery leftJoinWithDivisionRef() Adds a LEFT JOIN clause and with to the query using the DivisionRef relation
 * @method     ChildTeamsQuery rightJoinWithDivisionRef() Adds a RIGHT JOIN clause and with to the query using the DivisionRef relation
 * @method     ChildTeamsQuery innerJoinWithDivisionRef() Adds a INNER JOIN clause and with to the query using the DivisionRef relation
 *
 * @method     ChildTeamsQuery leftJoinLeagueRef($relationAlias = null) Adds a LEFT JOIN clause to the query using the LeagueRef relation
 * @method     ChildTeamsQuery rightJoinLeagueRef($relationAlias = null) Adds a RIGHT JOIN clause to the query using the LeagueRef relation
 * @method     ChildTeamsQuery innerJoinLeagueRef($relationAlias = null) Adds a INNER JOIN clause to the query using the LeagueRef relation
 *
 * @method     ChildTeamsQuery joinWithLeagueRef($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the LeagueRef relation
 *
 * @method     ChildTeamsQuery leftJoinWithLeagueRef() Adds a LEFT JOIN clause and with to the query using the LeagueRef relation
 * @method     ChildTeamsQuery rightJoinWithLeagueRef() Adds a RIGHT JOIN clause and with to the query using the LeagueRef relation
 * @method     ChildTeamsQuery innerJoinWithLeagueRef() Adds a INNER JOIN clause and with to the query using the LeagueRef relation
 *
 * @method     ChildTeamsQuery leftJoinPlayers($relationAlias = null) Adds a LEFT JOIN clause to the query using the Players relation
 * @method     ChildTeamsQuery rightJoinPlayers($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Players relation
 * @method     ChildTeamsQuery innerJoinPlayers($relationAlias = null) Adds a INNER JOIN clause to the query using the Players relation
 *
 * @method     ChildTeamsQuery joinWithPlayers($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Players relation
 *
 * @method     ChildTeamsQuery leftJoinWithPlayers() Adds a LEFT JOIN clause and with to the query using the Players relation
 * @method     ChildTeamsQuery rightJoinWithPlayers() Adds a RIGHT JOIN clause and with to the query using the Players relation
 * @method     ChildTeamsQuery innerJoinWithPlayers() Adds a INNER JOIN clause and with to the query using the Players relation
 *
 * @method     \DivisionRefQuery|\LeagueRefQuery|\PlayersQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildTeams findOne(ConnectionInterface $con = null) Return the first ChildTeams matching the query
 * @method     ChildTeams findOneOrCreate(ConnectionInterface $con = null) Return the first ChildTeams matching the query, or a new ChildTeams object populated from the query conditions when no match is found
 *
 * @method     ChildTeams findOneById(int $ID) Return the first ChildTeams filtered by the ID column
 * @method     ChildTeams findOneByLink(string $link) Return the first ChildTeams filtered by the link column
 * @method     ChildTeams findOneByOwner(string $Owner) Return the first ChildTeams filtered by the Owner column
 * @method     ChildTeams findOneByName(string $Name) Return the first ChildTeams filtered by the Name column
 * @method     ChildTeams findOneByNickname(string $nickname) Return the first ChildTeams filtered by the nickname column
 * @method     ChildTeams findOneByTeamAbbrev(string $Team_Abbrev) Return the first ChildTeams filtered by the Team_Abbrev column
 * @method     ChildTeams findOneByDivision(string $Division) Return the first ChildTeams filtered by the Division column
 * @method     ChildTeams findOneByEmail(string $email) Return the first ChildTeams filtered by the email column
 * @method     ChildTeams findOneByStatus(string $status) Return the first ChildTeams filtered by the status column
 * @method     ChildTeams findOneByComment(string $comment) Return the first ChildTeams filtered by the comment column
 * @method     ChildTeams findOneByLeague(string $league) Return the first ChildTeams filtered by the league column
 * @method     ChildTeams findOneByUsed(string $used) Return the first ChildTeams filtered by the used column
 * @method     ChildTeams findOneByEmail2(string $email2) Return the first ChildTeams filtered by the email2 column
 * @method     ChildTeams findOneByAddress(string $address) Return the first ChildTeams filtered by the address column
 * @method     ChildTeams findOneByCity(string $city) Return the first ChildTeams filtered by the city column
 * @method     ChildTeams findOneByState(string $state) Return the first ChildTeams filtered by the state column
 * @method     ChildTeams findOneByZip(string $zip) Return the first ChildTeams filtered by the zip column
 * @method     ChildTeams findOneByPhone(string $phone) Return the first ChildTeams filtered by the phone column
 * @method     ChildTeams findOneByTeamLink(string $team_link) Return the first ChildTeams filtered by the team_link column
 * @method     ChildTeams findOneByTradeLink(string $trade_link) Return the first ChildTeams filtered by the trade_link column
 * @method     ChildTeams findOneByDraftLink(string $draft_link) Return the first ChildTeams filtered by the draft_link column
 * @method     ChildTeams findOneByAwardsLink(string $awards_link) Return the first ChildTeams filtered by the awards_link column
 * @method     ChildTeams findOneByAim(string $aim) Return the first ChildTeams filtered by the aim column
 * @method     ChildTeams findOneByYahoo(string $yahoo) Return the first ChildTeams filtered by the yahoo column
 * @method     ChildTeams findOneByCreateTs(string $create_ts) Return the first ChildTeams filtered by the create_ts column
 * @method     ChildTeams findOneByMaintTs(string $maint_ts) Return the first ChildTeams filtered by the maint_ts column *

 * @method     ChildTeams requirePk($key, ConnectionInterface $con = null) Return the ChildTeams by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTeams requireOne(ConnectionInterface $con = null) Return the first ChildTeams matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTeams requireOneById(int $ID) Return the first ChildTeams filtered by the ID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTeams requireOneByLink(string $link) Return the first ChildTeams filtered by the link column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTeams requireOneByOwner(string $Owner) Return the first ChildTeams filtered by the Owner column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTeams requireOneByName(string $Name) Return the first ChildTeams filtered by the Name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTeams requireOneByNickname(string $nickname) Return the first ChildTeams filtered by the nickname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTeams requireOneByTeamAbbrev(string $Team_Abbrev) Return the first ChildTeams filtered by the Team_Abbrev column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTeams requireOneByDivision(string $Division) Return the first ChildTeams filtered by the Division column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTeams requireOneByEmail(string $email) Return the first ChildTeams filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTeams requireOneByStatus(string $status) Return the first ChildTeams filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTeams requireOneByComment(string $comment) Return the first ChildTeams filtered by the comment column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTeams requireOneByLeague(string $league) Return the first ChildTeams filtered by the league column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTeams requireOneByUsed(string $used) Return the first ChildTeams filtered by the used column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTeams requireOneByEmail2(string $email2) Return the first ChildTeams filtered by the email2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTeams requireOneByAddress(string $address) Return the first ChildTeams filtered by the address column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTeams requireOneByCity(string $city) Return the first ChildTeams filtered by the city column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTeams requireOneByState(string $state) Return the first ChildTeams filtered by the state column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTeams requireOneByZip(string $zip) Return the first ChildTeams filtered by the zip column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTeams requireOneByPhone(string $phone) Return the first ChildTeams filtered by the phone column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTeams requireOneByTeamLink(string $team_link) Return the first ChildTeams filtered by the team_link column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTeams requireOneByTradeLink(string $trade_link) Return the first ChildTeams filtered by the trade_link column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTeams requireOneByDraftLink(string $draft_link) Return the first ChildTeams filtered by the draft_link column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTeams requireOneByAwardsLink(string $awards_link) Return the first ChildTeams filtered by the awards_link column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTeams requireOneByAim(string $aim) Return the first ChildTeams filtered by the aim column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTeams requireOneByYahoo(string $yahoo) Return the first ChildTeams filtered by the yahoo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTeams requireOneByCreateTs(string $create_ts) Return the first ChildTeams filtered by the create_ts column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTeams requireOneByMaintTs(string $maint_ts) Return the first ChildTeams filtered by the maint_ts column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTeams[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildTeams objects based on current ModelCriteria
 * @method     ChildTeams[]|ObjectCollection findById(int $ID) Return ChildTeams objects filtered by the ID column
 * @method     ChildTeams[]|ObjectCollection findByLink(string $link) Return ChildTeams objects filtered by the link column
 * @method     ChildTeams[]|ObjectCollection findByOwner(string $Owner) Return ChildTeams objects filtered by the Owner column
 * @method     ChildTeams[]|ObjectCollection findByName(string $Name) Return ChildTeams objects filtered by the Name column
 * @method     ChildTeams[]|ObjectCollection findByNickname(string $nickname) Return ChildTeams objects filtered by the nickname column
 * @method     ChildTeams[]|ObjectCollection findByTeamAbbrev(string $Team_Abbrev) Return ChildTeams objects filtered by the Team_Abbrev column
 * @method     ChildTeams[]|ObjectCollection findByDivision(string $Division) Return ChildTeams objects filtered by the Division column
 * @method     ChildTeams[]|ObjectCollection findByEmail(string $email) Return ChildTeams objects filtered by the email column
 * @method     ChildTeams[]|ObjectCollection findByStatus(string $status) Return ChildTeams objects filtered by the status column
 * @method     ChildTeams[]|ObjectCollection findByComment(string $comment) Return ChildTeams objects filtered by the comment column
 * @method     ChildTeams[]|ObjectCollection findByLeague(string $league) Return ChildTeams objects filtered by the league column
 * @method     ChildTeams[]|ObjectCollection findByUsed(string $used) Return ChildTeams objects filtered by the used column
 * @method     ChildTeams[]|ObjectCollection findByEmail2(string $email2) Return ChildTeams objects filtered by the email2 column
 * @method     ChildTeams[]|ObjectCollection findByAddress(string $address) Return ChildTeams objects filtered by the address column
 * @method     ChildTeams[]|ObjectCollection findByCity(string $city) Return ChildTeams objects filtered by the city column
 * @method     ChildTeams[]|ObjectCollection findByState(string $state) Return ChildTeams objects filtered by the state column
 * @method     ChildTeams[]|ObjectCollection findByZip(string $zip) Return ChildTeams objects filtered by the zip column
 * @method     ChildTeams[]|ObjectCollection findByPhone(string $phone) Return ChildTeams objects filtered by the phone column
 * @method     ChildTeams[]|ObjectCollection findByTeamLink(string $team_link) Return ChildTeams objects filtered by the team_link column
 * @method     ChildTeams[]|ObjectCollection findByTradeLink(string $trade_link) Return ChildTeams objects filtered by the trade_link column
 * @method     ChildTeams[]|ObjectCollection findByDraftLink(string $draft_link) Return ChildTeams objects filtered by the draft_link column
 * @method     ChildTeams[]|ObjectCollection findByAwardsLink(string $awards_link) Return ChildTeams objects filtered by the awards_link column
 * @method     ChildTeams[]|ObjectCollection findByAim(string $aim) Return ChildTeams objects filtered by the aim column
 * @method     ChildTeams[]|ObjectCollection findByYahoo(string $yahoo) Return ChildTeams objects filtered by the yahoo column
 * @method     ChildTeams[]|ObjectCollection findByCreateTs(string $create_ts) Return ChildTeams objects filtered by the create_ts column
 * @method     ChildTeams[]|ObjectCollection findByMaintTs(string $maint_ts) Return ChildTeams objects filtered by the maint_ts column
 * @method     ChildTeams[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class TeamsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\TeamsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Teams', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildTeamsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildTeamsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildTeamsQuery) {
            return $criteria;
        }
        $query = new ChildTeamsQuery();
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
     * @return ChildTeams|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = TeamsTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TeamsTableMap::DATABASE_NAME);
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
     * @return ChildTeams A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT ID, link, Owner, Name, nickname, Team_Abbrev, Division, email, status, comment, league, used, email2, address, city, state, zip, phone, team_link, trade_link, draft_link, awards_link, aim, yahoo, create_ts, maint_ts FROM Teams WHERE ID = :p0';
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
            /** @var ChildTeams $obj */
            $obj = new ChildTeams();
            $obj->hydrate($row);
            TeamsTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildTeams|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildTeamsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TeamsTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildTeamsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TeamsTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildTeamsQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(TeamsTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(TeamsTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TeamsTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the link column
     *
     * Example usage:
     * <code>
     * $query->filterByLink('fooValue');   // WHERE link = 'fooValue'
     * $query->filterByLink('%fooValue%'); // WHERE link LIKE '%fooValue%'
     * </code>
     *
     * @param     string $link The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTeamsQuery The current query, for fluid interface
     */
    public function filterByLink($link = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($link)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $link)) {
                $link = str_replace('*', '%', $link);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TeamsTableMap::COL_LINK, $link, $comparison);
    }

    /**
     * Filter the query on the Owner column
     *
     * Example usage:
     * <code>
     * $query->filterByOwner('fooValue');   // WHERE Owner = 'fooValue'
     * $query->filterByOwner('%fooValue%'); // WHERE Owner LIKE '%fooValue%'
     * </code>
     *
     * @param     string $owner The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTeamsQuery The current query, for fluid interface
     */
    public function filterByOwner($owner = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($owner)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $owner)) {
                $owner = str_replace('*', '%', $owner);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TeamsTableMap::COL_OWNER, $owner, $comparison);
    }

    /**
     * Filter the query on the Name column
     *
     * Example usage:
     * <code>
     * $query->filterByName('fooValue');   // WHERE Name = 'fooValue'
     * $query->filterByName('%fooValue%'); // WHERE Name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTeamsQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $name)) {
                $name = str_replace('*', '%', $name);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TeamsTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the nickname column
     *
     * Example usage:
     * <code>
     * $query->filterByNickname('fooValue');   // WHERE nickname = 'fooValue'
     * $query->filterByNickname('%fooValue%'); // WHERE nickname LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nickname The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTeamsQuery The current query, for fluid interface
     */
    public function filterByNickname($nickname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nickname)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nickname)) {
                $nickname = str_replace('*', '%', $nickname);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TeamsTableMap::COL_NICKNAME, $nickname, $comparison);
    }

    /**
     * Filter the query on the Team_Abbrev column
     *
     * Example usage:
     * <code>
     * $query->filterByTeamAbbrev('fooValue');   // WHERE Team_Abbrev = 'fooValue'
     * $query->filterByTeamAbbrev('%fooValue%'); // WHERE Team_Abbrev LIKE '%fooValue%'
     * </code>
     *
     * @param     string $teamAbbrev The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTeamsQuery The current query, for fluid interface
     */
    public function filterByTeamAbbrev($teamAbbrev = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($teamAbbrev)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $teamAbbrev)) {
                $teamAbbrev = str_replace('*', '%', $teamAbbrev);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TeamsTableMap::COL_TEAM_ABBREV, $teamAbbrev, $comparison);
    }

    /**
     * Filter the query on the Division column
     *
     * Example usage:
     * <code>
     * $query->filterByDivision('fooValue');   // WHERE Division = 'fooValue'
     * $query->filterByDivision('%fooValue%'); // WHERE Division LIKE '%fooValue%'
     * </code>
     *
     * @param     string $division The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTeamsQuery The current query, for fluid interface
     */
    public function filterByDivision($division = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($division)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $division)) {
                $division = str_replace('*', '%', $division);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TeamsTableMap::COL_DIVISION, $division, $comparison);
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%'); // WHERE email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTeamsQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $email)) {
                $email = str_replace('*', '%', $email);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TeamsTableMap::COL_EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the status column
     *
     * Example usage:
     * <code>
     * $query->filterByStatus('fooValue');   // WHERE status = 'fooValue'
     * $query->filterByStatus('%fooValue%'); // WHERE status LIKE '%fooValue%'
     * </code>
     *
     * @param     string $status The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTeamsQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($status)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $status)) {
                $status = str_replace('*', '%', $status);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TeamsTableMap::COL_STATUS, $status, $comparison);
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
     * @return $this|ChildTeamsQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TeamsTableMap::COL_COMMENT, $comment, $comparison);
    }

    /**
     * Filter the query on the league column
     *
     * Example usage:
     * <code>
     * $query->filterByLeague('fooValue');   // WHERE league = 'fooValue'
     * $query->filterByLeague('%fooValue%'); // WHERE league LIKE '%fooValue%'
     * </code>
     *
     * @param     string $league The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTeamsQuery The current query, for fluid interface
     */
    public function filterByLeague($league = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($league)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $league)) {
                $league = str_replace('*', '%', $league);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TeamsTableMap::COL_LEAGUE, $league, $comparison);
    }

    /**
     * Filter the query on the used column
     *
     * Example usage:
     * <code>
     * $query->filterByUsed('fooValue');   // WHERE used = 'fooValue'
     * $query->filterByUsed('%fooValue%'); // WHERE used LIKE '%fooValue%'
     * </code>
     *
     * @param     string $used The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTeamsQuery The current query, for fluid interface
     */
    public function filterByUsed($used = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($used)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $used)) {
                $used = str_replace('*', '%', $used);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TeamsTableMap::COL_USED, $used, $comparison);
    }

    /**
     * Filter the query on the email2 column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail2('fooValue');   // WHERE email2 = 'fooValue'
     * $query->filterByEmail2('%fooValue%'); // WHERE email2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email2 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTeamsQuery The current query, for fluid interface
     */
    public function filterByEmail2($email2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email2)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $email2)) {
                $email2 = str_replace('*', '%', $email2);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TeamsTableMap::COL_EMAIL2, $email2, $comparison);
    }

    /**
     * Filter the query on the address column
     *
     * Example usage:
     * <code>
     * $query->filterByAddress('fooValue');   // WHERE address = 'fooValue'
     * $query->filterByAddress('%fooValue%'); // WHERE address LIKE '%fooValue%'
     * </code>
     *
     * @param     string $address The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTeamsQuery The current query, for fluid interface
     */
    public function filterByAddress($address = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($address)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $address)) {
                $address = str_replace('*', '%', $address);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TeamsTableMap::COL_ADDRESS, $address, $comparison);
    }

    /**
     * Filter the query on the city column
     *
     * Example usage:
     * <code>
     * $query->filterByCity('fooValue');   // WHERE city = 'fooValue'
     * $query->filterByCity('%fooValue%'); // WHERE city LIKE '%fooValue%'
     * </code>
     *
     * @param     string $city The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTeamsQuery The current query, for fluid interface
     */
    public function filterByCity($city = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($city)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $city)) {
                $city = str_replace('*', '%', $city);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TeamsTableMap::COL_CITY, $city, $comparison);
    }

    /**
     * Filter the query on the state column
     *
     * Example usage:
     * <code>
     * $query->filterByState('fooValue');   // WHERE state = 'fooValue'
     * $query->filterByState('%fooValue%'); // WHERE state LIKE '%fooValue%'
     * </code>
     *
     * @param     string $state The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTeamsQuery The current query, for fluid interface
     */
    public function filterByState($state = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($state)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $state)) {
                $state = str_replace('*', '%', $state);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TeamsTableMap::COL_STATE, $state, $comparison);
    }

    /**
     * Filter the query on the zip column
     *
     * Example usage:
     * <code>
     * $query->filterByZip('fooValue');   // WHERE zip = 'fooValue'
     * $query->filterByZip('%fooValue%'); // WHERE zip LIKE '%fooValue%'
     * </code>
     *
     * @param     string $zip The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTeamsQuery The current query, for fluid interface
     */
    public function filterByZip($zip = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($zip)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $zip)) {
                $zip = str_replace('*', '%', $zip);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TeamsTableMap::COL_ZIP, $zip, $comparison);
    }

    /**
     * Filter the query on the phone column
     *
     * Example usage:
     * <code>
     * $query->filterByPhone('fooValue');   // WHERE phone = 'fooValue'
     * $query->filterByPhone('%fooValue%'); // WHERE phone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $phone The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTeamsQuery The current query, for fluid interface
     */
    public function filterByPhone($phone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($phone)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $phone)) {
                $phone = str_replace('*', '%', $phone);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TeamsTableMap::COL_PHONE, $phone, $comparison);
    }

    /**
     * Filter the query on the team_link column
     *
     * Example usage:
     * <code>
     * $query->filterByTeamLink('fooValue');   // WHERE team_link = 'fooValue'
     * $query->filterByTeamLink('%fooValue%'); // WHERE team_link LIKE '%fooValue%'
     * </code>
     *
     * @param     string $teamLink The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTeamsQuery The current query, for fluid interface
     */
    public function filterByTeamLink($teamLink = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($teamLink)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $teamLink)) {
                $teamLink = str_replace('*', '%', $teamLink);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TeamsTableMap::COL_TEAM_LINK, $teamLink, $comparison);
    }

    /**
     * Filter the query on the trade_link column
     *
     * Example usage:
     * <code>
     * $query->filterByTradeLink('fooValue');   // WHERE trade_link = 'fooValue'
     * $query->filterByTradeLink('%fooValue%'); // WHERE trade_link LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tradeLink The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTeamsQuery The current query, for fluid interface
     */
    public function filterByTradeLink($tradeLink = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tradeLink)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $tradeLink)) {
                $tradeLink = str_replace('*', '%', $tradeLink);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TeamsTableMap::COL_TRADE_LINK, $tradeLink, $comparison);
    }

    /**
     * Filter the query on the draft_link column
     *
     * Example usage:
     * <code>
     * $query->filterByDraftLink('fooValue');   // WHERE draft_link = 'fooValue'
     * $query->filterByDraftLink('%fooValue%'); // WHERE draft_link LIKE '%fooValue%'
     * </code>
     *
     * @param     string $draftLink The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTeamsQuery The current query, for fluid interface
     */
    public function filterByDraftLink($draftLink = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($draftLink)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $draftLink)) {
                $draftLink = str_replace('*', '%', $draftLink);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TeamsTableMap::COL_DRAFT_LINK, $draftLink, $comparison);
    }

    /**
     * Filter the query on the awards_link column
     *
     * Example usage:
     * <code>
     * $query->filterByAwardsLink('fooValue');   // WHERE awards_link = 'fooValue'
     * $query->filterByAwardsLink('%fooValue%'); // WHERE awards_link LIKE '%fooValue%'
     * </code>
     *
     * @param     string $awardsLink The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTeamsQuery The current query, for fluid interface
     */
    public function filterByAwardsLink($awardsLink = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($awardsLink)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $awardsLink)) {
                $awardsLink = str_replace('*', '%', $awardsLink);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TeamsTableMap::COL_AWARDS_LINK, $awardsLink, $comparison);
    }

    /**
     * Filter the query on the aim column
     *
     * Example usage:
     * <code>
     * $query->filterByAim('fooValue');   // WHERE aim = 'fooValue'
     * $query->filterByAim('%fooValue%'); // WHERE aim LIKE '%fooValue%'
     * </code>
     *
     * @param     string $aim The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTeamsQuery The current query, for fluid interface
     */
    public function filterByAim($aim = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($aim)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $aim)) {
                $aim = str_replace('*', '%', $aim);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TeamsTableMap::COL_AIM, $aim, $comparison);
    }

    /**
     * Filter the query on the yahoo column
     *
     * Example usage:
     * <code>
     * $query->filterByYahoo('fooValue');   // WHERE yahoo = 'fooValue'
     * $query->filterByYahoo('%fooValue%'); // WHERE yahoo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $yahoo The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTeamsQuery The current query, for fluid interface
     */
    public function filterByYahoo($yahoo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($yahoo)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $yahoo)) {
                $yahoo = str_replace('*', '%', $yahoo);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TeamsTableMap::COL_YAHOO, $yahoo, $comparison);
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
     * @return $this|ChildTeamsQuery The current query, for fluid interface
     */
    public function filterByCreateTs($createTs = null, $comparison = null)
    {
        if (is_array($createTs)) {
            $useMinMax = false;
            if (isset($createTs['min'])) {
                $this->addUsingAlias(TeamsTableMap::COL_CREATE_TS, $createTs['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createTs['max'])) {
                $this->addUsingAlias(TeamsTableMap::COL_CREATE_TS, $createTs['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TeamsTableMap::COL_CREATE_TS, $createTs, $comparison);
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
     * @return $this|ChildTeamsQuery The current query, for fluid interface
     */
    public function filterByMaintTs($maintTs = null, $comparison = null)
    {
        if (is_array($maintTs)) {
            $useMinMax = false;
            if (isset($maintTs['min'])) {
                $this->addUsingAlias(TeamsTableMap::COL_MAINT_TS, $maintTs['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($maintTs['max'])) {
                $this->addUsingAlias(TeamsTableMap::COL_MAINT_TS, $maintTs['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TeamsTableMap::COL_MAINT_TS, $maintTs, $comparison);
    }

    /**
     * Filter the query by a related \DivisionRef object
     *
     * @param \DivisionRef|ObjectCollection $divisionRef The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildTeamsQuery The current query, for fluid interface
     */
    public function filterByDivisionRef($divisionRef, $comparison = null)
    {
        if ($divisionRef instanceof \DivisionRef) {
            return $this
                ->addUsingAlias(TeamsTableMap::COL_DIVISION, $divisionRef->getDivision(), $comparison);
        } elseif ($divisionRef instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TeamsTableMap::COL_DIVISION, $divisionRef->toKeyValue('PrimaryKey', 'Division'), $comparison);
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
     * @return $this|ChildTeamsQuery The current query, for fluid interface
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
     * Filter the query by a related \LeagueRef object
     *
     * @param \LeagueRef|ObjectCollection $leagueRef The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildTeamsQuery The current query, for fluid interface
     */
    public function filterByLeagueRef($leagueRef, $comparison = null)
    {
        if ($leagueRef instanceof \LeagueRef) {
            return $this
                ->addUsingAlias(TeamsTableMap::COL_LEAGUE, $leagueRef->getLeague(), $comparison);
        } elseif ($leagueRef instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TeamsTableMap::COL_LEAGUE, $leagueRef->toKeyValue('PrimaryKey', 'League'), $comparison);
        } else {
            throw new PropelException('filterByLeagueRef() only accepts arguments of type \LeagueRef or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the LeagueRef relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildTeamsQuery The current query, for fluid interface
     */
    public function joinLeagueRef($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('LeagueRef');

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
            $this->addJoinObject($join, 'LeagueRef');
        }

        return $this;
    }

    /**
     * Use the LeagueRef relation LeagueRef object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \LeagueRefQuery A secondary query class using the current class as primary query
     */
    public function useLeagueRefQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinLeagueRef($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'LeagueRef', '\LeagueRefQuery');
    }

    /**
     * Filter the query by a related \Players object
     *
     * @param \Players|ObjectCollection $players the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildTeamsQuery The current query, for fluid interface
     */
    public function filterByPlayers($players, $comparison = null)
    {
        if ($players instanceof \Players) {
            return $this
                ->addUsingAlias(TeamsTableMap::COL_TEAM_ABBREV, $players->getMwbl(), $comparison);
        } elseif ($players instanceof ObjectCollection) {
            return $this
                ->usePlayersQuery()
                ->filterByPrimaryKeys($players->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPlayers() only accepts arguments of type \Players or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Players relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildTeamsQuery The current query, for fluid interface
     */
    public function joinPlayers($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Players');

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
            $this->addJoinObject($join, 'Players');
        }

        return $this;
    }

    /**
     * Use the Players relation Players object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \PlayersQuery A secondary query class using the current class as primary query
     */
    public function usePlayersQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPlayers($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Players', '\PlayersQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildTeams $teams Object to remove from the list of results
     *
     * @return $this|ChildTeamsQuery The current query, for fluid interface
     */
    public function prune($teams = null)
    {
        if ($teams) {
            $this->addUsingAlias(TeamsTableMap::COL_ID, $teams->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the Teams table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TeamsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TeamsTableMap::clearInstancePool();
            TeamsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(TeamsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(TeamsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            TeamsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            TeamsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // TeamsQuery
