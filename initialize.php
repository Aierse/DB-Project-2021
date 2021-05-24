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


            a {
                text-decoration : none;
            }

            header {
                width : 100%;
                height : 187.38px;
                float : center;
            }

            aside {
                position : absolute;
                background-color : #fdfcf0;
                width : 380.594px;
                height : 655.891px;
            }

            aside > nav {
                padding : 0 19.016px;
            }

            body > section {
                background-color : skyblue;
                width : 80%;
                height : 655.891px;
                float : right;
            }

            footer {
                background-color : #fef8dc;;
                width : 100%;
                height : 93.688px;
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