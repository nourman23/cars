<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">

</head>

<body>


    <div class="container ">
        <div class="row ">
            <div class="col-md-12">
                <h3>Add a car </h3>
                <hr />
            </div>
        </div>
        <form name="insertrecord" method="post" class="insertF">

            <!-- <div class="row">
                <div class="col-md-4"><b> Name</b>
                    <input type="text" name="name" class="form-control" required>
                </div>
            </div> -->
            <div class="row">
                <div class="col-md-4">
                    <input type="text" name="image" class="form-control" placeholder="Image link" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <input type="text" name="model" class="form-control" placeholder="Model" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <input type="text" name="price" class="form-control" placeholder="Price" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <input type="text" name="color" class="form-control" placeholder="Color" required>
                </div>
            </div>
            <div class="row" style="margin-top:1%">
                <div class="col-md-8">
                    <input class="btn" type="submit" name="insert" value="ADD">
                </div>
            </div>
        </form>
    </div>
    </div>


    <?php
    require_once 'config.php';
    if (isset($_POST['insert'])) {



        // $name = $_POST['name'];
        $image = $_POST['image'];
        $model = $_POST['model'];
        $price = $_POST['price'];
        $color = $_POST['color'];

        $data = [
            // ':name' => $name,
            ':image' => $image,
            ':model' =>  $model,
            ':price' => $price,
            ':color' => $color,
        ];
        // Insert
        $insert = "INSERT INTO `car_info` (`Image`, `Model`, `Price`, `color`) VALUES (:image , :model , :price , :color)";
        // $insert = "INSERT INTO `customers` (`Name`, `orders_num`, `email`) VALUES ('NN', 4 , 'nn@gmail.com')";
        $insert_run = $conn->prepare($insert);
        // $insert_run->bindParam(':img', $image, PDO::PARAM_STR);
        // $insert_run->bindParam(':ln', $lname, PDO::PARAM_STR);
        // $insert_run->bindParam(':eml', $emailid, PDO::PARAM_STR);
        // $insert_run->bindParam(':cno', $contactno, PDO::PARAM_STR);

        $insert_run->execute($data);
        if ($insert_run) {
            echo "Inserted Successfully";
            // header('Refresh: 0');
        } else {

            echo "Not Inserted";
        }

        $lastInsertId = $conn->lastInsertId();
        if ($lastInsertId) {
            // Message for successfull insertion
            echo "<script>alert('Record inserted successfully');</script>";
            echo "<script>window.location.href='index.php'</script>";
        } else {
            // Message for unsuccessfull insertion
            echo "<script>alert('Something went wrong. Please try again');</script>";
            echo "<script>window.location.href='index.php'</script>";
        }
    }
    ?>

</body>

</html>