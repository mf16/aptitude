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
		  <script src="script.js"></script>
		  <script>
		  $(function(){
				$("#sectionSelect").change(function(){
					var section=$("#sectionSelect").val().substring(7);
					window.location.assign('/inputtingContent/class.ContentAdmin.php?subject=<?php echo $this->subject;?>&section='+section);
				});
				
				$(".delContent").click(function(){
					var contentid=$(this).attr("contentid");
					if(confirm("Are you sure you wish to delete this content?")){
						$.ajax({
							type: 'POST',
							url: 'class.ContentAdmin.php?subject=<?php echo $this->subject;?>&action=delContent&contentid='+contentid,
							success:function(result){
								$("#realContent_"+contentid).remove();
								console.log(result);
							}
						});
					}
				});

				$(".mediumSelect").change(function(){
					var contentid=this.id.substring(8);
					var mediumid=$(this).find('option:selected').val();
					$.ajax({
						type: 'POST',
						url: 'class.ContentAdmin.php?subject=<?php echo $this->subject;?>&action=changeContentMediumByid&contentid='+contentid+'&mediumid='+mediumid,
						success:function(result){
							console.log(result);
						}
					});
				});

				$(".typeSelect").change(function(){
					var contentgroupid= this.id.substring(13);
					var typeid=$(this).find('option:selected').val();
					$.ajax({
						type: 'POST',
						url: 'class.ContentAdmin.php?subject=<?php echo $this->subject;?>&action=changeContentgroupTypeByid&contentgroupid='+contentgroupid+'&typeid='+typeid,
						success:function(result){
							console.log(result);
						}
					});
				});
			});
		  </script>
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
						echo '<option>----Select a section to edit----</option>';
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
			foreach($contentGroups as $contentGroupKey=>$contentGroup){
				echo '
					<section class="sortable">
						<article class="ui-state-default verticalSort">
							<i class="fa fa-arrows-v pull-left"></i>
							<i class="fa fa-plus"></i>
							<i class="fa fa-times"></i>
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
							<span class="pull-left">Sort '.($contentGroupKey+1).'</span>
							<input type="text">
							<input type="text">
							<section class="subSortable ui-sortable">
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
					<i class="fa fa-plus"></i>
				';
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

	function asdf(){
		echo 'asdf';
	}
}

$contentAdmin= new ContentAdmin();
