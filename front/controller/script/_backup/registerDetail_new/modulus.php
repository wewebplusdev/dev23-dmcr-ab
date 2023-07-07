<?php

function callFormDetailNew($id){
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

function callFormSectionNew($id){
    global $config, $db, $url;
 
    $sql = "SELECT
    " . $config['form']['section'] . "." . $config['form']['section'] . "_id as id,
    " . $config['form']['section'] . "." . $config['form']['section'] . "_masterkey as masterkey,
    " . $config['form']['section'] . "." . $config['form']['section'] . "_subject as subject,
    " . $config['form']['section'] . "." . $config['form']['section'] . "_title as title
    FROM
    " . $config['form']['section'] . "
    WHERE
    " . $config['form']['section'] . "." . $config['form']['section'] . "_status != 'Disable' AND
    " . $config['form']['section'] . "." . $config['form']['section'] . "_masterkey = '".$config['form']['masterkey']."' AND
    " . $config['form']['section'] . "." . $config['form']['section'] . "_language = 'Thai' 
    ";
	
	
    $sql .= "
    AND " . $config['form']['section'] . "." . $config['form']['section'] . "_formid = '".$id."'
    ";
    $sql .= "
    ORDER  BY " . $config['form']['section'] . "." . $config['form']['section'] . "_order DESC
    ";
 
 
   //  print_pre($sql);
    // $result = $db->execute($sql);
    $result = $db->execute($sql);
    return $result;
}


function callFormQuesListNews($gid,$sectionid =null){
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
    " . $config['form']['option'] . "_gid = $gid AND 
    " . $config['form']['form'] . "_sectionid = $sectionid
    ";
    $sql .= "
    ORDER  BY " . $config['form']['form'] . "." . $config['form']['form'] . "_order DESC
    ";


     //print_pre($sql);
    $result = $db->execute($sql);
    return $result;
}


