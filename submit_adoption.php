<?php
// Database Connection
$conn = new mysqli("localhost", "root", "", "petlover");

// Check connection
if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}

// Ensure form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Fetch form data safely
    $email = isset($_POST['email']) ? $_POST['email'] : "";
    $pre_adoption_check = isset($_POST['pre_adoption_check']) ? $_POST['pre_adoption_check'] : "";
    $pet_name = isset($_POST['pet_name']) ? $_POST['pet_name'] : "";
    $full_name = isset($_POST['full_name']) ? $_POST['full_name'] : "";
    $age = isset($_POST['age']) ? $_POST['age'] : "";
    $profession = isset($_POST['profession']) ? $_POST['profession'] : "";
    $phone_number = isset($_POST['phone_number']) ? $_POST['phone_number'] : "";
    $location = isset($_POST['location']) ? $_POST['location'] : "";
    $residence_type = isset($_POST['residence_type']) ? $_POST['residence_type'] : "";
    $residence_ownership = isset($_POST['residence_ownership']) ? $_POST['residence_ownership'] : "";
    $family_agreement = isset($_POST['family_agreement']) ? $_POST['family_agreement'] : "";
    $family_details = isset($_POST['family_details']) ? $_POST['family_details'] : "";
    $primary_caretaker = isset($_POST['primary_caretaker']) ? $_POST['primary_caretaker'] : "";
    $past_pet_experience = isset($_POST['past_pet_experience']) ? $_POST['past_pet_experience'] : "";
    $pet_living_arrangement = isset($_POST['pet_living_arrangement']) ? $_POST['pet_living_arrangement'] : "";
    $adoption_reason = isset($_POST['adoption_reason']) ? $_POST['adoption_reason'] : "";
    $alone_hours = isset($_POST['alone_hours']) ? $_POST['alone_hours'] : "";
    $tied_up_hours = isset($_POST['tied_up_hours']) ? $_POST['tied_up_hours'] : "";
    $sterilization_agreement = isset($_POST['sterilization_agreement']) ? $_POST['sterilization_agreement'] : "";
    $pet_diet = isset($_POST['pet_diet']) ? $_POST['pet_diet'] : "";
    $final_pre_adoption_check = isset($_POST['final_pre_adoption_check']) ? $_POST['final_pre_adoption_check'] : "";
    $source = isset($_POST['source']) ? $_POST['source'] : "";

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO dog_adoption_requests 
        (email, pre_adoption_check, pet_name, full_name, age, profession, phone_number, location, residence_type, residence_ownership, 
        family_agreement, family_details, primary_caretaker, past_pet_experience, pet_living_arrangement, adoption_reason, 
        alone_hours, tied_up_hours, sterilization_agreement, pet_diet, final_pre_adoption_check, source) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param(
        "ssssisssssssssssssssss",
        $email,
        $pre_adoption_check,
        $pet_name,
        $full_name,
        $age,
        $profession,
        $phone_number,
        $location,
        $residence_type,
        $residence_ownership,
        $family_agreement,
        $family_details,
        $primary_caretaker,
        $past_pet_experience,
        $pet_living_arrangement,
        $adoption_reason,
        $alone_hours,
        $tied_up_hours,
        $sterilization_agreement,
        $pet_diet,
        $final_pre_adoption_check,
        $source
    );

    // Execute Query
    if ($stmt->execute()) {
        echo "Data Inserted Successfully!";
    } else {
        echo "Query Execution Error: " . $stmt->error;
    }

    // Close connection
    $stmt->close();
    $conn->close();
}
