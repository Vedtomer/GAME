<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
          
        body {
            font-family: Arial, sans-serif;
        }

        .login-container {
    min-width: 500px;
    padding: 40px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

        /* Styles for the modal container */
        .modal-container {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        /* Styles for the modal content */
        .modal-content {
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            width: 300px;
            text-align: center;
        }

        /* Styles for the form inside the modal */
        form {
            display: flex;
            flex-direction: column;
        }

        /* Style for the close button */
        .close-btn {
            cursor: pointer;
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 18px;
        }
  
       

        .w3-container.w3-teal h1 {
            display: block;
        }
        .card-body{
            height: 200px;
            width: 400px;
        }

        
    
    </style>
  </head>
  <body>
    <div class="w3-sidebar w3-light-grey w3-bar-block" style="width:14%">
        <h3 class="w3-bar-item">Dashboard</h3>
        <a href="userdata" class="w3-bar-item w3-button">Users</a>
        <a href="#" class="w3-bar-item w3-button">Add Number</a>
        <a href="#" class="w3-bar-item w3-button">Result</a>
    </div>

    <div style="margin-left:14%">
        <div class="w3-container w3-teal">
            <h1>My Page</h1>
            {{-- <a href="#" style="float: right; color: #fff; text-decoration: none; margin-right: 10px;">Logout</a> --}}
        </div>

        <div class="login-container">
<!-- Button to open the modal -->
<button id="openModalBtn">Open Modal</button>

<!-- Modal container -->
<div class="modal-container" id="myModal">
    <!-- Modal content -->
    <div class="modal-content">
        <!-- Close button -->
        <span class="close-btn" onclick="closeModal()">&times;</span>

        <!-- Form inside the modal -->
        <form>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Submit</button>
        </form>
    </div>
</div>


    <h2>user data</h2>
   
</div>
<script>
    // Function to open the modal
    function openModal() {
        document.getElementById("myModal").style.display = "flex";
    }

    // Function to close the modal
    function closeModal() {
        document.getElementById("myModal").style.display = "none";
    }

    // Event listener for the open modal button
    document.getElementById("openModalBtn").addEventListener("click", openModal);
</script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
