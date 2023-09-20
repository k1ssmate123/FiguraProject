<div class="header">
                    <img src="img/header.jpg" id="headerPic" alt="">
                    <h2>Galéria</h2>
                </div>

<div class="row p-4 ">
<?php
    $images = glob('img/galery/*.{jpg,jpeg,png,gif,jfif}', GLOB_BRACE);

    for($i = 1;$i <count($images);$i++)
    {
        echo '<div class="col-md-4 text-center mb-3"><img class="img-fluid img-responsive center-block d-block mx-auto" src="img/galery/'.$i.'.jpg" alt="'.$i.'"></div>';
    }


?></div>