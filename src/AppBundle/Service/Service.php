<?php

namespace AppBundle\Service;

use Doctrine\Common\Persistence\ObjectManager;

class Service
{
    protected $objectManager;

    public function __construct(ObjectManager $oEntityManager)
    {
        $this->objectManager = $oEntityManager;
    }

    public function persistAndFlush($data)
    {
        $this->objectManager->persist($data);
        $this->objectManager->flush();
    }

    public function removeAndFlush($data)
    {
        $this->objectManager->remove($data);
        $this->objectManager->flush();
    }

}