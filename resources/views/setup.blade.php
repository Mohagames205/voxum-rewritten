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

    </style>

</head>

<body class="dark">
<section>
    <div class="wrap">
        <div id="image">
            <p id="logo">👋🏽</p>
        </div>
        <div class="verification" id="no-verify">
            <div class="wrap-content">
                <div class="banner">
                    <h1 class="logo"><span style="color: #8526fa;">Vox</span><span style="font-weight: 100">um</span><sup style="font-size: 19px;">α</sup></h1>
                    <p>Hey! Welcome to Voxum, the proximity voice chatting plugin for Minecraft Bedrock Edition. Before you can use Voxum we need to ask you a few things!</p>
                    <p>Press the <b>button</b> below to get started! </p>
                    <button class="glurple-button" id="start-setup">Start set-up</button>
                </div>
            </div>
        </div>
        <div class="verification" id="adminaccount">
            <div class="wrap-content">
                <div class="banner">
                    <h1 class="logo"><span style="color: #8526fa;">Vox</span><span style="font-weight: 100">um</span><sup style="font-size: 19px;">α</sup></h1>
                    <p>Let's begin with creating an admin account! With this account you can moderate users and adjust settings</p>
                    <form>
                        <input type="email" placeholder="E-mail">
                        <input type="password" placeholder="Password">
                    </form>
                    <button class="glurple-button right" id="nxt-to-details">Create account</button>
                </div>
            </div>
        </div>
        <div class="verification" id="details">
            <div class="wrap-content">
                <div class="banner">
                    <h1 class="logo"><span style="color: #8526fa;">Vox</span><span style="font-weight: 100">um</span><sup style="font-size: 19px;">α</sup></h1>
                    <p>Cool! Let's get started with the <b>name</b> of your server.</p>
                    <input type="text" placeholder="Servername e.g FlexCraft">
                    <button class="glurple-button right" id="nxt-to-dist">Next</button>
                </div>
            </div>
        </div>
        <div class="verification" id="distance">
            <div class="wrap-content">
                <div class="banner">
                    <h1 class="logo"><span style="color: #8526fa;">Vox</span><span style="font-weight: 100">um</span><sup style="font-size: 19px;">α</sup></h1>
                    <p>Great, what should be the maximum <b>distance (in blocks)</b> that players can hear you?</p>
                    <input type="number" placeholder="40"> blocks
                    <button class="glurple-button right" id="nxt-to-conn">Next</button>
                </div>
            </div>
        </div>

        <div class="verification" id="connectionattempt">
            <div class="wrap-content">
                <div class="banner">
                    <h1 class="logo"><span style="color: #8526fa;">Vox</span><span style="font-weight: 100">um</span><sup style="font-size: 19px;">α</sup></h1>
                    <p>Cool! Lets <b>verify</b> that your plugin is configured correctly. Start your Minecraft server and join the server, if the plugin is set-up correctly i'll be able to detect it!</p>
                    <p>Waiting for verification...</p>
                    <button class="glurple-button right" id="start-setup">Next</button>
                </div>
            </div>
        </div>
    </div>
</section>


<script>
    const setupButton = document.getElementById("start-setup");
    const adminNextButton = document.getElementById("nxt-to-details");
    const detailsNextButton = document.getElementById("nxt-to-dist");
    const distanceNextButton = document.getElementById("nxt-to-conn");


    const noVerifyBlock = document.getElementById("no-verify");
    const createUserBlock = document.getElementById("adminaccount");
    const detailsBlock = document.getElementById("details");
    const distanceBlock = document.getElementById("distance");
    const connectionBlock = document.getElementById("connectionattempt");



    setupButton.onclick = () => {
        noVerifyBlock.style.display = "none";
        createUserBlock.style.display = "flex";
    }

    adminNextButton.onclick = () => {
        createUserBlock.style.display = "none";
        detailsBlock.style.display = "flex";
    }

    detailsNextButton.onclick = () => {
        detailsBlock.style.display = "none";
        distanceBlock.style.display = "flex";
    }

    distanceNextButton.onclick = () => {
        distanceBlock.style.display = "none";
        connectionBlock.style.display = "flex";
    }




</script>

</body>
</html>
