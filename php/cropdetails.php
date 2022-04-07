<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php
    session_start();
    include('./database_connection.php');
    $currentUsername = $_SESSION['username'];
    $cropname = $_POST['cropDetails'];
    $production = $_POST['production'];
    $growth = $_POST['growth'];
    $fertilizers = $_POST['fertilizers'];
    $reproduction = $_POST['reproduction'];
    $cropcycle = $_POST['cropcycle'];
    $seasons = $_POST['seasons'];
    $farmers = $_POST['farmers'];
    $province = $_POST['province1'];
    
    $mysql_query = "INSERT INTO crop_details (username, crop_name, production, growth_status, fertilizers_used, reproduction_type, crop_cycle, seasons, farmer_rate, province) values ('$currentUsername', '$cropname', '$production', '$growth', '$fertilizers', '$reproduction', '$cropcycle', '$seasons', '$farmers', '$province')";
    $mysql_connection -> query($mysql_query);
    echo '
    <script>
        window.onload = function() {
            swal({
                title: "Successfully Submitted!",
                icon: "success",
                text: "Details have been saved.",
                type: "success"
            }).then(function() {
                window.location = "../extras/home.html";
            });
        }
    </script>';
?>