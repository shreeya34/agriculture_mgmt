<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php
    session_start();
    include('./database_connection.php');
    
    if ($_POST != null) {
        $currentUserID = $_SESSION['userid'];
        $email = $_POST['email'];
        $phonenumber = $_POST['phonenumber'];
        $education = $_POST['education'];
        $marialstatus = $_POST['marialStatus'];
        $spousename = $_POST['spousename'];
        $childname = $_POST['childname'];
        $familymember = $_POST['familymember'];
        $province = $_POST['province'];
        $district = $_POST['district'];
        $city = $_POST['city'];
        $street = $_POST['street'];
        $ward = $_POST['ward'];
        $fetch_query = "select * from farmer_details where id='$currentUserID'";
        $established_connection = $mysql_connection -> query($fetch_query);;
        $row = $established_connection -> fetch_assoc();
        $result_id = $row['id'];
        if ($result_id == $currentUserID) {
            $update_query = "UPDATE farmer_details set email = '$email', phone_number = '$phonenumber', education = '$education', marital_status = '$marialstatus', spouse_name = '$spousename', child_name = '$childname', family_member = '$familymember', province = '$province', district = '$district', city = '$city', street = '$street', ward = '$ward' where id = $currentUserID";
            $mysql_connection -> query($update_query);
            echo '
            <script>
                window.onload = function() {
                    swal({
                        title: "Updated Profile!",
                        icon: "success",
                        text: "You have successfully updated your profile.",
                        type: "success"
                    }).then(function() {
                        window.location = "../extras/home.html";
                    });
                }
            </script>';
        }

    }
?>