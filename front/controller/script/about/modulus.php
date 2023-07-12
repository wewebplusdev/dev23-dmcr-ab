<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function fncAbout(){
    global $db, $config, $url;
    $lang = $url->pagelang[3];

    $sql = "SELECT
    " . $config['about']['db'] . "." . $config['about']['db'] . "_id as id,
    " . $config['about']['db'] . "." . $config['about']['db'] . "_masterkey as masterkey,
    " . $config['about']['db'] . "." . $config['about']['db'] . "_subject as subject,
    " . $config['about']['db'] . "." . $config['about']['db'] . "_title as title,
    " . $config['about']['db'] . "." . $config['about']['db'] . "_credate as credate,
    " . $config['about']['db'] . "." . $config['about']['db'] . "_view as view,
    " . $config['about']['db'] . "." . $config['about']['db'] . "_pic as pic,
    " . $config['about']['db'] . "." . $config['about']['db'] . "_typec as typec,
    " . $config['about']['db'] . "." . $config['about']['db'] . "_urlc as urlc,
    " . $config['about']['db'] . "." . $config['about']['db'] . "_target as target
    FROM
    " . $config['about']['db'] . "
    WHERE
    " . $config['about']['db'] . "." . $config['about']['db'] . "_masterkey = '".$config['about']['masterkey']."' 
    AND " . $config['about']['db'] . "." . $config['about']['db'] . "_status != 'Disable' 
    ";
    
    $sql .= " ORDER BY  " . $config['about']['db'] . "." . $config['about']['db'] . "_order DESC ";
    $result = $db->execute($sql);
    return $result;
}

function callFormGroup(){
    global $config, $db, $url;
 
    $sql = "SELECT
    " . $config['form']['group'] . "." . $config['form']['group'] . "_id as id,
    " . $config['form']['group'] . "." . $config['form']['group'] . "_masterkey as masterkey,
    " . $config['form']['group'] . "." . $config['form']['group'] . "_subject as subject,
    " . $config['form']['group'] . "." . $config['form']['group'] . "_title as title
    FROM
    " . $config['form']['group'] . "
    WHERE
    " . $config['form']['group'] . "." . $config['form']['group'] . "_status != 'Disable' AND
    " . $config['form']['group'] . "." . $config['form']['group'] . "_masterkey = '".$config['form']['masterkey']."' AND
    " . $config['form']['group'] . "." . $config['form']['group'] . "_language = 'Thai'  
    ";

    // $sql .= checkStartEnd($config['form']['series']);
 

    $sql .= "
    ORDER  BY " . $config['form']['group'] . "." . $config['form']['group'] . "_order DESC
    ";
 
 
    // print_pre($sql);
    $result = $db->execute($sql);
    // $result = $db->pageexecute($sql, $limit, $page);
    return $result;
}

function callFormMain($id,$page = 1, $limit = 13, $gid = 0, $keywords = ''){
    global $config, $db, $url;
 
    $sql = "SELECT
    " . $config['form']['series'] . "." . $config['form']['series'] . "_id as id,
    " . $config['form']['series'] . "." . $config['form']['series'] . "_masterkey as masterkey,
    " . $config['form']['series'] . "." . $config['form']['series'] . "_subject as subject,
    " . $config['form']['series'] . "." . $config['form']['series'] . "_title as title,
    " . $config['form']['series'] . "." . $config['form']['series'] . "_pic as pic,
    " . $config['form']['series'] . "." . $config['form']['series'] . "_sdate as sdate,
    " . $config['form']['series'] . "." . $config['form']['series'] . "_edate as edate,
    " . $config['form']['series'] . "." . $config['form']['series'] . "_stime as stime,
    " . $config['form']['series'] . "." . $config['form']['series'] . "_etime as etime,
    " . $config['form']['series'] . "." . $config['form']['series'] . "_quality as quality,
    " . $config['form']['series'] . "." . $config['form']['series'] . "_display as display,
    " . $config['form']['series'] . "." . $config['form']['series'] . "_htmlfilename as htmlfilename
    FROM
    " . $config['form']['series'] . "
	INNER JOIN  " . $config['form']['group'] . "
	ON  " . $config['form']['series'] . "." . $config['form']['series'] . "_gid = " . $config['form']['group'] . "." . $config['form']['group'] . "_id  
    WHERE
    " . $config['form']['series'] . "." . $config['form']['series'] . "_status IN ('Enable','Pin') AND
    " . $config['form']['series'] . "." . $config['form']['series'] . "_masterkey = '".$config['form']['masterkey']."' AND
    " . $config['form']['series'] . "." . $config['form']['series'] . "_language = 'Thai'  
    ";

    if ($gid != 0) {
        $sql .= " AND " . $config['form']['series'] . "." . $config['form']['series'] . "_gid = '".$gid."'";
    }
    if ($keywords != '') {
        $sql .= " 
         AND (" . $config['form']['series'] . "." . $config['form']['series'] . "_subject LIKE '%$keywords%' OR
              " . $config['form']['series'] . "." . $config['form']['series'] . "_title LIKE '%$keywords%'
            )
        ";
    }
    // $sql .= checkStartEnd($config['form']['series']);
 
    $sql .= "
    GROUP   BY " . $config['form']['series'] . "." . $config['form']['series'] . "_id 
    ";
    $sql .= "
    ORDER  BY " . $config['form']['group'] . "." . $config['form']['group'] . "_order DESC ," . $config['form']['series'] . "." . $config['form']['series'] . "_order DESC
    ";
 
 
    // print_pre($sql);
    // $result = $db->execute($sql);
    $result = $db->pageexecute($sql, $limit, $page);
    return $result;
}

function callFormMainPin(){
    global $config, $db, $url;
 
    $sql = "SELECT
    " . $config['form']['series'] . "." . $config['form']['series'] . "_id as id,
    " . $config['form']['series'] . "." . $config['form']['series'] . "_masterkey as masterkey,
    " . $config['form']['series'] . "." . $config['form']['series'] . "_subject as subject,
    " . $config['form']['series'] . "." . $config['form']['series'] . "_title as title,
    " . $config['form']['series'] . "." . $config['form']['series'] . "_pic as pic,
    " . $config['form']['series'] . "." . $config['form']['series'] . "_sdate as sdate,
    " . $config['form']['series'] . "." . $config['form']['series'] . "_edate as edate,
    " . $config['form']['series'] . "." . $config['form']['series'] . "_stime as stime,
    " . $config['form']['series'] . "." . $config['form']['series'] . "_etime as etime,
    " . $config['form']['series'] . "." . $config['form']['series'] . "_quality as quality,
    " . $config['form']['series'] . "." . $config['form']['series'] . "_display as display,
    " . $config['form']['series'] . "." . $config['form']['series'] . "_htmlfilename as htmlfilename
    FROM
    " . $config['form']['series'] . "
	INNER JOIN  " . $config['form']['group'] . "
	ON  " . $config['form']['series'] . "." . $config['form']['series'] . "_gid = " . $config['form']['group'] . "." . $config['form']['group'] . "_id  
    WHERE
    " . $config['form']['series'] . "." . $config['form']['series'] . "_status = 'Pin' AND
    " . $config['form']['series'] . "." . $config['form']['series'] . "_masterkey = '".$config['form']['masterkey']."' AND
    " . $config['form']['series'] . "." . $config['form']['series'] . "_language = 'Thai'  
    ";
    // $sql .= checkStartEnd($config['form']['series']);

    $sql .= "
    GROUP   BY " . $config['form']['series'] . "." . $config['form']['series'] . "_id 
    ";
    $sql .= "
    ORDER  BY " . $config['form']['group'] . "." . $config['form']['group'] . "_order DESC ," . $config['form']['series'] . "." . $config['form']['series'] . "_order DESC
    ";
 
    // print_pre($sql);
    // $result = $db->execute($sql);
    $result = $db->execute($sql);
    return $result;
}

function callForm($id,$page = 1, $limit = 13){
    global $config, $db, $url;
 
    $sql = "SELECT
    " . $config['form']['series'] . "." . $config['form']['series'] . "_id as id,
    " . $config['form']['series'] . "." . $config['form']['series'] . "_masterkey as masterkey,
    " . $config['form']['series'] . "." . $config['form']['series'] . "_subject as subject,
    " . $config['form']['series'] . "." . $config['form']['series'] . "_title as title,
    " . $config['form']['series'] . "." . $config['form']['series'] . "_pic as pic,
    " . $config['form']['series'] . "." . $config['form']['series'] . "_sdate as sdate,
    " . $config['form']['series'] . "." . $config['form']['series'] . "_edate as edate,
    " . $config['form']['series'] . "." . $config['form']['series'] . "_stime as stime,
    " . $config['form']['series'] . "." . $config['form']['series'] . "_etime as etime
    FROM
    " . $config['form']['series'] . "
    WHERE
    " . $config['form']['series'] . "." . $config['form']['series'] . "_status != 'Disable' AND
    " . $config['form']['series'] . "." . $config['form']['series'] . "_masterkey = '".$config['form']['masterkey']."' AND
    " . $config['form']['series'] . "." . $config['form']['series'] . "_language = 'Thai'  AND
    UNIX_TIMESTAMP(" . $config['form']['series'] . "." . $config['form']['series'] . "_stime) <= UNIX_TIMESTAMP(CURRENT_TIME())     AND
    UNIX_TIMESTAMP(" . $config['form']['series'] . "." . $config['form']['series'] . "_etime) >= UNIX_TIMESTAMP(CURRENT_TIME())   
    ";

    $sql .= checkStartEnd($config['form']['series']);
 

    $sql .= "
    ORDER  BY " . $config['form']['series'] . "." . $config['form']['series'] . "_order DESC
    ";
 
 
    // print_pre($sql);
    // $result = $db->execute($sql);
    $result = $db->pageexecute($sql, $limit, $page);
    return $result;
}

function callFormDetail($id){
    global $config, $db, $url;
 
    $sql = "SELECT
    " . $config['form']['series'] . "." . $config['form']['series'] . "_id as id,
    " . $config['form']['series'] . "." . $config['form']['series'] . "_masterkey as masterkey,
    " . $config['form']['series'] . "." . $config['form']['series'] . "_subject as subject,
    " . $config['form']['series'] . "." . $config['form']['series'] . "_title as title,
    " . $config['form']['series'] . "." . $config['form']['series'] . "_pic as pic,
    " . $config['form']['series'] . "." . $config['form']['series'] . "_htmlfilename as htmlfilename,
    " . $config['form']['series'] . "." . $config['form']['series'] . "_description as description,
    " . $config['form']['series'] . "." . $config['form']['series'] . "_keywords as keywords,
    " . $config['form']['series'] . "." . $config['form']['series'] . "_metatitle as metatitle,
    " . $config['form']['series'] . "." . $config['form']['series'] . "_stime as stime,
    " . $config['form']['series'] . "." . $config['form']['series'] . "_etime as etime,
    " . $config['form']['series'] . "." . $config['form']['series'] . "_quality as quality,
    " . $config['form']['series'] . "." . $config['form']['series'] . "_display as display,
    " . $config['form']['series'] . "." . $config['form']['series'] . "_sectionid as sectionid
    FROM
    " . $config['form']['series'] . "
    WHERE
    " . $config['form']['series'] . "." . $config['form']['series'] . "_status != 'Disable' AND
    " . $config['form']['series'] . "." . $config['form']['series'] . "_masterkey = '".$config['form']['masterkey']."' AND
    " . $config['form']['series'] . "." . $config['form']['series'] . "_language = 'Thai' 
    ";

    // AND
    // UNIX_TIMESTAMP(" . $config['form']['series'] . "." . $config['form']['series'] . "_stime) <= UNIX_TIMESTAMP(CURRENT_TIME())     AND
    // UNIX_TIMESTAMP(" . $config['form']['series'] . "." . $config['form']['series'] . "_etime) >= UNIX_TIMESTAMP(CURRENT_TIME())    

    $sql .= checkStartEnd($config['form']['series']);
    
    if(!empty($id)){
        $sql .= "
        AND " . $config['form']['series'] . "." . $config['form']['series'] . "_id = $id
        ";
    }

    $sql .= "
    ORDER  BY " . $config['form']['series'] . "." . $config['form']['series'] . "_order DESC
    ";
 
 
    // print_pre($sql);
    // $result = $db->execute($sql);
    $result = $db->execute($sql);
    return $result;
}
function callFormDetailCheck($id){
    global $config, $db, $url;
 
    $sql = "SELECT
    " . $config['form']['series'] . "." . $config['form']['series'] . "_id as id,
    " . $config['form']['series'] . "." . $config['form']['series'] . "_masterkey as masterkey,
    " . $config['form']['series'] . "." . $config['form']['series'] . "_subject as subject,
    " . $config['form']['series'] . "." . $config['form']['series'] . "_title as title,
    " . $config['form']['series'] . "." . $config['form']['series'] . "_pic as pic,
    " . $config['form']['series'] . "." . $config['form']['series'] . "_htmlfilename as htmlfilename,
    " . $config['form']['series'] . "." . $config['form']['series'] . "_description as description,
    " . $config['form']['series'] . "." . $config['form']['series'] . "_keywords as keywords,
    " . $config['form']['series'] . "." . $config['form']['series'] . "_metatitle as metatitle,
    " . $config['form']['series'] . "." . $config['form']['series'] . "_stime as stime,
    " . $config['form']['series'] . "." . $config['form']['series'] . "_etime as etime,
    " . $config['form']['series'] . "." . $config['form']['series'] . "_quality as quality,
    " . $config['form']['series'] . "." . $config['form']['series'] . "_display as display
    FROM
    " . $config['form']['series'] . "
    WHERE
    " . $config['form']['series'] . "." . $config['form']['series'] . "_status != 'Disable' AND
    " . $config['form']['series'] . "." . $config['form']['series'] . "_masterkey = '".$config['form']['masterkey']."' AND
    " . $config['form']['series'] . "." . $config['form']['series'] . "_language = 'Thai' 
    ";

    // AND
    // UNIX_TIMESTAMP(" . $config['form']['series'] . "." . $config['form']['series'] . "_stime) <= UNIX_TIMESTAMP(CURRENT_TIME())     AND
    // UNIX_TIMESTAMP(" . $config['form']['series'] . "." . $config['form']['series'] . "_etime) >= UNIX_TIMESTAMP(CURRENT_TIME())    

    // $sql .= checkStartEnd($config['form']['series']);
    
    if(!empty($id)){
        $sql .= "
        AND " . $config['form']['series'] . "." . $config['form']['series'] . "_id = $id
        ";
    }

    $sql .= "
    ORDER  BY " . $config['form']['series'] . "." . $config['form']['series'] . "_order DESC
    ";
 
 
    // print_pre($sql);
    // $result = $db->execute($sql);
    $result = $db->execute($sql);
    return $result;
}

function callFormCountAns($gid){
    global $config, $db, $url;
    $sql = "SELECT
    COUNT(*) as countAns
    FROM
    " . $config['form']['option'] . "
    WHERE
    " . $config['form']['option'] . "." . $config['form']['option'] . "_gid = $gid 
    ";


    // print_pre($sql);
    $result = $db->execute($sql);
    return $result->fields['countAns'];
}


function callFormQuesList($gid){
    global $config, $db, $url;
    $sql ="SELECT 
    " . $config['form']['form'] . "_id as id,
    " . $config['form']['form'] . "_subject as subject,
    " . $config['form']['form'] . "_masterkey as masterkey,
    " . $config['form']['form'] . "_value1 as value1,
    " . $config['form']['form'] . "_value2 as value2, 
    " . $config['form']['form'] . "_value3 as value3, 
    " . $config['form']['form'] . "_value4 as value4, 
    " . $config['form']['form'] . "_value5 as value5,
    " . $config['form']['form'] . "_type as type, 
    " . $config['form']['form'] . "_request as request, 
    " . $config['form']['form'] . "_request_title as request_title, 
    " . $config['form']['form'] . "_type_text as type_text, 
    " . $config['form']['option'] . "_gid,
    " . $config['form']['option'] . "_fid,
    " . $config['form']['form'] . "_other as other,
    " . $config['form']['form'] . "_matrix_type as matrix_type,
    " . $config['form']['form'] . "_matrix_group as matrix_group
    FROM 
    " . $config['form']['form'] . " 
    INNER JOIN  " . $config['form']['option'] . " ON 
    " . $config['form']['option'] . "." . $config['form']['option'] . "_fid = " . $config['form']['form'] . "." . $config['form']['form'] . "_id
    WHERE     
    " . $config['form']['form'] . "_masterkey = '".$config['form']['masterkey']."'  AND   
    " . $config['form']['form'] . "_language = 'Thai' AND
    " . $config['form']['form'] . "_status !='Disable' AND 
    " . $config['form']['option'] . "_gid = $gid
    ";
    $sql .= "
    ORDER  BY " . $config['form']['form'] . "." . $config['form']['form'] . "_order DESC
    ";


     //var_dump($sql);
    $result = $db->execute($sql);
    return $result;
}

function callFormAnsName($qid){
    global $config, $db, $url;
        
    $sql ="SELECT 
    " . $config['form']['ansName'] . "_id as id,
    " . $config['form']['ansName'] . "_name as name
    FROM 
    " . $config['form']['ansName'] . " 
    WHERE 
    " . $config['form']['ansName'] . "_qid = $qid
    ORDER BY " . $config['form']['ansName'] . "_id ASC
    ";
    // print_pre($sql);
    $result = $db->execute($sql);
    return $result;

}

function callFormMatrix($gid){
    global $config, $db, $url;
    $sql ="SELECT 
    " . $config['form']['form'] . "_id as id,
    " . $config['form']['form'] . "_subject as subject,
    " . $config['form']['form'] . "_masterkey as masterkey,
    " . $config['form']['form'] . "_type as type, 
    " . $config['form']['form'] . "_request as request, 
    " . $config['form']['form'] . "_request_title as request_title, 
    " . $config['form']['form'] . "_type_text as type_text,
    " . $config['form']['form'] . "_matrix_type as matrix_type,
    " . $config['form']['form'] . "_matrix_group as matrix_group
    FROM 
    " . $config['form']['form'] . " 
    WHERE     
    " . $config['form']['form'] . "_masterkey = 'matrix_".$config['form']['masterkey']."'  AND   
    " . $config['form']['form'] . "_language = 'Thai' AND
    " . $config['form']['form'] . "_status !='Disable' AND 
    " . $config['form']['form'] . "_gid = $gid
    ";
    $sql .= "
    ORDER  BY " . $config['form']['form'] . "." . $config['form']['form'] . "_order ASC
    ";
    $result = $db->execute($sql);
    $arrayMatrix = array();
    foreach ($result as $key => $value) {
        $infoAnsName = callFormAnsName($value['id']);
        foreach ($infoAnsName as $keyList => $valueList) {
            $arrayMatrix['title_chois'][] = $valueList['name'];
        }
        $arrayMatrix['title_chois'] =  array_unique($arrayMatrix['title_chois']);
        $arrayMatrix['chois'][$value['id']]['id'] = $value['id'];
        $arrayMatrix['chois'][$value['id']]['subject'] = $value['subject'];
        $arrayMatrix['chois'][$value['id']]['request'] = $value['request'];
        $arrayMatrix['chois'][$value['id']]['request_title'] = $value['request_title'];
        
        foreach ($infoAnsName as $keyList => $valueList) {
            $arrayMatrix['chois'][$value['id']]['chois'][] = $valueList['id'];
        }
    }
    // print_pre($arrayMatrix);
    return $arrayMatrix;
}

function callFormMatrixGroup($gid){
    global $config, $db, $url;
    $sql ="SELECT 
    " . $config['form']['form'] . "_id as id,
    " . $config['form']['form'] . "_subject as subject,
    " . $config['form']['form'] . "_masterkey as masterkey,
    " . $config['form']['form'] . "_type as type, 
    " . $config['form']['form'] . "_request as request, 
    " . $config['form']['form'] . "_request_title as request_title, 
    " . $config['form']['form'] . "_type_text as type_text,
    " . $config['form']['form'] . "_matrix_type as matrix_type,
    " . $config['form']['form'] . "_matrix_group as matrix_group,
    " . $config['form']['group_matrix'] . "_name as matrix_group_name
    FROM 
    " . $config['form']['form'] . "
    INNER JOIN " . $config['form']['group_matrix'] . "
    ON " . $config['form']['group_matrix'] . "." . $config['form']['group_matrix'] . "_id = " . $config['form']['form'] . "." . $config['form']['form'] . "_matrix_group
    WHERE     
    " . $config['form']['form'] . "_masterkey = 'matrix_".$config['form']['masterkey']."'  AND   
    " . $config['form']['form'] . "_language = 'Thai' AND
    " . $config['form']['form'] . "_status !='Disable' AND 
    " . $config['form']['form'] . "_gid = $gid
    ";
    $sql .= "
    ORDER  BY " . $config['form']['form'] . "." . $config['form']['form'] . "_order ASC
    ";
    $result = $db->execute($sql);
    $arrayMatrix = array();
    foreach ($result as $key => $value) {
        $infoAnsName = callFormAnsName($value['id']);
        foreach ($infoAnsName as $keyList => $valueList) {
            $arrayMatrix[$value['matrix_group']]['title_chois'][] = $valueList['name'];
        }
        $arrayMatrix[$value['matrix_group']]['name_group'] =  $value['matrix_group_name'];
        $arrayMatrix[$value['matrix_group']]['title_chois'] =  array_unique($arrayMatrix[$value['matrix_group']]['title_chois']);
        $arrayMatrix[$value['matrix_group']]['chois'][$value['id']]['id'] = $value['id'];
        $arrayMatrix[$value['matrix_group']]['chois'][$value['id']]['subject'] = $value['subject'];
        $arrayMatrix[$value['matrix_group']]['chois'][$value['id']]['request'] = $value['request'];
        $arrayMatrix[$value['matrix_group']]['chois'][$value['id']]['request_title'] = $value['request_title'];
        
        foreach ($infoAnsName as $keyList => $valueList) {
            $arrayMatrix[$value['matrix_group']]['chois'][$value['id']]['chois'][] = $valueList['id'];
        }
    }
    // print_pre($arrayMatrix);
    return $arrayMatrix;
}


function callFormText($gid){
    global $config, $db, $url;
    $sql ="SELECT 
    " . $config['form']['form'] . "_id as id,
    " . $config['form']['form'] . "_subject as subject,
    " . $config['form']['form'] . "_masterkey as masterkey,
    " . $config['form']['form'] . "_type as type, 
    " . $config['form']['form'] . "_request as request, 
    " . $config['form']['form'] . "_request_title as request_title, 
    " . $config['form']['form'] . "_type_text as type_text,
    " . $config['form']['form'] . "_matrix_type as matrix_type,
    " . $config['form']['form'] . "_matrix_group as matrix_group
    FROM 
    " . $config['form']['form'] . " 
    WHERE     
    " . $config['form']['form'] . "_masterkey = 'text_".$config['form']['masterkey']."'  AND   
    " . $config['form']['form'] . "_language = 'Thai' AND
    " . $config['form']['form'] . "_status !='Disable' AND 
    " . $config['form']['form'] . "_gid = $gid
    ";
    $sql .= "
    ORDER  BY " . $config['form']['form'] . "." . $config['form']['form'] . "_order ASC
    ";
    $result = $db->execute($sql);
    $arrayMatrix = array();
    $arrayText = array('1'=>'checkData', '2'=>'checkEmail', '3'=>'checkNumber', '4'=>'checkIDCard' );
    $arrayClass = '';
    $arrayMatrix['type'] = 'text';
    $arrayMatrix['check'] = false;
    foreach ($result as $key => $value) {
        $arrayMatrix['option'][] = $value['subject'];
        if ($value['subject'] == 2) {
            $arrayMatrix['type'] = 'email';
        }
        if ($value['subject'] == 1) {
            $arrayMatrix['check'] = true;
        }
        // $arrayMatrix[$value['subject']]['option'] = $arrayText[$value['subject']];
        // $arrayClass = $arrayClass.' '.$arrayText[$value['subject']];
    }
    // print_pre($arrayClass);
    // print_pre($arrayMatrix);
    return $arrayMatrix;
}

function checkData($aid, $fid = null, $value = null){
    global $config, $db, $url;
        
    $sql ="SELECT 
    " . $config['form']['choice'] . "_id as id,
    " . $config['form']['choice'] . "_val as val,
    " . $config['form']['choice'] . "_mid as mid,
    " . $config['form']['choice'] . "_fid as fid,
    " . $config['form']['choice'] . "_aid as aid
    FROM 
    " . $config['form']['choice'] . " 
    WHERE 
    " . $config['form']['choice'] . "_aid = $aid AND
    " . $config['form']['choice'] . "_fid = $fid AND
    " . $config['form']['choice'] . "_val = '$value'
    ";
    // print_pre($sql);
    $result = $db->execute($sql);
    return $result;

}

function checkDataTotal($fid = null){
    global $config, $db, $url;
        
    $sql ="SELECT 
    " . $config['form']['choice'] . "_id as id
    FROM 
    " . $config['form']['choice'] . " 
    WHERE 
    " . $config['form']['choice'] . "_fid = $fid
    GROUP BY 
    " . $config['form']['choice'] . "_mid
    ";
    // print_pre($sql);
    $result = $db->execute($sql);
    return $result->_numOfRows;
}



function callFormQuesInPageList($gid){
    global $config, $db, $url;
    $sql ="SELECT 
    " . $config['form']['form'] . "_id as id,
    " . $config['form']['form'] . "_subject as subject,
    " . $config['form']['form'] . "_masterkey as masterkey,
    " . $config['form']['form'] . "_value1 as value1,
    " . $config['form']['form'] . "_value2 as value2, 
    " . $config['form']['form'] . "_value3 as value3, 
    " . $config['form']['form'] . "_value4 as value4, 
    " . $config['form']['form'] . "_value5 as value5,
    " . $config['form']['form'] . "_type as type, 
    " . $config['form']['form'] . "_request as request, 
    " . $config['form']['form'] . "_request_title as request_title, 
    " . $config['form']['form'] . "_type_text as type_text, 
    " . $config['form']['option'] . "_gid,
    " . $config['form']['option'] . "_fid, 
    " . $config['form']['form'] . "_pin as pin,
    " . $config['form']['form'] . "_matrix_type as matrix_type,
    " . $config['form']['form'] . "_matrix_group as matrix_group
    FROM 
    " . $config['form']['form'] . " 
    INNER JOIN  " . $config['form']['option'] . " ON 
    " . $config['form']['option'] . "." . $config['form']['option'] . "_fid = " . $config['form']['form'] . "." . $config['form']['form'] . "_id
    WHERE     
    " . $config['form']['form'] . "_masterkey = '".$config['form']['masterkey']."'  AND   
    " . $config['form']['form'] . "_language = 'Thai' AND
    " . $config['form']['form'] . "_status !='Disable' AND 
    " . $config['form']['option'] . "_gid = $gid
    ";

  $sql .= " AND " . $config['form']['form'] . "_pin ='Enable'  ";
    $sql .= "
    ORDER  BY " . $config['form']['form'] . "." . $config['form']['form'] . "_order DESC 
    ";
// $sql .= " LIMIT 0,4";

    // print_pre($sql);
    $result = $db->execute($sql);
    return $result;
}

function callDataChoice($fid = null,$aid = null){
    global $config, $db, $url;
        
    $sql ="SELECT 
    " . $config['form']['choice'] . "_id as id,
    " . $config['form']['choice'] . "_aid as aid,
    " . $config['form']['choice'] . "_mid as mid,
    " . $config['form']['choice'] . "_fid as fid,
    " . $config['form']['choice'] . "_val as val,
    " . $config['form']['choice'] . "_credate as credate,
    " . $config['form']['choice'] . "_other as other 
    FROM 
    " . $config['form']['choice'] . " 
    WHERE 
    " . $config['form']['choice'] . "_fid = $fid AND
    " . $config['form']['choice'] . "_aid = $aid 
	ORDER BY " . $config['form']['choice'] . "_credate ASC
    ";
    // print_pre($sql);
    $result = $db->execute($sql);
    return $result;
}
function callFormAnsName2($id){
    global $config, $db, $url;
        
    $sql ="SELECT 
    " . $config['form']['ansName'] . "_id as id,
    " . $config['form']['ansName'] . "_name as name
    FROM 
    " . $config['form']['ansName'] . " 
    WHERE 
    " . $config['form']['ansName'] . "_id = $id
    ORDER BY " . $config['form']['ansName'] . "_id ASC
    ";
    // print_pre($sql);
    $result = $db->execute($sql);
    return $result;

}


 function callfileForm($id) {
     global $config, $db, $url;
     $lang = $url->pagelang[4];
     $sql = "SELECT
    *,
    '" . $config['form']['file'] . "' as td
  FROM
    " . $config['form']['file'] . "
  WHERE
    " . $config['form']['file'] . "." . $config['form']['file'] . "_contantid = $id
    ";
     $result = $db->execute($sql);
     return $result;
 }

// $sqlUser = "SELECT " . $mod_tb_choice . "_id     FROM " . $mod_tb_choice . " WHERE  " . $mod_tb_choice . "_fid='" . $valID . "'  GROUP BY  " . $mod_tb_choice . "_mid ";
//                                 $queryUser = mysql_query($sqlUser);
//                                 $RecordCountUser = mysql_num_rows($queryUser);




 
function callQuestionare($id,$page = 1, $limit = 13){
    global $config, $db, $url;
 
    $sql = "SELECT
    " . $config['ques']['series'] . "." . $config['ques']['series'] . "_id as id,
    " . $config['ques']['series'] . "." . $config['ques']['series'] . "_masterkey as masterkey,
    " . $config['ques']['series'] . "." . $config['ques']['series'] . "_subject as subject,
    " . $config['ques']['series'] . "." . $config['ques']['series'] . "_title as title
    FROM
    " . $config['ques']['series'] . "
    WHERE
    " . $config['ques']['series'] . "." . $config['ques']['series'] . "_status != 'Disable' AND
    " . $config['ques']['series'] . "." . $config['ques']['series'] . "_masterkey = '".$config['ques']['masterkey']."' AND
    " . $config['ques']['series'] . "." . $config['ques']['series'] . "_language = 'Thai' AND
    UNIX_TIMESTAMP(" . $config['ques']['series'] . "." . $config['ques']['series'] . "_stime) <= UNIX_TIMESTAMP(CURRENT_TIME())     AND
    UNIX_TIMESTAMP(" . $config['ques']['series'] . "." . $config['ques']['series'] . "_etime) >= UNIX_TIMESTAMP(CURRENT_TIME())    
    ";

    $sql .= "
    ORDER  BY " . $config['ques']['series'] . "." . $config['ques']['series'] . "_order DESC
    ";
 
 
   // print_pre($sql);
    //die();
    // $result = $db->execute($sql);
    $result = $db->pageexecute($sql, $limit, $page);
    return $result;
}

function callQuestionareDetail($id){
    global $config, $db, $url;
 
    $sql = "SELECT
    " . $config['ques']['series'] . "." . $config['ques']['series'] . "_id as id,
    " . $config['ques']['series'] . "." . $config['ques']['series'] . "_masterkey as masterkey,
    " . $config['ques']['series'] . "." . $config['ques']['series'] . "_subject as subject,
    " . $config['ques']['series'] . "." . $config['ques']['series'] . "_title as title
    FROM
    " . $config['ques']['series'] . "
    WHERE
    " . $config['ques']['series'] . "." . $config['ques']['series'] . "_status != 'Disable' AND
    " . $config['ques']['series'] . "." . $config['ques']['series'] . "_masterkey = '".$config['ques']['masterkey']."' AND
    " . $config['ques']['series'] . "." . $config['ques']['series'] . "_language = 'Thai' AND
    UNIX_TIMESTAMP(" . $config['ques']['series'] . "." . $config['ques']['series'] . "_stime) <= UNIX_TIMESTAMP(CURRENT_TIME())     AND
    UNIX_TIMESTAMP(" . $config['ques']['series'] . "." . $config['ques']['series'] . "_etime) >= UNIX_TIMESTAMP(CURRENT_TIME())   
    ";
    
    if(!empty($id)){
        $sql .= "
        AND " . $config['ques']['series'] . "." . $config['ques']['series'] . "_id = $id
        ";
    }

    $sql .= "
    ORDER  BY " . $config['ques']['series'] . "." . $config['ques']['series'] . "_order DESC
    ";
 
 
    // print_pre($sql);
    // $result = $db->execute($sql);
    $result = $db->execute($sql);
    return $result;
}

function callCountAns($gid){
    global $config, $db, $url;
    $sql = "SELECT
    " . $config['ques']['form'] . "." . $config['ques']['form'] . "_id as id
    FROM
    " . $config['ques']['form'] . "
    WHERE
    " . $config['ques']['form'] . "." . $config['ques']['form'] . "_gid = $gid AND
    " . $config['ques']['form'] . "." . $config['ques']['form'] . "_status != 'Disable' AND
    " . $config['ques']['form'] . "." . $config['ques']['form'] . "_masterkey = '".$config['ques']['masterkey']."' AND
    " . $config['ques']['form'] . "." . $config['ques']['form'] . "_language = 'Thai'
    ";


    // print_pre($sql);
    $result = $db->execute($sql);
    return $result;
}


function callQuesList($gid){
    global $config, $db, $url;
    $sql ="SELECT 
    " . $config['ques']['form'] . "_id as id,
    " . $config['ques']['form'] . "_subject as subject,
    " . $config['ques']['form'] . "_masterkey as masterkey,
    " . $config['ques']['form'] . "_value1 as value1,
    " . $config['ques']['form'] . "_value2 as value2, 
    " . $config['ques']['form'] . "_value3 as value3, 
    " . $config['ques']['form'] . "_value4 as value4, 
    " . $config['ques']['form'] . "_type as type, 
    " . $config['ques']['form'] . "_value5 as value5  
    FROM 
    " . $config['ques']['form'] . " 
    WHERE     
    " . $config['ques']['form'] . "_masterkey = '".$config['ques']['masterkey']."'  AND   
    " . $config['ques']['form'] . "_language = 'Thai' AND
    " . $config['ques']['form'] . "_status !='Disable' AND 
    " . $config['ques']['form'] . "_gid = $gid
    ";
    $sql .= "
    ORDER  BY " . $config['ques']['form'] . "." . $config['ques']['form'] . "_order DESC
    ";


    // print_pre($sql);
    $result = $db->execute($sql);
    return $result;
}

function callansName($qid){
    global $config, $db, $url;
        
    $sql ="SELECT 
    " . $config['ques']['ansName'] . "_id as id,
    " . $config['ques']['ansName'] . "_name as name
    FROM 
    " . $config['ques']['ansName'] . " 
    WHERE 
    " . $config['ques']['ansName'] . "_qid = $qid
    ORDER BY " . $config['ques']['ansName'] . "_id ASC
    ";
    // print_pre($sql);
    $result = $db->execute($sql);
    return $result;

}