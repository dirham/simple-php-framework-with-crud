<?php
namespace apps\router;
class Route {
    private $controller;
    private $action;
    private $urlParams;

    private $Controller_Namespace = "\\controllers\\";
    private $Base_Controller_Name = "apps\\controllers\\Base";

    public function __construct($urlParams) {
        $this->urlParams = $urlParams;

        if (empty($this->urlParams["controller"])) {
            $this->controller = $this->Controller_Namespace . "Home";
        } else {
            $this->controller = $this->Controller_Namespace . $this->urlParams["controller"];
        }

        if (empty($this->urlParams["action"])) {
            $this->action = "index";
        } else {
            $this->action = $this->urlParams["action"];
        }
    }

    // Get controller based on Base conteroller
    public function getController() {
        if (class_exists($this->controller)) {
            $parent = class_parents($this->controller);

            if (in_array($this->Base_Controller_Name, $parent)) {
                // get method from child controller class 
                if (method_exists($this->controller, $this->action)) {
                    return new $this->controller($this->action,$this->urlParams);
                } else {
                    throw new \Exception("There is no Action!");
                }
            } else {
                throw new \Exception("Not Extends from Base controller.");
            }
        } else {
            new $this->controller($this->action,$this->urlParams);
            throw new \Exception("Controller not found!");
        }
    }
}