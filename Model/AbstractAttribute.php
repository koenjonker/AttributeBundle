<?php
namespace Padam87\AttributeBundle\Model;

class AbstractAttribute 
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $value;

    /**
     * @var Definition
     */
    protected $definition;

    public function __toString()
    {
        return $this->getDefinition()->getName();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set value
     *
     * @param string $value
     * @return Attribute
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set definition
     *
     * @param \Padam87\AttributeBundle\Entity\DefinitionInterface $definition
     * @return Attribute
     */
    public function setDefinition(DefinitionInterface $definition = null)
    {
        $this->definition = $definition;

        return $this;
    }

    /**
     * Get definition
     *
     * @return \Padam87\AttributeBundle\Entity\Definition
     */
    public function getDefinition()
    {
        return $this->definition;
    }
}
