<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista imion</title>
    <link rel="stylesheet" href="./style.css">
  </head>
  <body>
    <div id="container">
        <form method="Post">
            <button name='deleteall' id='usun'><b>X</b></button>
            <input type="text" id="imie" placeholder="Wprowadź imie" name="imie">
            <button id="submit" name="insert">Wprowadź</button>
        </form> 

        <?php 
            $conn = new mysqli("localhost", "root", "", "imiona");
            function show() {
                $conn = new mysqli("localhost", "root", "", "imiona");
                $result = $conn -> query("SELECT `id`, `imie` FROM `imiona` WHERE 1");
                while ($row = mysqli_fetch_array($result)) {
                    echo "<div id='element'>
                        <form method='post' action=''>
                            <input id='inputfield' name='id' value='",$row['id'],"'/>
                            <input id='inputfield' name='imie' value='",$row['imie'],"'/>
                            <button name='delete' id='usun'><b>X</b></button>
                            <button name='update' id='update'><b>U</b></button>
                            </form>" ,"</div>";
                }
            }

            if(isset($_POST['insert']))
            {
                $imie = $_POST["imie"];
                $sql = "INSERT INTO `imiona`(`imie`) VALUES ('$imie')";
                $conn->query($sql);
                show();
            }

            if(isset($_POST['delete']))
            {
                $id = $_POST["id"];
                $sql = "DELETE FROM `imiona` WHERE id='$id'";
                $conn->query($sql);
                show();
            }

            if(isset($_POST['update']))
            {
                $imie = $_POST["imie"];
                $id = $_POST["id"];
                $sql = "UPDATE `imiona` SET `imie`='$imie' WHERE id='$id'";
                $conn->query($sql);
                show();
            }

            if(isset($_POST['deleteall']))
            {
                $sql = "truncate table imiona";
                $conn->query($sql);
                show();
            }
        ?>
    </div>
  </body>
</html>