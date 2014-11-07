<?php
include_once "global.php";

class SectionDAO{
	function __construct(){
	}

	function getContentBySectionid($sectionid){
		// Returns an array of content, sorted by sort order 
		$sql="SELECT c.idcontent,c.content,s.order FROM math.content c,	math.contents_sections s WHERE c.idcontent=s.content_id AND s.section_id=? ORDER BY s.order ASC;";
		$results=query($sql,$sectionid);
		return $results;
	}

	function getSectionidByChapteridFriendlyViewSectionid($chapterid,$friendlySectionid){
		$sql="SELECT section_id FROM math.section_names WHERE chapter_id=? AND friendly_view_section_id=?;";
		$results=query($sql,$chapterid,$friendlySectionid);
		$results=$results[0];
		return $results['section_id'];
	}

	function getSectionNameBySectionid($sectionid){
		$sql="SELECT section_name FROM math.section_names WHERE section_id=?;";
		$results=query($sql,$sectionid);
		return $results[0]['section_name'];
	}

	function getClassesByAdminid($subject,$userid){
		global $db;
		$group_admin_id=$_SESSION['userid'];
		$results=query('SELECT group_id,group_name FROM math.groups WHERE group_admin_id=? ORDER BY end_date DESC;',$_SESSION['userid']);
		return $results;
	}
}
