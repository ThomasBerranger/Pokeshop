<?php


namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinTable;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\OneToMany;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 * @UniqueEntity(fields={"email"})
 * @UniqueEntity(fields={"username"})
 */
class User implements UserInterface, \Serializable
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(
     *     min="3",
     *     max="15",
     *     minMessage="Your username must be larger than {{ limit }} letters",
     *     maxMessage="Your username must be smaller than {{ limit }} letters"
     * )
     * @ORM\Column(name="username", type="string", length=15, unique=true)
     */
    private $username;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(
     *     min="3",
     *     max="15",
     *     minMessage="Your password must be larger than {{ limit }} letters",
     *     maxMessage="Your password must be smaller than {{ limit }} letters"
     * )
     * @ORM\Column(type="string", length=64)
     */
    private $password;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(max=4096)
     */
    private $plainPassword;

    /**
     * @Assert\NotBlank()
     * @Assert\Email(
     *     message = "The email '{{ value }}' is not a valid email.",
     *     checkMX = true
     * )
     * @ORM\Column(name="email", type="string", length=60, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;

    /**
     * @ORM\Column(name="money", type="integer")
     */
    private $money;

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
     * One User has Many Articles.
     * @OneToMany(targetEntity="Article", mappedBy="owner", cascade={"remove"})
     */
    private $articles;

    /**
     * @var int
     *
     * @ORM\Column(name="sale", type="integer")
     */
    private $sale;

    /**
     * @var int
     *
     * @ORM\Column(name="purchase", type="integer")
     */
    private $purchase;

    /**
     * Many Users have Many Pokemons.
     * @ManyToMany(targetEntity="Pokemon", inversedBy="users_favorites")
     * @JoinTable(name="users_pokemons_favorites")
     */
    private $pokemons_favorites;



    public function __construct()
    {
        $this->pokemons_favorites = new ArrayCollection();
        $this->articles = new ArrayCollection();
        $this->isActive = true;
        $this->money = 100;
        $this->sale = 0;
        $this->purchase = 0;
    }



    public function getUsername()
    {
        return $this->username;
    }

    public function getSalt()
    {
        // you *may* need a real salt depending on your encoder
        // see section on salt below
        return null;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getRoles()
    {
        return array('ROLE_USER');
    }

    public function eraseCredentials()
    {
    }

    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
            $this->email,
            $this->isActive,
            $this->money,
            $this->picture,
            $this->sale,
            $this->purchase,
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            $this->email,
            $this->isActive,
            $this->money,
            $this->picture,
            $this->sale,
            $this->purchase,
            ) = unserialize($serialized);
    }

    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    public function setPlainPassword($password)
    {
        $this->plainPassword = $password;
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
     * Set username
     *
     * @param string $username
     *
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return User
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->isActive;
    }


    /**
     * Set money
     *
     * @param integer $money
     *
     * @return User
     */
    public function setMoney($money)
    {
        $this->money = $money;

        return $this;
    }

    /**
     * Get money
     *
     * @return integer
     */
    public function getMoney()
    {
        return $this->money;
    }

    /**
     * Set picture
     *
     * @param string $picture
     *
     * @return User
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
     * Set sale
     *
     * @param integer $sale
     *
     * @return User
     */
    public function setSale($sale)
    {
        $this->sale = $sale;

        return $this;
    }

    /**
     * Get sale
     *
     * @return integer
     */
    public function getSale()
    {
        return $this->sale;
    }

    /**
     * Set purchase
     *
     * @param integer $purchase
     *
     * @return User
     */
    public function setPurchase($purchase)
    {
        $this->purchase = $purchase;

        return $this;
    }

    /**
     * Get purchase
     *
     * @return integer
     */
    public function getPurchase()
    {
        return $this->purchase;
    }

    /**
     * Add article
     *
     * @param \AppBundle\Entity\Article $article
     *
     * @return User
     */
    public function addArticle(Article $article)
    {
        $this->articles[] = $article;

        return $this;
    }

    /**
     * Remove article
     *
     * @param \AppBundle\Entity\Article $article
     */
    public function removeArticle(Article $article)
    {
        $this->articles->removeElement($article);
    }

    /**
     * Get articles
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getArticles()
    {
        return $this->articles;
    }


    /**
     * Add pokemonsFavorite
     *
     * @param \AppBundle\Entity\Pokemon $pokemonsFavorite
     *
     * @return User
     */
    public function addPokemonsFavorite(Pokemon $pokemonsFavorite)
    {
        $this->pokemons_favorites[] = $pokemonsFavorite;

        return $this;
    }

    /**
     * Remove pokemonsFavorite
     *
     * @param \AppBundle\Entity\Pokemon $pokemonsFavorite
     */
    public function removePokemonsFavorite(Pokemon $pokemonsFavorite)
    {
        $this->pokemons_favorites->removeElement($pokemonsFavorite);
    }

    /**
     * Get pokemonsFavorites
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPokemonsFavorites()
    {
        return $this->pokemons_favorites;
    }
}
