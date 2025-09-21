<?php
class HomeController extends Controller {
    public function index() {
        $model = new HomeModel();
        $data = $model->getData();
        include '../app/views/home.php';
    }
}