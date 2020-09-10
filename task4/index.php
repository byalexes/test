<form method="post" action="">
    <p><b>Название футбольного клуба из Италии:</b>
        <input name="team" type="text" size="20">
    </p>
    <p><input type="submit" value="Отправить"></p>
</form>

<?php
include_once 'htmldom/HtmlWeb.php';
use simplehtmldom\HtmlWeb;

if ($_POST[team])
{
    $team = $_POST[team];
    $place = teamPlace($team);

    foreach ($place as $key => $value)
    {
        echo "В $key команда $team заняла $value место <br>";
    }
}

function teamPlaceYear($year, $team)
{
    $doc = new HtmlWeb();
    $html = $doc->load('https://terrikon.com/football/italy/championship/'.$year.'/table');

    for ($i=1;$i<21;$i++)
    {
        $res = $html->find('div[id=container] div[class=content-site] div[class=maincol] div[class=tab] table[class=colored big]', 0)
            ->children($i)->children(1)->children(0)->plaintext;
        if ($res == $team)
        {
            return $i;
        }
    }
    return '[не учавствовала]';
}


function teamPlace($team)
{
    $place = [];
    for ($i = 9; $i < 20; $i++) {
        $year = sprintf("%d-%s", $i + 2000, $i + 1);
        $place[$year] = teamPlaceYear($year, $team);
    }
    return $place;
}