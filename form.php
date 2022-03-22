<?php
require "security.php";
$text = $_POST['text'];

$txtFileName = "saved.txt";
$open = fopen($txtFileName,'w');
fwrite($open, $text);

if(empty($text)){
    $empty_mgs = "THIS IS ONLINE NOTEPAD!";
    fwrite($open, $empty_mgs);
}

$filename = "index.php";
$innerHtml = '<?php
require "security.php";
$txtFileName = "saved.txt";
if(!file_exists("saved.txt")){
    $edit = fopen($txtFileName,"w");
    $empty_mgs = "THIS IS ONLINE NOTEPAD!";
    fwrite($edit,$empty_mgs);
    fclose($edit);
}
$txtFile = fopen($txtFileName,"r");
$text = fread( $txtFile, filesize("saved.txt") );
fclose($txtFile);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" user-scalable="no">
    <title>Saved Notes</title>
</head>

<body>
<div>
<form action="form.php" method="POST">
    <textarea  name="text" id="text" cols="999" rows="999"><?php echo $text;?></textarea>
    <input type="submit" value="SUBMIT"></input>
</form>
</div>
    <script>
        const font_size = 5; // in %
        const submit_button_height = 80;
        var availHeight = window.innerHeight - submit_button_height;
        const textArea = document.querySelector("textarea");
        textArea.style.height = (availHeight) + "px";
        textArea.style.fontSize = ((window.innerHeight * font_size) / 100) + "px";
    </script>
</body>

</html>';

$file = fopen($filename,"w");
fwrite($file,$innerHtml);
fclose($file);
// header("Location:".$filename)
header("Location: ../")
?>
<h1>PROCESSING YOUR REQUEST</h1>