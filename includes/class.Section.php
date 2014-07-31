<?php
include_once "class.SectionDAO.php";
include_once "class.SidebarMenu.php";
class Section extends SectionDAO {
	private $subjectName;
	private $chapterid;
	private $sectionid;
	private $isPrequizCompleted;

	function __construct($subjectName, $chapterid, $sectionid){
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
			echo '<div class="clearfix"></div>';
			echo '</div>';
			// practice problems
			include_once "class.PracticeProblems.php";
			$practiceProblems=new PracticeProblems($this->subjectName,$this->chapterid,$this->sectionid);
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
			</script>
			';
		}
		
		drawFooter($this->foot());
	}
	function foot(){
	}
}
$section= new Section($subjectName, $chapterid, $sectionid);

