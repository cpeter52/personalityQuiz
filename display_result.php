
<?php
$ans1 = $_POST["question_1"];
$ans2 = $_POST["question_2"];
$ans3 = $_POST["question_3"];
$ans4 = $_POST["question_4"];
$ans5 = $_POST["question_5"];
$ans6 = $_POST["question_6"];
$ans7 = $_POST["question_7"];


$q1_answers = array(
    "Less than 3"=>0,
    "3-10"=>5,
    "More than 10"=>10
);
$q2_answers = array(
    "Romance/ Reality TV"=>0,
    "Action/ Thriller /Crime"=>3,
    "Drama/ Documentary/Natural Films"=>6,
    "Comedy / Animation"=>9,
    "Science Fiction/ Fantasy"=>12
);
$q3_answers = array(
    "Nope"=>0,
    "Only what I studied in school"=>5,
    "Of Course!"=>10
);
$q4_answers = array(
    "Get whatever the sales person says is best for my needs"=>0,
    "Get a model identical or similar to that of my friends"=>2,
    "Ask a friend or read reviews online"=>5
);
$q5_answers = array(
    "Ugh. I didn't like ANYTHING in school"=>0,
    "Physical Education"=>2,
    "Art Literature or History"=>3,
    "Computers, Math or Science"=>10
);
$q6_answers = array(
    "Buy a new one"=>0,
    "Take it to my usual repair shop"=>2,
    "Try to fix it myself with some help from the net"=>10,
);
$q7_answers = array(
    "Out at party or bar"=>0,
    "Gaming with friends"=>5,
    "Surfing the net or reading a book"=>10
);


$answers = array(
    $q1_answers[$ans1],
    $q2_answers[$ans2],
    $q3_answers[$ans3],
    $q4_answers[$ans4],
    $q5_answers[$ans5],
    $q6_answers[$ans6],
    $q7_answers[$ans7]
);


$geekiness_level = "";
$img = "";
$description = "";


function calculate_result($answers)
{

    global $description, $geekiness_level, $img;

    $total = 0;

    foreach ($answers as $answer) {
        $total += $answer;
    }


    switch (true) {
        case $total >= 0 && $total <= 10:
            $geekiness_level = "Non-Geek";
            $img = "non_geek.jpg";
            $description = "There isn't a single geeky bone in your
                            body. You prefer to party rather than study,
                            and have someone else fix your computer, if
                            need be. You're just too cool for this. You
                            probably don't even wear glasses!";
            break;

        case $total > 10 && $total <= 50:
            $geekiness_level = "Semi-Geek";
            $img = "semi_geek.jpg";
            $description = "Maybe you're just influenced by the trend, or
                            maybe you just got it all perfectly balanced.
                            You have some geeky traits, but they aren't
                            as \"hardcore\" and they don't take over your
                            life. You like some geeky things, but aren't
                            nearly as obsessive about them as the
                            uber-geeks. You actually get to enjoy both
                            worlds";
            break;

        case $total > 50 && $total <= 72:
            $geekiness_level = "Uber-Geek";
            $img = "uber_geek.jpg";
            $description = "You are the geek supreme! You are likely to
                            be interested in technology, science, gaming
                            and geeky media such as Sci-Fi and
                            fantasy. All the mean kids that used to laugh
                            at you in high school are now begging you
                            for a job. Be proud of your geeky nature, for
                            geeks shall inherit the Earth!";
            break;

        default:
            $geekiness_level = "Error";
            $img = "";
            $description = "Error, please contact the page administrator.";
            break;
    }

}


calculate_result($answers);


?>

<!DOCTYPE html>
<html>
<head>
    <title>Personality Quiz</title>

    <style type="text/css">
        #imgResult {
            width:400px;
            height:400px;
        }

        #pResult {
            word-wrap: break-word;
            width: 400px;
        }

    </style>

</head>
<body>

<h1>Quiz Result: <?php echo $geekiness_level; ?></h1>
<img src="img/<?php echo $img; ?>" id="imgResult">
<p id="pResult">
    <?php echo $description; ?>
</p>


</body>
<html>