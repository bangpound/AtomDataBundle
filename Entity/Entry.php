<?php

namespace Bangpound\Atom\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Entry
 *
 * @ORM\Table(name="entry")
 * @ORM\Entity(repositoryClass="Bangpound\Atom\DataBundle\Entity\FeedRepository")
 * @JMS\XMLRoot("entry")
 */
class Entry
{
    use CommonMetadata;

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
     * @ORM\Column(name="atom_id", type="string")
     * @JMS\SerializedName("id")
     */
    private $atomId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="published", type="datetime", nullable=true)
     * @JMS\Type("DateTime")
     */
    private $published;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated", type="datetime", nullable=true)
     * @JMS\Type("DateTime")
     */
    private $updated;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="title_type", type="string", length=255, nullable=true)
     */
    private $title_type;

    /**
     * @var string
     *
     * @ORM\Column(name="rights", type="string", length=255, nullable=true)
     */
    private $rights;

    /**
     * @var string
     *
     * @ORM\Column(name="rights_type", type="string", length=255, nullable=true)
     */
    private $rights_type;

    /**
     * @var string
     *
     * @ORM\Column(name="summary", type="text", nullable=true)
     */
    private $summary;

    /**
     * @var string
     *
     * @ORM\Column(name="summary_type", type="string", length=255, nullable=true)
     */
    private $summary_type;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="Feed", inversedBy="entries")
     * @JMS\Type("ArrayCollection<Bangpound\Atom\DataBundle\Entity\Feed>")
     */
    private $feeds;

    /**
     * @var Source
     *
     * @ORM\ManyToOne(targetEntity="Source", cascade={"persist", "merge"})
     * @ORM\JoinColumn(name="source_id", referencedColumnName="id", unique=true)
     * @JMS\Type("Bangpound\Atom\DataBundle\Entity\Source")
     */
    private $source;

    /**
     * @var Link
     *
     * @ORM\ManyToMany(targetEntity="Link", cascade={"persist", "merge"})
     * @JMS\Type("ArrayCollection<Bangpound\Atom\DataBundle\Entity\Link>")
     * @JMS\XmlList(entry="link")
     */
    private $links;

    /**
     * @var Person
     *
     * @ORM\ManyToMany(targetEntity="Person", cascade={"persist", "merge"})
     * @ORM\JoinTable(name="entry_author")
     * @JMS\Type("ArrayCollection<Bangpound\Atom\DataBundle\Entity\Person>")
     * @JMS\XmlList(entry="author")
     */
    private $authors;

    /**
     * @var Person
     *
     * @ORM\ManyToMany(targetEntity="Person", cascade={"persist", "merge"})
     * @ORM\JoinTable(name="entry_contributor")
     * @JMS\Type("ArrayCollection<Bangpound\Atom\DataBundle\Entity\Person>")
     * @JMS\XmlList(entry="contributor")
     */
    private $contributors;

    /**
     * @var Category
     *
     * @ORM\ManyToMany(targetEntity="Category", cascade={"persist", "merge"})
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
