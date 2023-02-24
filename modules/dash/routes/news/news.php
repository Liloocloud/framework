<?php
$Mkd = new Helpers\Markdown;
echo $Mkd->text(file_get_contents($This[$Module]['DASH_ROUTES_ROOT'].'news/news.md'));