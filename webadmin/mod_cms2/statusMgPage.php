<?
@include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("config.php");

$loaddder = $_POST['Valueloaddder'];
$tablename = $_POST['Valuetablename'];
$statusname = $_POST['Valuestatusname'];
$statusid = $_POST['Valuestatusid'];
$loadderstatus = $_POST['Valueloadderstatus'];
$filestatus = $_POST['Valuefilestatus'];
$ValuePageset = $_POST['ValuePageset'];

if ($statusname == "Enable") {
    $inputstatusname = "Disable";
} else {
    $inputstatusname = "Enable";
}

//print_pre($_POST);

$sql = "UPDATE " . $tablename . " SET "
        . $tablename . "_show_" . $ValuePageset . "= '$inputstatusname'  WHERE " . $tablename . "_id='" . $statusid . "'";
//echo $sql;

$Query = wewebQueryDB($coreLanguageSQL,$sql);

if ($tablename == $mod_tb_root) {
    $sqlSch = "SELECT " . $tablename . "_masterkey  FROM " . $tablename . " WHERE  " . $tablename . "_id='" . $statusid . "' ";
    $querySch = wewebQueryDB($coreLanguageSQL,$sqlSch);
    $rowSch = wewebFetchArrayDB($coreLanguageSQL,$querySch);
    $valMasterkey = $rowSch[0];

    $updateSch = array();
    $updateSch[] = $core_tb_search . "_" . $ValuePageset . "  	='$inputstatusname'";
    $sqlUpdateSch = "UPDATE " . $core_tb_search . " SET " . implode(",", $updateSch) . " WHERE " . $core_tb_search . "_contantid='" . $statusid . "'  AND  " . $core_tb_search . "_masterkey 	='" . $valMasterkey . "'";
    $querylUpdateSch = wewebQueryDB($coreLanguageSQL,$sqlUpdateSch);
}
?>
<? if ($inputstatusname == "Enable") { ?>
    <a href="javascript:void(0)"  onclick="changeStatusPage('<?= $loaddder ?>', '<?= $tablename ?>', '<?= $inputstatusname ?>', '<?= $statusid ?>', '<?= $loadderstatus ?>', '<?= $filestatus ?>', '<?= $ValuePageset ?>')" ><span class="fontContantTbEnable"><?= $inputstatusname ?></span></a>

<? } else { ?>
    <a href="javascript:void(0)"  onclick="changeStatusPage('<?= $loaddder ?>', '<?= $tablename ?>', '<?= $inputstatusname ?>', '<?= $statusid ?>', '<?= $loadderstatus ?>', '<?= $filestatus ?>', '<?= $ValuePageset ?>')" ><span class="fontContantTbDisable"><?= $inputstatusname ?></span></a>


<? } ?>

<img src="../img/loader/ajax-loaderstatus.gif" alt="waiting"  style="display:none;"  id="<?= $loaddder ?>" />
