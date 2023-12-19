<?php include('../includes/style-links.php'); ?>
<?php include('precord.php'); ?>
<form action="patient_record.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <div class="row">
        <div class="col-sm-6">
            <label for="date">Date:</label>
            <input type="date" id="date" name="dates" value="<?php echo $dates; ?>"><br>

            <label for="surface">Surface:</label>
            <input type="text" id="surface" name="surface" placeholder="Enter surface" value="<?php echo isset($surface) ? $surface : ''; ?>"><br>

            <label for="Tnumber">Tooth No:</label>
            <input type="number" id="Tnumber" name="t_no" placeholder="Enter tooth number" value="<?php echo $t_no; ?>">
        </div>

        <div class="col-sm-6">
            <label for="cars">Procedure:</label>
            <select name="proced" id="cars" value="<?php echo $proced; ?>"><br>
                <option value="Braces">Brace</option>
                <option value="Extraction">Extraction</option>
                <option value="Cleaning">Cleaning</option>
                <option value="Denture">Denture</option>
            </select><br>
            <label for="surface">Cash:</label>
            <input type="number" id="surface" name="cash" placeholder="Enter Amount" value="<?php echo $cash; ?>">

            <label for="surface">Total Fee:</label>
            <input type="number" id="surface" name="t_fee" placeholder="Enter total fee" value="<?php echo $t_fee; ?>">
        </div>
    </div>
    <hr style="border: solid #FF6D33;">
    <div class="form2">
        <h1>MEDICINES</h1>
        <label for="cars">Product:</label>
        <select name="product" id="cars" value="<?php echo $product; ?>"><br>
            <option value="Paracetamol">Paracetamol</option>
            <option value="Amoxicillin">Amoxicillin</option>
            <option value="Asperin">Asperin</option>
            <option value="Neozep">Neozep</option>
            <option value="None">None</option>
        </select>

        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" placeholder="Enter quantity" value="<?php echo $quantity; ?>">
        <div class="sub">
            <?php if ($edit_state == false) : ?>
                <button class="btn float-end" id="button" name="adds" type="submit">Submit</button>
            <?php else : ?>
                <button class="btn float-end" id="button" name="update" type="submit">Update</button>
            <?php endif ?>
        </div>
    </div>
</form>
<hr>
<h1 class="fw-bold" style="color: #FF6D33;">Products</h1>
<table id="examples" class="table table-striped" style="width:100%;">
    <thead>
        <tr>
            <th>Date</th>
            <th>Product</th>
            <th>Qty</th>
            <th>Tooth No.</th>
            <th>Surface</th>
            <th>Procedure</th>
            <th>Total Fee</th>
            <th>Paid</th>
            <th>Balance</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_assoc($results)) { ?>
            <tr>
                <!-- Add table data columns as per your requirements -->
                <td>
                    <?php echo $row['dates']; ?>
                </td>
                <td>
                    <?php echo $row['product']; ?>
                </td>
                <td>
                    <?php echo $row['t_no']; ?>
                </td>
                <td>
                    <?php echo $row['proced']; ?>
                </td>
                <td>
                    <?php echo $row['surface']; ?>
                </td>
                <td>
                    <?php echo $row['product']; ?>
                </td>
                <td>
                    <?php echo $row['quantity']; ?>
                </td>
                <td>
                    <?php echo $row['cash']; ?>
                </td>
                <td>
                    <?php echo $row['t_fee'] - $row['cash']; ?>
                </td>
                <td> <button class="btn btn-primary" style="background-color: #0399FE;">
                        <a href="patient_record.php?edit=<?php echo $row['id']; ?>">
                            <i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i>
                        </a>
                    </button>
                    <button class="btn btn-danger" style="background-color: #FF5050;">
                        <a href="record.php?del=<?php echo $row['id']; ?>">
                            <i class="fa-solid fa-trash" style="color: #ffffff;"></i>
                        </a>
                    </button>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<!-- END EDMO HTML (Happy Coding!)-->
</main>
<?php include('../includes/script-links.php'); ?>