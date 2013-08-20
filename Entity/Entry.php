<?php

namespace Bangpound\Atom\DataBundle\Entity;

use JMS\Serializer\Annotation as JMS;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Entry
 *
 * @JMS\XMLRoot("entry")
 */
class Entry
{
    use CommonMetadata;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     *
     * @JMS\SerializedName("id")
     */
    private $atomId;

    /**
     * @var \DateTime
     *
     * @JMS\Type("DateTime")
     */
    private $published;

    /**
     * @var \DateTime
     *
     * @JMS\Type("DateTime")
     */
    private $updated;

    /**
     * @var string
     *
     */
    private $title;

    /**
     * @var string
     */
    private $title_type;

    /**
     * @var string
     */
    private $rights;

    /**
     * @var string
     */
    private $rights_type;

    /**
     * @var string
     */
    private $summary;

    /**
     * @var string
     */
    private $summary_type;

    /**
     * @var ArrayCollection
     *
     * @JMS\Type("ArrayCollection<Bangpound\Atom\DataBundle\Entity\Feed>")
     */
    private $feeds;

    /**
     * @var Source
     *
     * @JMS\Type("Bangpound\Atom\DataBundle\Entity\Source")
     */
    private $source;

    /**
     * @var Link
     *
     * @JMS\Type("ArrayCollection<Bangpound\Atom\DataBundle\Entity\Link>")
     * @JMS\XmlList(entry="link")
     */
    private $links;

    /**
     * @var Person
     *
     * @JMS\Type("ArrayCollection<Bangpound\Atom\DataBundle\Entity\Person>")
     * @JMS\XmlList(entry="author")
     */
    private $authors;

    /**
     * @var Person
     *
     * @JMS\Type("ArrayCollection<Bangpound\Atom\DataBundle\Entity\Person>")
     * @JMS\XmlList(entry="contributor")
     */
    private $contributors;

    /**
     * @var Category
     *
     * @JMS\Type("ArrayCollection<Bangpound\Atom\DataBundle\Entity\Category>")
     * @JMS\XmlList(entry="category")
     */
    private $categories;

    public function __construct()
    {
        $this->authors = new ArrayCollection();
        $this->links = new ArrayCollection();
        $this->categories = new ArrayCollection();
        $this->contributors = new ArrayCollection();
        $this->feeds = new ArrayCollection();
    }

    /**
     * Set id
     *
     * @param integer $id
     * @return Entry
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
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
     * Set summary
     *
     * @param string $summary
     * @return Entry
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;
        return $this;
    }

    /**
     * Get summary
     *
     * @return string
     */
    public function getSummary()
    {
        return $this->summary;
    }

    public function getSummaryType()
    {
        return $this->summary_type;
    }

    public function __toString()
    {
        return $this->getTitle();
    }

    public function getPublished()
    {
        return $this->published;
    }

    public function setPublished($published)
    {
        $this->published = $published;
        return $this;
    }

    public function getSource()
    {
        return $this->source;
    }

    public function setSource(Source $source)
    {
        $this->source = $source;
        return $this;
    }

    public function getFeeds() {
        return $this->feeds;
    }

    public function addFeed(Feed $feed) {
        $this->feeds[] = $feed;
    }
}
