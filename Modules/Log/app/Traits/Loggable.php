<?php

namespace Modules\Log\Traits;

use Illuminate\Support\Facades\Auth;
use Modules\Log\Models\Log;

trait Loggable
{
    protected static function bootLoggable()
    {
        static::created(function ($model) {
            self::createLog($model, 'create', 'Yeni bir kayıt oluşturuldu.');
        });

        static::updated(function ($model) {
            self::createLog($model, 'update', 'Kayıt güncellendi.');
        });

        static::deleted(function ($model) {
            self::createLog($model, 'delete', 'Kayıt silindi.');
        });
    }

    public static function createLog($model, $action, $message = null)
    {
        Log::create([
            'model' => class_basename($model),
            'model_id' => $model->id,
            'action' => $action,
            'message' => $message,
            'user_id' => Auth::id(),
        ]);
    }

    public function logError($message)
    {
        self::createLog($this, 'error', $message);
    }
}
