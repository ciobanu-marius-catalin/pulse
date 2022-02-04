<?php

namespace Antiferno\Data;

/**
 * @HasLifecycleCallbacks
 */
class DataObject
{
	/**
	 * @Id 
	 * @Column(type="bigint", name="ID")
	 * @GeneratedValue
	 */
	protected $id;

	/** @Column(type="datetime", name="CreatedAt") */
	protected $createdAt;

	/** @Column(type="datetime", name="UpdatedAt") */
	protected $updatedAt;

	/** @Column(type="bigint", name="CreatedBy") */
	protected $createdBy;

	/** @Column(type="bigint", name="UpdatedBy") */
	protected $updatedBy;
    
    /** @Column(type="integer", name="Deleted") */
	protected $deleted;

	/** @PrePersist */
	public function prePersist() {
		$CI =& get_instance();

		
		$this->createdBy = $CI->getUser()->getId();
		$this->updatedBy = $CI->getUser()->getId();

        $this->deleted=0;

		$now = new \DateTime();
		$this->createdAt = $now;
		$this->updatedAt = $now;
	}

	/** @PreUpdate */
	public function preUpdate() {
		$CI =& get_instance();

		$this->updatedBy = $CI->getUser()->getId();
		$this->updatedAt = new \DateTime();
	}

	/**
	 * @return int
	 */
	public function getId() {
		return $this->id;
	}
	
	/**
	 * @return int
	 */
	public function getDeleted() {
		return $this->deleted;
	}

	public function setDeleted($deleted) {
		$this->deleted = $deleted;
	}

	public function toArray() {
		$result = [];
		
		$class = new \ReflectionClass($this);
		
		$properties = $class->getProperties();

		foreach($properties as $property) {
			/** @var ReflectionProperty $property */
			if( ! $property->isPublic() )
				$property->setAccessible(true);

			$value = $property->getValue($this);
			if( $value instanceof \DateTime )
				$value = $value->format('Y-m-d H:i:s');

			$comment = $property->getDocComment();

			if( strpos($comment, '@Column') !== false )
				$result[$property->getName()] = $value;
		}

		return $result;
	}
}
