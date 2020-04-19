# Phalcon Sub-Controllers

* https://github.com/phalcon/mvc/tree/master/simple-subcontrollers

## Doc

1. Set Project Base URL Path: `app\config\config.php`

    ```php
    'baseUri' => '/phalcon/simple-subcontrollers',
    ```
2. Register Namespaces: `app\config\loader.php`
    ```php
    $loader->registerNamespaces(
        [
            'MyApp\Controllers'         => __DIR__ . '/../controllers/',
            'MyApp\Controllers\Admin'   => __DIR__ . '/../controllers/admin'
        ]
    )->register();
    ```
    How to use namespaces.
    ```php
    namespace MyApp\Controllers;            // app\controllers\IndexController.php
    namespace MyApp\Controllers\Admin;      // app\controllers\admin\UsersController.php
    ```
3. Create Default Controller and Controller Action: `app\config\routes.php`

    - https://docs.phalcon.io/3.4/en/routing#setting-the-default-route
    - https://docs.phalcon.io/3.4/en/routing#setting-default-paths

    ```php
    $router->setDefaultController('index');
    $router->setDefaultAction('index');

    // $router->setDefaults(
    //     ['controller' => 'index', 'action' => 'index']
    // );

    // Home Page: Route
    $router->add(
        '/',
        [
            'controller' => 'index',
            'action'     => 'index'
        ]
    );
    ```
4. Create Index Controller `app\controllers\IndexController.php` and Layout File `app\views\index\index.volt`
5. Create a sub folder `admin` in the `controllers` folder

    ![](assets/1.png)
6. Create `ControllerBase.php` Controller in the admin sub controller directory

    ```php
    <?php

    // namespace in most important part
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
    ```
7. Create a `UsersController.php` controller in the `admin` folder and create `Layout` file `app\views\admin\users\index.volt`

    ```php
    <?php

    // namespace in most important part
    namespace MyApp\Controllers\Admin;

    class UsersController extends ControllerBase
    {
        public function indexAction()
        {
        }
    }
    ```
8. Insert Route

    ```php
    $router->add('/admin/:controller', [
        'namespace'  => 'MyApp\Controllers\Admin',
        'controller' => 1 // {:controller}
    ]);
    ```
9. If you want to create a sub-controller, you must first create a namespace for it in the `loader.php` file and you can use this same namespace in a sub-controller file. The way you did in the user controller file of the admin sub controller.

    ```php
    // app\config\loader.php
    'MyApp\Controllers\{Sub-Controller-Name}' => {Folder Path} 
    ```