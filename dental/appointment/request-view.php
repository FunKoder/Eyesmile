<?php include('../includes/header.php');?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Online Appointment Requests</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
    <link rel="stylesheet" href="https:/cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>


<body>
    <style>
    th{   
    border: 2px solid #ddd;;
    background-color: white !important; /* New background color with !important */

    } 
    
    </style>

   
   

    <div class="container-md shadow-lg bg-white p-5 justify-content-center mt-5 mb-5" id="cons" >
                <?= alertMessage();?>

                <h1 class="fw-bold" style="color: #FF6D33;">Online Appointment Requests</h1>

    <?php
        $paramResult = checkParamId('id');
            if(!is_numeric($paramResult)){
                echo'<h5>'.$paramResult.'</h5>';
                return false;
        }

            $appoint= getById('appointment',$paramResult);
            if($appoint){
                if($appoint['status'] == 200){
            ?>
    <table id="example" class="table"  border="1" style="width:100%; text-align:center">
          <tbody>
            <tr>
                <th>Last Name</th>
                <td><?= $appoint['data']['last_name']?></td>
            </tr>
            <tr>
                <th>First Name</th>
                <td><?= $appoint['data']['first_name']?></td>
            </tr>
            <tr>
                <th>Middle Name</th> 
                <td><?= $appoint['data']['middle_name']?></td> 
            </tr>
            <tr>
                <th>Extension Name</th> 
                <td><?= $appoint['data']['ext_name']?></td>
            </tr>
            <tr>
                <th>Phone</th> 
                <td><?= $appoint['data']['phone']?></td>
            </tr>
            <tr>
                <th>Email</th> 
                <td><?= $appoint['data']['email']?></td>
            </tr>
            <tr>
                <th>Clinic</th> 
                <td><?= $appoint['data']['clinic']?></td>
            </tr>

            <tr>
                <th>Insurance</th> 
                <td><?= $appoint['data']['insurance']?></td>
            </tr>
            <tr>
                <th>Insurance No</th> 
                <td><?= $appoint['data']['insurance_no']?></td>     
            </tr>
        
            <tr> 
                <th>Insurance Expiration Date</th>    
                <td><?= $appoint['data']['insurance_exp']?></td>
            </tr>
            <tr>
                <th>Procedure Type</th>    
                <td><?= $appoint['data']['procedure_type']?></td>   
            </tr>
            
            <tr>
                <th>Preffered Date</th>  
                <td><?= $appoint['data']['preffered_date']?></td>   
            </tr>
            <tr>
                <th>Preffered Time </th> 
                <td><?= $appoint['data']['preffered_time']?></td>
            </tr>
            <tr>
                <th>Date Submitted </th> 
                <td><?= $appoint['data']['date_encoded']?></td>
            </tr>

          </tbody>                      
    </table>

    <div class="mt-3">
        <div class="card card-body">
            <form action="update.php" method="POST">
            <input type="hidden" name="appointmentId" value="<?= $appoint['data']['id']; ?>">
                <div class="row">
                    <div class="col-md-4">
                        <label> Status</label>
                        <select name="status" class="form-select">
                            <option value="pending" <?= ($appoint['data']['status'] ==" pending") ? 'selected' : ''; ?>>Pending</option>
                            <option value="completed" <?= ($appoint['data']['status'] == "completed" ) ? 'selected' : ''; ?>>Completed</option>
                            <option value="reschedule" <?= ($appoint['data']['status'] == "reschedule") ? 'selected' : ''; ?>>Reschedule</option>
                            <option value="cancelled" <?= ($appoint['data']['status'] == "cancelled") ? 'selected' : ''; ?>>Cancelled</option>
                        </select>
                    </div>
                    
                        <!-- ... (previous HTML code) ... -->
                    <div class="col-md-4">
                        <label>Preffered Date</label>
                        <!-- Fetching and prefilling the existing preferred date -->
                        <input type="date" name="preffered_date" value="<?= date('Y-m-d', strtotime($appoint['data']['preffered_date'])); ?>" class="form-control" required />
                    </div>

                    <div class="col-md-4">
                        <label>Preffered Time</label>
                        <div class="mb-3">
                            <select name="preffered_time" class="form-select" required>
                                <option disabled>Preffered Time</option>
                                <!-- Fetching and pre-selecting the existing preferred time -->
                                <option value="10:00:00" <?= ($appoint['data']['preffered_time'] == '10:00:00') ? 'selected' : ''; ?>>10:00 am - 11:00 am</option>
                                <option value="11:00:00" <?= ($appoint['data']['preffered_time'] == '11:00:00') ? 'selected' : ''; ?>>11:00 am - 12:00 pm</option>
                            </select>
                        </div>
                    </div>
                    
                   
                    <div class="col-md-12">
                        <button type="submit" name="updateReq" class="btn btn-submit btn float-end text-white" style="background-color: #FF6D33;">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php
            }
            else{
                    echo"<h5>No Record Found</h5>";    
                }
                }
                ?>
</body>
</html>