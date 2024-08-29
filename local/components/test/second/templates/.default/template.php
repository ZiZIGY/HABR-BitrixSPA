<div class="container">
  <form class="base-form">
    <header class="base-form__header">
      form - <?=$arResult['TITLE']?>
    </header>
    <div class="base-form__field">
      <label for="username">
        Username:
      </label>
      <input id="username" class="base-form__input" type="text" name="username">
    </div>
    <div class="base-form__field">
      <label for="password">
        Username:
      </label>
      <input id="password" class="base-form__input" type="password" name="password">
    </div>
    <footer class="base-form__footer">
      <button class="base-form__button" type="submit">Submit</button>
      <button class="base-form__button" type="reset">Reset</button>
    </footer>
  </form>
</div>