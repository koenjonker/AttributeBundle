<?php

namespace Padam87\AttributeBundle\Listener;

use Doctrine\ORM\Event\LoadClassMetadataEventArgs;
use Doctrine\Common\Annotations\AnnotationReader;
use JMS\DiExtraBundle\Annotation as DI;
use Doctrine\DBAL\DBALException;
use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use JifeLine\TicketBundle\Entity\Schema;

/**
 * @DI\Service("attribute.schema_creator")
 * @DI\Tag("doctrine.event_listener", attributes = {"event" = "loadClassMetadata"})
 */
class SchemaCreatorListener
{
 
    protected $schemaClassName;
    
    /**
     * @Di\InjectParams({
     *     "schemaClassName" = @Di\Inject("%padam87.entities.schema%")
     * })
     */    
    public function __construct($schemaClassName) {
        $this->schemaClassName = $schemaClassName;
    }
    
    public function loadClassMetadata(LoadClassMetadataEventArgs $eventArgs)
    {
        $em = $eventArgs->getEntityManager();
        $metadata = $eventArgs->getClassMetadata();
        $refl = $metadata->getReflectionClass();

        if ($refl === null) {
            $refl = new \ReflectionClass($metadata->getName());
        }

        $reader = new AnnotationReader();

        if ($reader->getClassAnnotation($refl, 'Padam87\AttributeBundle\Annotation\Entity') != null) {
            try {
                $schema = $em->getRepository($this->schemaClassName)->findOneBy(array(
                    'className' => $metadata->getName()
                ));

                if ($schema === null) {
                    $schema = new $this->schemaClassName;
                    $schema->setClassName($metadata->getName());

                    $em->persist($schema);
                    $em->flush($schema);
                }
            } catch (DBALException $e) {
                // Discard DBAL exceptions in order for schema:update to work
            }
        }
    }
}