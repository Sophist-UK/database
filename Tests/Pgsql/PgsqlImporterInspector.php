<?php
/**
 * @copyright  Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Joomla\Database\Tests\Pgsql;

/**
 * Class to expose protected properties and methods in \Joomla\Database\Pgsql\PgsqlImporter for testing purposes
 *
 * @since  1.0
 */
class PgsqlImporterInspector extends \Joomla\Database\Pgsql\PgsqlImporter
{
	/**
	 * Gets any property from the class.
	 *
	 * @param   string  $property  The name of the class property.
	 *
	 * @return  mixed   The value of the class property.
	 *
	 * @since   1.0
	 */
	public function __get($property)
	{
		return $this->$property;
	}

	/**
	 * Exposes the protected check method.
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	public function check()
	{
		return parent::check();
	}

	/**
	 * Exposes the protected getAddColumnSQL method.
	 *
	 * @param   string            $table  The table name.
	 * @param   SimpleXMLElement  $field  The XML field definition.
	 *
	 * @return  string
	 *
	 * @since   1.0
	 */
	public function getAddColumnSql($table, \SimpleXMLElement $field)
	{
		return parent::getAddColumnSql($table, $field);
	}

	/**
	 * Exposes the protected getAddKeySQL method.
	 *
	 * @param   SimpleXMLElement  $field  The XML index definition.
	 *
	 * @return  string
	 *
	 * @since   1.0
	 */
	public function getAddIndexSql(\SimpleXMLElement $field)
	{
		return parent::getAddIndexSql($field);
	}

	/**
	 * Exposes the protected getAddSequenceSQL method.
	 *
	 * @param   SimpleXMLElement  $structure  The XML sequence definition.
	 *
	 * @return  string
	 *
	 * @since   1.0
	 */
	public function getAddSequenceSql(\SimpleXMLElement $structure)
	{
		return parent::getAddSequenceSql($structure);
	}

	/**
	 * Exposes the protected getAlterTableSQL method.
	 *
	 * @param   SimpleXMLElement  $structure  The XML structure of the table.
	 *
	 * @return  array
	 *
	 * @since   1.0
	 */
	public function getAlterTableSql(\SimpleXMLElement $structure)
	{
		return parent::getAlterTableSql($structure);
	}

	/**
	 * Exposes the protected getChangeColumnSQL method.
	 *
	 * @param   string            $table  The table name.
	 * @param   SimpleXMLElement  $field  The XML field definition.
	 *
	 * @return  string
	 *
	 * @since   1.0
	 */
	public function getChangeColumnSql($table, \SimpleXMLElement $field)
	{
		return parent::getChangeColumnSql($table, $field);
	}

	/**
	 * Exposes the protected getColumnSQL method.
	 *
	 * @param   SimpleXMLElement  $field  The XML field definition.
	 *
	 * @return  string
	 *
	 * @since   1.0
	 */
	public function getColumnSql(\SimpleXMLElement $field)
	{
		return parent::getColumnSql($field);
	}

	/**
	 * Exposes the protected getChangeSequenceSQL method.
	 *
	 * @param   SimpleXMLElement  $structure  The XML sequence definition.
	 *
	 * @return  string
	 *
	 * @since   1.0
	 */
	public function getChangeSequenceSql(\SimpleXMLElement $structure)
	{
		return parent::getChangeSequenceSql($structure);
	}

	/**
	 * Exposes the protected getDropColumnSQL method.
	 *
	 * @param   string  $table  The table name.
	 * @param   string  $name   The name of the field to drop.
	 *
	 * @return  string
	 *
	 * @since   1.0
	 */
	public function getDropColumnSql($table, $name)
	{
		return parent::getDropColumnSql($table, $name);
	}

	/**
	 * Exposes the protected getDropKeySQL method.
	 *
	 * @param   string  $table  The table name.
	 * @param   string  $name   The name of the key to drop.
	 *
	 * @return  string
	 *
	 * @since   1.0
	 */
	public function getDropKeySql($table, $name)
	{
		return parent::getDropKeySql($table, $name);
	}

	/**
	 * Exposes the protected getDropPrimaryKeySQL method.
	 *
	 * @param   string  $table  The table name.
	 * @param   string  $name   The constraint name.
	 *
	 * @return  string
	 *
	 * @since   1.0
	 */
	public function getDropPrimaryKeySql($table, $name)
	{
		return parent::getDropPrimaryKeySql($table, $name);
	}

	/**
	 * Exposes the protected getDropIndexSQL method.
	 *
	 * @param   string  $name  The index name.
	 *
	 * @return  string
	 *
	 * @since   1.0
	 */
	public function getDropIndexSql($name)
	{
		return parent::getDropIndexSql($name);
	}

	/**
	 * Exposes the protected getDropSequenceSQL method.
	 *
	 * @param   string  $name  The index name.
	 *
	 * @return  string
	 *
	 * @since   1.0
	 */
	public function getDropSequenceSql($name)
	{
		return parent::getDropSequenceSql($name);
	}

	/**
	 * Exposes the protected getKeyLookup method.
	 *
	 * @param   array  $keys  An array of objects that comprise the indexes for the table.
	 *
	 * @return  array	The lookup array. array({key name} => array(object, ...))
	 *
	 * @since   1.0
	 * @throws	Exception
	 */
	public function getKeyLookup($keys)
	{
		return parent::getKeyLookup($keys);
	}

	/**
	 * Exposes the protected getSeqLookup method.
	 *
	 * @param   array  $sequences  An array of objects that comprise the sequences for the table.
	 *
	 * @return  array	The lookup array. array({key name} => array(object, ...))
	 *
	 * @since   1.0
	 * @throws	Exception
	 */
	public function getSeqLookup($sequences)
	{
		return parent::getSeqLookup($sequences);
	}

	/**
	 * Exposes the protected getRealTableName method.
	 *
	 * @param   string  $table  The name of the table.
	 *
	 * @return  string	The real name of the table.
	 *
	 * @since   1.0
	 */
	public function getRealTableName($table)
	{
		return parent::getRealTableName($table);
	}

	/**
	 * Exposes the protected mergeStructure method.
	 *
	 * @return  void
	 *
	 * @since   1.0
	 * @throws  Exception on error.
	 */
	public function mergeStructure()
	{
		return parent::mergeStructure();
	}

	/**
	 * Exposes the protected withStructure method.
	 *
	 * @param   boolean  $setting  True to export the structure, false to not.
	 *
	 * @return  void
	 *
	 * @since	1.0
	 */
	public function withStructure($setting = true)
	{
		return parent::withStructure($setting);
	}
}
