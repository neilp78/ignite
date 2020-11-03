<?php
  require_once('../includes/config.php');
  if(!$user->is_logged_in()){ header('Location: login.php'); }

  //if(isset($_POST['build'])) {
    try {

      $stmt = $db->query('SELECT postID, postTitle, postSlug, postCont, postDate FROM blog_posts_seo');
      while($row = $stmt->fetch()){

        echo $row['postTitle'].'<br/>';

        echo $row['postID'].'<br/>';
        echo $row['postSlug'].'<br/>';
        echo $row['postCont'].'<br/>';

        $myfile = fopen("prototypes/".$row['postSlug'].".html", "w") or die("Unable to open file!");


        $txt = '<head>
                  <meta charset="utf-8">
                  <title>HSC - Help us trace your contacts</title>
                  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
                  <meta name="theme-color" content="#0b0c0c">

                  <meta http-equiv="X-UA-Compatible" content="IE=edge">

                  <link rel="shortcut icon" sizes="16x16 32x32 48x48" href="/assets/images/favicon.ico" type="image/x-icon">
                  <link rel="mask-icon" href="/assets/images/govuk-mask-icon.svg" color="#0b0c0c">
                  <link rel="apple-touch-icon" sizes="180x180" href="">
                  <link rel="apple-touch-icon" sizes="167x167" href="">
                  <link rel="apple-touch-icon" sizes="152x152" href="">
                  <link rel="apple-touch-icon" href="">
                	<title>'.$row['postTitle'].'</title>
                	<link href="https://fonts.googleapis.com/css?family=Montserrat|Roboto&display=swap" rel="stylesheet">
                	<link rel="stylesheet" href="https://design-system.service.gov.uk/stylesheets/main-b07178b7492834316b609c3eed72f296.css">
                  <link rel="stylesheet" href="override.css">
                	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>

                  <!--[if !IE 8]><!-->
                  <link href="/govuk-frontend/govuk/all.css" rel="stylesheet">
                  <!--<![endif]-->

                  <!--[if IE 8]>
                    <link href="/govuk-frontend/all-ie8.css" rel="stylesheet">
                  <![endif]-->

                  <!--[if lt IE 9]>
                    <script src="/html5-shiv/html5shiv.js"></script>
                  <![endif]-->

                  <meta property="og:image" content="">
                </head>';
        fwrite($myfile, $txt);

        //$txt = '<script src="scripts/jquery-3.3.1.min.js"></script>';
      //  fwrite($myfile, $txt);

        $txt = '<body class="govuk-template__body ">
                  <script>
                    document.body.className = ((document.body.className) ? document.body.className + " js-enabled" : "js-enabled");
                  </script>
                  <a href="#main-content" class="govuk-skip-link">Skip to main content</a>
                  <div class="header" role="banner" data-module="govuk-header">
                      <div class="header-wrapper">
                        <div id="logo"><img src="images/hsc-logo.png" /></div>
                        <div id="masthead">Help us trace your contacts</div>
                      </div>
                  </div>

                	<div id="canvas" class="govuk-width-container">
                   '.$row["postCont"].'
                	</div>


                  <footer class="govuk-footer " role="contentinfo">
                  <div class="inset-image"></div>
                    <div class="govuk-width-container ">
                      <div class="govuk-footer__meta">
                      </div>
                    </div>
                    <div class="footer-menu">
                      <ul>
                        <li>Legal</li>
                        <li>Privacy Policy</li>
                        <li>Cookies</li>
                        <li>Disclaimer</li>
                      </ul>
                      <p>COVID-19 NI © 2020</p>
                    </div>
                  </footer>

                  <script src="scripts/govuk-frontend.js"></script>
                	<script src="scripts/scripts.js"></script>
                </body>
                </html>';
        fwrite($myfile, $txt);
        fclose($myfile);
      }
    } catch(PDOException $e) {
        echo $e->getMessage();
    }
  //}
?>
