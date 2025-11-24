<?php
class Config {
    private static $config = [];
    
    public static function load() {
        $envFile = __DIR__ . '/.env';
        if (file_exists($envFile)) {
            $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            foreach ($lines as $line) {
                if (strpos(trim($line), '#') === 0) continue;
                if (strpos($line, '=') !== false) {
                    list($key, $value) = explode('=', $line, 2);
                    self::$config[trim($key)] = trim($value);
                }
            }
        }
        
        // Set default values
        self::$config = array_merge([
            'SMTP_HOST' => 'mail.myxenpay.finance',
            'SMTP_PORT' => 465,
            'SMTP_ENCRYPTION' => 'ssl',
            'FROM_EMAIL' => 'noreply.bill@myxenpay.finance',
            'FROM_NAME' => 'MyxenPay Bill',
            'ALLOWED_ORIGINS' => '*',
            'RATE_LIMIT_REQUESTS' => 10,
            'RATE_LIMIT_TIME' => 300,
            'APP_ENV' => 'production',
            'APP_DEBUG' => false
        ], self::$config);
    }
    
    public static function get($key, $default = null) {
        return self::$config[$key] ?? $default;
    }
}

// Load configuration
Config::load();
?>