Introducing Laravel Debug To SQL
================================

The `toanld/laravel-debug-to-sql` package for Laravel is designed to help developers identify the origin of slow or erroneous queries in their Laravel applications. By displaying file information in the query output, it allows developers to pinpoint the exact location in the code where a query is being executed. This is particularly useful when analyzing MySQL slow query logs, as it provides a clear link between the log entry and the corresponding code.

Installation
------------

To install the package, use Composer:

bash

Copy code

`composer require toanld/laravel-debug-to-sql`

Usage
-----

Using the `DebugToSQL` trait in your Eloquent models will enable the package's functionality. Here’s a simple example to get you started:

php

Copy code

`namespace App;  use Illuminate\Database\Eloquent\Model; use Toanld\DebugToSql\DebugToSQL;  class Test extends Model {     use DebugToSQL; }`

How It Works
------------

Once the `DebugToSQL` trait is added to a model, every time a query is executed using that model, the file and line number from which the query originated will be included in the query output. This information is invaluable for debugging slow queries or tracking down the source of query errors.

### Benefits

*   **Enhanced Debugging**: Quickly locate the file and line number in your codebase where a problematic query is executed.
*   **Performance Monitoring**: Identify slow queries and their origins in your code, making it easier to optimize performance.
*   **Error Tracking**: Trace query errors back to the exact line in your code, simplifying the debugging process.

### Practical Example

Imagine you have a Laravel application and you notice some slow queries in your MySQL slow query log. By using this package, the log entries will now include information about the file and line number where each query is called. This makes it much easier to find and optimize the specific parts of your code responsible for the slow queries.

### Getting Started

1.  **Install the Package**: Use Composer to add the package to your Laravel project.
2.  **Add the Trait**: Include the `DebugToSQL` trait in your Eloquent models.
3.  **Monitor Queries**: Run your application and monitor the queries. The output will now include detailed file information for each query.

### Conclusion

The `toanld/laravel-debug-to-sql` package is a powerful tool for any Laravel developer looking to improve their application's performance and debugging capabilities. By providing clear and actionable insights into where queries are executed in your code, it makes the process of identifying and resolving issues much more efficient.

For more details and to download the package, visit the [Packagist page](https://packagist.org/packages/toanld/laravel-debug-to-sql).

* * *

Feel free to reach out if you have any questions or need further assistance with using this package. Happy coding!
