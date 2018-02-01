<?php

namespace AppBundle\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Article
 *
 * @ORM\Table(name="article")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ArticleRepository")
 */
class Article
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * Many Articles have One Pokemon.
     * @ManyToOne(targetEntity="Pokemon", inversedBy="articles")
     * @JoinColumn(name="pokemon", referencedColumnName="id", nullable=false)
     */
    private $pokemon;

    /**
     * @var float
     *
     * @ORM\Column(name="size", type="float", nullable=true)
     */
    private $size;

    /**
     * @var float
     *
     * @ORM\Column(name="weight", type="float", nullable=true)
     */
    private $weight;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=1000, nullable=true)
     *
     * @Assert\Length(
     *      max = 1000,
     *      maxMessage = "Your descritpion cannot be longer than {{ limit }} characters"
     * )
     */
    private $description;

    /**
     * @ORM\Column(name="picture", type="string", nullable=true)
     *
     * @Assert\File(
     *     maxSize = "2M",
     *     mimeTypes = {"image/jpg", "image/jpeg", "image/gif", "image/png"},
     *     mimeTypesMessage = "Non valid file format",
     *     uploadIniSizeErrorMessage = "To huge file",
     *     uploadErrorMessage = "Erreur dans l'upload du fichier"
     * )
     */
    private $picture;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float")
     */
    private $price;

    /**
     * Many Articles have One User.
     * @ManyToOne(targetEntity="User", inversedBy="articles")
     * @JoinColumn(name="owner", referencedColumnName="id", nullable=false)
     */
    private $owner;

    /**
     * @var datetime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set size
     *
     * @param float $size
     *
     * @return Article
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get size
     *
     * @return float
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set weight
     *
     * @param float $weight
     *
     * @return Article
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get weight
     *
     * @return float
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Article
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set picture
     *
     * @param string $picture
     *
     * @return Article
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get picture
     *
     * @return string
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set price
     *
     * @param float $price
     *
     * @return Article
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Article
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set pokemon
     *
     * @param \AppBundle\Entity\Pokemon $pokemon
     *
     * @return Article
     */
    public function setPokemon(\AppBundle\Entity\Pokemon $pokemon)
    {
        $this->pokemon = $pokemon;

        return $this;
    }

    /**
     * Get pokemon
     *
     * @return \AppBundle\Entity\Pokemon
     */
    public function getPokemon()
    {
        return $this->pokemon;
    }

    /**
     * Set owner
     *
     * @param \AppBundle\Entity\User $owner
     *
     * @return Article
     */
    public function setOwner(\AppBundle\Entity\User $owner)
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * Get owner
     *
     * @return \AppBundle\Entity\User
     */
    public function getOwner()
    {
        return $this->owner;
    }
}
