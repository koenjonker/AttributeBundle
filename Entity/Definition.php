<?php

namespace Padam87\AttributeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Padam87\AttributeBundle\Model\AbstractDefinition;
use Padam87\AttributeBundle\Model\SchemaInterface;

/**
 * @ORM\MappedSuperclass
 */
abstract class Definition extends AbstractDefinition
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
     * @ORM\Column(type="text", nullable=true)
     * @var text
     */
    protected $description;

    /**
     * @ORM\Column(type="string", length=100)
     * @var string
     */
    protected $type;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string
     */
    protected $unit;

    /**
     * @ORM\Column(type="boolean")
     * @var boolean
     */
    protected $required = FALSE;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @var string
     */
    protected $orderIndex;

    /**
     * @ORM\ManyToOne(targetEntity="Padam87\AttributeBundle\Model\SchemaInterface", inversedBy="definitions")
     * @ORM\JoinColumn(name="schema_id", referencedColumnName="id")
     * @var Schema
     */
    protected $schema;
    
    /**
     * @var JifeLine\TicketBundle\Entity\Attribute
     *
     * @ORM\OneToMany(targetEntity="Padam87\AttributeBundle\Model\AttributeInterface", mappedBy="definition", cascade={"remove"})
     */
    protected $attributes;
    
    /**
     * @ORM\OneToMany(targetEntity="Padam87\AttributeBundle\Model\OptionInterface", mappedBy="definition", orphanRemoval=true, cascade={"persist", "remove"}, fetch="EXTRA_LAZY")
     * @var ArrayCollection
     */
    protected $options;    

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->options = new \Doctrine\Common\Collections\ArrayCollection();
        $this->attributes = new \Doctrine\Common\Collections\ArrayCollection();
    }
}
