<?php

namespace Bangpound\Atom\DataBundle\Model;

use JMS\Serializer\Annotation as JMS;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Entry
 *
 * @JMS\XMLRoot("entry")
 */
abstract class Entry
{
    use CommonMetadata;

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     *
     * @JMS\SerializedName("id")
     */
    protected $atomId;

    /**
     * @var \DateTime
     *
     * @JMS\Type("DateTime")
     */
    protected $published;

    /**
     * @var \DateTime
     *
     * @JMS\Type("DateTime")
     */
    protected $updated;

    /**
     * @var string
     *
     */
    protected $title;

    /**
     * @var string
     */
    protected $title_type;

    /**
     * @var string
     */
    protected $rights;

    /**
     * @var string
     */
    protected $rights_type;

    /**
     * @var string
     */
    protected $summary;

    /**
     * @var string
     */
    protected $summary_type;

    /**
     * @var ArrayCollection
     *
     * @JMS\Type("ArrayCollection<Bangpound\Atom\DataBundle\Model\Feed>")
     */
    protected $feeds;

    /**
     * @var Source
     *
     * @JMS\Type("Bangpound\Atom\DataBundle\Model\Source")
     */
    protected $source;

    /**
     * @var Link
     *
     * @JMS\Type("ArrayCollection<Bangpound\Atom\DataBundle\Model\Link>")
     * @JMS\XmlList(entry="link")
     */
    protected $links;

    /**
     * @var Person
     *
     * @JMS\Type("ArrayCollection<Bangpound\Atom\DataBundle\Model\Person>")
     * @JMS\XmlList(entry="author")
     */
    protected $authors;

    /**
     * @var Person
     *
     * @JMS\Type("ArrayCollection<Bangpound\Atom\DataBundle\Model\Person>")
     * @JMS\XmlList(entry="contributor")
     */
    protected $contributors;

    /**
     * @var Category
     *
     * @JMS\Type("ArrayCollection<Bangpound\Atom\DataBundle\Model\Category>")
     * @JMS\XmlList(entry="category")
     */
    protected $categories;

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
