<?php

namespace App\Repositories;

interface TaskRepositoryInterface
{
    public function setApiData($bodyData,$type);
    public function getApiDataOne($bodyData);
    public function getApiDataTwo($bodyData);
    public function taskCreate($arrayData);
    public function allTaskGroupBy($groupBy);
}
