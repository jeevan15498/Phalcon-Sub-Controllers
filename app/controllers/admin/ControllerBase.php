<?php

namespace MyApp\Controllers\Admin;

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{

    public function afterExecuteRoute()
    {
        // TODO: Change Layout Folder Path for Sub-Controller
        $this->view->setViewsDir($this->view->getViewsDir() . 'admin/');
    }
}