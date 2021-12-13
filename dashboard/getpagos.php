<?php session_start();
if(!isset($_SESSION['userid'])){
    header('Location: login.html');
    exit;
} else {
    // Show users the page!
}

include './database.php';
$fecha = new DateTime("now", new DateTimeZone('America/Santiago'));
$hoy = $fecha->format('Y-m-d');
?>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Pagos Opera-Softland <?php
    if ($_SERVER ['REQUEST_METHOD'] == 'POST'){

    $fd1= date("d-m-y",strtotime($_POST['fd']));

    echo $fd1;
    }
    ?></title>
    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="../datatables/datatables.min.css"/>
    <!--datables estilo bootstrap 4 CSS-->
    <link rel="stylesheet"  type="text/css" href="../datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">

    <!--font awesome con CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

  </head>
  <body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

      <!-- Sidebar -->
      <?php
      include './menu.php';
      ?>
      <!-- End of Sidebar -->

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

          <!-- Topbar -->
          <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
              <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

              <!-- Nav Item - Messages -->
              <li class="nav-item dropdown no-arrow mx-1">

                <!-- Dropdown - Messages -->

              </li>

              <div class="topbar-divider d-none d-sm-block"></div>

              <!-- Nav Item - User Information -->
              <li class="nav-item dropdown no-arrow">
                  <a class="nav-link dropdown-toggle" href="logout.php" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['usernombre']; ?></span>

                </a>
                <!-- Dropdown - User Information -->
              </li>

            </ul>

          </nav>

          <!-- End of Topbar -->
    <!--Ejemplo tabla con DataTables-->
    <h3 class="text-center">Pagos Opera-Softland</h3>
<br>
    <div class="container">

      <div class="container">
      <div class="row">
      <div class="col-sm-3">
      Fecha desde
      </div>
      </div>
      </div>
      <div class="container">
        <form action="getpagos.php" method = "post">
  <div class="row">
    <div class="col-sm-3">
      <input type="date" class="form-control" name="fd" id="fd" value= <?php echo $hoy; ?> required>
    </div>
    <div class="col-sm-3">
      <input type="submit" class="btn btn-primary btn-sm" value="Generar reporte">
    </div>
  </div>
  <br>
  <br>
</div>

        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table id="Consulta" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                              <th>BILL_NO</th>
                              <th>CUENTA</th>
                              <th>DEBE</th>
                              <th>HABER</th>
                              <th>GLOSA</th>
                              <th>CODIGO_AUXILIAR</th>
                              <th>TIPO_DE_DOCTO</th>
                              <th>NRO_DOCTO</th>
                              <th>FECHA_EMISION</th>
                              <th>FECHA_VENCIMIENTO</th>
                              <th>TIPO_DE_DOCTO_REFERENCIA</th>
                              <th>NRO_DOCTO_REFERENCIA</th>
                            </tr>
                        </thead>
                        <?php
                      if ($_SERVER ['REQUEST_METHOD'] == 'POST'){
                      $fd= date("d-m-y",strtotime($_POST['fd']));
                      $fd1= date("d-m-y",strtotime($_POST['fd']));
                      $tabla= 'NAME$_CREDIT_CARD';
                      $sql = "SELECT
FX.BILL_NO,
        (CASE
        WHEN FX.FOLIO_TYPE = 'BOLETA' THEN '1-01-03-006'
        WHEN FX.FOLIO_TYPE = 'FACTURA N' THEN '1-01-03-001'
        WHEN FX.FOLIO_TYPE = 'FACTURA E' AND FX.CL_TRX_NO IS NULL THEN '1-01-03-002'
        WHEN FX.FOLIO_TYPE = 'CREDITO B' THEN '1-01-03-006'
        WHEN FX.FOLIO_TYPE = 'CREDITO N' THEN '1-01-03-001'
        ELSE ''
        END ) AS CUENTA,
        (CASE
         WHEN FX.FOLIO_TYPE IN ('CREDITO E','CREDITO N','CREDITO B') THEN TO_CHAR(ABS(FX.TOTAL_GROSS))
               ELSE '' END) AS DEBE,
        (CASE
         WHEN FX.FOLIO_TYPE IN ('BOLETA','FACTURA N', 'FACTURA E') THEN TO_CHAR(ABS(FX.TOTAL_GROSS))
               ELSE '' END) HABER,
        'CENTRALIZACION DE VENTAS' AS GLOSA,
        (CASE
      WHEN FX.FOLIO_TYPE IN ('FACTURA E','CREDITO E') THEN '55555555'
      ELSE substr(FH.TAX1_NO,1,instr(FH.TAX1_NO,'-',1,1)-1) END) AS CODIGO_AUXILIAR,
        'OT' AS TIPO_DE_DOCTO,
        SUBSTR(FX.FISCAL_BILL_NO, 4, 10) AS NUMERO_DE_DCTO,
        FX.BUSINESS_DATE,
        FX.BUSINESS_DATE,
        (CASE
              WHEN FX.FOLIO_TYPE = 'BOLETA' THEN 'BA'
              WHEN FX.FOLIO_TYPE = 'FACTURA N' THEN 'FA'
              --WHEN FX.FOLIO_TYPE = 'FACTURA E' AND FX.CL_TRX_NO IS NOT NULL THEN 'FT' --AGENCIA
              --WHEN FX.FOLIO_TYPE = 'FACTURA E' AND FX.CL_TRX_NO IS NULL THEN 'FO' --CLIENTE
              WHEN FX.FOLIO_TYPE = 'FACTURA E' THEN 'FO'
              WHEN FX.FOLIO_TYPE = 'CREDITO E' THEN 'NO'
              WHEN FX.FOLIO_TYPE = 'CREDITO N' THEN 'NA'
              WHEN FX.FOLIO_TYPE = 'CREDITO B' THEN 'NA'
              ELSE FX.FOLIO_TYPE
              END) AS TIPO_DE_DOCTO_REFERENCIA,
       SUBSTR(FX.FISCAL_BILL_NO, 4, 10) AS NRO_DOCTO_REFERENCIA

    FROM opera.FOLIO_TAX FX
    /*INNER JOIN opera.FINANCIAL_TRANSACTIONS_VIEW FT ON (FX.RESV_NAME_ID = FT.RESV_NAME_ID)
                      AND (FX.RESORT = FT.RESORT)
                      AND (FX.FOLIO_NO = FT.FOLIO_NO)
                      AND (FX.BILL_NO = FT.BILL_NO)*/
    INNER JOIN
              (SELECT TAX1_NO, RESORT, RESV_NAME_ID, BILL_NO FROM opera.FOLIO_HISTORY
              GROUP BY TAX1_NO,RESORT, RESV_NAME_ID,BILL_NO) FH ON (FX.RESV_NAME_ID = FH.RESV_NAME_ID)
                                                                    AND (FX.RESORT = FH.RESORT)
                                                                    AND (FX.BILL_NO = FH.BILL_NO)
    WHERE FX.BILL_GENERATION_DATE BETWEEN TO_DATE('$fd', 'dd-mm-yy') AND TO_DATE('$fd', 'dd-mm-yy')


          AND (FX.FOLIO_TYPE != 'INTERNAL')
          AND (FX.STATUS = 'OK')
          UNION ALL
           SELECT
         FX.BILL_NO,
          --FT.FOLIO_TYPE,
         -- FT.TRX_CODE,
         (CASE
                  WHEN FT.TRX_CODE IN ('9004','9005') THEN ' 2-01-03-001' --DEPOSIT
                  WHEN FT.TRX_CODE IN ('9001','9000') THEN '1-01-01-001'
                  WHEN FT.TRX_CODE IN ('9001') THEN 'CH' --CHEQUES
                  WHEN FT.TRX_CODE IN ('9016','9010','9011','9017') THEN '1-01-04-004'
                  WHEN FT.TRX_CODE IN ('9018','9013','9024','9019') THEN '1-01-04-005'
                  WHEN FT.TRX_CODE IN ('9015') THEN '1-01-04-006'
                  WHEN FT.TRX_CODE IN ('9028') THEN '4-01-01-014' --DIFERENCIA TIPO DE CAMBIO
                 --WHEN FT.TRX_CODE IN ('9407') THEN '' --AJUSTE DIFERENCIA TIPO DE CAMBIO
                  WHEN FT.TRX_CODE IN ('6701') THEN '2-01-03-005' --VENTA ANTICIPADA
                  --WHEN FT.TRX_CODE IN ('9409','9410','9413') THEN '' --CANJE, ADJ CANJE
                  --WHEN FT.TRX_CODE IN ('9411','0412') THEN '' --APORTE, ADJ APORTE
                  WHEN FT.TRX_CODE IN ('6703') THEN '2-01-03-005' --DESCUENTO VENTA ANTICIPADA
                  --WHEN FT.TRX_CODE IN ('9100') THEN '' --DEPOSITO CAMBIO DE SISTEMA
                  --WHEN FT.TRX_CODE IN ('9420','9421') THEN '' --RELACION DE COBRO CLP, RELACION DE COBRO USD
                  --WHEN FT.TRX_CODE IN ('9500') THEN 'FT' --FTV.FOLIO_TYPE --CUENTAS CORRIENTES
                  WHEN FT.TRX_CODE IN ('9002') THEN ' 2-01-03-002' --VOUCHER CLP, VOUCHER USD

        ELSE ''
        END ) AS CUENTA,
          (CASE
           WHEN FT.FOLIO_TYPE IN ('BOLETA','FACTURA N', 'FACTURA E') AND FT.TRX_CODE = '9028' THEN ''
           WHEN FT.FOLIO_TYPE IN ('BOLETA','FACTURA N', 'FACTURA E') THEN TO_CHAR(ABS(FT.GUEST_ACCOUNT_CREDIT))
                 ELSE '' END) AS DEBE,
          (CASE
           WHEN FT.FOLIO_TYPE IN ('CREDITO E','CREDITO N','CREDITO B') THEN TO_CHAR(ABS(FT.GUEST_ACCOUNT_CREDIT))
           WHEN FT.TRX_CODE = '9028' THEN '' --TO_CHAR(ABS(FT.GUEST_ACCOUNT_CREDIT))
                 ELSE '' END) AS HABER,
          FT.transaction_description AS GLOSA,
        (CASE
            WHEN FT.TRX_CODE IN ('9016','9018','9010','9013','9011','9024','9017','9019','9015') THEN '96689310'
            --WHEN FT.TRX_CODE IN ('9100','9405','9414') AND FT.FOLIO_TYPE IN ('FACTURA E','CREDITO E') THEN '''33-8'
            --WHEN FT.TRX_CODE IN ('9100','9405') THEN '''1-8'
            WHEN FX.FOLIO_TYPE = 'FACTURA E' AND FX.CL_TRX_NO IS NOT NULL THEN AR.ACCOUNT_NO
            ELSE AR.ACCOUNT_NO --FH.TAX1_NO
            END) AS CODIGO_AUXILIAR,
          --'' AS TIPO_DE_DOCTO,
          (CASE
              WHEN FX.FOLIO_TYPE IN ('BOLETA', 'FACTURA N', 'FACTURA E') THEN
                (CASE
                  WHEN FT.TRX_CODE IN ('9004') THEN 'OT' --DEPOSIT
                  WHEN FT.TRX_CODE IN ('9001') THEN 'CH' --CHEQUES
                  WHEN FT.TRX_CODE IN ('9016','9018') THEN 'AX' --AMERICA EXPRESS CLP, AMERICAN EXPRESS USD
                  WHEN FT.TRX_CODE IN ('9010','9013') THEN 'VI' --VISA CLP, VISA USD
                  WHEN FT.TRX_CODE IN ('9011','9024') THEN 'MC' --MASTERCARD CLP, MASTERCARD USD
                  WHEN FT.TRX_CODE IN ('9017','9019') THEN 'DC' --DINERS CLUB CLP, DINERS CLUB USD
                  WHEN FT.TRX_CODE IN ('9000') THEN 'EF' --EFECTIVO CLP, EFECTIVO USD
                  WHEN FT.TRX_CODE IN ('9015') THEN 'DB' --DEBITO CLP, DEBITO USD
                  WHEN FT.TRX_CODE IN ('9005') THEN 'OT' --TRANSFERENCIA CLP, TRANSFERENCIA USD
                  WHEN FT.TRX_CODE IN ('9028') THEN '' --DIFERENCIA TIPO DE CAMBIO
                 --WHEN FT.TRX_CODE IN ('9407') THEN '' --AJUSTE DIFERENCIA TIPO DE CAMBIO
                  WHEN FT.TRX_CODE IN ('6701') THEN '' --VENTA ANTICIPADA
                  --WHEN FT.TRX_CODE IN ('9409','9410','9413') THEN '' --CANJE, ADJ CANJE
                  --WHEN FT.TRX_CODE IN ('9411','0412') THEN '' --APORTE, ADJ APORTE
                  WHEN FT.TRX_CODE IN ('6703') THEN '' --DESCUENTO VENTA ANTICIPADA
                  --WHEN FT.TRX_CODE IN ('9100') THEN '' --DEPOSITO CAMBIO DE SISTEMA
                  --WHEN FT.TRX_CODE IN ('9420','9421') THEN '' --RELACION DE COBRO CLP, RELACION DE COBRO USD
                  --WHEN FT.TRX_CODE IN ('9500') THEN 'FT' --FTV.FOLIO_TYPE --CUENTAS CORRIENTES
                  WHEN FT.TRX_CODE IN ('9002') THEN '' --VOUCHER CLP, VOUCHER USD
                  ELSE FT.FOLIO_TYPE
                  END)
            WHEN FX.FOLIO_TYPE = 'FACTURA E' THEN
              (CASE WHEN NV.NAME_TYPE = 'D' THEN
                (CASE
                  WHEN FT.TRX_CODE IN ('9004') THEN 'OT' --DEPOSIT
                  WHEN FT.TRX_CODE IN ('9001') THEN 'CH' --CHEQUES
                  WHEN FT.TRX_CODE IN ('9016','9018') THEN 'AX' --AMERICA EXPRESS CLP, AMERICAN EXPRESS USD
                  WHEN FT.TRX_CODE IN ('9010','9013') THEN 'VI' --VISA CLP, VISA USD
                  WHEN FT.TRX_CODE IN ('9011','9024') THEN 'MC' --MASTERCARD CLP, MASTERCARD USD
                  WHEN FT.TRX_CODE IN ('9017','9019') THEN 'DC' --DINERS CLUB CLP, DINERS CLUB USD
                  WHEN FT.TRX_CODE IN ('9000') THEN 'EF' --EFECTIVO CLP, EFECTIVO USD
                  WHEN FT.TRX_CODE IN ('9015') THEN 'DB' --DEBITO CLP, DEBITO USD
                  WHEN FT.TRX_CODE IN ('9005') THEN 'OT' --TRANSFERENCIA CLP, TRANSFERENCIA USD
                  WHEN FT.TRX_CODE IN ('9028') THEN '' --DIFERENCIA TIPO DE CAMBIO
                 --WHEN FT.TRX_CODE IN ('9407') THEN '' --AJUSTE DIFERENCIA TIPO DE CAMBIO
                  WHEN FT.TRX_CODE IN ('6701') THEN '' --VENTA ANTICIPADA
                  --WHEN FT.TRX_CODE IN ('9409','9410','9413') THEN '' --CANJE, ADJ CANJE
                  --WHEN FT.TRX_CODE IN ('9411','0412') THEN '' --APORTE, ADJ APORTE
                  WHEN FT.TRX_CODE IN ('6703') THEN '' --DESCUENTO VENTA ANTICIPADA
                  --WHEN FT.TRX_CODE IN ('9100') THEN '' --DEPOSITO CAMBIO DE SISTEMA
                  --WHEN FT.TRX_CODE IN ('9420','9421') THEN '' --RELACION DE COBRO CLP, RELACION DE COBRO USD
                  --WHEN FT.TRX_CODE IN ('9500') THEN 'FT' --FTV.FOLIO_TYPE --CUENTAS CORRIENTES
                  WHEN FT.TRX_CODE IN ('9002') THEN '' --VOUCHER CLP, VOUCHER USD
                  ELSE FT.FOLIO_TYPE
                  END)
              ELSE 'FT'
              END)
            --WHEN FX.FOLIO_TYPE IN ('CREDITO E','CREDITO N','CREDITO B') THEN 'OT'
            WHEN FX.FOLIO_TYPE IN ('CREDITO E','CREDITO N','CREDITO B') AND FT.TRX_CODE IN ('9010','9013') THEN 'VI'
            WHEN FX.FOLIO_TYPE IN ('CREDITO E','CREDITO N','CREDITO B') AND FT.TRX_CODE IN ('9001') THEN 'CH'
            WHEN FX.FOLIO_TYPE IN ('CREDITO E','CREDITO N','CREDITO B') AND FT.TRX_CODE IN ('9016','9018') THEN 'AX'
            WHEN FX.FOLIO_TYPE IN ('CREDITO E','CREDITO N','CREDITO B') AND FT.TRX_CODE IN ('9011','9024') THEN 'MC'
            WHEN FX.FOLIO_TYPE IN ('CREDITO E','CREDITO N','CREDITO B') AND FT.TRX_CODE IN ('9017','9019') THEN 'DC'
            WHEN FX.FOLIO_TYPE IN ('CREDITO E','CREDITO N','CREDITO B') AND FT.TRX_CODE IN ('9000') THEN 'EF'
            WHEN FX.FOLIO_TYPE IN ('CREDITO E','CREDITO N','CREDITO B') AND FT.TRX_CODE IN ('9015') THEN 'DB'
            ELSE '0T'--FX.FOLIO_TYPE
            END) AS TIPO_DE_DCTO,
            (CASE
                WHEN FT.TRX_CODE = '9028' THEN ''
                WHEN FT.TRX_CODE IN ('9004','9005') THEN NR.CONFIRMATION_NO
                WHEN FX.FOLIO_TYPE = 'CREDITO B' AND FT.TRX_CODE NOT IN ('9016','9018','9010','9013','9011','9024','9017','9019') THEN ''
                WHEN FX.FOLIO_TYPE = 'CREDITO E' AND FT.TRX_CODE NOT IN ('9016','9018','9010','9013','9011','9024','9017','9019') THEN ''
                WHEN FX.FOLIO_TYPE = 'CREDITO N' AND FT.TRX_CODE NOT IN ('9016','9018','9010','9013','9011','9024','9017','9019') THEN ''
                ELSE TO_CHAR(FX.BUSINESS_DATE, 'mmyy') || (CASE
                                                                WHEN NCC.CREDIT_CARD_NUMBER_4_DIGITS IS NULL THEN SUBSTR(FX.FISCAL_BILL_NO,-4,4)
                                                                ELSE NCC.CREDIT_CARD_NUMBER_4_DIGITS
                                                                END)--NCC.CREDIT_CARD_NUMBER_4_DIGITS
                END) AS NUMERO_DE_DCTO,
            FX.BUSINESS_DATE,
            FX.BUSINESS_DATE,
            (CASE
                WHEN FX.FOLIO_TYPE IN ('BOLETA', 'FACTURA N', 'FACTURA E') THEN
                  (CASE
                    WHEN FT.TRX_CODE IN ('9004') THEN 'OT' --DEPOSIT
                  WHEN FT.TRX_CODE IN ('9001') THEN 'CH' --CHEQUES
                  WHEN FT.TRX_CODE IN ('9016','9018') THEN 'AX' --AMERICA EXPRESS CLP, AMERICAN EXPRESS USD
                  WHEN FT.TRX_CODE IN ('9010','9013') THEN 'VI' --VISA CLP, VISA USD
                  WHEN FT.TRX_CODE IN ('9011','9024') THEN 'MC' --MASTERCARD CLP, MASTERCARD USD
                  WHEN FT.TRX_CODE IN ('9017','9019') THEN 'DC' --DINERS CLUB CLP, DINERS CLUB USD
                  WHEN FT.TRX_CODE IN ('9000') THEN 'EF' --EFECTIVO CLP, EFECTIVO USD
                  WHEN FT.TRX_CODE IN ('9015') THEN 'DB' --DEBITO CLP, DEBITO USD
                  WHEN FT.TRX_CODE IN ('9005') THEN 'OT' --TRANSFERENCIA CLP, TRANSFERENCIA USD
                  WHEN FT.TRX_CODE IN ('9028') THEN '' --DIFERENCIA TIPO DE CAMBIO
                 --WHEN FT.TRX_CODE IN ('9407') THEN '' --AJUSTE DIFERENCIA TIPO DE CAMBIO
                  WHEN FT.TRX_CODE IN ('6701') THEN '' --VENTA ANTICIPADA
                  --WHEN FT.TRX_CODE IN ('9409','9410','9413') THEN '' --CANJE, ADJ CANJE
                  --WHEN FT.TRX_CODE IN ('9411','0412') THEN '' --APORTE, ADJ APORTE
                  WHEN FT.TRX_CODE IN ('6703') THEN '' --DESCUENTO VENTA ANTICIPADA
                  --WHEN FT.TRX_CODE IN ('9100') THEN '' --DEPOSITO CAMBIO DE SISTEMA
                  --WHEN FT.TRX_CODE IN ('9420','9421') THEN '' --RELACION DE COBRO CLP, RELACION DE COBRO USD
                  --WHEN FT.TRX_CODE IN ('9500') THEN 'FT' --FTV.FOLIO_TYPE --CUENTAS CORRIENTES
                  WHEN FT.TRX_CODE IN ('9002') THEN '' --VOUCHER CLP, VOUCHER USD
                    ELSE FT.FOLIO_TYPE
                    END)
              WHEN FX.FOLIO_TYPE = 'FACTURA E' THEN
                (CASE WHEN NV.NAME_TYPE = 'D' THEN
                  (CASE
                    WHEN FT.TRX_CODE IN ('9004') THEN 'OT' --DEPOSIT
                  WHEN FT.TRX_CODE IN ('9001') THEN 'CH' --CHEQUES
                  WHEN FT.TRX_CODE IN ('9016','9018') THEN 'AX' --AMERICA EXPRESS CLP, AMERICAN EXPRESS USD
                  WHEN FT.TRX_CODE IN ('9010','9013') THEN 'VI' --VISA CLP, VISA USD
                  WHEN FT.TRX_CODE IN ('9011','9024') THEN 'MC' --MASTERCARD CLP, MASTERCARD USD
                  WHEN FT.TRX_CODE IN ('9017','9019') THEN 'DC' --DINERS CLUB CLP, DINERS CLUB USD
                  WHEN FT.TRX_CODE IN ('9000') THEN 'EF' --EFECTIVO CLP, EFECTIVO USD
                  WHEN FT.TRX_CODE IN ('9015') THEN 'DB' --DEBITO CLP, DEBITO USD
                  WHEN FT.TRX_CODE IN ('9005') THEN 'OT' --TRANSFERENCIA CLP, TRANSFERENCIA USD
                  WHEN FT.TRX_CODE IN ('9028') THEN '' --DIFERENCIA TIPO DE CAMBIO
                 --WHEN FT.TRX_CODE IN ('9407') THEN '' --AJUSTE DIFERENCIA TIPO DE CAMBIO
                  WHEN FT.TRX_CODE IN ('6701') THEN '' --VENTA ANTICIPADA
                  --WHEN FT.TRX_CODE IN ('9409','9410','9413') THEN '' --CANJE, ADJ CANJE
                  --WHEN FT.TRX_CODE IN ('9411','0412') THEN '' --APORTE, ADJ APORTE
                  WHEN FT.TRX_CODE IN ('6703') THEN '' --DESCUENTO VENTA ANTICIPADA
                  --WHEN FT.TRX_CODE IN ('9100') THEN '' --DEPOSITO CAMBIO DE SISTEMA
                  --WHEN FT.TRX_CODE IN ('9420','9421') THEN '' --RELACION DE COBRO CLP, RELACION DE COBRO USD
                  --WHEN FT.TRX_CODE IN ('9500') THEN 'FT' --FTV.FOLIO_TYPE --CUENTAS CORRIENTES
                  WHEN FT.TRX_CODE IN ('9002') THEN '' --VOUCHER CLP, VOUCHER USD
                    ELSE FT.FOLIO_TYPE
                    END)
                ELSE 'FT'
                END)
                --WHEN FX.FOLIO_TYPE = 'CREDITO N' THEN 'FA'
                --WHEN FX.FOLIO_TYPE = 'CREDITO B' THEN 'FA'
                --WHEN FX.FOLIO_TYPE = 'CREDITO E' THEN 'FT'
                WHEN FX.FOLIO_TYPE IN ('CREDITO N','CREDITO B') THEN
               (CASE
                  WHEN FT.TRX_CODE IN ('9010','9013') THEN 'VI'
                  WHEN FT.TRX_CODE IN ('9001') THEN 'CH'
                  WHEN FT.TRX_CODE IN ('9016','9018') THEN 'AX'
                  WHEN FT.TRX_CODE IN ('9011','9024') THEN 'MC'
                  WHEN FT.TRX_CODE IN ('9017','9019') THEN 'DC'
                  WHEN FT.TRX_CODE IN ('9000') THEN 'EF'
                  WHEN FT.TRX_CODE IN ('9015') THEN 'DB'
                ELSE 'FA'
                END)
             WHEN FX.FOLIO_TYPE IN ('CREDITO E') THEN
               (CASE
                  WHEN FT.TRX_CODE IN ('9010','9013') THEN 'VI'
                  WHEN FT.TRX_CODE IN ('9001') THEN 'CH'
                  WHEN FT.TRX_CODE IN ('9016','9018') THEN 'AX'
                  WHEN FT.TRX_CODE IN ('9011','9024') THEN 'MC'
                  WHEN FT.TRX_CODE IN ('9017','9019') THEN 'DC'
                  WHEN FT.TRX_CODE IN ('9000') THEN 'EF'
                  WHEN FT.TRX_CODE IN ('9015') THEN 'DB'
                ELSE 'FT'
                END)
              ELSE FX.FOLIO_TYPE
              END) AS TIPO_DE_DOCTO_REFERENCIA,
            (CASE
                WHEN FT.TRX_CODE = '9028' THEN ''
                WHEN FT.TRX_CODE IN ('9004','9005') THEN NR.CONFIRMATION_NO
                WHEN FX.FOLIO_TYPE = 'CREDITO B' AND FT.TRX_CODE NOT IN ('9016','9018','9010','9013','9011','9024','9017','9019') THEN ''
                WHEN FX.FOLIO_TYPE = 'CREDITO E' AND FT.TRX_CODE NOT IN ('9016','9018','9010','9013','9011','9024','9017','9019') THEN ''
                WHEN FX.FOLIO_TYPE = 'CREDITO N' AND FT.TRX_CODE NOT IN ('9016','9018','9010','9013','9011','9024','9017','9019') THEN ''
                ELSE TO_CHAR(FX.BUSINESS_DATE, 'mmyy') || (CASE
                                                                WHEN NCC.CREDIT_CARD_NUMBER_4_DIGITS IS NULL THEN SUBSTR(FX.FISCAL_BILL_NO,-4,4)
                                                                ELSE NCC.CREDIT_CARD_NUMBER_4_DIGITS
                                                                END)--NCC.CREDIT_CARD_NUMBER_4_DIGITS
                END) AS NRO_DOCTO_REFERENCIA

      FROM opera.FINANCIAL_TRANSACTIONS_VIEW FT
      INNER JOIN opera.FOLIO_TAX FX ON (FX.RESV_NAME_ID = FT.RESV_NAME_ID)
                      AND (FX.RESORT = FT.RESORT)
                      AND (FX.FOLIO_NO = FT.FOLIO_NO)
                      AND (FX.BILL_NO = FT.BILL_NO)
      /*INNER JOIN opera.FOLIO_HISTORY FH ON (FX.RESORT = FH.RESORT)
                            AND (FX.RESV_NAME_ID = FH.RESV_NAME_ID)
                            AND (FX.FOLIO_NO = FH.FOLIO_NO)
                            AND (FX.BILL_NO = FH.BILL_NO)*/
      LEFT JOIN OPERA.CR_CARD_SETTLE CCS ON (CCS.NAME_ID = FT.NAME_ID)
                                            AND (CCS.RESORT = FT.RESORT)
                                            AND (CCS.FOLIO_TYPE = FT.FOLIO_TYPE)
                                            AND (CCS.CREDIT_CARD_ID = FT.CREDIT_CARD_ID)
                                            AND (CCS.ROOM = FT.ROOM)
                                            AND (CCS.FOLIO_NUMBER = FT.BILL_NO)
      LEFT JOIN $tabla NCC ON (CCS.CREDIT_CARD_ID = NCC.CREDIT_CARD_ID)
      INNER JOIN NAME_RESERVATION NR ON (FX.RESV_NAME_ID = NR.RESV_NAME_ID)
                              AND (FX.RESORT = NR.RESORT)
                             -- AND (FX.FOLIO_NO = FH.FOLIO_NO)
                            -- AND (FX.BILL_NO = FH.BILL_NO)
      INNER JOIN NAME_VIEW NV ON (FX.PAYEE_NAME_ID = NV.NAME_ID)
      LEFT JOIN AR_FOLIO_TAX AR ON (AR.NAME_ID = FT.NAME_ID)
                                  AND (AR.RESORT = FT.RESORT)
                                  AND (AR.FOLIO_NO = FT.FOLIO_NO)
                                  AND (AR.FOLIO_TYPE = FT.FOLIO_TYPE)
      WHERE FX.BILL_GENERATION_DATE BETWEEN TO_DATE('$fd', 'dd-mm-yy') AND TO_DATE('$fd', 'dd-mm-yy')

            AND (FX.FOLIO_TYPE != 'INTERNAL')
            -- AND ((CASE WHEN (FX.FOLIO_TYPE = 'FACTURA N') AND (FT.TRX_CODE = '9500') THEN 0 ELSE 1 END) = 1)
            AND (FT.GUEST_ACCOUNT_CREDIT IS NOT NULL)
     --ORDER BY BILL_NO ASC;
     ";
                      $stid = oci_parse($operaconn, $sql);
                      oci_execute ($stid, OCI_DEFAULT);
                      while (oci_fetch($stid)) {
                      echo '<tr>
                      <td>'.oci_result($stid,"BILL_NO").'</td>
                      <td>'.oci_result($stid,"CUENTA").'</td>
                      <td>'.oci_result($stid,"DEBE").'</td>
                      <td>'.oci_result($stid, "HABER").'</td>
                      <td>'.oci_result($stid, "GLOSA").'</td>
                      <td>'.oci_result($stid, "CODIGO_AUXILIAR").'</td>
                      <td>'.oci_result($stid, "TIPO_DE_DOCTO").'</td>
                      <td>'.oci_result($stid, "NUMERO_DE_DCTO").'</td>
                      <td>'.oci_result($stid, "BUSINESS_DATE").'</td>
                      <td>'.oci_result($stid, "BUSINESS_DATE").'</td>
                      <td>'.oci_result($stid, "TIPO_DE_DOCTO_REFERENCIA").'</td>
                      <td>'.oci_result($stid, "NRO_DOCTO_REFERENCIA").'</td>
                        </tr>';
                      }
                    }
                      ?>



                       </table>

                    </div>

                </div>

        </div>
    </div>

    <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="../jquery/jquery-3.3.1.min.js"></script>
    <script src="../popper/popper.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>

    <!-- datatables JS -->
    <script type="text/javascript" src="../datatables/datatables.min.js"></script>



    <!-- para usar botones en datatables JS -->
    <script src="../datatables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="../datatables/JSZip-2.5.0/jszip.min.js"></script>
    <script src="../datatables/pdfmake-0.1.36/pdfmake.min.js"></script>
    <script src="../datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script src="../datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>

    <!-- código JS propìo-->
    <script type="text/javascript" src="../main.js"></script>


  </body>
</html>
