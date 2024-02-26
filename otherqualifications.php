<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Skip Other Qualifications</title>
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
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Upload Other Qualifications</title>
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

<h2>Upload Other Qualifications</h2>
<div class="container">
    <form id="uploadForm" action="registrationform.php" method="POST" enctype="multipart/form-data">

         <label for="typistCert">Typist Certification (Only .doc, .docx, .pdf files allowed):</label>
        <input type="file" id="typistCert" name="typistCert" accept=".doc, .docx, .pdf">

        <label for="stenographerCert">Stenographer Certification (Only .doc, .docx, .pdf files allowed):</label>
        <input type="file" id="stenographerCert" name="stenographerCert" accept=".doc, .docx, .pdf">
        
        <label for="computerCourseCert">Computer Course Certification (Only .doc, .docx, .pdf files allowed):</label>
        <input type="file" id="computerCourseCert" name="computerCourseCert" accept=".doc, .docx, .pdf">
        
        <button type="button" class="btn previous" onclick="previousPage()">Previous</button>
        <input type="submit" value="Submit">
    </form>
</div>

<script>
    function previousPage() {
        // Redirecting to the previous page
        window.location.href = 'image.php';
    }
</script>

</body>
</html>
<div class="container">
    <form id="skipForm" action="confirmdetails.php" method="POST">
        <p>If you don't have any other qualifications to upload, you can skip this step.</p>
        <input type="submit" value="Skip and Proceed">
    </form>
</div>

</body>
</html>
