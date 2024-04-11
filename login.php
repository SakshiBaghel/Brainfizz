<?php
$login_success = false; // Variable to track login success
$error_message = "";    // Variable to store error message

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
    
    // Check if username and password match
    $sql = "SELECT * FROM `login` WHERE `username`='$user' AND `password`='$pass'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1) {
        $login_success = true; // Set login success to true
        // Redirect to home page upon successful login
        session_start();
        $_SESSION['loggedin']=true;
        $_SESSION['user']=$user;
        header("Location: front3.php");
    } else {
        $error_message = "Invalid username or password";
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
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
        .error-alert {
            margin-top: 20px; /* Added margin */
            color: #721c24; /* Standard red color for errors in Bootstrap */
            background-color: #f8d7da; /* Background color for error alerts */
            border-color: #f5c6cb; /* Border color for error alerts */
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <?php if ($error_message): ?>
        <div class="alert alert-warning alert-dismissible fade show error-alert" role="alert">
            <strong><?php echo $error_message; ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <form class="mx-auto" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h4 class="text-center">Login</h4>
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

