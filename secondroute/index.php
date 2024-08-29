<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->IncludeComponent(
    "test:second",
    ".default", [
      "TITLE" => "hello from second route",
    ],
    false
);

?>