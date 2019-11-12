<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Churchill</title>
</head>
<body>
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

    $events = array();
    $events = getEvents($dbc);
    $countEvents = count($events);
    $numOfCols = 3;
    $rowCount = 0;
    $bootstrapColWidth = 12 / $numOfCols;
    ?>
    <div class="row">
        <?php
        foreach($events as $event){
            $poster = $event['poster'];
            if(empty($poster)) $poster="../images/Churchill.jpeg";
            ?>
            <div class="col-md-4">
                <a href="reserveticket.php"  data-toggle="modal" data-target="#<?php echo $event['id'];?>">
                    <div class="thumbnail">
                        <img src="../images/<?php echo $poster;?>" alt="" class="img-fluid">
                    </div>
                    <h4><?php echo $event['description']; ?></h4>
                </a>
                <div class="modal fade" id="<?php echo $event['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Buy Ticket</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="reserveticket.php" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="eventid">Id</label>
                                        <input type="text" class="form-control" id="eventid" name="id" readonly value="<?php echo $event['id'];?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="description" >
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Full Name</label>
                                        <input type="text" class="form-control" id="name" name="name" >
                                    </div>
                                    <div class="form-group">
                                        <label for="number">Phone Number</label>
                                        <input type="number" class="form-control" id="number" name="number" >
                                    </div>
                                    <div class="dropup">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                            Select Class
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">VIP</a>
                                            <a class="dropdown-item" href="#">Regular</a>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="numberoftickets">Number of tickets</label>
                                        <input type="number" class="form-control" id="numberoftickets" name="numberoftickets" >
                                    </div>
                                    <button type="update" class="btn btn-default" name="buyticket">Buy Ticket</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            $rowCount++;
            if($rowCount % $numOfCols == 0) echo '</div><div class="row">';
        }
        ?>
    </div>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
