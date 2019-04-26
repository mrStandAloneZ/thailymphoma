<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<title>ตัวอย่างปฎิทินภาษาไทย</title>
<link type="text/css" href="modules/test/flora.calendars.picker.css" rel="stylesheet"/>
<script type="text/javascript" src="modules/test/jquery.min.js"></script>
<script type="text/javascript" src="modules/test/jquery.calendars.min.js"></script>
<script type="text/javascript" src="modules/test/jquery.calendars.plus.min.js"></script>
<script type="text/javascript" src="modules/test/jquery.calendars.picker.min.js"></script>
<script type="text/javascript" src="modules/test/jquery.calendars.thai.min.js"></script>
<script type="text/javascript" src="modules/test/jquery.calendars.thai-th.js"></script>
<script type="text/javascript" src="modules/test/jquery.calendars.picker-th.js"></script>



<script type="text/javascript">

$(function() {
    $('#mydate').calendarsPicker({calendar: $.calendars.instance('thai','th')});
});

</script>




</head>
<body>
<h1>ตัวอย่างปฎิทินภาษาไทย</h1>
<p>วันที่: <input id="mydate" type="text" name="mydate" class="my-picker" value="" /></p>


</body>
</html>