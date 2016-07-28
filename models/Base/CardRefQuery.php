<?php

namespace Base;

use \CardRef as ChildCardRef;
use \CardRefQuery as ChildCardRefQuery;
use \Exception;
use \PDO;
use Map\CardRefTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'card_ref' table.
 *
 *
 *
 * @method     ChildCardRefQuery orderByCard($order = Criteria::ASC) Order by the card column
 * @method     ChildCardRefQuery orderByMeaning($order = Criteria::ASC) Order by the meaning column
 *
 * @method     ChildCardRefQuery groupByCard() Group by the card column
 * @method     ChildCardRefQuery groupByMeaning() Group by the meaning column
 *
 * @method     ChildCardRefQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCardRefQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCardRefQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCardRefQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildCardRefQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildCardRefQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildCardRefQuery leftJoinPlayers($relationAlias = null) Adds a LEFT JOIN clause to the query using the Players relation
 * @method     ChildCardRefQuery rightJoinPlayers($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Players relation
 * @method     ChildCardRefQuery innerJoinPlayers($relationAlias = null) Adds a INNER JOIN clause to the query using the Players relation
 *
 * @method     ChildCardRefQuery joinWithPlayers($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Players relation
 *
 * @method     ChildCardRefQuery leftJoinWithPlayers() Adds a LEFT JOIN clause and with to the query using the Players relation
 * @method     ChildCardRefQuery rightJoinWithPlayers() Adds a RIGHT JOIN clause and with to the query using the Players relation
 * @method     ChildCardRefQuery innerJoinWithPlayers() Adds a INNER JOIN clause and with to the query using the Players relation
 *
 * @method     \PlayersQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildCardRef findOne(ConnectionInterface $con = null) Return the first ChildCardRef matching the query
 * @method     ChildCardRef findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCardRef matching the query, or a new ChildCardRef object populated from the query conditions when no match is found
 *
 * @method     ChildCardRef findOneByCard(boolean $card) Return the first ChildCardRef filtered by the card column
 * @method     ChildCardRef findOneByMeaning(string $meaning) Return the first ChildCardRef filtered by the meaning column *

 * @method     ChildCardRef requirePk($key, ConnectionInterface $con = null) Return the ChildCardRef by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCardRef requireOne(ConnectionInterface $con = null) Return the first ChildCardRef matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCardRef requireOneByCard(boolean $card) Return the first ChildCardRef filtered by the card column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCardRef requireOneByMeaning(string $meaning) Return the first ChildCardRef filtered by the meaning column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCardRef[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildCardRef objects based on current ModelCriteria
 * @method     ChildCardRef[]|ObjectCollection findByCard(boolean $card) Return ChildCardRef objects filtered by the card column
 * @method     ChildCardRef[]|ObjectCollection findByMeaning(string $meaning) Return ChildCardRef objects filtered by the meaning column
 * @method     ChildCardRef[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class CardRefQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\CardRefQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\CardRef', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCardRefQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCardRefQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildCardRefQuery) {
            return $criteria;
        }
        $query = new ChildCardRefQuery();
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
     * @return ChildCardRef|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = CardRefTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CardRefTableMap::DATABASE_NAME);
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
     * @return ChildCardRef A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT card, meaning FROM card_ref WHERE card = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', (int) $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildCardRef $obj */
            $obj = new ChildCardRef();
            $obj->hydrate($row);
            CardRefTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildCardRef|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildCardRefQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CardRefTableMap::COL_CARD, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildCardRefQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CardRefTableMap::COL_CARD, $keys, Criteria::IN);
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
     * @return $this|ChildCardRefQuery The current query, for fluid interface
     */
    public function filterByCard($card = null, $comparison = null)
    {
        if (is_string($card)) {
            $card = in_array(strtolower($card), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(CardRefTableMap::COL_CARD, $card, $comparison);
    }

    /**
     * Filter the query on the meaning column
     *
     * Example usage:
     * <code>
     * $query->filterByMeaning('fooValue');   // WHERE meaning = 'fooValue'
     * $query->filterByMeaning('%fooValue%'); // WHERE meaning LIKE '%fooValue%'
     * </code>
     *
     * @param     string $meaning The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCardRefQuery The current query, for fluid interface
     */
    public function filterByMeaning($meaning = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($meaning)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $meaning)) {
                $meaning = str_replace('*', '%', $meaning);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CardRefTableMap::COL_MEANING, $meaning, $comparison);
    }

    /**
     * Filter the query by a related \Players object
     *
     * @param \Players|ObjectCollection $players the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCardRefQuery The current query, for fluid interface
     */
    public function filterByPlayers($players, $comparison = null)
    {
        if ($players instanceof \Players) {
            return $this
                ->addUsingAlias(CardRefTableMap::COL_CARD, $players->getCard(), $comparison);
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
     * @return $this|ChildCardRefQuery The current query, for fluid interface
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
     * @param   ChildCardRef $cardRef Object to remove from the list of results
     *
     * @return $this|ChildCardRefQuery The current query, for fluid interface
     */
    public function prune($cardRef = null)
    {
        if ($cardRef) {
            $this->addUsingAlias(CardRefTableMap::COL_CARD, $cardRef->getCard(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the card_ref table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CardRefTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CardRefTableMap::clearInstancePool();
            CardRefTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(CardRefTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CardRefTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CardRefTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CardRefTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // CardRefQuery
