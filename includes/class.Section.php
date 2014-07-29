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
			//loop through for each concept in chapter
			if(isset($contentDeterminer['composition of functions']) && ($contentDeterminer['composition of functions']>(0))){
				//short version
				include 'includes/'.$this->subjectName.'/'.$this->chapterid.'/'.$this->sectionid.'/content_new-short.php';
			} else {
				//long version
				include 'includes/'.$this->subjectName.'/'.$this->chapterid.'/'.$this->sectionid.'/content_new.php';
			}
		}
		
		drawFooter($this->foot());
	}
	function foot(){
	}
}
$section= new Section($subjectName, $chapterid, $sectionid);

