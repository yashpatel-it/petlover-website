<?php
include 'header.php';
include 'track.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Care Landing</title>
    <!-- Font Awesome -->
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">


    <style>
        .hero-section {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: #ED6436;
            color: white;
            padding: 50px;
            border-radius: 15px;
            margin: 20px;
            font-family: Arial, sans-serif;

        }

        .hero-section .content {
            max-width: 50%;
        }

        .hero-section h1 {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 10px;
            color: black;
        }

        .hero-section p {
            font-size: 16px;
            color: #ddd;
            margin-bottom: 20px;
        }

        .cta-button {
            display: inline-block;
            background-color: #ffb400;
            color: black;
            padding: 12px 20px;
            font-size: 18px;
            font-weight: bold;
            text-decoration: none;
            border-radius: 5px;
            transition: 0.3s;
        }

        .cta-button:hover {
            background-color: #e6a700;
        }

        .hero-section .image img {
            max-width: 300px;
        }

        .hero-section a {
            text-decoration: none;
            color: white;
        }

        .features {
            display: flex;
            justify-content: space-around;
            padding: 20px;
            margin-top: -30px;
        }

        .feature-card {
            background: white;
            text-align: center;
            padding: 15px;
            width: 22%;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .feature-card img {
            width: 50px;
            margin-bottom: 10px;

        }

        .image img {
            border-radius: 10px;
            margin-right: 100px;
        }

        .feature-card h3 {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .feature-card p {
            font-size: 14px;
            color: #555;
        }

        .services-section {
            background-color: #ED6436;
            padding: 30px;
            border-radius: 20px;
            max-width: 1300px;
            margin: auto;
        }



        .services-section h3 {
            color: black;
            font-size: 22px;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .services {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 20px;
        }

        .service-card {
            flex: 1;
            min-width: 180px;
            max-width: 200px;
            text-align: center;
            color: white;
        }


        .service-card img {
            width: 50px;
            margin-bottom: 10px;
        }

        .service-card h3 {
            background-color: #d8921b;
            padding: 8px;
            border-radius: 5px;
            font-size: 14px;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .service-card p {
            font-size: 12px;
            color: #fff;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .services {
                flex-direction: column;
                align-items: center;
            }

            .service-card {
                max-width: 250px;
            }
        }

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
        }

        h2 {
            margin-bottom: 20px;
            text-align: center;
        }

        .card-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            width: 300px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card img {
            display: block;
            margin: 0 auto;
            width: 120px;
            /* Adjust image size */
            height: 120px;
            /* Ensure it remains circular */
            border-radius: 50%;
            /* Makes image round */
            object-fit: cover;
            border: 4px solid #ED6436;
        }

        .qualification {
            font-weight: bold;
            color: #666;
            font-size: 14px;
        }

        .details {
            font-size: 14px;
            color: #444;
        }

        .phone {
            font-weight: bold;
            color: #ED6436;
            cursor: pointer;
            transition: color 0.3s;
        }

        .phone:hover {
            color: #ED6436;
        }

        .consult-btn {
            display: inline-block;
            align-items: center;
            padding: 12px 24px;
            font-size: 18px;
            color: white;
            background-color: #ED6436;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 20px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        }

        .consult-btn a {
            text-decoration: none;
            color: white;
        }

        .consult-btn:hover {
            background-color: #ED6436;
            transform: scale(1.05);
        }


        .faq {
            margin-top: 20px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            max-width: 1200px;
            margin: 40px auto;
        }

        .faq h3 {
            font-size: 2em;
            color: #ED6436;
            margin-bottom: 20px;
            display: flex;
            justify-content: flex-start;

        }

        .faq-btn {
            display: flex;
            justify-content: space-between;
            width: 100%;
            padding: 10px 15px;
            font-size: 16px;
            background-color: #f0f0f0;
            border: none;
            text-align: left;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .faq-btn:hover {
            background-color: #e0e0e0;
            color: #ED6436;
        }

        .arrow {
            transition: transform 0.3s ease;
        }

        .answer {
            max-height: 0;
            /* Initially hidden */
            overflow: hidden;
            padding: 0 15px;
            background-color: #fafafa;
            border-left: 2px solid #ccc;
            border-bottom: 1px solid #ccc;
            transition: max-height 0.5s ease, padding 0.5s ease;
            /* Transition for smooth opening/closing */
        }

        .faq-item {
            margin-bottom: 5px;
        }

        .faq-item.active .answer {
            max-height: 500px;
            /* This should be large enough to fit content */
            padding: 15px 15px;
        }

        .faq-item.active .arrow {
            transform: rotate(180deg);
            /* Rotates the arrow when open */
        }

        .faq-btn:focus {
            outline: none;
        }

        /* For small screens (e.g., mobile), make the cards stack vertically */
        @media (max-width: 768px) {
            .card-container {
                grid-template-columns: repeat(2, 1fr);
                /* 2 cards in a row */
            }
        }

        /* For very small screens (e.g., mobile portrait), make the cards stack in one column */
        @media (max-width: 480px) {
            .card-container {
                grid-template-columns: 1fr;
                /* 1 card in a row */
            }
        }

        @media (max-width: 1024px) {
            .hero-section {
                flex-direction: column;
                text-align: center;
                padding: 30px;
            }

            .hero-section .content {
                max-width: 100%;
            }

            .hero-section .image img {
                max-width: 250px;
                margin-top: 20px;
            }

            .features {
                flex-wrap: wrap;
                gap: 15px;
            }

            .feature-card {
                width: 45%;
                margin-bottom: 10px;
            }

            .services {
                flex-wrap: wrap;
                justify-content: center;
            }

            .service-card {
                max-width: 250px;
                text-align: center;
            }
        }

        @media (max-width: 768px) {
            .hero-section {
                padding: 20px;
            }

            .hero-section h1 {
                font-size: 22px;
            }

            .features {
                flex-direction: column;
                align-items: center;
            }

            .feature-card {
                width: 80%;
            }

            .services {
                flex-direction: column;
                align-items: center;
            }

            .service-card {
                width: 90%;
            }

            .card-container {
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .card {
                width: 90%;
            }
        }

        @media (max-width: 480px) {
            .hero-section {
                padding: 15px;
            }

            .hero-section h1 {
                font-size: 20px;
            }

            .cta-button {
                font-size: 16px;
                padding: 10px;
            }

            .features {
                flex-direction: column;
                gap: 10px;
            }

            .feature-card {
                width: 90%;
            }

            .service-card {
                max-width: 100%;
            }

            .faq h3 {
                font-size: 1.5em;
            }
        }



        .container123 {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 50px;
            max-width: 1200px;
            margin: auto;
        }

        .image-container123 {
            flex: 1;
            padding-right: 30px;
        }

        .image-container123 img {
            width: 100%;
            max-width: 800px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .text-container123 {
            flex: 2;
        }

        h2 {
            text-align: center;
            font-size: 28px;
            color: #333;
            font-weight: bold;
        }

        .service-step {
            display: flex;
            align-items: flex-start;
            margin: 20px 0;
        }

        .service-step img {
            width: 40px;
            height: 40px;
            margin-right: 15px;

        }

        .service-step h3 {
            margin: 0;
            font-size: 20px;
            color: #333;
            padding-left: 30px;
        }

        .service-step p {
            margin: 5px 0 0;
            color: #666;
            font-size: 16px;
            padding-left: 30px;
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

        .vaccination-container {
            max-width: 700px;
            margin: auto;
            padding: 20px;
            background: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .vaccination-container h2,
        .vaccination-container h3 {
            color: #333;
        }

        .vaccination-services {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .service-box {
            width: 45%;
            background: #fff;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.1);
        }

        .service-box h4 {
            color: #007bff;
            margin-bottom: 10px;
        }

        .service-box ul {
            list-style-type: disc;
            text-align: left;
            margin-left: 20px;
        }

        .vaccination-container a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }

        .vaccination-container a:hover {
            text-decoration: underline;
        }

        .justify-text {
            text-align: justify;
        }
    </style>
</head>

<body>

    <div class="hero-section">
        <div class="content">
            <h1>Need Advice on your Pet's health? Now Ask a Vet Online 24/7</h1>
            <p>Get Best Veterinary Advice online from the comfort of your home.</p>
            <a href="vetbookform.php" class="cta-button">Consult A Vet Online ➤</a>
        </div>
        <div class="image">
            <img src="https://tse4.mm.bing.net/th?id=OIP._YApSHVFAFtL5aCuyjSV1QAAAA&pid=Api&P=0&h=180" alt="Vet with pet">
        </div>
    </div>

    <div class="features">
        <div class="feature-card">
            <img src="https://cdn-icons-png.flaticon.com/128/10373/10373038.png" alt="Affordable Vetcare">
            <h3>India's No. 1 Online Vet Consultation Service</h3>
            <p>Ask Top Vet's Advice</p>
        </div>
        <div class="feature-card">
            <img src="https://cdn-icons-png.flaticon.com/128/6196/6196168.png" alt="Affordable Vetcare">
            <h3>Trusted & Affordable Vetcare</h3>
            <p>Consult Vet @ 199</p>
        </div>
        <div class="feature-card">
            <img src="https://cdn-icons-png.flaticon.com/128/5486/5486300.png" alt="Easy Booking">
            <h3>Easy Appointment Booking</h3>
            <p>Book at a few clicks</p>
        </div>
        <div class="feature-card">
            <img src="https://cdn-icons-png.flaticon.com/128/813/813747.png" alt="Consult in 15 min">
            <h3>Consult Vet in 15 minutes</h3>
            <p>Fastest Vet service in India</p>
        </div>
    </div><br><br>

    <div class="vaccination-container">
        <h2>Vaccination Services for Pets</h2>
        <p class="justify-text">Vaccinating our pets against fatal diseases is an important and responsible duty as pet parents. <strong>VetLive</strong> offers hassle-free pet vaccination services at home for dogs, cats, rabbits, small pets, cattle, and other companion animals.</p>

        <p class="justify-text">No more hospital visits are required to vaccinate your pet every time. Experienced vets/paravets from VetLive will come to your location for vaccination.</p>

        <h3>Our Services</h3>

        <div class="vaccination-services">
            <div class="service-box">
                <h4>Dog Vaccination at Home</h4>
                <ul>
                    <li>Puppy DP</li>
                    <li>7 in 1</li>
                    <li>Anti Rabies</li>
                    <li>Kennel Cough</li>
                </ul>
            </div>

            <div class="service-box">
                <h4>Cat Vaccination at Home</h4>
                <ul>
                    <li>Tricat</li>
                    <li>Anti Rabies</li>
                </ul>
            </div>
        </div>

        <p><strong>Book a home vaccination service for your pet online now.</strong></p>
        <p>For any support, please <a href="https://wa.me/919825184005" target="_blank">WhatsApp: 91-9825184005</a></p>
    </div>
    <center>
        <h2>Ask Trusted Vet’s Advice Online from your Home</h2>
    </center>

    <div class="services-section">
        <div class="services">
            <div class="service-card">
                <img src="https://cdn-icons-png.flaticon.com/128/1052/1052331.png" alt="Health">
                <h3>General Pet Health Consultation</h3>
                <p>Minor Illness (Dog Fever, Vomiting, Diarrhea...)</p>
            </div>
            <div class="service-card">
                <img src="https://cdn-icons-png.flaticon.com/128/5775/5775160.png" alt="Behavior">
                <h3>Pet Behavioral Consultation</h3>
                <p>(Dog Excessive barking, Aggression, Anxiety...)</p>
            </div>
            <div class="service-card">
                <img src="https://cdn-icons-png.flaticon.com/128/1351/1351843.png" alt="Skin">
                <h3>Pet Skin and Coat Care Consultation</h3>
                <p>(Dog Hair Fall, Skin infections, Wound care...)</p>
            </div>
            <div class="service-card">
                <img src="https://cdn-icons-png.flaticon.com/128/8876/8876508.png" alt="Nutrition">
                <h3>Pet Nutrition Consultation</h3>
                <p>(Cat Diet, Diabetes dog diet, Bird Nutrition...)</p>
            </div>
            <div class="service-card">
                <img src="https://cdn-icons-png.flaticon.com/128/9513/9513911.png" alt="Second Opinion">
                <h3>Second Vet Opinion</h3>
                <p>(Medical Report analysis, Chronic disease management...)</p>
            </div>
            <div class="service-card">
                <img src="https://cdn-icons-png.flaticon.com/128/15626/15626044.png" alt="Parenting">
                <h3>Pet Parenting Consultation</h3>
                <p>(New puppy home, Puppy vaccination...)</p>
            </div>
        </div>
    </div><br><br><br>

    <div class="container123">
        <div class="image-container123">
            <img src="https://dm6g3jbka53hp.cloudfront.net/static-images/home-page_user-reviews-section_vet-review-image-2.png" alt="Veterinarian treating pet">
        </div>
        <div class="text-container123">
            <h2>How Online Veterinarian Service Works?</h2>


            <div class="service-step">
                <img src="https://cdn-icons-png.flaticon.com/128/942/942802.png" alt="">
                <div>
                    <h3>Submit Your Query</h3>
                    <p>Have a question about your pet's health, nutrition, behavior, or other concerns? Submit your query to get expert assistance from a licensed veterinarian.</p>
                </div>
            </div>

            <div class="service-step">
                <img src="https://cdn-icons-png.flaticon.com/128/11061/11061455.png" alt="Pet Icon">
                <div>
                    <h3>Share Details About Your Pet</h3>
                    <p>Provide details such as age, breed, and medical history to get personalized advice. You can also upload relevant photos or medical documents.</p>
                </div>
            </div>

            <div class="service-step">
                <img src="https://cdn-icons-png.flaticon.com/128/2364/2364991.png" alt="Veterinarian Icon">
                <div>
                    <h3>Get a Response from a Veterinarian</h3>
                    <p>A licensed veterinarian will review your query and respond with professional advice. Depending on the issue, they may initiate a live chat or video session.</p>
                </div>
            </div>

        </div>
    </div>

    <div class="container">
        <h2>Consult Experienced Veterinary Doctor Online</h2>
        <div class="card-container">
            <div class="card">
                <img src="https://tse4.mm.bing.net/th?id=OIP.eDfds46iXzl6qTA5yVkRJAHaHG&pid=Api&P=0&h=180" alt="Dr. Pritish Rath">
                <h3>Dr. Pritish Rath</h3>
                <p class="qualification">B.V.Sc. & AH, M.V.Sc, Ph.D (Surgery & Radiology)</p>
                <p class="details">Experienced Veterinary Consultant & Surgeon, With expertise in Veterinary Surgery, Radiology, Preventive Care, Nutrition, Wound care management, and Anesthesia monitoring.</p>
                <p class="phone">📞 +91 9876543210</p>
            </div>
            <div class="card">
                <img src="https://tse4.mm.bing.net/th?id=OIP.eDfds46iXzl6qTA5yVkRJAHaHG&pid=Api&P=0&h=180" alt="Dr. Prafulla Kumar Mishra">
                <h3>Dr. Prafulla Kumar Mishra</h3>
                <p class="qualification">B.V.Sc. & AH. (Gold Medalist)</p>
                <p class="details">Experienced Veterinary consultant & Surgeon with expertise in treating pet animals, farm animals such as cattle, equine, bovine, and birds. Speaks English, Hindi, & Odia.</p>
                <p class="phone">📞 +91 9876543211</p>
            </div>
            <div class="card">
                <img src="https://tse4.mm.bing.net/th?id=OIP.eDfds46iXzl6qTA5yVkRJAHaHG&pid=Api&P=0&h=180" alt="Dr. Jupaka Shashank">
                <h3>Dr. Jupaka Shashank</h3>
                <p class="qualification">B.V.Sc. & AH., M.V.Sc., Ph.D (Medicine)</p>
                <p class="details">Dr. Shashank is a veterinary doctor from Hyderabad who has profound research and clinical experience in infectious disease medicine. Provides treatment for various disorders in dogs, cats, birds, goats, and cattle.</p>
                <p class="phone">📞 +91 9876543212</p>
            </div>
        </div>
    </div>

    <center><button class="consult-btn"><a href="vetbookform.php">Start Consultation</a></button></center><br>

    <div class="section faq">
        <h3>FAQs</h3>

        <div class="faq-item">
            <button class="faq-btn">
                Q1. Can I consult for my dog/cat?
                <span class="arrow">▼</span>
            </button>
            <div class="answer">
                <p>Yes, you can consult a vet online for your dog/cat. Experienced veterinarians at Vetlive will provide you the best advice on matters concerning your Pet dog. In fact, consulting a veterinary doctor online is sometimes more convenient and sufficient to get a good remedy for almost all minor health issues of your dog.</p>
            </div>
        </div>

        <div class="faq-item">
            <button class="faq-btn">
                Q2. I am unable to know the problem that my Pet is currently facing? Can I consult a vet online?
                <span class="arrow">▼</span>
            </button>
            <div class="answer">
                <p>Yes, You can consult a vet online who will be able to assess the symptoms your pet is experiencing to identify the underlying health issue. Based on the assessment, the vet would suggest a further course of action or treatment.</p>
            </div>
        </div>

        <div class="faq-item">
            <button class="faq-btn">
                Q3. Can I consult a vet for my Exotic Pet?
                <span class="arrow">▼</span>
            </button>
            <div class="answer">
                <p>Yes, you can consult a vet online for your exotic pet. Vetlive vets are experienced in treating exotic pets such as rabbits, hamsters, Turtle, guinea pigs, chinchillas, Pet mouse, and squirrels. For queries. Please contact us through Whatsapp at +91 7010200909</p>
            </div>
        </div>
        <div class="faq-item">
            <button class="faq-btn">
                Q4. Is online Vet Consultation service available all over India?
                <span class="arrow">▼</span>
            </button>
            <div class="answer">
                <p>No, This services is only provide in Surat city.</p>
            </div>
        </div>
    </div>

    <script>
        const faqButtons = document.querySelectorAll('.faq-btn');

        faqButtons.forEach(button => {
            button.addEventListener('click', () => {
                const faqItem = button.closest('.faq-item');
                faqItem.classList.toggle('active');
            });
        });
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