<?php
declare(strict_types=1);
namespace Minichan\Database;

interface IDatabase
{
     /**
     * Create a table.
     *
     * @param string $table
     * @param array $columns Columns definition.
     * @param array $options Additional table options for creating a table.
     * @return \PDOStatement|null
     */
    public function create(string $table, $columns, $options = null): ?\PDOStatement;

     /**
     * Execute a raw SQL statement with optional parameter bindings.
     *
     * @param string $statement The raw SQL statement.
     * @param array $bindings The array of input parameters value for prepared statement.
     * @return \PDOStatement|null
     * @throws \PDOException
     */
    public function query(string $statement, array $bindings = []): ?\PDOStatement;

    /**
     * Perform a SELECT query on the database.
     *
     * @param string $table
     * @param array $columns
     * @param array|callable|null $whereOrCallback
     * @param callable|null $callback
     * @return array|null
     */
    public function select(string $table, array $columns, $whereOrCallback = null, ?callable $callback = null): ?array;

    /**
     * Insert one or more records into the table.
     *
     * @param string $table
     * @param array $values
     * @param string $primaryKey
     * @return \PDOStatement|null
     */
    public function insert(string $table, array $values, string $primaryKey = null): ?\PDOStatement;

    /**
     * Modify data from the table.
     *
     * @param string $table
     * @param array $data
     * @param array $where
     * @return \PDOStatement|null
     */
    public function update(string $table, $data, $where = null): ?\PDOStatement;

    /**
     * Delete data from the table.
     *
     * @param string $table
     * @param array|Raw $where
     * @return \PDOStatement|null
     */
    public function delete(string $table, $where): ?\PDOStatement;

    /**
     * Perform a GET query on the database.
     *
     * @param string $table
     * @param array|string $columns
     * @param array $where
     * @return mixed
     */
    public function get(string $table, $columns, array $where);

    /**
     * Check if records exist in the database based on the provided conditions.
     *
     * @param string $table
     * @param array $where
     * @return bool
     */
    public function has(string $table, array $where): bool;

    /**
     * Retrieve a random record from the database based on the provided conditions.
     *
     * @param string $table
     * @param array|string $column
     * @param array $where
     * @return mixed
     */
    public function rand(string $table, $column, array $where);

    /**
     * Count the number of records in the database based on the provided conditions.
     *
     * @param string $table
     * @param array $where
     * @return int
     */
    public function count(string $table, array $where): ?int;

    /**
     * Retrieve the maximum value of a column from the database.
     *
     * @param string $table
     * @param string $column
     * @param array|null $where
     * @return string
     */
    public function max(string $table, string $column, ?array $where = null): ?string;

    /**
     * Retrieve the minimum value of a column from the database.
     *
     * @param string $table
     * @param string $column
     * @param array|null $where
     * @return string
     */
    public function min(string $table, string $column, ?array $where = null): ?string;

    /**
     * Retrieve the average value of a column from the database.
     *
     * @param string $table
     * @param string $column
     * @param array|null $where
     * @return string
     */
    public function avg(string $table, string $column, ?array $where = null): ?string;

    /**
     * Retrieve the sum of a column's values from the database.
     *
     * @param string $table
     * @param string $column
     * @param array|null $where
     * @return string
     */
    public function sum(string $table, string $column, ?array $where = null): ?string;
}
