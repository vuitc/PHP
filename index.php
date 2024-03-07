<?php

// require "./Controllers/HeaderController.php";
// $controllerHeader = new HeaderController();
// $controllerHeader->index();
// require_once 'Views/frontend/partitions/header.php';
// $controllerName = ucfirst(strtolower($_REQUEST['controller'] ?? 'index')) . 'Controller';
// $actionName = strtolower($_REQUEST['action'] ?? 'index');
// require "./Controllers/{$controllerName}.php";
// $controllerObject = new $controllerName;
// $controllerObject->$actionName();
// require_once 'Views/frontend/partitions/footer.php';
?>
<?php
function actionMethod(){
    $controllerName = ucfirst(strtolower($_REQUEST['controller'] ?? 'index')) . 'Controller';
    $actionName = strtolower($_REQUEST['action'] ?? 'index');
    require "./Controllers/{$controllerName}.php";
    $controllerObject = new $controllerName;
    $controllerObject->$actionName();
}
 if(isset($_GET['controller'])&&$_GET['controller']){
    switch ($_GET['controller']){
        case 'register':
            actionMethod();
            break;
        case 'admin':
            session_start();
            ob_start();
                if($_SESSION['role']==1){
                    require_once 'Views/backend/header.php';
                    actionMethod();
                    require_once 'Views/backend/header.php';
                     break;
                }else{
                    echo '<script>alert("Bạn không có quyền admin"); setTimeout(function() { window.location.href = "index.php"; }, 100);</script>';
                }
            break;
        default:
            require "./Controllers/HeaderController.php";
            $controllerHeader = new HeaderController();
            $controllerHeader->index();
            require_once 'Views/frontend/partitions/header.php';
            actionMethod();
            require_once 'Views/frontend/partitions/footer.php';
            break;
    }
 }else{
    require "./Controllers/HeaderController.php";
    $controllerHeader = new HeaderController();
    $controllerHeader->index();
    require_once 'Views/frontend/partitions/header.php';
   actionMethod();
    require_once 'Views/frontend/partitions/footer.php';
 }
 // choe file lưu $_file['name']['4 thuoc tinh']
 //4 thuoc tinh [tmp_name,name,size,error]
 // $_post['submit_file]
//  $file
?>
