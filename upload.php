<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>upload</title>
</head>
<body>
<p><?php
if (is_uploaded_file($_FILES["upfile"]["tmp_name"])) {
  if (move_uploaded_file($_FILES["upfile"]["tmp_name"], "img/" . $_FILES["upfile"]["name"])) {
    chmod("img/" . $_FILES["upfile"]["name"], 0644);
    echo $_FILES["upfile"]["name"] . "をアップロードしました。";
    $mysqli = new mysqli( 'localhost', 'root', '', 'photo');
    if( $mysqli->connect_errno ) {
        echo $mysqli->connect_errno . ' : ' . $mysqli->connect_error;
    }
    $mysqli->set_charset('utf8');
    if ($result = $mysqli->query("SELECT filename FROM photo")) {
	    $num = ($result->num_rows)+1 ;
		$result->close();
        $sql = "INSERT INTO photo (id,filename) VALUES (".$num.",'".$_FILES["upfile"]["name"]."')";
        $result = $mysqli->query($sql);
    }
	$mysqli->close();
  } else {
    echo "ファイルをアップロードできません。";
  }
} else {
  echo "ファイルが選択されていません。";
}
?></p>
</body>
</html>
