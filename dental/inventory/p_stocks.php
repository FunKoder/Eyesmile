<h1 class="fw-bold" style="color: #FF6D33;">Products</h1>
<table id="examples" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Product Name</th>
            <th>Expired</th>
            <th>Quantity</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($row = mysqli_fetch_array($managing_results)) {
        ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['p_name']; ?></td>
                <td><?php echo isset($row['total_expired']) ? $row['total_expired'] : 0; ?></td>
                <td><?php echo $row['total_quantity']; ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
