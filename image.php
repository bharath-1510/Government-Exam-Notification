<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Upload Documents</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 20px;
        background-color: #f4f4f4;
    }
    h2 {
        margin-top: 0;
    }
    .container {
        max-width: 600px;
        margin: 0 auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    form {
        margin-top: 20px;
    }
    label {
        display: block;
        margin-bottom: 5px;
    }
    input[type="file"] {
        margin-bottom: 10px;
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

<h2>Upload Documents</h2>
<div class="container">
    <form id="uploadForm" action="otherqualifications.php" method="POST" enctype="multipart/form-data">

         <label for="resume">Upload Your Resume/CV (Only .doc, .docx, .pdf files allowed):</label>
        <input type="file" id="resume" name="resume" accept=".doc, .docx, .pdf" required>

        <label for="photo">Upload Your Photo (Only .jpg, .jpeg, .png files allowed):</label>
        <input type="file" id="photo" name="photo" accept=".jpg, .jpeg, .png" required>
        
        <label for="signature">Upload Your Signature (Only .jpg, .jpeg, .png files allowed):</label>
        <input type="file" id="signature" name="signature" accept=".jpg, .jpeg, .png" required>
        
        <button type="button" class="btn previous" onclick="previousPage()">Previous</button>
        <input type="submit" value="Submit">
    </form>
</div>

<script>
    function previousPage() {
        // Redirecting to the previous page
        window.location.href = 'educationaldetails.php';
    }
</script>

</body>
</html>
