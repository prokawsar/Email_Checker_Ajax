<head>

    <link rel="stylesheet" type="text/css" href="style.css" />
    <script type="text/javascript" src="jquery-1.2.6.min.js"></script>

    <!-- Copy this script and change id name which filed you want to check -->

    <script type="text/javascript">
        pic1 = new Image(16, 16);
        pic1.src = "loader.gif";

        $(document).ready(function() {

            $("#username").change(function() {

                var usr = $("#username").val();

                if (usr.length >= 4) {
                    $("#status").html('<img src="loader.gif" align="absmiddle">&nbsp;Checking availability...');

                    $.ajax({
                        type: "POST",
                        url: "check.php",
                        data: "username=" + usr,
                        success: function(msg) {

                            $("#status").ajaxComplete(function(event, request, settings) {

                                if (msg == 'OK') {
                                    $("#username").removeClass('object_error'); // if necessary
                                    $("#username").addClass("object_ok");
                                    $(this).html('&nbsp;<img src="tick.gif" align="absmiddle">');
                                } else {
                                    $("#username").removeClass('object_ok'); // if necessary
                                    $("#username").addClass("object_error");
                                    $(this).html(msg);
                                }

                            });

                        }

                    });

                } else {
                    $("#status").html('<font color="red">The username should have at least <strong>4</strong> characters.</font>');
                    $("#username").removeClass('object_ok'); // if necessary
                    $("#username").addClass("object_error");
                }

            });

        });
    </script>

</head>

<body>
    <center>

        <div align="center">

            <h2 align="center">AJAX Username/Email Verification</h2>

            <center>NOTE: Please type an username and continue filling the other fields. You'll see the validator in action.
                <br />
                <br /> Already existing members in this demo: <strong>username, check, terry, mark, trump </strong></center>
            <br />
            <br />

            <form action="" method="post">

                <table width="700" border="0">
                    <tr>
                        <td width="200">
                            <div align="right">Username:</div>
                        </td>
                        <td width="100">
                            <input id="username" size="20" type="text" name="username">
                        </td>
                        <td width="400" align="left">
                            <div id="status"></div>
                        </td>
                    </tr>

                    <tr>
                        <td width="200">
                            <div align="right">Password:</div>
                        </td>
                        <td width="100">
                            <input size="20" type="password" name="password">
                        </td>
                        <td width="400" align="left">
                            <div id="status"></div>
                        </td>
                    </tr>

                    <tr>
                        <td width="200">
                            <div align="right">Confirm Password:</div>
                        </td>
                        <td width="100">
                            <input size="20" type="password" name="confirm_password">
                        </td>
                        <td width="400" align="left">
                            <div id="status"></div>
                        </td>
                    </tr>
                </table>
            </form>

        </div>
    </center>

</body>

</html>