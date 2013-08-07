<?php

namespace Bangpound\Atom\DataBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

trait CommonMetadata
{
    public function getAtomId()
    {
        return $this->atomId;
    }

    public function setAtomId($atomId)
    {
        $this->atomId = $atomId;
        return $this;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Feed
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
     * Set updated
     *
     * @param \DateTime $updated
     * @return Feed
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    public function getLinks()
    {
        return $this->links;
    }

    public function setLinks(ArrayCollection $links)
    {
        $this->links = $links;
        return $this;
    }

    public function getContributors()
    {
        return $this->contributors;
    }

    public function setContributors(ArrayCollection $contributors)
    {
        $this->contributors = $contributors;
        return $this;
    }

    public function getCategories()
    {
        return $this->categories;
    }

    public function setCategories(ArrayCollection $categories)
    {
        $this->categories = $categories;
        return $this;
    }

    public function getAuthors()
    {
        return $this->authors;
    }

    public function setAuthors(ArrayCollection $authors)
    {
        $this->authors = $authors;
        return $this;
    }

    public function getRights()
    {
        return $this->rights;
    }

    public function setRights($rights)
    {
        $this->rights = $rights;
        return $this;
    }
}
