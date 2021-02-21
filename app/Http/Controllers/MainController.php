<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Http\Response;


class MainController extends Controller {
	
	function test(Request $request) {
		$this->validate($request,["content"=>'required']);
		
		$content = $request->get('content');
		$rows = explode("\n",$content);
		
		$data = "";
		if(!empty($rows)) {
			$data .= "<table class='table' border='1' style='border-collapse:collapse' cellpadding='5' cellspacing='5'>"; 
			foreach($rows as $key=>$row) {
				if($key==0) {
					$data .= $this->createRow($row,true);
				} else {
					$data .= $this->createRow($row,false);
				}
			}
			$data .= '</table>';
		}
		
		return response()->json(['data'=>$data]);
	
	}
	
	public function createRow($row,$header) {
		$columns = explode(",",$row);
		$data = "";
		if(!empty($columns)) {
			$data .= '<tr>';
			foreach($columns as $column) {
				$data .= ($header) ? "<th>$column</th>" : "<td style='text-align:center'>$column</td>" ;
			}
			$data .= '<tr>';
		}
		
		return $data;
	}
}