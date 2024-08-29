<div class="container">
  <?for ($index = 0; $index < 20; $index++):?>
  <div class="base-card" style="animation-delay: <?=$index * 50?>ms;">
    <h3 class="base-card__title"><?=$arResult['TITLE']?></h3>

    <div class="base-card__content">

    </div>
    <div class="base-card__actions">
      <a href="#" class="base-card__link">Подробнее</a>
    </div>
  </div>
  <?endfor?>

</div>