<?php

namespace Bangpound\Atom\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;

/**
 * Category
 *
 * @ORM\Table("category")
 * @ORM\Entity
 */
class Category
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="term", type="string", length=255)
     * @JMS\XmlAttribute
     */
    private $term;

    /**
     * @var string
     *
     * @ORM\Column(name="scheme", type="string", length=255, nullable=true)
     * @JMS\XmlAttribute
     */
    private $scheme;

    /**
     * @var string
     *
     * @ORM\Column(name="label", type="string", length=255, nullable=true)
     * @JMS\XmlAttribute
     */
    private $label;

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
     * Set term
     *
     * @param string $term
     * @return Category
     */
    public function setTerm($term)
    {
        $this->term = $term;
    
        return $this;
    }

    /**
     * Get term
     *
     * @return string 
     */
    public function getTerm()
    {
        return $this->term;
    }

    /**
     * Set scheme
     *
     * @param string $scheme
     * @return Category
     */
    public function setScheme($scheme)
    {
        $this->scheme = $scheme;
    
        return $this;
    }

    /**
     * Get scheme
     *
     * @return string 
     */
    public function getScheme()
    {
        return $this->scheme;
    }


    /**
     * Set scheme
     *
     * @param string $label
     * @return Category
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get scheme
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    public function __toString()
    {
        return $this->term;
    }
}
