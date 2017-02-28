<?php

namespace App\Observers;

use App\Deal;
use App\Services\ZohoService;
use Illuminate\Support\Facades\Session;

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
        $records = $this->zoho->setTask(
            'Первый звонок: ' . $deal->name,
            null,
            $deal->status
        );

        if ($records[1]->isInserted()) {
            Session::flash('message', 'Successfully add Task to CRM');
        } else {
            Session::flash('error', 'Error adding Task to CRM');
        }

    }
}