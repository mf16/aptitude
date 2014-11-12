$(function() {
	// anoying as fuck
	/*
    $( ".sortable" ).sortable({
    	placeholder: "ui-state-highlight", 
		axis: "y",
		revert: true,
		scroll: false,
		cursor: "move"
    });
    //$( ".sortable" ).disableSelection();
    $( ".subSortable" ).sortable({
		axis: "y",
		revert: true,
		scroll: false,
		cursor: "move",
		placeholder: "ui-state-highlight"
	});
	*/
    //$( ".subSortable" ).disableSelection();

    $( ".sortable" ).sortable({
	  start: function( event, ui ) {
	  	$('.ui-state-highlight').css('height',  $(ui.item).css('height'));
	  	$('.ui-state-highlight').css('line-height', $(ui.item).css('height'));
	  	$('.ui-state-highlight').css('width',  $(ui.item).css('width'));
	  }
	});

	$( ".subSortable" ).sortable({
		start: function( event, ui ) {
			$('.ui-state-highlight').css('height',  $(ui.item).css('height'));
			$('.ui-state-highlight').css('width',  $(ui.item).css('width'));
			$('.ui-state-highlight').css('line-height', $(ui.item).css('height'));
		}
		,update:function(event,ui){
			var contentInOrder=JSON.stringify($(this).sortable("toArray"));
			var contentgroupid=$(this).attr("contentgroupid");
			$.ajax({
				type: 'POST',
				url: 'class.ContentAdmin.php?subject='+subject+'&action=saveContentOrder&data='+contentInOrder+'&contentgroupid='+contentgroupid,
				success:function(result){
					console.log(result);
				}
			});
		}
	});

				$(document).on('change',"#sectionSelect",{} ,function(){
					var section=$("#sectionSelect").val().substring(7);
					window.location.assign('/inputtingContent/class.ContentAdmin.php?subject='+subject+'&section='+section);
				});
				
				$(document).on('click',".delContentgroup",{} ,function(){
					var contentgroupid=$(this).attr("contentgroupid");
					if(confirm("Are you sure you wish to delete this content group? All content within it will also be deleted.")){
						$.ajax({
							type: 'POST',
							url: 'class.ContentAdmin.php?subject='+subject+'&action=delContentgroup&contentgroupid='+contentgroupid,
							success:function(result){
								$("#contentgroupContainer_"+contentgroupid).remove();
								console.log(result);
							}
						});
					}
				}); 

				$(document).on('click',".addContent",{} ,function(){
					var contentgroupid=$(this).attr("contentgroupid");
					$.ajax({
						type: 'POST',
						url: 'class.ContentAdmin.php?subject='+subject+'&action=newContent&sectionid='+sectionid+'&contentgroupid='+contentgroupid,
						success:function(result){
							//window.location.assign('/inputtingContent/class.ContentAdmin.php?subject='+subject+'&section='+sectionid);
							$.ajax({
								type: 'POST',
								url: 'class.ContentAdmin.php?subject='+subject+'&action=drawModifiedContent&sectionid='+sectionid,
								success:function(result){
									$(".modifyContentContainer").html(result);
								}
							});
						}
					});
				});

				$(document).on('click',".addContentgroup",{} ,function(){
					$.ajax({
						type: 'POST',
						url: 'class.ContentAdmin.php?subject='+subject+'&action=newContentgroup&sectionid='+sectionid,
						success:function(result){
							$.ajax({
								type: 'POST',
								url: 'class.ContentAdmin.php?subject='+subject+'&action=drawModifiedContent&sectionid='+sectionid,
								success:function(result){
									$(".modifyContentContainer").html(result);
								}
							});
						}
					});
				});
				
				$(document).on('click',".delContent",{} ,function(){
					var contentid=$(this).attr("contentid");
					if(confirm("Are you sure you wish to delete this content?")){
						$.ajax({
							type: 'POST',
							url: 'class.ContentAdmin.php?subject='+subject+'&action=delContent&contentid='+contentid,
							success:function(result){
								$("#realContent_"+contentid).remove();
								console.log(result);
							}
						});
					}
				});

				$(document).on('change',".mediumSelect",{} ,function(){
					var contentid=this.id.substring(8);
					var mediumid=$(this).find('option:selected').val();
					$.ajax({
						type: 'POST',
						url: 'class.ContentAdmin.php?subject='+subject+'&action=changeContentMediumByid&contentid='+contentid+'&mediumid='+mediumid,
						success:function(result){
							console.log(result);
						}
					});
				});

				$(document).on('change',".typeSelect",{} ,function(){
					var contentgroupid= this.id.substring(13);
					var typeid=$(this).find('option:selected').val();
					$.ajax({
						type: 'POST',
						url: 'class.ContentAdmin.php?subject='+subject+'&action=changeContentgroupTypeByid&contentgroupid='+contentgroupid+'&typeid='+typeid,
						success:function(result){
							console.log(result);
						}
					});
				});


  });
