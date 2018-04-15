<?php

namespace MyFrontendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContactDetails
 *
 * @ORM\Table(name="contact_details", indexes={@ORM\Index(name="IX_contact_details_1", columns={"is_deleted"}), @ORM\Index(name="IX_contact_details_2", columns={"is_deleted", "value"}), @ORM\Index(name="FK_contact_details_1", columns={"contact_id"}), @ORM\Index(name="FK_contact_details_2", columns={"field_type_id"})})
 * @ORM\Entity
 */
class ContactDetails
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_deleted", type="boolean", nullable=false)
     */
    private $isDeleted;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="string", length=255, nullable=true)
     */
    private $value;

    /**
     * @var \Contacts
     *
     * @ORM\ManyToOne(targetEntity="Contacts")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="contact_id", referencedColumnName="id")
     * })
     */
    private $contact;

    /**
     * @var \FieldTypes
     *
     * @ORM\ManyToOne(targetEntity="FieldTypes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="field_type_id", referencedColumnName="id")
     * })
     */
    private $fieldType;



    /**
     * Set isDeleted
     *
     * @param boolean $isDeleted
     * @return ContactDetails
     */
    public function setIsDeleted($isDeleted)
    {
        $this->isDeleted = $isDeleted;

        return $this;
    }

    /**
     * Get isDeleted
     *
     * @return boolean 
     */
    public function getIsDeleted()
    {
        return $this->isDeleted;
    }

    /**
     * Set value
     *
     * @param string $value
     * @return ContactDetails
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string 
     */
    public function getValue()
    {
        return $this->value;
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
     * Set fieldType
     *
     * @param \MyFrontendBundle\Entity\FieldTypes $fieldType
     * @return ContactDetails
     */
    public function setFieldType(\MyFrontendBundle\Entity\FieldTypes $fieldType = null)
    {
        $this->fieldType = $fieldType;

        return $this;
    }

    /**
     * Get fieldType
     *
     * @return \MyFrontendBundle\Entity\FieldTypes 
     */
    public function getFieldType()
    {
        return $this->fieldType;
    }

    /**
     * Set contact
     *
     * @param \MyFrontendBundle\Entity\Contacts $contact
     * @return ContactDetails
     */
    public function setContact(\MyFrontendBundle\Entity\Contacts $contact = null)
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * Get contact
     *
     * @return \MyFrontendBundle\Entity\Contacts 
     */
    public function getContact()
    {
        return $this->contact;
    }

    public function __toString()
    {
        $s = $this->getFieldType();

        return "$s";
    }

}
