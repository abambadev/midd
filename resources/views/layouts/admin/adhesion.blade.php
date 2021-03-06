<!doctype html>
<html>
<head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Mouvement des Instituteurs de Defense de leurs Droits</title>
    <style>
          /* -------------------------------------
            GLOBAL RESETS
        ------------------------------------- */


          body {
              background-color: #f6f6f6;
              font-family: Snell Roundhand, cursive;
              -webkit-font-smoothing: antialiased;
              font-size: 14px;
              line-height: 1.4;
              margin: 0;
              padding: 0;
              -ms-text-size-adjust: 100%;
              -webkit-text-size-adjust: 100%;
          }

          table {
              border-collapse: separate;
              mso-table-lspace: 0pt;
              mso-table-rspace: 0pt;
              width: 100%;
          }

              table td {
                  font-family: sans-serif;
                  font-size: 14px;
                  vertical-align: top;
              }
          /* -------------------------------------
            BODY & CONTAINER
        ------------------------------------- */
          .body {
              background-color: #f6f6f6;
              width: 100%;
          }
          /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
          .container {
              display: block;
              Margin: 0 auto !important;
              /* makes it centered */
              max-width: 1000px;
              padding: 10px;
              width: 1000px;
          }
          /* This should also be a block element, so that it will fill 100% of the .container */
          .content {
              box-sizing: border-box;
              display: block;
              Margin: 0 auto;
              max-width: 850px;
              padding: 10px;
          }
          /* -------------------------------------
            HEADER, FOOTER, MAIN
        ------------------------------------- */
          .main {
              background: #ffffff;
              border-radius: 3px;
              width: 100%;
          }

          .wrapper {
              box-sizing: border-box;
              padding: 20px;
          }

          .content-block {
              padding-bottom: 10px;
              padding-top: 10px;
          }

          .footer {
              clear: both;
              Margin-top: 10px;
              text-align: center;
              width: 100%;
          }

              .footer td,
              .footer p,
              .footer span,
              .footer a {
                  color: #999999;
                  font-size: 12px;
                  text-align: center;
              }
          /* -------------------------------------
            TYPOGRAPHY
        ------------------------------------- */
          h1,
          h2,
          h3,
          h4 {
              color: #000000;
              font-family: sans-serif;
              font-weight: 400;
              line-height: 1.4;
              margin: 0;
              margin-bottom: 30px;
          }

          h1 {
              font-size: 25px;
              font-weight: 600;
              text-align: center;
              text-transform: capitalize;
          }

          p,
          ul,
          ol {
              font-family: sans-serif;
              font-size: 16px;
              font-weight: normal;
              margin: 0;
              margin-bottom: 15px;
			  font-color:black;
			  padding-left:40px;
			  padding-right:40px
          }

              p li,
              ul li,
              ol li {
                  list-style-position: inside;
                  margin-left: 5px;
              }

          a {
              color: #3498db;
              text-decoration: underline;
          }
          /* -------------------------------------
            BUTTONS
        ------------------------------------- */
          .btn {
              box-sizing: border-box;
              width: 100%;
          }

              .btn > tbody > tr > td {
                  padding-bottom: 15px;
              }

              .btn table {
                  width: auto;
              }

                  .btn table td {
                      background-color: #ffffff;
                      border-radius: 5px;
                      text-align: center;
                  }

              .btn a {
                  background-color: #ffffff;
                  border: solid 1px #3498db;
                  border-radius: 5px;
                  box-sizing: border-box;
                  color: #3498db;
                  cursor: pointer;
                  display: inline-block;
                  font-size: 14px;
                  font-weight: bold;
                  margin: 0;
                  padding: 12px 25px;
                  text-decoration: none;
                  text-transform: capitalize;
              }

          .btn-primary table td {
              background-color: #3498db;
          }

          .btn-primary a {
              background-color: #3498db;
              border-color: #3498db;
              color: #ffffff;
          }
          /* -------------------------------------
            OTHER STYLES THAT MIGHT BE USEFUL
        ------------------------------------- */
          .last {
              margin-bottom: 0;
          }

          .first {
              margin-top: 0;
          }

          .align-center {
              text-align: center;
          }

          .align-right {
              text-align: right;
          }

          .align-left {
              text-align: left;
          }

          .clear {
              clear: both;
          }

          .mt0 {
              margin-top: 0;
          }

          .mb0 {
              margin-bottom: 0;
          }

          .preheader {
              color: transparent;
              display: none;
              height: 0;
              max-height: 0;
              max-width: 0;
              opacity: 0;
              overflow: hidden;
              mso-hide: all;
              visibility: hidden;
              width: 0;
          }

          .powered-by a {
              text-decoration: none;
          }

          hr {
              border: 0;
              border-bottom: 1px solid #f6f6f6;
              Margin: 20px 0;
          }
          /* -------------------------------------
            RESPONSIVE AND MOBILE FRIENDLY STYLES
        ------------------------------------- */
          @media only screen and (max-width: 620px) {
              table[class=body] h1 {
                  font-size: 28px !important;
                  margin-bottom: 10px !important;
              }

              table[class=body] p,
              table[class=body] ul,
              table[class=body] ol,
              table[class=body] td,
              table[class=body] span,
              table[class=body] a {
                  font-size: 16px !important;
              }

              table[class=body] .wrapper,
              table[class=body] .article {
                  padding: 10px !important;
              }

              table[class=body] .content {
                  padding: 0 !important;
              }

              table[class=body] .container {
                  padding: 0 !important;
                  width: 100% !important;
              }

              table[class=body] .main {
                  border-left-width: 0 !important;
                  border-radius: 0 !important;
                  border-right-width: 0 !important;
              }

              table[class=body] .btn table {
                  width: 100% !important;
              }

              table[class=body] .btn a {
                  width: 100% !important;
              }

              table[class=body] .img-responsive {
                  height: auto !important;
                  max-width: 100% !important;
                  width: auto !important;
              }
          }
          /* -------------------------------------
            PRESERVE THESE STYLES IN THE HEAD
        ------------------------------------- */
          @media all {
              .ExternalClass {
                  width: 100%;
              }

                  .ExternalClass,
                  .ExternalClass p,
                  .ExternalClass span,
                  .ExternalClass font,
                  .ExternalClass td,
                  .ExternalClass div {
                      line-height: 100%;
                  }

              .apple-link a {
                  color: inherit !important;
                  font-family: inherit !important;
                  font-size: inherit !important;
                  font-weight: inherit !important;
                  line-height: inherit !important;
                  text-decoration: none !important;
              }

              .btn-primary table td:hover {
                  background-color: #34495e !important;
              }

              .btn-primary a:hover {
                  background-color: #34495e !important;
                  border-color: #34495e !important;
              }
          }

          /***
          * My Css
          */

          .info_manager tr td{
            padding-left: 10px;
          }

    </style>
</head>
<body class="">

    <table border="0" cellpadding="0" cellspacing="0" class="body">
        <tr>

            <td>&nbsp;</td>
            <td class="container">
                <div class="content">

                    <!-- START CENTERED WHITE CONTAINER -->
                    <span class="preheader"></span>

                    <table class="main">

                        <!-- START MAIN CONTENT AREA -->
                        <tr>
                            <td class="wrapper">
                                <table border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td align="justify" >
                                        <br/><br/>
                                        <p align="justify">
                                            <strong>
                                                <h1 style="border: 2px solid black; font-size:40px">FICHE D'ADHESION</h1>
                                            </strong>
                                        </p>
                                    </td>
                                </tr>
								<tr>
									<td align="justify">

                                        <br/><br/><br/>
                                        <p align="justify"><strong>Je soussigné(e),</strong></p>
                                        <p align="justify"><strong>Nom :</strong> {{$adhesion->nom ?? null }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>Prenom :</strong> {{$adhesion->nom ?? null }} </p>
                                        <p align="justify"><strong>Sexe :</strong> {{$adhesion->sexe ?? null }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>N°CNI :</strong> {{$adhesion->numero_cni ?? null }} </p>
                                        <p align="justify"><strong>Matricule Solde :</strong> {{$adhesion->matricule ?? null }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>Contacts MTN :</strong> {{$adhesion->contact_mtn ?? null }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>Autre :</strong> {{$adhesion->phone ?? null }} </p>
                                        <p align="justify"><strong>Section :</strong> {{$adhesion->secteur ?? null }} </p>
                                        <p align="justify"><strong>IEPP :</strong> {{$adhesion->iep ?? null }} </p>
                                        <p align="justify"><strong>Fonction Syndicale :</strong> {{$adhesion->fonction ?? null }} </p>
                                        <p align="justify"><strong>Email :</strong> {{$adhesion->email ?? null }}</p>
                                        <p align="justify"><strong>Date de prise de service :</strong> {{ $adhesion->date_prise_service ?? null }} </p>

                                    </td>
                                </tr>
                                <tr>
                                    <td >
                                        <br/><br/><br/>

                                        <p align="justify">déclare être membre du Mouvement des Instituteurs pour la Défense de leurs Droits (MIDD).
                                            Je m’engage au respect de ses statuts et règlement intérieur.
                                        </p>
                                        <br/><br/>
                                        <p align="right">Fait à {{$adhesion->ville ?? null }} , le {{ date('d / M / Y')}}</p>
                                        <br/><br/><br/>
                                        <p align="center"><span style="text-decoration: underline;text-align: center">Pour le MIDD</span></p>
                                        <br/><br/>
                                        <table class="info_manager" cellpadding="0" cellspacing="0" style="width: 700px; margin: 0 auto; ">
                                            <tr align="center">
                                                <td><span style="text-decoration: underline;text-align: center">L’intéressé</span></td>
                                                <td><span style="text-decoration: underline;text-align: center">Le Secrétaire Général Local </span></td>
                                                <td><span style="text-decoration: underline;text-align: center">Le Secrétaire Général </span></td>
                                            </tr>
                                            <tr>
                                                <td></td><td>  </td><td></td>
                                            </tr>
                                        </table>

                                    </td>
                                </tr>
                                </table>
                            </td>

                        </tr>

                        <!-- END MAIN CONTENT AREA -->

                    </table>


                </div>
            </td>
            <td>&nbsp;</td>
        </tr>
    </table>
</body>

<script>
    print();
</script>

</html>
