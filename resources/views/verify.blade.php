<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Voxum | Setup</title>
    <link href="css/unsetup.css" rel="stylesheet">

    <link rel="icon" type="image/x-icon" href="/cdn/staticimg/favicon.ico" />

    <!-- Scripts -->
    @vite(['resources/js/app.js'])


    <style>
        #auth-done {
            display: none;
        }

        #welcometext {
            font-weight: bolder;
            color: #8526fa;
            font-size: 25px;
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
            <img id="statusimage" src="img/loading.svg">
        </div>
        <div class="verification" id="no-verify">
            <div class="wrap-content">
                <div class="banner">
                    <h1 class="logo"><span style="color: #8526fa;">Vox</span><span style="font-weight: 100">um</span><sup style="font-size: 19px;">α</sup></h1>
                    <div id="need-auth">
                        <p>Hey, welcome to Voxum. Before you can use Voxum you'll need to verify your Minecraft Bedrock Edition account.</p>
                        <p>Please enter the following command in-game</p>
                        <div class="command-block">
                            /verify {{ $code }}
                        </div>
                    </div>
                    <div id="auth-done">
                        <p id="welcometext"></p>
                        <p>The verification was successful! Redirecting...</p>
                    </div>
            </div>
        </div>
        </div>
    </div>
</section>
<script type="module">

    Echo.channel("VERIFY_{!! $code !!}")
        .listen("UserVerified", (e) => {
            const username = e.username;
            console.log(username)
            document.getElementById("welcometext").innerText = `Welcome ${username}!`
            document.getElementById("need-auth").style.display = "none";
            document.getElementById("auth-done").style.display = "unset";
            document.getElementById("image").innerHTML = `<p id=logo>🎉</p>`
        })


</script>
</body>
</html>
