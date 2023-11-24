
# DATABASE
A minimal PHP database helper for ease development.

## Method Description:

The `create` method is designed to execute a SQL query for creating a table with the specified name, columns, and optional additional options.

## Parameters:

- **$table (string):**
  The name of the table to be created.

- **$columns (array):**
  An array representing the columns definition for the new table.

- **$options (array|null):**
  Additional options for creating the table (optional).

## Return Value

- If the table creation is successful, the method returns a PDOStatement.
- If the table creation fails, the method returns null.

## Usage

### Example without additional options

```php
$result = create("your_table", [
    "column1" => "INT",
    "column2" => "VARCHAR(255)",
    "column3" => "TEXT"
]);
```

## Method Description:

The `query` method is designed to execute a raw SQL statement with optional parameter bindings.

### Parameters:

- **$statement (string):**
  The raw SQL statement.

- **$bindings (array):**
  The array of input parameters value for the prepared statement.

### Return Value:

If the execution is successful, the method returns a `\PDOStatement`. If the execution fails, the method returns `null`.

### Exceptions:

- Throws `\PDOException` if there is an error in the PDO operation.

### Usage:

```php
// without parameter bindings
$result = query("SELECT * FROM your_table");

// with parameter bindings
$result = query("SELECT * FROM your_table WHERE column = ?", ["value"]);
```

## Method Description:

The **`select`** method is designed to execute a SELECT query on a specified table, offering flexibility through various parameter combinations.

## Parameters:

- **$table (string):**
  The name of the table to query.

- **$columns (array):**
  An array of columns to be selected.

- **$where (array):**
  An associative array representing the WHERE conditions for the query.

- **$callback (callable|null):**
  A callback function that can be applied to each row of the result set (optional).

## Return Value:

- If no callback is provided:
  - The method returns an array containing the selected rows.

- If a callback is provided:
  - The method returns null.

## Usage:

```php
// without callback
$result = select("your_table", ["column1", "column2"], ["column3" => "value"]);

// with callback
select("your_table", ["column1", "column2"], ["column3" => "value"], function ($row) {
    // custom processing for each row
});

```

## Method Description:

The **`insert`** method facilitates the insertion of one or more records into a specified table.

## Parameters:

- **$table (string):**
  The name of the table to insert records into.

- **$values (array):**
  An associative array representing the values to be inserted, where keys are column names.

- **$primaryKey (string|null):**
  The primary key column name (optional).

## Return Value:

- The PDOStatement object on success.

- Null on failure.

## Usage Example:

```php
// insert 
$inserted = insert("your_table", ["column1" => "value1", "column2" => "value2"]);

// with specified primary key
$inserted = insert("your_table", ["column1" => "value1", "column2" => "value2"], "id");

```

## Method Description:

The **`update`** method is employed to modify records in a specified table based on the provided conditions.

## Parameters:

- **$table (string):**
  The name of the table to update records in.

- **$values (array):**
  An associative array representing the new values to be set.

- **$where (array):**
  An associative array representing the WHERE conditions for the update.

## Return Value:

- The PDOStatement object on success.

- Null on failure.

## Usage Example:

```php
// update 
$updated = update("your_table", ["column1" => "new_value"], ["column2" => "value2"]);

// with specified condition
$updated = update("your_table", ["column1" => "new_value"], ["column2" => "value2", "column3" => "value3"]);

```

## Method Description:

The **`delete`** method is utilized to remove records from a specified table based on the provided conditions.

## Parameters:

- **$table (string):**
  The name of the table to delete records from.

- **$where (array):**
  An associative array representing the WHERE conditions for the delete.

## Return Value:

- The PDOStatement object on success.

- Null on failure.

## Usage Example:

```php
// delete 
$deleted = delete("your_table", ["column1" => "value1"]);

// with specified condition
$deleted = delete("your_table", ["column2" => "value2", "column3" => "value3"]);

```

## Method Description:

The **`get`** method is designed to execute a SELECT query and retrieve a single result, which can be either a single row or a single column value.

## Parameters:

- **$table (string):**
  The name of the table to query.

- **$columns (array|string):**
  An array or string representing the columns to be selected.

- **$where (array):**
  An associative array representing the WHERE conditions for the query.

## Return Value:

- The result of the SELECT query, which can be a single row or a single column value.

## Usage Example:

```php
// retrieving a single row
$resultRow = get("your_table", ["column1", "column2"], ["column3" => "value"]);

// retrieving a single column value
$singleValue = get("your_table", "column1", ["column2" => "value2"]);

```

## Method Description:

The **`has`** method is employed to determine if records exist in a table based on the provided conditions.

## Parameters:

- **$table (string):**
  The name of the table to query.

- **$where (array):**
  An associative array representing the WHERE conditions for the query.

## Return Value:

- `true` if records exist based on the conditions.

- `false` otherwise.

## Usage Example:

```php
// checking if records exist
$hasRecords = has("your_table", ["column1" => "value1"]);

// checking with multiple conditions
$hasRecords = has("your_table", ["column2" => "value2", "column3" => "value3"]);

```
# Creation of new instance of Database

```php
$database = new Database([
    'type' => 'mysql',
    'host' => 'localhost',
    'database' => 'db_name',
    'username' => 'db_username',
    'password' => 'db_password'
]);

```