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
		  <link rel="stylesheet" href="/css/jquery-ui.css">
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
				<a href="/class/1">mathTest</a><a href="/class/3">mathgroup2</a>
				<a href="#">+ Create new class</a>
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
			<!-- Universal Modal -->
			<div class="modal fade" id="universalModal" tabindex="-1" role="dialog" aria-labelledby="universalModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			        <h4 class="modal-title" id="universalModalLabel"></h4>
			      </div>
			      <div class="modal-body">
			      </div>
			      <div class="modal-footer">
			      </div>
			    </div>
			  </div>
			</div>
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
			echo '<section class="sortable ui-sortable">
					<div class="col-md-12 text-center addContentGroup">ADD NEW CONTENT GROUP <i class="fa fa-plus"></i></div>';
			if(isset($contentGroups)){
				foreach($contentGroups as $contentGroupKey=>$contentGroup){
					echo '
						<div class="clearfix"></div>
						<article class="ui-state-default verticalSort" id="contentgroupContainer_'.$contentGroup['contentgroup_id'].'">
							<div class="groupLegend">
								<div class="legendIcons">
									<i class="fa fa-arrows-v handle"></i><br>
									<i class="fa fa-times delContentGroup" contentgroupid="'.$contentGroup['contentgroup_id'].'"></i>
								</div>
								<div class="legendOptions">
									<select class="sideSelection form-control typeSelect" id="contentGroup_'.$contentGroup['contentgroup_id'].'">
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
									<!--<span class="pull-left">Sort './*($contentGroupKey+1).*/'</span>-->
									<br><input placeholder="Primary tag" class="form-control" type="text">
									<br><input placeholder="Secondary tag" class="form-control" type="text">
								</div>
								<div class="addNewSection" id="addNewSection_'.$contentGroup['contentgroup_id'].'" contentgroupid="'.$contentGroup['contentgroup_id'].'">
									N<br>e<br>w<br><i class="fa fa-plus addContent"></i>
								</div>
							</div>
							<section class="subSortable ui-sortable" contentgroupid="'.$contentGroup['contentgroup_id'].'">
							';
							$contents=$this->getContentByGroupid($contentGroup['contentgroup_id']);
							//print_r($contents);
							if(isset($contents)){
								foreach($contents as $contentKey=>$content){
								echo '
									<article class="horizontalSort" id="realContent_'.$content['idcontent'].'">
										<div class="wrap">
											<div class="sectionLegend">
												<i class="fa fa-arrows-h subHandle pull-left"></i>';
												$mediumSelected=false;
												foreach($mediums as $mediumKey=>$medium){
													if($content['medium_id']==$medium['medium_id']){
														$mediumSelected=true;
													}
												}
												if($mediumSelected !== true){
													echo '<select class="mediumSelect form-control" id="contentCont_'.$content['idcontent'].'">
													<option>--Select a Medium--</option>
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
													</select><a id="mediumSave" contentid="'.$content['idcontent'].'" class="btn btn-default" tabindex="-1" href="javascript:;"><span>Create</span></a>';
												}
												else{
													foreach($mediums as $mediumKey=>$medium){
														if($content['medium_id']==$medium['medium_id']){
															echo '<div class="hidden" id="contentCont_'.$content['idcontent'].'">'. $medium['medium_name'].'</div>';
														}
													}
												}
												echo '<i class="fa fa-times delContent pull-right" contentid="'.$content['idcontent'].'"></i>
											</div>
											<div class="clearfix"></div>
											<div class="col-md-12 contentContainer" id="content_'.$content['idcontent'].'" contentid="'.$content['idcontent'].'">'.$content['content'].'</div>
										</div>
									</article>
									';
								}
							}
							echo '
							</section>
						</article>
					';
				}
				echo '<div class="clearfix"></div>
					<div class="col-md-12 text-center addContentGroup">ADD NEW CONTENT GROUP <i class="fa fa-plus"></i></div>
				</section>';
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

	function delContentGroup($contentgroupid=NULL){
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

	function saveContentByid($content=NULL,$id=NULL){
		if(isset($_REQUEST['content'])){
			$content=$_REQUEST['content'];
		}
		if(isset($_REQUEST['contentid'])){
			$id=$_REQUEST['contentid'];
		}
		if(isset($content) && isset($id)){
			$sql="UPDATE ".$this->subject.".content SET content=? WHERE idcontent=?;";
			$results=query($sql,$content,$id);
		}
	}

	function asdf(){
		echo 'asdf';
	}
}

$contentAdmin= new ContentAdmin();
