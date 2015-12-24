<?php

namespace Defacto\Bundle\ExampleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Version
 *
 * @ORM\Table(name="df_version")
 * @ORM\Entity()
 */
class Version
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
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var Translation $translation
     *
     * @ORM\ManyToOne(targetEntity="Translation", inversedBy="versions")
     * @ORM\JoinColumn(name="translation_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $translation;

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
     * Set nodeTranslation
     *
     * @param Translation $translation
     *
     * @return Version
     */
    public function setTranslation(Translation $translation = null)
    {
        $this->translation = $translation;

        return $this;
    }

    /**
     * Get Translation
     *
     * @return Translation
     */
    public function getTranslation()
    {
        return $this->translation;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Version
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->name;
    }
}
