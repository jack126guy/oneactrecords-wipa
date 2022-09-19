# Technical Information

## Database Schema

The `schema.sql` file contains a SQL script for creating the database, geared toward MySQL. There are two "variables" that should be replaced in the script:

* `%prefix%`: The table prefix, which is used to support multiple installations of One Act Records in a single database. This *must* match the prefix used for the main data for One Act Records (which may be an empty string).
* `%collation%`: The default collation for text fields. This should match the collation used for the main data for One Act Records. (For MySQL, this should be one that starts with `utf8mb4_`, such as `utf8mb4_unicode_ci` or the newer `utf8mb4_unicode_520_ci`.)