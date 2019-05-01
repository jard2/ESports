<?php
function display_before_after($sql, $name_of_display_func, $conn) {
    echo "<table><tr><th>Before</th><th>After</th></tr>";
    echo "<tr><td style=\"vertical-align:top\">";
    $name_of_display_func($conn);

    $return = mysqli_query($conn, $sql);
    if (!$return) {
        die('Could not perform action: '. mysqli_error($conn));
    }

    echo "</td><td style=\"vertical-align:top\">";
    $name_of_display_func($conn);
    echo "</td></tr></table>";
}
?>