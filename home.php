<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Government Examination Notification</title>
  <style>
    /* Use a different font for the headings and body text */
    @import url('https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap');
   body {
      font-family: 'Roboto', sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
    }
    .container {
      max-width: 800px;
      margin: 20px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h1, h2, h3 {
      margin-top: 0;
      font-weight: 700;
    }
    .exam-details {
      margin-bottom: 20px;
    }
    #startExamBtn, #nextBtn {
      padding: 10px 20px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    #uploadBtn {
      padding: 10px 20px;
      background-color: #28a745;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    #fileInput {
      display: none;
    }
    #fileInputLabel {
      margin-top: 10px;
      display: block;
    }
    /* Use some color to spice up your page */
    .header {
      background-color: #007bff;
      color: #fff;
      padding: 20px;
      text-align: center;
    }
    .topnav {
      overflow: hidden;
      background-color: #333;
    }
    .topnav a {
      float: left;
      display: block;
      color: #f2f2f2;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
    }
    .topnav a:hover {
      background-color: #ddd;
      color: black;
    }
    /* Add some icons or illustrations to your page */
    .icon {
      width: 32px;
      height: 32px;
      margin-right: 10px;
      vertical-align: middle;
    }
    .illustration {
      width: 100%;
      height: auto;
      margin-bottom: 20px;
    }
    /* Improve the layout and spacing of your page */
    .row {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      align-items: center;
    }
    .column {
      flex: 1 1 300px;
      margin: 10px;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    @media screen and (max-width: 600px) {
      .row {
        flex-direction: column;
      }
    }
  </style>
</head>
<body>

<div class="container">
  <!-- Add a logo or a banner image to the top of your page -->
  <div class="header">
    <img src="graphic_art(prompt='a logo for Government Service Examination')" alt="Logo" class="icon">
    <h1>Government Examination Notification</h1>
  </div>
  <!-- Add a navigation bar to help visitors navigating through your website -->
  <div class="topnav">
    <a href="#">Home</a>
    <a href="#">About</a>
    <a href="#">Contact</a>
  </div>
  <div class="exam-details">
    <h2>Exam Details</h2>
    <form action="loginsignupform.php" method="POST">
    <p><strong>Exam Name:</strong> Government Service Examination</p>
    <p><strong>Time:</strong> 9:00 AM - 12:00 PM</p>
    <p><strong>Time:</strong> 2:00 PM - 5:00 PM</p>
    <p><strong>Instructions:</strong></p>
    <ul>
      <li>Please arrive at least 30 minutes before the exam starts.</li>
      <li>Bring your admit card and a valid ID proof.</li>
      <li>Electronic devices such as mobile phones, calculators, smartwatches, etc., are not allowed inside the examination hall.</li>
      <li>Follow the instructions provided by the invigilators.</li>
    </ul>
    <button type="submit" id="nextBtn">Next</button>
    </form>
  </div>
  <!-- Add a custom illustration to your page -->
  <img src="graphic_art(prompt='an illustration of a person taking an exam')" alt="Illustration" class="illustration">
  <!-- Use a 3-column layout to display some additional information -->
  <div class="row">
    <div class="column">
      <h3>Exam Syllabus</h3>
      <p>The exam syllabus consists of the following subjects:</p>
      <ul>
        <li>General Knowledge</li>
        <li>Quantitative Aptitude</li>
        <li>Logical Reasoning</li>
        <li>English Language</li>
      </ul>
    </div>
    <div class="column">
      <h3>Exam Pattern</h3>
      <p>The exam pattern is as follows:</p>
      <table>
        <tr>
          <th>Subject</th>
          <th>Questions</th>
          <th>Marks</th>
          <th>Duration</th>
        </tr>
        <tr>
          <td>General Knowledge</td>
          <td>50</td>
          <td>50</td>
          <td>30 mins</td>
        </tr>
        <tr>
          <td>Quantitative Aptitude</td>
          <td>50</td>
          <td>50</td>
          <td>1 hour</td>
        </tr>
        <tr>
          <td>Logical Reasoning</td>
          <td>50</td>
          <td>50</td>
          <td>1 hour</td>
        </tr>
        <tr>
          <td>English Language</td>
          <td>50</td>
          <td>50</td>
          <td>30 mins</td>
        </tr>
      </table>
    </div>
    <div class="column">
      <h3>Exam Preparation</h3>
      <p>Here are some tips to prepare for the exam:</p>
      <ul>
        <li>Read newspapers and magazines regularly to improve your general knowledge and vocabulary.</li>
        <li>Practice solving arithmetic and reasoning problems from previous year papers and mock tests.</li>
        <li>Revise the basic grammar rules and learn new words every day.</li>
        <li>Manage your time effectively and avoid stress.</li>
      </ul>
    </div>
  </div>
</div>

</body>
</html>
