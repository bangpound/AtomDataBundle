<?php

namespace Bangpound\Atom\DataBundle\Model;

use JMS\Serializer\Annotation as JMS;
use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation\Discriminator;

/**
 * Source
 *
 * @JMS\XmlRoot("source")
 * @JMS\Discriminator(disabled=true)
 */
abstract class Source
{
    use CommonMetadata;

    /**
     * @var integer
     *
     */
    protected $id;

    /**
     * @var Author
     *
     * @JMS\Type("ArrayCollection<Bangpound\Atom\DataBundle\Model\Person>")
     * @JMS\XmlList(entry="author")
     */
    protected $authors;

    /**
     * @var Category
     *
     * @JMS\Type("ArrayCollection<Bangpound\Atom\DataBundle\Model\Category>")
     * @JMS\XmlList(entry="category")
     */
    protected $categories;

    /**
     * @var Contributor
     *
     * @JMS\Type("ArrayCollection<Bangpound\Atom\DataBundle\Model\Person>")
     * @JMS\XmlList(entry="contributor")
     */
    protected $contributors;

    /**
     *
     * @var string
     *
     */
    protected $generator;

    /**
     *
     * @var string
     *
     */
    protected $icon;

    /**
     * @var string
     *
     * @JMS\SerializedName("id")
     */
    protected $atomId;

    /**
     * @var Link
     *
     * @JMS\Type("ArrayCollection<Bangpound\Atom\DataBundle\Model\Link>")
     * @JMS\XmlList(entry="link")
     */
    protected $links;

    /**
     * @var string
     *
     * @todo Make this an atomTextConstruct
     */
    protected $rights;

    /**
     * @var string
     *
     * @todo Make this an atomTextConstruct
     */
    protected $subtitle;

    /**
     * @var string
     *
     */
    protected $title;

    /**
     * @var \DateTime
     *
     */
    protected $updated;

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
