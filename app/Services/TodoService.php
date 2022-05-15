<?php

namespace App\Services;

use App\Repositories\TodoRepository;
use Carbon\Carbon;

class TodoService
{
    private $todoRepo;

    public function __construct(TodoRepository $todoRepo)
    {
        $this->todoRepo = $todoRepo;
    }


    public function getTodos()
    {
        $data = $this->todoRepo->getTodos([], true);
        $data = $data->setCollection($this->todosTranformer($data));

        return $data;
    }

    public function todosTranformer($data)
    {
        return $data->map(function ($item) {
            if ($item->actual_start != null) {
                $item['start_delay'] = Carbon::parse($item->actual_start)->diffInMinutes($item->plan_start);
            } else {
                $item['start_delay'] = 0;
            }

            if ($item->actual_finish != null) {
                $planMinuteTotal = Carbon::parse($item->plan_start)->diffInMinutes($item->plan_finish);
                $actualMinuteTotal = Carbon::parse($item->actual_start)->diffInMinutes($item->actual_finish);

                $item['finish_delay'] = $actualMinuteTotal - $planMinuteTotal;
            } else {
                $item['finish_delay'] = 0;
            }
            return $item;
        });
    }

    public function getSummary($type, $dates)
    {
        switch ($type) {
            case 'all':
                $data = $this->todoRepo->getTodos([]);
                break;
            case 'range':
                $data = $this->todoRepo->getTodos($dates);
                break;
        }


        $data = $this->todosTranformer($data);
        return $this->summaryTransform($data);
    }

    public function summaryTransform($data)
    {
        $summary['total_todo_start_delay'] = $data->where('start_delay', '!=', 0)->count();
        $summary['total_todo_finish_delay'] = $data->where('finish_delay', '!=', 0)->count();
        $summary['total_minute_start_delay'] = $data->sum('start_delay');
        $summary['total_minute_finish_delay'] = $data->sum('finish_delay');

        return $summary;
    }
}
