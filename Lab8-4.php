<?php include "connect.php" ?>
<html>
<head><meta charset="utf-8"></head>
<body>
<form>
<input type="text" name="username">
<input type="submit" value="ค้นหา">
</form>




<?php
$stmt = $pdo->prepare("SELECT * FROM member WHERE username LIKE ?");
if(!empty($_GET)){
    $value = '%'.$_GET["username"].'%';
}
$stmt ->bindParam(1,$value);
$stmt->execute();


while ($row = $stmt->fetch()) {
?>
ชื่อสมาชิก: <?=$row ["name"]?><br>
ที่อยู่: <?=$row ["address"]?><br>
อีเมล: <?=$row ["email"]?><br>
<img src="member_img/<?=$row["username"]?>.jpg" height = 100px>

<hr>
<?php } ?>
</body>
</html>