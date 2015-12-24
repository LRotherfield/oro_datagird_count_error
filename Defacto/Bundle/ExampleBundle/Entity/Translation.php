<?php

namespace Defacto\Bundle\ExampleBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Oro\Bundle\EntityConfigBundle\Metadata\Annotation\Config;

/**
 * Translation
 *
 * @ORM\Table(name="df_translation")
 * @ORM\Entity()
 * @Config(
 *     defaultValues={
 *         "dataaudit"={
 *             "auditable"=true
 *         }
 *     }
 * )
 */
class Translation
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
     * @var string $locale
     *
     * @ORM\Column(name="locale", type="string", length=255)
     */
    private $locale;

    /**
     * @var Item $item
     *
     * @ORM\ManyToOne(targetEntity="Item", inversedBy="translations")
     * @ORM\JoinColumn(name="item_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $item;

    /**
     * @var Version $version
     *
     * @ORM\OneToOne(targetEntity="Version", cascade={"persist"})
     * @ORM\JoinColumn(name="active_version_id", referencedColumnName="id", onDelete="SET NULL")
     */
    private $version;

    /**
     * @var ArrayCollection $versions
     *
     * @ORM\OneToMany(targetEntity="Version", mappedBy="translation")
     * @ORM\OrderBy({"id" = "DESC"})
     */
    private $versions;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->versions = new ArrayCollection();
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
     * Set locale
     *
     * @param string $locale
     *
     * @return Translation
     */
    public function setLocale($locale = null)
    {
        $this->locale = $locale;

        return $this;
    }

    /**
     * Get locale
     *
     * @return string
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * Set node
     *
     * @param Item $item
     *
     * @return Translation
     */
    public function setItem(Item $item = null)
    {
        $this->item = $item;

        return $this;
    }

    /**
     * Get node
     *
     * @return Item
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * Set version
     *
     * @param Version $version
     *
     * @return Translation
     */
    public function setVersion(Version $version = null)
    {
        $this->version = $version->setTranslation($this);

        return $this;
    }

    /**
     * Get version
     *
     * @return Version
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Add versions
     *
     * @param Version $versions
     *
     * @return Translation
     */
    public function addVersion(Version $versions)
    {
        $this->versions[] = $versions;

        return $this;
    }

    /**
     * Remove versions
     *
     * @param Version $versions
     */
    public function removeVersion(Version $versions)
    {
        $this->versions->removeElement($versions);
    }

    /**
     * Get versions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVersions()
    {
        return $this->versions;
    }
}
