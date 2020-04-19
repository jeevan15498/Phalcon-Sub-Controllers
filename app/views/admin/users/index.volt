<h1>Sub-Controller</h1>

Controller Name: Users and Action : Index

<hr>
<code>Layout File Path: app\views\index\index.volt</code>
<hr>
<p style="color: brown;">Change Layout Folder Path for This Controller</p>

<code>app\controllers\admin\ControllerBase.php</code>
<pre>
$this->view->setViewsDir($this->view->getViewsDir() . 'admin/');
</pre>