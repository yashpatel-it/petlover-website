<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.min.css">
    <link rel="stylesheet" href="css/style.css">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">

    <!-- Flaticon Font -->
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .banner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 500px;
            padding: 20px;
            background: linear-gradient(to bottom, rgb(232, 87, 77), rgb(241, 142, 84));
            background-size: cover;
            color: white;
        }

        .banner-text {
            max-width: 50%;
            font-size: 2rem;
            font-weight: bold;
            line-height: 1.5;
            transition: transform 0.3s ease, color 0.3s ease;
        }

        .banner-text:hover {
            transform: scale(1.05);
            color: #e0f7ff;
        }

        .banner-image {
            max-width: 45%;
        }

        .banner-image img {
            width: 100%;
            border-radius: 10px;
            transition: transform 0.3s ease;
        }

        .banner-image img:hover {
            transform: scale(1.05);
        }

        @media (max-width: 768px) {
            .banner {
                flex-direction: column;
                text-align: center;
            }

            .banner-text,
            .banner-image {
                max-width: 100%;
            }
        }

        header {
            margin: 20px;
        }

        header h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        header p {
            font-size: 1rem;
            color: #6c757d;
        }

        /* Card Container */
        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 20px;
        }

        /* Card Styles */
        .card {
            background: linear-gradient(to bottom, #fdd835, #fff8e1);
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            text-align: center;
            width: 250px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card-image img {
            border-radius: 50%;
            margin-top: 20px;
            width: 100px;
            height: 100px;
            object-fit: cover;
        }

        .card h2 {
            margin: 10px 0;
            font-size: 1.5rem;
        }

        .card p {
            font-size: 0.9rem;
            color: #6c757d;
            margin: 10px 20px;
        }

        /* Button Styles */
        .adopt-button {
            background-color: #6a1b9a;
            border: none;
            border-radius: 20px;
            color: #fff;
            cursor: pointer;
            font-size: 1rem;
            margin: 10px 0;
            padding: 10px 20px;
            transition: background-color 0.3s;
        }

        .adopt-button:hover {
            background-color: #4a148c;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .card-container {
                flex-direction: column;
                align-items: center;
            }
        }

        /* Add a slide-in from left transition */
        .slide-in-left {
            opacity: 0;
            transform: translateY(-100%);
            /* Start position is off-screen */
            animation: slideInLeft 2s forwards;
        }

        .card a:hover {
            text-decoration: none;
            color: white;
        }

        @keyframes slideInLeft {
            0% {
                opacity: 0;
                transform: translateY(-100%);
                /* Off-screen left */
            }

            100% {
                opacity: 1;
                transform: translateY(0);
                /* Final position */
            }
        }

        .back-to-top {
            position: fixed;
            display: block;
            right: 30px;
            bottom: 30px;
            z-index: 11;
            animation: action 1s infinite alternate;
        }

        @keyframes action {
            0% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(-15px);
            }
        }

        .container-wrapper {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            max-width: 90%;
            margin: auto;
        }

        /* Small screen adjustments */
        @media (max-width: 768px) {
            .container-wrapper {
                flex-direction: column;
                align-items: center;
                text-align: center;
                gap: 15px;
            }

            .container {
                width: 100%;
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            #available-pets {
                border-right: none;
                border-bottom: 2px solid #ddd;
                /* Separator for sections */
                padding-bottom: 10px;
                padding-right: 0;
            }

            #adopted-pets {
                padding-left: 0;
            }

            .section-title {
                font-size: 20px;
                margin-bottom: 10px;
            }
        }

        /* Extra small screen (mobile) adjustments */
        @media (max-width: 480px) {
            .container-wrapper {
                max-width: 100%;
                padding: 10px;
            }

            .section-title {
                font-size: 18px;
            }

            .container {
                gap: 10px;
            }
        }
    </style>
</head>

<body id="top">
    <?php
    include 'header.php';
    include 'track.php';
    ?>
    <div class="banner">
        <div class="banner-text slide-in-left">
            One step towards pet adoption can change a life and society!
        </div>
        <div class="banner-image slide-in-left">
            <img src="https://www.juspets.in/assets/img/svgs/adopt-hero.svg" alt="Puppy in hands">
        </div>
    </div>
    <header>
        <center>
            <h1>Adopt a Pet or Help Save Everyone.</h1>
        </center>
        <center>
            <p>Give a loving home to a furry friend or support a life in need—every act of kindness makes a difference!</p>
        </center>
    </header>

    <section class="card-container">
        <!-- Card 1 -->
        <div class="card">
            <div class="card-image">
                <img src="https://cdn.pixabay.com/photo/2023/12/12/21/20/dog-8445917_1280.jpg" alt="Charlie">
            </div>
            <h2>CHARLIE</h2>
            <p>The Playful Companion</p>
            <p>Breed: Golden Retriever</p>
            <p>Age : 2 Years</p>
            <a href="petadoptform.php" class="adopt-button">Adopt Pet</a>
        </div>

        <!-- Card 2 -->
        <div class="card">
            <div class="card-image">
                <img src="https://cdn.pixabay.com/photo/2024/03/14/08/52/pug-8632718_1280.jpg" alt="Lucy">
            </div>
            <h2>LUCY</h2>
            <p>The Gentle Soul</p>
            <p>Breed: Pug</p>
            <p>Age : 1.5 Years</p>
            <a href="petadoptform.php" class="adopt-button">Adopt Pet</a>
        </div>

        <!-- Card 3 -->
        <div class="card">
            <div class="card-image">
                <img src="https://cdn.pixabay.com/photo/2024/03/25/20/30/german-shorthaired-pointer-8655457_960_720.jpg" alt="Max">
            </div>
            <h2>MAX</h2>
            <p>The Adventurous Spirit</p>
            <p>Breed: German Shorthaired</p>
            <p>Age : 3 Years</p>
            <a href="petadoptform.php" class="adopt-button">Adopt Pet</a>
        </div>

        <div class="card">
            <div class="card-image">
                <img src="https://hips.hearstapps.com/hmg-prod/images/popular-dog-names-buddy-1560526199.jpg?crop=1xw:1xh;center,top&resize=980:*" alt="Buddy">
            </div>
            <h2>Buddy</h2>
            <p>The Playful Companion</p>
            <p>Breed: Golden Retriever</p>
            <p>Age: 3 Years</p>
            <a href="dogadoptform.php" class="adopt-button">Adopt Pet</a>
        </div>

        <!-- Card 4 -->
        <div class="card">
            <div class="card-image">
                <img src="https://cdn.pixabay.com/photo/2022/12/02/05/13/dog-7630252_1280.jpg" alt="Daisy">
            </div>
            <h2>DAISY</h2>
            <p>The Loving Guardian</p>
            <p>Breed: Labrador Retriever</p>
            <p>Age : 2.5 Years</p>
            <a href="petadoptform.php" class="adopt-button">Adopt Pet</a>
        </div>
        <!-- Card 5 -->
        <div class="card">
            <div class="card-image">
                <img src="https://tse4.mm.bing.net/th?id=OIP.1bKgkxMFs0aBf_jUOq0AGgHaE7&pid=Api&P=0&h=180" alt="Luna">
            </div>
            <h2>LUNA</h2>
            <p>The Playful Explore</p>
            <p>Breed: Bangal Cat</p>
            <p>Age : 1.8 Years</p>
            <a href="catadoptform.php?image=https://tse4.mm.bing.net/th?id=OIP.1bKgkxMFs0aBf_jUOq0AGgHaE7&pid=Api&P=0&h=180" class="adopt-button">Adopt Pet</a>
        </div>
        <!-- Card 6 -->
        <div class="card">
            <div class="card-image">
                <img src="https://tse1.mm.bing.net/th?id=OIP.WTgcJrDAtdKYu38V7OcfygHaEo&pid=Api&P=0&h=180" alt="Delly">
            </div>
            <h2>DELLY</h2>
            <p>The Loving Guardian</p>
            <p>Breed: Mainee Coon</p>
            <p>Age : 2.5 Years</p>
            <a href="catadoptform.php" class="adopt-button">Adopt Pet</a>
        </div>
        <!-- Card 7 -->
        <div class="card">
            <div class="card-image">
                <img src="https://tse1.mm.bing.net/th?id=OIP.HK9TvyV-d5MrfQ0WRlXUuQHaFz&pid=Api&P=0&h=180" alt="Oliver">
            </div>
            <h2>OLIVER</h2>
            <p>The Gentle Soule</p>
            <p>Breed: Ragdoll</p>
            <p>Age : 3 Years</p>
            <a href="catadoptform.php" class="adopt-button">Adopt Pet</a>
        </div>
        <!-- Card 8 -->
        <div class="card">
            <div class="card-image">
                <img src="https://tse3.mm.bing.net/th?id=OIP.xskf-paZAwA-OYkQS_KUlAHaLH&pid=Api&P=0&h=180" alt="Simba">
            </div>
            <h2>SIMBA</h2>
            <p>The Loving Guardian</p>
            <p>Breed: Oriental sorthair</p>
            <p>Age : 2.5 Years</p>
            <a href="catadoptform.php" class="adopt-button">Adopt Pet</a>
        </div>
    </section>
    <div class="container-wrapper">
        <div>
            <h2 class="section-title">Available Pets</h2>
            <div id="available-pets" class="container"></div>
        </div>

        <div>
            <h2 class="section-title">Adopted Pets</h2>
            <div id="adopted-pets" class="container"></div>
        </div>
    </div>

    <?php
    include 'footer.php';
    ?>
    <!-- Back to Top -->
    <a href="#top" class="btn btn-lg btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script>
        const faqButtons = document.querySelectorAll('.faq-btn');

        faqButtons.forEach(button => {
            button.addEventListener('click', () => {
                const faqItem = button.closest('.faq-item');
                faqItem.classList.toggle('active');
            });
        });

        $(document).ready(function() {
            $(".back-to-top").click(function(event) {
                event.preventDefault(); // Prevent default anchor behavior
                $("html, body").animate({
                    scrollTop: 0
                }, 800); // Smooth scroll
            });
        });

        /* Show button when user scrolls down */
        $(window).scroll(function() {
            if ($(this).scrollTop() > 100) {
                $('.back-to-top').fadeIn();
            } else {
                $('.back-to-top').fadeOut();
            }
        });
    </script>
    <script>
        let pets = [{
                id: 1,
                name: "Charlie",
                breed: "Golden Retriever",
                age: "2 Years",
                image: "https://cdn.pixabay.com/photo/2023/12/12/21/20/dog-8445917_1280.jpg",
                status: "available"
            },
            {
                id: 2,
                name: "Lucy",
                breed: "Pug",
                age: "1.5 Years",
                image: "https://cdn.pixabay.com/photo/2024/03/14/08/52/pug-8632718_1280.jpg",
                status: "available"
            },
            {
                id: 3,
                name: "Bella",
                breed: "Labrador",
                age: "3 Years",
                image: "data:image/jpeg;base64,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",
                status: "adopted"
            },
            {
                id: 4,
                name: "Rocky",
                breed: "Bulldog",
                age: "4 Years",
                image: "data:image/jpeg;base64,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",
                status: "adopted"
            }
        ];

        function loadAdoptionStatus() {
            let storedData = localStorage.getItem("adoptedPets");
            if (storedData) {
                let adoptedPets = JSON.parse(storedData);
                pets.forEach(pet => {
                    if (adoptedPets.includes(pet.id)) {
                        pet.status = "adopted";
                    }
                });
            }
        }

        function saveAdoptionStatus() {
            let adoptedPets = pets.filter(pet => pet.status === "adopted").map(pet => pet.id);
            localStorage.setItem("adoptedPets", JSON.stringify(adoptedPets));
        }

        function renderPets() {
            const availableContainer = document.getElementById("available-pets");
            const adoptedContainer = document.getElementById("adopted-pets");

            availableContainer.innerHTML = "";
            adoptedContainer.innerHTML = "";

            pets.forEach(pet => {
                let card = document.createElement("div");
                card.className = "card";
                card.innerHTML = `
                    ${pet.status === "adopted" ? '<span class="adopted-badge">Adopted</span>' : ""}
                    <img src="${pet.image}" alt="${pet.name}">
                    <h2>${pet.name}</h2>
                    <p>Breed: ${pet.breed}</p>
                    <p>Age: ${pet.age}</p>
                `;

                if (pet.status === "adopted") {
                    adoptedContainer.appendChild(card);
                } else {
                    availableContainer.appendChild(card);
                }
            });
        }

        function toggleAdoption(petId) {
            let pet = pets.find(p => p.id === petId);
            if (pet) {
                pet.status = pet.status === "adopted" ? "available" : "adopted";
                saveAdoptionStatus();
                renderPets();
            }
        }

        loadAdoptionStatus();
        renderPets();
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
</body>

</html>