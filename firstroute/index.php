<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->IncludeComponent(
    "test:first",
    ".default", [
      "TITLE" => "hello from first route",
    ],
    false
);

?>