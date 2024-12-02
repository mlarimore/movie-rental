<?php
$title = $rental->movie()->title();
$price = $rental->price();
$html = <<<"EOT"
  > $title: $price<br/>
EOT;

echo $html;
