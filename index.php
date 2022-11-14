<?php
    function getPk($n, $k)
    {
        return ($n - abs($n + 1 - $k)) / ($n*$n);
    }

    
    $n = 20;
    $table_14_tmp_data = [];

?>

<style>
    body
    {
        background-color: black;
        color: white;
    }
</style>

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
<hr>
<table border="1px">
    <tr>
        <td>
            y = x<sub>1</sub> +  x<sub>2</sub>
        </td>
        <?php
            for($k = 2; $k <= $n*2; $k++)
            {
                echo "<td>".$k."</td>";
            } 
        ?>
    </tr>
    <tr>
        <td>
            p<sub>k</sub>
        </td>
        <?php
            for($k = 2; $k <= $n*2; $k++)
            {
                $value = getPk($n, $k);
                $value = number_format($value, 4);
                echo "<td>".$value."</td>";
            } 
        ?>
    </tr>
</table>
<hr>
<table border="1px">
    <tr>
        <td>
            x<sub>1</sub>/y
        </td>
        <?php
            for($k = 2; $k <= $n*2; $k++)
            {
                echo "<td>".$k."</td>";
            } 
        ?>
    </tr>
    <?php
        for($i = 1; $i <= $n; $i++)
        {
            echo "<tr> <td>".$i."</td>";
            for($j = 2; $j <= $n*2; $j++)
            {
                $value = 0;
                if($j-$i >= 1 && $j-$i <= $n) 
                {
                    $value = 1/($n*$n);
                    $value = number_format($value, 4);
                }
                echo "<td>".($value)."</td>";
            }
            echo "</tr>";
        } 
    ?>
</table>
<hr>
<table border="1px">
    <tr>
        <td>
            x<sub>1</sub>/y
        </td>
        <?php
            for($k = 2; $k <= $n*2; $k++)
            {
                echo "<td>".$k."</td>";
            } 
        ?>
    </tr>
    <?php
        for($i = 1; $i <= $n+1; $i++)
        {
            //sum row
            if($i == $n+1)echo "<tr><td>Sum</td>";
            else echo "<tr> <td>".$i."</td>";

            for($j = 2; $j <= $n*2; $j++)
            {
                $value = 0;
                if($i == $n+1)
                {
                    $value = $table_14_tmp_data[$j];
                }
                else 
                {
                    if($j-$i >= 1 && $j-$i <= $n) 
                    {
                        $value = (1/($n*$n)) * log((1/($n*getPk($n, $j))), 2);
                        $value = number_format($value, 4);
                    }
                    
                    //calculate total by y-axis
                    if(!isset($table_14_tmp_data[$j])) $table_14_tmp_data[$j] = 0;
                    $table_14_tmp_data[$j] += $value;
                    $table_14_tmp_data[$j] = number_format($table_14_tmp_data[$j], 4);
                    
                }
                echo "<td>".($value)."</td>";
               
            }
            $last_column = '';
            if($i == $n+1) $last_column =  number_format(array_sum(array_values($table_14_tmp_data)), 4);
            echo "<td>".$last_column."</td></tr>";

            
        } 
    ?>
</table>