<?php

namespace App\Repositories;

use App\Models\Task;

class TaskRepository implements TaskRepositoryInterface
{
    public function setApiData($bodyData,$type): bool
    {
        $result = false;

        if($type == 1){
            $result = $this->getApiDataOne($bodyData);
        }elseif($type == 2){
            $result = $this->getApiDataTwo($bodyData);
        }

        return $result;
    }

    public function getApiDataOne($bodyData): bool
    {
        $newTask = [];
        foreach ($bodyData as $task){
            $newTask[] = [
                'task_name' => $task->id,
                'task_time' => $task->sure,
                'task_level' => $task->zorluk
            ];
        }
        return $this->taskCreate($newTask);
    }

    public function getApiDataTwo($bodyData): bool
    {
        $newTask = [];
        foreach ($bodyData as $items){
            foreach ($items as $taskName => $task){
                $newTask[] = [
                    'task_name' => $taskName,
                    'task_time' => $task->estimated_duration,
                    'task_level' => $task->level
                ];
            }
        }
        return $this->taskCreate($newTask);
    }

    public function taskCreate($arrayData): bool
    {
        if(Task::insert($arrayData)){
            return true;
        }else{
            return false;
        }
    }
}
