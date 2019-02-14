<?php

session_start();

if (empty($_SESSION['pharmacie_id']) && empty($_SESSION['pharmacie_name']))
  header('Location: ./');

?>


<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Dermopik | Questionnaire</title>

       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
       <link rel="shortcut icon" href="img/dermopik.ico">

        <style>
            .wizard {
            margin: 20px auto;
            background: #fff;
            }

            .wizard .nav-tabs {
            position: relative;
            margin: 40px auto;
            margin-bottom: 0;
            border-bottom-color: #e0e0e0;
            }

            .wizard > div.wizard-inner {
            position: relative;
            }

            .connecting-line {
            height: 2px;
            background: #e0e0e0;
            position: absolute;
            width: 80%;
            margin: 0 auto;
            left: 0;
            right: 0;
            top: 50%;
            z-index: 1;
            }

            .wizard .nav-tabs > li.active > a, .wizard .nav-tabs > li.active > a:hover, .wizard .nav-tabs > li.active > a:focus {
            color: #555555;
            cursor: default;
            border: 0;
            border-bottom-color: transparent;
            }

            span.round-tab {
            width: 70px;
            height: 70px;
            line-height: 70px;
            display: inline-block;
            border-radius: 100px;
            background: #fff;
            border: 2px solid #e0e0e0;
            z-index: 2;
            position: absolute;
            left: 0;
            text-align: center;
            font-size: 25px;
            }
            span.round-tab i{
            color:#555555;
            }
            .wizard li.active span.round-tab {
            background: #fff;
            border: 2px solid #008c15;

            }
            .wizard li.active span.round-tab i{
            color: #008c15;
            }

            span.round-tab:hover {
            color: #333;
            border: 2px solid #333;
            }

            .wizard .nav-tabs > li {
            width: 16%;
            }

            .wizard li:after {
            content: " ";
            position: absolute;
            left: 46%;
            opacity: 0;
            margin: 0 auto;
            bottom: 0px;
            border: 5px solid transparent;
            border-bottom-color: #008c15;
            transition: 0.1s ease-in-out;
            }
            .wizard li.active:after {
            content: " ";
            position: absolute;
            left: 46%;
            opacity: 1;
            margin: 0 auto;
            bottom: 0px;
            border: 10px solid transparent;
            border-bottom-color: #008c15;
            }

            .wizard .nav-tabs > li a {
            width: 70px;
            height: 70px;
            margin: 20px auto;
            border-radius: 100%;
            padding: 0;
            }

            .wizard .nav-tabs > li a:hover {
            background: transparent;
            }

            .wizard .tab-pane {
            position: relative;
            padding-top: 50px;
            }
            .wizard .tab-pane > ul {
                position: relative;
                text-align: center
            }

            .wizard h3 {
            margin-top: 0;
            text-align: center;
            }
            .wizard p {
                text-align: center;
            }
            oui {
            background: #008c15
            }

            a {
                color: #008c15;
            }

            @media( max-width : 585px ) {
            https://bootsnipp.com/snippets/featured/form-wizard-using-tabs
                .wizard {
                width: 90%;
                height: auto !important;
                }

                span.round-tab {
                font-size: 16px;
                width: 50px;
                height: 50px;
                line-height: 50px;
                }

                .wizard .nav-tabs > li a {
                width: 50px;
                height: 50px;3.1.0/css/bootstrap.min.css
                line-height: 50px;
                }
                .wizard li.active:after {
                content: " ";
                position: absolute;
                left: 35%;
                }
            }

            .write-score {
                color: #008c15;
                font-size: 32px;
            }
        </style>

    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="text-center">
                    <img src="./img/logo/dermopik.gif" height="150" alt="Logo Dermopik">
                </div>
            </div>
        </div>
        <div class="container">
        	<div class="row">
        		<section>
              <form action="php/sendmail.php" method="POST">

                <div class="row">
                    <div class="col-sm-6">
                        <h3>Votre score</h3>
                        <p class="write-score text-center">
                          <?php
                            if (isset($_SESSION['form_result']))
                              echo $_SESSION['form_result'] . '%';
                           ?>
                        </p>
                        <div class="text-center">
                            <button type="button" class="btn btn-success">Imprimer en PDF</button>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                          <label for="email" class="col-2 col-form-label">Votre mail</label>
                          <div class="col-4">
                            <input class="form-control" type="email" for="email" name="email">
                          </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success">Envoyer résultat par mail</button>
                        </div>
                    </div>
                </div>

              </form>
            </section>
           </div>
        </div>
    </body>
</html>
