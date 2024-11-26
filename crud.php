<?php
$con = new mysqli("localhost", "root", "", "movies");

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

    $action = $_POST["action"] ?? "";
    $id = $_POST["id"] ?? null;
    $name = $_POST["name"] ?? "";
    $catagory = $_POST["catagory"] ?? "";
    $embeddedcode = $_POST["embeddedcode"] ?? "";

    if ($action === "add") {
        $con->query("INSERT INTO movie_list (name, catagory, embeddedcode) VALUES ('$name', '$catagory', '$embeddedcode')");
    } elseif ($action === "update" && $id) {
        $con->query("UPDATE movie_list SET name='$name', catagory='$catagory', embeddedcode='$embeddedcode' WHERE id='$id'");
    } elseif ($action === "delete" && $id) {
        $con->query("DELETE FROM movie_list WHERE id='$id'");
    }

// Fetch all movies
$result = $con->query("SELECT * FROM movie_list");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Movie List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
</head>
<body>
    <div class="container">
        <ul class="navbar" id="nav1">
            <li><a href="#">MOVIESITE</a></li>
            <li><a href="index.php">HOME</a></li>
            <li><a href="#">CRUD</a></li>
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

    <div class="admincontainer">
    <h2>ADD NEW MOVIE</h2><br>
    <!-- Add New Movie Form -->
    <form method="POST">
        <input type="hidden" name="action" value="add">
        <label for="name">Name:</label><br>
        <input type="text" name="name" id="name" required><br>
        <label for="catagory">Catagory :</label><br>
        <input type="text" name="catagory" id="catagory" required><br>
        <label for="embeddedcode">Encoded Link:</label><br>
        <textarea name="embeddedcode" id="embeddedcode" required></textarea><br>
        <button type="submit">ADD</button>
    </form>

    <br><h2>Movie List</h2>
    <!-- Display Movies in a Table -->
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Catagory</th>
                <th>Details</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['catagory']; ?></td>
                    <td>
                        <!-- Update Form -->
                        <form method="POST" style="display: inline-block;">
                            <input type="hidden" name="action" value="update">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <label for="name">Name:</label><br>
                            <input type="text" name="name" id="name" value="<?php echo ($row['name']); ?>"><br>
                            <label for="catagory">Catagory :</label><br>
                            <input type="text" name="catagory" id="catagory" value="<?php echo ($row['catagory']); ?>"><br>
                            <label for="embeddedcode">Encoded Link:</label><br>
                            <textarea name="embeddedcode" id="embeddedcode"> <?php echo $row['embeddedcode']; ?></textarea><br>
                            <button type="submit">UPDATE</button>
                        </form>

                        <!-- Delete Button -->
                        <form method="POST" style="display: inline-block;">
                            <input type="hidden" name="action" value="delete">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <button type="submit">DELETE</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
