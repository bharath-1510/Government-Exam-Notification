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
      margin: 20px;
      padding: 0px;
      background-color: #7a7373;
      color: white;
    }




    h1,
    h2,
    h3 {
      margin-top: 0;
      font-weight: 700;
    }

    .exam-details {
      padding: 20px;
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
      width: 25%;
      height: 75px;
      margin: 10px;
      margin-top: 25px;
      margin-bottom: 15px;
      padding: 10px;
      border: 1px solid #ccc;
      background-color: #fff;
      border-radius: 10px;
      text-align: center;
      font-size: 1rem;
      text-transform: uppercase;
      color: black;
    }

    .done {
      background-color: green;
      color: white;
      cursor: none;
    }

    @media screen and (max-width: 600px) {
      .row {
        flex-direction: column;
      }
    }
  </style>
</head>

<body>

  <h1 class="heading">Government Examination Notification</h1>

  <!-- Add a navigation bar to help visitors navigating through your website -->
  <div class="exam-details">
    <?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "students4244";
    $con = mysqli_connect($host, $username, $password, $dbname);
    if (!$con) {
      die("Connection failed!" . mysqli_connect_error());
    }
    $id = $_GET['id'];
    $sql = "SELECT id,name FROM login_info";
    $result = $con->query($sql);
    $f = 1;
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        if ($id === $row["id"]) {
          $name = $row['name'];
          echo "
      <h2>Welcome $name,</h2>
          ";
          $f = 0;
          break;
        }
      }
      if ($f)
        header("Location: index.php");
    }
    ?>

    <div class="row">
      <div class="column">
        <h3>Personal information</h3>
        <?php
        $host = "localhost";
        $username = "root";
        $password = "";
        $dbname = "students4244";
        $con = mysqli_connect($host, $username, $password, $dbname);
        if (!$con) {
          die("Connection failed!" . mysqli_connect_error());
        }
        $id = $_GET['id'];
        $sql = "SELECT id FROM personal_info";
        $result = $con->query($sql);
        $f = 1;
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            if ($id === $row["id"]) {
              echo "<button type='button' class='fa fa-check icon done' disabled></button>";
              $f = 0;
              break;
            }
          }
        }
        if ($f)
          echo "<button type='button' class='fa fa-plus icon' onclick=\"gotoPage('personalinfo.php')\"></button>";
        ?>

      </div>
      <div class="column">
        <h3>Contact information</h3>
        <?php
        $host = "localhost";
        $username = "root";
        $password = "";
        $dbname = "students4244";
        $con = mysqli_connect($host, $username, $password, $dbname);
        if (!$con) {
          die("Connection failed!" . mysqli_connect_error());
        }

        $id = $_GET['id'];
        $sql = "SELECT id FROM contact_info";
        $result = $con->query($sql);
        $f = 1;
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            if ($id === $row["id"]) {
              $f = 0;
              break;
            }
          }
        }
        if ($f) {
          echo "<button type='button' class='fa fa-plus icon' onclick=\"gotoPage('contactinfo.php')\"></button>";
        } else
          echo "<button type='button' class='fa fa-check icon done' disabled></button>";
        ?>

      </div>

      <div class="column">
        <h3>Educational information</h3>
        <?php
        $host = "localhost";
        $username = "root";
        $password = "";
        $dbname = "students4244";
        $con = mysqli_connect($host, $username, $password, $dbname);
        if (!$con) {
          die("Connection failed!" . mysqli_connect_error());
        }

        $id = $_GET['id'];
        $sql = "SELECT id FROM education_info";
        $result = $con->query($sql);
        $f = 1;
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            if ($id === $row["id"]) {
              $f = 0;
              break;
            }
          }
        }
        if ($f) {
          echo "<button type='button' class='fa fa-plus icon' onclick=\"gotoPage('educationalinfo.php')\"></button>";
        } else
          echo "<button type='button' class='fa fa-check icon done' disabled></button>";
        ?>
      </div>

    </div>
    <div class="row">
      <div class="column">
        <h3>Documents</h3>
        <?php
        $host = "localhost";
        $username = "root";
        $password = "";
        $dbname = "students4244";
        $con = mysqli_connect($host, $username, $password, $dbname);
        if (!$con) {
          die("Connection failed!" . mysqli_connect_error());
        }

        $id = $_GET['id'];
        $sql = "SELECT id FROM document_info";
        $result = $con->query($sql);
        $f = 1;
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            if ($id === $row["id"]) {
              $f = 0;
              break;
            }
          }
        }
        if ($f) {
          echo "<button type='button' class='fa fa-plus icon' onclick=\"gotoPage('documentinfo.php')\"></button>";
        } else
          echo "<button type='button' class='fa fa-check icon done' disabled></button>";
        ?>
      </div>
      <div class="column">
        <h3>Exam Instructions</h3>
        <button class="fa fa-eye icon"></button>
      </div>
      <div class="column">
        <h3>Exam Apply</h3>
        <button class="fa fa-plus icon"></button>
      </div>

    </div>
    <div class="row">
      <div class="column">
        <h3>View All Information</h3>
        <button class="fa fa-eye icon"></button>
      </div>

    </div>
  </div>
  <script>
    function gotoPage(url) {
      var queryString = window.location.search;

      var queryStringWithoutQuestionMark = queryString.slice(1);
      var queryParams = {};
      queryStringWithoutQuestionMark.split('&').forEach(function(param) {
        var keyValue = param.split('=');
        var key = decodeURIComponent(keyValue[0]);
        var value = decodeURIComponent(keyValue[1] || '');
        queryParams[key] = value;
      });
      let id = queryParams.id;
      window.location.href = url + "?id=" + id;

    }
  </script>

</body>

</html>