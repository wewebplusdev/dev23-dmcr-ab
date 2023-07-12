<?php
class homePage {
    // "SELECT ".$mod_tb_root."_id,".$mod_tb_root."_subject ,".$mod_tb_root."_masterkey  ,
    // ".$mod_tb_root."_lastdate, ".$mod_tb_root."_view, ".$mod_tb_root."_title,
    //  ".$mod_tb_root."_pic  FROM

    function callActivity($masterkey,$limit=7){
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
        AND " . $config['cms']['db'] . "." . $config['cms']['db'] . "_status = 'Home' 
        AND ((" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate='0000-00-00 00:00:00' AND
        " . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate='0000-00-00 00:00:00')   OR
        (" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate='0000-00-00 00:00:00' AND
        TO_DAYS(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate)>=TO_DAYS(NOW()) ) OR
        (TO_DAYS(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
        " . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate='0000-00-00 00:00:00' )  OR
        (TO_DAYS(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
        TO_DAYS(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate)>=TO_DAYS(NOW())  ))";
    
        
        $sql .= " ORDER BY  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_order DESC ";
        $sql .= " LIMIT ".$limit."";
        // print_pre($sql);
        $result = $db->execute($sql);
        return $result;
        }

    function callFollow($masterkey , $province = null , $year = null ,$keyword = null,$page = 1, $limit = 8){
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
        " . $config['cms']['db'] . "." . $config['cms']['db'] . "_groupProoject as groupProoject
        FROM
        " . $config['cms']['db'] . "
        WHERE
        " . $config['cms']['db'] . "." . $config['cms']['db'] . "_masterkey = '".$masterkey."' 
        AND " . $config['cms']['db'] . "." . $config['cms']['db'] . "_status = 'Home' 
        AND ((" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate='0000-00-00 00:00:00' AND
        " . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate='0000-00-00 00:00:00')   OR
        (" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate='0000-00-00 00:00:00' AND
        TO_DAYS(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate)>=TO_DAYS(NOW()) ) OR
        (TO_DAYS(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
        " . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate='0000-00-00 00:00:00' )  OR
        (TO_DAYS(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
        TO_DAYS(" . $config['cms']['db'] . "." . $config['cms']['db'] . "_edate)>=TO_DAYS(NOW())  ))";
    
        if(!empty($province)){
            $sql .= "
            AND " . $config['cms']['db'] . "." . $config['cms']['db'] . "_gid = $province
            ";
        }
        if(!empty($year)){
            $sql .= "
            AND " . $config['cms']['db'] . "." . $config['cms']['db'] . "_year = $year
            ";
        }
        if(!empty($keyword)){
            $sql .= "
            AND " . $config['cms']['db'] . "." . $config['cms']['db'] . "_subject LIKE LIKE '%$keyword%'
            ";
        }
        
        $sql .= " ORDER BY  " . $config['cms']['db'] . "." . $config['cms']['db'] . "_order DESC ";
        $result = $db->pageexecute($sql, $limit, $page);
        return $result;
        }

        function callVote($masterkey,$limit = '1'){
            global $db, $config, $url;
        
        $sql = "SELECT
        " . $config['vote']['main']['db'] . "." . $config['vote']['main']['db'] . "_id as id,
        " . $config['vote']['main']['db'] . "." . $config['vote']['main']['db'] . "_masterkey as masterkey,
        " . $config['vote']['main']['db'] . "." . $config['vote']['main']['db'] . "_name as name
        FROM
        " . $config['vote']['main']['db'] . "
        WHERE
        " . $config['vote']['main']['db'] . "." . $config['vote']['main']['db'] . "_masterkey = '".$masterkey."' 
        AND " . $config['vote']['main']['db'] . "." . $config['vote']['main']['db'] . "_status = 'Enable' 
        AND ((" . $config['vote']['main']['db'] . "." . $config['vote']['main']['db'] . "_sdate='0000-00-00 00:00:00' AND
        " . $config['vote']['main']['db'] . "." . $config['vote']['main']['db'] . "_edate='0000-00-00 00:00:00')   OR
        (" . $config['vote']['main']['db'] . "." . $config['vote']['main']['db'] . "_sdate='0000-00-00 00:00:00' AND
        TO_DAYS(" . $config['vote']['main']['db'] . "." . $config['vote']['main']['db'] . "_edate)>=TO_DAYS(NOW()) ) OR
        (TO_DAYS(" . $config['vote']['main']['db'] . "." . $config['vote']['main']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
        " . $config['vote']['main']['db'] . "." . $config['vote']['main']['db'] . "_edate='0000-00-00 00:00:00' )  OR
        (TO_DAYS(" . $config['vote']['main']['db'] . "." . $config['vote']['main']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
        TO_DAYS(" . $config['vote']['main']['db'] . "." . $config['vote']['main']['db'] . "_edate)>=TO_DAYS(NOW())  ))";
    
        
        $sql .= " ORDER BY  " . $config['vote']['main']['db'] . "." . $config['vote']['main']['db'] . "_order DESC ";
        $sql .= " LIMIT ".$limit."";
        // print_pre($sql);
        $result = $db->execute($sql);
        return $result;
        }

        function callVoteAns($masterkey,$id){
            global $db, $config, $url;
        
        $sql = "SELECT
        " . $config['vote']['ans']['db'] . "." . $config['vote']['ans']['db'] . "_id as id,
        " . $config['vote']['ans']['db'] . "." . $config['vote']['ans']['db'] . "_masterkey as masterkey,
        " . $config['vote']['ans']['db'] . "." . $config['vote']['ans']['db'] . "_name as name
        FROM
        " . $config['vote']['ans']['db'] . "
        WHERE
        " . $config['vote']['ans']['db'] . "." . $config['vote']['ans']['db'] . "_masterkey = '".$masterkey."' 
        AND " . $config['vote']['ans']['db'] . "." . $config['vote']['ans']['db'] . "_qid = '".$id."' 
       ";
    
        
        $sql .= " ORDER BY  " . $config['vote']['ans']['db'] . "." . $config['vote']['ans']['db'] . "_order DESC ";
        // print_pre($sql);
        $result = $db->execute($sql);
        return $result;
        }
}
?>