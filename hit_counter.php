<?php

	$user = "javier"
	$password = "password"
	$database = "redis"
	$table = "contador"
	$conexion = new PDO("mysql:host=locatehost;dbname=$database", $user, $password);

    try {

        $siteVisitsMap  = 'siteStats';
        $visitorHashKey = '';

        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {

           $visitorHashKey = $_SERVER['HTTP_CLIENT_IP'];

        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {

           $visitorHashKey = $_SERVER['HTTP_X_FORWARDED_FOR'];

        } else {

           $visitorHashKey = $_SERVER['REMOTE_ADDR'];
        }

        $totalVisits = 0;
	$sentence="SELECT ip, visitas FROM contador WHERE ip=:ip";
	if ($conexion->connect_error ) {
	die("Connextion failed: " . $conn->connect_error);
}

	$rs = $conexion->query("SELECT ip, visitas FROM contador WHERE ip = $visitorHashKey")
	$stmt = $conexion->prepare($rs);
	$stmt->bindParam(':ip', $visitorHashkey);
	$stmt->FetchMode(PDO::FETCH_ASSOC);
	$stmt->execute();
	
	if ($result) {
	$row = $stmt->fetch();
	$totalVisits = $row['visitas'] +1;

	}else{
	$totalVisits = 1;


 	}

	$insr = "INSERT INTO contador (ip, visitas) VALUES (:ip, :visitas) ON DUPLICATE "

	$stmt = $db->prepare($sql);
        $stmt->bindParam(':ip', $visitorHashKey);
        $stmt->bindParam(':visitas', $totalVisits);

	$stmt->execute();
        echo "Welcome, you've visited this page " .  $totalVisits . " times\n";

    } catch (Exception $e) {
        echo $e->getMessage();
    }
