<?php

namespace Bangpound\Atom\DataBundle\Model;

use JMS\Serializer\Annotation as JMS;

/**
 * Category
 */
abstract class Category
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     *
     * @JMS\XmlAttribute
     */
    protected $term;

    /**
     * @var string
     *
     * @JMS\XmlAttribute
     */
    protected $scheme;

    /**
     * @var string
     *
     * @JMS\XmlAttribute
     */
    protected $label;

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