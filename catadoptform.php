<?php
include 'header.php';
include 'track.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adopt a Pet</title>
    <style>
        /* styles.css */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;

        }

        .container {
            display: flex;
            flex-wrap: wrap;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .content {
            flex: 1;
            padding: 20px;
        }

        .image-section {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .image-section img {
            max-width: 100%;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #047857;
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        .hashtag {
            color: #f97316;
            font-size: 1.2rem;
            font-weight: bold;
        }

        h2 {
            font-size: 1.5rem;
            color: #047857;
            margin-top: 20px;
        }

        p {
            line-height: 1.6;
            margin: 10px 0;
        }

        ol {
            padding-left: 20px;
        }

        ol li {
            margin: 10px 0;
        }

        .dog-link {
            color: #f97316;
            font-weight: bold;
            text-decoration: none;
        }

        .cat-link {
            color: #f97316;
            font-weight: bold;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }


        .adoption-process {
            margin-top: 30px;
            padding: 20px;
            background: #f1f5f9;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .adoption-process h2 {
            color: #e63946;
            font-size: 1.8rem;
            text-align: left;
            /* Align text to the right */
        }



        .adoption-process ul {
            padding-left: 20px;
        }

        .adoption-process ul li {
            margin: 10px 0;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .content {
                order: 2;
            }

            .image-section {
                order: 1;
            }
        }

        .back-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            display: none;
            /* Initially hidden */
            z-index: 1000;
        }
    </style>
</head>

<body id="top">
    <div class="container">
        <div class="content">
            <h1>Adopt a Pet<br>Don't Shop</h1>
            <p class="hashtag">#AdoptDontShop</p>
            <p>
                If you are an animal lover and looking to get a pet for your home, consider adopting one. There are many wonderful pets waiting for you to take them home.
            </p>
            <h2>Instructions</h2>
            <ol>
                <li>Check out all our babies on our Instagram feed (scroll down).</li>
                <li>Click on any picture for more information.</li>
                <li>Fill out our application form. Click on the links below:
                    <ul>
                        <!-- <li><a href="dogadaptform.php" class="dog-link">Dog Application Form</a></li> -->
                        <li><a href="onlypetform.php" class="cat-link">Cat Application Form</a></li>
                    </ul>
                </li>
                <li>You will be contacted if you are shortlisted.</li>
            </ol>
        </div>
        <div class="image-section">
            <img src="https://iadopt.in/wp-content/uploads/2022/10/Puppy-Adoption-Through-iAdopt-scaled.jpg" alt="Adopt a Pet" />
        </div>
        <!-- Adoption Process Section -->
        <div class="adoption-process">
            <h2>The Adoption Process</h2>
            <p>Once you have been deemed successful, we will introduce you to the chosen animal in the presence of Teckels staff. During this visit, we will provide you with as much information as possible.</p>
            <p>In some cases, multiple visits may be necessary to fully assess compatibility. All members of the household, including resident dogs, should have an introduction before the adoption takes place.</p>
            <p>Meetups will be conducted outdoors, regardless of the weather conditions. Please keep this in mind when scheduling an appointment, as appointment slots will not be changed due to weather changes.</p>
            <p>Home checks are essential for dog adoptions. If all goes well in the previous stages and you choose to proceed, we will conduct a home visit with the proposed dog. If you are renting your home, written permission from your landlord will be required.</p>
            <p><strong>Adoption paperwork will be completed, along with an adoption fee:</strong></p>
            <ul>
                <li>£300 for an adult dog, £400 for puppies under 6 months</li>
                <li>£90 for a cat, and £120 for kittens.</li>
            </ul>
            <p>Please note that this fee is a contribution toward the cost of caring for the animals in rescue until they are adopted. We encourage adopters to consider becoming regular donors to continue their support.</p>
            <p><strong>Congratulations!</strong> Your dog or cat can now go to their new forever home with you!</p>

            <h2>After Adoption</h2>
            <p><strong>Please keep in touch!</strong> We love hearing how ex-Teckels cats and dogs are enjoying their new homes.</p>
            <p>Feel free to send us a “Happy Tail” story to feature on our website.</p>

            <h2>Post-Adoption Support</h2>
            <p>We understand that helping an animal overcome a difficult past and settle into a new home can be challenging. This process may take a significant amount of time.</p>
            <p>While we will provide you with honest information about the animal’s past and expected behaviour after adoption, we often don’t know their full story.</p>
            <p>Therefore, we offer a period of continued support and advice to our adopters after they have taken their new pet home.</p>
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
</body>

</html>