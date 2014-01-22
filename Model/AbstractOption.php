<?php
namespace Padam87\AttributeBundle\Model;

abstract class AbstractOption
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var AttributeDefinition
     */
    protected $definition;

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
     * Set name
     *
     * @param  string $name
     * @return Option
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set definition
     *
     * @param  Padam87\AttributeBundle\Entity\DefinitionInterface $definition
     * @return Option
     */
    public function setDefinition(DefinitionInterface $definition = null)
    {
        $this->definition = $definition;

        return $this;
    }

    /**
     * Get definition
     *
     * @return Padam87\AttributeBundle\Entity\Definition
     */
    public function getDefinition()
    {
        return $this->definition;
    }
}