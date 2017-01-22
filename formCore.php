<?php
ob_start();
date_default_timezone_set('Europe/Lisbon');

require('fpdf.php');
require('HelpClass.php');


$form  = new FormData();

if (isset($_POST['data'])){
  if ($_POST['data']['ref'] =='1' || $_POST['data']['ref'] =='2'){

            // GLOBALS
            /* Data */
            $today = date("F j, Y, g:i a");
            /* FORM DATA */
            $data  = $_POST['data'];
            // Add Data do dia de hoje ao array
            $data['date'] = $today;
            // Add um id especifico de Identificação do user
            $data['ID'] = uniqid(date("Ymd"));

            // ADD referencia do tipo de form preechido
            switch ($data['ref']) {
              case '1':
                $data['who'] = 'Estudante Açoriano';

                  if(!empty($data['alojamento']) && $data['alojamento'] == 'Sim'){
                      $mailImg = "Inscrito_EUA-f1-CmA@2x.png";
                  }else{
                      $mailImg = "Inscrito_EUA-f1-SmA@2x.png";
                  }
                break;
              case '2':
                $data['who'] = 'Não Estudante Açoriano';

                if(!empty($data['alojamento']) && $data['alojamento'] == 'Sim'){
                    $mailImg = "Inscrito_NEA-f1-CmA@2x.png";
                }else{
                    $mailImg = "Inscrito_NEA-f1-SmA@2x.png";
                }
                break;
              // case '3':
              //   $data['who'] = 'Não Açoriano';
              //   break;
            }

              $nome = utf8_decode($data['name']);
              $ilha = utf8_decode($data['ilha']);
              $concelho = utf8_decode($data['concelho']);
              $curso = utf8_decode($data['curso']);
              $uni = utf8_decode($data['universidade']);
            /*----------------------
            /
            /    PDF's
            /-----------------------*/
            $pdf = new FPDF('P','cm','A4');
            $pdf->AddPage();
            if($data['ref']==1){
              $pdf->Image('pdfs_inscritos/A4_EA.png', 0, 0, 21.4, 30,'png');
            }else{
              $pdf->Image('pdfs_inscritos/A4_NEA.png', 0, 0, 21.4, 30,'png');
            }

            $pdf->SetFont('Arial','B',10);
            $pdf->Text(14.7,15.2,$data['ID']);
            $pdf->SetFont('Arial','B',12);
            // 1ST BLOCK
            $pdf->Text(9.9,18.1,$nome);
            $pdf->Text(9.4,18.9,$data['cc']);
            $pdf->Text(9.4,19.84,$data['nif']);
            $pdf->Text(10.3,20.70,$data['phone']);

            // 2ND BLOCK

            $pdf->Text(14.3,18.96,$ilha);
            $pdf->Text(15,19.84,$concelho);
            $pdf->Text(14.7,20.70,$data['email']);

            if($data['ref']==1){
              $pdf->Text(9.8,22.35,$curso);
              $pdf->Text(11.1,23.19,$uni);
            }

            $pdfnome ='pdfs_inscritos/'.$data['ID'].'_'. $data['name'] .'_'.$data['who'].'.pdf';
            $pdf->Output('F',$pdfnome,true);

            // Tittle for email template and subject
            $title_mail="ENEAz - A tua inscrição como ".$data['who']." foi submetida.";
            $texto_mail="JÁ ESTÁS INSCRITO! -Para finalizar o teu registo, pedimos que proceda ao pagamento,  no valor 17 €, via transferência bancária, para o seguinte NIB :

            0035 01850 002016 573031

            Caixa Geral de Depósitos
            Grupo Forcados Açoriano Tremores Terra

            Por fim e em modo de confirmação, envimo-nos o comprovativo do pagamento.

            Agradecemos a sua inscrição e esperamos por si em Março!


            A Organização";



              /*----------------------
              /
              /    EMAILS
              /-----------------------*/

              /* Email de quem gere e recebe as encomendas*/
              $email_main="eneacoriano@gmail.com, joao.jgp@gmail.com, andreromeiro_1993@hotmail.com";
              $email_sender ="tickets@eneazores.pt";


              include('templateMail.php');




              // 1º Enviar email para nós com os dados da pessoa, id, hora da inscrição e ID: has(time);
                  // A ENVIAR O EMAIL para o Gestor de Inscrições e de pagamentos
                  /*------------------------*/
                  $to        = $email_main;
                  $from      = $email_sender;
                  $subject   = "Nova Inscrição - ".$data['who']." - ".$today;
                  $html_body = '<h2>Nova Inscrição - '.$data['who'].'</h2>';
                  $html_body.=" <p><strong>Data do pedido</strong> ".$today.'</p>';
                  $html_body.= $html=$form->prepare_html_personalData($data);
                  $html_body.= '<h2>Atenção</h2><p>
                   Não esquecer ir verificando se a pessoa pagou. Quando tal acontecer, reencaminham para ela um email e com este ficheiro em anexo!
                  </p>';

                  $mail   = new Mail($to, $from, $subject,'',$html_body);
                  // Anexar pdf fatura a esse email;
                  if(!empty($pdfnome)){
                      $mail->add_attachment($pdfnome);
                  }
              //_____________________
                  //$mail->add_header("Reply-To: ".$client_email);
                  $pay_mail = $mail->send();
              /*------------------------*/

              // 2º Enviar confirmação do registo e pedido de pagamento à pessoa inscrita
                    // A ENVIAR O EMAIL para o Gestor de Inscrições e de pagamentos
                    /*------------------------*/
                    $to        = $data['email'];
                    $from      = $email_sender;
                    $subject   = $title_mail;
                    $html_body  = $MTemplate;
                    $mail   = new Mail($to, $from, $subject, $texto_mail,$html_body);
                    //_____________________
                    //$mail->add_header("Reply-To: ".$client_email);
                    $confirm_mail= $mail->send();
                    /*------------------------*/

                    /*Gravar JSON*/
                    if($pay_mail !=='1'){
                        $data['pay-mail']='1';
                    }
                    if($confirm_mail !=='1'){
                        $data['confirma-mail']='1';
                    }

                      $form->prepare_JSON_personalData($data);

                      echo "OK";

  }

}
ob_end_flush();
?>
