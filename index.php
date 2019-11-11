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
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</body>
</html>