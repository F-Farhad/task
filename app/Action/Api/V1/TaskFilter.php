<?php

namespace App\Action\Api\V1;

use App\Enums\EnumStatus;
use App\Models\Task;
use Illuminate\Validation\Rule;

class TaskFilter {

    public function handle(): array
    {
        $data = request()->validate([
            'startDate' => 'nullable|date_format:Y-m-d',
            'endDate' => 'nullable|date_format:Y-m-d',
            'status' => [Rule::enum(EnumStatus::class)],
        ]);

        $startDate = $data['startDate'] ?? date('1970-01-01');
        $endDate = $data['endDate'] ?? date('Y-m-d', strtotime(date('Y-m-d') . ' +1 day'));
        $status = $data['status'] ?? EnumStatus::ACTIVE->value;

        return Task::query()
            ->where('created_at', '>=', $startDate.' 00:00:00')
            ->where('created_at', '<=', $endDate.' 00:00:00')
            ->where('status', '=', $status)
            ->get()->all();
    }
}
