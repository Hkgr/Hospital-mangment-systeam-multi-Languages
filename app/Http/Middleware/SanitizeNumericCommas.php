<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SanitizeNumericCommas
{
    public function handle(Request $request, Closure $next)
    {
        $request->merge($this->sanitizeArray($request->all()));
        return $next($request);
    }

    private function sanitizeArray($data)
    {
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $data[$key] = $this->sanitizeArray($value);
            } elseif (is_string($value)) {
                // Only transform values that become numeric after removing commas
                if (strpos($value, ',') !== false) {
                    $noCommas = str_replace(',', '', $value);
                    // Accept numbers with optional leading sign and decimal point
                    if (is_numeric($noCommas)) {
                        $data[$key] = $noCommas;
                    }
                }
            }
        }
        return $data;
    }
}

