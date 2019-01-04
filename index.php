
<html lang="en">

<head>

    <link rel="icon" href="QuestionPics/favicon.png">

    <title>Aleph-Bais Practice</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-129016827-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-129016827-1');
    </script>

<link rel="stylesheet" type="text/css" href="CSS/index.css">

<!-- linking to google material design-->
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.grey-blue.min.css">
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>

<!-- link ajax -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Add mathjx to page -->
<script type="text/javascript" async
  src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.5/latest.js?config=TeX-MML-AM_CHTML">
</script>

</head>




<header class="header">


</header>

<body class="body">

<div class="navbar">
  <button id= "back" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">Back</button>
  <script type="text/javascript">
       document.getElementById("back").onclick = function () {
        location.href = "index.php";
    };
  </script>
</div>



      <h1>Aleph-Bais Practice</h1>
        <h1>
        <button id= "rand q" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">Random Letter</button>
        <button id= "category quizes" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">List Links to Nekudos Quizes</button>
      </h1>
<ul>
      <p id="questions"> </p>
      <p id="Quizes by Category"> </p>
</ul>

<div class = "text">
        <h1> <div class = "text"> Create custom quiz</div></h1>
 <form action = "/action_page.php">
  <fieldset>
  <label>
    <div class = "text">
   Select the nekudos you would like to be quizzed on. Hold cntrl to select more than one option. 
 </div>
  </label>
  <select id = "selNekudos" multiple = "multiple" size = "9">
   <option value = "chirik">chirik</option>
   <option value = "cholum">cholum</option>
   <option value = "kumatz">kumatz</option>
   <option value = "milupum">milupum</option>
   <option value = "pasach">pasach</option>
   <option value = "segol">segol</option>
   <option value = "shiva">shiva</option>
   <option value = "shuruk">shuruk</option>
   <option value = "tzeirei">tzeirei</option>
  </select>

<p></p>

<div>Maximum number of flash cards: <input type="text" name = 
"q_param" id = "numQuestions" value=25>
</div>


  <br>
  <button type = "button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent"
    onclick = "showChoices()">
   Submit 
  </button>
  </br>

  </fieldset>
 </form>
</div>

 <div id = "output">
 </div>


<script type = "text/javascript">
  //from multi-select.html
  function showChoices(){
  //retrieve data
  var selNekudos = document.getElementById("selNekudos");
  //set up output string
  var result;
  //step through options
  var num_selected=0;
  for (i = 0; i < selNekudos.length; i++){
   //examine current option
   currentOption = selNekudos[i];
   //print it if it has been selected
   if (currentOption.selected == true){
    num_selected+=1;
    if(num_selected==1){
      result = "("+"\""+currentOption.value+"\""+",";
    }else{
   result +="\""+currentOption.value+"\""+",";
   }
   } // end if
   } // end for loop
  //finish off the list and print it out
    result = result.replace(/,\s*$/, "");

    //now get the num questions parameter from the text box
    var question_param = document.getElementById("numQuestions").value;

 location.href = "PHP/questions_cat.php?numQuestions="+question_param+"&"+"Vowel="+result+")";
  } // end showChoices
 </script>
 



<ul>

        <script type="text/javascript" src="JavaScript/random_question.js"></script>
  <?php
  include('PHP/query_index.php');
  ?>

      <script type="text/javascript">var questions =<?php echo json_encode($row_questions); ?>;</script>
      <script type="text/javascript" src="JavaScript/random_question.js"></script>

      <script type="text/javascript">var rowcount_questions =<?php echo json_encode($rowcount_questions); ?>;</script>
      <script type="text/javascript" src="JavaScript/random_question.js"></script>

      <script type="text/javascript">var quizes =<?php echo json_encode($row_quizes); ?>;</script>
      <script type="text/javascript" src="JavaScript/random_question.js"></script>

      <script type="text/javascript">var rowcount_quizes =<?php echo json_encode($rowcount_quizes); ?>;</script>
      <script type="text/javascript" src="JavaScript/random_question.js"></script>


</body>

<?php
include('PHP/Formats/footer.php');
?>

</html>