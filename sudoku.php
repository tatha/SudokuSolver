<?php
/*
****************************************************************
** SODOKU Puzzle
****************************************************************
** Page Author : Tathagata Basu
** Created On  : 31/10/2013
****************************************************************
*/
require_once('config/sudoku.class.php');
$sudoku = new sudoku;
////////////////////////////////////////////////////////////////
if( (isset($_REQUEST['action'])) && ($_REQUEST['action']=="newSet") ) {
	
} else {
	if(isset($_REQUEST['set'])){
		$setId = $_REQUEST['set'];
	} else {
		$setId = "";
	}
	$setArr = $sudoku->FetchSudoku($setId);
}
////////////////////////////////////////////////////////////////
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>SODOKU</title>
<link href="css/sudoku.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/sudoku.js"></script>
</head>

<body>
<div class="container">
<div class="content">
<h2>S U D O K U&nbsp;&nbsp;&nbsp;S O L V E R</h2>
<table class="mainBox">
  <tr>
    <td>
    <table class="subBox">
      <tr>
        <td><input type="text" class="box" name="b1" id="b1" value="<?=$setArr[1]?>" <?php if($setArr[1]!="") { echo "readonly"; } ?> maxlength="1"></td>
        <td><input type="text" class="box" name="b2" id="b2" value="<?=$setArr[2]?>" <?php if($setArr[2]!="") { echo "readonly"; } ?> maxlength="1"></td>
        <td><input type="text" class="box" name="b3" id="b3" value="<?=$setArr[3]?>" <?php if($setArr[3]!="") { echo "readonly"; } ?> maxlength="1"></td>
      </tr>
      <tr>
        <td><input type="text" class="box" name="b10" id="b10" value="<?=$setArr[10]?>" <?php if($setArr[10]!="") { echo "readonly"; } ?> maxlength="1"></td>
        <td><input type="text" class="box" name="b11" id="b11" value="<?=$setArr[11]?>" <?php if($setArr[11]!="") { echo "readonly"; } ?> maxlength="1"></td>
        <td><input type="text" class="box" name="b12" id="b12" value="<?=$setArr[12]?>" <?php if($setArr[12]!="") { echo "readonly"; } ?> maxlength="1"></td>
      </tr>
      <tr>
        <td><input type="text" class="box" name="b19" id="b19" value="<?=$setArr[19]?>" <?php if($setArr[19]!="") { echo "readonly"; } ?> maxlength="1"></td>
        <td><input type="text" class="box" name="b20" id="b20" value="<?=$setArr[20]?>" <?php if($setArr[20]!="") { echo "readonly"; } ?> maxlength="1"></td>
        <td><input type="text" class="box" name="b21" id="b21" value="<?=$setArr[21]?>" <?php if($setArr[21]!="") { echo "readonly"; } ?> maxlength="1"></td>
      </tr>
    </table>
    </td>
    <td>
    <table class="subBox">
      <tr>
      	<td><input type="text" class="box" name="b4" id="b4" value="<?=$setArr[4]?>" <?php if($setArr[4]!="") { echo "readonly"; } ?> maxlength="1"></td>
        <td><input type="text" class="box" name="b5" id="b5" value="<?=$setArr[5]?>" <?php if($setArr[5]!="") { echo "readonly"; } ?> maxlength="1"></td>
        <td><input type="text" class="box" name="b6" id="b6" value="<?=$setArr[6]?>" <?php if($setArr[6]!="") { echo "readonly"; } ?> maxlength="1"></td>
      </tr>
      <tr>
        <td><input type="text" class="box" name="b13" id="b13" value="<?=$setArr[13]?>" <?php if($setArr[13]!="") { echo "readonly"; } ?> maxlength="1"></td>
        <td><input type="text" class="box" name="b14" id="b14" value="<?=$setArr[14]?>" <?php if($setArr[14]!="") { echo "readonly"; } ?> maxlength="1"></td>
        <td><input type="text" class="box" name="b15" id="b15" value="<?=$setArr[15]?>" <?php if($setArr[15]!="") { echo "readonly"; } ?> maxlength="1"></td>
      </tr>
      <tr>
        <td><input type="text" class="box" name="b22" id="b22" value="<?=$setArr[22]?>" <?php if($setArr[22]!="") { echo "readonly"; } ?> maxlength="1"></td>
        <td><input type="text" class="box" name="b23" id="b23" value="<?=$setArr[23]?>" <?php if($setArr[23]!="") { echo "readonly"; } ?> maxlength="1"></td>
        <td><input type="text" class="box" name="b24" id="b24" value="<?=$setArr[24]?>" <?php if($setArr[24]!="") { echo "readonly"; } ?> maxlength="1"></td>
      </tr>
    </table>
    </td>
    <td>
    <table class="subBox">
      <tr>
      	<td><input type="text" class="box" name="b7" id="b7" value="<?=$setArr[7]?>" <?php if($setArr[7]!="") { echo "readonly"; } ?> maxlength="1"></td>
        <td><input type="text" class="box" name="b8" id="b8" value="<?=$setArr[8]?>" <?php if($setArr[8]!="") { echo "readonly"; } ?> maxlength="1"></td>
        <td><input type="text" class="box" name="b9" id="b9" value="<?=$setArr[9]?>" <?php if($setArr[9]!="") { echo "readonly"; } ?> maxlength="1"></td>
      </tr>
      <tr>
        <td><input type="text" class="box" name="b16" id="b16" value="<?=$setArr[16]?>" <?php if($setArr[16]!="") { echo "readonly"; } ?> maxlength="1"></td>
        <td><input type="text" class="box" name="b17" id="b17" value="<?=$setArr[17]?>" <?php if($setArr[17]!="") { echo "readonly"; } ?> maxlength="1"></td>
        <td><input type="text" class="box" name="b18" id="b18" value="<?=$setArr[18]?>" <?php if($setArr[18]!="") { echo "readonly"; } ?> maxlength="1"></td>
      </tr>
      <tr>
        <td><input type="text" class="box" name="b25" id="b25" value="<?=$setArr[25]?>" <?php if($setArr[25]!="") { echo "readonly"; } ?> maxlength="1"></td>
        <td><input type="text" class="box" name="b26" id="b26" value="<?=$setArr[26]?>" <?php if($setArr[26]!="") { echo "readonly"; } ?> maxlength="1"></td>
        <td><input type="text" class="box" name="b27" id="b27" value="<?=$setArr[27]?>" <?php if($setArr[27]!="") { echo "readonly"; } ?> maxlength="1"></td>
      </tr>
    </table>
    </td>
  </tr>
  <tr>
    <td>
    <table class="subBox">
      <tr>
        <td><input type="text" class="box" name="b28" id="b28" value="<?=$setArr[28]?>" <?php if($setArr[28]!="") { echo "readonly"; } ?> maxlength="1"></td>
        <td><input type="text" class="box" name="b29" id="b29" value="<?=$setArr[29]?>" <?php if($setArr[29]!="") { echo "readonly"; } ?> maxlength="1"></td>
        <td><input type="text" class="box" name="b30" id="b30" value="<?=$setArr[30]?>" <?php if($setArr[30]!="") { echo "readonly"; } ?> maxlength="1"></td>
      </tr>
      <tr>
        <td><input type="text" class="box" name="b37" id="b37" value="<?=$setArr[37]?>" <?php if($setArr[37]!="") { echo "readonly"; } ?> maxlength="1"></td>
        <td><input type="text" class="box" name="b38" id="b38" value="<?=$setArr[38]?>" <?php if($setArr[38]!="") { echo "readonly"; } ?> maxlength="1"></td>
        <td><input type="text" class="box" name="b39" id="b39" value="<?=$setArr[39]?>" <?php if($setArr[39]!="") { echo "readonly"; } ?> maxlength="1"></td>
      </tr>
      <tr>
        <td><input type="text" class="box" name="b46" id="b46" value="<?=$setArr[46]?>" <?php if($setArr[46]!="") { echo "readonly"; } ?> maxlength="1"></td>
        <td><input type="text" class="box" name="b47" id="b47" value="<?=$setArr[47]?>" <?php if($setArr[47]!="") { echo "readonly"; } ?> maxlength="1"></td>
        <td><input type="text" class="box" name="b48" id="b48" value="<?=$setArr[48]?>" <?php if($setArr[48]!="") { echo "readonly"; } ?> maxlength="1"></td>
      </tr>
    </table>
    </td>
    <td>
    <table class="subBox">
      <tr>
        <td><input type="text" class="box" name="b31" id="b31" value="<?=$setArr[31]?>" <?php if($setArr[31]!="") { echo "readonly"; } ?> maxlength="1"></td>
        <td><input type="text" class="box" name="b32" id="b32" value="<?=$setArr[32]?>" <?php if($setArr[32]!="") { echo "readonly"; } ?> maxlength="1"></td>
        <td><input type="text" class="box" name="b33" id="b33" value="<?=$setArr[33]?>" <?php if($setArr[33]!="") { echo "readonly"; } ?> maxlength="1"></td>
      </tr>
      <tr>
        <td><input type="text" class="box" name="b40" id="b40" value="<?=$setArr[40]?>" <?php if($setArr[40]!="") { echo "readonly"; } ?> maxlength="1"></td>
        <td><input type="text" class="box" name="b41" id="b41" value="<?=$setArr[41]?>" <?php if($setArr[41]!="") { echo "readonly"; } ?> maxlength="1"></td>
        <td><input type="text" class="box" name="b42" id="b42" value="<?=$setArr[42]?>" <?php if($setArr[42]!="") { echo "readonly"; } ?> maxlength="1"></td>
      </tr>
      <tr>
        <td><input type="text" class="box" name="b49" id="b49" value="<?=$setArr[49]?>" <?php if($setArr[49]!="") { echo "readonly"; } ?> maxlength="1"></td>
        <td><input type="text" class="box" name="b50" id="b50" value="<?=$setArr[50]?>" <?php if($setArr[50]!="") { echo "readonly"; } ?> maxlength="1"></td>
        <td><input type="text" class="box" name="b51" id="b51" value="<?=$setArr[51]?>" <?php if($setArr[51]!="") { echo "readonly"; } ?> maxlength="1"></td>
      </tr>
    </table>
    </td>
    <td>
    <table class="subBox">
      <tr>
        <td><input type="text" class="box" name="b34" id="b34" value="<?=$setArr[34]?>" <?php if($setArr[34]!="") { echo "readonly"; } ?> maxlength="1"></td>
        <td><input type="text" class="box" name="b35" id="b35" value="<?=$setArr[35]?>" <?php if($setArr[35]!="") { echo "readonly"; } ?> maxlength="1"></td>
        <td><input type="text" class="box" name="b36" id="b36" value="<?=$setArr[36]?>" <?php if($setArr[36]!="") { echo "readonly"; } ?> maxlength="1"></td>
      </tr>
      <tr>
        <td><input type="text" class="box" name="b43" id="b43" value="<?=$setArr[43]?>" <?php if($setArr[43]!="") { echo "readonly"; } ?> maxlength="1"></td>
        <td><input type="text" class="box" name="b44" id="b44" value="<?=$setArr[44]?>" <?php if($setArr[44]!="") { echo "readonly"; } ?> maxlength="1"></td>
        <td><input type="text" class="box" name="b45" id="b45" value="<?=$setArr[45]?>" <?php if($setArr[45]!="") { echo "readonly"; } ?> maxlength="1"></td>
      </tr>
      <tr>
        <td><input type="text" class="box" name="b52" id="b52" value="<?=$setArr[52]?>" <?php if($setArr[52]!="") { echo "readonly"; } ?> maxlength="1"></td>
        <td><input type="text" class="box" name="b53" id="b53" value="<?=$setArr[53]?>" <?php if($setArr[53]!="") { echo "readonly"; } ?> maxlength="1"></td>
        <td><input type="text" class="box" name="b54" id="b54" value="<?=$setArr[54]?>" <?php if($setArr[54]!="") { echo "readonly"; } ?> maxlength="1"></td>
      </tr>
    </table>
    </td>
  </tr>
  <tr>
    <td>
    <table class="subBox">
      <tr>
        <td><input type="text" class="box" name="b55" id="b55" value="<?=$setArr[55]?>" <?php if($setArr[55]!="") { echo "readonly"; } ?> maxlength="1"></td>
        <td><input type="text" class="box" name="b56" id="b56" value="<?=$setArr[56]?>" <?php if($setArr[56]!="") { echo "readonly"; } ?> maxlength="1"></td>
        <td><input type="text" class="box" name="b57" id="b57" value="<?=$setArr[57]?>" <?php if($setArr[57]!="") { echo "readonly"; } ?> maxlength="1"></td>
      </tr>
      <tr>
        <td><input type="text" class="box" name="b64" id="b64" value="<?=$setArr[64]?>" <?php if($setArr[64]!="") { echo "readonly"; } ?> maxlength="1"></td>
        <td><input type="text" class="box" name="b65" id="b65" value="<?=$setArr[65]?>" <?php if($setArr[65]!="") { echo "readonly"; } ?> maxlength="1"></td>
        <td><input type="text" class="box" name="b66" id="b66" value="<?=$setArr[66]?>" <?php if($setArr[66]!="") { echo "readonly"; } ?> maxlength="1"></td>
      </tr>
      <tr>
        <td><input type="text" class="box" name="b73" id="b73" value="<?=$setArr[73]?>" <?php if($setArr[73]!="") { echo "readonly"; } ?> maxlength="1"></td>
        <td><input type="text" class="box" name="b74" id="b74" value="<?=$setArr[74]?>" <?php if($setArr[74]!="") { echo "readonly"; } ?> maxlength="1"></td>
        <td><input type="text" class="box" name="b75" id="b75" value="<?=$setArr[75]?>" <?php if($setArr[75]!="") { echo "readonly"; } ?> maxlength="1"></td>
      </tr>
    </table>
    </td>
    <td>
    <table class="subBox">
      <tr>
        <td><input type="text" class="box" name="b58" id="b58" value="<?=$setArr[58]?>" <?php if($setArr[58]!="") { echo "readonly"; } ?> maxlength="1"></td>
        <td><input type="text" class="box" name="b59" id="b59" value="<?=$setArr[59]?>" <?php if($setArr[59]!="") { echo "readonly"; } ?> maxlength="1"></td>
        <td><input type="text" class="box" name="b60" id="b60" value="<?=$setArr[60]?>" <?php if($setArr[60]!="") { echo "readonly"; } ?> maxlength="1"></td>
      </tr>
      <tr>
        <td><input type="text" class="box" name="b67" id="b67" value="<?=$setArr[67]?>" <?php if($setArr[67]!="") { echo "readonly"; } ?> maxlength="1"></td>
        <td><input type="text" class="box" name="b68" id="b68" value="<?=$setArr[68]?>" <?php if($setArr[68]!="") { echo "readonly"; } ?> maxlength="1"></td>
        <td><input type="text" class="box" name="b69" id="b69" value="<?=$setArr[69]?>" <?php if($setArr[69]!="") { echo "readonly"; } ?> maxlength="1"></td>
      </tr>
      <tr>
        <td><input type="text" class="box" name="b76" id="b76" value="<?=$setArr[76]?>" <?php if($setArr[76]!="") { echo "readonly"; } ?> maxlength="1"></td>
        <td><input type="text" class="box" name="b77" id="b77" value="<?=$setArr[77]?>" <?php if($setArr[77]!="") { echo "readonly"; } ?> maxlength="1"></td>
        <td><input type="text" class="box" name="b78" id="b78" value="<?=$setArr[78]?>" <?php if($setArr[78]!="") { echo "readonly"; } ?> maxlength="1"></td>
      </tr>
    </table>
    </td>
    <td>
    <table class="subBox">
      <tr>
        <td><input type="text" class="box" name="b61" id="b61" value="<?=$setArr[61]?>" <?php if($setArr[61]!="") { echo "readonly"; } ?> maxlength="1"></td>
        <td><input type="text" class="box" name="b62" id="b62" value="<?=$setArr[62]?>" <?php if($setArr[62]!="") { echo "readonly"; } ?> maxlength="1"></td>
        <td><input type="text" class="box" name="b63" id="b63" value="<?=$setArr[63]?>" <?php if($setArr[63]!="") { echo "readonly"; } ?> maxlength="1"></td>
      </tr>
      <tr>
        <td><input type="text" class="box" name="b70" id="b70" value="<?=$setArr[70]?>" <?php if($setArr[70]!="") { echo "readonly"; } ?> maxlength="1"></td>
        <td><input type="text" class="box" name="b71" id="b71" value="<?=$setArr[71]?>" <?php if($setArr[71]!="") { echo "readonly"; } ?> maxlength="1"></td>
        <td><input type="text" class="box" name="b72" id="b72" value="<?=$setArr[72]?>" <?php if($setArr[72]!="") { echo "readonly"; } ?> maxlength="1"></td>
      </tr>
      <tr>
        <td><input type="text" class="box" name="b79" id="b79" value="<?=$setArr[79]?>" <?php if($setArr[79]!="") { echo "readonly"; } ?> maxlength="1"></td>
        <td><input type="text" class="box" name="b80" id="b80" value="<?=$setArr[80]?>" <?php if($setArr[80]!="") { echo "readonly"; } ?> maxlength="1"></td>
        <td><input type="text" class="box" name="b81" id="b81" value="<?=$setArr[81]?>" <?php if($setArr[81]!="") { echo "readonly"; } ?> maxlength="1"></td>
      </tr>
    </table>
    </td>
  </tr>
</table>
<br>
<div>
<h2>Controls</h2>
<?php
if( (isset($_REQUEST['action'])) && ($_REQUEST['action']="newSet") ) {
?>
<input type="button" name="saveSet" id="saveSet" value="SaveSet">
<input type="button" name="backBtn" id="backBtn" value="Back" onClick="history.back();">
<?php
} else {
?>
<input type="button" name="newSet" id="newSet" value="New Set" onClick="location.reload()">
<input type="button" name="addNewSet" id="addNewSet" value="Add New Set"><br><br>
<!--<input type="button" name="stepSol" id="stepSol" value="Step-by-Step Solution">-->
<input type="button" name="oneClickSol" id="oneClickSol" value="One-Click Solution">
<input type="button" name="validateAll" id="validateAll" value="ValidateAll( Test )">
<?php
}
?>
</div>
<br>
<div>
<h2>Developed By</h2>
Tathagata Basu
<h2>Thanks</h2>
<a href="http://norvig.com/sudoku.html">http://norvig.com/sudoku.html</a>
</div>

</div>
<!--<pre>
<div class="content" id="approx" style="height:600px;overflow:auto;overflow-x:hidden;padding-right:50px;">

</div>
</pre>-->
</div>

</body>
</html>