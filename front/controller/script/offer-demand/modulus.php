<?php
class OfferPage {
    function callDistric($id){
        global $db, $config, $url;
    
    $sql = "SELECT
    " . $config['distric']['db'] . "." . $config['distric']['db'] . "_ID as id,
    " . $config['distric']['db'] . "." . $config['distric']['db'] . "_NAME as name,
    " . $config['distric']['db'] . "." . $config['distric']['db'] . "_CODE as code
    FROM
    " . $config['distric']['db'] . "
    WHERE
    AMPHUR_ID = '".$id."' 
   ";
    
    $sql .= " ORDER BY  " . $config['distric']['db'] . "." . $config['distric']['db'] . "_NAME ASC ";
    $result = $db->execute($sql);
    return $result;
    }

    function callDistricCODE($id){
        global $db, $config, $url;
    
    $sql = "SELECT
    " . $config['distric']['db'] . "." . $config['distric']['db'] . "_ID as id,
    " . $config['distric']['db'] . "." . $config['distric']['db'] . "_NAME as name,
    " . $config['distric']['db'] . "." . $config['distric']['db'] . "_CODE as code
    FROM
    " . $config['distric']['db'] . "
    WHERE
    " . $config['distric']['db'] . "." . $config['distric']['db'] . "_ID ='".$id."' 
   ";
    
    $sql .= " ORDER BY  " . $config['distric']['db'] . "." . $config['distric']['db'] . "_NAME ASC ";
    // print_pre($sql);
    $result = $db->execute($sql);
    return $result;
    }

    function callAmphur($id){
        global $db, $config, $url;
    
    $sql = "SELECT
    " . $config['amphur']['db'] . "." . $config['amphur']['db'] . "_ID as id,
    " . $config['amphur']['db'] . "." . $config['amphur']['db'] . "_NAME as name
    FROM
    " . $config['amphur']['db'] . "
    WHERE
    PROVINCE_ID = '".$id."' 
   ";
    
    $sql .= " ORDER BY  " . $config['amphur']['db'] . "." . $config['amphur']['db'] . "_NAME ASC ";
    // print_pre($sql);
    $result = $db->execute($sql);
    return $result;
    }

    function callProvince(){
        global $db, $config, $url;
    
    $sql = "SELECT
    " . $config['province']['db']  . "." . $config['province']['db']  . "_ID as id,
    " . $config['province']['db']  . "." . $config['province']['db']  . "_NAME as name
    FROM
    " . $config['province']['db']  . "
   ";
    
    $sql .= " ORDER BY  " . $config['province']['db']  . "." . $config['province']['db']  . "_NAME ASC ";
    $result = $db->execute($sql);
    return $result;
    }

    function callGroupType(){
        global $db, $config, $url;
    
    $sql = "SELECT
    " . $config['contact']['group']['db']  . "." . $config['contact']['group']['db']  . "_id as id,
    " . $config['contact']['group']['db']  . "." . $config['contact']['group']['db']  . "_subject as subject
    FROM
    " . $config['contact']['group']['db']  . "
    WHERE
    " . $config['contact']['group']['db']  . "." . $config['contact']['group']['db']  . "_masterkey = '".$config['contact']['masterkey'] ."' 
    AND " . $config['contact']['group']['db']  . "." . $config['contact']['group']['db']  . "_status != 'Disable'
   ";
   
    
    $sql .= " ORDER BY  " . $config['contact']['group']['db']  . "." . $config['contact']['group']['db']  . "_order DESC ";
    $result = $db->execute($sql);
    return $result;
    }
}