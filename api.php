
<?php

opcache_reset();

include_once 'config.php';
include_once 'utilities.php';
include_once 'shopping-list-manager.php';

$spm = new ShoppingListManager();

$action = (isset($_GET['action']) ? $_GET['action'] : null);
$response = [];

switch ($action){
    case 'add':
        $item = (isset($_GET['shopping_list_item']) ? $_GET['shopping_list_item'] : '');
        $res = $spm->add_item($item);
        break;
    case 'update':
        $id = (isset($_GET['shopping_list_item_id']) ? $_GET['shopping_list_item_id'] : '');
        $item = (isset($_GET['shopping_list_item']) ? $_GET['shopping_list_item'] : '');
        $res = $spm->update_item($id, $item);
        break;
    case 'delete':
        $id = (isset($_GET['shopping_list_item_id']) ? $_GET['shopping_list_item_id'] : '');
        $res = $spm->remove_item($id);
        break;
    default:
        break;
}

ajax_json($response);

?>