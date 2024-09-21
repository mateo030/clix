<?php require 'includes/dbh.php'?>
<?php require 'header.php'?>

<div class="admin-form">
    <form action="includes/insert_product.php" method="GET">
        <label>Product Name</label>
        <input type="text" name="name" required>
        <label>Price</label>
        <input type="text" name="price" required>
        <label>Category</label>
        <select name="category">
            <option>Furniture</option>
            <option>Clothes</option>
            <option>Shoes</option>
            <option>Homeware</option>
            <option>Food & Beverage</option>
        </select>
        <label>Description</label>
        <textarea name="description" required></textarea>
        <label>Product Condition</label>
        <select name="condition">
            <option>New</option>
            <option>Used</option>
            <option>Refurbished</option>
        </select>
        <label>Upload image</label>
        <input type="file" name="img" required>
        <button>Insert Product</button>
    </form>
</div>

<?php require 'footer.php'?>