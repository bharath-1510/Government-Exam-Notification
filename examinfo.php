<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Government Examination Notification</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        /* Use a different font for the headings and body text */
        @import url('https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap');

        body {
            font-family: 'Roboto', sans-serif;
            margin: 0px;
            padding: 0px;
            background-color: #7a7373;
            color: white;
        }




        h1,
        h2,
        h3 {
            margin-top: 0;
            font-weight: 700;
            text-transform: uppercase;
        }



        #startExamBtn,
        #nextBtn {
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

        .heading {
            text-align: center;
            padding: 10px;
        }


        /* Add some icons or illustrations to your page */
        .icon {
            width: 32px;
            height: 32px;
            margin-right: 10px;
            vertical-align: middle;
            border-radius: 25px;
            cursor: pointer;
        }

        .illustration {
            width: 100%;
            height: auto;
            margin-bottom: 20px;
        }

        /* Improve the layout and spacing of your page */
        .row {
            display: flex;
            justify-content: space-evenly;
            align-items: center;

        }

        .column {
            width: 75%;
            height: 550px;
            margin: 10px;
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ccc;
            background-color: #fff;
            border-radius: 10px;

            font-size: 1rem;

            color: black;
        }

        .done {
            background-color: green;
            color: white;
            cursor: none;
        }

        .col {
            width: 25%;
            height: 550px;
            margin: 10px;
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ccc;
            background-color: #fff;
            border-radius: 10px;
            font-size: 1rem;
            color: black;
        }

        .col ul li {
            padding: 3px;
        }

        .ins-pat {
            padding: 10px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            font-size: 13px;
        }

        .ins-pat ul li {
            text-align: justify;
            padding: 3px;

        }

        .syllabus-section {
            width: 50%;

        }

        .preparation-section {
            width: 94%;

        }

        .exam-details {
            padding: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        @media screen and (max-width: 600px) {
            .row {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>


    <!-- Add a navigation bar to help visitors navigating through your website -->
    <div class="exam-details">

        <div class="row">
            <div class="col">
                <h3>Available Exams</h3>
                <ul>
                    <?php
                    $host = "localhost:3308";
                    $username = "root";
                    $password = "";
                    $dbname = "students4244";
                    $con = mysqli_connect($host, $username, $password, $dbname);
                    if (!$con) {
                        die("Connection failed!" . mysqli_connect_error());
                    }

                    $sql = "SELECT name FROM exam_info";
                    $result = $con->query($sql);
                    $f = 1;
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<li>" . $row['name'] . "</li>";
                        }
                    }
                    ?>
                </ul>

            </div>
            <div class="column">
                <div class="ins-pat">
                    <div class="instruction-section">
                        <h3>Instructions</h3>
                        <ul>
                            <li>Please arrive at least 30 minutes before the exam starts.</li>
                            <li>Bring your admit card and a valid ID proof.</li>
                            <li>Electronic devices such as mobile phones, calculators, smartwatches, etc., are not allowed inside the examination hall.</li>
                            <li>Follow the instructions provided by the invigilators.</li>
                        </ul>
                    </div>
                    <div class="syllabus-section">
                        <h3>Exam Syllabus</h3>
                        <ul>
                            <li>General Knowledge</li>
                            <li>Quantitative Aptitude</li>
                            <li>Logical Reasoning</li>
                            <li>English Language</li>
                        </ul>
                    </div>
                    <div class="pattern-section">
                        <h3>Exam Pattern</h3>
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
                    <div class="preparation-section">
                        <h3>Exam Preparation</h3>
                        <ul>
                            <li>Read newspapers and magazines regularly to improve your general knowledge and vocabulary.</li>
                            <li>Practice solving arithmetic and reasoning problems from previous year papers and mock tests.</li>
                            <li>Revise the basic grammar rules and learn new words every day.</li>
                            <li>Manage your time effectively and avoid stress.</li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>