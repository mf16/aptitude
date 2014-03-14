////////EVALUATE DOMAIN AND RANGE IN THE PRETEST///////////
function domainRangeEvaluate(){
	var count=1;
	var problem = new Array();
	var correct = new Array();
	var pretestDomain = new Array();
	var pretestRange = new Array();
	while (count < 4){
		pretestDomain[count] = $('#pretest_domain_' + count).val();
		pretestRange[count] = $('#pretest_range_' + count).val();
		var answer = Math.pow(pretestDomain[count],2);
		answer = ((2 * answer) - pretestDomain[count]) * 5;
		if (answer == pretestRange[count]){
			//Correct answer
			correct[count] = 'yes';
		}
		count++;
	}
	while (count < 7){
		pretestDomain[count] = $('#pretest_domain_' + count).val();
		pretestRange[count] = $('#pretest_range_' + count).val();
		answer = 5 * ((3 * pretestDomain[count]) + 22);
		if (answer == pretestRange[count]){
			//Correct answer
			correct[count] = 'yes';
		}
		count++;
	}
	//Check to see if the domains are repeated in problems 1 and 2
	if (pretestDomain[1] == pretestDomain[2] || pretestDomain[1] == pretestDomain[3] || pretestDomain[2] == pretestDomain[3] || pretestDomain[4] == pretestDomain[5] || pretestDomain[4] == pretestDomain[6] || pretestDomain[5] == pretestDomain[6]){
		if(pretestDomain[1] !== '' || pretestDomain[2] !== '' || pretestDomain[3] !== '' || pretestDomain[4] !== '' || pretestDomain[5] !== '' || pretestDomain[6] !== ''){
			alert('You must enter different values for the domain in the first two pretest problems.');
		}
	}
	else{
		//No repeated domains, approved functions. Check to see if each value is correct with the formula
		if (correct[1] == 'yes' && correct[2] == 'yes' && correct[3] == 'yes'){
			problem[1] = 'correct';
		}
		if (correct[4] == 'yes' && correct[5] == 'yes' && correct[6] == 'yes'){
			problem[2] = 'correct';
		}
	}
	var pretestNonDomain = new Array();
	var pretestNonRange = new Array();
	count = 0 ;
	while (count < 4){
		pretestNonDomain[count] = $('#pretest_nonfunction_domain_' + count).val();
		pretestNonRange[count] = $('#pretest_nonfunction_range_' + count).val();
		count++;
	}
	//Evaluate the problem after all of the values have been inputted
		if (pretestNonDomain[1] == pretestNonDomain[2] && pretestNonRange[1] !== pretestNonRange[2]){
			problem[3] = 'correct';
		}
		else if (pretestNonDomain[1] == pretestNonDomain[3] && pretestNonRange[1] == pretestNonRange[3]){
			problem[3] = 'correct';
		}
		else if (pretestNonDomain[2] == pretestNonDomain[3] && pretestNonRange[2] == pretestNonRange[3]){
			problem[3] = 'correct';
		}
	
	count = 1;
	var radio = new Array();
	while (count < 7){
		radio[count] = $( "input:radio[name=graphFunction_" + count + "]:checked" ).val();
		count++;
	}
	if (radio[1] == 'yes' && radio[2] == 'no' && radio[3] == 'no' && radio[4] == 'yes' && radio[5] == 'no' && radio[6] == 'yes'){
		problem[4] == 'correct';
	}


	if (problem[1] !== 'correct' || problem[2] !== 'correct' || problem[3] !== 'correct' || problem[4] !== 'correct'){
		var domainRange = 'load';
		return domainRange; 
	}
	else{
		var domainRange = 'unload';
		return domainRange; 
	}
}



////////EVALUATE COMBINATION IN THE PRETEST///////////
function combinationEvaluate(){
	var combineAnswer = new Array();
	var problem = new Array();
	combineAnswer[1] = $('combineFunction_1').val();
	  combineAnswer[1] = $.trim(combineAnswer[1]);
	combineAnswer[2] = $('combineFunction_2').val();
	  combineAnswer[2] = $.trim(combineAnswer[2]);
	combineAnswer[3] = $('combineFunction_3').val();
	  combineAnswer[3] = $.trim(combineAnswer[3]);

	if (combineAnswer[1] == '-3+27x' || combineAnswer[1] == '27x-3'){
		problem[1] = 'correct';
	}
	if (combineAnswer[2] == '(-3+2x)/(29x)' || combineAnswer[2] == '(-3+2x)/29x' || combineAnswer[2] == '(2x-3)/(29x)' || combineAnswer[2] == '(2x-3)/29x'){
		problem[2] = 'correct';
	}
	if (combineAnswer[3] == '29x(2x-3)' || combineAnswer[3] == '29x*(2x-3)' || combineAnswer[3] == '29x*(-3+2x)' || combineAnswer[3] == '29x(-3+2x)'){
		problem[3] = 'correct';
	}
	if (problem[1] !== 'correct' || problem[2] !== 'correct' || problem[3] !== 'correct'){
		var combination = 'load';
		return combination; 
	}
	else{
		var combination = 'unload';
		return combination; 
	}
}


////////EVALUATE COMPOSITION IN THE PRETEST///////////
function compositionEvaluate(){
}