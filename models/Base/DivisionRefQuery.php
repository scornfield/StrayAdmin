<?php

namespace Base;

use \DivisionRef as ChildDivisionRef;
use \DivisionRefQuery as ChildDivisionRefQuery;
use \Exception;
use \PDO;
use Map\DivisionRefTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'division_ref' table.
 *
 *
 *
 * @method     ChildDivisionRefQuery orderByDivision($order = Criteria::ASC) Order by the division column
 *
 * @method     ChildDivisionRefQuery groupByDivision() Group by the division column
 *
 * @method     ChildDivisionRefQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildDivisionRefQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildDivisionRefQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildDivisionRefQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildDivisionRefQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildDivisionRefQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildDivisionRefQuery leftJoinTeams($relationAlias = null) Adds a LEFT JOIN clause to the query using the Teams relation
 * @method     ChildDivisionRefQuery rightJoinTeams($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Teams relation
 * @method     ChildDivisionRefQuery innerJoinTeams($relationAlias = null) Adds a INNER JOIN clause to the query using the Teams relation
 *
 * @method     ChildDivisionRefQuery joinWithTeams($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Teams relation
 *
 * @method     ChildDivisionRefQuery leftJoinWithTeams() Adds a LEFT JOIN clause and with to the query using the Teams relation
 * @method     ChildDivisionRefQuery rightJoinWithTeams() Adds a RIGHT JOIN clause and with to the query using the Teams relation
 * @method     ChildDivisionRefQuery innerJoinWithTeams() Adds a INNER JOIN clause and with to the query using the Teams relation
 *
 * @method     ChildDivisionRefQuery leftJoinPlayers($relationAlias = null) Adds a LEFT JOIN clause to the query using the Players relation
 * @method     ChildDivisionRefQuery rightJoinPlayers($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Players relation
 * @method     ChildDivisionRefQuery innerJoinPlayers($relationAlias = null) Adds a INNER JOIN clause to the query using the Players relation
 *
 * @method     ChildDivisionRefQuery joinWithPlayers($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Players relation
 *
 * @method     ChildDivisionRefQuery leftJoinWithPlayers() Adds a LEFT JOIN clause and with to the query using the Players relation
 * @method     ChildDivisionRefQuery rightJoinWithPlayers() Adds a RIGHT JOIN clause and with to the query using the Players relation
 * @method     ChildDivisionRefQuery innerJoinWithPlayers() Adds a INNER JOIN clause and with to the query using the Players relation
 *
 * @method     \TeamsQuery|\PlayersQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildDivisionRef findOne(ConnectionInterface $con = null) Return the first ChildDivisionRef matching the query
 * @method     ChildDivisionRef findOneOrCreate(ConnectionInterface $con = null) Return the first ChildDivisionRef matching the query, or a new ChildDivisionRef object populated from the query conditions when no match is found
 *
 * @method     ChildDivisionRef findOneByDivision(string $division) Return the first ChildDivisionRef filtered by the division column *

 * @method     ChildDivisionRef requirePk($key, ConnectionInterface $con = null) Return the ChildDivisionRef by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDivisionRef requireOne(ConnectionInterface $con = null) Return the first ChildDivisionRef matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildDivisionRef requireOneByDivision(string $division) Return the first ChildDivisionRef filtered by the division column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildDivisionRef[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildDivisionRef objects based on current ModelCriteria
 * @method     ChildDivisionRef[]|ObjectCollection findByDivision(string $division) Return ChildDivisionRef objects filtered by the division column
 * @method     ChildDivisionRef[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class DivisionRefQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\DivisionRefQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\DivisionRef', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildDivisionRefQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildDivisionRefQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildDivisionRefQuery) {
            return $criteria;
        }
        $query = new ChildDivisionRefQuery();
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
     * @return ChildDivisionRef|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = DivisionRefTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(DivisionRefTableMap::DATABASE_NAME);
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
     * @return ChildDivisionRef A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT division FROM division_ref WHERE division = :p0';
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
            /** @var ChildDivisionRef $obj */
            $obj = new ChildDivisionRef();
            $obj->hydrate($row);
            DivisionRefTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildDivisionRef|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildDivisionRefQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(DivisionRefTableMap::COL_DIVISION, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildDivisionRefQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(DivisionRefTableMap::COL_DIVISION, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the division column
     *
     * Example usage:
     * <code>
     * $query->filterByDivision('fooValue');   // WHERE division = 'fooValue'
     * $query->filterByDivision('%fooValue%'); // WHERE division LIKE '%fooValue%'
     * </code>
     *
     * @param     string $division The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDivisionRefQuery The current query, for fluid interface
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

        return $this->addUsingAlias(DivisionRefTableMap::COL_DIVISION, $division, $comparison);
    }

    /**
     * Filter the query by a related \Teams object
     *
     * @param \Teams|ObjectCollection $teams the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildDivisionRefQuery The current query, for fluid interface
     */
    public function filterByTeams($teams, $comparison = null)
    {
        if ($teams instanceof \Teams) {
            return $this
                ->addUsingAlias(DivisionRefTableMap::COL_DIVISION, $teams->getDivision(), $comparison);
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
     * @return $this|ChildDivisionRefQuery The current query, for fluid interface
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
     * Filter the query by a related \Players object
     *
     * @param \Players|ObjectCollection $players the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildDivisionRefQuery The current query, for fluid interface
     */
    public function filterByPlayers($players, $comparison = null)
    {
        if ($players instanceof \Players) {
            return $this
                ->addUsingAlias(DivisionRefTableMap::COL_DIVISION, $players->getLg(), $comparison);
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
     * @return $this|ChildDivisionRefQuery The current query, for fluid interface
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
     * @param   ChildDivisionRef $divisionRef Object to remove from the list of results
     *
     * @return $this|ChildDivisionRefQuery The current query, for fluid interface
     */
    public function prune($divisionRef = null)
    {
        if ($divisionRef) {
            $this->addUsingAlias(DivisionRefTableMap::COL_DIVISION, $divisionRef->getDivision(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the division_ref table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(DivisionRefTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            DivisionRefTableMap::clearInstancePool();
            DivisionRefTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(DivisionRefTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(DivisionRefTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            DivisionRefTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            DivisionRefTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // DivisionRefQuery
