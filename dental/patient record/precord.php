<?php include('record.php');
if(isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $rec = mysqli_query($db, "SELECT * FROM payment WHERE id=$id");
    $record = mysqli_fetch_array($rec);
    $dates = $record['dates'];
    $surface = $record['surface'];
    $t_no = $record['t_no'];
    $proced = $record['proced'];
    $t_fee = $record['t_fee'];
    $product = $record['product'];
    $quantity = $record['quantity'];
    $id = $record['id'];

    
   // include('pconnect.php');
   // include('pinsert.php');
   // include('pupdate.php');
   // include('precord_delete.php');
   // include('pretrieve.hp');

}

// Close the connection when done
mysqli_close($db);
?>

