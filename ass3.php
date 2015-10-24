<html>
<head>
<style>
div{
margin-top:5px;
margin-bottom:5px;
margin-right:5px;
margin-left:5px;
}
#a1{
width:1307px;
height:100px;
background-color:#AEC6FD;
}
#a2{
float:left;
width:200px;
height:400px;
background-color:grey;
}
#a3{
float:left;
width:1095px;
height:100px;
background-color:yellow;
}
#a4{
float:left;
width:1095px;
background-color:blue;
}
#a5{
float:left;
width:230px;
height:250px;
background-color:orange;
margin: 10px 0px 10px 11px;
padding: 0px 15px 0px 15px;
}
#a7{
float:left;
width:1307px;
height:100px;
background-color:pink;
}
#b1{
margin:1px;
float:left;
width:1095px;
}
.floatstop{
clear:both;
}
table{
margin: 0 auto;
}

</style>
</head>
<body>
<?php
$con = mysqli_connect("localhost", "root", "1234","ass3");

if (!$con) {
    die("Connection failed: " .mysql_error());
} 
?>


<div>
<div id="a1">
		HEAD
</div>
<div id="a2">
		SIDEBAR
</div>
<div id="b1">
<div id="a3">
		CONTENT~~~~!!!!!
</div>

<div id="a4">
<?php
$result = mysqli_query($con,"SELECT label, image FROM image");
while($row = mysqli_fetch_array($result))
echo"<div id='a5'><table border='1'><td align='center'><p><img src='data:image/png;base64,".base64_encode($row['image'])."'width='200' height='200'/></p><p>".$row['label']."</p></td></table></div>";
mysqli_close($con);
?>
</div>

</div>
</div>
<div id="a7">
		FOOTER
</div>
</div>
</body>
</html>