<?php

namespace Bangpound\Atom\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;

/**
 * Link
 *
 * @ORM\Table("atom_link")
 * @ORM\Entity(repositoryClass="Bangpound\Atom\DataBundle\Entity\FeedRepository")
 * @JMS\XMLRoot("link")
 */
class Link
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
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     * @JMS\Type("string")
     * @JMS\XmlAttribute
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="rel", type="string", length=255)
     * @JMS\Type("string")
     * @JMS\XmlAttribute
     */
    private $rel;

    /**
     * @var string
     *
     * @ORM\Column(name="href", type="string", length=255)
     * @JMS\Type("string")
     * @JMS\XmlAttribute
     */
    private $href;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=true)
     * @JMS\Type("string")
     * @JMS\XmlAttribute
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="hreflang", type="string", length=255, nullable=true)
     * @JMS\Type("string")
     * @JMS\XmlAttribute
     */
    private $hreflang;

    /**
     * @var string
     *
     * @ORM\Column(name="length", type="string", length=255, nullable=true)
     * @JMS\Type("string")
     * @JMS\XmlAttribute
     */
    private $length;

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
     * Set title
     *
     * @param string $title
     * @return Link
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set rel
     *
     * @param string $rel
     * @return Link
     */
    public function setRel($rel)
    {
        $this->rel = $rel;
    
        return $this;
    }

    /**
     * Get rel
     *
     * @return string 
     */
    public function getRel()
    {
        return $this->rel;
    }

    /**
     * Set href
     *
     * @param string $href
     * @return Link
     */
    public function setHref($href)
    {
        $this->href = $href;
    
        return $this;
    }

    /**
     * Get href
     *
     * @return string 
     */
    public function getHref()
    {
        return $this->href;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Link
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

    public function __toString()
    {
        return $this->getTitle();
    }

    public function getLength()
    {
        return $this->length;
    }

    public function getHrefLang()
    {
        return $this->hreflang;
    }
}
