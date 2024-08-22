<?php
session_start();
require 'Connection.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Check your details</title>
    <style>
      body, h1, h2, button {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Basic styles */
        body {
            background: linear-gradient(135deg, #004d40, #00796b);
            min-height: 100vh; /* Ensure the background covers the full viewport height */
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }

        header {
            background: linear-gradient(135deg, #004d40, #00796b);
            color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 1rem;
            display: flex;
            justify-content: space-between; /* Space between the items */
            align-items: center;
        }

        .header-content {
            display: flex;
            justify-content: space-between; /* Align items to opposite corners */
            width: 100%; /* Ensure it takes full width */
        }

        header h1 {
            margin: 0;
            font-size: 1.5rem; /* Adjust font size if needed */
        }

        #logoutButton {
            background-color: #f44336; /* A distinct color for the logout button */
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            cursor: pointer;
            font-size: 1rem;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        #logoutButton:hover {
            background-color: #c62828; /* Darker shade on hover */
        }

        table{
            background-color:transparent;
            color:white;
        }
        .user_dashboard button{
            background-color: lightgreen;
            margin-bottom:5px ;
            color: black;
            font-weight: bold;
            cursor: pointer;
            padding: 15px;
            font-size: 1rem;
            transition: background-color 0.3s, transform 0.3s; 
            border: 0;
            border-radius: 6px;
            box-shadow: rgba(45, 35, 66, .4) 0 2px 4px, rgba(45, 35, 66, .3) 0 7px 13px -3px, rgba(58, 65, 111, .5) 0 -3px 0 inset; 
       
        }
        .user_dashboard button:hover{
          background-color:white;
        }
        .user_dashboard{
        color:white;
        }
        @media (max-width: 768px) {
            header {
                flex-direction: column; /* Stack items vertically */
                align-items: flex-start; /* Align items to the start */
            }

            .header-content {
                width: 100%; /* Ensure full width for stacking */
                justify-content: space-between; /* Align items to opposite ends */
            }

            #logoutButton {
                margin-top: 0.5rem; /* Margin to separate logout button from welcome text */
            }
        }
    </style>
  </head>
  <body>
    <header>
      <div class="header-content">
          <h1>Welcome, User!</h1>
          <a href="admin_dashboard.php" class="user_dashboard"><button>Admin Dashboard</button></a>  
          <button id="logoutButton">Logout</button>
      </div>
    </header>
    <main>
      <h3 align="center"><mark>Check Your Details</mark></h3>  
      <center><table border="1" cellspacing="5">
       <tr>
         <td>Email</td>
          <td>Feedback1</td>
          <td>Feedback2</td>
          <td>Feedback3</td>
          <td>Remarks</td>
        </tr>
        <?php
        $rows = mysqli_query($conn, "SELECT * FROM feedback");
        if(!$rows) {
          die("Database query failed."); // Replace with proper error handling
        }
        $row = mysqli_fetch_all($rows, MYSQLI_ASSOC);

        ?>

        <?php foreach ($rows as $row) : ?>
        <tr>
       
          <td><?php echo $row["email"]; ?></td>
          <td><?php echo $row["feedback1"]; ?></td>
          <td><?php echo $row["feedback2"]; ?></td>
          <td><?php echo $row["feedback3"]; ?></td>
          <td><?php echo $row["remarks"]; ?></td>
        </tr>
      
        <?php endforeach; ?>
      </table>
  
    </main>
  </body>
</html>