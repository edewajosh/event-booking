<?php

include_once('dbconnection.php');

// confirmation email to be sent
  $to = '';
  $subject = 'Industrial Supervisor Sign Up';
  $body = '
  <html>
    <div style = "max-width:500px;margin: auto;border: 3px solid #40E0D0; border-radius: 12px; padding: 25px; font-size: 16px;"><h3 style="color:red">Thank you for booking an event with us &#128591;</h3>
    <div style="color:green">You are receiving this email because you have booked to attend one of our events. Thank you.<br></div>
  </html>';

  $headers = "MIME-Version: 1.0" ."\r\n";
  $headers .= "Content-Type:text/html; charset=UTF-8" . "\r\n";
  $headers .= "From:ticketsbookingemail@gmail.com";


function bookEvent($event, $email, $phone, $tickettype, $tickets, $dbc){
    $query = "INSERT INTO bookings(email, phone, event_name, ticket_type, tickets) VALUES('$email','$phone','$event', '$tickettype', '$tickets')";
    if($dbc->query($query) === TRUE ){
        echo 'Event has been successfully booked'."<br>";
        $to = $email;
        mail($to,$subject,$body,$headers);
        $name = $event;
        $email = $email;
        header('location: ../index.php');
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