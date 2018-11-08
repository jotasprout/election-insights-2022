<?php

require_once '../../secret_php/prezdb.php';

$connekt = new mysqli($GLOBALS['host'],$GLOBALS['un'],$GLOBALS['magicword'],$GLOBALS['db']);

if (!$connekt) {
    echo 'Shit! Did not connect.';
};

$getAllLeftAndTrump = "SELECT y.*, z.candidateName, s.stateName
FROM (SELECT r.stateAbbr, r.popVotes, r.candidateID
    FROM results2016 r
    WHERE r.candidateID IN
        (SELECT a.candidateID 
        FROM affiliations2016 a 
        JOIN (SELECT * FROM partiesspectrum 
            WHERE rating < 3
            AND rating > 0) p 
        ON a.partyAbbr = p.partyAbbr)
    AND r.candidateID = 29) y
JOIN candidates2016 z
ON z.candidateID = y.candidateID
JOIN states s ON s.stateAbbr = y.stateAbbr
ORDER BY y.stateAbbr";

$allLeftAndTrump = "SELECT * FROM results2016 r
WHERE (r.candidateID IN  (3,1,12,13,14,17,18,20,22,27,28,30,31)
OR r.candidateID = 29)
AND WHERE r.popVotes > 0";

$result = mysqli_query($connekt, $getSocialistResultsWithZero);

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