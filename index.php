<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>

    <div style="width:20%;margin: 30px auto;"> <a href="insert.php"><button class="btn btn-primary"> Insert
                Record</button></a></div>
    <div class="cards w-100 d-flex">
        <?php
        require_once 'config.php';
        $sql = "SELECT * from car_info";
        //Prepare the query:
        $query = $conn->prepare($sql);
        //Execute the query:
        $query->execute();
        //Assign the data which you pulled from the database (in the preceding step) to a variable.
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        // For serial number initialization
        $cnt = 1;
        if ($query->rowCount() > 0) {
            //In case that the query returned at least one record, we can echo the records within a foreach loop:
            foreach ($results as $result) {
        ?>

        <div class="card m-4">
            <div class="img">
                <img src="<?php echo htmlentities($result->Image); ?>" class="card-img-top " alt="...">
            </div>
            <!-- <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                content.</p>
        </div> -->
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><?php echo htmlentities($result->Model); ?></li>
                <li class="list-group-item"><?php echo htmlentities($result->Price); ?></li>
                <li class="list-group-item"><?php echo htmlentities($result->color); ?></li>
            </ul>
            <div class="card-body text-center UPDEL">
                <a href="update.php?id=<?php echo htmlentities($result->CarID); ?>" class=" m-4">
                    <!-- <input class="btn btn-secondary" type="submit" name="update" value="Update"> -->
                    <span style="background-color: #64b5f6;">
                        <ion-icon name="create-outline"></ion-icon>
                    </span>
                </a>
                <a href="delete.php?del=<?php echo htmlentities($result->CarID); ?>" class=" m-4">
                    <span>
                        <ion-icon name="trash-outline"></ion-icon>
                    </span>
                </a>
            </div>

        </div>
        <?php
                // for serial number increment
                $cnt++;
            }
        } ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">

    </script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>