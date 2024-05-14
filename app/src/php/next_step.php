<?php

include('connect_database.php');

require ('../../vendor/autoload.php');

use Carbon\Carbon;

  if (isset($_POST['next_step_confirm'])) {
    $id = $_GET['id'];
    $tapping_point = $_POST['tapping-point'];
	  $query = $conn->prepare("SELECT step FROM water_installation WHERE id = ?");
    if(!$query) {
        echo "Prepare failed: (". $conn->errno.") ".$conn->error."<br>";
    }
    $query->bind_param('i', $id);
    $query->execute();

    $result = $query->get_result();
    
    if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_array($result);
      $step = $row['step'];
    }
    $next_step = "";
    
    switch($step) {
        case "Phase-2-Step-1":
            $next_step = "Phase-2-Step-2";
            break;
        case "Phase-2-Step-2":
            $next_step = "Phase-2-Step-3";
            break;
        case "Phase-2-Step-3":
            $next_step = "Phase-2-Step-4-Incomplete";
            break;
        case "Phase-2-Step-4-Incomplete":
            $next_step = "Phase-2-Step-4-Complete";
            break;
        case "Phase-2-Step-4-Complete":
            $next_step = "Phase-3-Step-1";
            break;
        case "Phase-3-Step-1":
          switch($tapping_point) {
            case "existing-tapping-point":
              $next_step = "Phase-4-Step-1-Existing-Tapping";
              break;
            case "proposed-tapping-point":
              $next_step = "Phase-4-Step-1-Proposed-Tapping";
              break;
          }
          break;
        case "Phase-4-Step-1-Existing-Tapping":
            $next_step = "Completed";
            break;
        case "Phase-4-Step-1-Proposed-Tapping":
            $next_step = "Completed";
            break;
        default:
            $next_step = $step;
            break;
        
    }

    $current_timestamp = Carbon::now();
    $result = $conn->prepare("UPDATE water_installation SET step = '$next_step', time_updated = '$current_timestamp' WHERE id = $id");
    if(!$result) {
      echo "Prepare failed: (". $conn->errno.") ".$conn->error."<br>";
    }
    $query = $result->execute();

    if (!$query) {
      die('Query Failed');
    } else {
      $_SESSION['next_step_complete'] = "Next Step Process Complete";
      header('Location: ../../index.php');
    }
  } else {
    die('Connection Failed!');
  }

?>
