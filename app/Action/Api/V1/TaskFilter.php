<?php

namespace App\Action\Api\V1;

use App\Enums\EnumStatus;
use App\Models\Task;
use Illuminate\Validation\Rule;

class TaskFilter {

    public function handle(): array
    {
        $data = request()->validate([
            'startDate' => 'nullable|date_format:d-m-Y',
            'endDate' => 'nullable|date_format:d-m-Y',
            'status' => [Rule::enum(EnumStatus::class)],
        ]);

        $startDate = $data['start'] ?? date('1970-01-01');
        $endDate = $data['endDate'] ?? date('Y-m-d');
        $status = $data['status'] ?? EnumStatus::ACTIVE->value;

        return Task::query()
            ->whereDate('created_at', '>=', $startDate)
            ->whereDate('created_at', '<=', $endDate)
            ->where('status', '=', $status)
            ->get()->all();
    }
}
