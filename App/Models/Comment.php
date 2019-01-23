<?php
namespace App\Models;

use App\Core\Model;

class Comment extends Model {
    
    public function getComment() { 
        return $this->db->row("SELECT * FROM comments WHERE is_valid='1' ORDER BY 
         dt DESC LIMIT 50;");
    }

    public function setComment($args) {
        $this->db->query("INSERT INTO comments 
            (firstname, surname, lastname, mail, comment, is_valid)
            VALUES 
            ( :firstname, :surname, :lastname, :mail, :coment, '1');",
        $args);
    }

    public function getLastComment() {
        return $this->db->row("SELECT * FROM comments
            ORDER_BY dt DESC LIMIT 1;");
    }

}
?>
