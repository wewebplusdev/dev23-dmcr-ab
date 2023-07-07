<?php

################## Wewebplus Connect DB ##########################



function wewebConnect($valCoreDB, $valHost, $valUser, $valPass) {
################## Set Up Function ###############################
    global $dbConnect;
    global $core_db_name;

    $dbConnect->Connect($valHost, $valUser, $valPass, $core_db_name);
    $dbConnect->charSet = 'SET NAMES utf8';

    $dbConnect->Execute("SET character_set_results=utf8");
    $dbConnect->Execute("SET collation_connection=utf8_general_ci");
    $dbConnect->Execute("SET NAMES 'utf8'");

    //$dbConnect->SetFetchMode(ADODB_FETCH_ASSOC);
    $dbConnect->cacheSecs = 3600 * 12;

    return $dbConnect;
}

//################## Wewebplus Select DB ##########################
//
//function wewebSelectDB($valCoreDB, $valDatabaseName) {
//################## Set Up Function ###############################
//    if ($valCoreDB == "mssql") {
//        $valSelectDB = mssql_select_db($valDatabaseName);
//    } else {
//        $valSelectDB = mysql_select_db($valDatabaseName);
//    }
//
//    return $valSelectDB;
//}
################## Wewebplus Query DB ##########################

function wewebQueryDB($valCoreDB, $valSqlQuery) {
################## Set Up Function ###############################
    global $dbConnect;
    $valQueryDB = $dbConnect->execute($valSqlQuery);
    return $valQueryDB;
}

################## Wewebplus Num Rows DB ##########################

function wewebNumRowsDB($valCoreDB, $valQueryDB) {
################## Set Up Function ###############################
    return $valQueryDB->_numOfRows;
}

################## Wewebplus Fetch Array DB ##########################

function wewebFetchArrayDB($valCoreDB, $valQueryDB) {
//################## Set Up Function ###############################
    return $valQueryDB->FetchRow();
}

################## Wewebplus Now DB ##########################

function wewebNow($valCoreDB) {
################## Set Up Function ###############################
    if ($valCoreDB == "mssql") {
        $valNowDB = "GETDATE()";
    } else {
        $valNowDB = "NOW()";
    }
    return $valNowDB;
}

################## Wewebplus Insert Last ID DB ##########################

function wewebInsertID($valCoreDB, $valTable, $valTableF) {
################## Set Up Function ###############################
global $connectWeweb,$dbConnect;
    if ($valCoreDB == "mssql") {
        $valNowDB = wewebMssqlInsertID($valTable, $valTableF);
    } else {
        $valNowDB =$dbConnect->insert_id();
    }
    return $valNowDB;
}

################## Wewebplus Disconnect DB ##########################

function wewebDisconnect($valCoreDB) {
################## Set Up Function ##################################
global $dbConnect,$valResultDisconnect;
    if ($valCoreDB == "mssql") {
        $valResultDisconnect = mssql_close();
    } else {
        $valResultDisconnect = $dbConnect->close();
    }

    return $valResultDisconnect;
}

################## Wewebplus escape DB ##########################

function wewebEscape($valCoreDB, $valDate) {
################## Set Up Function ##################################
    if ($valCoreDB == "mssql") {
        $valResultEscape = ms_escape_string($valDate);
    } else {
        $valResultEscape = ms_escape_string($valDate);
    }

    return $valResultEscape;
}

###################### Escape SQL  ######################

function ms_escape_string($data) {
###################### Set Up Function ######################
    if (!isset($data) or empty($data))
        return '';
    if (is_numeric($data))
        return $data;

    $non_displayables = array(
        '/%0[0-8bcef]/', // url encoded 00-08, 11, 12, 14, 15
        '/%1[0-9a-f]/', // url encoded 16-31
        '/[\x00-\x08]/', // 00-08
        '/\x0b/', // 11
        '/\x0c/', // 12
        '/[\x0e-\x1f]/'             // 14-31
    );
    foreach ($non_displayables as $regex)
        $data = preg_replace($regex, '', $data);
    $data = str_replace("'", "''", $data);
    return $data;
}

###################### Max ID SQL  ######################

function wewebMssqlInsertID($valTable, $valTableF) {
###################### Set Up Function ######################
global $coreLanguageSQL;
    $sql = "SELECT MAX(" . $valTableF . ") FROM " . $valTable;
    $Query = wewebQueryDB($coreLanguageSQL,$sql);
    list($fileId) = wewebFetchArrayDB($coreLanguageSQL,$Query);
    return $fileId;
}

?>
