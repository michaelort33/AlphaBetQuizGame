
  (function() {
        function shuffle(array) {
      var currentIndex = array.length;
      var temporaryValue;
      var randomIndex;

      // While there remain elements to shuffle...
      while (0 !== currentIndex) {

        // Pick a remaining element...
        randomIndex = Math.floor(Math.random() * currentIndex);
        currentIndex -= 1;

        // And swap it with the current element.
        temporaryValue = array[currentIndex];
        array[currentIndex] = array[randomIndex];
        array[randomIndex] = temporaryValue;
      }

      return array;

    }

    var my_list=[];
    for(var i =0; i<rowcount; i++){
      my_list.push(i);
    }

    my_list=shuffle(my_list);

    const myQuestions = [];
    for (var x = 0; x <rowcount && x<numQuestions; x++) {
        myQuestions[x]={
        path: row[my_list[x]][0],
        answers: {
          a: row[my_list[x]][1],
          b: row[my_list[x]][2]
        },
        correctAnswer: row[my_list[x]][3],
      };
    }

  function buildQuiz() {
    // we'll need a place to store the HTML output
    const output = [];

    // for each question...
    myQuestions.forEach((currentQuestion, questionNumber) => {  
      // we'll want to store the list of answer choices
      const answers = [];

      // and for each available answer...
      for (letter in currentQuestion.answers) {
        // ...add an HTML radio button
        answers.push(
          `<label>
             <input type="radio" name="question${questionNumber}" value="${letter}">
              ${letter} :
              ${currentQuestion.answers[letter]}
           </label>`
        );
      }

      // add this question and its answers to the output
      // don't add a link to a pic if you see there is no pic
    output.push(
        `<div class="slide">
        <div id = "results" class = "results"></div>
        <div id = "progress">There are ${myQuestions.length-questionNumber-1} questions remaining (after this one).</div>
        <div class="question"><div class="text"> Please pronounce the letter with the nekudos: </div></div>
           <div class="img"> <img src=${currentQuestion.path} alt="test", class="center"></div>
           <div class="answers"> ${answers.join("")} </div>
           <div id=ans_expl${questionNumber} class="hidden">
 			</div>
         </div>`
      );
    });

    // finally combine our output list into one string of HTML and put it on the page


      quizContainer.innerHTML = output.join("");

  }

  function showResults() {
    // gather answer containers from our quiz
    const answerContainers = quizContainer.querySelectorAll(".answers");

    // keep track of user's answers
    let numCorrect = 0;

    // for each question...
    myQuestions.forEach((currentQuestion, questionNumber) => {
      // find selected answer
      const answerContainer = answerContainers[questionNumber];
      const selector = `input[name=question${questionNumber}]:checked`;
      const userAnswer = (answerContainer.querySelector(selector) || {}).value;
      const userAnswer2 = currentQuestion.answers[userAnswer];

      // if answer is correct
      if (userAnswer2 === currentQuestion.correctAnswer) {
        // add to the number of correct answers
        numCorrect++;

        // color the answers green
        answerContainers[questionNumber].style.color = "lightgreen";
      } else {
        // if answer is wrong or blank
        // color the answers red
        answerContainers[questionNumber].style.color = "red";
      }
    });

    // show number of correct answers out of total
    resultsContainer.innerHTML = ` You got <b>${numCorrect}</b> letters correct out of <b>${myQuestions.length}</b> letters`; 
  }

  function showSlide(n) {
    slides[currentSlide].classList.remove("active-slide");
    slides[n].classList.add("active-slide");
    currentSlide = n;
    
    if (currentSlide === 0) {
      previousButton.style.display = "none";
    } else {
      previousButton.style.display = "inline-block";
    }
    
    if (currentSlide === slides.length - 1) {
      nextButton.style.display = "none";
      submitButton.style.display = "inline-block";
    } else {
      nextButton.style.display = "inline-block";
      submitButton.style.display = "none";
    }
    
  }

  //hide or unhide with a button based on divID
  function unhide(clickedButton, divID) {
	var item = document.getElementById(divID);
	if (item) {
	    if(item.className=='hidden'){
	        item.className = 'unhidden';
	        clickedButton.value = 'Hide Answer Explanation';
	    }else{
	        item.className = 'hidden';
	        clickedButton.value = 'Show Answer Explanation';
	    }
  }}

  //reset what the answer button text reads based on whether the ans_expl div is hidden or not
  function resetAnswerExplButton(currentSlide){

  	if(document.getElementById("ans_expl"+currentSlide).className=="hidden"){
    }else{
    	unhide(ansButton,"ans_expl"+currentSlide);
    }
  }

  function showNextSlide() {
  	resetAnswerExplButton(currentSlide);
    showSlide(currentSlide+1);
  }

  function showPreviousSlide() {
  	resetAnswerExplButton(currentSlide);
    showSlide(currentSlide-1);
  }

  const quizContainer = document.getElementById("quiz");
  const resultsContainer = document.getElementById("results");
  const submitButton = document.getElementById("submit");



  // display quiz right away
  buildQuiz();

  const previousButton = document.getElementById("previous");
  const nextButton = document.getElementById("next");
  const slides = document.querySelectorAll(".slide");
  const ansButton=document.getElementById("ans");
  let currentSlide = 0;

  showSlide(0);

  // on submit, show results
  submitButton.addEventListener("click", showResults);
  previousButton.addEventListener("click", showPreviousSlide);
  nextButton.addEventListener("click", showNextSlide);


//set ansbutton to hide or unhide the answer explantion
  ansButton.addEventListener("click",function(){
  	unhide(ansButton,"ans_expl"+currentSlide);
  }
  	);

})();