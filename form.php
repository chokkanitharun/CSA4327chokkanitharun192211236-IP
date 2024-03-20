 <?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = "student";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fname= isset($_POST['fname']) ? $_POST['fname'] : '';
        $lname = isset($_POST['lname']) ? $_POST['lname'] : '';
        $stuEmail = isset($_POST['stuEmail']) ? $_POST['stuEmail'] : '';
        $mentor = isset($_POST['mentor']) ? $_POST['mentor'] : '';
        $YearGroup = isset($_POST['YearGroup']) ? $_POST['YearGroup'] : '';
        $EngLangLit= isset($_POST['EngLangLit']) ? $_POST['EngLangLit'] : '';
        $IT = isset($_POST['IT']) ? $_POST['IT'] : '';
        $accessGroup= isset($_POST['accessGroup']) ? $_POST['accessGroup'] : '';
        // Prepare and bind SQL statement
        $stmt = $conn->prepare("INSERT INTO class (fname,lname,stuEmail,mentor,YearGroup,EngLangLit,IT,accessGroup) VALUES (?, ?, ?, ?, ? ,? ,? ,?)");
        $stmt->bind_param("ssssssss", $fname,$lname,$stuEmail,$mentor,$YearGroup,$EngLangLit,$IT,$accessGroup);

        // Execute
        $stmt->execute();

        echo "<span class='success-message'>happyyyy!!!!!!!</span>";
        
        $stmt->close();
    }

    $conn->close();
    ?>
