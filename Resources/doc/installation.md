#Installation

##1, Composer

	"padam87/attribute-bundle": "dev-master"

##2, AppKernel

	$bundles = array(
	    ...
	    new Padam87\AttributeBundle\Padam87AttributeBundle(),
	);

##3, config.yml

	imports:
	    ...
	    - { resource: "@Padam87AttributeBundle/Resources/config/config.yml" }

	...

	jms_di_extra:
	    locations:
	        all_bundles: false
	        bundles: [Padam87AttributeBundle]

jms_di_extra configuration is unnecessary if you have set all_bundles to true

##4, routing.yml

    padam87_attribute:
        resource: "@Padam87AttributeBundle/Controller/"
        type:     annotation
        prefix:   /
##5, Create your entities

``` php
<?php
namespace YourProject\YourBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Padam87\AttributeBundle\Entity\Attribute as AbstractAttribute;

/**
 * @ORM\Entity()
 * @ORM\Table("attribute")
 */
class Attribute extends AbstractAttribute
{

}
```

``` php
<?php
namespace YourProject\YourBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Padam87\AttributeBundle\Entity\Definition as AbstractDefinition;
use Padam87\AttributeBundle\Model\DefinitionInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="attribute_definition")
 */
class Definition extends AbstractDefinition implements DefinitionInterface
{

}
```

``` php
<?php
namespace YourProject\YourBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Padam87\AttributeBundle\Entity\Option as AbstractOption;

/**
 * @ORM\Entity
 * @ORM\Table(name="attribute_option")
 */
class Option extends AbstractOption
{

}
```

``` php
<?php
namespace YourProject\YourBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Padam87\AttributeBundle\Entity\Schema as AbstractSchema;

/**
 * @ORM\Entity()
 * @ORM\Table("attribute_schema")
 */
class Schema extends AbstractSchema
{

}
```
