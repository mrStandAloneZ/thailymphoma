       <script type="text/javascript">
<!--
		function onaction(){
		if(	document.getElementById('txt1').value!="" && document.getElementById('txt2').value!=""){
			document.getElementById('save').disabled = false;
		}else if(document.getElementById('txt1').value!="" || document.getElementById('txt2').value!=""){
			document.getElementById('save').disabled = true;
		}
}
//-->
</script>
<input type="text" name="" id="txt1" onkeyup="onaction();">
<input type="text" name="" id="txt2" onkeyup="onaction();">
<input type="submit" id="save"  value="save"disabled>