<div class="container shadow-lg bg-white p-5 rounded-bottom">
    <h1 class="fw-bold" style="color: #FF6D33;">Products</h1>
    <form action="inventory.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="container border border-dark p-5 fw-bold">
            <label for="p_name">Product Name:</label>
            <input class="form-control" type="text" name="p_name" placeholder="Product Name" aria-label="default input example" value="<?php echo $p_name; ?>">
            <label for="category">Category:</label>
            <input class="form-control" type="text" name="category" placeholder="Category" aria-label="default input example" value="<?php echo $category; ?>">
            <label for="cost">Unit Cost:</label>
            <input class="form-control" type="text" name="cost" placeholder="Unit Cost" aria-label="default input example" value="<?php echo $cost; ?>">
            <label for="price">Unit Price:</label>
            <input class="form-control" type="text" name="price" placeholder="Unit Price" aria-label="default input example" value="<?php echo $price; ?>">
            <label for="quantity">Quantity:</label>
            <input class="form-control" type="text" name="quantity" placeholder="Quantity" aria-label="default input example" value="<?php echo $quantity; ?>">
            <label for="m_date">Manifactured Date:</label>
            <input class="form-control" type="date" name="m_date" placeholder="Manifactured Date" aria-label="default input example" value="<?php echo $m_date; ?>">
            <label for="e_date">Expiration Date:</label>
            <input class="form-control" type="date" name="e_date" placeholder="Expiration Date" aria-label="default input example" value="<?php echo $e_date; ?>">
            <?php if ($edit_state == false) : ?>
                <button class="btn float-end" id="button" name="adds" type="submit">Add Product</button>
            <?php else : ?>
                <button class="btn float-end" id="button" name="update" type="submit">Update</button>
            <?php endif ?>
        </div>
    </form>
</div>