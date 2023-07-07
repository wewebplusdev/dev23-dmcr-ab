<?php
	

    $inputGID = "";
    $inputFname="";
    $inputLname="";
    $inputAddress="";
    $inputEmail="";
    $inputTel="";
    $REMOTE_ADDR = getip();
    
            $sql_q ="SELECT " . $config['ques']['series'] . "_subject	 FROM " . $config['ques']['series'] . " WHERE  " . $config['ques']['series'] . "_id='".$f."' ";
            $query_q = $db->execute($sql_q);
            $valTitleName= rechangeQuot($query_q->fields[0]);
    
                    
            $insert="";
            $insert[$config['ques']['ans'] . "_fid"] = "'".$f."'";
            $insert[$config['ques']['ans'] . "_type"] = "'".$inputGID."'";
            $insert[$config['ques']['ans'] . "_fname"] = "'".$inputFname."'";
            $insert[$config['ques']['ans'] . "_lname"] = "'".$inputLname."'";
            $insert[$config['ques']['ans'] . "_tel"] = "'".$inputTel."'";
            $insert[$config['ques']['ans'] . "_email"] = "'".$inputEmail."'";
            $insert[$config['ques']['ans'] . "_address"] = "'".$inputAddress."'";
            $insert[$config['ques']['ans'] . "_credate"] = "NOW()";
            $insert[$config['ques']['ans'] . "_ip"] = "'".$REMOTE_ADDR."'";
            $insert[$config['ques']['ans'] . "_status"] = "'New'";
    
            //  $sql="INSERT INTO ".$mod_tb_ans."(".implode(",",array_keys($insert)).") VALUES (".implode(",",array_values($insert)).")";
            // $Query=mysql_query($sql);	
            // $midQuery=mysql_insert_id();	

            $sql = "INSERT INTO " . $config['ques']['ans'] . "(" . implode(",", array_keys($insert)) . ") VALUES (" . implode(",", array_values($insert)) . ")";
            // print_pre($sql);
            $Query = $db->execute($sql);
            $midQuery = $db->insert_Id();
            
            $update="";
            $update[]=$config['ques']['choice'] . "_mid  	='".$midQuery."'";
            $update[]=$config['ques']['choice'] . "_status='Enable'";
    
             $sql="UPDATE " . $config['ques']['choice'] . " SET ".implode(",",$update)." WHERE " . $config['ques']['choice'] . "_mid='".$myid."'  AND  " . $config['ques']['choice'] . "_fid	='".$f."'";
            // $Query=mysql_query($sql);
            $query = $db->execute($sql);
    
            
          
    
    
    header("Location:" . $linklang . "/questDetail/save");
    exit();






