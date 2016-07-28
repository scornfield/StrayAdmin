<?php

namespace Base;

use \LeagueRef as ChildLeagueRef;
use \LeagueRefQuery as ChildLeagueRefQuery;
use \Exception;
use \PDO;
use Map\LeagueRefTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'league_ref' table.
 *
 *
 *
 * @method     ChildLeagueRefQuery orderByLeague($order = Criteria::ASC) Order by the league column
 *
 * @method     ChildLeagueRefQuery groupByLeague() Group by the league column
 *
 * @method     ChildLeagueRefQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildLeagueRefQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildLeagueRefQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildLeagueRefQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildLeagueRefQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildLeagueRefQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildLeagueRefQuery leftJoinTeams($relationAlias = null) Adds a LEFT JOIN clause to the query using the Teams relation
 * @method     ChildLeagueRefQuery rightJoinTeams($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Teams relation
 * @method     ChildLeagueRefQuery innerJoinTeams($relationAlias = null) Adds a INNER JOIN clause to the query using the Teams relation
 *
 * @method     ChildLeagueRefQuery joinWithTeams($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Teams relation
 *
 * @method     ChildLeagueRefQuery leftJoinWithTeams() Adds a LEFT JOIN clause and with to the query using the Teams relation
 * @method     ChildLeagueRefQuery rightJoinWithTeams() Adds a RIGHT JOIN clause and with to the query using the Teams relation
 * @method     ChildLeagueRefQuery innerJoinWithTeams() Adds a INNER JOIN clause and with to the query using the Teams relation
 *
 * @method     \TeamsQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildLeagueRef findOne(ConnectionInterface $con = null) Return the first ChildLeagueRef matching the query
 * @method     ChildLeagueRef findOneOrCreate(ConnectionInterface $con = null) Return the first ChildLeagueRef matching the query, or a new ChildLeagueRef object populated from the query conditions when no match is found
 *
 * @method     ChildLeagueRef findOneByLeague(string $league) Return the first ChildLeagueRef filtered by the league column *

 * @method     ChildLeagueRef requirePk($key, ConnectionInterface $con = null) Return the ChildLeagueRef by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLeagueRef requireOne(ConnectionInterface $con = null) Return the first ChildLeagueRef matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildLeagueRef requireOneByLeague(string $league) Return the first ChildLeagueRef filtered by the league column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildLeagueRef[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildLeagueRef objects based on current ModelCriteria
 * @method     ChildLeagueRef[]|ObjectCollection findByLeague(string $league) Return ChildLeagueRef objects filtered by the league column
 * @method     ChildLeagueRef[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class LeagueRefQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\LeagueRefQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\LeagueRef', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildLeagueRefQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildLeagueRefQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildLeagueRefQuery) {
            return $criteria;
        }
        $query = new ChildLeagueRefQuery();
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
     * @return ChildLeagueRef|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = LeagueRefTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(LeagueRefTableMap::DATABASE_NAME);
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
     * @return ChildLeagueRef A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT league FROM league_ref WHERE league = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildLeagueRef $obj */
            $obj = new ChildLeagueRef();
            $obj->hydrate($row);
            LeagueRefTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildLeagueRef|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildLeagueRefQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(LeagueRefTableMap::COL_LEAGUE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildLeagueRefQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(LeagueRefTableMap::COL_LEAGUE, $keys, Criteria::IN);
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
     * @return $this|ChildLeagueRefQuery The current query, for fluid interface
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

        return $this->addUsingAlias(LeagueRefTableMap::COL_LEAGUE, $league, $comparison);
    }

    /**
     * Filter the query by a related \Teams object
     *
     * @param \Teams|ObjectCollection $teams the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildLeagueRefQuery The current query, for fluid interface
     */
    public function filterByTeams($teams, $comparison = null)
    {
        if ($teams instanceof \Teams) {
            return $this
                ->addUsingAlias(LeagueRefTableMap::COL_LEAGUE, $teams->getLeague(), $comparison);
        } elseif ($teams instanceof ObjectCollection) {
            return $this
                ->useTeamsQuery()
                ->filterByPrimaryKeys($teams->getPrimaryKeys())
                ->endUse();
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
     * @return $this|ChildLeagueRefQuery The current query, for fluid interface
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
     * @param   ChildLeagueRef $leagueRef Object to remove from the list of results
     *
     * @return $this|ChildLeagueRefQuery The current query, for fluid interface
     */
    public function prune($leagueRef = null)
    {
        if ($leagueRef) {
            $this->addUsingAlias(LeagueRefTableMap::COL_LEAGUE, $leagueRef->getLeague(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the league_ref table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(LeagueRefTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            LeagueRefTableMap::clearInstancePool();
            LeagueRefTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(LeagueRefTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(LeagueRefTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            LeagueRefTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            LeagueRefTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // LeagueRefQuery
