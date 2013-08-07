<?php

namespace Bangpound\Atom\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation\Discriminator;

/**
 * Source
 *
 * @ORM\Table(name="source")
 * @ORM\InheritanceType("JOINED")
 * @ORM\Entity(repositoryClass="Bangpound\Atom\DataBundle\Entity\FeedRepository")
 * @JMS\XmlRoot("source")
 * @JMS\Discriminator(disabled=true)
 */
class Source
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
     * @var Author
     *
     * @ORM\ManyToMany(targetEntity="Person", cascade={"persist", "merge"})
     * @ORM\JoinTable(name="source_author")
     * @JMS\Type("ArrayCollection<Bangpound\Atom\DataBundle\Entity\Person>")
     * @JMS\XmlList(entry="author")
     */
    private $authors;

    /**
     * @var Category
     *
     * @ORM\ManyToMany(targetEntity="Category", cascade={"persist", "merge"})
     * @JMS\Type("ArrayCollection<Bangpound\Atom\DataBundle\Entity\Category>")
     * @JMS\XmlList(entry="category")
     */
    private $categories;

    /**
     * @var Contributor
     *
     * @ORM\ManyToMany(targetEntity="Person", cascade={"persist", "merge"})
     * @ORM\JoinTable(name="source_contributor")
     * @JMS\Type("ArrayCollection<Bangpound\Atom\DataBundle\Entity\Person>")
     * @JMS\XmlList(entry="contributor")
     */
    private $contributors;

    /**
     *
     * @var string
     *
     * @ORM\Column(name="generator", type="string", nullable=true)
     */
    private $generator;

    /**
     *
     * @var string
     *
     * @ORM\Column(name="icon", type="string", nullable=true)
     */
    private $icon;

    /**
     * @var string
     *
     * @ORM\Column(name="atom_id", type="string")
     * @JMS\SerializedName("id")
     */
    private $atomId;

    /**
     * @var Link
     *
     * @ORM\ManyToMany(targetEntity="Link", cascade={"persist", "merge"})
     * @JMS\Type("ArrayCollection<Bangpound\Atom\DataBundle\Entity\Link>")
     * @JMS\XmlList(entry="link")
     */
    private $links;

    /**
     * @var string
     *
     * @ORM\Column(name="rights", type="string", nullable=true)
     * @todo Make this an atomTextConstruct
     */
    private $rights;

    /**
     * @var string
     *
     * @ORM\Column(name="subtitle", type="string", nullable=true)
     * @todo Make this an atomTextConstruct
     */
    private $subtitle;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated", type="datetime", nullable=true)
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
