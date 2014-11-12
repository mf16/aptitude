<?php
include_once "../includes/global.php";
class ContentAdmin {
	protected $subject;
	protected $chapter;
	protected $section;
	function __construct(){
		if(isset($_REQUEST['subject'])){
			$this->subject=$_REQUEST['subject'];
		}
		if(isset($_REQUEST['section'])){
			$this->section=$_REQUEST['section'];
		} else if (isset($_REQUEST['sectionid'])){
			$this->section=$_REQUEST['sectionid'];
		}
		if(isset($_REQUEST['action'])){
			$action=$_REQUEST['action'];
			$this->$action();
		} else{
			$this->draw();
		}
	}

	function draw(){
		include "../head.php";
		?>
		  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
		  <link rel="stylesheet" href="style.css">
		  <script>
			<?php 
			if(isset($this->section)){
				echo 'var sectionid='.$this->section.';';
			} else {
				echo 'var sectionid=0;';
			}
			?>
			var subject='<?php echo $this->subject;?>';
		  </script>
		  <script src="script.js"></script>
		<body class="grayBg">
			<div id="slidingMenu">
				<h1>Aptitude</h1>
				<span id="studentName">Albert Einstein</span>
				<hr style="margin:0px; border-top: 1px solid #F26522;">
				<!--<a href="#services">Timeline</a>-->
				<a href="#services">Account Settings</a>
				<span>Classes</span>
				<hr style="margin:0px; border-top: 1px solid #F26522;">
				<a href="/class/1">mathTest</a><a href="/class/3">mathgroup2</a>			<a href="#">+ Create new class</a>
			</div>
			<header>
				<div id="header">
					<!--Button to expand slideout-->
					<section id="buttonSideMenu"> <!--// onclick="displayMenu()"-->
					</section>
					<article>
						<span class="phoneHide" id="aptitude">Aptitude</span>
					</article>
				</div>
			</header>
			<section id="headerSpacerSmall"></section>
			<section class="col-md-1 no-pd mg-t-md">
				<div class="chapter-number">
					<img src="/img/global/solid-arrow.png">
				</div>
			</section>
			<section class="col-md-10 mg-t-lg">
				<div class="title">
					<h1>Modify Content</h1>
					<?php
					$chapters=$this->getChapters($this->subject);
					echo '<select class="form-control" id="sectionSelect">';
						echo '<option value="section0">----Select a section to edit----</option>';
						foreach($chapters as $key=>$chapter){
							echo '<optgroup label="Chapter '.$chapter['chapter_order'].' - '.$chapter['chapter_name'].'">';
								$sections=$this->getSections($this->subject,$chapter['chapter_id']);
								foreach($sections as $sectionKey=>$eachSection){
									$selectedText="";
									if($this->section==$eachSection['section_id']){
										$selectedText=" selected='selected' ";
									}
									echo '<option '.$selectedText.' value="section'.$eachSection['section_id'].'">';
										echo $eachSection['section_name'];
									echo '</option>';
								}
							echo '</optgroup>';
						}
					?>
					</select>
				</div>
				<div class="modifyContentContainer mg-t-md">
					<?php
					$this->drawModifiedContent();
				echo '</div>';
				echo '</section>';
	}

	function drawModifiedContent(){
		$contentGroups=$this->getContentGroupsBySectionid($this->section);
			//print_r($contentGroups);
			$types=$this->getTypes();
			$mediums=$this->getMediums();
			if(isset($contentGroups)){
				foreach($contentGroups as $contentGroupKey=>$contentGroup){
					echo '
						<section class="sortable" id="contentgroupContainer_'.$contentGroup['contentgroup_id'].'">
							<article class="ui-state-default verticalSort">
								<i class="fa fa-arrows-v pull-left"></i>
								<i class="fa fa-plus addContent" contentgroupid="'.$contentGroup['contentgroup_id'].'"></i>
								<i class="fa fa-times delContentgroup" contentgroupid="'.$contentGroup['contentgroup_id'].'"></i>
								<select class="sideSelection typeSelect" id="contentGroup_'.$contentGroup['contentgroup_id'].'">
									<option>--Type--</option>
									';
									foreach($types as $typeKey=>$type){
										$typeSelectedText=""; if($contentGroup['type_id']==$type['type_id']){
											$typeSelectedText=" selected='selected' ";
										}
										echo '<option '.$typeSelectedText.' value="'.$type['type_id'].'">';
											echo $type['name'];
										echo '</option>';
									}
									echo '
								</select>
								<span class="pull-left">Sort './*($contentGroupKey+1).*/'</span>
								<input type="text">
								<input type="text">
								<section class="subSortable ui-sortable" contentgroupid="'.$contentGroup['contentgroup_id'].'">
								';
								$contents=$this->getContentByGroupid($contentGroup['contentgroup_id']);
								//print_r($contents);
								if(isset($contents)){
									foreach($contents as $contentKey=>$content){
									echo '
										<article class="horizontalSort" id="realContent_'.$content['idcontent'].'">
											<div class="wrap">
												<i class="fa fa-arrows-h"></i>
												<select class="mediumSelect" id="content_'.$content['idcontent'].'">
												<option>--Medium--</option>
												';
												foreach($mediums as $mediumKey=>$medium){
													$mediumSelectedText="";
													if($content['medium_id']==$medium['medium_id']){
														$mediumSelectedText=" selected='selected' ";
													}
													echo '<option '.$mediumSelectedText.' value="'.$medium['medium_id'].'">';
														echo $medium['medium_name'];
													echo '</option>';
												}
												echo '
												</select>
												<i class="fa fa-pencil-square-o"></i>
												<i class="fa fa-times delContent" contentid="'.$content['idcontent'].'"></i>
											'.$content['content'].'
											</div>
										</article>
										';
									}
								}
								echo '
								</section>
							</article>
						</section>
					';
				}
				echo '<i class="fa fa-plus addContentgroup"></i>';
			} else {
				echo 'Please select a section above.';
			}
		?>
	<?php 	
	}

	function getChapters($subject){
		$sql="SELECT chapter_id,chapter_name,chapter_order FROM ".$subject.".chapter_names ORDER BY chapter_order;";
		$results=query($sql);
		return $results;
	}

	function getSections($subject,$chapterid){
		$sql="SELECT section_id,section_name,friendly_view_section_id FROM ".$subject.".section_names WHERE chapter_id=?;";
		$results=query($sql,$chapterid);
		return $results;
	}
	
	function getContentByGroupid($groupid){
		$sql="SELECT idcontent,content,medium_id FROM ".$this->subject.".content WHERE contentgroup_id=? ORDER BY `order`;";
		$results=query($sql,$groupid);
		return $results;
	}

	function changeContentMediumByid($contentid=NULL,$mediumid=NULL){
		if(isset($_REQUEST['contentid'])){
			$contentid=$_REQUEST['contentid'];
		}
		if(isset($_REQUEST['mediumid'])){
			$mediumid=$_REQUEST['mediumid'];
		}
		$sql="UPDATE ".$this->subject.".content SET medium_id=? WHERE idcontent=?;";
		$results=query($sql,$mediumid,$contentid);
		//return $results;
	}

	function changeContentgroupTypeByid($contentgroupid=NULL,$typeid=NULL){
		if(isset($_REQUEST['contentgroupid'])){
			$contentgroupid=$_REQUEST['contentgroupid'];
		}
		if(isset($_REQUEST['typeid'])){
			$typeid=$_REQUEST['typeid'];
		}
		$sql="UPDATE ".$this->subject.".contentgroups SET type_id=? WHERE contentgroup_id=?;";
		$results=query($sql,$typeid,$contentgroupid);
		//return $results;
	}

	function getMediums(){
		$sql="SELECT medium_id,medium_name FROM ".$this->subject.".contentmedium_names;";
		$results=query($sql);
		return $results;
	}

	function getTypes(){
		$sql="SELECT type_id,name FROM ".$this->subject.".contentgroup_type_names;";
		$results=query($sql);
		return $results;
	}

	function getContentGroupsBySectionid($sectionid){
		$sql="SELECT contentgroup_id,type_id,concept1,concept2 FROM ".$this->subject.".contentgroups WHERE section_id=? ORDER BY `order` ASC;";
		$results=query($sql,$sectionid);
		return $results;
	}

	function delContent($contentid=NULL){
		if(isset($_REQUEST['contentid'])){
			$contentid=$_REQUEST['contentid'];
		}
		$sql="DELETE FROM ".$this->subject.".content WHERE idcontent=?;";
		$results=query($sql,$contentid);
	}

	function delContentgroup($contentgroupid=NULL){
		if(isset($_REQUEST['contentgroupid'])){
			$contentgroupid=$_REQUEST['contentgroupid'];
		}
		$contents=$this->getContentByGroupid($contentgroupid);
		if(isset($contents)){
			foreach($contents as $content){
				$this->delContent($content['idcontent']);
			}
		}
		$sql="DELETE FROM ".$this->subject.".contentgroups WHERE contentgroup_id=?;";
		$results=query($sql,$contentgroupid);
	}

	function newContent($sectionid=NULL,$contentgroupid=NULL){
		if(isset($_REQUEST['sectionid'])){
			$sectionid=$_REQUEST['sectionid'];
		}
		if(isset($_REQUEST['contentgroupid'])){
			$contentgroupid=$_REQUEST['contentgroupid'];
		}
		$orderNumsql="SELECT MAX(`order`) FROM ".$this->subject.".content WHERE contentgroup_id=?;";
		$orderNum=query($orderNumsql,$contentgroupid);
		$orderNum=(1+$orderNum[0]['MAX(`order`)']);
		$sql="INSERT INTO ".$this->subject.".content (contentgroup_id,`order`) VALUES(?,?);";
		$results=query($sql,$contentgroupid,$orderNum);
	}

	function newContentgroup($sectionid=NULL){
		if(isset($_REQUEST['sectionid'])){
			$sectionid=$_REQUEST['sectionid'];
		}
		$orderNumsql="SELECT MAX(`order`) FROM ".$this->subject.".contentgroups WHERE section_id=?;";
		$orderNum=query($orderNumsql,$sectionid);
		$orderNum=(1+$orderNum[0]['MAX(`order`)']);
		$sql="INSERT INTO ".$this->subject.".contentgroups (section_id,`order`) VALUES(?,?);";
		$results=query($sql,$sectionid,$orderNum);
	}

	function saveContentOrder(){
		foreach(JSON_decode($_REQUEST['data']) as $key=>$value){
			if(isset($_REQUEST['subject'])){
				$sql="UPDATE ".$_REQUEST['subject'].".content SET contentgroup_id=?,`order`=? WHERE idcontent=?;";
				query($sql,$_REQUEST['contentgroupid'],$key+1,substr($value,12));
			}
		}
	}

	function asdf(){
		echo 'asdf';
	}
}

$contentAdmin= new ContentAdmin();
