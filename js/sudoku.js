// JavaScript Document
/*
****************************************************************
** SODOKU Puzzle
****************************************************************
** Page Author : Tathagata Basu
** Created On  : 31/10/2013
****************************************************************
*/
$(document).ready(function(){
	
	//JS Variable
	var box = $(".box");
	
	var saveSet = $("#saveSet");
	
	var newSet = $("#newSet");
	var addNewSet = $("#addNewSet");
	
	var stepSol = $("#stepSol");
	var oneClickSol = $("#oneClickSol");
	
	//JS PageInit
	
	
	
	
	
	//JS Trigger
	box.keyup(ValidateInput);
	
	saveSet.click(SaveSet);
	
	addNewSet.click(NewSet);
	
	stepSol.click(StepSol);
	oneClickSol.click(OneClickSol);
	
	//JS Function
	function ValidateInput() {
		
		if(isNaN($("#"+this.id).val())){
			$("#"+this.id).val("");
		}
		ValidateAll();
		
	}
	
	function NewSet() {
		
		window.location.href = $(location).attr('href')+'?action=newSet';
		
	}
	
	function SaveSet() {
		
		if(!ValidateAll()) {
			alert("Invalid Set !!");
			return false;
		}
		
		if(!confirm("Do you want to save the set ??")) {
			return false;
		}
		
		var set = "0";
		var i;
		for(i=1;i<=81;i++) {
			set = set+","+$("#b"+i).val();
		}
		$.ajax({
			type:'POST',
			url:"sudoku_ajax.php",
			data:"action=saveSet&value="+set,
			success:function(result){
				alert(result);
			}
		});
		
	}
	
	function StepSol() {
		
		var set = "0";
		var i;
		for(i=1;i<=81;i++) {
			set = set+","+$("#b"+i).val();
		}
		$.ajax({
			type:'POST',
			url:"sudoku_ajax.php",
			data:"action=stepSol&value="+set,
			success:function(result){
				var retArr = result.split("^");
				var solArr = retArr[0].split(",");
				for(i=1;i<=81;i++) {
					$("#b"+i).val(solArr[i]);
				}
				$("#approx").html(retArr[1]);
			}
		});
		
		
	}
	
	function OneClickSol() {
		
		var set = "0";
		var i;
		for(i=1;i<=81;i++) {
			set = set+","+$("#b"+i).val();
		}
		
		$.ajax({
			type:'POST',
			url:"sudoku_ajax.php",
			data:"action=oneClickSol&value="+set,
			success:function(result){
				var retArr = result.split("^");
				var solArr = retArr[0].split(",");
				for(i=1;i<=81;i++) {
					$("#b"+i).val(solArr[i]);
				}
				$("#approx").html(retArr[1]);
				ValidateAll();
			}
		});
		
		
	}
	
	$("#validateAll").click(ValidateAll);
	
	function ValidateAll() {
		
		var errCount = 0;
		
		var boxSet = [[1,2,3,10,11,12,19,20,21],[4,5,6,13,14,15,22,23,24],[7,8,9,16,17,18,25,26,27],[28,29,30,37,38,39,46,47,48],[31,32,33,40,41,42,49,50,51],[34,35,36,43,44,45,52,53,54],[55,56,57,64,65,66,73,74,75],[58,59,60,67,68,69,76,77,78],[61,62,63,70,71,72,79,80,81]];
		
		var i;
		
		for(i=1;i<=81;i++) {
			
			var r;
			var c;
			var p;
			var x;
			
			var row = Math.floor((i-1)/9);
			var col = i-row*9-1;
			for(x=0;x<9;x++) {
				if(boxSet[x].indexOf(i)!=-1) {
					var box = x; break;
				}
			}
			
			var flag = 1;
			
			//Validate Row
			for(c=0;c<9;c++) {
				p = row*9+c+1;
				if( (p!=i) && ($("#b"+p).val() == $("#b"+i).val()) && ($("#b"+i).val()!="") ) {
					flag = 0;
				}
			}
			
			//Validate Column
			for(r=0;r<9;r++) {
				p = r*9+col+1;
				if( (p!=i) && ($("#b"+p).val() == $("#b"+i).val()) && ($("#b"+i).val()!="") ) {
					flag = 0;
				}
			}
			
			//Box Validation
			for(x=0;x<9;x++) {
				p = boxSet[box][x];
				if( (p!=i) && ($("#b"+p).val() == $("#b"+i).val()) && ($("#b"+i).val()!="") ) {
					flag = 0;
				}
			}
			
			if($("#b"+i).attr("readonly")==false) {
				if(flag == 0) {
					errCount++;
					$("#b"+i).css({"color":"#F00"});
				} else {
					$("#b"+i).css({"color":"#00F"});
				}
			}
						
		}
		
		if(errCount == 0) {
			return true;
		} else {
			return false;
		}
		
	}
	
	
	
	
	
	
	
})