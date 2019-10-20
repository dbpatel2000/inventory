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

        table.search-table{
            width: 100%;
            text-align: center;
        }

        .head-font {
            font-family: serif;
            font-weight: bold;
        }
        .item-font {
            font-family: serif;
        }
    </style>

</head>
<body>

    <div class="main-container">
        <div class="navigation">
            <ul class="nav-list">
                <li><a href = "./index.php">Add Item</a></li>
                <li><a href = "./modify.php">Modify Item</a></li>
                <li><a href = "./delete.php">Delete Item</a></li>
                <li><a href = "./search.php" class="selected">Search Item</a></li>
                
            </ul>
        </div>

        <div class="outer-box">
            <p class="head">Search Item</p>
            <hr style="margin: 10px;">
            <form action="./search.php" method="post">
                <input class="input-text" type="text" name="name" placeholder="Name or Category"><br>
                <input type="submit" name="submit" class="submit-but" value="Search">
            </form>
            <hr style="margin: 10px;">
            <table class="search-table">
                <tr>
                    <td class="head-font">ID</td>
                    <td class="head-font">Name</td>
                    <td class="head-font">Category</td>
                    <td class="head-font">Items</td>
                    <td class="head-font">Price</td>
                </tr>
                <?php include "./db.php";
                if(isset($_POST['submit'])){
                $name = $_POST["name"];
                
                $sql = "SELECT * FROM inventory where name='$name' OR category='$name'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>"."";
                        echo "<td class=\"item-font\">".$row["ID"]."</td>";
                        echo "<td class=\"item-font\">".$row["NAME"]."</td>";
                        echo "<td class=\"item-font\">".$row["CATEGORY"]."</td>";
                        echo "<td class=\"item-font\">".$row["ITEMS"]."</td>";
                        echo "<td class=\"item-font\">".$row["PRICE"]."</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "0 results";
                }
                $conn->close();
            }
                ?>
                
            </table>
        </div>

        <!-- PHP code here -->
    </div>
    
</body>
</html>