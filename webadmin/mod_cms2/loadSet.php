<?
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("../core/incLang.php");
include("incModLang.php");
include("config.php");

$valClassNav=2;
$valNav1=$langTxt["nav:home2"];
$valLinkNav1="../core/index.php";

			
			$sqlCheck = "SELECT ".$mod_tb_set."_id   FROM ".$mod_tb_set." WHERE ".$mod_tb_set."_masterkey='".$_REQUEST["masterkey"]."'  ";
			$queryCheck=mysql_query($sqlCheck);
			$countNumCheck=mysql_num_rows($queryCheck);
			if($countNumCheck<=0){
				
				$insert="";
				$insert[$mod_tb_set."_language"] = "'".$_SESSION[$valSiteManage.'core_session_language']."'";
				$insert[$mod_tb_set."_masterkey"] = "'".$_REQUEST["masterkey"]."'";
				$insert[$mod_tb_set."_crebyid"] = "'".$_SESSION[$valSiteManage.'core_session_id']."'";
				$insert[$mod_tb_set."_creby"] = "'".$_SESSION[$valSiteManage.'core_session_name']."'";
				$insert[$mod_tb_set."_lastbyid"] = "'".$_SESSION[$valSiteManage.'core_session_id']."'";
				$insert[$mod_tb_set."_lastby"] = "'".$_SESSION[$valSiteManage.'core_session_name']."'";
				$insert[$mod_tb_set."_lastdate"]="NOW()";
				$insert[$mod_tb_set."_credate"]="NOW()";
				$sqlInsert="INSERT INTO ".$mod_tb_set."(".implode(",",array_keys($insert)).") VALUES (".implode(",",array_values($insert)).")";
				$queryInsert=mysql_query($sqlInsert);	
	
			}
			
			
			$sql = "SELECT ".$mod_tb_set."_id, ".$mod_tb_set."_credate , ".$mod_tb_set."_crebyid, ".$mod_tb_set."_lastdate,   ".$mod_tb_set."_lastbyid FROM ".$mod_tb_set." WHERE ".$mod_tb_set."_masterkey='".$_REQUEST["masterkey"]."'  ";
			$Query=mysql_query($sql);
			$Row=mysql_fetch_array($Query);
			$valID=$Row[0];
			$valCredate=DateFormat($Row[1]);
			$valCreby=$Row[2];
			$valLastdate=DateFormat($Row[3]);
			$valLastby=$Row[4];
		 	$valPermission= getUserPermissionOnMenu($_SESSION[$valSiteManage."core_session_groupid"],$_REQUEST["menukeyid"]);
			logs_access('3','View');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex, nofollow">
<meta name="googlebot" content="noindex, nofollow">
<link href="../css/theme.css" rel="stylesheet"/>

<title><?=$core_name_title?></title>
<script language="JavaScript"  type="text/javascript" src="../js/scriptCoreWeweb.js"></script>
</head>

<body>
<form action="?" method="get" name="myForm" id="myForm">
    <input name="execute" type="hidden" id="execute" value="update" />
    <input name="masterkey" type="hidden" id="masterkey" value="<?=$_REQUEST['masterkey']?>" />
    <input name="menukeyid" type="hidden" id="menukeyid" value="<?=$_REQUEST['menukeyid']?>" />
    <input name="inputSearch" type="hidden" id="inputSearch" value="<?=$_REQUEST['inputSearch']?>" />
    <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?=$_REQUEST['module_pageshow']?>" />
    <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?=$_REQUEST['module_pagesize']?>" />
    <input name="module_orderby" type="hidden" id="module_orderby" value="<?=$_REQUEST['module_orderby']?>" />
    <input name="inputGh" type="hidden" id="inputGh" value="<?=$_REQUEST['inputGh']?>" />
    <input name="valEditID" type="hidden" id="valEditID" value="<?=$_REQUEST['valEditID']?>" />
    <? if($_REQUEST['viewID']<=0){?>
					<div class="divRightNav">
                        <table width="96%" border="0" cellspacing="0" cellpadding="0"  align="center" >
                        <tr>
                        <td  class="divRightNavTb" align="left"  id="defTop" ><span class="fontContantTbNav"><a href="<?=$valLinkNav1?>" target="_self"><?=$valNav1?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <?=$langMod["meu:set"]?></span></td>
                        <td  class="divRightNavTb" align="right">
                        <!-- ######### Start Menu Sub Mod ########## -->
                        <div class="menuSubMod active">
                            <a  href="set.php?masterkey=<?=$_REQUEST['masterkey']?>&menukeyid=<?=$_REQUEST['menukeyid']?>">
                <?=$langMod["meu:set"]?>
                            </a>
                        </div>
                        <div class="menuSubMod">
                            <a  href="group.php?masterkey=<?=$_REQUEST['masterkey']?>&menukeyid=<?=$_REQUEST['menukeyid']?>">
                <?=$langMod["meu:group"]?>
                            </a>
                        </div>
                        <div class="menuSubMod">
                            <a  href="subgroup.php?masterkey=<?=$_REQUEST['masterkey']?>&menukeyid=<?=$_REQUEST['menukeyid']?>">
                <?=$langMod["meu:subgroup"]?>
                            </a>
                        </div>
                        <div class="menuSubMod">
                            <a  href="index.php?masterkey=<?=$_REQUEST['masterkey']?>&menukeyid=<?=$_REQUEST['menukeyid']?>">
                <?=$langMod["meu:contant"]?>
                            </a>
                        </div>
                        
                        <!-- ######### End Menu Sub Mod ########## -->

                        
                        </td>
                        </tr>
                        </table>
					</div>
                    <? }?>
                            <div class="divRightHead">
                                <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center" >
                                  <tr>
                                    <td height="77" align="left"><span class="fontHeadRight"><?=$langMod["meu:set"]?></span></td>
                                    <td align="left">
                                            <table  border="0" cellspacing="0" cellpadding="0" align="right">
                                                <tr>
                                                    <td align="right">
                                                    <? if($valPermission=="RW" && $_REQUEST['viewID']<=0){?>
                                                    <table  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center">
    <table  align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center">
    	<div  class="btnEditView" title="<?=$langTxt["btn:edit"]?>" onclick="
        document.myFormHome.valEditID.value=<?=$valID?>;  
        editContactNew('../<?=$mod_fd_root?>/editSet.php')"></div>
    </td>
  </tr>
</table>
		
    </td>
  </tr>
</table>

                                                     <? }?>
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
    <span class="formFontSubjectTxt"><?=$langMod["txt:set"]?></span><br/>
    <span class="formFontTileTxt"><?=$langMod["txt:setDe"]?></span>   </td>
    </tr>
  <?
$sql = "SELECT ".$mod_tb_root_email."_email,".$mod_tb_root_email."_id FROM ".$mod_tb_root_email."  WHERE  ".$mod_tb_root_email."_masterkey='".$_REQUEST["masterkey"]."'  ORDER BY ".$mod_tb_root_email."_id ASC ";
$query=mysql_query($sql);
$numRowCount=mysql_num_rows($query);
if($numRowCount>=1){
$num_email=0;
while($row=mysql_fetch_array($query)) {
$num_email++;
$valEmailNew=rechangeQuot($row[0]);
?>
  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=number_format($num_email)?>.<span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?=$valEmailNew?></div></td>
  </tr>
  
<? }}else{?>
  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["tit:emailset"]?>:<span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView">-</div></td>
  </tr>
<? }?>
</table>
<br />
    <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder "> 
                    <tr >
                        <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
    <span class="formFontSubjectTxt"><?=$langTxt["us:titleinfo"]?></span><br/>
    <span class="formFontTileTxt"><?=$langTxt["us:titleinfoDe"]?></span>     </td>
    </tr>
  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langTxt["us:credate"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
     <div class="formDivView"><?=$valCredate?></div>         </td>
  </tr>
  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langTxt["us:creby"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
     <div class="formDivView">
     <?
		if($_SESSION[$valSiteManage.'core_session_language']=="Thai"){
			echo getUserThai($valCreby);
		}else if($_SESSION[$valSiteManage.'core_session_language']=="Eng"){
			echo getUserEng($valCreby);
		}
    
	
	?>
	 </div>         </td>
  </tr>
    <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langTxt["us:lastdate"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
     <div class="formDivView"><?=$valLastdate?></div>         </td>
  </tr>
    <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langTxt["us:creby"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
     <div class="formDivView">
     <?
		if($_SESSION[$valSiteManage.'core_session_language']=="Thai"){
			echo getUserThai($valLastby);
		}else if($_SESSION[$valSiteManage.'core_session_language']=="Eng"){
			echo getUserEng($valLastby);
		}
    
	
	?>
	 </div>         </td>
  </tr>
  </table>
    <br />
  
      <? if($_REQUEST['viewID']<=0){?>
    <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" > 

   <tr >
      <td colspan="7" align="right"  valign="top" height="20"></td>
      </tr>
    <tr >
    <td colspan="7" align="right"  valign="middle" class="formEndContantTb"><a href="#defTop" title="<?=$langTxt["btn:gototop"]?>"><?=$langTxt["btn:gototop"]?> <img src="../img/btn/top.png"  align="absmiddle"/></a></td>
    </tr>
    <? }?>
  </table>
  </div>
</form>   
<? include("../lib/disconnect.php");?>
  
</body>
</html>
