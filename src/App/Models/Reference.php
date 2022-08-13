<?php

namespace App\Models;

require_once __DIR__ . '/../../Core/Parameters.php';

use Core\Parameters;

class Reference
{
    public $reference = null;
    public $date_purchased = null;
    public $date_transfer_requested = null;
    public $is_private = null;
    public $owner_proof = null;
    public $owner_province = null;
    public $owner_purchaser = null;
    public $date_created = null;
    public $date_updated = null;

    public function __construct($data = null)
    {
        if($data) {
            $this->load($data);
        }
    }

    public function load($data)
    {
        $data = new Parameters($data);

        $this->reference = $data->getInt('reference');
        $this->date_purchased = new \DateTime($data->getString('date_purchased'));
        $this->date_transfer_requested = new \DateTime($data->getString('date_transfer_requested'));
        $this->is_private = $data->getString('is_private');
        $this->owner_proof = $data->getString('owner_proof');
        $this->owner_province = $data->getString('owner_province');
        $this->owner_purchaser = $data->getString('owner_purchaser');
        $this->date_created = new \DateTime($data->getString('date_created'));
        $this->date_updated = new \DateTime($data->getString('date_updated'));
    }

    /**
     * @return null
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @param null $reference
     */
    public function setReference($reference): void
    {
        $this->reference = $reference;
    }

    /**
     * @return null
     */
    public function getDatePurchased()
    {
        return $this->date_purchased;
    }

    /**
     * @param null $date_purchased
     */
    public function setDatePurchased($date_purchased): void
    {
        $this->date_purchased = $date_purchased;
    }

    /**
     * @return null
     */
    public function getDateTransferRequested()
    {
        return $this->date_transfer_requested;
    }

    /**
     * @param null $date_transfer_requested
     */
    public function setDateTransferRequested($date_transfer_requested): void
    {
        $this->date_transfer_requested = $date_transfer_requested;
    }

    /**
     * @return null
     */
    public function getIsPrivate()
    {
        return $this->is_private;
    }

    /**
     * @param null $is_private
     */
    public function setIsPrivate($is_private): void
    {
        $this->is_private = $is_private;
    }

    /**
     * @return null
     */
    public function getOwnerProof()
    {
        return $this->owner_proof;
    }

    /**
     * @param null $owner_proof
     */
    public function setOwnerProof($owner_proof): void
    {
        $this->owner_proof = $owner_proof;
    }

    /**
     * @return null
     */
    public function getOwnerProvince()
    {
        return $this->owner_province;
    }

    /**
     * @param null $owner_province
     */
    public function setOwnerProvince($owner_province): void
    {
        $this->owner_province = $owner_province;
    }

    /**
     * @return null
     */
    public function getOwnerPurchaser()
    {
        return $this->owner_purchaser;
    }

    /**
     * @param null $owner_purchaser
     */
    public function setOwnerPurchaser($owner_purchaser): void
    {
        $this->owner_purchaser = $owner_purchaser;
    }

    /**
     * @return null
     */
    public function getDateCreated()
    {
        return $this->date_created;
    }

    /**
     * @param null $date_created
     */
    public function setDateCreated($date_created): void
    {
        $this->date_created = $date_created;
    }

    /**
     * @return null
     */
    public function getDateUpdated()
    {
        return $this->date_updated;
    }

    /**
     * @param null $date_updated
     */
    public function setDateUpdated($date_updated): void
    {
        $this->date_updated = $date_updated;
    }



}
