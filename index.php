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
                width : 100%;
                display : block;
            }

            body > section > div {
                position : absolute;
                background-color : #fdfcf0;
                padding : 10 10px;
                left : 380.594px;
                width : 1522.41px;
                height : 655.891px;
                float : right;
            }

            footer {
                border-top : 2px solid #bebebe;
                position : absolute;
                background-color :  #fdfcf0;
                width : 100%;
                height : 93.688px;
                top : 843.271px;
                float : left;
                text-align : center;
            }
        </style>
    </head>
    <body>
        <?php
            include "header.php";
        ?>
        
        <section>
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
            <div>
            </div>
        </section>
        <footer>
            <?php
                include "footer.php";
            ?>
        </footer>
    </body>
</html>