<?php

namespace App;

use App\Helpers\ClientFactory;
use GuzzleHttp\Exception\RequestException;

class ElasticExample
{
    private $client;
    private $index = 'news';

    public function __construct()
    {
        $this->client = ClientFactory::make('http://elasticsearch:9200/');
    }

    public function testConnection()
    {
        try {
            $response = $this->client->get('');
            return "✅ Elasticsearch подключен\n";
        } catch (RequestException $e) {
            return "❌ Elasticsearch недоступен\n";
        }
    }

    public function createNewsIndex()
    {
        return "ℹ️ Индекс 'news' будет создан при первом добавлении\n";
    }

    public function simulateNewsOperations()
    {
        $output = "🔍 Elasticsearch операции (симулированные):\n";
        $output .= "1. Создание индекса 'news'\n";
        $output .= "2. Добавление новости: {\"title\":\"Лабораторная работа №6\",\"author\":\"Артём Крупачев\"}\n";
        $output .= "3. Поиск по слову 'лабораторная' -> найдено 1 новость\n";
        $output .= "4. Получение статистики: 3 новости в индексе\n";
        
        return $output;
    }
}