<?php

namespace apps\controllers;
// use apps\models\Address as Book;
// // use apps\views\View as View;
// class Base {
// 	public function __construct() {
// 		$base_url = "http://localhost/address";
//         $model = new Book();
//         $data['title'] = 'Phone lists';
//         $data['row'] = $model->get_data("select * from users",'json');


//         include "apps/views/View.php";
//     }

//     public function add(){
//     	return "waw";
//     }
// }

abstract class Base {
    protected $urlParams;
    protected $action;

    public function __construct($action, $urlParams) {
        $this->action = $action;
        $this->urlParams = $urlParams;
    }

    public function RunAction() {
        return $this->{$this->action}();
    }

    protected function ToView($data=array(), $fullView = true) {
        $classData = explode("\\", get_class($this));
        $className = end($classData);

        $content = __DIR__ . "../../../views/" . $className . "/" . $this->action . ".php";

        if ($fullView) {
            require __DIR__ . "../../../views/template.php";
        } else {
            require $content;
        }
    }
}