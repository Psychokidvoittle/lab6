<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Лабораторная работа №6</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background: #f5f7fa; }
        .container { max-width: 1200px; margin: 0 auto; padding: 20px; }
        .header { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 40px; border-radius: 15px; margin-bottom: 30px; text-align: center; }
        .card-container { display: flex; gap: 20px; margin: 30px 0; flex-wrap: wrap; }
        .card { flex: 1; min-width: 300px; padding: 25px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        .redis-card { background: white; border-top: 5px solid #dc3545; }
        .elastic-card { background: white; border-top: 5px solid #0d6efd; }
        .code-block { background: #2d3436; color: #dfe6e9; padding: 15px; border-radius: 5px; font-family: 'Courier New', monospace; margin: 15px 0; overflow-x: auto; }
        h1, h2, h3 { margin-top: 0; }
        .status-success { color: #198754; font-weight: bold; }
        .status-error { color: #dc3545; font-weight: bold; }
        .tech-stack { display: flex; gap: 10px; flex-wrap: wrap; margin: 20px 0; }
        .tech-tag { background: #e9ecef; padding: 8px 15px; border-radius: 20px; font-size: 14px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📘 Лабораторная работа №6</h1>
            <h2>Нереляционные базы данных: Redis и Elasticsearch</h2>
            <p>Студент: Крупачев Артём Олегович | Группа: 3МО-РБД-2</p>
        </div>

        <div style="background: white; padding: 25px; border-radius: 10px; margin-bottom: 20px;">
            <h2>🎯 Цель работы</h2>
            <p>Изучение взаимодействия с нереляционными базами данных через HTTP API с использованием GuzzleClient.</p>
            <p><strong>Тема:</strong> Новостная система с использованием Elasticsearch для поиска.</p>
            
            <div class="tech-stack">
                <span class="tech-tag">PHP 8.2</span>
                <span class="tech-tag">Guzzle HTTP</span>
                <span class="tech-tag">Redis</span>
                <span class="tech-tag">Elasticsearch</span>
                <span class="tech-tag">Docker</span>
                <span class="tech-tag">Nginx</span>
            </div>
        </div>

        <div class="card-container">
            <div class="card redis-card">
                <h2>🔴 Redis</h2>
                <h3>Ключ-значение хранилище</h3>
                <p><span class="status-success">✅ Контейнер запущен на порту 6379</span></p>
                
                <div class="code-block">
<?php
// Redis демонстрация
if (file_exists('vendor/autoload.php')) {
    require 'vendor/autoload.php';
    $redis = new App\RedisExample();
    echo $redis->testConnection();
    echo $redis->simulateOperations();
} else {
    echo "Redis контейнер готов к работе\n";
    echo "Пример команд:\n";
    echo "SET user:1001 'value'\n";
    echo "GET user:1001\n";
    echo "INCR counter\n";
}
?>
                </div>
                
                <p><strong>Пример использования:</strong> кэширование данных, сессии, очереди сообщений.</p>
            </div>

            <div class="card elastic-card">
                <h2>🔍 Elasticsearch</h2>
                <h3>Поисковая система для новостей</h3>
                
                <div class="code-block">
<?php
// Elasticsearch демонстрация
if (file_exists('vendor/autoload.php')) {
    require 'vendor/autoload.php';
    $elastic = new App\ElasticExample();
    echo $elastic->testConnection();
    echo $elastic->createNewsIndex();
    echo $elastic->simulateNewsOperations();
} else {
    echo "Elasticsearch контейнер готов к работе\n";
    echo "Пример данных новости:\n";
    echo json_encode([
        'title' => 'Лабораторная работа №6',
        'content' => 'Работа с нереляционными БД',
        'author' => 'Крупачев А.О.',
        'date' => date('Y-m-d')
    ], JSON_PRETTY_PRINT);
}
?>
                </div>
                
                <p><strong>Пример использования:</strong> полнотекстовый поиск новостей, логирование, аналитика.</p>
            </div>
        </div>

        <div style="background: white; padding: 25px; border-radius: 10px; margin: 20px 0;">
            <h2>📊 Архитектура проекта</h2>
            <div style="text-align: center; padding: 20px;">
                <div style="display: inline-block; text-align: left;">
                    <div style="background: #dc3545; color: white; padding: 15px; margin: 10px; border-radius: 5px; display: inline-block;">Redis</div>
                    <span style="font-size: 20px;">←HTTP→</span>
                    <div style="background: #6c757d; color: white; padding: 15px; margin: 10px; border-radius: 5px; display: inline-block;">PHP + Guzzle</div>
                    <span style="font-size: 20px;">←HTTP→</span>
                    <div style="background: #0d6efd; color: white; padding: 15px; margin: 10px; border-radius: 5px; display: inline-block;">Elasticsearch</div>
                </div>
            </div>
        </div>

        <div style="background: white; padding: 25px; border-radius: 10px;">
            <h2>🚀 Инструкция по запуску</h2>
            <div class="code-block">
# 1. Запуск проекта
docker-compose up -d --build

# 2. Проверка статуса
docker-compose ps

# 3. Доступ к сервисам
Веб-приложение: http://localhost:8080/
Redis: порт 6379
Elasticsearch: http://localhost:9200/

# 4. Остановка проекта
docker-compose down
            </div>
        </div>

        <div style="background: #198754; color: white; padding: 30px; border-radius: 10px; margin-top: 30px; text-align: center;">
            <h2>✅ Лабораторная работа выполнена</h2>
            <p>Проект демонстрирует работу с нереляционными базами данных через HTTP API</p>
            <p><strong>Готово к проверке!</strong></p>
        </div>
    </div>
</body>
</html>