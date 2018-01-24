<?php

namespace AppBundle\Service;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileUploader
{
    private $targetDirUser;
    private $targetDirArticle;

    public function __construct($targetDirUser, $targetDirArticle)
    {
        $this->targetDirUser = $targetDirUser;
        $this->targetDirArticle = $targetDirArticle;
    }

    public function upload(UploadedFile $file, $target)
    {
        $fileName = md5(uniqid()).'.'.$file->guessExtension();

        $file->move($this->getTargetDir($target), $fileName);

        return $fileName;
    }

    public function getTargetDir($target)
    {
        if ($target == "user")
        {
            return $this->targetDirUser;
        }
        elseif ($target == "article")
        {
            return $this->targetDirArticle;
        }
        else
        {
            return null;
        }
    }
}