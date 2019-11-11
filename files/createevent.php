<?php

include_once('dbconnection.php');


function addEvent($description, $date, $vipcost, $regularcost, $poster, $dbc){
    $add = "INSERT INTO ticketing_event (description, date, vip_cost, regular_cost, poster) VALUES ('$description', '$date', '$vipcost', '$regularcost', '$poster')";
    echo "Hello Add Event Function";
    if($dbc->query($add) === TRUE ){
        echo("Event has been successfully created");
    }else{
        echo "Error: ". $add . "<br>" . $dbc->error;
    }
}

if(isset($_POST['addevent'])){
    // The path to store the upload image
    $target = "images/".basename($_FILES["poster"]['name']);
    
    // Get all the submitted data from the form
    $description = $_POST['description'];
    $date = $_POST['date'];
    $vipcost = $_POST['vip_cost'];
    $regularcost = $_POST['regular_cost'];
    $poster = $_FILES['poster']['name'];
    addEvent($description, $date, $vipcost, $regularcost, $poster,$dbc);
}
?>
