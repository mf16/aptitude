<?php
include_once "../includes/global.php";
class ChapterSectionAdmin{
	protected $subject;
	function __construct(){
		if(isset($_REQUEST['subject'])){
			$this->subject=$_REQUEST['subject'];
		}
		if(isset($_REQUEST['action'])){
			$action=$_REQUEST['action'];
			$this->$action();
		} else{
			$this->draw();
		}
	}

	function saveNewSection(){
		if(isset($_REQUEST['sectionName']) && isset($this->subject)){
			$sql="INSERT INTO ".$this->subject.".section_names (chapter_id,section_name) VALUES (?,?);";
			query($sql,$_REQUEST['chapter_id'],$_REQUEST['sectionName']);
			echo 'success';
		} else {
			echo 'failed';
		}
	}

	function saveChapterName(){
		if(isset($_REQUEST['chapterName']) && isset($this->subject)){
			$sql="UPDATE ".$this->subject.".chapter_names SET chapter_name=? WHERE chapter_id=?;";
			query($sql,$_REQUEST['chapterName'],$_REQUEST['chapter_id']);
		}
	}

	function saveSectionName(){
		if(isset($_REQUEST['sectionName']) && isset($this->subject)){
			$sql="UPDATE ".$this->subject.".section_names SET section_name=? WHERE section_id=?;";
			query($sql,$_REQUEST['sectionName'],$_REQUEST['section_id']);
		}
	}

	function delChapter(){
		if(isset($_REQUEST['chapter_id']) && isset($this->subject)){
			// delete sections related to chapter
			$sql="SELECT section_id FROM ".$this->subject.".section_names WHERE chapter_id=?;";
			$sections=query($sql,$_REQUEST['chapter_id']);
			foreach($sections as $key=>$section){
				$this->delSection($section['section_id']);
			}
			// Delete actual chapter
			$sql="DELETE FROM ".$this->subject.".chapter_names WHERE chapter_id=?;";
			query($sql,$_REQUEST['chapter_id']);
		}
	}

	function delSection($sectionid){
		if(isset($_REQUEST['section_id'])){
			$sectionid=$_REQUEST['section_id'];
		}
		if(isset($sectionid) && isset($this->subject)){
			$sql="DELETE FROM ".$this->subject.".section_names WHERE section_id=?;";
			query($sql,$sectionid);
		}
	}

	function saveNewChapter(){
		if(isset($_REQUEST['chapterName']) && isset($this->subject)){
			$sql="INSERT INTO ".$this->subject.".chapter_names (chapter_name) VALUES (?);";
			query($sql,$_REQUEST['chapterName']);
			echo 'success';
		} else {
			echo 'failed';
		}
	}

	function drawChapters($subject=NULL){
		if(isset($_REQUEST['subject'])){
			$subject=$_REQUEST['subject'];
		}
			?>
			<script>
				$(function(){
					$("#sortableChapters").sortable({
						update:function(event,ui){
							//alert('changed');
							chaptersInOrder=JSON.stringify($("#sortableChapters").sortable("toArray"));
							console.log(JSON.stringify(chaptersInOrder));
							$.ajax({
								type: 'POST',
								url: 'class.ChapterSectionAdmin.php?subject=<?php echo $this->subject;?>&action=saveChapterOrder&data='+chaptersInOrder,
								success:function(result){
									console.log(result);
									// is this necessary???
									// I don't think so, because it already saves in the above ajax. This is just to make sure there aren't any errors I guess? Lots of load on the server though.. 
									/*
									$.ajax({
										type:'POST',
										url:'class.ChapterSectionAdmin.php?subject=<?php echo $this->subject;?>&action=drawChapters',
										success:function(result){
											$("#chapterList").html(result);
										}
									});
									*/
								}
							});
						}
					});
				});
			</script>
			<?php
		$sql="SELECT * FROM ".$subject.".chapter_names ORDER BY chapter_order ASC;";
		$chapters=query($sql);
		echo '<h2>Chapters and Sections</h2>';
		echo '<ul id="sortableChapters">';
			foreach($chapters as $key=>$chapter){
				// use class for renaming. Can't change id from sole int, and if I leave it then section and chapter could have conflicting id's when trying to rename
				echo '<li id="'.$chapter['chapter_id'].'" class="ui-state-default">';
					echo '<span class="chapter_'.$chapter['chapter_id'].'">'; 
						echo $chapter['chapter_name'];
					echo '</span>';
					echo ' - <span id="renameChapter_'.$chapter['chapter_id'].'" style="cursor:pointer;" onClick="renameChapter('.$chapter['chapter_id'].',\''.$chapter['chapter_name'].'\')"><b>Rename</b></span>';
					echo ' - <span style="cursor:pointer;" onClick="delChapter('.$chapter['chapter_id'].',\''.$chapter['chapter_name'].'\')"><b>Delete</b></span>';
					echo '<ul id="sortableSections_'.$chapter['chapter_id'].'">';
						$sql="SELECT section_id,section_name FROM ".$subject.".section_names WHERE chapter_id=? ORDER BY friendly_view_section_id ASC;";
						$sections=query($sql,$chapter['chapter_id']);
						//print_r($sections);
						if(isset($sections)){
							foreach($sections as $sectionKey=>$section){
								echo '<li class="section_'.$section['section_id'].'" id="'.$section['section_id'].'">'.$section['section_name'].' - <span id="renameSection_'.$section['section_id'].'" style="cursor:pointer;" onClick="renameSection('.$section['section_id'].',\''.$section['section_name'].'\')"><b>Rename</b></span> - <span style="cursor:pointer;" onClick="delSection('.$section['section_id'].',\''.$section['section_name'].'\')"><b>Delete</b></span></li>';
							}
						}
					echo '</ul>';
					echo '<span style="margin-left:30px;cursor:pointer;" id="addSection_'.$chapter['chapter_id'].'" onClick="addSection('.$chapter['chapter_id'].');"><b>Add Section</b></span>';
					?>
					<script>
						$(function(){
							$("#sortableSections_<?php echo $chapter['chapter_id'];?>").sortable({
								update:function(event,ui){
									//alert('changed');
									sectionsInOrder_<?php echo $chapter['chapter_id'];?>=JSON.stringify($("#sortableSections_<?php echo $chapter['chapter_id'];?>").sortable("toArray"));
									console.log(JSON.stringify(sectionsInOrder_<?php echo $chapter['chapter_id'];?>));
									$.ajax({
										type: 'POST',
										url: 'class.ChapterSectionAdmin.php?subject=<?php echo $this->subject;?>&action=saveSectionOrder&data='+sectionsInOrder_<?php echo $chapter['chapter_id'];?>,
										success:function(result){
											//alert('success');
											console.log(result);
											// not nessecesary
											/*
											$.ajax({
												type:'POST',
												url:'class.ChapterSectionAdmin.php?subject=<?php echo $this->subject;?>&action=drawChapters',
												success:function(result){
													$("#chapterList").html(result);
												}
											});
											*/
										}
									});
								}
							});
						});
					</script>
				<?php
				echo '</li>';
			}
		echo '</ul>';
		echo '<span style="cursor:pointer;" id="addChapter" onClick="addChapter();"><b>Add Chapter</b></span>';
	}

	function saveSectionOrder(){
		print_r($_REQUEST);
		foreach(JSON_decode($_REQUEST['data']) as $key=>$value){
			if(isset($_REQUEST['subject'])){
				$sql="UPDATE ".$_REQUEST['subject'].".section_names SET friendly_view_section_id=? WHERE section_id=?;";
				query($sql,$key+1,$value);
				echo 'success';
			}
		}
	}
	function saveChapterOrder(){
		//print_r($_REQUEST);
		foreach(JSON_decode($_REQUEST['data']) as $key=>$value){
			if(isset($_REQUEST['subject'])){
				$sql="UPDATE ".$_REQUEST['subject'].".chapter_names SET chapter_order=? WHERE chapter_id=?;";
				query($sql,$key+1,$value);
				echo 'success';
			}
		}
	}

	function draw(){
		echo '<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>';
		echo ' <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>';
		?>
		<script>

			function addSection(chapter_id){
				$("#addSection_"+chapter_id).attr("onClick","").unbind('click');
				$("#addSection_"+chapter_id).css("cursor","default");
				$("#addSection_"+chapter_id).html("<input id='newSectionName_"+chapter_id+"' type='text'><span style='cursor:pointer;border:1px solid black;' onClick='saveNewSection("+chapter_id+");'>Save</span>");
			}

			function saveNewSection(chapter_id){
				var sectionName=$("#newSectionName_"+chapter_id).val();
				$.ajax({
					type: 'POST',
					url: 'class.ChapterSectionAdmin.php?subject=<?php echo $this->subject;?>&action=saveNewSection&sectionName='+sectionName+'&chapter_id='+chapter_id,
					success:function(result){
						//alert('success');
						$.ajax({
							type:'POST',
							url:'class.ChapterSectionAdmin.php?subject=<?php echo $this->subject;?>&action=drawChapters',
							success:function(result){
								$("#chapterList").html(result);
							}
						});
					}
				});
			}

			function delChapter(chapter_id,chapterName){
				if (confirm('Are you sure you wish to delete chapter '+chapterName+'?\n\nThis will also delete all sections associated with this chapter.')){
					$.ajax({
						type: 'POST',
						url: 'class.ChapterSectionAdmin.php?subject=<?php echo $this->subject;?>&action=delChapter&chapter_id='+chapter_id,
						success:function(result){
							console.log(result);
							// not necessary, need to delete element from dom
							$.ajax({
								type:'POST',
								url:'class.ChapterSectionAdmin.php?subject=<?php echo $this->subject;?>&action=drawChapters',
								success:function(result){
									$("#chapterList").html(result);
								}
							});
						}
					});
				} else {
				}
			}

			function renameChapter(chapter_id,chapterName){
				$(".chapter_"+chapter_id).html('<input type="text" id="renameChapter_'+chapter_id+'" value="'+chapterName+'"><span style="border:1px solid black;cursor:pointer" onClick="saveChapterName('+chapter_id+');">save</span>');
			}

			function renameSection(section_id,sectionName){
				$(".section_"+section_id).html('<input type="text" id="renameSection_'+section_id+'" value="'+sectionName+'"><span style="border:1px solid black;cursor:pointer" onClick="saveSectionName('+section_id+');">save</span>');
			}

			function saveChapterName(chapter_id){
				chapterName=$("#renameChapter_"+chapter_id).val();
				$.ajax({
					type: 'POST',
					url: 'class.ChapterSectionAdmin.php?subject=<?php echo $this->subject;?>&action=saveChapterName&chapter_id='+chapter_id+'&chapterName='+chapterName,
					success:function(result){
						//alert('success');
						// not necessary, just change dom element
						$.ajax({
							type:'POST',
							url:'class.ChapterSectionAdmin.php?subject=<?php echo $this->subject;?>&action=drawChapters',
							success:function(result){
								$("#chapterList").html(result);
							}
						});
					}
				});
			}

			function saveSectionName(section_id){
				sectionName=$("#renameSection_"+section_id).val();
				$.ajax({
					type: 'POST',
					url: 'class.ChapterSectionAdmin.php?subject=<?php echo $this->subject;?>&action=saveSectionName&section_id='+section_id+'&sectionName='+sectionName,
					success:function(result){
						//alert('success');
						// not necessary, just change dom element
						$.ajax({
							type:'POST',
							url:'class.ChapterSectionAdmin.php?subject=<?php echo $this->subject;?>&action=drawChapters',
							success:function(result){
								$("#chapterList").html(result);
							}
						});
					}
				});
			}

			function delSection(section_id,sectionName){
				if (confirm('Are you sure you wish to delete section '+sectionName+'?')){
					$.ajax({
						type: 'POST',
						url: 'class.ChapterSectionAdmin.php?subject=<?php echo $this->subject;?>&action=delSection&section_id='+section_id,
						success:function(result){
							//alert('success');
							// not necessary, just delete dom element
							$.ajax({
								type:'POST',
								url:'class.ChapterSectionAdmin.php?subject=<?php echo $this->subject;?>&action=drawChapters',
								success:function(result){
									$("#chapterList").html(result);
								}
							});
						}
					});
				} else {
					
				}
			}

			function addChapter(){
				$("#addChapter").attr("onClick","").unbind('click');
				$("#addChapter").css("cursor","default");
				$("#addChapter").html("<input id='newChapterName' type='text'><span style='cursor:pointer;border:1px solid black;' onClick='saveNewChapter();'>Save</span>");
			}

			function saveNewChapter(){
				var chapterName=$("#newChapterName").val();
				$.ajax({
					type: 'POST',
					url: 'class.ChapterSectionAdmin.php?subject=<?php echo $this->subject;?>&action=saveNewChapter&chapterName='+chapterName,
					success:function(result){
						//alert('success');
						$.ajax({
							type:'POST',
							url:'class.ChapterSectionAdmin.php?subject=<?php echo $this->subject;?>&action=drawChapters',
							success:function(result){
								$("#chapterList").html(result);
							}
						});
					}
				});
			}
		</script>
		<?php

		echo 'draw class for <h1>'.$this->subject.'</h1>';
		echo '<div id="chapterList" style="border:1px solid black;">';
			$this->drawChapters($this->subject);
		echo '</div>';
	}

	function asdf(){
		echo 'asdf';
	}
}

$chapterSectionAdmin= new ChapterSectionAdmin();
