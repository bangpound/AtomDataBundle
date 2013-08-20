<?php

namespace Bangpound\Atom\DataBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as JMS;
use Rshief\PubsubBundle\Entity\FeedTopic;
use Rshief\PubsubBundle\Entity\FeedTopicInterface;

/**
 * Feed
 *
 * @JMS\XmlRoot("feed")
 */
abstract class Feed extends Source
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var Entry
     *
     * @JMS\Type("ArrayCollection<Bangpound\Atom\DataBundle\Model\Entry>")
     * @JMS\XmlList(entry="entry")
     * @JMS\Exclude
     */
    protected $entries;

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
        if ($entry->getFeeds() && !$entry->getFeeds()->contains($this)) {
            $entry->addFeed($this);
        }
        $this->entries[] = $entry;
    }
}
