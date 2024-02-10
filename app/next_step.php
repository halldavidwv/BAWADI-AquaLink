<?php

include('db.php');

  if (isset($_POST['next_step_confirm'])) {
    $id = $_GET['id'];
	  $query = "SELECT * FROM water_installation WHERE id = $id";
    $result = mysqli_query($conn, $query);
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
            $next_step = "Phase-4-Step-1";
            break;
        case "Phase-4-Step-1":
            $next_step = "Complete";
            break;
        default:
            $next_step = $step;
            break;
        
    }

    $result = "UPDATE water_installation SET step = '$next_step' WHERE id = $id";
    $query = mysqli_query($conn, $result);

    if (!$query) {
      die('Query Failed');
    } else {
      $_SESSION['next_step_complete'] = "Next Step Process Complete";
      header('Location: index.php');
    }
  } else {
    die('Connection Failed!');
  }

?>
