<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Petlover</title>
    <style>
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 9999;
            display: none;
            align-items: center;
            justify-content: center;
        }

        .modal-container {
            background: white;
            border-radius: 15px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.3);
            text-align: center;
            padding: 25px;
            position: relative;
            width: 400px;
            display: none;
        }

        .close-modal {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 22px;
            border: none;
            background: none;
            cursor: pointer;
            color: #ff5e62;
        }

        .modal-buttons {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 15px;
        }

        .btn-login,
        .btn-signup,
        .btn-remind-later {
            padding: 12px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            width: 120px;
            color: white;
            font-weight: bold;
        }

        .btn-login {
            background: #ff5e62;
        }

        .btn-login:hover {
            background: #e04a50;
        }

        .btn-signup {
            background: #42b883;
        }

        .btn-signup:hover {
            background: #369e6c;
        }

        .btn-remind-later {
            background: #ffd700;
            color: black;
        }

        .btn-remind-later:hover {
            background: #ffcc00;
        }
    </style>
</head>

<body>
    <div class="overlay" id="overlay">
        <div class="modal-container" id="modalContainer">
            <button class="close-modal" onclick="closeModal()">&times;</button>
            <h2>Do you have an account?</h2>
            <p>Please Login or Sign Up</p>
            <div class="modal-buttons">
                <button class="btn-login" onclick="window.location.href='../PetLover/loginuser/login.php'">Login</button>
                <button class="btn-signup" onclick="window.location.href='../PetLover/loginuser/login.php'">Sign Up</button>
            </div>
            <button class="btn-remind-later" onclick="closeModal()">Remind Me Later</button>
        </div>
    </div>

    <script>
        function showModal() {
            document.getElementById("overlay").style.display = "flex";
            document.getElementById("modalContainer").style.display = "block";
        }

        function closeModal() {
            document.getElementById("overlay").style.display = "none";
            document.getElementById("modalContainer").style.display = "none";
            localStorage.setItem("modalDismissed", Date.now());
        }

        // Function to check if the user is logged in
        function isUserLoggedIn() {
            return localStorage.getItem("authToken") === "true";
        }

        // Function to determine whether the modal should be displayed
        function shouldShowModal() {
            const lastDismissed = localStorage.getItem("modalDismissed");

            if (!lastDismissed) {
                return true;
            }

            const elapsedTime = Date.now() - parseInt(lastDismissed, 10);
            return elapsedTime >= 5 * 60 * 1000; // Show again after 5 minutes
        }

        // Run when the page loads
        window.onload = function() {
            if (isUserLoggedIn()) {
                console.log("User is logged in. Modal will not be shown.");
                return;
            }

            if (shouldShowModal()) {
                setTimeout(showModal, 5000); // Show modal after 5 seconds
            }
        };
    </script>
</body>

</html>