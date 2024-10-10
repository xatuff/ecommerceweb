<html>
    <title>test</title>
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

                .search{
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

                .icon{
                    color: white;
                    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
                }

                .font{
                    color: white;                
                    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
                }

                .add{
                    color: white;
                    background-color: #F1AB3D;
                    width: 250px;
                    height: 50px;
                    text-align: center;
                    cursor: pointer;
                    margin-top: 50px;
                    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
                }
                
                .add:hover {
                    cursor: pointer;
                    transform: scale(1.1);
                    transition: all 0.4s;
                    color: black;
                    background-color: white;
                }



                .out{
                    outline: 2px solid white;
                    
                    height: 50vh;
                    width: 100vh;
                    background-position: center;
                    justify-content: center;
                    border-radius: 10px;
                }

                </style>

                <div class="black_bar">
                    <img src="navbar.jpg" class="navlogo">
                    <img src="pixellogo2.jpg" class="pixellogo2">
                    <img src="search.jpg" class="search">
                    <img src="cart.jpg" class="cartlogo">
                </div>   
                <br>
                <table border="0px" align="center">
                    <tr>
                        <td bgcolor="#11378A" class="icon"align="center" width="450px" height="450px">GAME ICON</td>
                        <td class="font" align="center" width="300px"><br><br><br><br><br><br>GAME TITLE :<br>PRICE:<br><br><br><br><br><br><br><br>
                        ID / YEAR PUBLISHED / GENRE <br><b style="color: limegreen"><br>(Availability)</b><br><button class="add">ADD TO CART</button></td>
                    </tr>

                    <tr height="100px">
                        <td class="font"><br><br><h2><u>OVERVIEW</u></h2></td>
                        <td></td>
                    </tr>
                </table>
                <center>
                <div class="out">
                <h3 align="center" class="font"><br><br><br><br><br><br><br><br>(GAME OVERVIEW)</h3><br><br><br><br>
                </div>
                <br>
        </body>

</html>