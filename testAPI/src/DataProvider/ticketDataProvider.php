<?php
// api/src/DataProvider/BlogPostCollectionDataProvider.php

namespace App\DataProvider;

use ApiPlatform\Core\DataProvider\ContextAwareCollectionDataProviderInterface;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use App\Entity\Ticketfree;
use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;

final class ticketDataProvider implements ContextAwareCollectionDataProviderInterface, RestrictedDataProviderInterface
{
    private $collectionDataProvider;

    private ManagerRegistry $doctrine;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }
    public function supports(string $resourceClass, string $operationName = null, array $context = []): bool
    {
        return Ticketfree::class === $resourceClass;
    }

    public function getCollection(string $resourceClass, string $operationName = null, array $context = []): iterable
    {
        /** @var Ticketfree[] $tickets */
        $tickets = $this->doctrine->getRepository(Ticketfree::class)->findAll();
        foreach ($tickets as $ticket) {
            $user = $this->doctrine->getRepository(User::class)->find($ticket->getIdDev());
            $ticket->setNom($user->getNom());
            $ticket->setPrenom($user->getPrenom());
        }
        return $tickets;
    }
}