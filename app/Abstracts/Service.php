<?php


namespace App\Abstracts;


abstract class Service
{
    public function deleteEntity($entity): void
    {
        $entity->delete();
    }

    public function restoreEntity($entity): void
    {
        $entity->restore();
    }
}
