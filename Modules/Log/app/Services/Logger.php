<?php

namespace Modules\Log\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log as FacadesLog;
use Modules\Log\Models\Log;

class Logger
{
    public function db($model, $action, $message = null, $modelId = null)
    {
        Log::create([
            'model' => is_string($model) ? $model : class_basename($model),
            'model_id' => $modelId ?? (is_object($model) ? $model->id : null),
            'action' => $action,
            'message' => $message,
            'user_id' => Auth::id(),
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'url' => request()->fullUrl(),
            'method' => request()->method(),
            'changes' => json_encode($model->getChanges()),
        ]);
    }

    public function file($action, $message, $context = [])
    {
        FacadesLog::info($action, array_merge(['message' => $message], $context));
    }

    public function both($model, $action, $message = null, $modelId = null, $context = [])
    {
        $this->db($model, $action, $message, $modelId);
        $this->file($action, $message, $context);
    }
}
