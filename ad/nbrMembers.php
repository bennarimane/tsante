<?php

$dsn = 'mysql:host=localhost;dbname=tsante2';
$dbuser = 'root';
$dbpass = '';

$options = array(

    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',

);

try {
	$conn = new PDO($dsn, $dbuser, $dbpass, $options);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

catch(PDOExeption $e) {
	echo'Failed'. $e->getMessage();
}
// nbr de ts les utilisateurs

$all = $conn->query("SELECT COUNT(*) FROM personne");
$nbr_all = $all->fetchColumn();
//echo $nbr_all  ;
// nbr_medecins

$med = $conn->query("SELECT COUNT(*) FROM personne WHERE role = 'medecin'");
$nbr_med = $med->fetchColumn();
$data['medecin'] = ($nbr_med*100)/$nbr_all;
//echo $data['medecin'] ;
//echo $nbr_med ;

// nbr_pharmaciens

$pharm = $conn->query("SELECT COUNT(*) FROM personne WHERE role = 'pharmacie'");
$nbr_pharm = $pharm->fetchColumn();
$data['pharmacien'] = ($nbr_pharm*100)/$nbr_all;
//echo $data['pharmacien'] ;

// nbr_opticiens

$opt = $conn->query("SELECT COUNT(*) FROM personne WHERE role = 'opticien'");
$nbr_opt = $opt->fetchColumn();
$data['opticien'] = ($nbr_opt*100)/$nbr_all;
//echo $data['opticien'] ;

// nbr_patients (utilisateurs)

$user = $conn->query("SELECT COUNT(*) FROM personne WHERE role = 'user'");
$nbr_user = $user->fetchColumn();
$data['patient'] = ($nbr_user*100)/$nbr_all;
//echo $data['patient'];
// nbr_admins
// nbr_patients (utilisateurs)

$user = $conn->query("SELECT COUNT(*) FROM personne WHERE role = 'laboratoire'");
$nbr_user = $user->fetchColumn();
$data['laboratoire'] = ($nbr_user*100)/$nbr_all;
//echo $data['patient'];
// nbr_admins

$admin = $conn->query("SELECT COUNT(*) FROM personne WHERE role = 'admin'");
$nbr_admin = $admin->fetchColumn();
$data['admin'] = ($nbr_admin*100)/$nbr_all;
//echo $data['admin'];
//envoyer le tableau data en format json
echo json_encode($data);
?>