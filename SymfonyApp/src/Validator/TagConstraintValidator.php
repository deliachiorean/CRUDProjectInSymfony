<?php
/**
 * Created by PhpStorm.
 * User: dchiorean
 * Date: 9/6/2018
 * Time: 3:13 PM
 */

namespace App\Validator;


use App\Repository\TechnologyRepository;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;


class TagConstraintValidator extends ConstraintValidator
{

    private $technologyRepository;


    public function __construct(TechnologyRepository $technologyRepository)
    {
        $this->technologyRepository = $technologyRepository;
    }

    /**
     * {@inheritdoc}
     */
    public function validate($value,Constraint $constraint)
    {
        if (null === $value || '' === $value) {
            return;
        }

        if($this->technologyRepository->checkIfTagExists($value)===false) {

            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ tag }}', $value)
                ->addViolation();

        }



    }

}