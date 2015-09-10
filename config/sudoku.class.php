<?php
/*
****************************************************************
** SODOKU Puzzle
****************************************************************
** Page Author : Tathagata Basu
** Created On  : 31/10/2013
****************************************************************
*/
require_once('db.class.php');
class sudoku extends db {
	
	var $db;
	var $count;

	/*
		construct function for class monitoring
	*/
	function __construct() {
		
		session_start();
		
		ini_set('max_execution_time', 3600);
		
		$this->db = $this->con();
		$this->count = 0;
		
	}
	
	/*
		Real escape string
	*/
	function RealEscape($data) {
		foreach($data as $key=>$val)
		{
		$data[$key] = $this->db->real_escape_string($val);
		}
		return $data;
	}
	
	function SaveSet($data) {
		
		if($this->db->query("INSERT INTO sudoku_set VALUES('','".$data."','".date('Y-m-d H:i:s')."')")) {
			return "Set ".$this->db->insert_id." saved successfully !!";
		} else {
			return "Failed to save the set !! Try again...";
		}
		
	}
	
	function FetchSudoku($id) {
		
		if($id=="") {
			$arrS = $this->db->query("SELECT * FROM sudoku_set ORDER BY RAND() LIMIT 0,1")->fetch_array();
		} else {
			$arrS = $this->db->query("SELECT * FROM sudoku_set WHERE s_id=".$id)->fetch_array();
		}
		
		return explode(",",$arrS['s_value']);
		
	}
	
	//Step By Step
	function SolveSudokuStepByStep($solArr) {
		
		$setArr = $solArr;
		
		$rowSol = array();
		$colSol = array();
		$boxSol = array();
		
		for($r=0;$r<9;$r++) {
			$eArr = array();
			for($c=0;$c<9;$c++) {
				$p = $r*9+$c+1;
				if($setArr[$p]<>"") {
					array_push($eArr,$setArr[$p]);
				}
			}
			$rowSol[$r] = $eArr; //Element in Row
		}
		
		for($c=0;$c<9;$c++) {
			$eArr = array();
			for($r=0;$r<9;$r++) {
				$p = $r*9+$c+1;
				if($setArr[$p]<>"") {
					array_push($eArr,$setArr[$p]);
				}
			}
			$colSol[$c] = $eArr; //Element in Column
		}
		
		$boxSet = array(array(1,2,3,10,11,12,19,20,21),array(4,5,6,13,14,15,22,23,24),array(7,8,9,16,17,18,25,26,27),array(28,29,30,37,38,39,46,47,48),array(31,32,33,40,41,42,49,50,51),array(34,35,36,43,44,45,52,53,54),array(55,56,57,64,65,66,73,74,75),array(58,59,60,67,68,69,76,77,78),array(61,62,63,70,71,72,79,80,81));
		for($b=0;$b<9;$b++) {
			$eArr = array();
			for($i=0;$i<9;$i++) {
				$p = $boxSet[$b][$i];
				if($setArr[$p]<>"") {
					array_push($eArr,$setArr[$p]);
				}
			}
			$boxSol[$b] = $eArr; //Element in Box
		}
		
		for($i=1;$i<=81;$i++) {
	
			//Calculating Parent Row, Column & Box
			$row = floor(($i-1)/9);
			$col = $i-$row*9-1;
			for($x=0;$x<9;$x++) {
				if(array_search($i,$boxSet[$x])!==false) {
					$box = $x; break;
				}
			}
			
			if($setArr[$i]=="") {
				$elem = "";
				$elemAllArr = array(1,2,3,4,5,6,7,8,9);
				$probArr = array_unique(array_merge($rowSol[$row], $colSol[$col],$boxSol[$box]));
				$approxArr = array_values(array_diff($elemAllArr,$probArr));
				if(count($approxArr)==1) {
					$solArr[$i] = $approxArr[0];
				}
				if(count($approxArr)>1) {
					$approxSolArr[$i] = $approxArr;
				}
				
			} else {
				$approxArr = array();
				$elem = $setArr[$i];
			}
			
		}
		//print_r($solArr);exit;
		
		$retArr = array();
		$retArr['solArr'] = $solArr;
		$retArr['approxArr'] = $approxSolArr;
		
		return $retArr;
		
	}
	
	
	//One-Click Solution
	function SolveSudoku($solArr) {
		
		$primSet = $solArr;
		
		$setArr = $solArr;
		
		$rowSol = array();
		$colSol = array();
		$boxSol = array();
		
		for($r=0;$r<9;$r++) {
			$eArr = array();
			for($c=0;$c<9;$c++) {
				$p = $r*9+$c+1;
				if($setArr[$p]<>"") {
					array_push($eArr,$setArr[$p]);
				}
			}
			$rowSol[$r] = $eArr; //Element in Row
		}
		
		for($c=0;$c<9;$c++) {
			$eArr = array();
			for($r=0;$r<9;$r++) {
				$p = $r*9+$c+1;
				if($setArr[$p]<>"") {
					array_push($eArr,$setArr[$p]);
				}
			}
			$colSol[$c] = $eArr; //Element in Column
		}
		
		$boxSet = array(array(1,2,3,10,11,12,19,20,21),array(4,5,6,13,14,15,22,23,24),array(7,8,9,16,17,18,25,26,27),array(28,29,30,37,38,39,46,47,48),array(31,32,33,40,41,42,49,50,51),array(34,35,36,43,44,45,52,53,54),array(55,56,57,64,65,66,73,74,75),array(58,59,60,67,68,69,76,77,78),array(61,62,63,70,71,72,79,80,81));
		for($b=0;$b<9;$b++) {
			$eArr = array();
			for($i=0;$i<9;$i++) {
				$p = $boxSet[$b][$i];
				if($setArr[$p]<>"") {
					array_push($eArr,$setArr[$p]);
				}
			}
			$boxSol[$b] = $eArr; //Element in Box
		}
		
		for($i=1;$i<=81;$i++) {
	
			//Calculating Parent Row, Column & Box
			$row = floor(($i-1)/9);
			$col = $i-$row*9-1;
			for($x=0;$x<9;$x++) {
				if(array_search($i,$boxSet[$x])!==false) {
					$box = $x; break;
				}
			}
			
			if($setArr[$i]=="") {
				$elem = "";
				$elemAllArr = array(1,2,3,4,5,6,7,8,9);
				$probArr = array_unique(array_merge($rowSol[$row], $colSol[$col],$boxSol[$box]));
				$approxArr = array_values(array_diff($elemAllArr,$probArr));
				if(count($approxArr)==1) {
					$solArr[$i] = $approxArr[0];
				}
				if(count($approxArr)>1) {
					$approxSolArr[$i] = $approxArr;
				}
				
			} else {
				$approxArr = array();
				$elem = $setArr[$i];
			}
			
		}	
		
		$retArr = array();
		$retArr['solArr'] = $solArr;
		$retArr['approxArr'] = $approxSolArr;	
		
		//Check if Solved
		$flag = 1;
		foreach($solArr as $key=>$val) {
			if($val=="") {
				$flag=0;
			}
		}
		if($flag==0) {
			//Check for non-sollubility
			if(!($primSet === $solArr)) {
				$retArr = $this->SolveSudoku($retArr['solArr']);
			}
			else {
				$retArr = $this->TryProb($retArr['solArr'],$retArr['approxArr']);
			}
		} else {
		
			if($this->ValidateSudoku($solArr)) {
				$retArr['solArr'][0] = 1;
			}
			
		}
		
		return $retArr;
		
	}
	
	function TryProb($solArr,$approxArr) {
		
		echo "<pre>";
		//echo ++$this->count." : approxArr size => ".count($approxArr)."\n";
		/*print_r($solArr);*/
		
		
		//print_r($solArr);
		//print_r($approxArr);
		
		$minProbElemArr = array();
		
		//find to min preob number
		if(count($approxArr)<>0) {
			foreach($approxArr as $key=>$val) {
				$minProbElemArr[$key] = count($val);
			}
			//print_r($minProbElemArr);
			foreach($minProbElemArr as $key=>$val) {
				if(!isset($minProbElem)) {
					$minProbElem = $val;
					$minProbElemKey = $key;
				} else {
					if($minProbElem>$val) {
						$minProbElem = $val;
						$minProbElemKey = $key;
					}
				}
			}
			
			//try all probable element in that key ($minProbElemKey)
			
			foreach($approxArr[$minProbElemKey] as $key=>$val) {
				
				if( (isset($newSolSet)) && ($newSolSet[0]==1) ) { break; }
				
				$newSolSet = $solArr;
				$newSolSet[$minProbElemKey] = $val;
				
				
				$retArr = $this->SolveSudoku($newSolSet);
				$newSolSet = $retArr['solArr'];
				
			}
		}
		return $retArr;
		//exit;
		//echo "</pre>";
		
	}
	
	function ValidateSudoku($solArr) {
		
		$boxSet = array(array(1,2,3,10,11,12,19,20,21),array(4,5,6,13,14,15,22,23,24),array(7,8,9,16,17,18,25,26,27),array(28,29,30,37,38,39,46,47,48),array(31,32,33,40,41,42,49,50,51),array(34,35,36,43,44,45,52,53,54),array(55,56,57,64,65,66,73,74,75),array(58,59,60,67,68,69,76,77,78),array(61,62,63,70,71,72,79,80,81));
		
		$masterFlag = true;
				
		for($i=1;$i<=81;$i++) {
						
			$row = floor(($i-1)/9);
			$col = $i-$row*9-1;
			for($x=0;$x<9;$x++) {
				if(array_search($i,$boxSet[$x])!==false) {
					$box = $x; break;
				}
			}
			
			$flag = 1;
			
			//Validate Row
			for($c=0;$c<9;$c++) {
				$p = $row*9+$c+1;
				if( ($p!=$i) && ($solArr[$p] == $solArr[$i]) && ($solArr[$i]!="") ) {
					$flag = 0;
				}
			}
			
			//Validate Column
			for($r=0;$r<9;$r++) {
				$p = $r*9+$col+1;
				if( ($p!=$i) && ($solArr[$p] == $solArr[$i]) && ($solArr[$i]!="") ) {
					$flag = 0;
				}
			}
			
			//Box Validation
			for($x=0;$x<9;$x++) {
				$p = $boxSet[$box][$x];
				if( ($p!=$i) && ($solArr[$p] == $solArr[$i]) && ($solArr[$i]!="") ) {
					$flag = 0;
				}
			}
			
			if($flag == 0) {
				$masterFlag = false;
			}
						
		}
		return $masterFlag;
		
	}
	
	
}



?>