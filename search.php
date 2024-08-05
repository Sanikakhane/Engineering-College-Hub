<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>
        Admission Help portal
    </title>
</head>

<body>
    <nav class="nav">
        <div class="name" data-aos="fade-right">
            Collage Search Portal
        </div>
        <div class="SearchBar" data-aos="fade-left">
            <a href="index1.html">
                Home
            </a>
        </div>
    </nav>
    <div class="container mt-4">
        <div class="row">
            <div class="col">
                <form action="search.php" method="post">
                    <div class="row">
                        <div class="col-md-4 form-group" data-aos="fade-right">
                            <label for="exam">Select Exam :</label>
                            <select name="examtype" id="exam" class="form-control" onchange="toggleFields()">
                                <option value="CET">CET</option>
                                <option value="JEE">JEE</option>
                            </select>
                        </div>
                        <!-- <div class="col-md-4 form-group" data-aos="fade-left">
                            <label for="rank">Enter Rank :</label>
                            <input type="number" class="form-control" id="rank" name="rank">
                        </div> -->
                        <div class="col-md-4 form-group" id="rankField" style="display: none;">
                            <label for="rank">Enter Rank :</label>
                            <input type="number" class="form-control" id="rank" name="rank">
                        </div>
                        <div class="col-md-4 form-group" id="marksField">
                            <label for="marks">Enter Marks :</label>
                            <input type="number" class="form-control" id="mark" name="mark">
                        </div>
                        <div class="col-md-4 form-group" data-aos="fade-right">
                            <label for="branch">Select Branch :</label>
                            <select name="branch" id="branch" class="form-control">
                                <!-- Add your branch options here -->
                                <option value="Computer Engineering" class="opt">Computer Engineering</option>
                                <option value="Chemical Engineering" class="opt">Chemical Engineering</option>
                                <option value="Information Technology" class="opt">Information Technology</option>
                                <option value="Polymer Engineering and Technology" class="opt">Polymer Engineering and Technology</option>
                                <option value="Computer Science and Engineering" class="opt">Computer Science and Engineering</option>
                                <option value="Electronics and Telecommunication" class="opt">Electronics and Telecommunication</option>
                                <option value="Food Engineering and Technology" class="opt">Food Engineering and Technology</option>
                                <option value="Pharmaceuticals Chemistry and Technology" class="opt">Pharmaceuticals Chemistry and Technology</option>
                                <option value="Mechanical Engineering" class="opt">Mechanical Engineering</option>
                                <option value="Electronics Engineering" class="opt">Electronics Engineering</option>
                                <option value="Surface Coating Technology" class="opt">Surface Coating Technology</option>
                                <option value="Oil,Oleochemicals and Surfactants Technology" class="opt">Oil,Oleochemicals and Surfactants Technology</option>
                                <option value="Electronics and Telecommunication Engineering" class="opt">Electronics and Telecommunication Engineering</option>
                                <option value="Dyestuff Technology" class="opt">Dyestuff Technology</option>
                                <option value="Electronics and Communication" class="opt">Electronics and Communication</option>
                                <option value="Fibres and Textile Processing Technology" class="opt">Fibres and Textile Processing Technology</option>
                                <option value="Electronics and Communication Engineering" class="opt">Electronics and Communication Engineering</option>
                                <option value="Bio Medical Engineering" class="opt">Bio Medical Engineering</option>
                                <option value="Electrical Engineering" class="opt">Electrical Engineering</option>
                                <option value="Civil Engineering" class="opt">Civil Engineering</option>
                                <option value="Production Engineering" class="opt">Production Engineering</option>
                                <option value="Bio Technology" class="opt">Bio Technology</option>
                                <option value="Computer Technology" class="opt">Computer Technology</option>
                                <option value="Industrial Engineering" class="opt">Industrial Engineering</option>
                                <option value="Electronics Design Technology" class="opt">Electronics Design Technology</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col text-center">
                            <button type="submit" class="btn" style="background-color: #83a876; color: white;">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="list  col-12 d-flex justify-content-center">
        <div class="collegeList mt-4 d-flex justify-content-center">
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $examType = $_POST['examtype'];
                $rank = $_POST['rank'];
                $mark = $_POST['mark'];
                $branch = $_POST['branch'];

                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "admission";

                $conn = mysqli_connect($servername, $username, $password, $database);
                // Check connection
                if (!$conn) {
                    die("Sorry we failed to connect: <br>" . mysqli_connect_error());
                }

                // SQL query


                // Output the SQL query for debugging
                // echo "SQL Query: $sql <br>";

                // Execute the query

                // echo $examType;
                if ($examType == 'JEE') {
                    $sql = "SELECT name FROM `collegedata` WHERE ExamType = '$examType' AND Branch = '$branch' AND Rank <= '$rank'";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        // Fetch and output the institute names
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo $row['name'] . "<br>";
                        }
                    } else {
                        // Error handling for SQL query execution
                        echo "Error executing query: " . mysqli_error($conn);
                    }
                }
              
                else if($examType == 'CET')
                {
                    $sql = "SELECT name FROM `collegedata` WHERE ExamType = '$examType' AND Branch = '$branch' AND Marks <= '$mark'";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        // Fetch and output the institute names
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo $row['name'] . "<br>";
                        }
                    } else {
                        // Error handling for SQL query execution
                        echo "Error executing query: " . mysqli_error($conn);
                    }
                }
                // Check if query was successful


                // Close the connection
                mysqli_close($conn);
            }
            ?>

        </div>
    </div>
    <body>


    </body>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();


        function toggleFields() {
            var examSelect = document.getElementById("exam");
            var rankField = document.getElementById("rankField");
            var marksField = document.getElementById("marksField");

            if (examSelect.value === "JEE") {
                rankField.style.display = "block";
                marksField.style.display = "none";
            } else if (examSelect.value === "CET") {
                rankField.style.display = "none";
                marksField.style.display = "block";
            }
        }
    </script>
</body>

</html>