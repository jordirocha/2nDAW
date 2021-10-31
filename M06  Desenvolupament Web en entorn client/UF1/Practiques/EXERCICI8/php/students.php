<?php
// Associative array of curses with students
$personas = [
    "DAW" => ["Marius", "Vicent", "Bekaye", "Ahitana", "Xinjie"],
    "DAM" => ["Laudelino", "Crispula", "Cañosanto", "Bartolomea"],
    "ASIX" => ["Carlos", "Miquel", "Antonio", "Manuel", "Antonio"]
];

if ($_GET["login"] == "true") {
    $curse = $_GET["curse"];
    if (array_key_exists($curse, $personas)) {
        echo json_encode($personas[$curse]);
    }
}