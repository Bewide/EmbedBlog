<?php
require_once('../../../../../logic/classes/blog_admin.class.php');
$BlogAdminObj = new blog_admin;
$OA['success'] = FALSE;
if (is_object($BlogAdminObj)) {
	$BlogAdminObj->setPostID($_POST['id']);
	$BlogAdminObj->setURLPath($_POST['url_path']);
	if ($BlogAdminObj->updateArticleOptions()) {
		$OA['success'] = TRUE;
	}
	else {
		$OA['error'] = $BlogAdminObj->getErrorMsg();
	}
}
else {
	$OA['error'] = $BlogAdminObj->getErrorMsg();
}
header('Access-Control-Allow-Methods: GET, POST');
header("Content-type: application/json");
print json_encode($OA);