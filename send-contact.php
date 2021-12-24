<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

<?php

require __DIR__ . '/vendor/autoload.php';

if(isset($_POST['phone'])) {

  try {

    $subdomain = 'mrroman07';
    $login     = 'mr.roman-07@ya.ru';
    $apikey    = 'd7292ab0992f9562affb42dc13a60f9d760d58ea';

    $amo = new \AmoCRM\Client($subdomain, $login, $apikey);

    $lead = $amo->lead;

    $lead['price'] = $_POST['price'];
    $id = $lead->apiAdd();


    $contact = $amo->contact;
    $params = ['query' => $_POST['email']];
    $find_contact = $contact->apiList($params);

    if (empty($find_contact)) {
        $contact['name'] = isset($_POST['name']) ? $_POST['name'] : 'Не указано';
        $contact['linked_leads_id'] = [(int)$id];

        $contact->addCustomField(369065, [
                [$_POST['phone'], 'WORK'],
        ]);

        $contact->addCustomField(369067, [
                [$_POST['email'], 'PRIV'],
        ]);

        $id = $contact->apiAdd();

    } else {
        $leads_id = $find_contact[0]['linked_leads_id'];
        $leads_id[] = $id;
        $contact['linked_leads_id'] = $leads_id;
        $contact->apiUpdate($find_contact[0]['id']);
      }

  } catch (\AmoCRM\Exception $e) {
      printf('Error (%d): %s' . PHP_EOL, $e->getCode(), $e->getMessage());
  }

}

?>


    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Ваша заявка успешно отправлена</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'IBM Plex Sans', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 20px;
            padding: 20px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title">
            <br><span style="font-size:33px;font-weight:500;">Спасибо!</span><br><br>
            Ваша заявка успешно отправлена.<br>

            <?php if(isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER']) { ?>
                <br><br><a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" style="text-decoration: none; border-bottom: 1px dotted">Вернуться назад</a>
             <?php } ?>
        </div>
    </div>
</div>

</body>
</html>
