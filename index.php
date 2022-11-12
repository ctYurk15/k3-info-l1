<style>
    body
    {
        background-color: black;
        color: white;
    }
</style>

<?php

$n = 20;

?>

<table border="1px">
    <tr>
        <td>
            x<sub>1</sub> =  x<sub>1,i</sub>
        </td>
        <?php
            for($i = 1; $i <= $n; $i++)
            {
                echo "<td>".$i."</td>";
            } 
        ?>
        <td>
            x<sub>2</sub> =  x<sub>2,j</sub>
        </td>
    </tr>
    <tr>
        <td>
            p<sub>i</sub>
        </td>
        <td colspan="<?= $n ?>">
            <?= 1/$n ?>
        </td>
        <td>
            q<sub>j</sub>
        </td>
    </tr>
</table>
<hr>
<table border="1px">
        <?php
            for($i = 0; $i <= $n; $i++)
            {
                echo "<tr>";

                if($i == 0) echo "<td>x<sub>2</sub> \  x<sub>1</sub></td>";
                else echo "<td>".($i)."</td>";

                for($j = 1; $j <= $n; $j++)
                {
                    echo "<td>".($j+$i)."</td>";
                }
                echo "</tr>";
            }
        ?>
</table>
