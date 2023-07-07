<?php

if(!empty($_POST)){
    $f = $_POST['f'];
    $inputGID = $_POST['inputGID'];
    $inputFname=changeQuot($_POST['inputFname']);
    $inputLname=changeQuot($_POST['inputLname']);
    $inputAddress=changeQuot($_POST['inputAddress']);
    $inputEmail=changeQuot($_POST['inputEmail']);
    $inputTel=changeQuot($_POST['inputTel']);
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
    
             $sql="UPDATE " . $config['ques']['choice'] . " SET ".implode(",",$update)." WHERE " . $config['ques']['choice'] . "_mid='".$_POST['myid']."'  AND  " . $config['ques']['choice'] . "_fid	='".$_POST['f']."'";
            // $Query=mysql_query($sql);
            $query = $db->execute($sql);
    
            
          $SubjectMail = " :: แจ้งทำแบบสอบถาม: ".$valTitleName."  :: ";
            $from = $core_admin_email;
            $to = $inputEmail;	
            
            $subject = "=?utf-8?B?".base64_encode($SubjectMail)."?=";
            $header  = "MIME-Version: 1.0\r\n";
            $header .= "Content-type: text/html; charset=utf-8\r\n";
            $header .= "From: ".$core_master_email."\r\n";
            $header .= "X-Mailer: PHP/picoHosting";
            $message = '
    <table width="700" border="0" align="center" cellpadding="0" cellspacing="0" style="background:#FFF; ">
    <tr>
    <td  style="text-align: justify; font-size: 14px;color: #444444;" align="left">
    Name: '.$inputFname.'  '.$inputLname.' <br/>
    Address: '.$inputAddress.'  <br/>
    E-mail: '.$inputEmail.'  <br/>
    Mobile: '.$inputTel.' 
    
    </td>
    </tr>
    <tr>
    <td>&nbsp;</td>
    </tr>
    <tr>
    <td height="50" valign="middle" align="left">
    <span  style="text-align: justify; font-size: 14px;color: #444444;"><strong>ขอแสดงความนับถืออย่างสูง ,</strong><br>
    '.$fornt_name_title.'</span><br>
    </td>
    </tr>
    <tr>
    <td height="100" valign="middle">&nbsp;</td>
    </tr>
    </table></td>
    </tr>
    </table>
    ';
            
            @mail($to, $subject, $message, $header);
    
    
    header("Location:" . $linklang . "/questDetail/save");
    exit();



}


