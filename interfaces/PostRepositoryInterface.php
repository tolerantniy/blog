<?php

/**
 * Created by PhpStorm.
 * User: bigar
 * Date: 06.05.2019
 * Time: 13:47
 */
namespace app\interfaces;

interface PostRepositoryInterface
{
    public  function save($data);

    public function PostAll();
}