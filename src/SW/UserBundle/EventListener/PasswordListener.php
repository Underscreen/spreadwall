<?php

namespace SW\UserBundle\EventListener;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * PasswordListener
 */
class PasswordListener implements EventSubscriber
{
    /**
     * @var EncoderFactoryInterface
     */
    private $encoderFactory;

    /**
     * @param EncoderFactoryInterface $encoderFactory
     */
    public function __construct(EncoderFactoryInterface $encoderFactory)
    {
        $this->encoderFactory = $encoderFactory;
    }

    /**
     * @return array
     */
    public function getSubscribedEvents()
    {
        return [
            'prePersist',
            'preUpdate'
        ];
    }

    /**
     * @param LifecycleEventArgs $args
     */
    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
        if ($entity instanceof UserInterface) {
            $this->encodePassword($entity);
        }
    }

    /**
     * @param PreUpdateEventArgs $args
     */
    public function preUpdate(PreUpdateEventArgs $args)
    {
        $entity = $args->getEntity();
        if ($entity instanceof UserInterface && $entity->getPlainPassword()) {
            $this->encodePassword($entity);
        }
    }

    /**
     * @param UserInterface $entity
     */
    private function encodePassword(UserInterface $entity)
    {
        $encoder = $this->encoderFactory->getEncoder($entity);
        $password = $encoder->encodePassword($entity->getPlainPassword(), $entity->getSalt());
        $entity->setPassword($password);
    }
}