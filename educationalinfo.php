<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Government Examination - Educational Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1,
        h2,
        h3 {
            margin-top: 0;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"],
        .btn {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn.previous {
            background-color: #6c757d;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Educational Details</h1>
        <form id="educationalDetailsForm" action="image.php" method="POST">
            <label for="qualification">Qualification:</label>
            <select id="qualification" name="qualification" required>
                <option value="">Select Qualification</option>
                <option value="10th">10th</option>
                <option value="12th">12th</option>
                <option value="Diploma">Diploma</option>
                <option value="Graduation">Graduation</option>
                <option value="Post Graduation">Post Graduation</option>
                <option value="Others">Others</option>
            </select>

            <label for="fieldOfStudy">Field of Study:</label>
            <input type="text" id="fieldOfStudy" name="fieldOfStudy" required>

            <label for="yearOfPassing">Year of Passing:</label>
            <input type="number" id="yearOfPassing" name="yearOfPassing" min="1900" max="2099" step="1" required>

            <label for="percentage">Percentage/CGPA:</label>
            <input type="number" id="percentage" name="percentage" min="0" max="100" step="0.01" required>

            <input type="submit" value="Next" class="btn">
        </form>
        <button type="button" onclick="goToPreviousPage()" class="btn previous">Previous</button>
    </div>

    <script>
        function goToPreviousPage() {
            // Redirecting to the previous page
            window.location.href = 'personal.php';
        }
    </script>


</body>

</html>