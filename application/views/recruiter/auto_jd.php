<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Description Generator</title>
</head>
<body>
    <h1>Generate Job Description</h1>
    
    <form method="POST" action="">
        <label for="name">Job Title:</label><br>
        <input type="text" id="name" name="name" placeholder="Senior PHP Engineer" required><br><br>

        <label for="company_name">Company Name:</label><br>
        <input type="text" id="company_name" name="company_name" placeholder="Company Name" required><br><br>

        <label for="education">Minimum Education:</label><br>
        <input type="text" id="education" name="education" placeholder="Bachelor's Degree" required><br><br>

        <label for="experience">Minimum Work Experience:</label><br>
        <input type="text" id="experience" name="experience" placeholder="5 years" required><br><br>

        <label for="skills">Required Skills (comma-separated):</label><br>
        <input type="text" id="skills" name="skills" placeholder="PHP8, MySQL, JavaScript" required><br><br>

        <input type="submit" name="generate" value="Generate Job Description">
    </form>

    <?php
    if (isset($_POST['generate'])) {
        $apiUrl = 'https://api.apyhub.com/sharpapi/api/v1/hr/job_description';
        $apiToken = 'APY0nnhNLzu4htsMYXqv9296heZha9faRt4EYnSXrZlt2FGXkEhqQPoaYeruYUCVEy1Rc0';  // Replace with your ApyHub API Key

        // Collect form data
        $name = $_POST['name'];
        $company_name = $_POST['company_name'];
        $education = $_POST['education'];
        $experience = $_POST['experience'];
        $skills = explode(',', $_POST['skills']);

        // API Request
        $data = [
            "name" => $name,
            "company_name" => $company_name,
            "minimum_education" => $education,
            "minimum_work_experience" => $experience,
            "required_skills" => $skills,
            "language" => "English",
            "voice_tone" => "neutral",
            "context" => "additional requirements"
        ];

        $options = [
            'http' => [
                'header'  => "Content-type: application/json\r\n" .
                             "apy-token: $apiToken\r\n",
                'method'  => 'POST',
                'content' => json_encode($data),
            ],
        ];
        $context  = stream_context_create($options);
        $response = file_get_contents($apiUrl, false, $context);

        if ($response === FALSE) {
            echo "Error occurred.";
        } else {
            $responseData = json_decode($response, true);
            // Handle the response and display the generated job description
            echo "<h2>Generated Job Description</h2>";
            echo "<pre>" . print_r($responseData, true) . "</pre>";
        }
    }
    ?>
</body>
</html>
