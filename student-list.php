<?php

include "includes/header.inc.php";
include "includes/show-category.inc.php";
?>
<form action="includes/add-student.php" method="post" enctype="multimedia/form-data">
    <input type="text" name="student_firstname">
    <input type="text" name="student_lastname">
    <select name="courses" id="courses-select">
    <?php
          while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        ?>
        <option value="<?= $row["courses"]?>"><?= $row["courses"]?></option>
        <?php } ?> 
    </select>
    <input type="file" name="photo" accept="image/*" required>
    <button type="submit">Save</button>
</form>
