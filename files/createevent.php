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


function addEvent($description, $date, $vipcost, $regularcost, $dbc){
   
    $add = "INSERT INTO ticketing_event (description, date, vip_cost, regular_cost) VALUES ('$description', '$date', '$vipcost', '$regularcost')";
    
    if($dbc->query($add) === TRUE ){
        echo 'Event has been successfully created'."<br>";
        header('location: ../');
    }else{
        echo "Error: ". $add . "<br>" . $dbc->error;
    }
}

function updateEvent($id, $description, $date, $vipcost, $regularcost, $dbc){
    $update = "UPDATE ticketing_event SET description='$description', date='$date', vip_cost='$vipcost', regular_cost='$regularcost' WHERE id='$id' ";
    
    if($dbc->query($update) === true){
        header('location: ../');
    }else{
        echo "Error : " .$update . "<br>" . $dbc->error;
    }
}

function deleteEvent($id, $dbc){
    $delete = "DELETE FROM ticketing_event WHERE id='$id'";
    if($dbc->query($delete) === true){
        echo("<p>Successfully deleted the event</p>");
    }else{
        echo "Error : " .$delete . "<br>" . $dbc->error;
    }
}

if(isset($_POST['addevent'])){
    
    // Get all the submitted data from the form
    $description = $_POST['description'];
    $date = $_POST['date'];
    $vipcost = $_POST['vip_cost'];
    $regularcost = $_POST['regular_cost'];
    addEvent($description, $date, $vipcost, $regularcost,$dbc);
}

if(isset($_POST['updateEvent'])){
    $description = $_POST['description'];
    $date = $_POST['date'];
    $vipcost = $_POST['vipcost'];
    $regularcost = $_POST['regular'];
    $id = $_POST['id'];
    updateEvent($id, $description, $date, $vipcost, $regularcost,$dbc); 
}

if(isset($_GET['id'])){
    $del_id = $_GET['id'];
    deleteEvent($del_id, $dbc);
}
?>
