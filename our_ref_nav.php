<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .info-nav {

            height: 5vh;
            background-color: black;
            color: white;
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            border: none;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .info-nav .clgname {
            text-decoration: none;
            color: white;
            width: 30vw;
            font-size: normal;
            cursor: pointer;
        }

        .info-nav .clgname:hover {
            font-weight: bolder;
            transition: all 0.2s ease;
        }

        .aboutmam {
            display: block;
            width: 30vw;
            font-size: normal;
            cursor: pointer;

        }

        .aboutmam a {
            text-decoration: none;
            color: white;
        }

        .aboutmam:hover {
            font-weight: bolder;
            transition: all 0.2s ease;
        }

        .ids {
            width: 30vw;
            font-size: normal;
            display: flex;
            justify-content: space-around;
            cursor: pointer;
        }

        .ids a {
            text-decoration: none;
            color: white;
        }

        .ids a:hover {
            font-weight: bolder;
            transition: all 0.2s ease;
        }
    </style>
</head>

<body>
    <section class="info-nav" style="background-color:black;">
        <a href="https://sipnaengg.ac.in/" class="clgname">Sipna College Of Engineering & Techology</a>
        <center>
            <div class="aboutmam">
                <a href="">Mentor : Prof.R.Popli Mam</a>
            </div>
        </center>
        <div class="ids">
            <a href="">Manish</a>
            <a href="">Mandar</a>
            <a href="">Anushka</a>
            <a href="">Monika</a>
        </div>

    </section>
</body>

</html>