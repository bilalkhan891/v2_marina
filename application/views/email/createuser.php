<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Account Created</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style type="text/css">
  /**
   * Google webfonts. Recommended to include the .woff version for cross-client compatibility.
   */
  @media screen {
    @font-face {
      font-family: 'Source Sans Pro';
      font-style: normal;
      font-weight: 400; 
    }
    @font-face {
      font-family: 'Source Sans Pro';
      font-style: normal;
      font-weight: 700; 
    }
  }
  /**
   * Avoid browser level font resizing.
   * 1. Windows Mobile
   * 2. iOS / OSX
   */
  body,
  table,
  td,
  a {
    -ms-text-size-adjust: 100%; /* 1 */
    -webkit-text-size-adjust: 100%; /* 2 */
  }
  /**
   * Remove extra space added to tables and cells in Outlook.
   */
  table,
  td {
    mso-table-rspace: 0pt;
    mso-table-lspace: 0pt;
  }
  /**
   * Better fluid images in Internet Explorer.
   */
  img {
    -ms-interpolation-mode: bicubic;
  }
  /**
   * Remove blue links for iOS devices.
   */
  a[x-apple-data-detectors] {
    font-family: inherit !important;
    font-size: inherit !important;
    font-weight: inherit !important;
    line-height: inherit !important;
    color: inherit !important;
    text-decoration: none !important;
  }
  /**
   * Fix centering issues in Android 4.4.
   */
  div[style*="margin: 16px 0;"] {
    margin: 0 !important;
  }
  body {
    width: 100% !important;
    height: 100% !important;
    padding: 0 !important;
    margin: 0 !important;
  }
  /**
   * Collapse table borders to avoid space between cells.
   */
  table {
    border-collapse: collapse !important;
  }
  a {
    color: #1a82e2;
  }
  img {
    height: auto;
    line-height: 100%;
    text-decoration: none;
    border: 0;
    outline: none;
  } 
  </style>

</head>
<body style="background-color: #000;">

  <!-- start preheader -->
  <div class="preheader" style="display: none; max-width: 0; max-height: 0; overflow: hidden; font-size: 1px; line-height: 1px; color: #fff; opacity: 0;">
    Hello <?php echo $data['name']; ?>, your account has been created.
  </div>
  <!-- end preheader -->

  <!-- start body -->
  <table border="0" cellpadding="0" cellspacing="0" width="100%">

    <!-- start logo -->
    <tr>
      <td align="center" bgcolor="#0a003f">
        <!--[if (gte mso 9)|(IE)]>
        <table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
        <tr>
        <td align="center" valign="top" width="600">
        <![endif]-->
        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px; ">
          <tr>
            <td align="center" valign="top" style="padding: 36px 24px;">
              <a href="<?php echo base_url(); ?>" target="_blank" style="display: inline-block;">
                <img src="<?php echo base_url('/uploads/logo-011.png'); ?>" alt="Logo" border="0" width="208" style="display: block; width: 208px; max-width: 208px; min-width: 105px;">
              </a>
            </td>
          </tr>
        </table>
        <!--[if (gte mso 9)|(IE)]>
        </td>
        </tr>
        </table>
        <![endif]-->
      </td>
    </tr>
    <!-- end logo -->

    <!-- start hero -->
    <tr>
      <td align="center" bgcolor="#0a003f">
        <!--[if (gte mso 9)|(IE)]>
        <table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
        <tr>
        <td align="center" valign="top" width="600">
        <![endif]-->
        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px; ">
          <tr>
            <td align="left"  bgcolor="#e9ecef" style="padding: 36px 24px 0; font-family: 'Source Sans Pro', Helvetica, Arial, 'raleway'; border-top: 3px solid #d4dadf;">
              <h1 style="margin: 0; font-size: 32px; font-weight: 700; letter-spacing: -1px; line-height: 48px;">My Home Port Marina</h1>
            </td>
          </tr>
        </table>
        <!--[if (gte mso 9)|(IE)]>
        </td>
        </tr>
        </table>
        <![endif]-->
      </td>
    </tr>
    <!-- end hero -->

    <!-- start copy block -->
    <tr>
      <td align="center" bgcolor="#0a003f">
        <!--[if (gte mso 9)|(IE)]>
        <table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
        <tr>
        <td align="center" valign="top" width="600">
        <![endif]-->
        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px; ">


 
          <!-- start copy -->
          <tr>
            <td align="left"  bgcolor="#e9ecef" style="padding: 24px; font-family: 'Source Sans Pro', Helvetica, Arial, 'raleway'; font-size: 16px; line-height: 24px;">
              <p style="margin: 0; line-height: 1.9em;">Your account for <?php echo $this->session->userdata('marinaname'); ?> admin protal has been created.</p>
              <p style="margin: 0; line-height: 1.9em;">Please use the below login credentials.</p>
              <p style="margin: 0; line-height: 1.9em;"><a href="<?php echo base_url('userlogin'); ?>">Click here</a> or the button below to login in your account.</p>
            </td>
          </tr>
          <!-- end copy -->

          <!-- start button -->
           
          <!-- end button -->

          <!-- Button Test -->
          
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td  style="padding-top: 15px;">
                <table border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="" style="border-radius: 3px;" bgcolor="#1a82e2">
                      <a href="<?php echo base_url('userlogin'); ?>" target="_blank" style="font-size: 16px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; text-decoration: none;border-radius: 3px; margin-left: 10px; padding:  12px 25px;; border: 1px solid #1a82e2; display: inline-block;">Login &rarr;</a>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
          <!-- .Button Test -->

          <!-- start copy -->
          <tr>
            <td align="left"  bgcolor="#e9ecef" style="padding: 24px; font-family: 'Source Sans Pro', Helvetica, Arial, 'raleway'; font-size: 16px; line-height: 24px;">
              <p>Your new credentials:</p> 
              <p><strong>User Name: </strong> <?php echo $data['username']; ?></p>
              <p><strong>Password: </strong> <?php echo $data['password']; ?></p>

            </td>
          </tr>
          <tr>
            <td align="left"  bgcolor="#e9ecef" style="padding: 24px; font-family: 'Source Sans Pro', Helvetica, Arial, 'raleway'; font-size: 16px; line-height: 24px;">
              <p style="margin: 0;">If the above link doesn't work, copy and paste the following link in your browser:</p>
              <p style="margin: 0;"><a href="<?php echo base_url('userlogin'); ?>" target="_blank"><?php echo base_url('userlogin'); ?></a></p>
            </td>
          </tr>
          <!-- end copy -->

          <!-- start copy -->
          <tr>
            <td align="left"  bgcolor="#e9ecef" style="padding: 24px; font-family: 'Source Sans Pro', Helvetica, Arial, 'raleway'; font-size: 16px; line-height: 24px; border-bottom: 3px solid #d4dadf">
              <p style="margin: 0;">Thanks,<br> My Home Port </p>
            </td>
          </tr>
          <!-- end copy -->

        </table>
        <!--[if (gte mso 9)|(IE)]>
        </td>
        </tr>
        </table>
        <![endif]-->
      </td>
    </tr>
    <!-- end copy block -->

    <!-- start footer -->
    <tr>
      <td align="center" bgcolor="#0a003f" style="padding: 24px;">
        <!--[if (gte mso 9)|(IE)]>
        <table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
        <tr>
        <td align="center" valign="top" width="600">
        <![endif]-->
        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px; ">

          <!-- start permission -->
          <tr>
            <td align="center" bgcolor="#0a003f" style="padding: 12px 24px; font-family: 'Source Sans Pro', Helvetica, Arial, 'raleway'; font-size: 14px; line-height: 20px; color: #666;">
              <p style="margin: 0;">You received this email because your account has been created for marina portal. If you think you get this email by mistake please contact us <a href="www.myhomeport.info#email">here</a>.</p>
            </td>
          </tr>
          <!-- end permission -->

          <!-- start unsubscribe -->
          <!-- <tr>
            <td align="center" bgcolor="#0a003f" style="padding: 12px 24px; font-family: 'Source Sans Pro', Helvetica, Arial, 'raleway'; font-size: 14px; line-height: 20px; color: #666;">
              <p style="margin: 0;">To stop receiving these emails, you can <a href="https://sendgrid.com" target="_blank">unsubscribe</a> at any time.</p>
              <p style="margin: 0;">Paste 1234 S. Broadway St. City, State 12345</p>
            </td>
          </tr> -->
          <!-- end unsubscribe -->

        </table>
        <!--[if (gte mso 9)|(IE)]>
        </td>
        </tr>
        </table>
        <![endif]-->
      </td>
    </tr>
    <!-- end footer -->

  </table>
  <!-- end body -->

</body>
</html>