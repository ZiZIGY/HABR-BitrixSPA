<nav class="routing-wrapper">
  <ul id="routing" class="routing">
    <?php foreach ($arResult['ROUTES'] as $key => $route):?>
    <li class="routing__item">
      <a class="routing__link" data-route="<?=$key?>" href="<?=$route['PATH']?>">
        <?=$route['NAME']?>
      </a>
    </li>
    <?php endforeach?>
  </ul>
</nav>

<div id="content">
  content
</div>

<script>
//Передаем параметры компонента
new BX.Routing(
  <?=$arResult['SIGNED']?>
)
</script>