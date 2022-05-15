<?php

namespace App\Repositories;

use App\Models\Todo;

class TodoRepository
{

    public function getTodos($dates, $paginate = false, $perPage = 25)
    {
        $data = Todo::query();
        if ($dates != null) {
            $data = $data->whereBetween('date', [$dates[0], $dates[1]]);
        }

        return $paginate ? $data->paginate($perPage) : $data->get();
    }

}
