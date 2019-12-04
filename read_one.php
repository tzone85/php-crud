<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Crud Application</title>
    
    <!-- Latest compiled and minified Bootstrap CSS  -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
</head>
<body>
    
    <!-- container -->
    <div class="container">
        <div class="page-header">
            <h1>Read Product</h1>
        </div>

        <?php
        /**
         * get passed parameter value, in this case, the record ID
         * isset() is a PHP function used to verify if a value is there or not
         */

        $id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');

        include 'config/database.php';

        //reading current record's data
        try {
            //prepare select query
            $query = "SELECT id, name, description, price FROM products WHERE id = ? LIMIT 0,1";
            $stmt = $con->prepare($query);

            //the first question mark
            $stmt->bindParam(1, $id);
            $stmt->execute();

            // store retrieved row to a variable
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // values to fill up our form
            $name = $row['name'];
            $description = $row['description'];
            $price = row['price'];

        } catch (PDOException $exception) {
            die('ERROR: '.$exception->getMessage());
        }
        ?>

        <!-- HRML read one record table will be here -->

        <table class="table table-hover table-responsive table-bordered">
            <tr>
                <td>Name</td>
                <td><?php echo htmlspecialchars($name, ENT_QUOTES); ?></td>
            </tr>
            <tr>
                <td>Description</td>
                <td><?php echo htmlspecialchars($description, ENT_QUOTES); ?></td>
            </tr>
            <tr>
                <td>Price</td>
                <td><?php htmlspecialchars($price, ENT_QUOTES); ?></td>
            </tr>
            <tr>
                <td></td>
                <td><a href="index.php" class="btn btn-danger">Back to read products</a></td>
            </tr>
        </table>

    </div> <!-- end .container -->


    <!-- jQuery (necessary for bootstrap's js plugins) -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- Compiled and minified Bootstrap JavaScript -->
    <script src="https://maxcdn.boostrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>