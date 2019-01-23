<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Core\Db;

class CommentController extends Controller {

    public function addCommentAction() {
        $res = $this->model->getComment();
        $this->view->render('Все хреново', $res);
    }

    public function getCommentAction() {
        $this->model->getLastComment();
        $this->view->render($res)
    }

    public function postCommentAction() {
        $this->model->setComment($_POST);
    }

}

?>
