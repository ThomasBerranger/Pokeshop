<?php

namespace AppBundle\Service;

use Doctrine\Common\Persistence\ObjectManager;

class Service
{
    protected $oEntityMgr;

    public function __construct(ObjectManager $oEntityManager)
    {
        $this->oEntityMgr = $oEntityManager;
    }

    public function persistAndFlush($data)
    {
        $this->oEntityMgr->persist($data);
        $this->oEntityMgr->flush();
    }

    public function removeAndFlush($data)
    {
        $this->oEntityMgr->remove($data);
        $this->oEntityMgr->flush();
    }
}