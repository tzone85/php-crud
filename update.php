<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>PDO - Update a Record - PHP CRUD Tutorial</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous"></head>

<body>

<!-- container -->
<div class="container">
    <div class="page-header">
        <h1>Update Product</h1>
    </div>

    <?php
        // get passed parameter value, in this case the record ID
        $id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found');

        include 'config/database.php';

        // include current record's data
        try {
            // prepare select query
            $query = "SELECT id, name, description, price FROM products WHERE id = ? LIMIT 0, 1";
            $stmt = $con->prepare($query);

            //first question mark from the query string
            $stmt->bindParam(1, $id);

            //execute the query
            $stmt->execute();

            // store retrieved row to a variable;
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // values to fill up the table
            $name = $row['name'];
            $description = $row['description'];
            $price = $row['price'];

        } catch (PDOException $exception) {
            die('ERROR: '.$exception->getMessage());
        }
    ?>
    
    <!-- html form where new record information can be updated -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$id}"); ?>" method="post">
        <tr>
            <td>Name</td>
            <td><input type="text" name="name" value="<?php echo htmlspecialchars($name, ENT_QUOTES); ?>" class="form-control" /></td>
        </tr>
        <tr>
            <td>Description</td>
            <td><textarea name="description" class="form-control"><?php echo htmlspecialchars($description, ENT_QUOTES); ?></textarea></td>
        </tr>
        <tr>
            <td>Price</td>
            <td><input type="text" name="price" value="<?php echo htmlspecialchars($price, ENT_QUOTES); ?>" class="form-control" /></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" value="Save Changes" class="btn btn-primary" />
                <a href="index.php" class="btn btn-danger">Back to read products</a>
            </td>
        </tr>
    </form>
    
</div>

<!-- jQuery (necessary for bootstrap's js plugins) -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>