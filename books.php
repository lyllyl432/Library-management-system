<?php
session_start();
include "includes/show-category.inc.php";
include "includes/show-books.inc.php";
include "includes/show-books-category.inc.php"
?>

<form action="includes/books.inc.php" method="post">
    <input type="text" name="isbn" placeholder="isbn">
    <input type="text" name="title" placeholder="title">
    <select name="category" id="category-select">
        <?php
          while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        ?>
        <option value="<?= $row["courses"]?>"><?= $row["courses"]?></option>
        <?php } ?>
    </select>
    <input type="text" name="author" placeholder="author">
    <input type="text" name="publisher" placeholder="publisher">
    <input type="date" name="date-publish" placeholder="publish">
    <button type="submit">Save</button>
</form>

<div class="container">
  <?php
  if(isset($_SESSION["books_insertion"])){
  ?>
  <h1><?= $_SESSION["books_insertion"]?></h1>
  <?php
  }
  unset($_SESSION["books_insertion"]);
?>
<table>
  <tr>
    <th>isbn</th>
    <th>title</th>
    <th>category</th>
    <th>author</th>
    <th>publisher</th>
    <th>date publish</th>
  </tr>
  <?php
    while($row = $booksStmt->fetch(PDO::FETCH_ASSOC)){
  ?>
  <tr>
    <td><?= $row["isbn"]?></td>
    <td><?= $row["title"]?></td>
    <td><?= $row["category"]?></td>
    <td><?= $row["author"]?></td>
    <td><?= $row["publisher"]?></td>
    <td><?= $row["date_publish"]?></td>
    <td><form action="includes/books-delete.inc.php" method="POST">
        <input type="hidden" name="id" value="<?= $row["id"]?>">
        <input type="submit" name="delete-book" value="delete">
    </form></td>
    <td><form action="includes/books-edit.inc.php" method="POST">
        <input type="hidden" name="id" value="<?= $row["id"]?>">
        <input type="submit" name="delete-book  " value="delete">
    </form></td>
  </tr>
  <?php
  }
  ?>
 
</table>

<form action="includes/books-edit.inc.php">
<input type="text" name="isbn" placeholder="isbn">
    <input type="text" name="title" placeholder="title">
    <select name="category" id="category-select">
        <?php
          while($row = $booksCategoryStmt->fetch(PDO::FETCH_ASSOC)){
        ?>
        <option value="<?= $row["courses"]?>"><?= $row["courses"]?></option>
        <?php } ?>
    </select>
    <input type="text" name="author" placeholder="author">
    <input type="text" name="publisher" placeholder="publisher">
    <input type="date" name="date-publish" placeholder="publish">
    <input type="hidden" name="id" value="<?= $row["id"]?>">
    <button type="submit">Update</button>
</form>
</div>


<?php
$conn = null;
?>
