<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Voxum | Setup</title>
    <link href="css/unsetup.css" rel="stylesheet">

    <link rel="icon" type="image/x-icon" href="/cdn/staticimg/favicon.ico" />


    <style>
        #details {
            display: none;
        }

        #connectionattempt {
            display: none;
        }

        #distance {
            display: none;
        }

        #adminaccount {
            display: none;
        }

        #register-form input {
            width: 90%;
        }

    </style>

</head>

<body class="dark">
<section>
    <div class="wrap">
        <div id="image">
            <p id="logo">✅</p>
        </div>
        <div class="verification" id="no-verify">
            <div class="wrap-content">
                <div class="banner">
                    <h1 class="logo"><span style="color: #8526fa;">Vox</span><span style="font-weight: 100">um</span><sup style="font-size: 19px;">α</sup></h1>
                    <p>Hey, welcome to Voxum. Before you can use Voxum you'll need to verify your Minecraft Bedrock Edition account.</p>
                    <p>Execute the <b>/askcode</b> command and enter the code you see.</p>
                    <div class="input-username">
                        <form method="GET">
                            @csrf
                            <input type="text" placeholder="Verification code" id="verifycode" name="verifycode" style="width: 97%;">
                            <x-input-error :messages="$errors->get('verifycode')" class="mt-2" />
                            <button type="submit" class="glurple-button" id="verifycode-button">Verify code</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>

</script>
</body>
</html>
