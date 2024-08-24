<?php

    $nama = $_POST['nama'];
    $codejson = $_POST['code'];
    $tgldibuat = new date('y-M-d');
   
    $server = "localhost";
    $username = "root";
    $pass = "";
    $db = "db_sistem_cc_leader";

    $koneksi = new mysqli($server, $username, $pass, $db);

    if($koneksi->connect_error){  }

    $sql = "INSERT INTO table_formulir VALUES(null, '$nama', '$codejson', '$tgldibuat');";

    $koneksi->query($sql);

    $koneksi->close();

    // forward ke management
    //header('management_formulir.php');
    //exit;

    echo "success";

?>