
       document.getElementById("randq_from_quiz").onclick = function () {

        const i = Math.floor(Math.random() * rowcount_questions) + 1  

        location.href = "../PHP/questions_cat.php?numQuestions=\"1\"&Sku=\""+questions[i][0]+"\"";
    };