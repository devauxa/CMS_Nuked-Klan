<?php
/**
 * index.php
 *
 * Frontend of Vote module
 *
 * @version     1.8
 * @link http://www.nuked-klan.org Clan Management System for Gamers
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 * @copyright 2001-2015 Nuked-Klan (Registred Trademark)
 */
defined('INDEX_CHECK') or die('You can\'t run this file alone.');

translate('modules/Vote/lang/'. $language .'.lang.php');

function vote_index($module, $vid) {
    global $user, $nuked, $visiteur;

    $level_access = nivo_mod('Vote');

    echo '<b>' . _NOTE . ' :</b>&nbsp;';

    $sql = mysql_query("SELECT id, ip, vote FROM " . VOTE_TABLE . " WHERE vid = '" . $vid . "' AND module = '" . mysql_real_escape_string(stripslashes($module)) . "'");
    $count = mysql_num_rows($sql);

    $total = 0;
    $n = 0;
    if ($count > 0) {
        while (list($id, $ip, $vote) = mysql_fetch_array($sql)) {
            $total = $total + $vote / $count;
            $pourcent_arrondi = ceil($total);
        }
        $note = $pourcent_arrondi;

        for ($i = 2;$i <= $note;$i += 2) {
            echo '<img style="border: 0;" src="modules/Vote/images/z1.png" alt="" title="' . $note . '/10 (' . $count . '&nbsp;' . _VOTES . ')" />';
            $n++;
        }

        if (($note - $i) != -2) {
            echo '<img style="border: 0;" src="modules/Vote/images/z2.png" alt="" title="' . $note . '/10 (' . $count . '&nbsp;' . _VOTES . ')" />';
            $n++;
        }

        for ($z = $n;$z < 5;$z++) {
            echo '<img style="border: 0;" src="modules/Vote/images/z3.png" alt="" title="' . $note . '/10 (' . $count . '&nbsp;' . _VOTES . ')" />';
        }
    } else {
        echo _NOTEVAL;
    }

    if ($visiteur >= $level_access && $level_access > -1) {
        echo '&nbsp;<small>[ <a href="#" onclick="javascript:window.open(\'index.php?file=Vote&amp;op=post_vote&amp;vid=' . $vid . '&amp;module=' . $module . '\',\'screen\',\'toolbar=0,location=0,directories=0,status=0,scrollbars=0,resizable=0,copyhistory=0,menuBar=0,width=350,height=150,top=30,left=0\');return(false)">' . _RATE . '</a> ]</small>'."\n";
    }
}

function post_vote($module, $vid) {
    global $user, $visiteur, $user_ip;

    $author = ($user) ? $user[2] : _VISITOR;

    nkTemplate_setPageDesign('nudePage');
    nkTemplate_setTitle(_VOTEFROM .'&nbsp;'. $author);

    $level_access = nivo_mod('Vote');

    if ($visiteur >= $level_access) {
        $sql = mysql_query("SELECT ip FROM " . VOTE_TABLE . " WHERE vid = '" . $vid . "' AND module = '" . mysql_real_escape_string(stripslashes($module)) . "' AND ip = '" . $user_ip . "'");
        $count = mysql_num_rows($sql);

        if ($count > 0) {
            echo "<div style=\"text-align: center;\"><br /><br /><br />" . _ALREADYVOTE . "<br /><br /><br />\n"
               . "<a href=\"#\" onclick=\"javascript:window.close()\"><b>" . _CLOSEWINDOWS . "</b></a></div>";
        } else {
            echo "<form method=\"post\" action=\"index.php?file=Vote&amp;op=do_vote\">\n"
               . "<div style=\"text-align: center;\"><br /><br />" . _ONEVOTEONLY . "<br /><br /><b>" . _NOTE . " : </b>"
               . "<select name=\"vote\"><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option>"
               . "<option>6</option><option>7</option><option>8</option><option>9</option><option>10</option></select>"
               . "&nbsp;<b>/10</b><br /><br /><input type=\"hidden\" name=\"vid\" value=\"" . $vid . "\" />\n"
               . "<input type=\"hidden\" name=\"module\" value=\"" . $module . "\" />\n"
               . "<input type=\"submit\" name=\"Submit\" value=\"" . _TOVOTE . "\" /></div></form>";
        }
    } else {
        echo "<div style=\"text-align: center;\"><br /><br /><br />" . _NOENTRANCE . "<br /><br /><br />\n"
           . "<a href=\"#\" onclick=\"javascript:window.close()\"><b>" . _CLOSEWINDOW . "</b></a></div>";
    }

}

function do_vote($vid, $module, $vote) {
    global $user, $visiteur, $user_ip;

    $author = ($user) ? $user[2] : _VISITOR;

    nkTemplate_setPageDesign('nudePage');
    nkTemplate_setTitle(_VOTEFROM .'&nbsp;'. $author);

    $level_access = nivo_mod('Vote');
    $module = mysql_real_escape_string(stripslashes($module));

    if ($visiteur >= $level_access && is_numeric($vote) && $vote<=10 && $vote>=0) {
        if ($user) {
            $author = $user[2];
        } else {
            $author =  _VISITOR;
        }

        $sql = mysql_query("SELECT ip FROM " . VOTE_TABLE . " WHERE vid = '" . $vid . "' AND module = '" . $module . "' AND ip = '" . $user_ip . "'");
        $count = mysql_num_rows($sql);

        if ($count > 0) {
            echo "<div style=\"text-align: center;\"><br /><br /><br />"  . _ALREADYVOTE .  "<br /><br /><br />\n"
               . "<a href=\"#\" onclick=\"javascript:window.close();\"><b>" . _CLOSEWINDOWS . "</b></a></b></div>";
        } else {
            $sql = mysql_query("INSERT INTO " . VOTE_TABLE . " ( `id` , `module` , `vid` , `ip` , `vote` ) VALUES ( '' , '" . $module . "' , '" . $vid . "' , '" . $user_ip . "' , '" . $vote . "' )");

            echo "<div style=\"text-align: center;\"><br /><br /><br />" . _VOTEADD . "<br /><br /><br />\n"
               . "<a href=\"#\" onclick=\"javascript:window.close();window.opener.document.location.reload(true);\"><b>" . _CLOSEWINDOWS . "</b></a></b></div>";
        }
    } else {
        echo "<div style=\"text-align: center;\"><br /><br /><br />" . _NOENTRANCE . "<br /><br /><br />\n"
        . "<a href=\"#\" onclick=\"javascript:window.close()\"><b>" . _CLOSEWINDOW . "</b></a></div>";
    }
}

switch ($_REQUEST['op']) {
    case 'vote_index':
        vote_index($_REQUEST['module'], $_REQUEST['vid']);
        break;

    case 'post_vote':
        post_vote($_REQUEST['module'], $_REQUEST['vid']);
        break;

    case 'do_vote':
        do_vote($_REQUEST['vid'], $_REQUEST['module'], $_REQUEST['vote']);
        break;

    default:
        break;
}

?>