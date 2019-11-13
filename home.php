<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>churchill</title>
</head>
<body>
    <?php
        include_once('files/dbconnection.php');

        function getNextEvent($dbc){
            $query = "SELECT id, description, date FROM ticketing_event ORDER BY id DESC LIMIT 1";
            $result = $dbc->query($query);
            $result = $result->fetch_row();
            return $result;
        }
        
        $result = getNextEvent($dbc);
        $date = date_create($result['2']);

     ?>
    
    <!-- Button trigger modal -->
    <div class="container m-5 content-font">
        <div class="col-md-12 text-center">
            <p class="lead text-white"><?php echo $result['1'];?></p>
            <p class="lead text-white"><?php echo date_format($date,"d M Y");?></p>
            <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModal">
            Get Tickets Here!
            </button>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header text-center">
            <h5 class="modal-title" id="exampleModalLabel">Buy Ticket</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="files/bookevent.php" method="post">
                <div class="form-group">
                    <label for="event">Event Name:</label>
                    <input type="text" name="event" id="event" class="form-control" readonly value="<?php echo $result['1'];?>">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="phonenumber">Phone:</label>
                    <input type="number" name="phone" id="phonenumber" class="form-control">
                </div>
                <div class="form-group">
                    <label for="ticket">Ticket Type</label>
                    <select name="tickettype" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                        <option selected value="bronze">Bronze 500.00</option>
                        <option value="silver">Silver 1,500.00</option>
                        <option value="gold">Gold 2,000.00</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="ticket">Tickets</label>
                    <input type="number" name="tickets" id="ticket" class="form-control">
                </div>
                <div class="text-center">
                    <button type="update" class="btn btn-default text-center" name="buyticket">Buy Ticket</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    </div>


    <!-- Latest compiled and minified JavaScript -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>