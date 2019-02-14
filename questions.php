<?php

session_start();

if (empty($_SESSION['pharmacie_id']) && empty($_SESSION['pharmacie_name']))
  header('Location: ./');

// echo $_COOKIE['auth'];
//die();

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

        <script type="text/javascript">

            var q7 = 0;
            var qpic = 0;
            var score = 0;

            $(document).ready(function () {
              //Initialize tooltips
              $('.nav-tabs > li a[title]').tooltip();

              //Wizard
              $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

                var $target = $(e.target);
                if ($target.parent().hasClass('disabled'))
                  return false;
              });

              $(".next-step").click(function (e) {
                if ($('#resQ1oui').hasClass('disabled') && $('#resQ1non').hasClass('disabled'))
                  return ;
                var $active = $('.wizard .nav-tabs li.active');
                $active.next().removeClass('disabled');
                nextTab($active);
              });
              $(".prev-step").click(function (e) {
                var $active = $('.wizard .nav-tabs li.active');
                prevTab($active);
              });

              $('input[type=radio][name=radioSexe]').change(function() {
                $('#inputAge').on('input', function() {
                  $('.inputQ1').removeAttr("disabled");
                  $('.inputQ1').removeClass("disabled");
                  $('.labelQ1').removeClass("disabled");
                });
              });

            });


            function nextTab(elem) {
              $(elem).next().find('a[data-toggle="tab"]').click();
            }
            function prevTab(elem) {
              $(elem).prev().find('a[data-toggle="tab"]').click();
            }

        </script>
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
                <div class="wizard">
                    <div class="wizard-inner">
                        <div class="connecting-line"></div>
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Question 1">
                                    <span class="round-tab">
                                        Q1
                                    </span>
                                </a>
                            </li>
                            <li role="presentation" class="disabled">
                                <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Question 2">
                                    <span class="round-tab">
                                        Q2
                                    </span>
                                </a>
                            </li>
                            <li role="presentation" class="disabled">
                                <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Question 3">
                                    <span class="round-tab">
                                        Q3
                                    </span>
                                </a>
                            </li>
                            <li role="presentation" class="disabled">
                                <a href="#step4" data-toggle="tab" aria-controls="step4" role="tab" title="Question 4">
                                    <span class="round-tab">
                                        Q4
                                    </span>
                                </a>
                            </li>
                            <li role="presentation" class="disabled">
                                <a href="#step5" data-toggle="tab" aria-controls="step5" role="tab" title="Question 5">
                                    <span class="round-tab">
                                        Q5
                                    </span>
                                </a>
                            </li>
                            <li role="presentation" class="disabled">
                                <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Impression">
                                    <span class="round-tab">
                                        <img src="img/line/printer.svg" alt="imprimantes">
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <form role="form" action="php/reponses.php" method="POST">
                        <div class="tab-content">
                            <div class="tab-pane active" role="tabpanel" id="step1">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h3>Sexe</h3>
                                        <form>
                                          <div class="radio">
                                            <label><input type="radio" name="radioSexe" value="femme" id="radioSexeF">Féminin</label>
                                          </div>
                                          <div class="radio">
                                            <label><input type="radio" name="radioSexe" value="homme" id="radioSexeM">Masculin</label>
                                          </div>
                                        </form>
                                    </div>
                                    <div class="col-sm-6">
                                        <h3>Age</h3>
                                        <div class="form-group row">
                                          <div class="col-6">
                                            <input class="form-control" type="number" name="age" id='inputAge'>
                                          </div>
                                        </div>
                                    </div>
                                </div>

                                <p>  Votre peau vous démange-t-elle fréquemment ? </p>
                                <ul class="list-inline pull-center text-center">
                                    <li>
                                      <label for="resQ1oui" class="btn btn-success next-step oui oui1 disabled labelQ1">Oui</label>
                                      <input type="radio" name="repQ1" id="resQ1oui" value="oui" class="inputQ1 disabled" disabled>
                                    </li>
                                    <li>
                                      <label for="resQ1non" type="button" class="btn btn-danger next-step non disabled labelQ1">Non</label>
                                      <input type="radio" name="repQ1" id="resQ1non" value="non" class="inputQ1 disabled" disabled>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="step2">
                                <p>Avez-vous eu une éruption cutanée semblable à celle de l'image ci-dessous sur les plis de vos coudes, derrière vos genoux ou devant vos chevilles ?</p>
                                <ul class="list-inline pull-center text-center">
                                    <li><button type="button" class="btn btn-default prev-step">Précédent</button></li>

                                    <li>
                                      <label for="resQ2oui" type="button" class="btn btn-success next-step oui oui2">Oui</label>
                                      <input type="radio" name="repQ2" id="resQ2oui" value="oui">
                                    </li>

                                    <li>
                                      <label for="resQ2non" type="button" class="btn btn-danger next-step non">Non</label>
                                      <input type="radio" name="repQ2" id="resQ2non" value="non">
                                    </li>
                                </ul>
                                <div class="text-center">
                                    <p class="write-score"></p>
                                    <img src="img/patho/coude.png" height="275"  alt="">
                                </div>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="step3">

                                <p>Avez-vous eu une éruption cutanée semblable à celle de l'image ci-dessous sur le dos de vos mains ?</p>
                                <ul class="list-inline pull-center text-center">
                                    <li><button type="button" class="btn btn-default prev-step">Précédent</button></li>

                                    <li>
                                      <label for="resQ3oui" type="button" class="btn btn-success next-step oui oui3">Oui</label>
                                      <input type="radio" name="repQ3" id="resQ3oui" value="oui">
                                    </li>

                                    <li>
                                      <label for="resQ3non" type="button" class="btn btn-danger next-step non">Non</label>
                                      <input type="radio" name="repQ3" id="resQ3non" value="non">
                                    </li>
                                </ul>
                                <div class="text-center">
                                    <img src="img/patho/main.png"  height="275"  alt="">
                                </div>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="step4">

                                <p>Avez-vous eu une éruption cutanée semblable à celle de l'image ci-dessous autour du cou, des yeux ou des oreilles ?</p>
                                <ul class="list-inline pull-center text-center">
                                    <li><button type="button" class="btn btn-default prev-step">Précédent</button></li>

                                    <li>
                                      <label for="resQ4oui" type="button" class="btn btn-success next-step oui oui4">Oui</label>
                                      <input type="radio" name="repQ4" id="resQ4oui" value="oui">
                                    </li>

                                    <li>
                                      <label for="resQ4non" type="button" class="btn btn-danger next-step non">Non</label>
                                      <input type="radio" name="repQ4" id="resQ4non" value="non">
                                    </li>

                                </ul>
                                <div class="text-center">
                                    <img src="img/patho/cou_oeil.png" height="275"  alt="">
                                </div>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="step5">
                                <p> Avez-vous eu une éruption cutanée semblable à celle de l'image ci-dessous aux pieds ou aux talons ?</p>
                                <ul class="list-inline pull-center text-center">
                                    <li><button type="button" class="btn btn-default prev-step">Précédent</button></li>
                                    <li>
                                      <label for="resQ5oui" type="button" class="btn btn-success next-step oui oui5">Oui</label>
                                      <input type="radio" name="repQ5" id="resQ5oui" value="oui">
                                    </li>
                                    <li>
                                      <label for="resQ5non" type="button" class="btn btn-danger next-step non">Non</label>
                                      <input type="radio" name="repQ5" id="resQ5non" value="non">
                                    </li>
                                </ul>
                                <div class="text-center">
                                    <img src="img/patho/pied.png" height="275" alt="">
                                </div>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="complete">

                                <div class="row">
                                    <div class="col-sm-12">
                                      <h3>Confirmez-vous vos reponses ?</h3>
                                      <div class="text-center mt-3">
                                        <button type="button" class="btn btn-default prev-step">Précédent</button>
                                        <button type="submit" class="btn btn-success">Confirmer</button>
                                      </div>
                                    </div>
                                </div>

                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </section>
           </div>
        </div>
    </body>
</html>
