<?php
namespace Padam87\AttributeBundle\Model;

class AbstractSchema 
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $className;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->definitions = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString()
    {
        return $this->className;
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
     * Add definitions
     *
     * @param \Padam87\AttributeBundle\Entity\Definition $definitions
     * @return AbstractSchema
     */
    public function addDefinition(DefinitionInterface $definition)
    {
        $definitions->setSchema($this);
        $this->definitions[] = $definitions;

        return $this;
    }

    /**
     * Remove definitions
     *
     * @param \Padam87\AttributeBundle\Entity\Definition $definitions
     */
    public function removeDefinition(DefinitionInterface $definition)
    {
        $this->definitions->removeElement($definitions);
    }

    /**
     * Get definitions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDefinitions()
    {
        return $this->definitions;
    }

    /**
     * Set className
     *
     * @param string $className
     * @return Schema
     */
    public function setClassName($className)
    {
        $this->className = $className;

        return $this;
    }

    /**
     * Get className
     *
     * @return string
     */
    public function getClassName()
    {
        return $this->className;
    }
}