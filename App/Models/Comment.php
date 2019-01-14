<?php

namespace App\Models;
 
use App\Core\Model;
 
class Comment extends Model {
     
    public function getComment() {
        return $this->db->row("SELECT * FROM comment_system WHERE is_valid='1' ORDER BY dt DESC LIMIT 50");
    }
 
    public function setCOmment($args) {
        $data = [];
        $data["firstname"] = $args["firstname"];
        $data["surname"] = $args["surname"];
        $data["lastname"] = $args["lastname"];
        $data["mail"] = $args["mail-post"];
        $data["com_text"] = $args["coment"];
 
        $this->db->query("INSERT INTO comment_system SET 
                    firstname= :firstname, 
                    surname= :surname, 
                    lastname= :lastname,
                    mail= :mail,
                    com_text= :com_text,
                    is_valid='1'", $data);
    }
 
}

?>
