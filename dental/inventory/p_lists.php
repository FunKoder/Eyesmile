<h1 class="fw-bold" style="color: #FF6D33;">Products</h1>

<table id="example" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Product Name</th>
            <th>Category</th>
            <th>Unit Cost</th>
            <th>Unit Price</th>
            <th>Quantity</th>
            <th>Manifactured Date</th>
            <th>Expiration Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_array($results)) { ?>
            <tr>
                <td>
                    <?php echo $row['id']; ?>
                </td>
                <td>
                    <?php echo $row['p_name']; ?>
                </td>
                <td>
                    <?php echo $row['category']; ?>
                </td>
                <td>
                    <?php echo $row['cost']; ?>
                </td>
                <td>
                    <?php echo $row['price']; ?>
                </td>
                <td>
                    <?php echo $row['quantity']; ?>
                </td>
                <td>
                    <?php echo $row['m_date']; ?>
                </td>
                <td>
                    <?php echo $row['e_date']; ?>
                </td>
                <td><button class="btn btn-primary" style="background-color: #0399FE;">
                        <a href="inventory.php?edit=<?php echo $row['id']; ?>">
                            <i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i></a>
                    </button>
                    <button class="btn btn-danger" style="background-color: #FF5050;">
                        <a href="server.php?del=<?php echo $row['id']; ?>"> <i class="fa-solid fa-trash" style="color: #ffffff;"></i></a>
                    </button>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<!-- END EDMO HTML (Happy Coding!)-->
</main>