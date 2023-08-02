<?php

if($_POST){
    global $coreLanguageSQL;
    
            $insert=array();
            $insert[$config['contact']['main']['db']."_language"] = "'Thai'";
            $insert[$config['contact']['main']['db']."_masterkey"] = "'".$_POST['msKey']."'";
            
            $insert[$config['contact']['main']['db']."_name"] = "'".changeQuot($_POST['name'])."'";
            $insert[$config['contact']['main']['db']."_address"] = "'".changeQuot($_POST['address'])."'";
            $insert[$config['contact']['main']['db']."_addressP"] = "'".$_POST['province']."'";
            $insert[$config['contact']['main']['db']."_addressC"] = "'".$_POST['amphoe']."'";
            $insert[$config['contact']['main']['db']."_addressT"] = "'".$_POST['subDistrict']."'";
            $insert[$config['contact']['main']['db']."_zipcode"] = "'".changeQuot($_POST['zip'])."'";
            $insert[$config['contact']['main']['db']."_tel"] = "'".changeQuot($_POST['telephone'])."'";
    
        
            $insert[$config['contact']['main']['db']."_totle"] = "'".changeQuot($_POST['sponsorAmount'])."'";
            $insert[$config['contact']['main']['db']."_nameJoin"] = "'".changeQuot($_POST['sponsorName'])."'";
            $insert[$config['contact']['main']['db']."_addressJ"] = "'".changeQuot($_POST['address2'])."'";
            $insert[$config['contact']['main']['db']."_officeP"] = "'".$_POST['province1']."'";
            $insert[$config['contact']['main']['db']."_officeC"] = "'".$_POST['amphoe1']."'";
            $insert[$config['contact']['main']['db']."_officeT"] = "'".$_POST['subDistrict1']."'";
            $insert[$config['contact']['main']['db']."_zipcodeJ"] = "'".changeQuot($_POST['sponsorZip'])."'";
            $insert[$config['contact']['main']['db']."_telJ"] = "'".changeQuot($_POST['sponsorTelephone'])."'";
    
            $insert[$config['contact']['main']['db']."_unit"] = "'".changeQuot($_POST['agency'])."'";
            $insert[$config['contact']['main']['db']."_gid"] = "'".$_POST['tpyeDemand']."'";
            $insert[$config['contact']['main']['db']."_station"] = "'".changeQuot($_POST['locationExecution'])."'";
            $insert[$config['contact']['main']['db']."_type"] = "'".changeQuot($_POST['typeExecution'])."'";
            $insert[$config['contact']['main']['db']."_area"] = "'".changeQuot($_POST['sizeExecution'])."'";
            $insert[$config['contact']['main']['db']."_money"] = "'".changeQuot($_POST['budget'])."'";
            $insert[$config['contact']['main']['db']."_sea"] = "'".changeQuot($_POST['seaFloorFeatures'])."'";
            $insert[$config['contact']['main']['db']."_water"] = "'".changeQuot($_POST['waterDepth'])."'";
            $insert[$config['contact']['main']['db']."_w"] = "'".changeQuot($_POST['coastDistance'])."'";
            $insert[$config['contact']['main']['db']."_message"] = "'".changeQuot($_POST['details'])."'";
    
            $insert[$config['contact']['main']['db']."_ip"] = "'".$REMOTE_ADDR."'";
            $insert[$config['contact']['main']['db']."_credate"] = "NOW()";
            $insert[$config['contact']['main']['db']."_status"] = "'New Post'";
            $sql="INSERT INTO ".$config['contact']['main']['db']."(".implode(",",array_keys($insert)).") VALUES (".implode(",",array_values($insert)).")";
            $Query=$db->execute($sql);		
		    $contantID=$db->insert_Id();
            
            //     $sql_filetemp="SELECT ".$mod_tb_fileTemp."_id,".$mod_tb_fileTemp."_filename,".$mod_tb_fileTemp."_name,".$mod_tb_fileTemp."_language  FROM ".$mod_tb_fileTemp." WHERE ".$mod_tb_fileTemp."_contantid 	='".$_REQUEST['valEditID']."' ORDER BY ".$mod_tb_fileTemp."_id ASC";
            //     $query_filetemp=wewebQueryDB($coreLanguageSQL,$sql_filetemp);
            //     $number_filetemp=wewebNumRowsDB($coreLanguageSQL,$query_filetemp);
            //     if($number_filetemp>=1){
            //     while($row_filetemp=wewebFetchArrayDB($coreLanguageSQL,$query_filetemp)){
            //     $downloadID = $row_filetemp[0];
            //     $downloadFile = $row_filetemp[1];
            //     $downloadName = $row_filetemp[2];
            //     $downloadLang = $row_filetemp[3];
    
            //     $insert=array();
            //     $insert[$mod_tb_file."_contantid"] = "'".$contantID."'";
            //     $insert[$mod_tb_file."_filename"] = "'".$downloadFile."'";
            //     $insert[$mod_tb_file."_name"]="'".$downloadName."'";
            //     $insert[$mod_tb_file."_language"]="'".$downloadLang."'";
    
            //     $sql="INSERT INTO ".$mod_tb_file."(".implode(",",array_keys($insert)).") VALUES (".implode(",",array_values($insert)).")";
            //     $Query=wewebQueryDB($coreLanguageSQL,$sql);	
            
            //     $sql_del="DELETE FROM ".$mod_tb_fileTemp." WHERE   ".$mod_tb_fileTemp."_id='".$downloadID."'";
            //     $Query_del=wewebQueryDB($coreLanguageSQL,$sql_del);
    
        
            // }}	
                
        
    
    //     $sql_group = "SELECT ".$config['contact']['group']['db']."_subject FROM ".$config['contact']['group']['db']." WHERE ".$config['contact']['group']['db']."_id='".$_POST['tpyeDemand']."' ";
    //     $Query_group=wewebQueryDB($coreLanguageSQL,$sql_group);
    //     $Row_group=wewebFetchArrayDB($coreLanguageSQL,$Query_group);
    //     $txtNameGroup=rechangeQuot($Row_group[0]);
    
    //       $SubjectMail = "เสนอความต้องการ(".$txtNameGroup.") –".$fornt_name_title."";	
          
    //     $sql = "SELECT ".$config['contact']['email']['db']."_email FROM ".$config['contact']['email']['db']." WHERE ".$config['contact']['email']['db']."_gid='".$_POST['tpyeDemand']."' ";
    //     $Query=wewebQueryDB($coreLanguageSQL,$sql);
    //     $RecordCount=wewebNumRowsDB($coreLanguageSQL,$Query);
    //     $index=0;
    //     while($index<$RecordCount) {
    //     $Row=wewebFetchArrayDB($coreLanguageSQL,$Query);
    //     $txt_email=$Row[0];
    //     $from = $core_admin_email;
    //     $fromname = $fornt_name_title;
    //     $to = $txt_email;	
        
    //                 $subject = "=?utf-8?B?".base64_encode($SubjectMail)."?=";
    //                 $header  = "MIME-Version: 1.0\r\n";
    //                 $header .= "Content-type: text/html; charset=utf-8\r\n";
    //                 $header .= "From: <".$core_send_email.">\r\n";
    //                 $header .= "X-Mailer: PHP/picoHosting";
    //                 $message = '
    //         <table width="600" border="0" align="center" cellpadding="0" cellspacing="0" >
    //   <tr>
    //     <td height="65" align="left" valign="top"><img src="'.$core_full_path.'/images/email/logo.jpg" width="200" height="54"  /></td>
    //   </tr>
    //   <tr>
    //     <td height="5" bgcolor="#008fd5"> </td>
    //   </tr>
    //   <tr>
    //     <td height="3" bgcolor="#000000"> </td>
    //   </tr>
    //   <tr>
    //     <td height="20"  bgcolor="#F0F0F0">&nbsp;</td>
    //   </tr>
    //   <tr>
    //     <td valign="top">
    //     <table width="100%" border="0" cellspacing="0" cellpadding="0">
    //   <tr>
    //     <td colspan="3"></td>
    //     </tr>
    //   <tr>
    //     <td width="25" bgcolor="#F0F0F0">&nbsp;</td>
    //     <td width="92%" bgcolor="#F0F0F0">
    //     <table width="100%" border="0" cellspacing="0" cellpadding="0">
    //           <tr>
    //             <td  align="left" valign="top"  style="font-family: MS Serif, New York, serif;font-size: 13px;word-wrap: break-word; ">
              
    //             <p>เรียนผู้ดูแลระบบ</p>
    //               <p>คุณ <span style="font-weight: bold;	font-family: MS Serif, New York, serif;	font-size: 13px;	color: #000;">'.$_POST['inputName'].'</span> เสนอความต้องการผ่านทางเว็บไซต์ มีรายละเอียดการติดต่อสอบถามดังนี้</p>
                
    //               <p style="font-family: Verdana, Geneva, sans-serif;	font-size: 13px;">
    
    //                     หน่วยงานดำเนินการ: '.$_POST['inputUnit'].'<br />
    //                     ประเภทการเสนอความต้องการ:<br /> '.$txtNameGroup.'<br />
    //                     สถานที่วาง/ดำเนินการ: '.$_POST['inputStation'].'<br />
    //                     ชนิดขนาด และจำนวนวัสดุที่ใช้วาง/ดำเนินการ: '.$_POST['inputType'].'<br />
    //                     ขนาดพื้นที่จัดวาง/ดำเนินการ: '.$_POST['inputArea'].'<br />
    //                     งบประมาณ (บาท): '.$_POST['inputMoney'].'<br />
    //                     ลักษณะพื้นทะเล: '.$_POST['inputSea'].'<br />
    //                     ระดับความลึกของนํ้า: '.$_POST['inputWater'].'<br />
    //                     ระยะห่างชายฝั่ง: '.$_POST['inputW'].'
    //               </p>
    
    //               <p>ขอขอบพระคุณอีกครั้ง</p>
    //               <p style="font-family: Verdana, Geneva, sans-serif;	font-size: 13px;" >'.$fornt_name_title.'</p>              </td>
    //           </tr>
    //         </table>    </td>
    //     <td width="25" bgcolor="#F0F0F0">&nbsp;</td>
    //   </tr>
    //   <tr>
    //     <td colspan="3"  bgcolor="#F0F0F0">&nbsp;</td>
    //     </tr>
    // </table>    </td>
    //   </tr>
    //   <tr>
    //     <td height="20">&nbsp;</td>
    //   </tr>
    //   <tr>
    //     <td align="left" valign="top" bgcolor="#999999"><table width="600" border="0" cellspacing="0" cellpadding="0">
    //       <tr>
    //         <td width="15" height="10" align="left" valign="top"> </td>
    //         <td width="570" height="10" align="left" valign="top"> </td>
    //         <td width="15" height="10" align="left" valign="top"> </td>
    //       </tr>
    //       <tr>
    //         <td width="15" align="left" valign="top">&nbsp;</td>
    //         <td width="570" align="left" valign="top" class="info" style="font-family: Verdana, Geneva, sans-serif;	font-size: xx-small;	color: #FFF;">This e-mail was sent by:<br />
    //           <br />
    //           <span style="font-weight: bold;">'.$fornt_name_title.'<br />
    //          </span>เลขที่ 120 หมู่ที่ 3 ชั้นที่ 5-9 อาคารรัฐประศาสนภักดี ศูนย์ราชการเฉลิมพระเกียรติ 80 พรรษา 5 ธันวาคม 2550 ถนนแจ้งวัฒนะ แขวงทุ่งสองห้อง เขตหลักสี่ กรุงเทพ 10210</td>
    //         <td width="15" align="left" valign="top">&nbsp;</td>
    //       </tr>
    //       <tr>
    //         <td width="15" height="10" align="left" valign="top"> </td>
    //         <td width="570" height="10" align="left" valign="top"> </td>
    //         <td width="15" height="10" align="left" valign="top"> </td>
    //       </tr>
    //     </table></td>
    //   </tr>
      
      
    //   <tr>
    //     <td height="30">&nbsp;</td>
    //   </tr>
    // </table>
    //         ';
                    
    //                 @mail($to, $subject, $message, $header);
    
        
    //     $index++;
    //     }
        $dataJson = array(
            'status' => 200,
            'msg' => $Query,
            
        );
    }else{
        $dataJson = array(
            'status' => 200,
            'msg' => "error",
            
        );
    }


echo json_encode($dataJson);