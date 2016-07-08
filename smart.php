<?PHP
require('/home/ubuntu/workspace/Smarty/Smarty.class.php');
$smarty = new Smarty();

$smarty->setTemplateDir('/home/ubuntu/workspace/smarty/templates');
$smarty->setCompileDir('/home/ubuntu/workspace/smarty/templates_c');
$smarty->setCacheDir('/home/ubuntu/workspace/smarty/cache');
$smarty->setConfigDir('/home/ubuntu/workspace/smarty/configs');
?>