
# DATABASE
A minimal PHP database helper for ease development.
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

## Method Description:

The **`rand`** method executes a SELECT query and retrieves a random result, which can be a random value from a specific column.

## Parameters:

- **$table (string):**
  The name of the table to query.

- **$column (array|string):**
  An array or string representing the column to be selected for the random result.

- **$where (array):**
  An associative array representing the WHERE conditions for the query.

## Return Value:

- The random result of the SELECT query, which can be a single value.

## Usage Example:

```php
// retrieving a random value from a specific column
$randomValue = rand("your_table", "column1");

// with specified conditions
$randomValue = rand("your_table", "column2", ["column3" => "value3"]);

```

## Method Description:

The **`count`** method is used to determine the number of records in a table based on the provided conditions.

## Parameters:

- **$table (string):**
  The name of the table to query.

- **$where (array):**
  An associative array representing the WHERE conditions for the query.

## Return Value:

- The number of records that match the conditions.

## Usage Example:

```php
// counting records
$recordCount = count("your_table");

// with specified conditions
$filteredCount = count("your_table", ["column1" => "value1", "column2" => "value2"]);

```

## Method Descriptions:

### max Method

The **`max`** method calculates the maximum value for a specified column in the table based on the provided conditions.

### min Method

The **`min`** method calculates the minimum value for a specified column in the table based on the provided conditions.

### avg Method

The **`avg`** method calculates the average value for a specified column in the table based on the provided conditions.

### sum Method

The **`sum`** method calculates the sum of values for a specified column in the table based on the provided conditions.

## Parameters:

- **$table (string):**
  The name of the table to query.

- **$column (string):**
  The name of the column for which the aggregate value is calculated.

- **$where (array):**
  An associative array representing the WHERE conditions for the query.

## Return Value:

- The calculated aggregate value for the specified column (as a string).

## Usage Examples:

```php
// using max
$maxValue = max("your_table", "column1");

// using min
$minValue = min("your_table", "column2");

// using avg
$averageValue = avg("your_table", "column3", ["column4" => "value"]);

// using sum
$totalSum = sum("your_table", "column5", ["column6" => "value"]);

```
## Creation of new instance of Database
```php
$database = new Database([
    'type' => 'mysql',
    'host' => 'localhost',
    'database' => 'db_name',
    'username' => 'db_username',
    'password' => 'db_password'
]);

```