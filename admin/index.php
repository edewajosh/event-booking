<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area | Pages</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
  </head>
  <body>

    <nav class="navbar navbar-default navbar-expand-md">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand nav-link" href="#">Admin</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse" id="navbar">
          <ul class="navbar-nav">
            <li class=" navbar-item"><a class="nav-link" href="index.php">Events</a></li>
          </ul>
          <ul class="navbar-nav ml-auto">
            <li class="navbar-item"><a href="#" class="nav-link">Welcome, Admin</a></li>
            <li class="navbar-item"><a href="login.php" class="nav-link">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-10">
            <h1><span class="glyphicon glyphicon-cog " aria-hidden="true"></span>Events<small>Manage Site Events</small></h1>
          </div>
          <div class="col-md-2">

          </div>
        </div>
      </div>
    </header>

    <section id="breadcrumb">
      <div class="container">
        <ol class="breadcrumb">
          <li><a class="nav-link " href="#">Dashboard</a></li>
          <li class="active nav-link ">Events</li>
        </ol>
      </div>
    </section>

        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <p class="align-center h3">Add The Next Event</p>
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
                            <button type="submit" value="submit" class="btn btn-info" name="addevent">Add Event</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-9">
                    <?php
                    require_once('../files/dbconnection.php');
                    require('../files/createevent.php');
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
                                                    <form action="files/createevent.php" method="POST">
                                                        <div class="form-group">
                                                            <label for="eventid">Id</label>
                                                            <input type="text" class="form-control" id="eventid" name="id" readonly value="<?php echo $event['id'];?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="description">Description</label>
                                                            <input type="text" class="form-control" id="description" name="description" value="<?php echo $event['description'];?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="date">Date</label>
                                                            <input type="date" class="form-control" id="date" name="date" value="<?php echo $event['date'];?>">
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
    

    <footer id="footer">
      <p>Copyright Admin, &copy; 2019</p>
    </footer>

    
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  </body>
</html>
