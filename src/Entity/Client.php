<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ClientRepository")
 * @UniqueEntity(
 *     fields={"email"},
 *     message="Cet email est déjà utilisé !"
 * )
 */
class Client
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage = "Le nom doit contenir au minimum {{ limit }} caractères",
     *      maxMessage = "Le nom ne doit pas contenir plus de {{ limit }} caractères"
     * )
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage = "Le prénom doit contenir au minimum {{ limit }} caractères",
     *      maxMessage = "Le prénom ne doit pas contenir plus de {{ limit }} caractères"
     * )
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=50, unique=true)
     * @Assert\NotBlank()
     * @Assert\Email(
     *     message = "L'email '{{ value }}' n'est pas valide",
     *     checkMX = true
     * )
     */
    private $email;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = 5,
     *      minMessage = "L'adresse doit contenir au minimum {{ limit }} caractères"
     * )
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank()
     * @Assert\Regex(
     *     pattern="/^\d{5}$/",
     *     message="Veuillez saisir les 5 chiffres de votre code postal"
     * )
     */
    private $cp_client;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank()
     */
    private $ville_client;

    /**
     * @ORM\OneToOne(targetEntity="CpAutocomplete", cascade={"persist"})
     */
    private $cpAutocomplete;


    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param mixed $adresse
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    /**
     * @return mixed
     */
    public function getCpClient()
    {
        return $this->cp_client;
    }

    /**
     * @param mixed $cp_client
     */
    public function setCpClient($cp_client)
    {
        $this->cp_client = $cp_client;
    }

    /**
     * @return mixed
     */
    public function getVilleClient()
    {
        return $this->ville_client;
    }

    /**
     * @param mixed $ville_client
     */
    public function setVilleClient($ville_client)
    {
        $this->ville_client = $ville_client;
    }

    /**
     * @return mixed
     */
    public function getCpAutocomplete()
    {
        return $this->cpAutocomplete;
    }

    /**
     * @param mixed $cpAutocomplete
     */
    public function setCpAutocomplete(CpAutocomplete $cpAutocomplete)
    {
        $this->cpAutocomplete = $cpAutocomplete;
    }

}

