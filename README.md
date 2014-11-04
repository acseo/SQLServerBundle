# ACSEO SQLServerBundle

----

This bundle provides datatype convertions for SQLServer with Doctrine ORM and RealState

## Installation

Add the bundle in your composer.json:

```json
{
    "require": {
        "acseo/sql-server-bundle": "dev-master"
    }
}
```

Now tell composer to download the bundle by running the command:

```bash
$ php composer.phar update acseo/sql-server-bundle
```
Composer will install the bundle to your project's ```vendor/ACSEO``` directory.


Enable the bundle in your project

```php
<?php 
//app/AppKernel.php
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
        //...
        new ACSEO\Bundle\SQLServerBundle\ACSEOSQLServerBundle(),
		//...
        );
//..
```

## Configuration
### In parameters.yml
```yml
driver_class: \ACSEO\Bundle\SQLServerBundle\Driver\SQLServerDriver
```
### In app/config/config.yml
Override Doctrine data type, define the class that will perform data type convertions

```yml
types:
    string: ACSEO\Bundle\SQLServerBundle\Type\StringType
    datetime: ACSEO\Bundle\SQLServerBundle\Type\DateTimeType
    text: ACSEO\Bundle\SQLServerBundle\Type\TextType
```
### In composer.json
Add post-install-cmd to add pdo_dblib line to Doctrine DBAL Driver Manager
```json
"post-install-cmd": [
            ...
            "ACSEO\\Bundle\\SQLServerBundle\\Composer\\ScriptHandler::updateDoctrineDriverManager",
            ...
        ],
```

## TODO

* write tests
* introduce parameters for encoding text convertion
* explore other data type convertions needed
