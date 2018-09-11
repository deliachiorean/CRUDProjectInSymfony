<?php
/**
 * Created by PhpStorm.
 * User: dchiorean
 * Date: 9/11/2018
 * Time: 6:02 PM
 */

namespace App\Entity;


class Tag
{
    private $id;
    private $name;
    public function __construct($name)
    {
        $this->name=$name;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }



}