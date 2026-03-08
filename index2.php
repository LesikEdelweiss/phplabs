<?php
declare(strict_types=1);

$dir = "image/";

$files = scandir($dir);

if ($files === false) {
    echo "Error reading directory";
    return;
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Gallery</title>

<style>

body{
font-family: Arial;
}

header{
background:#ddd;
padding:10px;
}

nav{
background:#eee;
padding:10px;
}

.gallery img{
width:200px;
margin:10px;
}

footer{
background:#ddd;
padding:10px;
margin-top:20px;
}

</style>

</head>

<body>

<header>
<h1>My Gallery</h1>
</header>

<nav>
<a href="index1.php">Transactions</a>
<a href="index2.php">Gallery</a>
</nav>

<main>

<h2>Images</h2>

<div class="gallery">

<?php

for ($i = 0; $i < count($files); $i++) {

if (($files[$i] != ".") && ($files[$i] != "..")) {

$path = $dir . $files[$i];

echo "<img src='$path'>";

}

}

?>

</div>

</main>

<footer>
<p>Laboratory work 4</p>
</footer>

</body>
</html>