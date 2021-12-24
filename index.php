<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Отправка формы в AmoCRM</title>
  <link rel="stylesheet" href="css/head.css">
  <link href="style.css" rel="stylesheet">
</head>
<body align="center">
  <div class="wrapper">
    <form id="index-formModalDownload" action="send-contact.php" method="POST" class="form formModal-form">

      <h1 class="form-title formModal-form__title">ЗАЯВКА</h1>


      <div class="form-box form-box__name formModal-form-box__name">
        <label for="formModal__name" class="form-label form-label__name formModal-label__name">Имя:</label>
        <input id="formModal__name" type="text" name="name" class="form-input form-input__name formModal-input__name" placeholder="Роман" required>
      </div>
      <!-- /.form-box__name -->

      <div class="form-box form-box__email formModal-form-box__email">
        <label for="formModal__email" class="form-label form-label__email  formModal-label__email">Email:</label>
        <input id="formModal__email" type="email" name="email" class="form-input form-input__email formModal-input__email" placeholder="E-mail" required>
      </div>
      <!-- /.form-box__email -->

      <div class="form-box form-box__phone formModal-form-box__phone">      
        <label for="formModal__phone" class="form-label form-label__phone  formModal-label__phone">Контактный телефон:</label>
        <input id="formModal__phone" type="tel" name="phone" class="form-input form-input__phone formModal-input__phone" placeholder="+ 7 (495) 000-00-00" required>
      </div>
      <!-- /.form-box__phone -->

        <div class="form-box form-box__phone formModal-form-box__phone">
            <label for="formModal__phone" class="form-label form-label__phone  formModal-label__phone">Цена:</label>
            <input id="formModal__phone" type="tel" name="price" class="form-input form-input__phone formModal-input__phone" placeholder="1000" required>
        </div>

      <div class="form-box form-box__button formModal-form-box__button">  
        <input type="hidden" name="utm_source" value="<?php echo $_GET['utm_source']?>">
        <input type="hidden" name="utm_medium" value="<?php echo $_GET['utm_medium']?>">
        <input type="hidden" name="utm_campaign" value="<?php echo $_GET['utm_campaign']?>">
        <input type="hidden" name="utm_content" value="<?php echo $_GET['utm_content']?>">
        <input type="hidden" name="utm_term" value="<?php echo $_GET['utm_term']?>">
        <button type="submit" class="button form-button " >оставить заявку</button>
      </div>
      <!-- /.form-box__button -->

    </form>
  </div>
</body>
</html>