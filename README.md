<h1>Тестовое задание Alef </h1>
<p>Тестовое задание сделано на Laravel</p>
<p>Работа с данными реализована через Eloquent.<br>
Студенты, классы и лекции хранятся в соответствующих таблицах (students, classes, lections).<br>
Есть дополнительная таблица study_plans(class_id, lection_id, lection_order), которая содержит связи классов и лекций (многие ко многим). Я предположил, что у одного класса есть один учебный план, в котором можно менять состав лекций и их порядок.</p>

<p>Входящие данные валидируются.<br>
Исключения обрабатываются в классе app/Exceptions/Handler.<br></p>

## Приложения
<p>В папке attachments прилагаются дамп базы данных прилагается и примеры запросов к api </p>
