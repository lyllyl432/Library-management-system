<?php 

include "includes/show-category.inc.php";
?>
<form action="includes/category.inc.php" method="post">
    <input type="text" name="category">
    <button type="submit">Submit</button>
</form>
<?php
    if(isset($_SESSION["delete-success"])){
        echo"<div>${$_SESSION["delete-success"]}</div>";
    }
    unset($_SESSION["delete-success"]);
    if(isset($_SESSION["delete-error"])){
        echo"<div>${$_SESSION["delete-error"]}</div>";
    }
    unset($_SESSION["delete-error"]);
?>
<ul>
    <?php
    while($row = mysqli_fetch_assoc($resultObject)){
    ?>
    <li><?=$row["courses"]?>
    <form action="includes/category-delete.inc.php" method="POST">
        <input type="hidden" name="id" value="<?= $row["id"]?>">
        <input type="submit" name="delete-category" value="delete">
    </form>
    <form action="includes/category-edit.inc.php" method="POST">
        <input type="hidden" name="id" value="<?= $row["id"]?>">
        <input type="submit" name="delete-category" value="edit">
    </form>
</li>
    <?php
    }
    ?>
</ul>

