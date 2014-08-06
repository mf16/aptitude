<?php
include_once "class.SectionDAO.php";
include_once "class.SidebarMenu.php";
class Section extends SectionDAO {
	private $subjectName;
	private $chapterid;
	private $sectionid;
	private $isPrequizCompleted;
	private $ppAmount;

	function __construct($subjectName, $chapterid, $sectionid){
		// Number of Practice Problems
		$this->ppAmount=3;

		if(isset($subjectName)){
			$this->subjectName = $subjectName;
		}
		if(isset($chapterid)){
			$this->chapterid = $chapterid;
		}
		if(isset($sectionid)){
			$this->sectionid = $sectionid;
		}

		if(isset($_REQUEST['action'])){
			$action=$_REQUEST['action'];
			$this->$action();
		} else{
			$this->draw();
		}
	}
	function head(){
		$headerText='';
		$headerText.='<script src="'.$_SERVER['DOCUMENT_ROOT'].'js/'.strtolower(__CLASS__).'.js"></script>';
		$headerText.='<link href="'.$_SERVER['DOCUMENT_ROOT'].'css/includes/'.strtolower(__CLASS__).'.css" type="text/css" rel="stylesheet">';
		return $headerText;
	}

	function showLongText(){
		$_SESSION['showLongText']=1;
	}

	function draw(){
		$sidebarMenu = new SidebarMenu();
		drawHeader($this->head());
		$sidebarMenu->draw();
		
        if(isset($_SESSION['isPrequizCompleted'])){
            $this->isPrequizCompleted=1;
        }

		if(!$this->isPrequizCompleted){
			include 'includes/class.Prequiz.php';
			$prequiz = new Prequiz($this->subjectName,$this->chapterid,$this->sectionid);
		} else {
			//determine ebook content to show
			if(isset($_SESSION['math1050-prequiz'])){
				$keyArray=array_keys($_SESSION['math1050-prequiz']);
				foreach($keyArray as $key){
					$displayInfo=$_SESSION['math1050-prequiz'][$key][0];
					if($displayInfo['type']=='pq' && $displayInfo['correct']==1){
						if(isset($contentDeterminer[$displayInfo['concept']])){
							$contentDeterminer[$displayInfo['concept']]++;
						} else {
							$contentDeterminer[$displayInfo['concept']]=1;
						}
					}
				}
			}
			//loop through for each concept in chapter
			if(isset($contentDeterminer['composition of functions']) && ($contentDeterminer['composition of functions']>(1)) && (!isset($_SESSION['showLongText']))){
				//short version
				include 'includes/'.$this->subjectName.'/'.$this->chapterid.'/'.$this->sectionid.'/content_new-short.php';
			} else if(isset($contentDeterminer['composition of functions']) && ($contentDeterminer['composition of functions']>(0)) && (!isset($_SESSION['showLongText']))){
				//medium version
				include 'includes/'.$this->subjectName.'/'.$this->chapterid.'/'.$this->sectionid.'/content_new-med.php';
			} else {
				//long version
				include 'includes/'.$this->subjectName.'/'.$this->chapterid.'/'.$this->sectionid.'/content_new.php';
			}
			echo '<script type="text/javascript" src="'.$_SERVER['DOCUMENT_ROOT'].'js/waypoints/waypoints.min.js"></script>';
			echo '<div class="clearfix"></div>';
			echo '</div>';
			// practice problems
			/*
			include_once "class.PracticeProblems.php";
			$practiceProblems=new PracticeProblems($this->subjectName,$this->chapterid,$this->sectionid);
			*/
			echo 'session variables: ';
			krumo($_SESSION);
			include_once "class.Problem.php";
			$usedProblems=array();
			for($i=0;$i<$this->ppAmount;$i++){
				$problem=new Problem($this->subjectName,$this->chapterid,$this->sectionid,'pp','composition of functions');
				$j=0;
				while(in_array($problem->problemid,$usedProblems)){
					if($j>3){break;}
					$problem=new Problem($this->subjectName,$this->chapterid,$this->sectionid,'pp','composition of functions');
					$j++;
				}
				$usedProblems[]=$problem->problemid;

				echo '
					<section class="row-fluid practiceWaypoint" style="margin-right: 25px;">
						<section class="col-md-9 no-padding" style="width:76%">
						<article class="col-xs-12 margin-top definition practiceContainer">
							<article class="col-md-1"><img class="practiceResult_'.($i+1).'" src="'.$_SERVER['DOCUMENT_ROOT'].'img/global/icons/check.png" width="100%"></article>
							<article class="col-md-1 practiceNumber">
								<h1>'.($i+1).'.</h1>
							</article>
							<article class="col-md-10 no-padding">	
				';

				echo $problem->problem;
				echo '<br/>For demo purposes, the answer is: '.$problem->answer.'<br/><br/>';
				/*echo 'previous answers:';
				echo '<div id="previousAnswers'.$problem->problemid.'">';
					if(isset($problem->previousAnswers)){
							echo '<table>';
								echo '<tr>';
									echo '<th>Try</th>';
									echo '<th>Answer</th>';
									echo '<th>Correct</th>';
								echo '</tr>';
						foreach($problem->previousAnswers as $try=>$problemInfos){
							$correct=0;
							if($problemInfos['correct']){
								$correct=1;
							}
							echo '<tr>';
								echo '<td>'.($try+1).'</td>';
								echo '<td>\('.$problemInfos['studentAns'].'\)</td>';
								echo '<td>'.$correct.'</td>';
							echo '</tr>';
						}
							echo '</table>';
					}
				echo '</div>';*/
				if((!isset($_SESSION[$this->subjectName][$problem->problemType][$problem->problemid]) || (end($_SESSION[$this->subjectName][$problem->problemType][$problem->problemid])['correct'])==0)){
					echo $problem->answerBoxHTML;
					echo '
					<br/>
					<button id="submitPrequizAnswer'.$problem->problemid.'" onclick="checkAnswer('.$problem->problemid.')" class="readyButton practiceButton">Submit Answer</button>
					<div id="checkAnswerReturn'.$problem->problemid.'"></div>
					';
				}
				echo '
							</article>
						</article>
						</section>
					</section>
				';
				echo '<br/>';
				echo '<br/>';
			}

			//js functions 
			echo '
			<script>
			$(document).ready(function() {
				$.waypoints(\'refresh\');
			});
			function checkAnswer(problemid){
				if($("#studentAns"+problemid).val()==""){
					alert("please enter a valid answer before clicking submit");
				} else {
					var studentAns=$("#studentAns"+problemid).val();
					//If the radio button exists check the value of that instead of a standard text response
					if($("#radio1").length > 0){
						studentAns = $("input[name=radios]:checked").val();
					}
					$.ajax({url:"'.$_SERVER['DOCUMENT_ROOT'].'includes/class.Problem.php?action=checkAnswer&subjectName='.$this->subjectName.'&var=1&chapterid='.$this->chapterid.'&sectionid='.$this->sectionid.'&problemid="+problemid+"&problemType='.$problem->problemType.'&concept="+encodeURIComponent(\''.$problem->concept.'\')+"&studentAns="+encodeURIComponent(studentAns),success:function(result){
						$("#previousAnswers"+problemid).append("appending answer here:"+studentAns);
						if(result=="correct"){
							$("#submitPrequizAnswer"+problemid).hide();
							$("#checkAnswerReturn"+problemid).html("Correct");
							$("#previousAnswers"+problemid).append("   ->  correct!");
						} else {
							$("#checkAnswerReturn"+problemid).html("Incorrect");
							$("#previousAnswers"+problemid).append("   ->  incorrect!");

						}
						console.log(result);
						//$("#submitPrequizAnswer"+problemid).hide();
					}});
				}
			}
			
			function interpretLex(fromElementid,toElementid){
				$("#"+toElementid).html("&#92("+$("#"+fromElementid).val()+"&#92)");
				var math=document.getElementById(toElementid);
				MathJax.Hub.Queue(["Typeset",MathJax.Hub]);
			}
			</script>';

			// echo footer
			echo '
				<div class="margin-top"></div>
				<footer class="site-footer col-md-12">
					<section class="col-md-3">
						<img src = "'.$_SERVER['DOCUMENT_ROOT'].'img/global/icon.ico" />
						<span>Powered by Aptitude LLC.</span>
					</section>
					<section class="col-md-2 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-6" id="feedback">
						<a href="feedback.php"><span>Have feedback?</span></a>
					</section>
				</footer>
			';
				
			echo '
			<style>
			p:hover {
			}
			</style>

			<script>
				$("p").hover(
					function(){
						$(".vote").remove();
						$(this).append($("<span style=\'float:right;margin-right:-25px;\' class=\'vote\'><div class=\'voteUp\'>▲</div><div class=\'voteDown\'>▼</div></span>"));
					     var height = ($(".vote").parent().outerHeight() / 2);
					     $(".vote").css("margin-top", "-"+height+"px");
					}, function(){
					}
				);


			$(".practiceWaypoint").waypoint(function() {
				if (window.currentPosition !== 3)
				{ 
					replaceImportantInfo("Composite Functions combine functions in a special way to create a new function");
					replaceExternalResources(\'<a href="http://www.cut-the-knot.org/do_you_know/FunctionMain.shtml" target="_blank">Learn more about the history of functions.</a>\');
					replacePitfall("Consider the problem…<br>Find \\\(f(3)\\\) for  \\\(f(x) = 2x + 9\\\)<br>Incorrect: \\\(f(3)\\\) <br>Does Not mean<br>&nbsp;&nbsp;&nbsp;\\\(3= 2x+9\\\)<br>&nbsp;&nbsp;&nbsp;\\\(-6= 2x\\\) so \\\(f(3) = -3 \\\)<br>Correct: \\\(f(3) = 2 * 3 + 9\\\) <br>Does become \\\(f(3) = 15\\\).");
					window.currentPosition = 3;
				}
			}, { offset: \'50%\' });


			complete = function(){
				$("#expectedPitfalls").animate({opacity: "1.0"});
			}; 

			</script>
			';
		}
		
		drawFooter($this->foot());
	}
	function foot(){
	}
}
$section= new Section($subjectName, $chapterid, $sectionid);

