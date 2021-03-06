<?php
/**
 * @copyright  Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Joomla\Database\Tests\Cases;

use Joomla\Database\DatabaseDriver;
use Joomla\Database\Sqlsrv\SqlsrvDriver;

/**
 * Abstract test case class for Microsoft SQL Server database testing.
 */
abstract class SqlsrvCase extends AbstractDatabaseTestCase
{
	/**
	 * The database driver options for the connection.
	 *
	 * @var  array
	 */
	protected static $options = ['driver' => 'sqlsrv'];

	/**
	 * This method is called before the first test of this test class is run.
	 *
	 * An example DSN would be: host=localhost;port=5432;dbname=joomla_ut;user=utuser;pass=ut1234
	 *
	 * @return  void
	 */
	public static function setUpBeforeClass()
	{
		// First let's look to see if we have a DSN defined or in the environment variables.
		if (!defined('JTEST_DATABASE_SQLSRV_DSN') && !getenv('JTEST_DATABASE_SQLSRV_DSN'))
		{
			return;
		}

		// Make sure the driver is supported
		if (!SqlsrvDriver::isSupported())
		{
			static::markTestSkipped('The SQL Server driver is not supported on this platform.');
		}

		$dsn = defined('JTEST_DATABASE_SQLSRV_DSN') ? JTEST_DATABASE_SQLSRV_DSN : getenv('JTEST_DATABASE_SQLSRV_DSN');

		// First let's trim the sqlsrv: part off the front of the DSN if it exists.
		if (strpos($dsn, 'sqlsrv:') === 0)
		{
			$dsn = substr($dsn, 7);
		}

		// Split the DSN into its parts over semicolons.
		$parts = explode(';', $dsn);

		// Parse each part and populate the options array.
		foreach ($parts as $part)
		{
			list ($k, $v) = explode('=', $part, 2);

			switch ($k)
			{
				case 'host':
					static::$options['host'] = $v;
					break;
				case 'dbname':
					static::$options['database'] = $v;
					break;
				case 'user':
					static::$options['user'] = $v;
					break;
				case 'pass':
					static::$options['password'] = $v;
					break;
			}
		}

		try
		{
			// Attempt to instantiate the driver.
			static::$driver = DatabaseDriver::getInstance(static::$options);
		}
		catch (\RuntimeException $e)
		{
			static::$driver = null;
		}

		// If for some reason an exception object was returned set our database object to null.
		if (static::$driver instanceof \Exception)
		{
			static::$driver = null;
		}
	}

	/**
	 * Returns the default database connection for running the tests.
	 *
	 * @return  \PHPUnit_Extensions_Database_DB_DefaultDatabaseConnection
	 */
	protected function getConnection()
	{
		// Compile the connection DSN.
		$dsn = 'sqlsrv:Server=' . static::$options['host'] . ';Database=' . static::$options['database'];

		// Create the PDO object from the DSN and options.
		$pdo = new \PDO($dsn, static::$options['user'], static::$options['password']);
		$pdo->exec('create table [dbtest]([id] [int] IDENTITY(1,1) NOT NULL, [title] [nvarchar](50) NOT NULL, [start_date] [datetime] NOT NULL, [description] [nvarchar](max) NOT NULL, CONSTRAINT [PK_jos_dbtest_id] PRIMARY KEY CLUSTERED ([id] ASC) WITH (STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF))');

		return $this->createDefaultDBConnection($pdo, static::$options['database']);
	}
}
