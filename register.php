<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $success = false;
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "database1";
    
    // Establishing connection
    $conn = mysqli_connect($server, $username, $password, $database);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    // Sanitize user inputs
    $user = mysqli_real_escape_string($conn, $_POST['user']);
    $pass = mysqli_real_escape_string($conn, $_POST['pass']);

    // Inserting user data into the database
    $sql = "INSERT INTO `login` (`username`, `password`) VALUES ('$user', '$pass')";
    if (mysqli_query($conn, $sql)) {
        $success = true;
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
    // Closing connection
    mysqli_close($conn);
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container-fluid">
    <form class="mx-auto" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h4 class="text-center">Register</h4>
        <div class="mb-3 mt-5">
            <label for="user" class="form-label">Username</label>
            <input type="text" class="form-control" id="user" name="user" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text mt-3">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="pass" class="form-label">Password</label>
            <input type="password" class="form-control" id="pass" name="pass">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
