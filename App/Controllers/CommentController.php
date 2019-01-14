<?php

namespace App\CommentController;

use App\Controllers\Controller;
use App\Models\Comment;


class CommentController extends Controller {
 
    public function addCommentAction() {
        $res = $this->model->getComment();
         
        if ( !empty($_POST) ) {
            $this->model->setComment($_POST);
            $_POST = null;
        }
         
        $this->view->render('Форум анонимных алкашей', $res);
    }
}

?>
