<?php
 
namespace SW\MediaBundle\EventListener;
 
use Oneup\UploaderBundle\Event\PostPersistEvent;
 
class UploadListener
{
    public function __construct($uploadService)
    {
        $this->us = $uploadService;
    }
 
    public function onUpload(PostPersistEvent $event)
    {
       if($event->getType() == 'avatar') {
            $request = $event->getRequest();
            $userId = $request->headers->get('userId');

          $this->us->saveUserAvatar($userId, $event->getFile());
        }
    }
}