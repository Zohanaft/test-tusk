<?php
namespace App\Models;

use App\Core\Model;

class Comment extends Model {
    
    public function getComment($limit = 10) { 
        
        $args = [
            'limit' => $limit
        ];
        
        $data = $this->db->row("SELECT * FROM comments WHERE is_valid='1' ORDER BY 
         dt DESC LIMIT :limit;", $args);

        return $data;
    }


    public function setComment($args) {
        $this->db->query("INSERT INTO comments 
            (firstname, surname, lastname, mail, comment, is_valid)
            VALUES 
            ( :firstname, :surname, :lastname, :mail, :coment, '1');",
        $args);
    }

}
?>
