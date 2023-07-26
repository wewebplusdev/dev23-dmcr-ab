<?
function callVoteAns($masterkey,$id){
    global $db, $config, $url;

$sql = "SELECT
" . $config['vote']['ans']['db'] . "." . $config['vote']['ans']['db'] . "_id as id,
" . $config['vote']['ans']['db'] . "." . $config['vote']['ans']['db'] . "_masterkey as masterkey,
" . $config['vote']['ans']['db'] . "." . $config['vote']['ans']['db'] . "_name as name,
" . $config['vote']['ans']['db'] . "." . $config['vote']['ans']['db'] . "_count as count
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