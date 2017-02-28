<?php

namespace App\Services;

use CristianPontes\ZohoCRMClient\ZohoCRMClient;


class ZohoService
{

    protected $zohoAuthToken;

    protected $client;


    public function __construct()
    {
        $this->zohoAuthToken = env('ZOHO_AUTH_TOKEN');

        /* In this demo case only 'Tasks' module use */
        $this->client = new ZohoCRMClient('Tasks', $this->zohoAuthToken);
    }


    /**
     * @param $subject
     * @param $date
     * @param $status
     * @return \CristianPontes\ZohoCRMClient\Response\MutationResult[]
     */
    public function setTask($subject, $date, $status)
    {

        $records = $this->client->insertRecords()
            ->setRecords([[
                'Subject'   => $subject,
                'Due Date'  => $date,
                'Status'    => $status,
            ]])
            ->onDuplicateError()
            ->triggerWorkflow()
            ->request();

        return $records;
    }

}
