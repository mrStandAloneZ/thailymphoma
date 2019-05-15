
<?PHP
        $connect = mysqli_connect ("localhost" , "thailympho_dbp", "VB-D#ThaAi#LogCe&","thailympho_dbp") or die (mysqli_connect_error());
        $connect -> query("SET names utf8");


    $id_card1= isset($_GET['id_card1']) ? $_GET['id_card1'] : "";
    
  

    $sql = "SELECT id_card FROM web_add_data1 WHERE id_card = '$id_card1' &&  id_card != '-'";
    $result = mysqli_query($connect,$sql);
    $row_user = mysqli_num_rows($result);

     if($row_user >= 1)  
    { ?>
        <!-- <script type="text/javascript">document.getElementById("show_data").style.display==''</script> -->
        <script>$('#show_data1').show();</script>
        <script>$('#show_data2').hide();</script>
        <?
        echo "<span style='margin-top:10px;' id='show_data1'class='alert-danger form-control'>มีผู้ใช้งาน ID นี้แล้ว กรุณาเปลี่ยน ID </span>";  
        echo "<span style='margin-top:10px;' id='show_data2' class='alert-success form-control'>สามารถใช้งาน ID นี้ได้</span>";  
    } 
    
    if($row_user < 1)  
    {
        ?>
        <!-- <script type="text/javascript">document.getElementById("show_data").style.display=='none'</script> -->
        <script>$('#show_data1').hide();</script>
        <script>$('#show_data2').show();</script>
        <?
        echo "<span style='margin-top:10px;' id='show_data1'class='alert-danger form-control'>มีผู้ใช้งาน ID นี้แล้ว กรุณาเปลี่ยน ID </span>"; 
        echo "<span style='margin-top:10px;' id='show_data2' class='alert-success form-control'>สามารถใช้งาน ID นี้ได้</span>";  
    }

    mysqli_close($connect);

?> 
