<?php
/**
 * Created by PhpStorm.
 * User: dchiorean
 * Date: 9/4/2018
 * Time: 3:55 PM
 */

namespace App\Entity;


class Technology_Tag
{
    private $technology_id;
    private $tag_id;

    /**
     * @return mixed
     */
    public function getTechnologyId()
    {
        return $this->technology_id;
    }

    /**
     * @param mixed $technology_id
     */
    public function setTechnologyId($technology_id): void
    {
        $this->technology_id = $technology_id;
    }

    /**
     * @return mixed
     */
    public function getTagId()
    {
        return $this->tag_id;
    }

    /**
     * @param mixed $tag_id
     */
    public function setTagId($tag_id): void
    {
        $this->tag_id = $tag_id;
    }



}