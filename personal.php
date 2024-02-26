<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Government Examination - Personal Information</title>
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
    input[type="date"],
    input[type="email"],
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
    <h1>Personal Information</h1>
    <form id="personalInfoForm" action="educationaldetails.php" method="POST">
      <label for="fullName">Full Name:</label>
      <input type="text" id="fullName" name="fullName" required>

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>

      <label for="phoneNumber">Phone Number:</label>
      <input type="text" id="phoneNumber" name="phoneNumber" required>
      <input type="date" id="dob" name="dob" required>

      <label for="gender">Gender:</label>
      <select id="gender" name="gender" required>
        <option value="">Select Gender</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
        <option value="other">Other</option>
      </select>

      <label for="community">Community:</label>
      <select id="community" name="community" required>
        <option value="">Select Community</option>
        <option value="general">General</option>
        <option value="obc">OBC</option>
        <option value="sc">SC</option>
        <option value="st">ST</option>
      </select>

      <label for="pincode">Pincode:</label>
      <input type="text" id="pincode" name="pincode" required>

      <label for="nationality">Nationality:</label>
      <input type="text" id="nationality" name="nationality" required>

      <label for="state">State/Nativity:</label>
      <input type="text" id="state" name="state" required>

      <label for="religion">Religion:</label>
      <input type="text" id="religion" name="religion" required>

      <label for="srilankanTamilRefugee">Sri Lankan Tamil Refugee:</label>
      <select id="srilankanTamilRefugee" name="srilankanTamilRefugee" required>
        <option value="">Select Option</option>
        <option value="yes">Yes</option>
        <option value="no">No</option>
      </select>

      <label for="differentlyAbled">Differently Abled:</label>
      <select id="differentlyAbled" name="differentlyAbled" required>
        <option value="">Select Option</option>
        <option value="yes">Yes</option>
        <option value="no">No</option>
      </select>

      <input type="submit" value="Next" class="btn">
    </form>
    <button type="button" onclick="goToPreviousPage()" class="btn previous">Previous</button>
  </div>

  <script>
    function goToPreviousPage() {
      // Redirecting to the previous page
      window.location.href = 'loginsignupform.php';
    }
  </script>

</body>

</html>