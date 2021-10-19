<?php
$censuredWord = isset($_POST["word"]) && trim($_POST["word"]) != "" ? $_POST["word"] : null;
$replacedWord = "censured";
$p =
    "
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus similique aperiam repudiandae perferendis esse, enim quo ab veritatis perspiciatis dolore, voluptatibus non error, voluptas totam aspernatur veniam mollitia consequatur consequuntur!
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti laudantium, quam tempore, porro dolore, minima in odio assumenda quos ipsa omnis consequuntur voluptatem! Commodi pariatur reiciendis quisquam omnis rem culpa.
    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sed praesentium quia perferendis optio eligendi quas porro exercitationem cum vero inventore, fuga, ut unde aspernatur nesciunt non quisquam sequi tenetur excepturi?
    ";
$p_censured = str_ireplace($censuredWord, "<span class='censured'>" . $replacedWord . "</span>", $p);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            padding: 1em;
        }

        p,
        form {
            /* border-top: 0.1em solid; */
            border-bottom: 0.1em solid;
            padding-bottom: 0.5em;
            margin-bottom: 0.5em;
        }

        .censured {
            background-color: black;
            color: white;
            font-family: monospace;
            padding: 0 0.2em;
            margin: 0 0.1em;
            font-weight: bold;
            text-decoration: line-through;
        }
    </style>
</head>

<body>
    <form method="POST">
        <div>
            <label for="word">
                <input type="text" name="word" id="word">
                <button type="submit">Censura</button>
            </label>
        </div>
    </form>
    <p>
        Lunghezza testo: <strong><?php echo strlen($p); ?></strong>
    </p>
    <p>
        <?php echo $p; ?>
    </p>
    <?php if ($censuredWord) { ?>
        <p>
            Parola da censurare: <strong><?php echo $censuredWord; ?></strong>
        </p>
        <p>
            <?php echo $p_censured; ?>
        </p>
        <p>
            Lunghezza testo: <strong><?php echo strlen($p_censured); ?></strong>
        </p>
    <?php } ?>
</body>

</html>