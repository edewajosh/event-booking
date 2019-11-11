<?php

include_once('dbconnection.php');

function getEvents($dbc){
    $query="SELECT * FROM ticketing_event";
    $result = $dbc->query($query);
    $rows=$result->num_rows;
    if ($rows>0) {
        while($row = $result->fetch_assoc())
        {
            $events[]=$row;
        }
    }else{
        $events = array();
    }
    return $events;
}

function addEvent($description, $date, $vipcost, $regularcost, $poster, $dbc){
    // The path to store the upload image
    $target = "../images/".basename($_FILES["poster"]['name']);
   
    $add = "INSERT INTO ticketing_event (description, date, vip_cost, regular_cost, poster) VALUES ('$description', '$date', '$vipcost', '$regularcost', '$poster')";
    
    if (move_uploaded_file($_FILES['poster']['tmp_name'], $target)) {
        $msg = "Image uploaded succesfully"."<br>";
    }else{
        $msg = "There was a problem uploading image";
    }
    
    if($dbc->query($add) === TRUE ){
        echo 'Event has been successfully created'."<br>";
    }else{
        echo "Error: ". $add . "<br>" . $dbc->error;
    }
}

if(isset($_POST['addevent'])){
    
    // Get all the submitted data from the form
    $description = $_POST['description'];
    $date = $_POST['date'];
    $vipcost = $_POST['vip_cost'];
    $regularcost = $_POST['regular_cost'];
    $poster = $_FILES['poster']['name'];
    addEvent($description, $date, $vipcost, $regularcost, $poster,$dbc);
}
?>
