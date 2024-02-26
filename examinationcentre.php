<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Examination Centre - Tamil Nadu</title>
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

h1, h2, h3 {
    margin-top: 0;
}

form {
    margin-top: 20px;
}

label {
    display: block;
    margin-bottom: 5px;
}

input[type="text"], select {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type="submit"], .btn {
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
<h1>Examination Centre Selection - Tamil Nadu</h1>
<form id="examCentreForm" action="confirmdetails.php" method="POST">
 <label for="Centre">Select Centre:</label>
<select id="centre" name="centre" required>
    <option value="Select Centre">Select Centre</option>
    <option value="Chennai">Chennai </option>
    <option value="Coimbatore">Coimbatore</option>
    <option value="Madurai">Madurai</option>
    <option value="Tiruchirappalli">Tiruchirappalli </option>
    <option value="Salem">Salem</option>
    <option value="Tirunelveli">Tirunelveli</option>
    <option value="Erode">Erode</option>
    <option value="Vellore">Vellore</option>
    <option value="Thanjavur">Thanjavur </option>
    <option value="cuddalore">Cuddalore</option>
    <option value="villupuram">villupuram</option>
        
</select>


    <label for="session">Select Session:</label>
    <select id="session" name="session" required>
        <option value="">Select Session</option>
        <option value="morning">Morning</option>
        <option value="afternoon">Afternoon</option>
    </select>

    <button type="button" id="previousBtn" class="btn previous" onclick="previousPage()">Previous</button>
    <input type="submit" value="Save Information" class="btn">
    <button type="button" id="nextBtn" class="btn" onclick="nextPage()">Next</button>
</form>
</div>

<script>
    function previousPage() {
        // Redirecting to the previous page
        window.location.href = 'registrationform.php';
    }

    function nextPage() {
        // Redirecting to the next page
        window.location.href = 'confirmdetails.php';
    }
</script>


</body>
</html>
