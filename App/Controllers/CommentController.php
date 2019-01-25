<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Core\Db;

class CommentController extends Controller {
    public function layoutRenderAction() {
        $this->view->render('Все хреново');
    }
    
    public function addCommentAction() {
        if (array_key_exists('query', $this->route)) {
            $limit = $this->route['query'];
        }
        $res = $this->model->getComment($limit);
        $this->view->shortEndpoint('', $res);
    }

    public function getCommentAction() {
        if (!array_key_exists('query', $this->route)) {
            $this->route['query'] = 1;
        }
        $res = $this->model->getComment($this->route['query']);
        $this->view->shortEndpoint('', $res);
    }

    public function postCommentAction() {
        $this->model->setComment($_POST);
    }

}

?>
