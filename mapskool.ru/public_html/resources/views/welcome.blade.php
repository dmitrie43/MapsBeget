<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link rel="shortcut icon" href="favicon/favicon.ico" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet" />

    <link rel="stylesheet" href="css/style.bundle.css" />

    <title>Интерактивная карта</title>
  </head>
  <body>
    <div class="container-main">
      <div class="title-block">
        <h1 class="title-map">
          Интерактивная карта школ, обеспечивающих развитие мордовского этнокультурного компонента в рамках
          образовательного процесса
        </h1>
      </div>
      <div class="container-map container-map-md">
        <div class="wrapper">
          <div id="map"></div>
        </div>
      </div>

      <div class="block-area"></div>

      <div class="footer-map">
        <div class="block-text">
          <div class="copyright">© 2019</div>

          <div class="names">
            <span class="block-name">Прохорова С.Ю.</span>, <span class="block-name">Еливанов Д.А.</span>,
            <span class="block-name">Ефимов Д.О.</span>
          </div>
          <div class="block-org">КЭИ УлГТУ</div>
        </div>
      </div>
    </div>
    <section class="overlay" aria-hidden="true">
      <div class="popup">
        <span class="close">X</span>
        <h2 class="area-name">Район</h2>

        <div class="content"></div>
      </div>
    </section>

    <script src="js/bundle.js"></script>
  </body>
</html>
