<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Error - Raimond-code.com</title>
</head>
<body>
    
    <h1>Erreur 404</h1>

    <div>
        <h3>Cette page n'a pas l'aire d'exister...</h3>
        <img src="./assets/error_404.png">
    </div>

    <button onclick="location.href='./index.php'">Retour à l'accueil</button>

    <style>

@import url('https://fonts.googleapis.com/css2?family=Noto+Sans:wght@700&display=swap');

        body{
            margin: 0;
            width: 100%;
            height: 100%;
            background: #052632;
        }

        h1, h3{color: white; font-family: 'Noto Sans' , sans-serif;}
        button{font-family: 'Noto Sans' , sans-serif;}

        h1{
            font-size: 5em;
            display: block;
            margin: 80px auto;
            text-align: center;
        }

        div{
            width: 80%;
            max-width: 450px;
            display: block;
            margin: 40px auto;
        }
        
        div h3{
            text-align: center;
        }

        div img{
            display: block;
            width: 80px;
            margin: auto;
        }

        button{
            padding: 15px;
            text-align: center;
            justify-content: center;
            align-items: center;
            border: 2px solid orange;
            background: none;
            border-radius: 10px;
            color: orange;
            transition: .2s ease-in-out;
            cursor: pointer;

            display: block;
            margin: 40px auto;
        }
        button:hover{
            color: white;
            transition: .2s ease-in-out;
        }

        @media (min-width: 1000px) {
            div{
                display: flex;
                justify-content: space-between;
            }

            div h3{text-align: left;}
            div img{margin: 0;}
        }

    </style>

</body>
</html>