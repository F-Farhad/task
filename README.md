<h1>Tasks</h1>
Зависимости
<ul>
<li>PHP 8.1</li>
<li>composer</li>
<li>SQLite или своя бд</li>
</ul>

Как развернуть
<ul>
<li>Клонируйте проект</li>
<li>composer install</li>
<li>Настройте подключение к БД</li>
<li>Сгенерируйте ключ для env файла</li>
<li>Запустите миграцию</li>
<li>Запустите seed</li>
</ul>

<p>
Что бы получить все задачи до 28 числа, следует указать следующий день 29ашч
</p>
Поддерживаемые запросы
<ul>
<li>http://127.0.0.1:8000/api/V1/tasks?status=reject - поиск по всем задач за все время</li>
<li>http://127.0.0.1:8000/api/V1/tasks?startDate=Y-m-d - с какого числа начинаем поиск, если не указать по какое число, будет искать по текущее число, если не указать статус будет искать только активные</li>
<li>http://127.0.0.1:8000/api/V1/tasks?endDate=Y-m-d - по какое число</li>
<li>http://127.0.0.1:8000/api/V1/tasks?startDate=2024-02-28&endDate=2024-02-29&status=reject</li>
</ul>

Тип статусов
<ul>
<li>active (активная)</li>
<li>done (завершена)</li>
<li>check (проверяется)</li>
<li>reject (отклонена)</li>
<li>cancelled (отменена)</li>
</ul>

