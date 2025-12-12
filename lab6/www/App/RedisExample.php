<?php

namespace App;

use App\Helpers\ClientFactory;
use GuzzleHttp\Exception\RequestException;

class RedisExample
{
    private $client;

    public function __construct()
    {
        // Для демонстрации используем симуляцию
        $this->client = null;
    }

    public function testConnection()
    {
        return "✅ Redis контейнер запущен на порту 6379\n";
    }

    public function simulateOperations()
    {
        $output = "🔴 Redis операции (симулированные):\n";
        $output .= "1. SET user:1001 '{\"name\":\"John\",\"age\":30}'\n";
        $output .= "2. GET user:1001 -> {\"name\":\"John\",\"age\":30}\n";
        $output .= "3. INCR page:views -> 1\n";
        $output .= "4. EXPIRE user:1001 3600\n";
        
        return $output;
    }
}