<?php
// File where applications will be saved
$formFile = "applications.txt";

$submittedData = "";
$message = "";

// When the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name    = $_POST["name"];
    $email   = $_POST["email"];
    $phone   = $_POST["phone"];
    $course  = $_POST["course"];
    $notes   = $_POST["notes"];

    // Prepare formatted output
    $submittedData = "
        <strong>Name:</strong> $name <br>
        <strong>Email:</strong> $email <br>
        <strong>Phone:</strong> $phone <br>
        <strong>Course:</strong> $course <br>
        <strong>Notes:</strong> $notes <br>
    ";

    // Save to text file
    $entry = "Name: $name | Email: $email | Phone: $phone | Course: $course | Notes: $notes\n";
    file_put_contents($formFile, $entry, FILE_APPEND);

    $message = "Application Submitted Successfully!";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Online Application Form</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #333;
        }

        .container {
            background: #fff;
            padding: 25px;
            width: 55%;
            border-radius: 10px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.2);
        }

        h1 {
            text-align: center;
            margin-bottom: 15px;
            font-size: 2em;
        }

        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }

        input, select, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #999;
            border-radius: 6px;
        }

        button {
            width: 100%;
            margin-top: 20px;
            padding: 12px;
            background: #007bff;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
        }

        button:hover {
            background: #0056b3;
        }

        .msg {
            margin-top: 15px;
            text-align: center;
            font-weight: bold;
            color: green;
        }

        .result-box {
            margin-top: 20px;
            background: #eef;
            padding: 15px;
            border-radius: 6px;
        }
    </style>
</head>

<body>
<div class="container">

    <h1>Online Application Form</h1>

    <?php if ($message): ?>
        <p class="msg"><?php echo $message; ?></p>

        <div class="result-box">
            <h3>Your Submitted Details:</h3>
            <p><?php echo $submittedData; ?></p>
        </div>
    <?php endif; ?>

    <form method="POST">

        <label>Full Name:</label>
        <input type="text" name="name" required>

        <label>Email Address:</label>
        <input type="email" name="email" required>

        <label>Phone Number:</label>
        <input type="text" name="phone" required>

        <label>Select Course:</label>
        <select name="course" required>
            <option value="">-- Choose Course --</option>
            <option value="BCA">BCA</option>
            <option value="BBA">BBA</option>
            <option value="B.Com">B.Com</option>
            <option value="Engineering">Engineering</option>
        </select>

        <label>Additional Notes:</label>
        <textarea name="notes" rows="4"></textarea>

        <button type="submit">Submit Application</button>
    </form>

</div>
</body>

</html>
