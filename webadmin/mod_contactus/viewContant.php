<?
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("../core/incLang.php");
include("incModLang.php");
include("config.php");

$valClassNav = 2;
$valNav1 = $langTxt["nav:home2"];
$valLinkNav1 = "../core/index.php";

$update = "";
$update[] = $mod_tb_root . "_status  	='Read'";

$sql = "UPDATE " . $mod_tb_root . " SET " . implode(",", $update) . " WHERE " . $mod_tb_root . "_id='" . $_POST["valEditID"] . "'  ";
$Query = mysql_query($sql);

// print_pre($_SESSION);
$sql = "SELECT ".$mod_tb_root."_id 
            , ".$mod_tb_root."_subject
            , ".$mod_tb_root."_message 
            , ".$mod_tb_root."_credate
            , ".$mod_tb_root."_name
            , ".$mod_tb_root."_status
            ,  ".$mod_tb_root."_gid  
            ,  ".$mod_tb_root."_address  
            ,  ".$mod_tb_root."_email  
            ,  ".$mod_tb_root."_tel  
            ,  ".$mod_tb_root."_file 
            ,  ".$mod_tb_root."_idcode
            s
			,  ".$mod_tb_root."_addressP
			,  ".$mod_tb_root."_addressC
			,  ".$mod_tb_root."_addressT
			,  ".$mod_tb_root."_totle
			,  ".$mod_tb_root."_nameJoin
			,  ".$mod_tb_root."_addressJ
			,  ".$mod_tb_root."_officeP
			,  ".$mod_tb_root."_officeC
			,  ".$mod_tb_root."_officeT
			,  ".$mod_tb_root."_zipcodeJ
			,  ".$mod_tb_root."_telJ
			,  ".$mod_tb_root."_unit
			,  ".$mod_tb_root."_station
			,  ".$mod_tb_root."_type
			,  ".$mod_tb_root."_area
			,  ".$mod_tb_root."_money
			,  ".$mod_tb_root."_sea
			,  ".$mod_tb_root."_water
			,  ".$mod_tb_root."_w
			,  ".$mod_tb_root."_zipcode
			,  ".$mod_tb_root."_ip
             FROM ".$mod_tb_root." 
             WHERE ".$mod_tb_root."_masterkey='".$_POST["masterkey"]."' 
                AND  ".$mod_tb_root."_language 	='".$_SESSION['ab_core_session_language']."'
                AND ".$mod_tb_root."_id='". $_POST["valEditID"]."' ";

                
			
    // echo $sql;
    $Query = mysql_query($sql);
    $Row = mysql_fetch_array($Query);

            $row_id = $Row[0];
			$row_subject=rechangeQuot($Row[1]);
			$row_message=rechangeQuot($Row[2]);
			$row_credate=DateFormatTime($Row[3]);
			$row_creby=rechangeQuot($Row[4]);
			$row_status=$Row[5];
			$row_gid=$Row[6];
			$row_address=rechangeQuot($Row[7]);
			$row_email=$Row[8];
			$row_tel=$Row[9];
		 	$linkRelativePath = $mod_path_file."/".$Row[10];
			$downloadFile = $Row[10];
			$downloadID = $Row[0];
			$downloadName = $Row[10];
			$imageType = strstr($downloadFile,'.');														

			$row_idcode=rechangeQuot($Row[11]);
			
			$row_addressP=loadProvinceMember($Row[12]);
			$row_addressC=loadAmphurMember($Row[13]);
			$row_addressT=loadDistrictMember($Row[14]);
			$row_totle=rechangeQuot($Row[15]);
			$row_nameJoin=rechangeQuot($Row[16]);
			$row_addressJ=rechangeQuot($Row[17]);
			$row_officeP=loadProvinceMember($Row[18]);
			$row_officeC=loadAmphurMember($Row[19]);
			$row_officeT=loadDistrictMember($Row[20]);
			$row_zipcodeJ=rechangeQuot($Row[21]);
			$row_telJ=rechangeQuot($Row[22]);
			$row_unit=rechangeQuot($Row[23]);
			$row_station=rechangeQuot($Row[24]);
			$row_type=rechangeQuot($Row[25]);
			$row_area=rechangeQuot($Row[26]);
			$row_money=rechangeQuot($Row[27]);
			$row_sea=rechangeQuot($Row[28]);
			$row_water=rechangeQuot($Row[29]);
			$row_w=rechangeQuot($Row[30]);
			$row_zipcode=rechangeQuot($Row[31]);
			$row_ip=rechangeQuot($Row[32]);


if ($valStatus == "Read") {
    $valStatusClass = "fontContantTbEnable";
} else {
    $valStatusClass = "fontContantTbDisable";
}


$valPermission = getUserPermissionOnMenu($_SESSION[$valSiteManage . "core_session_groupid"], $_REQUEST["menukeyid"]);

logs_access('3', 'View');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="robots" content="noindex, nofollow">
            <meta name="googlebot" content="noindex, nofollow">
                <link href="../css/theme.css" rel="stylesheet"/>

                <title><?= $core_name_title ?></title>
                <script language="JavaScript"  type="text/javascript" src="../js/scriptCoreWeweb.js"></script>
                </head>

                <body>
                    <form action="?" method="get" name="myForm" id="myForm">
                        <input name="execute" type="hidden" id="execute" value="update" />
                        <input name="masterkey" type="hidden" id="masterkey" value="<?= $_REQUEST['masterkey'] ?>" />
                        <input name="menukeyid" type="hidden" id="menukeyid" value="<?= $_REQUEST['menukeyid'] ?>" />
                        <input name="inputSearch" type="hidden" id="inputSearch" value="<?= $_REQUEST['inputSearch'] ?>" />
                        <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?= $_REQUEST['module_pageshow'] ?>" />
                        <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?= $_REQUEST['module_pagesize'] ?>" />
                        <input name="module_orderby" type="hidden" id="module_orderby" value="<?= $_REQUEST['module_orderby'] ?>" />
                        <input name="inputGh" type="hidden" id="inputGh" value="<?= $_REQUEST['inputGh'] ?>" />
                        <input name="valEditID" type="hidden" id="valEditID" value="<?= $_REQUEST['valEditID'] ?>" />
                        <input name="inputLt" type="hidden" id="inputLt" value="<?= $_REQUEST['inputLt'] ?>" />
                        <? if ($_REQUEST['viewID'] <= 0) { ?>
                            <div class="divRightNav">
                                <table width="96%" border="0" cellspacing="0" cellpadding="0"  align="center" >
                                    <tr>
                                        <td  class="divRightNavTb" align="left"  id="defTop" ><span class="fontContantTbNav"><a href="<?= $valLinkNav1 ?>" target="_self"><?= $valNav1 ?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <a  href="javascript:void(0)"  onclick="btnBackPage('index.php')" target="_self"><?= getNameMenu($_REQUEST["menukeyid"]) ?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <?= $langMod["txt:titleview"] ?></span></td>
                                        <td  class="divRightNavTb" align="right">



                                        </td>
                                    </tr>
                                </table>
                            </div>
                        <? } ?>
                        <div class="divRightHead">
                            <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center" >
                                <tr>
                                    <td height="77" align="left"><span class="fontHeadRight"><?= $langMod["txt:titleview"] ?></span></td>
                                    <td align="left">
                                        <table  border="0" cellspacing="0" cellpadding="0" align="right">
                                            <tr>
                                                <td align="right">
                                                    <? if ($_REQUEST['viewID'] <= 0) { ?>

                                                        <div  class="btnBack" title="<?= $langTxt["btn:back"] ?>" onclick="btnBackPage('index.php')"></div>
                                                    <? } ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="divRightMain" >
                            <br />
                            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                                <tr >
                                    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                                        <span class="formFontSubjectTxt"><?= $langMod["txt:info"] ?></span><br/>
                                        <span class="formFontTileTxt"><?= $langMod["txt:infoDe"] ?></span>    </td>
                                </tr>

                                <!-- รายละเอียด -->
                                <tr>
                                    <td width="23%"  align="right" valign="top"  class="formLeftContantTb"><?= $langMod["tit:offeror"] ?> : </td>
                                    <td width="84%"  height="25" style="padding-left:10px;" valign="top"><div class="formDivView"><?=$row_creby?></div></td>
                                </tr>
                                <tr>
                                    <td width="23%"  align="right" valign="top"  class="formLeftContantTb"><?= $langMod["tit:Hnum"] ?> : </td>
                                    <td width="84%"  height="25" style="padding-left:10px;" valign="top"><div class="formDivView"><?=$row_address?></div></td>
                                </tr>
                                <tr>
                                    <td width="23%"  align="right" valign="top"  class="formLeftContantTb"><?= $langMod["tit:tum"] ?> : </td>
                                    <td width="84%"  height="25" style="padding-left:10px;" valign="top"><div class="formDivView"><?=$row_addressT?></div></td>
                                </tr>
                                <td width="23%"  align="right" valign="top" class="formLeftContantTb"><?= $langMod["tit:amp"] ?> : </td>
                                    <td width="84%"  height="25" style="padding-left:10px;" valign="top"><div class="formDivView"><?=$row_addressC?></div></td>
                                </tr>
                                </tr>
                                    <td width="23%"  align="right" valign="top" class="formLeftContantTb"><?= $langMod["tit:prov"]  ?>  : </td>
                                    <td width="84%"  height="25" style="padding-left:10px;" valign="top"><div class="formDivView"><?=$row_addressP?></div></td>
                                </tr>
                                <tr>
                                    <td width="23%"  align="right" valign="top" class="formLeftContantTb"><?= $langMod["tit:zipcode"] ?> : </td>
                                    <td width="84%"  height="25" style="padding-left:10px;" valign="top"><div class="formDivView"><?=$row_zipcode?></div></td>
                                </tr>
                                <tr>
                                    <td width="23%"  align="right" valign="top" class="formLeftContantTb"><?= $langMod["tit:tel"] ?> : </td>
                                    <td width="84%"  height="25" style="padding-left:10px;" valign="top"><div class="formDivView"><?=$row_tel?></div></td>
                                </tr>
                                <tr>
                                    <td width="23%"  align="right" valign="top" class="formLeftContantTb"><?= $langMod["tit:Numofsponser"] ?>  : </td>
                                    <td width="84%"  height="25" style="padding-left:10px;" valign="top"><div class="formDivView"><?=$row_totle?></div></td>
                                </tr>
                                <tr>
                                    <td width="23%"  align="right" valign="top" class="formLeftContantTb"><?= $langMod["tit:sponser"] ?>  : </td>
                                    <td width="84%"  height="25" style="padding-left:10px;" valign="top"><div class="formDivView"><?=$row_nameJoin?></div></td>
                                </tr>
                                <tr>
                                    <td width="23%"  align="right" valign="top"  class="formLeftContantTb"><?= $langMod["tit:Hnum"] ?>  : </td>
                                    <td width="84%"  height="25" style="padding-left:10px;" valign="top"><div class="formDivView"><?=$row_addressJ?></div></td>
                                </tr>
                                <tr>
                                    <td width="23%"  align="right" valign="top"  class="formLeftContantTb"><?= $langMod["tit:tum"]  ?> : </td>
                                    <td width="84%"  height="25" style="padding-left:10px;" valign="top"><div class="formDivView"><?=$row_officeT?></div></td>
                                </tr>
                                <tr>
                                    <td width="23%"  align="right" valign="top"  class="formLeftContantTb"><?= $langMod["tit:amp"] ?>  : </td>
                                    <td width="84%"  height="25" style="padding-left:10px;" valign="top"><div class="formDivView"><?=$row_officeC?></div></td>
                                </tr>    
                                <tr>
                                    <td width="23%"  align="right" valign="top" class="formLeftContantTb"><?= $langMod["tit:prov"] ?>  : </td>
                                    <td width="84%"  height="25" style="padding-left:10px;" valign="top"><div class="formDivView"><?=$row_officeP?></div></td>
                                </tr>  
                                <tr>
                                    <td width="23%"  align="right" valign="top" class="formLeftContantTb"><?= $langMod["tit:zipcode"] ?>  : </td>
                                    <td width="84%"  height="25" style="padding-left:10px;" valign="top"><div class="formDivView"><?=$row_zipcodeJ?></div></td>
                                </tr>   
                                <tr>
                                    <td width="23%"  align="right" valign="top" class="formLeftContantTb"><?= $langMod["tit:tel"]  ?>  : </td>
                                    <td width="84%"  height="25" style="padding-left:10px;" valign="top" ><div class="formDivView"><?=$row_telJ?></div></td>
                                </tr>
                                <tr>     
                                    <td width="23%"  align="right" valign="top" class="formLeftContantTb"><?= $langMod["tit:Opsys"] ?> : </td>
                                    <td width="84%"  height="25" style="padding-left:10px;" valign="top"><div class="formDivView"><?=$row_unit?></div></td>
                                </tr> 
                                <tr>
                                    <td  align="right"  class="formLeftContantTb"><?= $langMod["tit:posalType"] ?>  : </td>
                                    <td  height="25" style="padding-left:10px;"><div class="formDivView">
		                            <? 
		                                $sql_group = "SELECT ".$mod_tb_root_group."_subject  FROM ".$mod_tb_root_group." WHERE ".$mod_tb_root_group."_status='Enable' AND  ".$mod_tb_root_group."_language='".$_SESSION['ab_core_session_language']."'   AND   ".$mod_tb_root_group."_id='".$row_gid."' ";
                                        // echo $sql_group
                                        $query_group=mysql_query($sql_group);
		                                $row_group=mysql_fetch_array($query_group);
		                                $row_groupname=rechangeQuot($row_group[0]);
		                                echo $row_groupname;
		                             ?>           
                                    </div></td>
                                </tr>
                                <tr>
                                    <td width="23%"  align="right" valign="top"  class="formLeftContantTb"><?= $langMod["tit:Place"] ?>  : </td>
                                    <td width="84%"  height="25" style="padding-left:10px;" valign="top"><div class="formDivView"><?=$row_station?></div></td>
                                </tr>
                                <tr>
                                    <td width="23%"  align="right" valign="top" class="formLeftContantTb"><?= $langMod["tit:NumofMater"] ?> : </td>
                                    <td width="84%"  height="25" style="padding-left:10px;" valign="top"><div class="formDivView"><?=$row_type?></div></td>
                                </tr>
                                <tr>
                                    <td  height="25" align="right" class="formLeftContantTb"><?= $langMod["tit:PlaceArea"] ?> : </td>
                                    <td style="padding-left:10px;"><div class="formDivView"><?= $row_area ?></div></td>
                                </tr>
                                <tr>
                                    <td width="23%"  height="25" align="right"  class="formLeftContantTb"><?= $langMod["tit:Budget"] ?> : </td>
                                    <td width="84%" style="padding-left:10px;"><div class="formDivView"><?=$row_money?></div></td>
                                </tr>
                                <tr>
                                    <td width="23%"  height="25" align="right" class="formLeftContantTb"><?= $langMod["tit:seafloor"] ?> : </td>
                                    <td width="84%" style="padding-left:10px;"><div class="formDivView"><?=$row_sea?></div></td>
                                </tr>
                                <tr>
                                    <td width="23%"  height="25" align="right" class="formLeftContantTb"><?= $langMod["tit:DepthWater"] ?> : </td>
                                    <td width="84%" style="padding-left:10px;"><div class="formDivView"><?=$row_water?></div></td>
                                </tr>
                                <tr>
                                    <td width="23%"  height="25" align="right" class="formLeftContantTb"><?= $langMod["tit:Coastal"] ?> : </td>
                                    <td width="84%" style="padding-left:10px;"><div class="formDivView"><?=$row_w?></div></td>
                                </tr>                    
                                 <!-- end รายละเอียด -->
                            </table>
                            <br />

                            <!-- ผังการจัดวาง -->
                            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                         	     <tr >
                         	     <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                         	     <span class="formFontSubjectTxt"><?= $langMod["tit:Attach"] ?></span><br/>
                         	     <span class="formFontTileTxt"><?= $langMod["tit::AttachDe"] ?> </span>   </td>
                         	     </tr>
                         	     <tr >
                         	     <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["tit:Layout"] ?> :<span class="fontContantAlert"></span></td>
                         	     <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView">
                         	     <?
                         	 			$sql="SELECT ".$mod_tb_file."_id,".$mod_tb_file."_filename,".$mod_tb_file."_name,".$mod_tb_file."_download FROM ".$mod_tb_file." WHERE ".$mod_tb_file."_contantid 	='".$_POST["valEditID"]."' AND ".$mod_tb_file."_language = 'P'  ORDER BY ".$mod_tb_file."_id ASC";
 
                                        $query_file=mysql_query($sql);
                         	 			$number_row=mysql_num_rows($query_file);
                         	 			if($number_row>=1){
                                            $txtFile="";
                                            while($row_file=mysql_fetch_array($query_file)){
                                                $linkRelativePath = $mod_path_file."/".$row_file[1];
                                                $downloadFile = $row_file[1];
                                                $downloadID = $row_file[0];
                                                $downloadName = $row_file[2];
                                                $countDownload= $row_file[3];
                                                $imageType = strstr($downloadFile,'.');
                         	 			?>
                         	                <div  style="float:left; width:100%; height:30px; margin-bottom:15px;"><img src="<?=get_Icon($downloadFile)?>" align="absmiddle" width="30"  /><a href="../<?=$mod_fd_root?>/download.php?linkPath=<?=$linkRelativePath?>&amp;downloadFile=<?=$downloadFile?>"><?=$downloadName."".$imageType?></a> | <?=$langMod["file:type"]?>: <?=$imageType?> | <?=$langMod["file:size"]?>: <?=get_IconSize($linkRelativePath)?></div>
                         	                <div></div>
                         	             <?
                                              }
                                        }else{
                                            echo "-";
                                        }
                         	    ?>
                         	    </td>
                         	 </tr>

                        <!-- end ผังการจัดวาง -->

                        <!-- แผนที่พื้นที่วาง -->
                            <tr >
                         	    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["tit:Lomap"] ?> :<span class="fontContantAlert"></span></td>
                         	     <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView">
                         	     <?
                         	 			$sql="SELECT ".$mod_tb_file."_id,".$mod_tb_file."_filename,".$mod_tb_file."_name,".$mod_tb_file."_download FROM ".$mod_tb_file." WHERE ".$mod_tb_file."_contantid 	='".$_POST["valEditID"]."' AND ".$mod_tb_file."_language = 'A'  ORDER BY ".$mod_tb_file."_id ASC";
 
                                        $query_file=mysql_query($sql);
                         	 			$number_row=mysql_num_rows($query_file);
                         	 			if($number_row>=1){
                                            $txtFile="";
                                            while($row_file=mysql_fetch_array($query_file)){
                                                $linkRelativePath = $mod_path_file."/".$row_file[1];
                                                $downloadFile = $row_file[1];
                                                $downloadID = $row_file[0];
                                                $downloadName = $row_file[2];
                                                $countDownload= $row_file[3];
                                                $imageType = strstr($downloadFile,'.');
                         	 			?>
                         	                <div  style="float:left; width:100%; height:30px; margin-bottom:15px;"><img src="<?=get_Icon($downloadFile)?>" align="absmiddle" width="30"  /><a href="../<?=$mod_fd_root?>/download.php?linkPath=<?=$linkRelativePath?>&amp;downloadFile=<?=$downloadFile?>"><?=$downloadName."".$imageType?></a> | <?=$langMod["file:type"]?>: <?=$imageType?> | <?=$langMod["file:size"]?>: <?=get_IconSize($linkRelativePath)?></div>
                         	                <div></div>
                         	             <?
                                              }
                                        }else{
                                            echo "-";
                                        }
                         	    ?>
                         	    </td>
                         	</tr>
                        <!-- end ผังการจัดวาง -->

                        <!-- รายละเอียดอื่น ๆ -->
                             <tr >
                         	    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["tit:OtherDe"] ?> :<span class="fontContantAlert"></span></td>
                         	     <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView">
                         	     <?
                         	 			$sql="SELECT ".$mod_tb_file."_id,".$mod_tb_file."_filename,".$mod_tb_file."_name,".$mod_tb_file."_download FROM ".$mod_tb_file." WHERE ".$mod_tb_file."_contantid 	='".$_POST["valEditID"]."' AND ".$mod_tb_file."_language = 'F'  ORDER BY ".$mod_tb_file."_id ASC";
 
                                        $query_file=mysql_query($sql);
                         	 			$number_row=mysql_num_rows($query_file);
                         	 			if($number_row>=1){
                                            $txtFile="";
                                            while($row_file=mysql_fetch_array($query_file)){
                                                $linkRelativePath = $mod_path_file."/".$row_file[1];
                                                $downloadFile = $row_file[1];
                                                $downloadID = $row_file[0];
                                                $downloadName = $row_file[2];
                                                $countDownload= $row_file[3];
                                                $imageType = strstr($downloadFile,'.');
                         	 			?>
                         	                <div  style="float:left; width:100%; height:30px; margin-bottom:15px;"><img src="<?=get_Icon($downloadFile)?>" align="absmiddle" width="30"  /><a href="../<?=$mod_fd_root?>/download.php?linkPath=<?=$linkRelativePath?>&amp;downloadFile=<?=$downloadFile?>"><?=$downloadName."".$imageType?></a> | <?=$langMod["file:type"]?>: <?=$imageType?> | <?=$langMod["file:size"]?>: <?=get_IconSize($linkRelativePath)?></div>
                         	                <div></div>
                         	             <?
                                              }
                                        }else{
                                            echo "-";
                                        }
                         	    ?>
                         	    </td>
                         	</tr>
                        </table>
                        <!-- end รายละเอียดอื่น ๆ -->

                         <br />
                            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                                <tr >
                                    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                                        <span class="formFontSubjectTxt"><?= $langTxt["us:titleinfo"] ?></span><br/>
                                        <span class="formFontTileTxt"><?= $langTxt["us:titleinfoDe"] ?></span>     </td>
                                </tr>
                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langTxt["us:credate"] ?> :</td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?=$row_credate?></div></td>
                                </tr>
                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" >IP :</td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?=$row_ip?></div> </td>
                                </tr>
                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langTxt["mg:status"] ?> :</td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" > <div class="formDivView"><?=$row_status?></div></td>
                                </tr>
                            </table>
                            <br />
                            <? if ($_REQUEST['viewID'] <= 0) { ?>
                                <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">

                                    <tr >
                                        <td colspan="7" align="right"  valign="top" height="20"></td>
                                    </tr>
                                    <tr >
                                        <td colspan="7" align="right"  valign="middle" class="formEndContantTb"><a href="#defTop" title="<?= $langTxt["btn:gototop"] ?>"><?= $langTxt["btn:gototop"] ?> <img src="../img/btn/top.png"  align="absmiddle"/></a></td>
                                    </tr>
                                <? } ?>
                            </table>
                        </div>
                    </form>
                    <? include("../lib/disconnect.php"); ?>
                    <link rel="stylesheet" type="text/css" href="../js/fancybox/jquery.fancybox.css" media="screen" />
                    <script language="JavaScript"  type="text/javascript" src="../js/fancybox/jquery.fancybox.js"></script>
                    <script type="text/javascript">
                                                            jQuery(function () {
                                                                jQuery('a[rel=viewAlbum]').fancybox({
                                                                    'padding': 0,
                                                                    'transitionIn': 'fade',
                                                                    'transitionOut': 'fade',
                                                                    'autoSize': false,
                                                                });
                                                            });
                    </script>

                </body>
                </html>
