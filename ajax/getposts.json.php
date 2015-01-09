<?php

header("Content-type: application/json");

// Do a calculation on the server, return the result in JSON

$datestart = date_parse($_REQUEST['startdate']);
$dateend = date_parse($_REQUEST['enddate']);

$posts = array(
    "10/01/2014" => array("title" => "hello there", "body" => "this is a test post!"),
    "10/02/2014" => array("title" => "Tesla", "body" => "The $35,000 Model 3 Tesla could change everything for the auto industry"),
    "10/03/2014" => array("title" => "BMW", "body" => "German automaker BMW said on Wednesday it is recalling about 1.6 million cars "),
    "10/04/2014" => array("title" => "Galaxy S5", "body" => "SALES of Samsung's Galaxy S5 are still struggling to match those of Apple's iPhone 5S smartphone"),
    "10/05/2014" => array("title" => "Sprint/Tmobile", "body" => "A Sprint and T-Mobile merger deal is beginning to look likely"),
    "10/06/2014" => array("title" => "Netflix", "body" => "Netflix has quietly stopped shipping DVDs on Saturdays"),
    "10/07/2014" => array("title" => "Dodge", "body" => "The 2015 Dodge Challenger is already well on its way to shattering the minds of the automotive world"),
    "10/08/2014" => array("title" => "Giant Hole", "body" => "Researchers are to investigate a giant mysterious hole that has appeared in one of Russia's most isolated northernmost regions"),
    "10/02/2014" => array("title" => "Scientists", "body" => "Scientists looking for signs of life in the universe - as well as another planet like our own - are a lot closer to their goal than people realize"),
    "10/03/2014" => array("title" => "A bat", "body" => "A bat that bit a suburban Kansas City man has tested positive for rabies"),
    "10/04/2014" => array("title" => "Europa", "body" => "Under its icy crust, Jupiter's moon Europa could harbor a vast ocean of potentially life-supporting liquid water"),
    "10/05/2014" => array("title" => "Wisconsin Worms", "body" => "Wisconsin's newest invasive species has done its best to stay underground"),
    "10/06/2014" => array("title" => "Niacin", "body" => "Niacin may sound like an easy and natural way to lower cholesterol"),
    "10/05/2014" => array("title" => "Illness", "body" => "A mysterious illness has sickened more than 200 people in Washington state"),
    "10/06/2014" => array("title" => "Pacemaker", "body" => "By injecting a gene into a pig's heart, scientists have created a “biological pacemaker” that can regulate heartbeats"),
    "10/07/2014" => array("title" => "Diabetic Mice", "body" => "Scientists have discovered a novel protein-based treatment that restores normal blood-sugar levels in diabetic mice"),
    "10/08/2014" => array("title" => "Billionaire", "body" => "Billionaire investors Carl Icahn and William Ackman made up publicly on stage "),
);

$result = array();
foreach ($posts as $dstr => $p) {
    $d = date_parse($dstr);
    if ($d >= $datestart && $d <= $dateend) {
        $p['date'] = $dstr;
        $result[] = $p;
    }
}

echo json_encode($result);
