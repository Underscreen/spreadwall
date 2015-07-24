<?php 

namespace SW\MediaBundle\Service;

use Doctrine\ORM\EntityManager; 
use SW\MediaBundle\Entity\Media;

Class UploadService
{
	protected $em;
 
    public function __construct(EntityManager $em) {
        $this->em = $em;
    }
   
    public function saveUserAvatar($userId, $file) {
       
            $media = new Media();

            $name = $file->getFileName();
            $media->setPath('uploads/avatar/'.$name);
            $media->setMimeType($file->getMimeType());
            $media->setSize($file->getSize());

            $user = $this->em->getRepository('SWUserBundle:User')->findOneById($userId);
            $media->setName('avatar de '.$user->getFirstname());
            $user->setMedia($media);
           	$this->em->persist($media);
            $this->em->persist($user);
            $this->em->flush();
            $this->em->close();
    }


}