<?php

namespace Base;

use \TeamsOld as ChildTeamsOld;
use \TeamsOldQuery as ChildTeamsOldQuery;
use \Exception;
use Map\TeamsOldTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'Teams_old' table.
 *
 *
 *
 * @method     ChildTeamsOldQuery orderById($order = Criteria::ASC) Order by the ID column
 * @method     ChildTeamsOldQuery orderByLink($order = Criteria::ASC) Order by the link column
 * @method     ChildTeamsOldQuery orderByOwner($order = Criteria::ASC) Order by the Owner column
 * @method     ChildTeamsOldQuery orderByName($order = Criteria::ASC) Order by the Name column
 * @method     ChildTeamsOldQuery orderByNickname($order = Criteria::ASC) Order by the nickname column
 * @method     ChildTeamsOldQuery orderByTeamAbbrev($order = Criteria::ASC) Order by the Team_Abbrev column
 * @method     ChildTeamsOldQuery orderByDivision($order = Criteria::ASC) Order by the Division column
 * @method     ChildTeamsOldQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildTeamsOldQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildTeamsOldQuery orderByComment($order = Criteria::ASC) Order by the comment column
 * @method     ChildTeamsOldQuery orderByLeague($order = Criteria::ASC) Order by the league column
 * @method     ChildTeamsOldQuery orderByUsed($order = Criteria::ASC) Order by the used column
 * @method     ChildTeamsOldQuery orderByEmail2($order = Criteria::ASC) Order by the email2 column
 * @method     ChildTeamsOldQuery orderByAddress($order = Criteria::ASC) Order by the address column
 * @method     ChildTeamsOldQuery orderByCity($order = Criteria::ASC) Order by the city column
 * @method     ChildTeamsOldQuery orderByState($order = Criteria::ASC) Order by the state column
 * @method     ChildTeamsOldQuery orderByZip($order = Criteria::ASC) Order by the zip column
 * @method     ChildTeamsOldQuery orderByPhone($order = Criteria::ASC) Order by the phone column
 * @method     ChildTeamsOldQuery orderByTeamLink($order = Criteria::ASC) Order by the team_link column
 * @method     ChildTeamsOldQuery orderByTradeLink($order = Criteria::ASC) Order by the trade_link column
 * @method     ChildTeamsOldQuery orderByDraftLink($order = Criteria::ASC) Order by the draft_link column
 * @method     ChildTeamsOldQuery orderByAwardsLink($order = Criteria::ASC) Order by the awards_link column
 * @method     ChildTeamsOldQuery orderByAim($order = Criteria::ASC) Order by the aim column
 * @method     ChildTeamsOldQuery orderByYahoo($order = Criteria::ASC) Order by the yahoo column
 *
 * @method     ChildTeamsOldQuery groupById() Group by the ID column
 * @method     ChildTeamsOldQuery groupByLink() Group by the link column
 * @method     ChildTeamsOldQuery groupByOwner() Group by the Owner column
 * @method     ChildTeamsOldQuery groupByName() Group by the Name column
 * @method     ChildTeamsOldQuery groupByNickname() Group by the nickname column
 * @method     ChildTeamsOldQuery groupByTeamAbbrev() Group by the Team_Abbrev column
 * @method     ChildTeamsOldQuery groupByDivision() Group by the Division column
 * @method     ChildTeamsOldQuery groupByEmail() Group by the email column
 * @method     ChildTeamsOldQuery groupByStatus() Group by the status column
 * @method     ChildTeamsOldQuery groupByComment() Group by the comment column
 * @method     ChildTeamsOldQuery groupByLeague() Group by the league column
 * @method     ChildTeamsOldQuery groupByUsed() Group by the used column
 * @method     ChildTeamsOldQuery groupByEmail2() Group by the email2 column
 * @method     ChildTeamsOldQuery groupByAddress() Group by the address column
 * @method     ChildTeamsOldQuery groupByCity() Group by the city column
 * @method     ChildTeamsOldQuery groupByState() Group by the state column
 * @method     ChildTeamsOldQuery groupByZip() Group by the zip column
 * @method     ChildTeamsOldQuery groupByPhone() Group by the phone column
 * @method     ChildTeamsOldQuery groupByTeamLink() Group by the team_link column
 * @method     ChildTeamsOldQuery groupByTradeLink() Group by the trade_link column
 * @method     ChildTeamsOldQuery groupByDraftLink() Group by the draft_link column
 * @method     ChildTeamsOldQuery groupByAwardsLink() Group by the awards_link column
 * @method     ChildTeamsOldQuery groupByAim() Group by the aim column
 * @method     ChildTeamsOldQuery groupByYahoo() Group by the yahoo column
 *
 * @method     ChildTeamsOldQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTeamsOldQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTeamsOldQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTeamsOldQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildTeamsOldQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildTeamsOldQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildTeamsOld findOne(ConnectionInterface $con = null) Return the first ChildTeamsOld matching the query
 * @method     ChildTeamsOld findOneOrCreate(ConnectionInterface $con = null) Return the first ChildTeamsOld matching the query, or a new ChildTeamsOld object populated from the query conditions when no match is found
 *
 * @method     ChildTeamsOld findOneById(int $ID) Return the first ChildTeamsOld filtered by the ID column
 * @method     ChildTeamsOld findOneByLink(string $link) Return the first ChildTeamsOld filtered by the link column
 * @method     ChildTeamsOld findOneByOwner(string $Owner) Return the first ChildTeamsOld filtered by the Owner column
 * @method     ChildTeamsOld findOneByName(string $Name) Return the first ChildTeamsOld filtered by the Name column
 * @method     ChildTeamsOld findOneByNickname(string $nickname) Return the first ChildTeamsOld filtered by the nickname column
 * @method     ChildTeamsOld findOneByTeamAbbrev(string $Team_Abbrev) Return the first ChildTeamsOld filtered by the Team_Abbrev column
 * @method     ChildTeamsOld findOneByDivision(string $Division) Return the first ChildTeamsOld filtered by the Division column
 * @method     ChildTeamsOld findOneByEmail(string $email) Return the first ChildTeamsOld filtered by the email column
 * @method     ChildTeamsOld findOneByStatus(string $status) Return the first ChildTeamsOld filtered by the status column
 * @method     ChildTeamsOld findOneByComment(string $comment) Return the first ChildTeamsOld filtered by the comment column
 * @method     ChildTeamsOld findOneByLeague(string $league) Return the first ChildTeamsOld filtered by the league column
 * @method     ChildTeamsOld findOneByUsed(string $used) Return the first ChildTeamsOld filtered by the used column
 * @method     ChildTeamsOld findOneByEmail2(string $email2) Return the first ChildTeamsOld filtered by the email2 column
 * @method     ChildTeamsOld findOneByAddress(string $address) Return the first ChildTeamsOld filtered by the address column
 * @method     ChildTeamsOld findOneByCity(string $city) Return the first ChildTeamsOld filtered by the city column
 * @method     ChildTeamsOld findOneByState(string $state) Return the first ChildTeamsOld filtered by the state column
 * @method     ChildTeamsOld findOneByZip(string $zip) Return the first ChildTeamsOld filtered by the zip column
 * @method     ChildTeamsOld findOneByPhone(string $phone) Return the first ChildTeamsOld filtered by the phone column
 * @method     ChildTeamsOld findOneByTeamLink(string $team_link) Return the first ChildTeamsOld filtered by the team_link column
 * @method     ChildTeamsOld findOneByTradeLink(string $trade_link) Return the first ChildTeamsOld filtered by the trade_link column
 * @method     ChildTeamsOld findOneByDraftLink(string $draft_link) Return the first ChildTeamsOld filtered by the draft_link column
 * @method     ChildTeamsOld findOneByAwardsLink(string $awards_link) Return the first ChildTeamsOld filtered by the awards_link column
 * @method     ChildTeamsOld findOneByAim(string $aim) Return the first ChildTeamsOld filtered by the aim column
 * @method     ChildTeamsOld findOneByYahoo(string $yahoo) Return the first ChildTeamsOld filtered by the yahoo column *

 * @method     ChildTeamsOld requirePk($key, ConnectionInterface $con = null) Return the ChildTeamsOld by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTeamsOld requireOne(ConnectionInterface $con = null) Return the first ChildTeamsOld matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTeamsOld requireOneById(int $ID) Return the first ChildTeamsOld filtered by the ID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTeamsOld requireOneByLink(string $link) Return the first ChildTeamsOld filtered by the link column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTeamsOld requireOneByOwner(string $Owner) Return the first ChildTeamsOld filtered by the Owner column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTeamsOld requireOneByName(string $Name) Return the first ChildTeamsOld filtered by the Name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTeamsOld requireOneByNickname(string $nickname) Return the first ChildTeamsOld filtered by the nickname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTeamsOld requireOneByTeamAbbrev(string $Team_Abbrev) Return the first ChildTeamsOld filtered by the Team_Abbrev column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTeamsOld requireOneByDivision(string $Division) Return the first ChildTeamsOld filtered by the Division column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTeamsOld requireOneByEmail(string $email) Return the first ChildTeamsOld filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTeamsOld requireOneByStatus(string $status) Return the first ChildTeamsOld filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTeamsOld requireOneByComment(string $comment) Return the first ChildTeamsOld filtered by the comment column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTeamsOld requireOneByLeague(string $league) Return the first ChildTeamsOld filtered by the league column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTeamsOld requireOneByUsed(string $used) Return the first ChildTeamsOld filtered by the used column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTeamsOld requireOneByEmail2(string $email2) Return the first ChildTeamsOld filtered by the email2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTeamsOld requireOneByAddress(string $address) Return the first ChildTeamsOld filtered by the address column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTeamsOld requireOneByCity(string $city) Return the first ChildTeamsOld filtered by the city column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTeamsOld requireOneByState(string $state) Return the first ChildTeamsOld filtered by the state column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTeamsOld requireOneByZip(string $zip) Return the first ChildTeamsOld filtered by the zip column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTeamsOld requireOneByPhone(string $phone) Return the first ChildTeamsOld filtered by the phone column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTeamsOld requireOneByTeamLink(string $team_link) Return the first ChildTeamsOld filtered by the team_link column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTeamsOld requireOneByTradeLink(string $trade_link) Return the first ChildTeamsOld filtered by the trade_link column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTeamsOld requireOneByDraftLink(string $draft_link) Return the first ChildTeamsOld filtered by the draft_link column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTeamsOld requireOneByAwardsLink(string $awards_link) Return the first ChildTeamsOld filtered by the awards_link column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTeamsOld requireOneByAim(string $aim) Return the first ChildTeamsOld filtered by the aim column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTeamsOld requireOneByYahoo(string $yahoo) Return the first ChildTeamsOld filtered by the yahoo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTeamsOld[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildTeamsOld objects based on current ModelCriteria
 * @method     ChildTeamsOld[]|ObjectCollection findById(int $ID) Return ChildTeamsOld objects filtered by the ID column
 * @method     ChildTeamsOld[]|ObjectCollection findByLink(string $link) Return ChildTeamsOld objects filtered by the link column
 * @method     ChildTeamsOld[]|ObjectCollection findByOwner(string $Owner) Return ChildTeamsOld objects filtered by the Owner column
 * @method     ChildTeamsOld[]|ObjectCollection findByName(string $Name) Return ChildTeamsOld objects filtered by the Name column
 * @method     ChildTeamsOld[]|ObjectCollection findByNickname(string $nickname) Return ChildTeamsOld objects filtered by the nickname column
 * @method     ChildTeamsOld[]|ObjectCollection findByTeamAbbrev(string $Team_Abbrev) Return ChildTeamsOld objects filtered by the Team_Abbrev column
 * @method     ChildTeamsOld[]|ObjectCollection findByDivision(string $Division) Return ChildTeamsOld objects filtered by the Division column
 * @method     ChildTeamsOld[]|ObjectCollection findByEmail(string $email) Return ChildTeamsOld objects filtered by the email column
 * @method     ChildTeamsOld[]|ObjectCollection findByStatus(string $status) Return ChildTeamsOld objects filtered by the status column
 * @method     ChildTeamsOld[]|ObjectCollection findByComment(string $comment) Return ChildTeamsOld objects filtered by the comment column
 * @method     ChildTeamsOld[]|ObjectCollection findByLeague(string $league) Return ChildTeamsOld objects filtered by the league column
 * @method     ChildTeamsOld[]|ObjectCollection findByUsed(string $used) Return ChildTeamsOld objects filtered by the used column
 * @method     ChildTeamsOld[]|ObjectCollection findByEmail2(string $email2) Return ChildTeamsOld objects filtered by the email2 column
 * @method     ChildTeamsOld[]|ObjectCollection findByAddress(string $address) Return ChildTeamsOld objects filtered by the address column
 * @method     ChildTeamsOld[]|ObjectCollection findByCity(string $city) Return ChildTeamsOld objects filtered by the city column
 * @method     ChildTeamsOld[]|ObjectCollection findByState(string $state) Return ChildTeamsOld objects filtered by the state column
 * @method     ChildTeamsOld[]|ObjectCollection findByZip(string $zip) Return ChildTeamsOld objects filtered by the zip column
 * @method     ChildTeamsOld[]|ObjectCollection findByPhone(string $phone) Return ChildTeamsOld objects filtered by the phone column
 * @method     ChildTeamsOld[]|ObjectCollection findByTeamLink(string $team_link) Return ChildTeamsOld objects filtered by the team_link column
 * @method     ChildTeamsOld[]|ObjectCollection findByTradeLink(string $trade_link) Return ChildTeamsOld objects filtered by the trade_link column
 * @method     ChildTeamsOld[]|ObjectCollection findByDraftLink(string $draft_link) Return ChildTeamsOld objects filtered by the draft_link column
 * @method     ChildTeamsOld[]|ObjectCollection findByAwardsLink(string $awards_link) Return ChildTeamsOld objects filtered by the awards_link column
 * @method     ChildTeamsOld[]|ObjectCollection findByAim(string $aim) Return ChildTeamsOld objects filtered by the aim column
 * @method     ChildTeamsOld[]|ObjectCollection findByYahoo(string $yahoo) Return ChildTeamsOld objects filtered by the yahoo column
 * @method     ChildTeamsOld[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class TeamsOldQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\TeamsOldQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\TeamsOld', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildTeamsOldQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildTeamsOldQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildTeamsOldQuery) {
            return $criteria;
        }
        $query = new ChildTeamsOldQuery();
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
     * @return ChildTeamsOld|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The TeamsOld object has no primary key');
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        throw new LogicException('The TeamsOld object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildTeamsOldQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The TeamsOld object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildTeamsOldQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The TeamsOld object has no primary key');
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
     * @return $this|ChildTeamsOldQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(TeamsOldTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(TeamsOldTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TeamsOldTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildTeamsOldQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TeamsOldTableMap::COL_LINK, $link, $comparison);
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
     * @return $this|ChildTeamsOldQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TeamsOldTableMap::COL_OWNER, $owner, $comparison);
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
     * @return $this|ChildTeamsOldQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TeamsOldTableMap::COL_NAME, $name, $comparison);
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
     * @return $this|ChildTeamsOldQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TeamsOldTableMap::COL_NICKNAME, $nickname, $comparison);
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
     * @return $this|ChildTeamsOldQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TeamsOldTableMap::COL_TEAM_ABBREV, $teamAbbrev, $comparison);
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
     * @return $this|ChildTeamsOldQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TeamsOldTableMap::COL_DIVISION, $division, $comparison);
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
     * @return $this|ChildTeamsOldQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TeamsOldTableMap::COL_EMAIL, $email, $comparison);
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
     * @return $this|ChildTeamsOldQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TeamsOldTableMap::COL_STATUS, $status, $comparison);
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
     * @return $this|ChildTeamsOldQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TeamsOldTableMap::COL_COMMENT, $comment, $comparison);
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
     * @return $this|ChildTeamsOldQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TeamsOldTableMap::COL_LEAGUE, $league, $comparison);
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
     * @return $this|ChildTeamsOldQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TeamsOldTableMap::COL_USED, $used, $comparison);
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
     * @return $this|ChildTeamsOldQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TeamsOldTableMap::COL_EMAIL2, $email2, $comparison);
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
     * @return $this|ChildTeamsOldQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TeamsOldTableMap::COL_ADDRESS, $address, $comparison);
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
     * @return $this|ChildTeamsOldQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TeamsOldTableMap::COL_CITY, $city, $comparison);
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
     * @return $this|ChildTeamsOldQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TeamsOldTableMap::COL_STATE, $state, $comparison);
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
     * @return $this|ChildTeamsOldQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TeamsOldTableMap::COL_ZIP, $zip, $comparison);
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
     * @return $this|ChildTeamsOldQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TeamsOldTableMap::COL_PHONE, $phone, $comparison);
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
     * @return $this|ChildTeamsOldQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TeamsOldTableMap::COL_TEAM_LINK, $teamLink, $comparison);
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
     * @return $this|ChildTeamsOldQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TeamsOldTableMap::COL_TRADE_LINK, $tradeLink, $comparison);
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
     * @return $this|ChildTeamsOldQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TeamsOldTableMap::COL_DRAFT_LINK, $draftLink, $comparison);
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
     * @return $this|ChildTeamsOldQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TeamsOldTableMap::COL_AWARDS_LINK, $awardsLink, $comparison);
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
     * @return $this|ChildTeamsOldQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TeamsOldTableMap::COL_AIM, $aim, $comparison);
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
     * @return $this|ChildTeamsOldQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TeamsOldTableMap::COL_YAHOO, $yahoo, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildTeamsOld $teamsOld Object to remove from the list of results
     *
     * @return $this|ChildTeamsOldQuery The current query, for fluid interface
     */
    public function prune($teamsOld = null)
    {
        if ($teamsOld) {
            throw new LogicException('TeamsOld object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the Teams_old table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TeamsOldTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TeamsOldTableMap::clearInstancePool();
            TeamsOldTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(TeamsOldTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(TeamsOldTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            TeamsOldTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            TeamsOldTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // TeamsOldQuery
