<?php
$prevArray = '[{"_id":1,"someKey":"RINGING","meta":{"subKey1":1234,"subKey2":52}}]';
$currArray = '[{"_id":1,"someKey":"HANGUP","meta":{"subKey1":1234}},{"_id":2,"someKey":"RINGING","meta":{"subKey1":5678,"subKey2":207,"subKey3":52}}]';
$datacurrArray = json_decode($currArray,true);
function arrayDiffToHtmlTable($prevArray, $currArray) {
	//$dataprevArray = json_decode($prevArray,true);
	$datacurrArray = json_decode($currArray,true);
   $htmlTableString="<table width='50%' align='center'>";
   $htmlTableString.="<tr>";
   $htmlTableString.="<th>";
   $htmlTableString.="_id";     
   $htmlTableString.="</th>";
   $htmlTableString.="<th>";
   $htmlTableString.="someKey";    
   $htmlTableString.="</th>";
   $htmlTableString.="<th>";
   $htmlTableString.="meta_subKey1";     
   $htmlTableString.="</th>";
   $htmlTableString.="<th>";
   $htmlTableString.="meta_subKey2";     
   $htmlTableString.="</th>"; 
   $htmlTableString.="<th>";
   $htmlTableString.="meta_subKey3";     
   $htmlTableString.="</th>";   
   $htmlTableString.="</tr>";   
   for($j=0;$j<count($datacurrArray);$j++){
	if($j==1){
		$bold = " style='font-weight:bold;'";
	}else{
		$bold = "";
	}
	if($j==0){
		$boldf = " style='font-weight:bold;'";
	}else{
		$boldf = "";
	}
	
   $htmlTableString.="<tr>";
   $htmlTableString.="<td align='center'".$bold.">";
   if(isset($datacurrArray[$j]['_id'])){
   $htmlTableString.=$datacurrArray[$j]['_id']; 
   }   
   $htmlTableString.="</td>";
   $htmlTableString.="<td align='center'".$bold.$boldf.">";
   if(isset($datacurrArray[$j]['someKey'])){
   $htmlTableString.=$datacurrArray[$j]['someKey']; 
   }   
   $htmlTableString.="</td>";
   $htmlTableString.="<td align='center'".$bold.">";
   if(isset($datacurrArray[$j]['meta']['subKey1'])){
   $htmlTableString.=$datacurrArray[$j]['meta']['subKey1']; 
   }   
   $htmlTableString.="</td>";   
   if(isset($datacurrArray[$j]['meta']['subKey2'])){	
   $htmlTableString.="<td align='center'".$bold.">";
   $htmlTableString.=$datacurrArray[$j]['meta']['subKey2']; 
   } else {
	$htmlTableString.="<td align='center'".$bold.$boldf.">";
   $htmlTableString.="DELETED";    
   }     
   $htmlTableString.="</td>";
   $htmlTableString.="<td align='center'".$bold.">";
   if(isset($datacurrArray[$j]['meta']['subKey3'])){
   $htmlTableString.=$datacurrArray[$j]['meta']['subKey3'];
   }   
   $htmlTableString.="</td>";   
   $htmlTableString.="</tr>";
   }
   $htmlTableString.="</table>";    
 
    return $htmlTableString;
}
echo arrayDiffToHtmlTable($prevArray, $currArray);
?>
