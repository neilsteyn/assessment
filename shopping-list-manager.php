<?php

include_once 'database.php';

class ShoppingListManager{

    public $db;

    function __construct(){
        $this->db = new Database();
    }

    function add_item($item_data){
        $sql = "INSERT INTO shopping_list (shopping_list_item) VALUES ('".$this->db->sanitize_string($item_data)."')";
        $this->db->exe_query($sql);

    }
    function remove_item($item_id){
        $sql = "DELETE FROM shopping_list WHERE id='".$this->db->sanitize_string($item_id)."'";
        $this->db->exe_query($sql);
    }
    function update_item($item_id, $item_data){
        $sql = "UPDATE shopping_list SET shopping_list_item = '".$this->db->sanitize_string($item_data)."' WHERE id = '".$this->db->sanitize_string($item_id)."'";
        $this->db->exe_query($sql);
    }

    function get_all_items(){
        $sql = "SELECT * FROM shopping_list";
        $res = $this->db->exe_query($sql);
        return $this->db->get_rows($res);
    }

}