<?php

require_once '../../secret_php/prezdb.php';

$connekt = new mysqli($GLOBALS['host'],$GLOBALS['un'],$GLOBALS['magicword'],$GLOBALS['db']);

if (!$connekt) {
    echo 'Shit! Did not connect.';
};

$everyone = "SELECT y.*, c.candidateName, s.stateName, a.partyAbbr
                    FROM (SELECT r.* FROM results2016 r WHERE r.popVotes > 0) y
                    JOIN affiliations2016 a ON y.candidateID = a.candidateID AND y.stateAbbr = a.stateAbbr
                    JOIN candidates2016 c ON c.candidateID = y.candidateID
                    JOIN states s ON s.stateAbbr = y.stateAbbr
                ORDER BY y.stateAbbr";

$everyone2 = "SELECT r.*, c.candidateName, s.stateName, a.partyAbbr, p.partyName
                    FROM results2016 r WHERE r.popVotes > 0
                    JOIN affiliations2016 a ON r.candidateID = a.candidateID AND r.stateAbbr = a.stateAbbr
                    JOIN partiesspectrum p ON p.partyAbbr = a.partyAbbr
                    JOIN candidates2016 c ON c.candidateID = y.candidateID
                    JOIN states s ON s.stateAbbr = r.stateAbbr
                ORDER BY r.stateAbbr";            

$everyonedoesnotwork = "SELECT y.*, c.candidateName, s.stateName, p.partyName
                    FROM (SELECT r.* FROM results2016 r WHERE r.popVotes > 0) y
                    JOIN affiliations2016 a ON y.candidateID = a.candidateID AND y.stateAbbr = a.stateAbbr
                    JOIN partiesspectrum p ON p.partyAbbr = a.partyAbbr
                    JOIN candidates2016 c ON c.candidateID = y.candidateID
                    JOIN states s ON s.stateAbbr = y.stateAbbr
                ORDER BY y.stateAbbr";            

$result = mysqli_query($connekt, $everyone);

if (!$result){
    echo "Nope. I got nothin.";
}
else {
    $rows = array();
    while ($row = mysqli_fetch_array($result)) {
        $row['popVotes'] = (int) $row['popVotes'];
        $rows[] = $row;
    }
    echo json_encode($rows);
}

mysqli_close($connekt);
?>