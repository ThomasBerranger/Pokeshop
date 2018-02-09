<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;

/**
 * Transaction
 *
 * @ORM\Table(name="transaction")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TransactionRepository")
 */
class Transaction
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="article", type="string", length=20)
     */
    private $article;

    /**
     * @var float
     *
     * @ORM\Column(name="money", type="float")
     */
    private $money;

    /**
     * Many Transactions have One User
     * @ManyToOne(targetEntity="User", inversedBy="transactions")
     * @JoinColumn(name="user_buy", referencedColumnName="id")
     */
    private $user_buy;

    /**
     * Many Transactions have One User
     * @ManyToOne(targetEntity="User", inversedBy="transactions")
     * @JoinColumn(name="user_sale", referencedColumnName="id")
     */
    private $user_sale;


    public function __construct()
    {
        date('Y-m-d H:i:s', strtotime('+5 days', $this->date = new \DateTime()));
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
     * Set article
     *
     * @param string $article
     *
     * @return Transaction
     */
    public function setArticle($article)
    {
        $this->article = $article;

        return $this;
    }

    /**
     * Get article
     *
     * @return string
     */
    public function getArticle()
    {
        return $this->article;
    }

    /**
     * Set money
     *
     * @param float $money
     *
     * @return Transaction
     */
    public function setMoney($money)
    {
        $this->money = $money;

        return $this;
    }

    /**
     * Get money
     *
     * @return float
     */
    public function getMoney()
    {
        return $this->money;
    }

    /**
     * Set userBuy
     *
     * @param \AppBundle\Entity\User $userBuy
     *
     * @return Transaction
     */
    public function setUserBuy(User $userBuy = null)
    {
        $this->user_buy = $userBuy;

        return $this;
    }

    /**
     * Get userBuy
     *
     * @return \AppBundle\Entity\User
     */
    public function getUserBuy()
    {
        return $this->user_buy;
    }

    /**
     * Set userSale
     *
     * @param \AppBundle\Entity\User $userSale
     *
     * @return Transaction
     */
    public function setUserSale(User $userSale = null)
    {
        $this->user_sale = $userSale;

        return $this;
    }

    /**
     * Get userSale
     *
     * @return \AppBundle\Entity\User
     */
    public function getUserSale()
    {
        return $this->user_sale;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Transaction
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }
}
