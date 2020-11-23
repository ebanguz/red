<?php

require_once '../Helpers/auth.php';
require_once '../service/post.php';
require_once '../service/IServiceBase.php';
require_once '../Filehandler/Ifilehandler.php';
require_once '../Filehandler/Jsonfhandler.php';
require_once '../database/context.php';
require_once '../service/PserviceDB.php';

$service     = New PserviceDB("../database");
$isContainID = isset($_GET['id']);

if ($isContainID) {
    $PEID = $_GET['id'];
    $service->delete($PEID);

}
header("Location: ../index.php");
exit();

?>