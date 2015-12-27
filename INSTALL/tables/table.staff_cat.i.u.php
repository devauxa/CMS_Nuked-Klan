<?php
/**
 * table.staff_cat.i.u.php
 *
 * `[PREFIX]_staff_cat` database table script
 *
 * @version 1.8
 * @link http://www.nuked-klan.org Clan Management System for Gamers
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 * @copyright 2001-2015 Nuked-Klan (Registred Trademark)
 */

$dbTable->setTable($this->_session['db_prefix'] .'_staff_cat');

///////////////////////////////////////////////////////////////////////////////////////////////////////////
// Convert charset and collation
///////////////////////////////////////////////////////////////////////////////////////////////////////////

if ($process == 'checkAndConvertCharsetAndCollation')
    $dbTable->checkAndConvertCharsetAndCollation();

///////////////////////////////////////////////////////////////////////////////////////////////////////////
// Table drop
///////////////////////////////////////////////////////////////////////////////////////////////////////////

if ($process == 'drop')
    $dbTable->dropTable();

///////////////////////////////////////////////////////////////////////////////////////////////////////////
// Table creation
///////////////////////////////////////////////////////////////////////////////////////////////////////////

// install / update 1.8
if ($process == 'install' || ($process == 'update' && ! $dbTable->tableExist())) {
    $sql = 'CREATE TABLE `'. $this->_session['db_prefix'] .'_staff_cat` (
        `id` int(11) NOT NULL auto_increment,
        `nom` varchar(255) NOT NULL default \'\',
        `img` varchar(255) NOT NULL default \'\',
        `coverage` varchar(255) NOT NULL default \'\',
        `ordre` int(5) NOT NULL default \'0\',
        `tag` text NOT NULL,
        `tag2` text NOT NULL,
        PRIMARY KEY  (`id`)
        ) ENGINE=MyISAM DEFAULT CHARSET='. db::CHARSET .' COLLATE='. db::COLLATION .';';

    $dbTable->createTable($sql);
}

?>