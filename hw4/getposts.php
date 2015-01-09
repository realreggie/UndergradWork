<?php

// pretend to be slow
//sleep(2);

// Do a calculation on the server, return the result in HTML

$datestart = strtotime($_REQUEST['startdate']);
$dateend = strtotime($_REQUEST['enddate']);
$title = $_REQUEST['title'];
$body = $_REQUEST['body'];
$favorites = $_REQUEST['favorites'];
$limit = $_REQUEST['limit'];
$sort = $_REQUEST['sort'];
$sort_descending = $_REQUEST['sort_descending'];

if (!$datestart || !$dateend) {
    header('HTTP/1.1 400 Bad Request');
    echo 'Both start and end date are required';
    return;
}
if ($favorites === '') {
    $favorites = null;
}
if ($favorites !== null && !is_numeric($favorites)) {
    header('HTTP/1.1 400 Bad Request');
    echo 'Favorites must be numeric';
    return;
}
if ($limit === '') {
    $limit = null;
}
if ($limit !== null && !is_numeric($limit)) {
    header('HTTP/1.1 400 Bad Request');
    echo 'Limit must be numeric';
    return;
}
$valid_sort = array(
    'date',
    'title',
    'favorites',
);
if ($sort === '') {
    $sort = null;
}
if ($sort !== null) {
    $sort = strtolower($sort);
    if (!in_array(strtolower($sort), $valid_sort)) {
        header('HTTP/1.1 400 Bad Request');
        echo 'Sort must be a valid sort field: ' . implode(', ', $valid_sort);
        return;
    }
}
if ($sort_descending === '') {
    $sort_descending = null;
}
if ($sort_descending !== null) {
    $sort_descending = strtolower($sort_descending);
    if ($sort_descending !== 'yes' && $sort_descending !== 'no') {
        header('HTTP/1.1 400 Bad Request');
        echo 'Sort descending parameter must be either "yes" or "no"';
        return;
    }
} 

header("Content-type: text/html");

$posts = array(
    array("date" => "11/01/2014", "title" => "hello there", "body" => "this is a test post!", "favorites" => 45),
    array("date" => "11/02/2014", "title" => "Tesla", "body" => "The \$35,000 Model 3 Tesla could change everything for the auto industry", "favorites" => 145),
    array("date" => "11/03/2014", "title" => "BMW", "body" => "German automaker BMW said on Wednesday it is recalling about 1.6 million cars", "favorites" => 5),
    array("date" => "11/04/2014", "title" => "Galaxy S5", "body" => "SALES of Samsung's Galaxy S5 are still struggling to match those of Apple's iPhone 5S smartphone", "favorites" => 0),
    array("date" => "11/05/2014", "title" => "Sprint/Tmobile", "body" => "A Sprint and T-Mobile merger deal is beginning to look likely", "favorites" => 100),
    array("date" => "11/06/2014", "title" => "Netflix", "body" => "Netflix has quietly stopped shipping DVDs on Saturdays", "favorites" => 324),
    array("date" => "11/11/2014", "title" => "Dodge", "body" => "The 2015 Dodge Challenger is already well on its way to shattering the minds of the automotive world", "favorites" => 34),
    array("date" => "11/08/2014", "title" => "Giant Hole", "body" => "Researchers are to investigate a giant mysterious hole that has appeared in one of Russia's most isolated northernmost regions", "favorites" => 1),
    array("date" => "11/02/2014", "title" => "Scientists", "body" => "Scientists looking for signs of life in the universe - as well as another planet like our own - are a lot closer to their goal than people realize", "favorites" => 0),
    array("date" => "11/03/2014", "title" => "A bat", "body" => "A bat that bit a suburban Kansas City man has tested positive for rabies", "favorites" => 23),
    array("date" => "11/04/2014", "title" => "Europa", "body" => "Under its icy crust, Jupiter's moon Europa could harbor a vast ocean of potentially life-supporting liquid water", "favorites" => 11),
    array("date" => "11/05/2014", "title" => "Wisconsin Worms", "body" => "Wisconsin's newest invasive species has done its best to stay underground", "favorites" => 345),
    array("date" => "11/06/2014", "title" => "Niacin", "body" => "Niacin may sound like an easy and natural way to lower cholesterol", "favorites" => 462),
    array("date" => "11/05/2014", "title" => "Illness", "body" => "A mysterious illness has sickened more than 200 people in Washington state", "favorites" => 11),
    array("date" => "11/06/2014", "title" => "Pacemaker", "body" => "By injecting a gene into a pig's heart, scientists have created a “biological pacemaker” that can regulate heartbeats", "favorites" => 46),
    array("date" => "11/11/2014", "title" => "Diabetic Mice", "body" => "Scientists have discovered a novel protein-based treatment that restores normal blood-sugar levels in diabetic mice", "favorites" => 45),
    array("date" => "11/08/2014", "title" => "Billionaire", "body" => "Billionaire investors Carl Icahn and William Ackman made up publicly on stage", "favorites" => 2)
);

$result = array();
$count = 0;
foreach ($posts as $p) {
    $d = strtotime($p['date']);
    if ($d >= $datestart 
            && $d <= $dateend 
            && ($favorites === null || $p['favorites'] >= $favorites)
            && (!$title || stripos($p['title'], $title) !== false)
            && (!$body || stripos($p['body'], $body) !== false)) {
            
        $p['link'] = "http://google.com/?s=" . urlencode($p['title']);
        $result[] = $p;
        if ($limit && ++$count >= $limit) {
            break;
        }
    }
}

if ($sort !== null) {
    $reverse = $sort_descending === 'yes' ? -1 : 1;
    usort($result, function($a, $b) use ($sort, $reverse) {
        $dataA = $a[$sort];
        $dataB = $b[$sort];
        if ($sort === 'date') {
            $result = strtotime($dataA) - strtotime($dataB);
        } else if (is_numeric($dataA) && is_numeric($dataB)) {
            $result = $dataA - $dataB;
        } else {
            $result = strcasecmp($dataA, $dataB);
        }
        return $reverse * $result;
    });
}
