<?php

opcache_reset();

include_once 'config.php';
include_once 'utilities.php';
include_once 'shopping-list-manager.php';

$spm = new ShoppingListManager();

$action = (isset($_POST['action']) ? $_POST['action'] : null);
$response = [];

switch ($action){
    case 'add':
        $item = (isset($_POST['shopping_list_item']) ? $_POST['shopping_list_item'] : '');
        $res = $spm->add_item($item);
        break;
    default:
        break;
}

$lists = $spm->get_all_items();

require_once 'layout.php';

?>