<?php
include "./inc/header.php"
?>
    <html>
    <body>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0%;
        }

        html {
            box-sizing: border-box;
        }

        *, *:before, *:after {
            box-sizing: inherit;
        }

        .column {
            float: left;
            width: 33.3%;
            margin-bottom: 16px;
            padding: 0 8px 8px 8px;
        }

        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            margin: 8px;
        }

        .about-section {
            padding: 50px;
            text-align: center;
            background-color: #474e5d;
            color: white;
        }

        .container {
            padding: 0 16px;
            margin-left: 1px;
        }

        .container::after, .row::after {
            content: "";
            clear: both;
            display: table;
        }

        .title {
            color: grey;
        }

        .button {
            border: none;
            outline: 0;
            display: inline-block;
            padding: 8px;
            color: white;
            background-color: #000;
            text-align: center;
            cursor: pointer;
            width: 100%;
        }

        .button:hover {
            background-color: #555;
        }

        @media screen and (max-width: 800px) {
            .column {
                width: 100%;
                display: block;
            }
        }
    </style>

    <div class="about-section">
        <h1>About Us Page</h1>
        <p>Some text about who we are and what we do.</p>
        <p>Resize the browser window to see that this page is responsive by the way.</p>
    </div>

    <h2 style="text-align:center">Our Team</h2>
    <div class="row">
        <div class="column">
            <div class="card">
                <img src="/img/Asaf.png" alt="Asaf">
                <div class="container">
                    <h2>Asaf Darmon</h2>
                    <p class="title">CEO & Founder</p>
                    <p>Founder and Ceo of the current website.</p>
                    <p>asafdarmon1@gmail.com</p>
                    <p>
                        <button class="button">Contact</button>
                    </p>
                </div>
            </div>
        </div>

        <div class="column">
            <div class="card">
                <img src="/img/Liran.png" alt="Liran">
                <div class="container">
                    <h2>Liran Hersh</h2>
                    <p class="title">Art Director</p>
                    <p>Some text that describes me lorem ipsum ipsum lorem.</p>
                    <p>liranhr1992@gmail.com</p>
                    <p>
                        <button class="button">Contact</button>
                    </p>
                </div>
            </div>
        </div>

        <div class="column">
            <div class="card">
                <img src="/img/Daniel.png" alt="Daniel">
                <div class="container">
                    <h2>Daniel Darmon</h2>
                    <p class="title">Designer</p>
                    <p>Some text that describes me lorem ipsum ipsum lorem.</p>
                    <p>danieldarmon20@gmail.com</p>
                    <p>
                        <button class="button">Contact</button>
                    </p>
                </div>
            </div>
        </div>
    </div>
    </body>
    </html>
<?php include "./inc/footer.php" ?>