<?php
/**
 * Created by PhpStorm.
 * User: dchiorean
 * Date: 9/3/2018
 * Time: 12:37 PM
 */

namespace App\Entity;
use Symfony\Component\Validator\Constraints;


class Technology
{

//    /**
//     * @var
//     */
    private $id;
//
//    /**
//     * @Assert\NotBlank(message="Technology name cannot be empty!")
//     */
    private $name;

//    /**
//     * @Assert\NotBlank(message="Technology picture cannot be empty!")
//     * @Assert\File(mimeTypes={ 'image/jpeg,', 'image/jpeg'})
//     */
    private $picture;


    public function __construct($name,$picture)
    {
        $this->name=$name;
        $this->picture=$picture;
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

    /**
     * @return mixed
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * @param mixed $picture
     */
    public function setPicture($picture): void
    {
        $this->picture = $picture;
    }



}