<?
CheckAdmin($_SESSION['admin_user'], $_SESSION['admin_pwd']);

if($_GET[op] == "article_edit"){
	if(CheckLevel($_SESSION['admin_user'],$_GET[op])){
		//�ӡ�������� text �ͧ Editor Talk
		$Filename = "systemtalk.html";
		$txt_name = "html/".$Filename."";
		$txt_open = @fopen("$txt_name", "w");
		@fwrite($txt_open, "".$_POST[message]."");
		@fclose($txt_open);
		$ProcessOutput .= "<BR><BR>";
		$ProcessOutput .= "<meta http-equiv=\"refresh\" content=\"0;URL=admin.php?name=admin&file=main\">";
		$ProcessOutput .= "<CENTER><A HREF=\"?name=admin&file=main\"><IMG SRC=\"images/login-redirection-loader.gif\" BORDER=\"0\"></A><BR><BR>";
		$ProcessOutput .= "<FONT COLOR=\"#336600\"><B>��ӡ����� ˹����� ���º��������</B></FONT><BR><BR>";
		$ProcessOutput .= "<A HREF=\"?name=admin&file=main\"><B>˹����ѡ�������к�</B></A>";
		$ProcessOutput .= "</CENTER>";
		$ProcessOutput .= "<BR><BR>";
	}else{
		$ProcessOutput = $PermissionFalse ;
	}
}

//��ҹ��Ҩҡ��� Text �������
$FileNewsTopic = "html/systemtalk.html";
$file_open = @fopen($FileNewsTopic, "r");
$TextContent = @fread ($file_open, @filesize($FileNewsTopic));
@fclose ($file_open);
$TextContent = stripslashes($TextContent);

?>
&nbsp;&nbsp; <h1>��� ����˹�������</h1>
<?
if(!$ProcessOutput){
?>
						<FORM NAME="myform" METHOD=POST ACTION="?name=admin&file=editortalk&op=article_edit">
						<BR>
<B>��ͤ��� :</B><BR>
<textarea id="message" name="message" ><? include"html/systemtalk.html" ?></textarea>
    <script type="text/javascript">
        //<![CDATA[
            CKEDITOR.replace( 'message',{			
	filebrowserBrowseUrl : 'ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?Type=Images',
    filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?Type=Flash',
    filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash' } );

        //]]>
    </script>
    <br /><br /><br />
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value=" ��� Editor Talk " name="submit">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" value=" ���� " name="reset">
    <br /><br /><br />
						</FORM>
<?
}else{
	echo $ProcessOutput ;
}
?>