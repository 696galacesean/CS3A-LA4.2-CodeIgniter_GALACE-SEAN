<?php
session_start(); // start the session to store user data

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // save form data into session
    $_SESSION['user'] = [
        'firstName' => $_POST['firstName'],
        'lastName' => $_POST['lastName'],
        'course' => $_POST['course'],
        'yearLevel' => $_POST['yearLevel'],
        'section' => $_POST['section'],
        'username' => $_POST['username'],
        'password' => $_POST['password'],
        'pinCode' => $_POST['pinCode']
    ];
    
    header("Location: registered.php"); // redirect to registered page
    exit(); 
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <style>
    /* reset and basic styling */
    * {
      box-sizing: border-box;
      margin: 0px;
      padding: 0px;
    }

    body {
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #d8c3a5, #eae7dc);
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding: 50px;
    }

    .glass-container {
      background: rgba(255, 255, 255, 0.2);
      backdrop-filter: blur(14px); /* blurred glass effect */
      -webkit-backdrop-filter: blur(14px);
      box-shadow: 0 8px 30px rgba(85, 66, 41, 0.2);
      padding: 2rem 3rem;
      width: 100%;
      max-width: 800px;
      color: #4e342e;
      border: 1px solid rgba(255, 255, 255, 0.3);
    }

    h2 {
      text-align: center;
      margin-bottom: 1.5rem;
      font-size: 1.8rem;
      color: #5d4037;
    }

    .form-group {
      margin-bottom: 1.2rem;
    }

    label {
      display: block;
      margin-bottom: 0.3rem;
      font-weight: 600;
    }

    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 0.6rem;
      border: none;
      border-radius: 10px;
      background: rgba(255, 255, 255, 0.4);
      color: #4e342e;
      font-size: 1rem;
      outline: none;
    }

    input::placeholder {
      color: rgba(78, 52, 46, 0.6);
    }

    input[type="text"]:focus,
    input[type="password"]:focus {
      background: rgba(255, 255, 255, 0.6);
    }

    button[type="submit"] {
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

    button[type="submit"]:hover {
      background-color: rgba(93, 64, 55, 0.9);
    }
  </style>
</head>
<body>
    <div class="glass-container">
        <h2>Register</h2>

        <form method="post">
            <!-- input for first name -->
            <div>
                <label for="firstName">First Name:</label>
                <input type="text" id="firstName" name="firstName" required>
            </div><br>

            <!-- input for last name -->
            <div>
                <label for="lastName">Last Name:</label>
                <input type="text" id="lastName" name="lastName" required>
            </div><br>

            <!-- input for course -->
            <div>
                <label for="course">Course:</label>
                <input type="text" id="course" name="course" required>
            </div><br>

            <!-- input for year level -->
            <div>
                <label for="yearLevel">Year Level:</label>
                <input type="text" id="yearLevel" name="yearLevel" required>
            </div><br>

            <!-- input for section -->
            <div>
                <label for="section">Section:</label>
                <input type="text" id="section" name="section" required>
            </div><br>

            <!-- input for username -->
            <div>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div><br>

            <!-- input for password -->
            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div><br>

            <!-- input for pin code -->
            <div>
                <label for="pinCode">Pin Code (max 8 digits):</label>
                <input type="text" id="pincode" name="pinCode" pattern="\d{1,8}" maxlength="8" inputmode="numeric" required>
            </div><br>

            <button type="submit">Register</button>
        </form>
    </div>
</body>
</html>