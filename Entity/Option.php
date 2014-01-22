<?php

namespace Padam87\AttributeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Padam87\AttributeBundle\Model\AbstractOption;
use Padam87\AttributeBundle\Model\OptionInterface;
use Padam87\AttributeBundle\Model\DefinitionInterface;

/**
 * @ORM\MappedSuperclass
 */

class Option extends AbstractOption implements OptionInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var int
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    protected $name;
    
    /**
     * @ORM\ManyToOne(targetEntity="Padam87\AttributeBundle\Model\DefinitionInterface", inversedBy="options")
     * @ORM\JoinColumn(name="definition_id", referencedColumnName="id")
     * @var AttributeDefinition
     */
    protected $definition;
}
