<?php
namespace m2i\Framework;

interface IRouter
{
    /**
     * @return mixed
     */
    public function getControllerName();

    /**
     * @return mixed
     */
    public function getActionName();

    /**
     * @return array
     */
    public function getActionParameters() : array;
}