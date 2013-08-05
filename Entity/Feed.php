<?php

namespace Bangpound\Atom\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Feed
 *
 * @ORM\Table(name="atom_feed")
 * @ORM\Entity(repositoryClass="Bangpound\Atom\DataBundle\Entity\FeedRepository")
 * @JMS\XmlRoot("feed")
 */
class Feed extends Source
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
     * @var FeedTopic
     *
     * @ORM\OneToOne(targetEntity="FeedTopic", mappedBy="feed")
     */
    private $feedTopic;

    /**
     * @var Entry
     *
     * @ORM\OneToMany(targetEntity="Entry", mappedBy="feed", cascade={"persist", "merge"})
     * @JMS\Type("ArrayCollection<Bangpound\Atom\DataBundle\Entity\Entry>")
     * @JMS\XmlList(entry="entry")
     * @JMS\Exclude
     */
    private $entries;

    /**
     *
     */
    public function __construct()
    {
        parent::__construct();
        $this->entries = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set feed topic
     *
     * @param FeedTopicInterface $topic
     * @return Feed
     */
    public function setFeedTopic(FeedTopicInterface $feedTopic)
    {
        $feedTopic->setFeed($this);
        $this->feedTopic = $feedTopic;
        return $this;
    }

    /**
     * Get feed topic
     *
     * @return FeedTopic
     */
    public function getFeedTopic()
    {
        return $this->feedTopic;
    }

    public function __toString()
    {
        return $this->getTitle();
    }

    /**
     *
     * @return ArrayCollection
     */
    public function getEntries()
    {
        return $this->entries;
    }

    public function setEntries(ArrayCollection $entries)
    {
        $this->entries = $entries;
        return $this;
    }

    public function addEntry(Entry $entry)
    {
        $entry->setFeed($this);
        $this->entries[] = $entry;
    }
}
