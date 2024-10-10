<html>
    <body background="background.jpg">
        <style>

        .black_bar{
            background-color: black;
            display: flex;
            align-items: center;
            padding: 10px;
            text-align: center;
            border-radius: 10px;
        }

        .navlogo{
            width: 80px;
            height: auto;
            margin-left: 30px;
            cursor: pointer;
        }

        .navlogo:hover {
            cursor: pointer;
            transform: scale(1.1);
            transition: all 0.4s;
        }

        .pixellogo2{
            width: 260px;
            height: auto;
            display: inline-block;
            margin: auto;
            cursor: pointer;
        }

        .pixellogo2:hover {
            cursor: pointer;
            transform: scale(1.1);
            transition: all 0.4s;
        }

        .search {
            width: 60px;
            height: auto;
            cursor: pointer;
        }

        .search:hover {
            cursor: pointer;
            transform: scale(1.1);
            transition: all 0.4s;
        }

        .cartlogo{
            width: 80px;
            height: auto;
            margin-right: 1px;
            cursor: pointer;
            padding-left: 10px;
        }

        .cartlogo:hover {
            cursor: pointer;
            transform: scale(1.1);
            transition: all 0.4s;
        }

        .head{
            background-color: black;
            color: white;
            padding-top: 20px;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            text-align: center;
            padding-bottom: 20px;
            border-radius: 80px;
            outline: solid white;
        }
        .game{
            background-color: #11378A;
            color: white;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            cursor: pointer;
        }
        .cart{
            color: white;
            cursor: pointer;
        }
        .cartbutt{
            background-color: #F1AB3D;
            color: white;
            border-radius: 30px;
            padding: 10px;
            width: 35vh;
            height: 10vh;
            font-size: 20;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif ;
        }
        .cartbutt:hover {
            cursor: pointer;
            transform: scale(1.1);
            transition: all 0.4s;
            color: black;
            background-color: white;
        }
        .game2{
            background-color: white;
            color:black;
        }
        .gametab{
            border-radius: 8px;
        }
        .game-container {
            overflow-x: auto;
            width: 100%;
        }
        .gametab {
            display: inline-block;
            width: 2000px;
            padding: 10px;
            border-spacing: 10px;
        }
        .game-container::-webkit-scrollbar {        
            display: flex;
            background-color: rgba(104, 103, 103, 0.792);
            border-radius: 30px;
            border-width: 10px;
        }
        .game-container::-webkit-scrollbar-thumb{
            background-color: white;
            border-radius: 30px;
            
        }
        .color{
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
        }
        .color2{
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
        }

    </style>

                <div class="black_bar">
                    <img src="navbar.jpg" class="navlogo">
                    <img src="pixellogo2.jpg" class="pixellogo2">
                    <img src="search.jpg" class="search">
                    <img src="cart.jpg" class="cartlogo">
                </div>   

                <h1 class="head">GAMES</h1>
             
            <div class="game-container">
            <table align="center" class="gametab">
                <tr align="center" class="game">
                    <td width="300px" height="400px"class="color">GAME ICON</td>
                    <td width="300px" height="400px"class="color">GAME ICON</td>
                    <td width="300px" height="400px"class="color">GAME ICON</td>
                    <td width="300px" height="400px"class="color">GAME ICON</td>
                    <td width="300px" height="400px"class="color">GAME ICON</td>
                    <td width="300px" height="400px"class="color">GAME ICON</td>
                    <td width="300px" height="400px"class="color">GAME ICON</td>
                </tr>
                <tr align="center" class="game2">
                    <td height="140px" class="color2">GAME TITLE (AVAILABILITY)</td>
                    <td class="color2">GAME TITLE (AVAILABILITY)</td>
                    <td class="color2">GAME TITLE (AVAILABILITY)</td>
                    <td class="color2">GAME TITLE (AVAILABILITY)</td>
                    <td class="color2">GAME TITLE (AVAILABILITY)</td>
                    <td class="color2">GAME TITLE (AVAILABILITY)</td>
                    <td class="color2">GAME TITLE (AVAILABILITY)</td>
                </tr>
                <tr align="center" class="cart">
                    <td><button class="cartbutt">ADD TO CART</button></td>
                    <td><button class="cartbutt">ADD TO CART</button></td>
                    <td><button class="cartbutt">ADD TO CART</button></td>
                    <td><button class="cartbutt">ADD TO CART</button></td>
                    <td><button class="cartbutt">ADD TO CART</button></td>
                    <td><button class="cartbutt">ADD TO CART</button></td>
                    <td><button class="cartbutt">ADD TO CART</button></td>
                </tr>
            </table>
            </div>
            <br><br><br><br><br>
    </body>
</html>