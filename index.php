<?php
$con = new mysqli("localhost", "root", "", "movies");

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Fetch all movies
$result = $con->query("SELECT * FROM movie_list");
?>
       <!DOCTYPE html>
       <html>
       <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Page Title</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
       </head>
       <body>
            <div class="container">
                <ul class="navbar" id="nav1">
                    <li><a href="#">MOVIESITE</a></li>
                    <li><a href="#">HOME</a></li>
                    <li><a href="crud.php">CRUD</a></li>
                    <li><a href="#">LIBRARY</a></li>
                    <li><a href="#">LOG OUT</a></li>
                </ul>
                <ul class="navbar" id="nav2">
                    <li><a href="#">MOVIEHUB</a></li>
                    <li><a href="#"><i class="bi bi-house-door-fill"></i></a></li>
                    <li><a href="crud.php"><i class="bi bi-camera-reels-fill"></i></a></li>
                    <li><a href="#"><i class="bi bi-film"></i></a></li>
                    <li><a href="#"><i class="bi bi-bookmark-check-fill"></i></a></li>
                </ul>
            </div>
            <div>
                <div class="con1"><p>Select the catagory you want</p><br>
                <select id="titles">
                    <option value="1">Choose...</option>
                    <option value="2">Horror</option>
                    <option value="3">mystery</option>
                    <option value="4">Thriller</option>
                </select>
                </div>
            </div>
                
                    <div id="horror" style="display: none;" class="mcon">
                        <?php
                        $result = $con->query("SELECT * FROM movie_list WHERE catagory = 'Horror'");
                        // Output movie details
                        while ($row = $result->fetch_assoc()) {
                            echo '<div id="horr">
                                <strong>' .$row["name"] . '</strong> <br><br>
                                <strong>Catagory:</strong> '.$row["catagory"] . '<br>'.
                                $row["embeddedcode"] . '<br>
                                </div><br>';
                        }
                        ?>
                    </div>
                    <div id="mystery" style="display: none;" class="mcon">
                        <?php
                        $result = $con->query("SELECT * FROM movie_list WHERE catagory = 'mystery'");
                        
                        while ($row = $result->fetch_assoc()) {
                            echo '<div id="myst">
                                <strong>' .$row["name"] . '</strong> <br><br>
                                <strong>Catagory:</strong> '.$row["catagory"] . '<br>'.
                                $row["embeddedcode"] . '<br>
                                </div><br>';
                        }
                  
                        ?>
                    </div>

            <script src='main.js'></script><!--If you declare this statement in head tag js file will not work-->
       </body>
       </html>