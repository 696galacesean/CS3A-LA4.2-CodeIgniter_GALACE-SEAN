<?php
session_start(); // start the session to use stored user data

// if no user session data, redirect back to registration
if (!isset($_SESSION['user'])) {
    header("Location: register.php");
    exit();
}

$login_error = $pin_error = ""; // placeholders for possible errors
$step = "login"; // initial step is login

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // check username and password first
    if (isset($_POST['username'])) {
        if ($_POST['username'] === $_SESSION['user']['username'] && $_POST['password'] === $_SESSION['user']['password']) {
            $step = "pin"; // move to pin step if correct
        } else {
            $login_error = "Invalid username or password."; // show error if wrong
        }

    // check pin code
    } elseif (isset($_POST['pinCode'])) {
        if ($_POST['pinCode'] === $_SESSION['user']['pinCode']) {
            $step = "done"; // login complete
        } else {
            $pin_error = "Incorrect pin code."; // show error if pin wrong
            $step = "pin"; // stay on pin step
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
    /* basic reset */
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    /* body styling */
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #d8c3a5, #eae7dc);
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      padding: 20px;
    }

    /* glass effect container */
    .glass-container {
      background: rgba(255, 255, 255, 0.25);
      backdrop-filter: blur(14px);
      -webkit-backdrop-filter: blur(14px);
      padding: 2rem 3rem;
      box-shadow: 0 8px 30px rgba(85, 66, 41, 0.2);
      color: #4e342e;
      width: 100%;
      max-width: 500px;
      text-align: center;
      border: 1px solid rgba(255, 255, 255, 0.3);
    }

    h2 {
      margin-bottom: 1rem;
      font-size: 2rem;
      color: #5d4037;
    }

    form {
      margin-top: 1rem;
    }

    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 0.6rem;
      margin: 0.5rem 0 1rem 0;
      border: none;
      border-radius: 10px;
      background: rgba(255, 255, 255, 0.4);
      color: #4e342e;
      font-size: 1rem;
      outline: none;
    }

    input:focus {
      background: rgba(255, 255, 255, 0.6);
    }

    button {
      width: 100%;
      padding: 0.7rem;
      background-color: rgba(93, 64, 55, 0.7);
      color: white;
      border: none;
      border-radius: 10px;
      font-size: 1rem;
      font-weight: bold;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    button:hover {
      background-color: rgba(93, 64, 55, 0.9);
    }

    p, ul p {
      margin-bottom: 1rem;
      color: #5d4037;
    }

    ul {
      text-align: left;
      margin-top: 1rem;
      text-align: center;
    }

    li {
      margin-bottom: 0.5rem;
      list-style-type: none;
    }

    .error {
      color: #c62828;
      font-weight: 500;
      margin-bottom: 1rem;
    }

    .success-msg {
      color: #081b5a;
      font-weight: 500;
      margin-bottom: 1rem;
    }
  </style>

</head>
<body>
    <div class="glass-container">
        <?php if ($step === "login"): ?>
            <h2>Login</h2>
            <form method="post">
                <?php if ($login_error) echo "<p>$login_error</p>"; ?> <!-- show login error if any -->
                
                Username: <input type="text" name="username" required><br><br>
                
                Password: <input type="password" name="password" required><br><br>
                
                <button type="submit">Next</button>
            </form>
    
        <?php elseif ($step === "pin"): ?>
            <h2>Enter Pin Code</h2>
            <form method="post">
                <?php if ($pin_error) echo "<p style='color:red;'>$pin_error</p>"; ?> <!-- show pin error if any -->
                
                Pin Code: <input type="text" name="pinCode" required><br><br>
                
                <button type="submit">Login</button>
            </form>
    
        <?php else: ?>
            <h2>Login Successful!</h2>

            <!-- display user's registered info -->
            <ul>
                <p>Welcome, <?php echo $_SESSION['user']['firstName']; ?>! Here is your registered information:</p>
                
                <?php
                foreach ($_SESSION['user'] as $key => $value) {
                    echo "<li><strong>" . ucfirst($key) . ":</strong> $value</li>";
                }
                ?>
            </ul>
        <?php endif; ?>
    </div>
</body>
</html>