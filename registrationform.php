<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Registration Form </title>
</head>

<body>
    <h2> Registration form </h2>
    <form id="registration-form" action="examinationcentre.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" required><br>
        <label for="email">Email:</label>
        <input type="email" name="email" required><br>
        <label for="dob">Date of birth:</label>
        <input type="date" name="dob" required><br>
        <label for="gender">Gender:</label>
        <select name="gender" required>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select><br>
        <label for="phone">Phone:</label>
        <input type="tel" name="phone" required><br>
        <label for="address">Address:</label>
        <textarea name="address" rows="4" cols="50" required></textarea><br>
        <label for="exam_group">Select Exam group:</label>
        <select id="exam_group" name="exam_group" required>
            <option value="group_2">Group 2</option>
            <option value="group_4">Group 4</option>
            <option value="tnpsc">TNPSC</option>
            <option value="upsc">UPSC</option>
            <option value="Ibps po">IBPS PO</option>
            <option value="NDA&NA">NDA&NA</option>
            <option value="RRB">RRB</option>
            <option value="SSC CHSL">SSC CHSL</option>
            <option value="SSC CGL">SSC CGL</option>
            <option value="CDS">CDS</option>
            <option value="State PSC">State PSC</option>
            <option value="Civil Services">Civil Services</option>
            <option value="UPSC CAPF">UPSC CAPF</option>
            <option value="ALP">ALP</option>
            <option value="Defence exams">Defence exams</option>
            <option value="CTET exam">CTET exam</option>
            <option value="Multi tasking staff">Multi tasking staff</option>
        </select><br>
        <label for="terms_and_conditions">
            <input type="checkbox" name="terms_and_conditions" required>
            I agree to the Terms and Conditions
        </label><br>
        <button type="button" onclick="previousPage()">Previous</button>
        <input type="submit" value="Next">
    </form>
    </center>

    <script>
        function previousPage() {
            // Redirecting to the previous page
            window.location.href = 'otherqualifications.php';
        }
    </script>
</body>

</html>