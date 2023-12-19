<?php include('../includes/header.php');?>
<?php include('../includes/style-links.php')?>
<body style="background-color: #D7F1F6;">
    <?php include('../includes/nav3.php')?>

    <div class="container-md shadow-lg bg-white p-5 justify-content-center mt-5 mb-4" id="cons">
           
    <button class="btn float-end" id="button" ><a href="users.php" style="text-decoration: none; color:white" >Back</a></button>
          
                <h1 class="fw-bold" style="color: #FF6D33;">Users List</h1>
                <div class="card-body">
                <form action="code.php" method="POST">

                <?php
                            $paramResult = checkParamId('id');
                            if(!is_numeric($paramResult)){
                                echo'<h5>'.$paramResult.'</h5>';
                                return false;
                            }

                            $user = getById('user',checkParamId('id'));
                            if($user['status'] == 200){
                                ?>

                        <input type="hidden" name="userId" value="<?=$user['data']['id'];?>"required>
                        <h2 class="mb-4 text-center orange"></h2>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label>Fisrt Name</label>
                                                <input type="text" name="first_name" value="<?=$user['data']['first_name'];?>" class="form-control" required>
                                            </div>

                                            <div class="mb-3">
                                                <label>Last Name</label>
                                                <input type="text" name="last_name" value="<?=$user['data']['last_name'];?>"  class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label>Email</label>
                                                <input type="text" name="email" value="<?=$user['data']['email'];?>"  class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label>Phone Number</label>
                                                <input type="text" name="phone" value="<?=$user['data']['phone'];?>" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label>Password</label>
                                                <input type="password" name="pass" value="<?=$user['data']['password'];?>" class="form-control" required>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label>Select Role</label>
                                                <select name="role" class="form-select">
                                                    <option value="Select Role">Select Role</option>
                                                    <option value="admin" <?=$user['data']['user_type'] == 'admin' ? 'selected':'';?>>Admin</option>
                                                    <option value="optic" <?=$user['data']['user_type'] == 'optic' ? 'selected':'';?>>Optical</option>
                                                    <option value="staff"  <?=$user['data']['user_type'] == 'staff' ? 'selected':'';?>>Staff</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label>Status</label>
                                                <select name="status" class="form-select">
                                                    <option selected disabled value="status">status</option>
                                                    <option value="0" <?= ($user['data']['status'] == 0) ? 'selected' : ''; ?>>Active</option>
                                                    <option value="1" <?= ($user['data']['status'] == 1) ? 'selected' : ''; ?>>Deactivate</option>
                                                    </select>
                                                </select>
                                            </div>
                                        </div>
    
                                        
                                        
                                        <div class="col-md-12" >
                                            <div class="mb-3 text-end" >
                                                <br>
                                                <button type="submit" name="updateUser" class="btn btn-submit text-white fw-bold" style="background-color: #FF6D33;">Submit</button>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                            }
                            else {
                                echo'<h5>'.$user['message'].'<h5>';
                            }
                        ?>  
                    </form>
                </div>
    
            </div>
    </div>
    
</body>

<?php include('../includes/script-links.php')?>
</html>