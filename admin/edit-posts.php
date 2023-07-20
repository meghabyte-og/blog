<?php
include 'partials/header.php';

$category_query = "SELECT * FROM categories";
$categories = mysqli_query($connection, $category_query);
?>


<section class="form__section">
    <div class="container form__section-container">
        <h2>Edit Post</h2>
        <form action="" enctype="multipart/form-data">
            <input type="text" placeholder="Title">
            <select>
                <?php while($category= mysqli_fetch_assoc($categories)) :?>
                <option value="1">Travel</option>
                <?php endwhile?>
            </select>
            <textarea rows="10" placeholder="Body"></textarea>
            <div class="form__control inline">
                <input type="checkbox" id="is_featured" checked>
                <label for="is_featured">Featured</label>
            </div>
            <div class="form__control">
                <label for="thumbnail">Change thumbnail</label>
                <input type="file" id="thumbnail">
            </div>
            <button type="submit" class="btn">Update Post</button>
        </form>
    </div>
</section>



<?php
include '../partials/footer.php';
?>