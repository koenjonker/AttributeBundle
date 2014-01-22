<?php
namespace Padam87\AttributeBundle\Model;

class AbstractDefinition 
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
     * @var text
     */
    protected $description;
    
    /**
     * @var string
     */
    protected $type;
    
    /**
     * @var string
     */
    protected $unit;
    
    /**
     * @var boolean
     */
    protected $required = FALSE;
    
    /**
     * @var string
     */
    protected $orderIndex;
    
    /**
     * @var Schema
     */
    protected $schema;
    
    protected $options;
        
    public function __toString()
    {
        return $this->name;
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
     * Set name
     *
     * @param string $name
     * @return Definition
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
     * Set description
     *
     * @param string $description
     * @return Definition
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }
    
    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
    
    /**
     * Set type
     *
     * @param string $type
     * @return Definition
     */
    public function setType($type)
    {
        $this->type = $type;
    
        return $this;
    }
    
    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
    
    /**
     * Set unit
     *
     * @param string $unit
     * @return Definition
     */
    public function setUnit($unit)
    {
        $this->unit = $unit;
    
        return $this;
    }
    
    /**
     * Get unit
     *
     * @return string
     */
    public function getUnit()
    {
        return $this->unit;
    }
    
    /**
     * Set required
     *
     * @param boolean $required
     * @return Definition
     */
    public function setRequired($required)
    {
        $this->required = $required;
    
        return $this;
    }
    
    /**
     * Get required
     *
     * @return boolean
     */
    public function getRequired()
    {
        return $this->required;
    }
    
    /**
     * Set orderIndex
     *
     * @param integer $orderIndex
     * @return Definition
     */
    public function setOrderIndex($orderIndex)
    {
        $this->orderIndex = $orderIndex;
    
        return $this;
    }
    
    /**
     * Get orderIndex
     *
     * @return integer
     */
    public function getOrderIndex()
    {
        return $this->orderIndex;
    }   
    
    /**
     * Add options
     * @param OptionInterface $option
     * @return \Padam87\AttributeBundle\Model\AbstractDefinition
     */
    public function addOption(OptionInterface $option)
    {
        $this->options[] = $option;
        $option->setDefinition($this);
    
        return $this;
    } 
    
    /**
     * Remove options
     * 
     * @param OptionInterface $option
     */
    public function removeOption(OptionInterface $option)
    {
        $this->options->removeElement($option);
    }
    
    /**
     * Get options
     * @return 
     */
    public function getOptions()
    {
        return $this->options;
    }    
    
    /**
     * Add attributes
     *
     * @param AttributeInterface $attribute
     */
    public function addAttribute(AttributeInterface $attribute)
    {
        $this->attributes[] = $attribute;
    
        return $this;
    }
    
    /**
     * Remove attributes
     * 
     * @param AttributeInterface $attribute
     */
    public function removeAttribute(AttributeInterface $attribute)
    {
        $this->attributes->removeElement($attribute);
    }
    
    /**
     * Get attributes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAttributes()
    {
        return $this->attributes;
    } 

    /**
     * Set schema
     * 
     * @param SchemaInterface $schema
     * @return \Padam87\AttributeBundle\Model\AbstractDefinition
     */
    public function setSchema(SchemaInterface $schema = null)
    {
        $this->schema = $schema;
    
        return $this;
    }
    
    /**
     * Get schema
     * 
     * @return \Padam87\AttributeBundle\Model\Schema
     */
    public function getSchema()
    {
        return $this->schema;
    }    
}