
<HEAD>

<title> Quiz Intro </title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" style="text/css" href="../CSS/quiz_landing.css">

<!-- linking material design -->
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.grey-blue.min.css">
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>


	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-129016827-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-129016827-1');
</script>

<link rel="icon" href="../QuestionPics/favicon.png">


</HEAD>

<header>

</header>

<body>
	<h1>
		Quiz Instructions/Notes:
	</h1>
	<div id="container">
		The "Show answer explanation" button on the top left does what it sounds like but answer explanations are only available for some questions (still writing these). The "next" button on the top right of the page takes you to the next question. The "previous question" button takes you to the previous question. When you reach the last question there will be a "submit" button in place of the "next question" button. You can click submit and it will display the number of question you got right in small letters, right above the last question. After clicking submit, to see which of the questions were right or wrong, click the previous question button. This will take you back through the quiz. The questions you got right will be highlighted in green and the questions you got wrong will be red. On the bottom of each question there is a counter for the number of remaining questions. --Michael
	</div>

<?php 
	$cat_names = array_keys($_GET);
	$conditions='';
	$i=0;
	$topic='';
		foreach($_GET as $cat) {
			if ($i === 0) {
				$conditions=$conditions.''.$cat_names[$i]."=".$cat;
				$i++;
				$topic=$cat;
			}else{
				$conditions=$conditions.'&'.$cat_names[$i]."=".$cat;
				$topic=$topic.' and '.$cat;
			}
		}
		$topic = str_replace('"', '', $topic)
?>

	<div id="button">
	<button id="start" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">Start Quiz on <?php echo $topic; ?></button>
	</div>

	<div id = "test">
	</div>

	<script type="text/javascript">

		var cats = '<?php echo $conditions ;?>';
		document.getElementById("start").onclick = function () {
        location.href = "questions_cat.php?"+cats;
    };
	</script>
</body>

