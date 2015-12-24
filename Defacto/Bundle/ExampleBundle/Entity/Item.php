<?php

namespace Defacto\Bundle\ExampleBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Oro\Bundle\EntityConfigBundle\Metadata\Annotation\Config;

/**
 * Page
 *
 * @ORM\Table(name="df_item")
 * @ORM\Entity()
 * @Config(
 *    defaultValues={
 *        "security"={
 *            "type"="ACL",
 *            "permissions"="All"
 *        }
 *    }
 * )
 */
class Item
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
     * @var ArrayCollection $translations
     *
     * @ORM\OneToMany(targetEntity="Translation", mappedBy="item", cascade={"persist"}, fetch="EXTRA_LAZY")
     */
    protected $translations;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->translations = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->getId();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function addTranslation(Translation $translation)
    {
        $this->translations[] = $translation->setNode($this);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function removeTranslation(Translation $translation)
    {
        $this->translations->removeElement($translation);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getTranslations()
    {
        return $this->translations;
    }

    /**
     * {@inheritdoc}
     */
    public function getTranslationByLocale($locale)
    {
        foreach ($this->getTranslations() as $translation) {
            if ($translation->getLocale() === $locale) {
                return $translation;
            }
        }

        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getActiveVersion($locale = null)
    {
        if (!is_null($locale)) {
            $translation = $this->getTranslationByLocale($locale);
            if (!is_null($translation)) {
                return $translation->getVersion();
            }
        }

        return $this->getTranslations()->first()->getVersion();
    }
}