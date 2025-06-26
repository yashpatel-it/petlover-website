<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Services</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        /* Header */
        header {
            background-color: #ED6436;
            color: white;
            text-align: center;
            padding: 30px;
        }

        header h1 span {
            color: #FFD700;
        }

        /* Service Sections */
        .service {
            padding: 60px 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
            text-align: center;
            border-bottom: 5px solid #ED6436;
        }

        .service img {
            width: 400px;
            height: 300px;
            border-radius: 10px;
            object-fit: cover;
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.2);
        }

        .service-text {
            max-width: 500px;
            padding: 20px;
            text-align: justify;
        }

        .service:nth-child(odd) {
            background-color: #FFF3E3;
        }

        .service:nth-child(even) {
            background-color: #FEE9D8;
        }

        section a:hover {
            text-decoration: none;
            color: white;
        }

        /* Buttons */
        .btnnn {
            display: inline-block;
            padding: 12px 25px;
            background-color: #ED6436;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 10px;
            font-weight: bold;
            transition: 0.3s;
        }

        .btnnn:hover {
            background-color: #c53e1e;
        }

        /* Comment Section */
        .comment-section {
            margin-top: 15px;
            background-color: #fff;
            border-radius: 10px;
            padding: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 450px;
            position: relative;
        }

        .comment-section textarea {
            width: 100%;
            min-height: 40px;
            padding: 10px;
            font-size: 14px;
            border: none;
            border-radius: 10px;
            resize: vertical;
            outline: none;
            background-color: #f8f8f8;
        }

        .comment-section button {
            position: absolute;
            bottom: 10px;
            right: 10px;
            background-color: #ED6436;
            color: white;
            border: none;
            padding: 5px 12px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            transition: 0.3s;
        }

        .comment-section button:hover {
            background-color: #c53e1e;
        }

        .comment-display {
            margin-top: 10px;
            font-size: 14px;
            color: #444;
            font-style: italic;
            padding-left: 10px;
        }
    </style>
</head>

<body>

    <?php include 'header.php';
    include 'track.php'; ?>

    <header>
        <h1>Familiar With <span>Pet Services</span></h1>
        <p>Quality Care for Your Furry Friends</p>
    </header>

    <!-- Pet Boarding Section -->
    <section class="service" id="boarding">
        <img src="https://tse1.mm.bing.net/th?id=OIP.T9-r9fA62Nh0k1zqgs9fcAHaFG&w=326&h=326&c=7" alt="Pet Boarding">
        <div class="service-text">
            <h2><i class="fas fa-home"></i> Pet Boarding</h2>
            <p>Provides a safe and comfortable place for pets while their owners are away.</p>
            <p>Pet boarding services provide a safe and comfortable stay for pets when their owners are away. These facilities offer clean and spacious accommodations, ensuring that pets feel at home. Trained caregivers provide regular exercise, playtime, and companionship to keep pets active and happy. Special care is given to pets with medical needs or anxiety issues.</p>
            <h3>How It Works:</h3>
            <ul>
                <li>Book a stay for your pet.</li>
                <li>Food, exercise, and care provided.</li>
                <li>24/7 staff supervision.</li>
            </ul>
            <a href="service.php" class="btnnn">Get Service</a>

            <!-- Comment Section -->
            <div class="comment-section">
                <textarea placeholder="Write your comment..."></textarea>
                <button>Send</button>
                <div class="comment-display"></div>
            </div>
        </div>
    </section>

    <section class="service" id="grooming">
        <img src="https://tse1.mm.bing.net/th?id=OIP.bwCjUGGN3TfxUkEYvDUJXAHaE8&w=316&h=316&c=7" alt="Pet Grooming">
        <div class="service-text">
            <h2><i class="fas fa-cut"></i> Pet Grooming</h2>
            <p>Keeps your pet clean, healthy, and looking great.</p>
            <p>Pet grooming is a process of maintaining a pet’s hygiene and appearance. It includes bathing, fur trimming, nail clipping, ear cleaning, and brushing to prevent skin infections, parasites, and discomfort. Regular grooming not only keeps pets looking great but also improves their comfort and overall health.</p>
            <h3>How It Works:</h3>
            <ul>
                <li>Book a grooming session.</li>
                <li>Bathing, hair trimming, and nail care.</li>
                <li>Professional stylists available.</li>
            </ul>
            <a href="service.php" class="btnnn">Get Service</a>
            <!-- Comment Section -->
            <div class="comment-section">
                <textarea placeholder="Write your comment..."></textarea>
                <button>Send</button>
                <div class="comment-display"></div>
            </div>
        </div>
    </section>

    <section class="service" id="training">
        <div class="service-text">
            <h2><i class="fas fa-dog"></i> Pet Training</h2>
            <p>Teaches pets good behavior, obedience, and skills.</p>
            <p>Pet training involves teaching pets obedience, good manners, and specific commands to enhance their behavior. It helps in improving discipline, reducing aggression, and strengthening the bond between pets and owners. Training can include basic commands (sit, stay, come), leash training, potty training, and advanced skills for enhanced socialization and communication.</p>
            <h3>How It Works:</h3>
            <ul>
                <li>Sign up for training sessions.</li>
                <li>Positive reinforcement techniques.</li>
                <li>Personalized training plans.</li>
            </ul>
            <a href="service.php" class="btnnn">Get Service</a>
            <!-- Comment Section -->
            <div class="comment-section">
                <textarea placeholder="Write your comment..."></textarea>
                <button>Send</button>
                <div class="comment-display"></div>
            </div>
        </div>
        <img src="https://tse2.mm.bing.net/th?id=OIP.xmCHbn3uX9bJ5ei6GqkIFwHaE8&w=316&h=316&c=7" alt="Pet Training">
    </section>

    <section class="service" id="exercise">
        <img src="https://img.freepik.com/free-photo/portrait-woman-with-her-beautiful-dog_1157-36179.jpg?ga=GA1.1.233297634.1735294899&semt=ais_hybrid" alt="Pet Exercise">
        <div class="service-text">
            <h2><i class="fas fa-running"></i> Pet Exercise</h2>
            <p>Ensures pets stay fit, active, and healthy.</p>
            <p>Pet exercise ensures that pets stay physically and mentally active, preventing obesity, anxiety, and other health problems. Regular activities like walking, running, and play sessions help pets release pent-up energy, stay fit, and maintain joint and muscle health. Exercise is crucial for maintaining a pet’s overall happiness and well-being.</p>
            <h3>How It Works:</h3>
            <ul>
                <li>Daily walks and runs.</li>
                <li>Supervised playtime.</li>
                <li>Customized workout plans.</li>
            </ul>
            <a href="service.php" class="btnnn">Get Service</a>
            <!-- Comment Section -->
            <div class="comment-section">
                <textarea placeholder="Write your comment..."></textarea>
                <button>Send</button>
                <div class="comment-display"></div>
            </div>
        </div>
    </section>

    <section class="service" id="treatment">
        <div class="service-text">
            <h2><i class="fas fa-medkit"></i> Pet Treatment</h2>
            <p>Medical care and treatment for sick or injured pets.</p>
            <p>Pet treatment involves medical care and veterinary services to ensure pets remain healthy. This includes routine check-ups, vaccinations, illness diagnosis, and emergency treatments. Proper treatment helps detect health issues early, ensuring timely medical intervention and a long, healthy life for pets.</p>
            <h3>How It Works:</h3>
            <ul>
                <li>Book an appointment with a vet.</li>
                <li>Diagnosis and treatment plans.</li>
                <li>Follow-up care and check-ups.</li>
            </ul>
            <a href="service.php" class="btnnn">Get Service</a>
            <!-- Comment Section -->
            <div class="comment-section">
                <textarea placeholder="Write your comment..."></textarea>
                <button>Send</button>
                <div class="comment-display"></div>
            </div>
        </div>
        <img src="https://tse4.mm.bing.net/th?id=OIP.steLbFL6gRDVdHOv-lHUdgHaE8&pid=Api&P=0&h=180" alt="Pet Treatment">
    </section>

    <!-- Pet Feeding Section -->
    <section class="service" id="feeding">
        <div class="service-text">
            <h2><i class="fas fa-bowl-food"></i> Pet Feeding</h2>
            <p>Ensures pets get the right nutrition for a healthy life.</p>
            <p>Pet feeding services ensure that pets receive proper nutrition and hydration on a scheduled basis. Caregivers provide high-quality meals tailored to each pet’s dietary needs, including special diets for health conditions. Fresh water is always available, and feeding times are maintained to match the pet’s routine. Some services also include administering medications or supplements as needed. Proper feeding ensures pets stay healthy, energetic, and well-nourished.</p>
            <h3>How It Works:</h3>
            <ul>
                <li>Choose a meal plan.</li>
                <li>Fresh, nutritious meals are delivered.</li>
                <li>Personalized diet for pets.</li>
            </ul>
            <a href="service.php" class="btnnn">Get Service</a>

            <!-- Comment Section -->
            <div class="comment-section">
                <textarea placeholder="Write your comment..."></textarea>
                <button>Send</button>
                <div class="comment-display"></div>
            </div>
        </div>
        <img src="https://tse2.mm.bing.net/th?id=OIP.7RlzDEpqXeNDN4Gx6HabVQHaE8&w=316&h=316&c=7" alt="Pet Feeding">
    </section>

    <!-- JavaScript for Comment Display -->
    <script>
        document.querySelectorAll(".comment-section button").forEach(button => {
            button.addEventListener("click", function() {
                let commentSection = this.parentElement;
                let textarea = commentSection.querySelector("textarea");
                let commentDisplay = commentSection.querySelector(".comment-display");

                if (textarea.value.trim() !== "") {
                    commentDisplay.innerHTML += `<p>➤ ${textarea.value}</p>`;
                    textarea.value = ""; // Clear after posting
                }
            });
        });
    </script>

    <?php include 'footer.php'; ?>

</body>

</html>