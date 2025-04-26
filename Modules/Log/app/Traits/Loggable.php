<?php

namespace Modules\Log\Traits;

use Illuminate\Support\Facades\Auth;
use Modules\Log\Models\Log;

trait Loggable
{
    protected static function bootLoggable()
    {
        static::created(function ($model) {
            self::createLog($model, 'store', 'A new record has been created');
        });

        static::updated(function ($model) {
            self::createLog($model, 'update', 'Record updated');
        });

        static::deleted(function ($model) {
            self::createLog($model, 'delete', 'Record deleted');
        });
    }

    public static function createLog($model, $action, $message = null)
    {
        $changes = json_encode($model->getChanges());

        if (empty($changes)) {
            $changes = json_encode(['message' => 'No changes made']);
        }

        Log::create([
            'model' => class_basename($model),
            'model_id' => $model->id,
            'action' => $action,
            'message' => $message,
            'user_id' => Auth::id(),
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'url' => request()->fullUrl(),
            'method' => request()->method(),
            'changes' => $changes,
        ]);
    }

    public function logError($message)
    {
        self::createLog($this, 'error', $message);
    }
}
