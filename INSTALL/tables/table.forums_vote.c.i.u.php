<?php
/**
 * table.forums_vote.c.i.u.php
 *
 * `[PREFIX]_forums_vote` database table script
 *
 * @version 1.8
 * @link http://www.nuked-klan.org Clan Management System for Gamers
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 * @copyright 2001-2015 Nuked-Klan (Registred Trademark)
 */

$dbTable->setTable($this->_session['db_prefix'] .'_forums_vote');

///////////////////////////////////////////////////////////////////////////////////////////////////////////
// Check table integrity
///////////////////////////////////////////////////////////////////////////////////////////////////////////

if ($process == 'checkIntegrity') {
    // table create in 1.7.x version
    $dbTable->checkIntegrity(array('auteur_id', 'author_id'), array('auteur_ip', 'author_ip'));
}

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

if ($process == 'install') {
    $sql = 'CREATE TABLE `'. $this->_session['db_prefix'] .'_forums_vote` (
            `poll_id` int(11) NOT NULL default \'0\',
            `author_id` varchar(20) NOT NULL default \'\',
            `author_ip` varchar(40) NOT NULL default \'\',
            KEY `poll_id` (`poll_id`)
        ) ENGINE=MyISAM DEFAULT CHARSET='. db::CHARSET .' COLLATE='. db::COLLATION .';';

    $dbTable->createTable($sql);
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////
// Table update
///////////////////////////////////////////////////////////////////////////////////////////////////////////

if ($process == 'update') {
    // install / update 1.7.14  => varchar(40)
    // install / update 1.8     => Rename to author_ip
    if ($dbTable->getFieldType('auteur_ip') != 'varchar(40)' || $dbTable->fieldExist('auteur_ip'))
        $dbTable->modifyField('auteur_ip', array('newField' => 'author_ip', 'type' => 'VARCHAR(40)', 'null' => false, 'default' => '\'\''));

    // install / update 1.8     => Rename to author_id
    if ($dbTable->fieldExist('auteur_id'))
        $dbTable->modifyField('auteur_id', array('newField' => 'author_id', 'type' => 'VARCHAR(20)', 'null' => false, 'default' => '\'\''));

    $dbTable->alterTable();
}

?>