<?php include 'header.php';
include 'track.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dog Gallery</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        .parent {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 8px;
            padding: 20px;
        }

        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            background: white;
            padding-bottom: 40px;
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-radius: 10px;
        }

        .gallery-item:hover img {
            transform: scale(1.1);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        }

        .dog-name {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 1.2rem;
            color: white;
            background: rgba(0, 0, 0, 0.6);
            padding: 5px 10px;
            border-radius: 5px;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .gallery-item:hover .dog-name {
            opacity: 1;
        }

        .icons-container {
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .like-icon,
        .eye-icon {
            font-size: 1.5rem;
            cursor: pointer;
            transition: transform 0.2s ease;
            background: rgba(255, 255, 255, 0.7);
            padding: 5px;
            border-radius: 50%;
        }

        .like-icon:hover,
        .eye-icon:hover {
            transform: scale(1.2);
        }

        .like-icon {
            color: red;
        }

        .like-count {
            font-size: 1rem;
            font-weight: bold;
            color: black;
        }

        /* Modal Styling */
        .modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 999;
        }

        .modal-content {
            position: relative;
            max-width: 90%;
            max-height: 90%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .modal-content img {
            max-width: 100%;
            max-height: 100%;
            border-radius: 10px;
            object-fit: contain;
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 30px;
            font-weight: bold;
            color: white;
            cursor: pointer;
            background: rgba(0, 0, 0, 0.6);
            padding: 10px;
            border-radius: 50%;
            transition: 0.3s;
        }

        .close-btn:hover {
            background: rgba(255, 0, 0, 0.8);
        }

        /* Responsive Styling */
        @media (max-width: 600px) {
            .parent {
                grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
                gap: 5px;
                padding: 10px;
            }

            .gallery-item {
                padding-bottom: 30px;
            }

            .dog-name {
                font-size: 1rem;
                padding: 4px 8px;
            }

            .like-icon,
            .eye-icon {
                font-size: 1.2rem;
            }
        }
    </style>
</head>

<body><br>

    <center>
        <h2>Take More Images Of Pets</h2>
    </center>

    <div class="parent">
        <?php
        $dogs = [
            ["src" => "https://pets-grooming.axiomthemes.com/wp-content/uploads/2016/07/image-22.jpg", "name" => "zack"],
            ["src" => "https://pets-grooming.axiomthemes.com/wp-content/uploads/2016/07/image-21.jpg", "name" => "luna"],
            ["src" => "https://pets-grooming.axiomthemes.com/wp-content/uploads/2016/07/image-20.jpg", "name" => "mayk"],
            ["src" => "https://tse4.mm.bing.net/th?id=OIP.1bKgkxMFs0aBf_jUOq0AGgHaE7&pid=Api&P=0&h=180", "name" => "buaty"],
            ["src" => "https://pets-grooming.axiomthemes.com/wp-content/uploads/2016/07/image-8.jpg", "name" => "Daisy"],
            ["src" => "https://cdn.pixabay.com/photo/2022/12/02/05/13/dog-7630252_1280.jpg", "name" => ""],
            ["src" => "https://pets-grooming.axiomthemes.com/wp-content/uploads/2016/07/image-15.jpg", "name" => "lucy"],
            ["src" => "https://pets-grooming.axiomthemes.com/wp-content/uploads/2016/07/image-12.jpg", "name" => "zozo"],
            ["src" => "https://cdn.pixabay.com/photo/2024/03/14/08/52/pug-8632718_1280.jpg", "name" => "buzo"]
        ];

        foreach ($dogs as $index => $dog) {
            echo '<div class="gallery-item" id="dog-' . $index . '">';
            echo '<img src="' . $dog["src"] . '" alt="' . $dog["name"] . '">';
            echo '<div class="dog-name">' . $dog["name"] . '</div>';
            echo '<div class="icons-container">';
            echo '<span class="eye-icon" onclick="openZoomModal(this)">👁️</span>';
            echo '<span class="like-icon" onclick="incrementLike(this)">❤️</span>';
            echo '<span class="like-count">0</span>';
            echo '</div>';
            echo '</div>';
        }
        ?>
    </div>

    <script>
        function incrementLike(element) {
            let likeCountElement = element.nextElementSibling;
            let likeCount = parseInt(likeCountElement.innerText);
            likeCountElement.innerText = likeCount + 1;
        }

        function openZoomModal(element) {
            let imgSrc = element.parentElement.parentElement.querySelector("img").src;
            let modal = document.createElement("div");
            modal.classList.add("modal");
            modal.innerHTML = `
                <div class="modal-content">
                    <span class="close-btn" onclick="this.parentElement.parentElement.remove()">✖</span>
                    <img src="${imgSrc}" alt="Zoomed Image">
                </div>
            `;
            document.body.appendChild(modal);
            modal.style.display = "flex";
        }

        document.addEventListener("DOMContentLoaded", function() {
            // Load like counts from localStorage when page loads
            document.querySelectorAll(".gallery-item").forEach((item, index) => {
                let likeCountElement = item.querySelector(".like-count");
                let savedLikes = localStorage.getItem("likeCount-" + index);

                if (savedLikes) {
                    likeCountElement.innerText = savedLikes;
                }
            });
        });

        function incrementLike(element) {
            let likeCountElement = element.nextElementSibling;
            let likeCount = parseInt(likeCountElement.innerText) + 1;
            likeCountElement.innerText = likeCount;

            // Save the updated like count in localStorage
            let index = [...document.querySelectorAll(".like-icon")].indexOf(element);
            localStorage.setItem("likeCount-" + index, likeCount);
        }
    </script>

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <?php
    include 'footer.php';
    ?>

</body>

</html>