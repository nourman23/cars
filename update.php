<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="style.css">

    <title>Document</title>
</head>

<body>



    <?php
    require_once 'config.php';
    // Get the userid
    $carID = intval($_GET['id']);
    $sql = "SELECT * from car_info where CarID=:carId";
    //Prepare the query:
    $query = $conn->prepare($sql);
    //Bind the parameters
    $query->bindParam(':carId', $carID, PDO::PARAM_STR);
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
    <form name="insertrecord" method="post" class="updateF">
        <div class="row">
            <div class="col-md-4"><b>Image link</b>
                <input type="text" name="image" value="<?php echo htmlentities($result->Image); ?>" class="form-control"
                    required>
            </div>
            <div class="col-md-4"><b>Model </b>
                <input type="text" name="model" value="<?php echo htmlentities($result->Model); ?>" class="form-control"
                    required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"><b>Price</b>
                <input type="number" name="price" value="<?php echo htmlentities($result->Price); ?>"
                    class="form-control" required>
            </div>
            <div class="col-md-4"><b>Color</b>
                <input type="text" name="color" value="<?php echo htmlentities($result->color); ?>" class="form-control"
                    maxlength="10" required>
            </div>
        </div>
        <?php }
    } ?>
        <div class="row" style="margin-top:1%">
            <div class="col-md-8">
                <input type="submit" name="update" value="Update" class="btn">
            </div>
        </div>
    </form>


    <?php
            // include database connection file
            require_once 'config.php';
            if (isset($_POST['update'])) {
                // Get the userid
                $carID = intval($_GET['id']);
                // Posted Values
                $image = $_POST['image'];
                $model = $_POST['model'];
                $price = $_POST['price'];
                $color = $_POST['color'];
                // Query for Updation

                $data = [
                    //     // ':name' => $name,
                    ':carId' =>  $carID,
                    ':img' => $image,
                    ':mdl' =>  $model,
                    ':pc' => $price,
                    ':clr' => $color,
                ];
                $update = "UPDATE `car_info` SET `Image` =:img , `Model` =:mdl , `Price` =:pc, `color` =:clr WHERE `car_info`.`CarID` = :carId;";
                //Prepare Query for Execution
                $update_run = $conn->prepare($update);
                // Bind the parameters
                // $update_run->bindParam(':carId', $carID, PDO::PARAM_STR);
                // $update_run->bindParam(':img', $image, PDO::PARAM_STR);
                // $update_run->bindParam(':mdl', $model, PDO::PARAM_STR);
                // $update_run->bindParam(':pc', $price, PDO::PARAM_STR);
                // $update_run->bindParam(':clr', $color, PDO::PARAM_STR);
                // Query Execution
                $update_run->execute($data);
                // Mesage after updation
                echo "<script>alert('Record Updated successfully');</script>";
                // Code for redirection
                echo "<script>window.location.href='index.php'</script>";
            }
            ?>

</body>

</html>