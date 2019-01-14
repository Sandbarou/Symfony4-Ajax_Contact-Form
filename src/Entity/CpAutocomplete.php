<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass="App\Repository\CpAutocompleteRepository")
 */
class CpAutocomplete
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=2, options={"fixed" = true})
     */
    private $CODEPAYS;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $CP;

    /**
     * @ORM\Column(type="string", length=180)
     */
    private $VILLE;


    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getCODEPAYS()
    {
        return $this->CODEPAYS;
    }

    /**
     * @param mixed $CODEPAYS
     */
    public function setCODEPAYS($CODEPAYS)
    {
        $this->CODEPAYS = $CODEPAYS;
    }

    /**
     * @return mixed
     */
    public function getCP()
    {
        return $this->CP;
    }

    /**
     * @param mixed $CP
     */
    public function setCP($CP)
    {
        $this->CP = $CP;
    }

    /**
     * @return mixed
     */
    public function getVILLE()
    {
        return $this->VILLE;
    }

    /**
     * @param mixed $VILLE
     */
    public function setVILLE($VILLE)
    {
        $this->VILLE = $VILLE;
    }


}
