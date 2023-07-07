<?php
$menuActive = "register";
$listjs[] = '<script type="text/javascript" src="front/controller/script/registerDetail/js/main.js'."?u=".date("YdmHis").'"></script>';
$listcss[] = '<link rel="stylesheet" type="text/css" href="front/template/default/public/css/front-qa-new.css'."?u=".date("YdmHis").'" />';
$listjs[] = '<script type="text/javascript" src="front/controller/script/registerDetail/js/ajaxfileupload.js'."?u=".date("YdmHis").'"></script>';
$listjs[] = '<script type="text/javascript" src="front/controller/script/registerDetail/js/jquery.uploadfile.js'."?u=".date("YdmHis").'"></script>';
$listjs[] = '<script type="text/javascript" src="front/controller/script/registerDetail/js/formfile.js'."?u=".date("YdmHis").'"></script>';
// $myRand = time() . rand(111, 999);
// $smarty->assign("myRand",$myRand);


if ($url->segment[0] == 'registerDetail' && is_numeric($url->segment[1])) {
    if(is_numeric($url->segment[1])){
    $myid = randomNameUpdate(1);
    $smarty->assign("myid",$myid);
    $id_quse = $url->segment[1];
    $smarty->assign("id_quse",$id_quse);
    $infoQuestionare = callFormDetail($id_quse);
    $infoTotal = checkDataTotal($id_quse);
    // print_pre($infoQuestionare->sql);
    // print_pre($infoQuestionare->fields);
    $timeNow = strtotime(date('H:i:s'));
     $timeOut = 1;
    if ((strtotime($infoQuestionare->fields['stime']) <= $timeNow && strtotime($infoQuestionare->fields['etime']) >= $timeNow ) || ($infoQuestionare->fields['stime'] == '00:00:00' && $infoQuestionare->fields['etime'] == '00:00:59')) {
        $timeOut = 0;
     }

    if($infoQuestionare->_numOfRows == 0 || $timeOut == 1){
        header("Location:" . $linklang . "/register");
        exit();
    }


    $chkTotal = checkDataTotal($id_quse);
         // {if ($listQues.stime|strtotime <= $timeNow && $listQues.etime|strtotime >= $timeNow) || ($listQues.stime == '00:00:00' && $listQues.etime == '00:00:59')}

     
    // die();
    
    $smarty->assign("infoQuestionare",$infoQuestionare->fields);
    $smarty->assign("totalAns",$infoTotal);


    $infofileForm = callfileForm($id_quse);
    $smarty->assign("infofileForm", $infofileForm);

    $lang['seo']['keyword'] = $infoQuestionare->fields['keywords'] ? $infoQuestionare->fields['keywords'] : null;
    $lang['seo']['title'] = $infoQuestionare->fields['metatitle'] ? $infoQuestionare->fields['metatitle'] : $infoQuestionare->fields['subject'];
    $lang['seo']['desc'] = $infoQuestionare->fields['description'] ? $infoQuestionare->fields['description'] : $infoQuestionare->fields['title'];

    if($_POST['action']=="addnew"){
            $f=changeQuot($_POST['f']);
            $myid=changeQuot($_POST['myid']);

            if ($chkTotal == $infoQuestionare->fields['quality'] || $infoQuestionare->_numOfRows == 0 || $timeOut == 1) {
                header("Location:" . $linklang . "/registerDetail/error");
                exit();
            }

        //     $form[$config['form']['ans'] . '_fid'] = $_POST['fid'];
        //     $form[$config['form']['ans'] . '_fname'] = "'" . $_POST['name'] . "'";
        //     $form[$config['form']['ans'] . '_email'] = "'" . $_POST['email'] . "'";
        //     // $form[$config['form']['ans'] . '_address'] = "'" . rechangeQuot($_POST['address']) . "'";
        //     $form[$config['form']['ans'] . '_tel'] = "'" . $phoneNumber . "'";
        //     $form[$config['form']['ans'] . '_credate'] = "'" . date("Y/m/d H:i:s") . "'";
        //     $form[$config['form']['ans'] . '_ip'] = "'" . getIP() . "'";
        //     $form[$config['form']['ans'] . '_status'] = "'Enable'";

        //     $form[$config['form']['ans'] . '_company'] = "'" . $_POST['company'] . "'";
        //     $form[$config['form']['ans'] . '_position'] = "'" . $_POST['position'] . "'";
        //     if (!empty($_POST['peopleid'])) {
        //         $form[$config['form']['ans'] . '_peopleid'] = "'" . $_POST['peopleid'] . "'";
        //     }

        //     $sqlInChoisMem = "INSERT INTO " . $config['form']['ans'] . "(" . implode(",", array_keys($form)) . ") VALUES (" . implode(",", array_values($form)) . ")";
        //     $QueryMem = $db->execute($sqlInChoisMem);

        //     //print_pre($QueryMem);
        // // exit();
        //     $Mid = $db->Insert_ID();


            function addChois($idq, $idChois, $value, $mid, $other = null){
                global $config, $db, $url;
                $insert = array();

                $insert = array();
                $insert[$config['form']['choice'] . "_mid"] = changeQuot($mid);
                $insert[$config['form']['choice'] . "_fid"] = changeQuot($idq);
                $insert[$config['form']['choice'] . "_val"] = changeQuot($value);
                $insert[$config['form']['choice'] . "_aid"] = changeQuot($idChois);
                if (!empty($other)) {
                $insert[$config['form']['choice'] . "_other"] = changeQuot($other);
                }
                $insert[$config['form']['choice'] . "_credate"] = date("Y-m-d H:i:s");
                $insert[$config['form']['choice'] . "_status"] = "Enable";
                $insertSQL = sqlinsert($insert, $config['form']['choice'], $config['form']['choice'] . "_id");
                $contantID = $insertSQL['id'];
                
            }


            foreach ($_POST['inputAns'] as $idChois => $valuechois) {
                
                if (is_array($valuechois)) {
                    foreach ($valuechois as $listAdd) {
                        addChois($f, $idChois, $listAdd, $myid, $_POST['inputAnsOther'][$idChois]);
                    }
                } else {
                    addChois($f, $idChois, $valuechois, $myid, $_POST['inputAnsOther'][$idChois]);
                }
            }

            header("Location:" . $linklang . "/registerDetail/save");
            exit();

            
                //     ## Del Value ############################################
                // $sqlDel = "DELETE FROM " . $config['ques']['choice'] . " WHERE " . $config['ques']['choice'] . "_credate < DATE_ADD(NOW(), INTERVAL - 2 HOUR)  AND " . $config['ques']['choice'] . "_status='Disable'";
                // // $queryDel = mysql_query($sqlDel);
                // $queryDel = $db->execute($sqlDel);
                //     ## Default Value ############################################
                //     $sql_cms ="SELECT 
                //     " . $config['ques']['form'] . "_id, " . $config['ques']['form'] . "_type   
                //     FROM 
                //     " . $config['ques']['form'] . " 
                //     WHERE     
                //     " . $config['ques']['form'] . "_masterkey='".$config['ques']['masterkey']."'  AND   
                //     " . $config['ques']['form'] . "_language='Thai'";
                    
                //     $sql_cms.=" AND " . $config['ques']['form'] . "_status !='Disable'  
                //     AND   " . $config['ques']['form'] . "_gid='".$f."'";
                //     $sql_cms.=" ORDER BY  " . $config['ques']['form'] . "_order DESC   ";
                //     $query_cms = $db->execute($sql_cms);
                //     // print_pre($query_cms);
                //     // $query_cms=mysql_query($sql_cms);
                //     // $RecordCount=mysql_num_rows($query_cms);

                //     if(!empty($query_cms->fields)){
                //     // $myrand = rand(111111111,999999999);
                //                 foreach($query_cms as $row_cms){
                //                     $txt_cms_id=$row_cms[0];
                //                     $txt_cms_type=rechangeQuot($row_cms[1]);
                
                //                     $inputValSelect=changeQuot($_POST['inputNumber'.$txt_cms_id]);
            
                //                     $insert="";
                //                     $insert[$config['ques']['choice'] . "_fid"] = "'".$f."'";
                //                     $insert[$config['ques']['choice'] . "_mid"] = "'".$myid."'";
                //                     $insert[$config['ques']['choice'] . "_val"] = "'".$inputValSelect."'";
                //                     $insert[$config['ques']['choice'] . "_aid"] = "'".$txt_cms_id."'";
                //                     $insert[$config['ques']['choice'] . "_status"] = "'Disable'";
                //                     $insert[$config['ques']['choice'] . "_credate"]  = "NOW()";
                            
                //                     // $sql="INSERT INTO ".$config['ques']['choice']."(".implode(",",array_keys($insert)).") VALUES (".implode(",",array_values($insert)).")";
                //                     // $Query=mysql_query($sql);
                //                     $sql = "INSERT INTO " . $config['ques']['choice'] . "(" . implode(",", array_keys($insert)) . ") VALUES (" . implode(",", array_values($insert)) . ")";
                //                     // print_pre($sql);
                //                     $Query = $db->execute($sql);
                //                     $idQuery = $db->insert_Id();
                            
                //                     }
                //     }
                
                //     if(!empty($idQuery)){
                //         $linkurl = "f=".$f."&myid=".$myid;
                //         //// print_pre($linkurl );
                //         //header("Location:" . $linklang . "/formDetail/form?WP=".encodeStr($linkurl));
                //         //exit();
				// 		$linkget = $linkurl;
				// 		$expo = explode("&",$linkget);
				// 		foreach($expo as $list){
				// 			$expo2[] = explode("=",$list);
				// 		}
				// 		$myid = $expo2[1][1];
				// 		$f = $expo2[0][1];
				// 		require_once _DIR . '/front/controller/script/formDetail/form.php';
                //     }
                


    }


    $settingPage = array(
        "page" => "registerDetail",
        "template" => "detail.tpl",
        "display" => "page"
    );

    }else{
        header("Location:" . $linklang . "/register");
        exit();
    }

    // $limitnews = 13;
    // $infoQuestionare = callQuestionareDetail();
    // $smarty->assign("infoQuestionare",$infoQuestionare);
    // print_pre($infoQuestionare);
    
}elseif($url->segment[1] == 'list'){

    if(is_numeric($url->segment[2])){


        $id_quse = $url->segment[2];
        $infoQuestionare = callFormDetail($id_quse);
        $infoQuesInPageList = callFormQuesInPageList($id_quse);
		//var_dump($infoQuesInPageList);
        if($infoQuestionare->_numOfRows == 0){
            header("Location:" . $linklang . "/register");
            exit();
        }
        $smarty->assign("infoQuestionare",$infoQuestionare->fields);
        $arrayQues = array();
        foreach ($infoQuesInPageList as $key => $value) {

            $arrayQues['title'][$value['id']] = $value['subject'];
            $arrayQues['status'][$value['id']] = $value['pin'];
            $infoDataChoice = callDataChoice($id_quse, $value['id']);
            foreach ($infoDataChoice as $keySub => $valueSub) {

                $arrayQues['credate'][$valueSub['mid']] = DateThai($valueSub['credate'], 12);
                $infoAnsName = callFormAnsName2($valueSub['val']);
                $arrayQues['list'][$valueSub['mid']][$value['id']]['id'] = $valueSub['id'];
				
                if (!empty($infoAnsName->fields)) {
						$arrayQues['list'][$valueSub['mid']][$value['id']]['val'] = $infoAnsName->fields['name'];
                }else{
					if($valueSub['val']=='999999'){
						$arrayQues['list'][$valueSub['mid']][$value['id']]['val'] = $valueSub['other'];
					}else{
						$arrayQues['list'][$valueSub['mid']][$value['id']]['val'] = $valueSub['val'];
					}
                }
            }
        }
        // print_pre($arrayQues);
        $smarty->assign("arrayQues",$arrayQues);
        
        $settingPage = array(
            "page" => "registerDetail",
            "template" => "list.tpl",
            "display" => "page"
        );
    }else{
        header("Location:" . $linklang . "/register");
        exit();
    }
    
}elseif($url->segment[1] == 'register'){
    if(!empty($_GET['WP'])){

        $linkget = decodeStr($_GET['WP']);
       $expo = explode("&",$linkget);
        foreach($expo as $list){
            $expo2[] = explode("=",$list);
        }
        $smarty->assign("myid",$expo2[1][1]);
        $smarty->assign("f",$expo2[0][1]);
        require_once _DIR . '/front/controller/script/registerDetail/form.php';

        $settingPage = array(
            "page" => "registerDetail",
            "template" => "form.tpl",
            "display" => "page"
        );
    }else{
        header("Location:" . $linklang . "/register");
        exit();
    }
    
}elseif($url->segment[1] == 'save'){
    $settingPage = array(
        "page" => "registerDetail",
        "template" => "save.tpl",
        "display" => "page"
    );
    
}elseif($url->segment[1] == 'error'){
    $settingPage = array(
        "page" => "registerDetail",
        "template" => "error.tpl",
        "display" => "page"
    );
    
}elseif($url->segment[1] == 'uploadFile'){
    include_once 'loadInsertFile.php';
    $settingPage = array(
        "page" => "registerDetail",
        "display" => "page-single"
    );
    
}elseif($url->segment[1] == 'delFile'){
    include_once 'deleteFileInsert.php';
    $settingPage = array(
        "page" => "registerDetail",
        "display" => "page-single"
    );
    
}elseif($url->segment[1] == 'checkData'){
   // $checkData = checkData($_GET['valID'], $_GET['valFID'], array_values($_GET['inputAns'])[0]);
   $checkData = checkData($_REQUEST['valID'], $_REQUEST['valFID'], $_REQUEST['inputAns'][$_REQUEST['valID']]);
if (!empty($checkData->fields)) {
    header("HTTP/1.1 400");
} else {
    header("HTTP/1.1 201 OK");
}
}else{
    header("Location:" . $linklang . "/register");
    exit();
}



Seo($lang['seo']['title'], $lang['seo']['desc'], $lang['seo']['keyword']);

$smarty->assign("pagination", $pagination);
$smarty->assign("menu_home",true);
$smarty->assign("fileInclude", $settingPage);
$smarty->assign("header", "inc-header.tpl");
$smarty->assign("footer", "inc-footer.tpl");
