<!DOCTYPE html>
<html>
<head>
    <title>Registered</title>
    <style>
    /* reset default spacing */
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
      height: 100vh;
      padding: 20px;
    }

    /* container with glassmorphism effect */
    .glass-container {
      background: rgba(255, 255, 255, 0.25);
      backdrop-filter: blur(14px);
      -webkit-backdrop-filter: blur(14px);
      padding: 2rem 3rem;
      box-shadow: 0 8px 30px rgba(85, 66, 41, 0.2);
      text-align: center;
      color: #4e342e;
      border: 1px solid rgba(255, 255, 255, 0.3);
      max-width: 500px;
      width: 100%;
    }

    h2 {
      font-size: 2rem;
      margin-bottom: 1rem;
      color: #5d4037;
    }

    p {
      font-size: 1.1rem;
      margin: 0.5rem 0;
    }

    /* container for the Yes/No links */
    .link-container {
      margin-top: 1.5rem;
      display: flex;
      justify-content: space-around;
    }

    /* button-like links */
    .link-container a {
      text-decoration: none;
      padding: 0.6rem 1.2rem;
      border-radius: 10px;
      font-weight: bold;
      color: white;
      background-color: rgba(93, 64, 55, 0.7);
      transition: background-color 0.3s ease;
    }

    .link-container a:hover {
      background-color: rgba(93, 64, 55, 0.9);
    }
  </style>

</head>
<body>
    <div class="glass-container">
        <!-- success message -->
        <h2>Registration Successful!</h2>
    
        <!-- simple form with message and redirect options -->
        <form method="GET" action="login.php">
            <p>Congratulations! You have successfully registered.</p>
    
            <p>Do you want to log in?</p>
    
            <div class="link-container">
                <a href="index.php">No</a>     <!-- redirects back to home or welcome -->
                <a href="login.php">Yes</a>    <!-- proceeds to login page -->
            </div>
        </form>
    </div>
</body>
</html>