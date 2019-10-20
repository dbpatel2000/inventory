<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inventory</title>

    <style>
        body {
            width:100%;
            background: rgb(116, 116, 255);
            margin: 0;
            padding: 0;
        }

        div.main-container {
            margin: 0;
            padding: 0;
        }

        div.navigation{
            margin: 0;
            padding: 0px;
        }
        ul.nav-list{
            padding: 10px;
            margin: 0;
            background: blue;
            list-style-type: none;
            text-align: center;
            border-radius: 3px;
        }

        ul.nav-list li{
            border-right: 2px solid white;
            display: inline;
        }
        ul.nav-list li:last-child {
            border: none;
        }

        a {
            color: white;
            text-decoration: none;
            padding: 7px;
            margin: 3px;
        }

        a:hover {
            color: black;
            background:white;
        }

        a.selected {
            color: black;
            background:white;
        }
        /*  Outer Box */
        div.outer-box {
            width: fit-content;
            margin: 0 auto;
            margin-top: 150px ;
            min-width: 500px;
            background: rgb(226, 226, 226);
            border-radius: 5px;
            border: none;
            padding: 5px;
        }
        div.output {
            width: fit-content;
            margin: 0 auto;
            margin-top: 5px ;
            min-width: 500px;
            background: rgb(226, 226, 226);
            border-radius: 5px;
            border: none;
            padding: 5px;
            font-family: tahoma;
            font-size: 15px;
            text-align:center;
        }

        p.head{
            display: block;
            text-align: center;
            font-family: Impact;
            font-size: 20px;
            color: black;
        }

        .input-text{
            display: block;
            margin: 0 auto;
            width: 450px;
            border: 1px solid rgb(138, 138, 138);
            padding: 5px;
            font-family: sans-serif;
            font-size: 15px;
        }

        .submit-but {
            display: block;
            margin: 0 auto;
            font-family: tahoma;
            padding: 5px;
            font-size: 15px;
        }
    </style>

</head>
<body>

    <div class="main-container">
        <div class="navigation">
            <ul class="nav-list">
                <li><a href = "./index.php" class="selected">Add Item</a></li>
                <li><a href = "./modify.php">Modify Item</a></li>
                <li><a href = "./delete.php">Delete Item</a></li>
                <li><a href = "./search.php">Search Item</a></li>
                
            </ul>
        </div>

        <div class="outer-box">
            <p class="head">Add Item</p>
            <hr style="margin: 10px;">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <input class="input-text" type="text" name="name" placeholder="Name"><br>
                <input class="input-text" type="text" name="category" placeholder="Category"><br>
                <input class="input-text" type="number" name="number" placeholder="Number of Items"><br>
                <input class="input-text" type="number" name="price" placeholder="Price"><br>
                <button type="submit" class="submit-but">Submit</button>
            </form>

        </div>
        <div class="output">
            <?php
            include "./db.php";

            $name = $_POST["name"];
            $category = $_POST["category"];
            $number = intval($_POST["number"]);
            $price = intval($_POST["price"]);
            $sql = "INSERT INTO `inventory` (`ID`, `NAME`, `CATEGORY`, `ITEMS`, `PRICE`) VALUES (NULL, '$name', '$category', '$number', '$price');";

            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            }

            $conn->close();
            ?>
            
        </div>
    </div>
</body>
</html>