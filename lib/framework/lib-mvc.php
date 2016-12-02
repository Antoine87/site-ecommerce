<?php

function getControllerPath($page){
    if(empty($page)){
        $page = "home";
    }
    $controllerPath = ROOT_PATH."/src/controllers/$page.php";
    if(! file_exists($controllerPath)){
        $controllerPath = ROOT_PATH."/src/controllers/error-not-found.php";
    }

    return $controllerPath;
}

function getTemplateHTML($template, array $data){
    ob_start();
    extract($data);

    include ROOT_PATH."/src/views/{$template}.php";
    $content = ob_get_clean();
    return $content;
}

function renderView($template, $data, $layout="layout"){
    $pageContent = getTemplateHTML($template,$data);
    $data["pageContent"] = $pageContent;

    return getTemplateHTML($layout, $data);
}