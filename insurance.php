<?php
include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style.min.css"> -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
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

        .section {
            padding: 40px 0;
            text-align: center;
        }

        .section p {
            font-weight: bold;
        }

        .section h2 {
            color: #ED6436;
            font-size: 2.5em;
            margin-bottom: 20px;
        }

        .description,
        .advantages {
            text-align: left;
            font-size: 1.1em;
            line-height: 1.6em;
        }

        .texth2 {
            color: #ED6436;
            font-size: 2.5em;
            padding-bottom: 20px;
        }

        .advantages ul {
            list-style-type: disc;
            padding-left: 20px;
        }

        .advantages li {
            font-weight: bold;
            margin-bottom: 8px;
        }

        .section.advantages {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 40px 0;
        }

        .content-left {
            width: 60%;
            padding-right: 20px;
        }

        .content-right {
            width: 35%;
        }

        .content-right img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }

        @media (max-width: 768px) {
            .section.advantages {
                flex-direction: column;
                text-align: center;
            }

            .content-left,
            .content-right {
                width: 100%;
                padding-right: 0;
                padding-bottom: 20px;
            }

            .content-right img {
                width: 80%;
                margin: 0 auto;
            }
        }


        .card-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);

            gap: 20px;
            justify-items: center;

            width: 100%;
        }

        .card {
            width: 400px;

            height: 250px;

            border: 2px solid rgba(237, 100, 54, 0.5);
            border-radius: 20px;
            background: linear-gradient(to bottom right, rgba(237, 100, 54, 1), rgba(237, 100, 54, 0.01));
            color: white;
            padding: 15px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            box-sizing: border-box;
            text-overflow: ellipsis;
            overflow: hidden;
        }

        .card p {
            white-space: normal;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }


        .bttn {
            background-color: #ED6436;
            color: #fff;
            font-size: 1em;
            padding-top: 14px;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .bttn:hover {
            background-color: #D45C2C;
            transform: scale(1.1);
        }


        .faq {
            margin-top: 40px;
            background-color: #fff;
            padding: 40px;
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

        /* Add a slide-in from left transition */
        .slide-in-left {
            opacity: 0;
            transform: translateY(-100%);
            /* Start position is off-screen */
            animation: slideInLeft 2s forwards;
        }

        a:hover {
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

        .card-container {
            display: flex;
            justify-content: space-between;
            /* Distributes space between cards */
            flex-wrap: wrap;
            /* Ensures responsiveness */
            gap: 20px;
            /* Adds space between cards */
        }

        .card {
            width: 30%;
            /* Adjust width so 3 cards fit in a row */
            min-width: 250px;
            /* Prevents cards from shrinking too much */
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            text-align: center;
            background: white;
        }

        .card:hover {
            border: 2px solid orange;
            /* This might be causing the color change */
        }



        .card img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            max-width: 50px;
            object-fit: cover;
        }

        .stars {
            color: gold;
            font-size: 20px;
        }

        .b {
            background-color: blue;
            color: white;
            padding: 10px;
            border-radius: 5px;
            text-decoration: none;
            display: block;
            margin-top: 10px;
        }


        .card h3 {
            font-size: 20px;
            margin: 10px 0;
            color: #333;
        }

        .card p {
            font-size: 14px;
            color: #666;
            margin-bottom: 10px;
        }

        .rating {
            display: flex;
            justify-content: center;
            gap: 5px;
            margin-bottom: 15px;
        }

        .rating i {
            color: #f4c430;
            /* Star color */
            font-size: 18px;
        }

        .card .b {
            width: 100%;
            padding: 10px;
            background: #ED6436;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }

        .card .b:hover {
            background: #ED6436;
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

        .testimonial-container {
            width: 80%;
            max-width: 600px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .stars {
            color: #fbc02d;
            font-size: 18px;
        }

        .testimonial {
            display: none;
        }

        .testimonial.active {
            display: block;
        }

        .author {
            font-weight: bold;
            margin-top: 10px;
        }

        .navigation {
            margin-top: 15px;
        }

        .nav-btn {
            background: #007BFF;
            color: white;
            padding: 8px 12px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            margin: 0 5px;
        }

        .nav-btn:hover {
            background: #0056b3;
        }
    </style>
</head>

<body id="top">
    <div class="banner">
        <div class="banner-text slide-in-left">
            One step towards pet insurance can provide your furry friend with the care they deserve and bring peace of mind to your home!
        </div>
        <div class="banner-image slide-in-left">
            <img src="https://www.publishingnews.org/wp-content/uploads/2022/08/Pet-Insurance.jpg" alt="Puppy in hands">
        </div>
    </div>

    <!-- <header>
        <h2>Pet Insurance</h2>
        <img src="https://www.publishingnews.org/wp-content/uploads/2022/08/Pet-Insurance.jpg" alt="Pet Insurance Image" class="slide-in-left">
    </header> -->

    <div class="container">
        <div class="section description">
            <h2>What is Pet Insurance?</h2>
            <p>Pet insurance is a special type of insurance for various animals which safeguards their overall health and wellbeing. Just like we buy health insurance for ourselves and our loved ones, insurance for pets has become a great way to provide for our pets if they happen to need medical and other financial help.</p>
            <p>With annual routine expenses for animals rising, being a pet parent does not come cheap. Vaccination, tick treatments, grooming etc. cost anywhere from Rs. 10,000 to Rs. 54,000 annually. Out of these, the vet fees and subsequent medical and surgical costs are the highest if your pet is in need of such care. With a pet insurance policy, your pets will get the best medical and legal assistance in case of unexpected situations.</p>
        </div>

        <div class="section advantages">
            <div class="content-left">
                <h2>Advantages of Pet Insurance</h2>
                <ul>
                    <li>Affordable veterinary care without financial stress.</li>
                    <li>Access to a wide network of trusted veterinary professionals.</li>
                    <li>Protection against costly surgeries and medical procedures.</li>
                    <li>Peace of mind knowing that your pet is covered in emergencies.</li>
                    <li>Flexible coverage options based on your pet’s needs.</li>
                </ul>
            </div>
            <div class="content-right">
                <img src="https://www.bajajallianz.com/content/dam/bagic/index/dog-insurance-in-india.png" alt="Pet Insurance Image">
            </div>
        </div>



        <center>
            <h2 class="texth2">--- Pet Insurance Providers ---</h2>
        </center>
        <div class="card-container">
            <div class="card">
                <img src="https://img.onesignal.com/permanent/d193e686-9273-4855-98f5-9a9bd5dd2ed1" alt="Product Image">
                <h3>PetFather</h3>
                <p>Leading provider of pet insurance plans for dogs and cats. Get comprehensive coverage.</p>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                    <i class="far fa-star"></i> <!-- Empty star -->
                </div>

                <a href="https://www.petfather.in/dogs/best-dog-insurance-policies-in-india/">
                    <button class="b">Buy Now</button></a>
            </div>
            <div class="card">
                <img src="https://tse1.mm.bing.net/th?id=OIP.roWBVtE0JkuBVrK6GeW9_AHaD-&pid=Api&P=0&h=180" alt="Product Image">
                <h3>Policy Bazar</h3>
                <p>Provides fast reimbursement and high coverage. Ideal for comprehensive pet care.</p>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                    <i class="far fa-star"></i> <!-- Empty star -->
                </div>
                <a href="https://www.policybazaar.com/pet-insurance/">

                    <button class="b">Buy Now</button></a>
            </div>
            <div class="card">
                <img src="https://www.hdfcergo.com/images/default-source/car/logo_hdfc.png" alt="Product Image">
                <h3>HDFC Egro</h3>
                <p>Affordable and flexible pet insurance for your furry friends. No limits on claims.</p>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                    <i class="far fa-star"></i> <!-- Empty star -->
                </div>
                <a href="https://www.hdfcergo.com/pet-insurance">

                    <button class="b">Buy Now</button></a>
            </div>
            <div class="card">
                <img src="https://www.petinsurancequotes.com/app/uploads/2020/01/pets-best-insurance.png" alt="Product Image">
                <h3>Pets Best</h3>
                <p>Offers comprehensive pet insurance plans with affordable premiums and quick claims.</p>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                    <i class="far fa-star"></i> <!-- Empty star -->
                </div>
                <a href="https://www.petsbest.com/">

                    <button class="b">Buy Now</button></a>
            </div>
            <div class="card">
                <img src="https://tse2.mm.bing.net/th?id=OIP.H3gvCpniYZMU9hojL92fvQAAAA&pid=Api&P=0&h=180" alt="Product Image">
                <h3>Figo</h3>
                <p>Figo offers comprehensive pet insurance with flexible plans, making it easier for pet owners.</p>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                    <i class="far fa-star"></i> <!-- Empty star -->
                </div>
                <a href="https://figopetinsurance.com/">

                    <button class="b">Buy Now</button></a>
            </div>
            <div class="card">
                <img src="https://d3544la1u8djza.cloudfront.net/APHI/Logos/aphi_logo_orange.svg" alt="Product Image">
                <h3>ASPCA</h3>
                <p>ASPCA offers reliable and comprehensive insurance plans for dogs and cats, providing peace of mind.</p>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                    <i class="far fa-star"></i> <!-- Empty star -->
                </div>
                <a href="https://www.aspcapetinsurance.com/">

                    <button class="b">Buy Now</button></a>
            </div>
        </div><br><br>

        <div style="background: linear-gradient(135deg,rgb(251, 220, 187), #90caf9); padding: 25px; border-radius: 12px; text-align: center; margin-top: 40px; font-family: 'Poppins', sans-serif;">
            <h3 style="color: #ED6436;">🎉 Special Offer! 🎉</h3>
            <p style="font-size: 18px; color: #ED6436; margin-top: 10px;">
                Contact any of the above companies and <strong>mention that you found them through [PetLover]</strong><br> to receive a <strong>special discount or exciting offer!</strong>
            </p>
            <p style="font-size: 14px; margin-top: 10px; color: #ED6436;">
                (Terms & Conditions Apply)
            </p>
        </div><br>

        <center>
            <h2 style="color: #ED6436;">Our Insurance Gain Members</h2>
            <div class="testimonial-container">
                <div class="testimonial active">
                    <p>"Great service! The process was smooth and hassle-free."</p>
                    <div class="stars">★★★★★</div>
                    <div class="author">- Rajesh Patel</div>
                </div>
                <div class="testimonial">
                    <p>"I found the best insurance provider for my needs. Highly recommended!"</p>
                    <div class="stars">★★★★☆</div>
                    <div class="author">- Anjali Mehta</div>
                </div>
                <div class="testimonial">
                    <p>"Customer support was very helpful in guiding me through the options."</p>
                    <div class="stars">★★★★★</div>
                    <div class="author">- Vikram Shah</div>
                </div>

                <div class="navigation">
                    <button class="nav-btn" onclick="prevTestimonial()">&#10094; Prev</button>
                    <button class="nav-btn" onclick="nextTestimonial()">Next &#10095;</button>
                </div>
            </div>
        </center>


        <div class="section faq">
            <h3>FAQs</h3>

            <div class="faq-item">
                <button class="faq-btn">
                    Q1. Why is a pet insurance plan important?
                    <span class="arrow">▼</span>
                </button>
                <div class="answer">
                    <p>Pet insurance helps you save on unexpected medical expenses and ensures your pet gets the necessary care in times of need.</p>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-btn">
                    Q2. How can I buy pet insurance for my dog?
                    <span class="arrow">▼</span>
                </button>
                <div class="answer">
                    <p>Simply compare insurance providers and select a plan that suits your pet's needs. You can apply online or through a local agent.</p>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-btn">
                    Q3. Can I claim expenses for routine veterinary care?
                    <span class="arrow">▼</span>
                </button>
                <div class="answer">
                    <p>Many insurance providers cover routine care, but it varies between plans. Be sure to check the specifics of your chosen policy.</p>
                </div>
            </div>
            <div class="faq-item">
                <button class="faq-btn">
                    Q4. How much will a pet insurance policy cost me??
                    <span class="arrow">▼</span>
                </button>
                <div class="answer">
                    <p>Depending on the breed, age and size of your pet, your premium amount will vary. Not just these, your pet's health and the sum insured you want to opt for will also affect your plan's cost.</p>
                </div>
            </div>
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
        let index = 0;
        const testimonials = document.querySelectorAll(".testimonial");

        function showTestimonial(i) {
            testimonials.forEach(t => t.classList.remove("active"));
            testimonials[i].classList.add("active");
        }

        function prevTestimonial() {
            index = (index - 1 + testimonials.length) % testimonials.length;
            showTestimonial(index);
        }

        function nextTestimonial() {
            index = (index + 1) % testimonials.length;
            showTestimonial(index);
        }

        setInterval(nextTestimonial, 5000); // Auto-slide every 5 seconds
    </script>
</body>

</html>