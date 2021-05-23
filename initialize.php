<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="UTF-8">
        <title>영화 예매 사이트</title>
        <style>
            * {
                font-family : "맑은 고딕";
                margin : 0;
                padding : 0;
                text-align : center;
            }

            html, body {
                width : 100%;
                height : 100%;
            }

            a {
                text-decoration : none;
            }

            header {
                width : 100%;
                height : 20%;
                float : center;
            }

            aside {
                background-color : #fdfcf0;
                width : 20%;
                height : 70%;
                float : left;
            }

            aside > nav {
                padding : 0 5%;
            }

            body > section {
                background-color : skyblue;
                width : 80%;
                height : 70%;
                float : right;
            }

            footer {
                background-color : violet;
                width : 100%;
                height : 10%;
                float : left;
                text-align : center;
            }
        </style>
    </head>
    <body>
        <header>
            <?php
                include "header.php";
            ?>
        </header>

        <aside>
            <?php
                include "loginform.php";
            ?>
            <nav>
                <?php
                    include "menu.php";
                ?>
            </nav>
        </aside>

        <section>
        </section>

        <footer>
            <?php
                include "footer.php";
            ?>
        </footer>
    </body>
</html>