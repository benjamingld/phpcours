
<div class="container mt-3">
<?php
    // for ($i = 1; $i <= 10; $i++) {
    //     echo "ligne".$i."<br>";

    // }
?>
</div>

<div class="container mt-3">
<?php
    // for($i = 10; $i<=10; $i--) {
    //     echo "ligne".$i."<br>";

    // }
?>
</div>

<div class="container mt-3">
    <table border=1 cellpadding="4">

        <?php
            for($i = 1; $i<=20; $i++) {

                if($i% 2 == 1) {
                    echo "<tr style=\"background-color:#CCC\">";
                }else {
                    echo "<tr>";
                }

                    for($j= 1; $j<=10; $j++)
                        echo "<td>i=$i j=$j ($i*$j)</td>";

                echo "</tr>";

            }
        ?>   

    </table>
</div>