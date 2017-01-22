<?php include 'partials/header.php';?>
<body>
    <!-- BEGIN MAIN STRUCTURE -->
    <!-- NÃO REMOVER ISSO O QUE ESTÁ ENTRE ESTES COMENTÁRIOS-->
    <main>
      <div class="bar btop"></div>
      <div class="bar bleft"></div>
      <div class="bar bright"></div>
      <div class="bar bbottom"></div>
        <div class="main-body">
            <!-- NÃO REMOVER ISSO O QUE ESTÁ ENTRE ESTES COMENTÁRIOS-->

            <!-- INTRODUZIR AS SECTIONS ENTRE COMMENTS -->
            <section class="formulario">
                <form id="EncForm" action="formCore.php" method="post">
                  <input type="hidden" name="data[ref]" class="ref" value="" />
                  <div class="container-fluid noSidePad" >
                      <div class="col-lg-6 info-side">
                        <?php include 'partials/Left_first_panel.php';?>

                        <?php include 'partials/Left_second_panel_EUA.php';?>

                        <?php include 'partials/Left_second_panel_NEA.php';?>



                      </div>
                      <div class="col-lg-6 form-side">

                        <!-- Modalidades de pagamento -->
                            <?php include 'partials/Right_pricePlans.php';?>
                        <!-- INICIO - Informações Pessoais  -->
                        <?php include 'partials/Right_personalForm.php';?>

                        <!-- FIM - Dados  -->

                        <!-- INICIO -Outras Info  -->
                        <?php include 'partials/Right_gopForm.php';?>
                        <!-- FIM - Dados  -->
                        <?php include 'partials/Right_EndForm.php';?>


                        <?php //include 'partials/Right_reservasForm.php';?>

                      </div>
                 </div>
               </form>
            </section>

        <!-- INTRODUZIR AS SECTIONS ENTRE COMMENTS -->


        <!-- NÃO REMOVER ISSO O QUE ESTÁ ENTRE ESTES COMENTÁRIOS-->
        </div>
    </main>
    <!-- NÃO REMOVER ISSO O QUE ESTÁ ENTRE ESTES COMENTÁRIOS-->
    <!-- END MAIN STRUCTURE -->

    <!-- NÃO REMOVER ISSO O QUE ESTÁ ENTRE ESTES COMENTÁRIOS-->
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')
    </script>

    <script src="js/main.js"></script>

    <!-- Hotjar Tracking Code for http://eneazores.pt/tickets/ -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:395521,hjsv:5};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'//static.hotjar.com/c/hotjar-','.js?sv=');
</script>
    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
    <!--Dados estatistico de acessos do site  -->
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-90748507-1', 'auto');
  ga('send', 'pageview');

</script>
</body>

</html>
<!-- NÃO REMOVER ISSO O QUE ESTÁ ENTRE ESTES COMENTÁRIOS-->
