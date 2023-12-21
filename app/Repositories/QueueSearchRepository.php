<?php

namespace App\Repositories;
use App\Models\QueueSearch;


class QueueSearchRepository extends BaseRepository
{
    /**
     * Summary of getModel
     * @return mixed
     */
    public function getModel()
    {
        return QueueSearch::class;
    }
}
