# Исходники со статьи: Пародия на SPA приложение, без JS фреймворков и потери SEO в Bitrix

**Инструкция:**

1. Склонить проект в корневую папку.
2. Зайди в header.php и добавить компонент с роутингом и передать параметры (код ниже)
3. Зайти в footer.php и закрыть div который мы не закрыли в header.php
4. Играйтесь)

```
<?php

$APPLICATION->IncludeComponent(
    "test:routing",
    ".default", [
        'ROUTES' => [
            [
                "PATH" => "/secondroute/",
                "NAME" => 'Второй путь',
                "COMPONENT" => [
                    "NAME" => 'test:second',
                    "TEMPLATE" => '.default',
                    "PARAMS" => [
                        "TITLE" => "hello from second route",
                    ],
                ]
            ],
            [
                "PATH" => "/firstroute/",
                "NAME" => 'Первый путь',
                "COMPONENT" => [
                    "NAME" => 'test:first',
                    "TEMPLATE" => '.default',
                    "PARAMS" => [
                        "TITLE" => "hello from first route",
                    ],
                ]
            ],
        ]
    ],
    false
);

?>

<div id="content">
```
