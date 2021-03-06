<?php
/**
 * Copyright (C) 2009-2012  Peter Lind
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/gpl.html>.
 *
 * PHP version 5.3+
 *
 * @category  Infosys
 * @package   Framework
 * @author    Peter Lind <peter.e.lind@gmail.com>
 * @copyright 2009-2012 Peter Lind
 * @license   http://www.gnu.org/licenses/gpl.html GPL 3
 * @link      http://www.github.com/Fake51/Infosys
 */

/**
 * app class - setups up everything and sandboxes it
 *
 * @category Infosys
 * @package  Framework
 * @author   Peter Lind <peter.e.lind@gmail.com>
 * @license  http://www.gnu.org/licenses/gpl.html GPL 3
 * @link     http://www.github.com/Fake51/Infosys
 */
class MySqlTester implements DbTester
{
    /**
     * tests if the given settings provide a working
     * db connection
     *
     * @param Config $config Config object with db settings to test
     *
     * @access public
     * @return string
     */
    public function testConfig(Config $config)
    {
        try {
            $db = new Db($config);

            if (!$config->get('db.database')) {
                throw new Exception('No database name');
            }

            return '';

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * returns array of default config for the db type
     *
     * @access public
     * @return array
     */
    public function getDefaultConfig()
    {
    }

    /**
     * returns the selectable value for the db type
     *
     * @access public
     * @return string
     */
    public function getTypeValue()
    {
        return 'mysql';
    }

    /**
     * returns the name of the db type
     *
     * @access public
     * @return string
     */
    public function getTypeName()
    {
        return 'MySql';
    }

    /**
     * returns array of arrays with field information for setup form
     *
     * @access public
     * @return array
     */
    public function getConfigFields()
    {
        return [
                [
                 'description' => 'Host',
                 'config-name' => 'db.host',
                 'required'    => true,
                 'default'     => 'localhost',
                ],
                [
                 'description' => 'Port',
                 'config-name' => 'db.port',
                 'required'    => true,
                 'default'     => '3306',
                ],
                [
                 'description' => 'User',
                 'config-name' => 'db.user',
                 'required'    => true,
                 'default'     => '',
                ],
                [
                 'description' => 'Password',
                 'config-name' => 'db.password',
                 'required'    => false,
                 'default'     => '',
                ],
                [
                 'description' => 'Database name',
                 'config-name' => 'db.database',
                 'required'    => true,
                 'default'     => '',
                ],
                /*
                [
                 'description' => 'Table prefix',
                 'config-name' => 'db.prefix',
                 'required'    => false,
                 'default'     => '',
                ],
                */
               ];
    }
}
