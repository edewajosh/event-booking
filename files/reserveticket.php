<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    $numOfCols = 4;
    $rowCount = 0;
    $bootstrapColWidth = 12 / $numOfCols;
    ?>
    <div class="row">
        <?php
        foreach($events as $event){
            ?>
            <div class="col-md-<?php echo $bootstrapColWidth; ?>">
                <div class="thumbnail">
                    <img src="images/<?php echo $event['poster'];?>" alt="">
                </div>
                <h4><?php echo $event['description']; ?></h4>
            </div>
            <?php
            $rowCount++;
            if($rowCount % $numOfCols == 0) echo '</div><div class="row">';
        }
        ?>
    </div>
</body>
</html>
