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
    <!-- container  -->
    <div class="container">
        <div class="page-header">
            <h1>Create Product</h1>
        </div>

        <?php
            if ($_POST) {
                include 'config/database.php';

                try{
                    $query = "INSERT INTO products SET name=:name, description=:description, price=:price, created=:created";
                } catch(PDOException $exception) {
                    die('ERROR: '.$exception->getMessage());
                }
            }
        ?>
    
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            <table>
                <tr>
                    <td>Name</td>
                    <td><input type='text' name='name' class='form-control' /></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td><textarea name="description" class="form-control"></textarea></td>
                </tr>

                <tr>
                    <td>Price</td>
                    <td><input type='text' name='price' class='form-control' /></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type='submit' value='Save' class='btn btn-primary' />
                    <a href='index.php' class=btn btn-danger>Back to read products</td>
                </tr>
            </table>
        </form>
    </div> <!-- end .container -->

    <!-- jQuery (necessary for bootstrap's js plugins) -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- Compiled and minified Bootstrap JavaScript -->
    <script src="https://maxcdn.boostrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body> 

</html>