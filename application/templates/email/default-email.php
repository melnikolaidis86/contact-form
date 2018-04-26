<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Demystifying Email Design</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body style="margin: 0; padding: 0;">
        <table align="center" border="1" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;">
        <tr>
            <td align="center" bgcolor="#f5f5f5" style="padding: 40px 0 30px 0; font-weight: bold; font-size: 28px">
                SAE Custom CMS
            </td>
        </tr>
        <tr>
            <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
                <table border="1" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td style="padding: 5px 0;">
                        <?php echo $full_name; ?>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 20px 0 30px 0;">
                        <?php echo $message; ?>
                    </td>
                </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#f5f5f5">
            <table>
                <tr>
                    <td width="75%">
                        Ευχαριστούμε που ήρθατε σε επικοινωνία μαζί μας. Θα επικοινωνήσουμε μαζί σας σύντομα...
                    </td>
                    <td width="25%" style="text-align: center;">
                        &copy; <?php echo date('Y'); ?>
                    </td>
                </tr>
            </table>  
            </td> 
        </tr>
    </table>
</body>
</html>