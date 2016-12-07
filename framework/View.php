<?php
/**
 * Created by PhpStorm.
 * User: formation
 * Date: 07/12/2016
 * Time: 11:36
 */

namespace m2i\Framework;


class View
{

    private $layout;

    private $data = [];

    /**
     * View constructor.
     * @param $layout
     */
    public function __construct($layout='layout')
    {
        $this->layout = $layout;
    }


    private function getTemplateHTML($template, array $data){
        ob_start();
        extract($data);

        include ROOT_PATH."/src/views/{$template}.php";
        $content = ob_get_clean();
        return $content;
    }

    public function render($template, $data){
        $pageContent = $this->getTemplateHTML($template,$data);
        $data["pageContent"] = $pageContent;

        if(! array_key_exists('pageTitle', $data)){
            $data['pageTitle'] = "Mon site ecommerce";
        }

        return $this->getTemplateHTML($this->layout, $data);
    }


}