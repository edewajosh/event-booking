<?php

include_once('dbconnection.php');

function bookEvent($event, $email, $phone, $tickettype, $tickets, $dbc){
    $query = "INSERT INTO bookings(email, phone, event_name, ticket_type, tickets) VALUES('$email','$phone','$event', '$tickettype', '$tickets')";
    if($dbc->query($query) === TRUE ){
        echo 'Event has been successfully booked'."<br>";
        header('location: ../home.php');
    }else{
        echo "Error: ". $query . "<br>" . $dbc->error;
    }
}

if(isset($_POST['buyticket'])){
    
    // Get all the submitted data from the form
    $event = $_POST['event'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $tickettype = $_POST['tickettype'];
    $tickets = $_POST['tickets'];
    bookEvent($event, $email, $phone, $tickettype, $tickets,$dbc);
}