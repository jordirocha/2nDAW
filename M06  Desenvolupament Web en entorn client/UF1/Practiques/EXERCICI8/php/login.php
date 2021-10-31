<?php
$info = file_get_contents('php://input');
$info = json_decode($info);

if ($info->{"user"} == "jordi" && $info->{"pass"} == "rocha") {
    echo 1;
} else if ($info->{"user"} != "jordi") {
    echo -1;
} else {
    echo -2;
}
