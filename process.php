<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include("db_connection.php");

if (isset($_POST['enter'])) {
    $_SESSION['idNumber'] = $_POST['idNumber'];
    $_SESSION['vehicleNumber'] = $_POST['vehicleNumber'];
    $_SESSION['startTime'] = date('Y-m-d H:i:s');

    // Check if the vehicle number is already in the database with active status 'yes'
    $checkActiveQuery = "SELECT * FROM parking_records WHERE vehicle_number='".$_SESSION['vehicleNumber']."' AND active_status='yes'";
    $checkResult = mysqli_query($conn, $checkActiveQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        // Redirect to error page if active status is 'yes'
        header("Location: error_page.php");
        exit();
    }

    $selectSlotQuery = "SELECT MAX(parking_slot) AS max_slot FROM parking_records";
    $slotResult = mysqli_query($conn, $selectSlotQuery);

    if ($slotResult && mysqli_num_rows($slotResult) > 0) {
        $slotRow = mysqli_fetch_assoc($slotResult);
        $nextParkingSlot = $slotRow['max_slot'] + 1;
    } else {
        $nextParkingSlot = 1;
    }

    $query = "INSERT INTO parking_records (id_number, vehicle_number, entering_time, active_status, parking_slot) 
              VALUES ('".$_SESSION['idNumber']."', '".$_SESSION['vehicleNumber']."', '".$_SESSION['startTime']."', 'yes', $nextParkingSlot)";
    
    if(mysqli_query($conn, $query)) {
        $selectQuery = "SELECT * FROM parking_records WHERE id_number='".$_SESSION['idNumber']."' AND vehicle_number='".$_SESSION['vehicleNumber']."' AND active_status='yes'";
        $result = mysqli_query($conn, $selectQuery);

        if(mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['enteringTime'] = $row['entering_time'];
            $_SESSION['activeStatus'] = $row['active_status'];
            $_SESSION['parkingSlot'] = $row['parking_slot'];

            header("Location: enter_page.php");
            exit();
        } else {
            echo "Error retrieving parking record: " . mysqli_error($conn);
        }
    } else {
        echo "Error inserting into database: " . mysqli_error($conn);
    }
} elseif (isset($_POST['leave'])) {
    $query = "SELECT * FROM parking_records WHERE id_number='".$_SESSION['idNumber']."' AND vehicle_number='".$_SESSION['vehicleNumber']."' AND active_status='yes'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['enteringTime'] = $row['entering_time'];
        $_SESSION['activeStatus'] = $row['active_status'];

        header("Location: leave_page.php");
        exit();
    } else {
        header("Location: error_page.php");
        exit();
    }
} elseif (isset($_POST['proceedToPayment'])) {
    $_SESSION['leavingTime'] = date('Y-m-d H:i:s');
    $_SESSION['timeDifference'] = strtotime($_SESSION['leavingTime']) - strtotime($_SESSION['enteringTime']);

    if ($_SESSION['timeDifference'] < 0) {
        header("Location: error_page.php");
        exit();
    }

    if ($_SESSION['timeDifference'] < 3600) {
        $_SESSION['paymentBalance'] = 100;
    } elseif ($_SESSION['timeDifference'] < 10800) {
        $_SESSION['paymentBalance'] = 200;
    } elseif ($_SESSION['timeDifference'] < 21600) {
        $_SESSION['paymentBalance'] = 300;
    } elseif ($_SESSION['timeDifference'] < 86400) {
        $_SESSION['paymentBalance'] = 500;
    } else {
        $_SESSION['paymentBalance'] = 1000;
    }

    // Update revenue in the database
    $updateRevenueQuery = "UPDATE parking_records SET revenue='".$_SESSION['paymentBalance']."' WHERE id_number='".$_SESSION['idNumber']."' AND vehicle_number='".$_SESSION['vehicleNumber']."'";
    mysqli_query($conn, $updateRevenueQuery);

    header("Location: payment_page.php");
    exit();
} elseif (isset($_POST['done'])) {
    $query = "UPDATE parking_records SET leaving_time='".$_SESSION['leavingTime']."', active_status='no' WHERE id_number='".$_SESSION['idNumber']."' AND vehicle_number='".$_SESSION['vehicleNumber']."'";
    mysqli_query($conn, $query);

    header("Location: success_page.php");
    exit();
} else {
    header("Location: error_page.php");
    exit();
}
?>
