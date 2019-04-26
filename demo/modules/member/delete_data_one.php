<?php
include "modules/index/header.php";
$db->connectdb(DB_NAME, DB_USERNAME, DB_PASSWORD);
$result = mysql_query("select * from " . TB_MEMBER . " where user='" . $_SESSION['login_true'] . "'") or die("Err Can not to result");
$dbarr = mysql_fetch_array($result);
$code_admin = "admin";
$member_id = $dbarr['member_id'];
$centre = $dbarr['codehos'];
//$login_true=$_SESSION['login_true'];
$result2 = mysql_query("select * from " . TB_ADD_DATA . " where id='" . $_GET['id'] . "' order by id DESC") or die("Err Can not to result");
$dbarr2 = mysql_fetch_array($result2);
if ($member_id == $code_admin) {
    delete_record($dbarr2['centre']);
} else if ($dbarr2['id'] == $_GET['id'] && $centre == $dbarr2['codehos']) {
    delete_record($dbarr2['centre']);
} else {
    echo "You cann't Detele" . $dbarr2['codehos'];
}
function delete_record($centre)
{
    echo "Delete record " . $centre . " Complete";
    mysql_query("DELETE FROM " . TB_ADD_DATA . " WHERE id = " . $_GET['id']);
}

?>
<script type="text/javascript">
sleep(5000).then(() => {
    window.location.replace(window.location.pathname);
})
function sleep (time) {
  return new Promise((resolve) => setTimeout(resolve, time));
}

</script>
