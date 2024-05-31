<!doctype html>
<html lang="en">
<head>
    <title>Login V1</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins&display=swap");

        :root {
            --first-color: #fffbf2;
            --sec-color: #ffaa00;
        }

        body {
            background: #ffdd98;
            font-family: "Poppins", sans-serif;
        }

        .text-danger {
            color: red;
        }

        .text-primary {
            color: blue;
        }

        .container {
            width: 20em;
            height: 25em;
            background: var(--first-color);
            position: relative;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.438);
            overflow: hidden;
            border-radius: 10px;
            cursor: pointer;
        }

        .card {
            cursor: default;
            width: 100%;
            height: 100%;
            position: relative;
            z-index: 2;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 34px;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #212121;
            background-color: rgba(255, 255, 255, 0.074);
            border: 1px solid rgba(255, 255, 255, 0.222);
            -webkit-backdrop-filter: blur(20px);
            backdrop-filter: blur(20px);
            border-radius: 10px;
            transition: all ease 0.3s;
        }

        a {
            text-decoration: none;
        }

        .card h1 {
            text-decoration: none !important;
        }

        .container::after,
        .container::before {
            width: 100px;
            height: 100px;
            content: "";
            position: absolute;
            border-radius: 50%;
            transition: 0.5s linear;
        }

        .container::after {
            top: -20px;
            left: -20px;
            background-color: rgba(125, 214, 66, 0.603);
            animation: animFirst 5s linear infinite;
        }

        .container::before {
            background-color: rgb(226, 223, 54);
            top: 70%;
            left: 70%;
            animation: animSecond 5s linear infinite;
            animation-delay: 3s;
        }

        .container:hover {
            box-shadow: 0px 0px 10px rgba(0, 77, 32, 0.432);
        }

        .container:hover::after {
            left: 80px;
            transform: scale(1.2);
        }

        .container:hover::before {
            left: -10px;
            transform: scale(1.2);
        }

        /* Default styles for screens wider than 768px */
        .services {
            display: flex;
            justify-content: center; /* Horizontal centering */
            align-items: center; /* Vertical centering */
            height: 100vh;
            gap: 10rem;
        }

        /* Media query for screens 768px wide and below */
        @media (max-width: 768px) {
            .services {
                flex-direction: column; /* Stack containers vertically */
                gap: 2rem; /* Reduce the gap between containers */
            }

            .container {
                width: 15em;
                height: 18em;
            }
        }

        .cover {
            background-color: red;
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            height: 100vh;
            background-image: url("https://media.licdn.com/dms/image/D4E12AQF1U_Mj1atPUQ/article-cover_image-shrink_720_1280/0/1687468706322?e=2147483647&v=beta&t=zWE9jdSqyz9SWqg6zZ9L1WOJzKwG35S_FdKsHhoKPJw");
            background-size: cover;
            background-position: center;
            opacity: .3;
        }
    </style>
</head>
<body>
<div class="cover"></div>
<div class="services">

    @foreach($services as $service)
        <a class="container" href="{{ url('services/'.$service->id) }}">
            <div class="card">
                <h1>{{ $service->shortname }}</h1>
            </div>
        </a>
    @endforeach
</div>
</body>
</html>

