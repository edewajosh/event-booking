<?php

include_once('dbconnection.php');

function getEvents($dbc){
    $query="SELECT * FROM event";
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


function addEvent($description, $date, $gold, $silver, $bronze, $dbc){
   
    $add = "INSERT INTO event (description, date, gold, silver, bronze) VALUES ('$description', '$date', '$gold', '$silver', '$bronze')";
    
    if($dbc->query($add) === TRUE ){
        echo 'Event has been successfully created'."<br>";
        header('location: ../admin/index.php');
    }else{
        echo "Error: ". $add . "<br>" . $dbc->error;
    }
}

function updateEvent($id, $description, $date, $gold, $silver, $bronze, $dbc){
    $update = "UPDATE event SET description='$description', date='$date', gold='$gold', silver='$silver', bronze='$bronze' WHERE id='$id' ";
    
    if($dbc->query($update) === true){
        header('location: ../admin/index.php');
    }else{
        echo "Error : " .$update . "<br>" . $dbc->error;
    }
}

function deleteEvent($id, $dbc){
    $delete = "DELETE FROM event WHERE id='$id'";
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
    $gold = $_POST['gold'];
    $silver = $_POST['silver'];
    $bronze = $_POST['bronze'];
    addEvent($description, $date, $gold, $silver, $bronze,$dbc);
}

if(isset($_POST['updateEvent'])){
    $description = $_POST['description'];
    $date = $_POST['date'];
    $gold = $_POST['gold'];
    $silver = $_POST['silver'];
    $bronze = $_POST['bronze'];
    $id = $_POST['id'];
    updateEvent($id, $description, $date, $gold, $silver, $bronze,$dbc); 
}

if(isset($_GET['id'])){
    $del_id = $_GET['id'];
    deleteEvent($del_id, $dbc);
}
?>
