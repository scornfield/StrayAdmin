<?php

namespace Base;

use \PlayersOld as ChildPlayersOld;
use \PlayersOldQuery as ChildPlayersOldQuery;
use \Exception;
use \PDO;
use Map\PlayersOldTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'players_old' table.
 *
 *
 *
 * @method     ChildPlayersOldQuery orderById($order = Criteria::ASC) Order by the ID column
 * @method     ChildPlayersOldQuery orderByLastn($order = Criteria::ASC) Order by the lastn column
 * @method     ChildPlayersOldQuery orderByBats($order = Criteria::ASC) Order by the bats column
 * @method     ChildPlayersOldQuery orderByBday($order = Criteria::ASC) Order by the bday column
 * @method     ChildPlayersOldQuery orderByAge($order = Criteria::ASC) Order by the age column
 * @method     ChildPlayersOldQuery orderByMlb($order = Criteria::ASC) Order by the mlb column
 * @method     ChildPlayersOldQuery orderByDraftYear($order = Criteria::ASC) Order by the draft_year column
 * @method     ChildPlayersOldQuery orderByPosition($order = Criteria::ASC) Order by the position column
 * @method     ChildPlayersOldQuery orderByCard($order = Criteria::ASC) Order by the card column
 * @method     ChildPlayersOldQuery orderByDE($order = Criteria::ASC) Order by the d_e column
 * @method     ChildPlayersOldQuery orderByLg($order = Criteria::ASC) Order by the lg column
 * @method     ChildPlayersOldQuery orderByMwbl($order = Criteria::ASC) Order by the mwbl column
 * @method     ChildPlayersOldQuery orderByCategory($order = Criteria::ASC) Order by the category column
 * @method     ChildPlayersOldQuery orderByComment($order = Criteria::ASC) Order by the comment column
 * @method     ChildPlayersOldQuery orderByMwblLink($order = Criteria::ASC) Order by the mwbl_link column
 * @method     ChildPlayersOldQuery orderByMlbLink($order = Criteria::ASC) Order by the mlb_link column
 * @method     ChildPlayersOldQuery orderByMwblLinkEnabled($order = Criteria::ASC) Order by the mwbl_link_enabled column
 * @method     ChildPlayersOldQuery orderByMlbLinkEnabled($order = Criteria::ASC) Order by the mlb_link_enabled column
 *
 * @method     ChildPlayersOldQuery groupById() Group by the ID column
 * @method     ChildPlayersOldQuery groupByLastn() Group by the lastn column
 * @method     ChildPlayersOldQuery groupByBats() Group by the bats column
 * @method     ChildPlayersOldQuery groupByBday() Group by the bday column
 * @method     ChildPlayersOldQuery groupByAge() Group by the age column
 * @method     ChildPlayersOldQuery groupByMlb() Group by the mlb column
 * @method     ChildPlayersOldQuery groupByDraftYear() Group by the draft_year column
 * @method     ChildPlayersOldQuery groupByPosition() Group by the position column
 * @method     ChildPlayersOldQuery groupByCard() Group by the card column
 * @method     ChildPlayersOldQuery groupByDE() Group by the d_e column
 * @method     ChildPlayersOldQuery groupByLg() Group by the lg column
 * @method     ChildPlayersOldQuery groupByMwbl() Group by the mwbl column
 * @method     ChildPlayersOldQuery groupByCategory() Group by the category column
 * @method     ChildPlayersOldQuery groupByComment() Group by the comment column
 * @method     ChildPlayersOldQuery groupByMwblLink() Group by the mwbl_link column
 * @method     ChildPlayersOldQuery groupByMlbLink() Group by the mlb_link column
 * @method     ChildPlayersOldQuery groupByMwblLinkEnabled() Group by the mwbl_link_enabled column
 * @method     ChildPlayersOldQuery groupByMlbLinkEnabled() Group by the mlb_link_enabled column
 *
 * @method     ChildPlayersOldQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPlayersOldQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPlayersOldQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPlayersOldQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildPlayersOldQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildPlayersOldQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildPlayersOld findOne(ConnectionInterface $con = null) Return the first ChildPlayersOld matching the query
 * @method     ChildPlayersOld findOneOrCreate(ConnectionInterface $con = null) Return the first ChildPlayersOld matching the query, or a new ChildPlayersOld object populated from the query conditions when no match is found
 *
 * @method     ChildPlayersOld findOneById(int $ID) Return the first ChildPlayersOld filtered by the ID column
 * @method     ChildPlayersOld findOneByLastn(string $lastn) Return the first ChildPlayersOld filtered by the lastn column
 * @method     ChildPlayersOld findOneByBats(string $bats) Return the first ChildPlayersOld filtered by the bats column
 * @method     ChildPlayersOld findOneByBday(string $bday) Return the first ChildPlayersOld filtered by the bday column
 * @method     ChildPlayersOld findOneByAge(int $age) Return the first ChildPlayersOld filtered by the age column
 * @method     ChildPlayersOld findOneByMlb(string $mlb) Return the first ChildPlayersOld filtered by the mlb column
 * @method     ChildPlayersOld findOneByDraftYear(string $draft_year) Return the first ChildPlayersOld filtered by the draft_year column
 * @method     ChildPlayersOld findOneByPosition(string $position) Return the first ChildPlayersOld filtered by the position column
 * @method     ChildPlayersOld findOneByCard(int $card) Return the first ChildPlayersOld filtered by the card column
 * @method     ChildPlayersOld findOneByDE(string $d_e) Return the first ChildPlayersOld filtered by the d_e column
 * @method     ChildPlayersOld findOneByLg(string $lg) Return the first ChildPlayersOld filtered by the lg column
 * @method     ChildPlayersOld findOneByMwbl(string $mwbl) Return the first ChildPlayersOld filtered by the mwbl column
 * @method     ChildPlayersOld findOneByCategory(string $category) Return the first ChildPlayersOld filtered by the category column
 * @method     ChildPlayersOld findOneByComment(string $comment) Return the first ChildPlayersOld filtered by the comment column
 * @method     ChildPlayersOld findOneByMwblLink(string $mwbl_link) Return the first ChildPlayersOld filtered by the mwbl_link column
 * @method     ChildPlayersOld findOneByMlbLink(string $mlb_link) Return the first ChildPlayersOld filtered by the mlb_link column
 * @method     ChildPlayersOld findOneByMwblLinkEnabled(int $mwbl_link_enabled) Return the first ChildPlayersOld filtered by the mwbl_link_enabled column
 * @method     ChildPlayersOld findOneByMlbLinkEnabled(int $mlb_link_enabled) Return the first ChildPlayersOld filtered by the mlb_link_enabled column *

 * @method     ChildPlayersOld requirePk($key, ConnectionInterface $con = null) Return the ChildPlayersOld by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPlayersOld requireOne(ConnectionInterface $con = null) Return the first ChildPlayersOld matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPlayersOld requireOneById(int $ID) Return the first ChildPlayersOld filtered by the ID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPlayersOld requireOneByLastn(string $lastn) Return the first ChildPlayersOld filtered by the lastn column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPlayersOld requireOneByBats(string $bats) Return the first ChildPlayersOld filtered by the bats column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPlayersOld requireOneByBday(string $bday) Return the first ChildPlayersOld filtered by the bday column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPlayersOld requireOneByAge(int $age) Return the first ChildPlayersOld filtered by the age column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPlayersOld requireOneByMlb(string $mlb) Return the first ChildPlayersOld filtered by the mlb column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPlayersOld requireOneByDraftYear(string $draft_year) Return the first ChildPlayersOld filtered by the draft_year column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPlayersOld requireOneByPosition(string $position) Return the first ChildPlayersOld filtered by the position column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPlayersOld requireOneByCard(int $card) Return the first ChildPlayersOld filtered by the card column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPlayersOld requireOneByDE(string $d_e) Return the first ChildPlayersOld filtered by the d_e column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPlayersOld requireOneByLg(string $lg) Return the first ChildPlayersOld filtered by the lg column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPlayersOld requireOneByMwbl(string $mwbl) Return the first ChildPlayersOld filtered by the mwbl column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPlayersOld requireOneByCategory(string $category) Return the first ChildPlayersOld filtered by the category column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPlayersOld requireOneByComment(string $comment) Return the first ChildPlayersOld filtered by the comment column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPlayersOld requireOneByMwblLink(string $mwbl_link) Return the first ChildPlayersOld filtered by the mwbl_link column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPlayersOld requireOneByMlbLink(string $mlb_link) Return the first ChildPlayersOld filtered by the mlb_link column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPlayersOld requireOneByMwblLinkEnabled(int $mwbl_link_enabled) Return the first ChildPlayersOld filtered by the mwbl_link_enabled column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPlayersOld requireOneByMlbLinkEnabled(int $mlb_link_enabled) Return the first ChildPlayersOld filtered by the mlb_link_enabled column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPlayersOld[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildPlayersOld objects based on current ModelCriteria
 * @method     ChildPlayersOld[]|ObjectCollection findById(int $ID) Return ChildPlayersOld objects filtered by the ID column
 * @method     ChildPlayersOld[]|ObjectCollection findByLastn(string $lastn) Return ChildPlayersOld objects filtered by the lastn column
 * @method     ChildPlayersOld[]|ObjectCollection findByBats(string $bats) Return ChildPlayersOld objects filtered by the bats column
 * @method     ChildPlayersOld[]|ObjectCollection findByBday(string $bday) Return ChildPlayersOld objects filtered by the bday column
 * @method     ChildPlayersOld[]|ObjectCollection findByAge(int $age) Return ChildPlayersOld objects filtered by the age column
 * @method     ChildPlayersOld[]|ObjectCollection findByMlb(string $mlb) Return ChildPlayersOld objects filtered by the mlb column
 * @method     ChildPlayersOld[]|ObjectCollection findByDraftYear(string $draft_year) Return ChildPlayersOld objects filtered by the draft_year column
 * @method     ChildPlayersOld[]|ObjectCollection findByPosition(string $position) Return ChildPlayersOld objects filtered by the position column
 * @method     ChildPlayersOld[]|ObjectCollection findByCard(int $card) Return ChildPlayersOld objects filtered by the card column
 * @method     ChildPlayersOld[]|ObjectCollection findByDE(string $d_e) Return ChildPlayersOld objects filtered by the d_e column
 * @method     ChildPlayersOld[]|ObjectCollection findByLg(string $lg) Return ChildPlayersOld objects filtered by the lg column
 * @method     ChildPlayersOld[]|ObjectCollection findByMwbl(string $mwbl) Return ChildPlayersOld objects filtered by the mwbl column
 * @method     ChildPlayersOld[]|ObjectCollection findByCategory(string $category) Return ChildPlayersOld objects filtered by the category column
 * @method     ChildPlayersOld[]|ObjectCollection findByComment(string $comment) Return ChildPlayersOld objects filtered by the comment column
 * @method     ChildPlayersOld[]|ObjectCollection findByMwblLink(string $mwbl_link) Return ChildPlayersOld objects filtered by the mwbl_link column
 * @method     ChildPlayersOld[]|ObjectCollection findByMlbLink(string $mlb_link) Return ChildPlayersOld objects filtered by the mlb_link column
 * @method     ChildPlayersOld[]|ObjectCollection findByMwblLinkEnabled(int $mwbl_link_enabled) Return ChildPlayersOld objects filtered by the mwbl_link_enabled column
 * @method     ChildPlayersOld[]|ObjectCollection findByMlbLinkEnabled(int $mlb_link_enabled) Return ChildPlayersOld objects filtered by the mlb_link_enabled column
 * @method     ChildPlayersOld[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class PlayersOldQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\PlayersOldQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\PlayersOld', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildPlayersOldQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildPlayersOldQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildPlayersOldQuery) {
            return $criteria;
        }
        $query = new ChildPlayersOldQuery();
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
     * @return ChildPlayersOld|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PlayersOldTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(PlayersOldTableMap::DATABASE_NAME);
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
     * @return ChildPlayersOld A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT ID, lastn, bats, bday, age, mlb, draft_year, position, card, d_e, lg, mwbl, category, comment, mwbl_link, mlb_link, mwbl_link_enabled, mlb_link_enabled FROM players_old WHERE ID = :p0';
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
            /** @var ChildPlayersOld $obj */
            $obj = new ChildPlayersOld();
            $obj->hydrate($row);
            PlayersOldTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildPlayersOld|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildPlayersOldQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PlayersOldTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildPlayersOldQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PlayersOldTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildPlayersOldQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(PlayersOldTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(PlayersOldTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PlayersOldTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildPlayersOldQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PlayersOldTableMap::COL_LASTN, $lastn, $comparison);
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
     * @return $this|ChildPlayersOldQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PlayersOldTableMap::COL_BATS, $bats, $comparison);
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
     * @return $this|ChildPlayersOldQuery The current query, for fluid interface
     */
    public function filterByBday($bday = null, $comparison = null)
    {
        if (is_array($bday)) {
            $useMinMax = false;
            if (isset($bday['min'])) {
                $this->addUsingAlias(PlayersOldTableMap::COL_BDAY, $bday['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bday['max'])) {
                $this->addUsingAlias(PlayersOldTableMap::COL_BDAY, $bday['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PlayersOldTableMap::COL_BDAY, $bday, $comparison);
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
     * @return $this|ChildPlayersOldQuery The current query, for fluid interface
     */
    public function filterByAge($age = null, $comparison = null)
    {
        if (is_array($age)) {
            $useMinMax = false;
            if (isset($age['min'])) {
                $this->addUsingAlias(PlayersOldTableMap::COL_AGE, $age['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($age['max'])) {
                $this->addUsingAlias(PlayersOldTableMap::COL_AGE, $age['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PlayersOldTableMap::COL_AGE, $age, $comparison);
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
     * @return $this|ChildPlayersOldQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PlayersOldTableMap::COL_MLB, $mlb, $comparison);
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
     * @return $this|ChildPlayersOldQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PlayersOldTableMap::COL_DRAFT_YEAR, $draftYear, $comparison);
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
     * @return $this|ChildPlayersOldQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PlayersOldTableMap::COL_POSITION, $position, $comparison);
    }

    /**
     * Filter the query on the card column
     *
     * Example usage:
     * <code>
     * $query->filterByCard(1234); // WHERE card = 1234
     * $query->filterByCard(array(12, 34)); // WHERE card IN (12, 34)
     * $query->filterByCard(array('min' => 12)); // WHERE card > 12
     * </code>
     *
     * @param     mixed $card The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPlayersOldQuery The current query, for fluid interface
     */
    public function filterByCard($card = null, $comparison = null)
    {
        if (is_array($card)) {
            $useMinMax = false;
            if (isset($card['min'])) {
                $this->addUsingAlias(PlayersOldTableMap::COL_CARD, $card['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($card['max'])) {
                $this->addUsingAlias(PlayersOldTableMap::COL_CARD, $card['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PlayersOldTableMap::COL_CARD, $card, $comparison);
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
     * @return $this|ChildPlayersOldQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PlayersOldTableMap::COL_D_E, $dE, $comparison);
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
     * @return $this|ChildPlayersOldQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PlayersOldTableMap::COL_LG, $lg, $comparison);
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
     * @return $this|ChildPlayersOldQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PlayersOldTableMap::COL_MWBL, $mwbl, $comparison);
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
     * @return $this|ChildPlayersOldQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PlayersOldTableMap::COL_CATEGORY, $category, $comparison);
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
     * @return $this|ChildPlayersOldQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PlayersOldTableMap::COL_COMMENT, $comment, $comparison);
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
     * @return $this|ChildPlayersOldQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PlayersOldTableMap::COL_MWBL_LINK, $mwblLink, $comparison);
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
     * @return $this|ChildPlayersOldQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PlayersOldTableMap::COL_MLB_LINK, $mlbLink, $comparison);
    }

    /**
     * Filter the query on the mwbl_link_enabled column
     *
     * Example usage:
     * <code>
     * $query->filterByMwblLinkEnabled(1234); // WHERE mwbl_link_enabled = 1234
     * $query->filterByMwblLinkEnabled(array(12, 34)); // WHERE mwbl_link_enabled IN (12, 34)
     * $query->filterByMwblLinkEnabled(array('min' => 12)); // WHERE mwbl_link_enabled > 12
     * </code>
     *
     * @param     mixed $mwblLinkEnabled The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPlayersOldQuery The current query, for fluid interface
     */
    public function filterByMwblLinkEnabled($mwblLinkEnabled = null, $comparison = null)
    {
        if (is_array($mwblLinkEnabled)) {
            $useMinMax = false;
            if (isset($mwblLinkEnabled['min'])) {
                $this->addUsingAlias(PlayersOldTableMap::COL_MWBL_LINK_ENABLED, $mwblLinkEnabled['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mwblLinkEnabled['max'])) {
                $this->addUsingAlias(PlayersOldTableMap::COL_MWBL_LINK_ENABLED, $mwblLinkEnabled['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PlayersOldTableMap::COL_MWBL_LINK_ENABLED, $mwblLinkEnabled, $comparison);
    }

    /**
     * Filter the query on the mlb_link_enabled column
     *
     * Example usage:
     * <code>
     * $query->filterByMlbLinkEnabled(1234); // WHERE mlb_link_enabled = 1234
     * $query->filterByMlbLinkEnabled(array(12, 34)); // WHERE mlb_link_enabled IN (12, 34)
     * $query->filterByMlbLinkEnabled(array('min' => 12)); // WHERE mlb_link_enabled > 12
     * </code>
     *
     * @param     mixed $mlbLinkEnabled The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPlayersOldQuery The current query, for fluid interface
     */
    public function filterByMlbLinkEnabled($mlbLinkEnabled = null, $comparison = null)
    {
        if (is_array($mlbLinkEnabled)) {
            $useMinMax = false;
            if (isset($mlbLinkEnabled['min'])) {
                $this->addUsingAlias(PlayersOldTableMap::COL_MLB_LINK_ENABLED, $mlbLinkEnabled['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mlbLinkEnabled['max'])) {
                $this->addUsingAlias(PlayersOldTableMap::COL_MLB_LINK_ENABLED, $mlbLinkEnabled['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PlayersOldTableMap::COL_MLB_LINK_ENABLED, $mlbLinkEnabled, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildPlayersOld $playersOld Object to remove from the list of results
     *
     * @return $this|ChildPlayersOldQuery The current query, for fluid interface
     */
    public function prune($playersOld = null)
    {
        if ($playersOld) {
            $this->addUsingAlias(PlayersOldTableMap::COL_ID, $playersOld->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the players_old table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PlayersOldTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PlayersOldTableMap::clearInstancePool();
            PlayersOldTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(PlayersOldTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(PlayersOldTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            PlayersOldTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            PlayersOldTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // PlayersOldQuery
