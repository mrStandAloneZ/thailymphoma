<form action="" method="POST" onsubmit="return checkeng()" name="frm_test">
<input type="text" name="test"><input type="submit" value="Submit" name="submit" />
</form>

<script language="Javascript" type="text/javascript">
function checkeng() {
  var obj=frm_test.test
  var str="abcdefghijklmnopqrstuvwxyz" //ใส่ตัวอักษรที่มีได้ลงในนี้
  var val=obj.value
  var valOK = true;
 
  for (i=0; i<val.length & valOK; i++){
    valOK = (str.indexOf(val.charAt(i))!= -1) 
    alert(valOK)
  }
 
  if (!valOK) {
    alert("ภาษาอังกฤษเท่านั้น")
    obj.focus()
    return false
  } return true
}
</script>