<?php

namespace Bangpound\Atom\DataBundle\Entity;

use JMS\Serializer\Annotation as JMS;
use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation\Discriminator;

/**
 * Source
 *
 * @JMS\XmlRoot("source")
 * @JMS\Discriminator(disabled=true)
 */
class Source
{
    use CommonMetadata;

    /**
     * @var integer
     *
     */
    private $id;

    /**
     * @var Author
     *
     * @JMS\Type("ArrayCollection<Bangpound\Atom\DataBundle\Entity\Person>")
     * @JMS\XmlList(entry="author")
     */
    private $authors;

    /**
     * @var Category
     *
     * @JMS\Type("ArrayCollection<Bangpound\Atom\DataBundle\Entity\Category>")
     * @JMS\XmlList(entry="category")
     */
    private $categories;

    /**
     * @var Contributor
     *
     * @JMS\Type("ArrayCollection<Bangpound\Atom\DataBundle\Entity\Person>")
     * @JMS\XmlList(entry="contributor")
     */
    private $contributors;

    /**
     *
     * @var string
     *
     */
    private $generator;

    /**
     *
     * @var string
     *
     */
    private $icon;

    /**
     * @var string
     *
     * @JMS\SerializedName("id")
     */
    private $atomId;

    /**
     * @var Link
     *
     * @JMS\Type("ArrayCollection<Bangpound\Atom\DataBundle\Entity\Link>")
     * @JMS\XmlList(entry="link")
     */
    private $links;

    /**
     * @var string
     *
     * @todo Make this an atomTextConstruct
     */
    private $rights;

    /**
     * @var string
     *
     * @todo Make this an atomTextConstruct
     */
    private $subtitle;

    /**
     * @var string
     *
     */
    private $title;

    /**
     * @var \DateTime
     *
     */
    private $updated;

    public function __construct()
    {
        $this->authors = new ArrayCollection();
        $this->links = new ArrayCollection();
        $this->categories = new ArrayCollection();
        $this->contributors = new ArrayCollection();
    }

    public function setEntry(Entry $entry) {
        $entry->setSource($this);
        return $this;
    }

    public function __toString() {
        return $this->getTitle();
    }

    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id  = $id;
        return $this;
    }
}
