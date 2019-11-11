<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <form action="files/createevent.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="Description">Description</label>
                        <input type="text" name="description" id="Description" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="Date">Event Date</label>
                        <input type="date" name="date" id="Date" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="VipCost">VIP Cost</label>
                        <input type="number" name="vip_cost" id="VipCost" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="RegularCost">Regular Cost</label>
                        <input type="number" name="regular_cost" id="RegularCost" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="Poster">Poster</label>
                        <input type="file" name="poster" id="Poster" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" value="submit" class="btn btn-info" name="addevent">Add Event</button>
                    </div>
                </form>
            </div>
            <div class="col-sm-9">
                <?php
                require_once('files/dbconnection.php');
                require('files/createevent.php');
                $events = array();
                $events = getEvents($dbc);
                $countEvents = count($events);
                if ($countEvents > 0)
                {
                    ?>
                <h3>Scheduled Events</h3>
                <table class="table table-sm table-hover">
                    <thead class="thead-dark">
                        <th>#</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>VIP</th>
                        <th>Regular</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php
                         foreach($events as $event)
                         {
                            ?>
                            <tr>
                                <td><?php echo $event['id'];?></td>
                                <td><?php echo $event['description'];?></td>
                                <td><?php echo $event['date'];?></td>
                                <td><?php echo $event['vip_cost'];?></td>
                                <td><?php echo $event['regular_cost'];?></td>
                                <td>
                                <a href="index.php" class="btn btn-sm btn-success" data-toggle="modal" data-target="#<?php echo $event['id'];?>">Update</a>
                                <a href="?id=<?php echo $event['id'];?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this record ??')">Delete</a>
                                </td>
                                            <!-- update modal -->
                                <div class="modal fade" id="<?php echo $event['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Update Event</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                    <form action="files/create.php" method="POST">
                                                        <div class="form-group">
                                                            <label for="eventid">Id</label>
                                                            <input type="text" class="form-control" id="eventid" name="id" readonly value="<?php echo $event['id'];?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="description">Description</label>
                                                            <input type="text" class="form-control" id="description" name="description" value="<?php echo $event['description'];?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="vipcost">VIP</label>
                                                            <input type="number" class="form-control" id="vipcost" name="vipcost" value="<?php echo $event['vip_cost'];?>">
                                                        </div>
                                                        <div class="form-group">
                                                        <label for="regular">Regular</label>
                                                        <input type="number" class="form-control" id="regular"  name="regular" value="<?php echo $event['regular_cost'];?>">
                                                        </div>
                                                        <button type="update" class="btn btn-default" name="updateEvent">Update</button>
                                                    </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                        <?php }?>
                    </tbody>
                </table>
                <?php }?>
                
            </div>
        </div>
    </div>  
    <!-- Latest compiled and minified JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</body>
</html>