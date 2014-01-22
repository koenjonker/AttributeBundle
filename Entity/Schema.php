<?php

namespace Padam87\AttributeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Padam87\AttributeBundle\Model\SchemaInterface;
use Padam87\AttributeBundle\Model\AbstractSchema;

/**
 * @ORM\MappedSuperclass
 */
abstract class Schema extends AbstractSchema implements SchemaInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Assert\Valid
     * @var int
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    protected $className;
    
    /**
     * @ORM\OneToMany(targetEntity="Padam87\AttributeBundle\Model\DefinitionInterface", mappedBy="schema", orphanRemoval=true, cascade={"persist", "remove"})
     * @ORM\OrderBy({"orderIndex" = "ASC"})
     */
    protected $definitions;    
}
