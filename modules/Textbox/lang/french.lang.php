<?php
if (!defined("INDEX_CHECK"))
{
	exit('You can\'t run this file alone.');
}
// define("_NONICKNAME","Vous n\'avez pas entr� de pseudo !");
//Resctriction to logged users
define("_NONICKNAME","Identifiez vous pour pouvoir poster un message !");
// End
define("_NOTEXT","Vous n\'avez pas entr� de texte !");
define("_PSEUDOEXIST","Ce pseudo est d�j� r�serv� !");
define("_BANNEDNICK","Ce pseudo est banni");

define("_NICKNAME","Pseudo");
define("_YOURMESS","");
define("_REFRESH","Rafra�chir");
define("_SEEARCHIVES","Voir les archives");

define("_SHOUTSUCCES","Message envoy� avec succ�s.");
define("_NOFLOOD","Flood interdit ! veuillez patienter quelques instants...");
define("_NOMESS","Il n'y a pas encore de message");

define("_THEREIS","Il y a");
define("_SHOUTINDB","messages dans la base de donn�es");
define("_SMILEY","Ajouter un smilies");
define("_LISTSMILIES","Liste des smilies");


define("_ADMINSHOUTBOX","Administration Tribune Libre");

define("_IP","Adresse Ip");


define("_MODIF","Modifier");
define("_SHOUT","Message");
define("_DELETETEXT","Vous �tes sur le point de supprimer le message de");
define("_DELETEALLTEXT","Vous �tes sur le point de supprimer tous les messages, continuer ?");

define("_DELALLMESS","Supprimer tous les messages");
define("_DELTHISMESS","Supprimer ce message");
define("_EDITTHISMESS","Editer ce message");
define("_MESSDEL","Message effac� avec succ�s.");
define("_MESSEDIT","Message modifi� avec succ�s.");
define("_ALLMESSDEL","Tous les messages ont �t� effac�s.");
define("_NUMBERSHOUT","Nombre de messages par page");

define("_ACTIONMODIFSHO","a modifi� un message de la tribune libre");
define("_ACTIONDELSHO","a supprim� un message de la tribune libre");
define("_ACTIONALLDELSHO","a supprim� tous les messages de la tribune libre");
define("_ACTIONCONFSHO","a modifi� les pr�f�rences de la tribune libre");

define("_FRANCE", "France");
define("_BELGIUM", "Belgique");
define("_SPAIN", "Espagne");
define("_UNITED-KINGDOM", "Royaume-Uni");
define("_GREECE", "Gr&egrave;ce");
define("_TUNISIA", "Tunisie");
define("_MOROCCO", "Maroc");

define("_LOADINPLSWAIT", "Chargement en cours...");
define("_PLEASEWAITTXTBOX","Veuillez patienter...");
define("_THANKSFORPOST","Merci de votre participation !");
define("_LOADINGERRORS","Impossible de charger le block !");

define("_DISPLAY_AVATAR","Afficher l'avatar du posteur");
define("_NOTIF_INFOS_DISPLAY","Lorsque l'affichage de l'avatar est d&eacute;sactiv&eacute;, l'apparence de la textbox est celle d'un tchat basique, la date n'est pas affich&eacute;e. En revanche il est possible de connaitre la date du post en survolant le pseudo du posteur avec la souris.");
?>