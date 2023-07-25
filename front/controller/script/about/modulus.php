<?php
class aboutPage{
function callAbout($masterkey){
    global $db, $config, $url;
    
    $sql = "SELECT
    " . $config['cms']['db'] . "." . $config['cms']['db'] . "_id as id,
    " . $config['cms']['db'] . "." . $config['cms']['db'] . "_masterkey as masterkey,
    " . $config['cms']['db'] . "." . $config['cms']['db'] . "_subject as subject,
    " . $config['cms']['db'] . "." . $config['cms']['db'] . "_title as title,
    " . $config['cms']['db'] . "." . $config['cms']['db'] . "_credate as credate,
    " . $config['cms']['db'] . "." . $config['cms']['db'] . "_view as view,
    " . $config['cms']['db'] . "." . $config['cms']['db'] . "_pic as pic,
    " . $config['cms']['db'] . "." . $config['cms']['db'] . "_lastdate as lastdate
    FROM
    " . $config['cms']['db'] . "
    WHERE
    " . $config['cms']['db'] . "." . $config['cms']['db'] . "_masterkey = '".$masterkey."' 
    AND " . $config['cms']['db'] . "." . $config['cms']['db'] . "_status != 'Disable' 
    AND ((" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate='0000-00-00 00:00:00' AND
    " . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate='0000-00-00 00:00:00')   OR
    (" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate='0000-00-00 00:00:00' AND
    TO_DAYS(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate)>=TO_DAYS(NOW()) ) OR
    (TO_DAYS(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
    " . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate='0000-00-00 00:00:00' )  OR
    (TO_DAYS(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
    TO_DAYS(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate)>=TO_DAYS(NOW())  ))";

    
    $sql .= " ORDER BY  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_order DESC ";
    // print_pre($sql);
    $result = $db->execute($sql);
    return $result;
    }

    function callAboutDetail($masterkey,$id){
        global $db, $config, $url;
        
        $sql = "SELECT
        " . $config['cms']['db'] . "." . $config['cms']['db'] . "_id as id,
    " . $config['cms']['db'] . "." . $config['cms']['db'] . "_masterkey as masterkey,
    " . $config['cms']['db'] . "." . $config['cms']['db'] . "_subject as subject,
    " . $config['cms']['db'] . "." . $config['cms']['db'] . "_title as title,
    " . $config['cms']['db'] . "." . $config['cms']['db'] . "_credate as credate,
    " . $config['cms']['db'] . "." . $config['cms']['db'] . "_view as view,
    " . $config['cms']['db'] . "." . $config['cms']['db'] . "_pic as pic,
    " . $config['cms']['db'] . "." . $config['cms']['db'] . "_pin as pin,
    " . $config['cms']['db'] . "." . $config['cms']['db'] . "_gid as gid,
    " . $config['cms']['db'] . "." . $config['cms']['db'] . "_picshow as picshow,
    " . $config['cms']['db'] . "." . $config['cms']['db'] . "_htmlfilename as htmlfilename,
    " . $config['cms']['db'] . "." . $config['cms']['db'] . "_metatitle as metatitle,
    " . $config['cms']['db'] . "." . $config['cms']['db'] . "_description as description,
    " . $config['cms']['db'] . "." . $config['cms']['db'] . "_keywords as keywords,
    " . $config['cms']['db'] . "." . $config['cms']['db'] . "_type as type,
    " . $config['cms']['db'] . "." . $config['cms']['db'] . "_filevdo as filevdo,
    " . $config['cms']['db'] . "." . $config['cms']['db'] . "_url as url,
    " . $config['cms']['db'] . "." . $config['cms']['db'] . "_year as year,
    " . $config['cms']['db'] . "." . $config['cms']['db'] . "_groupProoject as groupProoject
        FROM
        " . $config['cms']['db'] . "
        WHERE
        " . $config['cms']['db'] . "." . $config['cms']['db'] . "_masterkey = '".$masterkey."' 
        AND " . $config['cms']['db'] . "." . $config['cms']['db'] . "_status != 'Disable' 
        AND " . $config['cms']['db'] . "." . $config['cms']['db'] . "_id = '".$id."' 
        ";
    
        
        $sql .= " ORDER BY  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_order DESC ";
        // print_pre($sql);
        $result = $db->execute($sql);
        return $result;
        }
    }