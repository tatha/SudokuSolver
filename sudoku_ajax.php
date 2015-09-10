<?php
/*
****************************************************************
** SODOKU Puzzle
****************************************************************
** Page Author : Tathagata Basu
** Created On  : 31/10/2013
****************************************************************
*/
////////////////////////////////////////////////////////////////
ini_set('max_execution_time', 3600);
////////////////////////////////////////////////////////////////
require_once('config/sudoku.class.php');
$sudoku = new sudoku;
////////////////////////////////////////////////////////////////
$data = $sudoku->RealEscape($_REQUEST);
////////////////////////////////////////////////////////////////
switch($data['action']) {
	
	case 'saveSet':{
		echo $sudoku->SaveSet($data['value']);
		break;
	}
	
	case 'stepSol':{
		$solArr = explode(",",$data['value']);	
		$newSolArr = $sudoku->SolveSudokuStepByStep($solArr);
		$retSet = "";
		foreach($newSolArr['solArr'] as $key=>$val) { $retSet.=$val.","; }	
		echo substr($retSet,0,-1);
		echo "^";
		print_r($newSolArr['approxArr']);
		break;
	}
	
	case 'oneClickSol':{
		$solArr = explode(",",$data['value']);	
		$newSolArr = $sudoku->SolveSudoku($solArr);
		$retSet = "";
		foreach($newSolArr['solArr'] as $key=>$val) { $retSet.=$val.","; }	
		echo substr($retSet,0,-1);
		echo "^";
		print_r($newSolArr['approxArr']);
		break;
	}
	
	default:{
		echo "Invalid Selection !!";
	}
	
}



?>