<?php

namespace Padam87\AttributeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Padam87\AttributeBundle\Model\AbstractDefinition;
use Padam87\AttributeBundle\Model\AbstractOption;
use Padam87\AttributeBundle\Model\OptionInterface;
use Padam87\AttributeBundle\Model\AttributeInterface;
use Padam87\AttributeBundle\Model\AbstractAttribute;

/**
 * @ORM\MappedSuperclass
 */

class Attribute extends AbstractAttribute implements AttributeInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var int
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string
     */
    protected $value;

    /**
     * @ORM\ManyToOne(targetEntity="Padam87\AttributeBundle\Model\DefinitionInterface", inversedBy="attributes", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="definition_id", referencedColumnName="id")
     * @var Definition
     */
    protected $definition;
}