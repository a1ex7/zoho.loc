<?php

namespace App\Observers;

use App\Deal;
use App\Services\ZohoService;

/**
 * Class DealObserver
 * @package App\Observers
 */
class DealObserver
{

    private $zoho;

    public function __construct(ZohoService $zoho)
    {
        $this->zoho = $zoho;
    }

    /**
     * Listen to the Deal saved event.
     *
     * @param Deal $deal
     */
    public function saved(Deal $deal)
    {
        $this->zoho->setTask(
            'Первый звонок: ' . $deal->name,
            $deal->date,
            $deal->status
        );
    }
}