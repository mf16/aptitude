$(function() {
    $( ".sortable" ).sortable({
    	handle: ".handle",
		axis: "y",
		//revert: true,
		cursor: "move",
    	placeholder: "ui-state-highlight",
	  start: function( event, ui ) {
	  	$('.ui-state-highlight').css('height', $(ui.item).css('height'));
	  	$('.ui-state-highlight').css('line-height', $(ui.item).css('height'));
	  	$('.ui-state-highlight').css('width', $(ui.item).css('width'));
	  }
	});
    $( ".sortable" ).disableSelection();

	$( ".subSortable" ).sortable({
		handle: ".subHandle",
		axis: "x",
		//revert: true,
		cursor: "move",
		placeholder: "ui-state-highlight",
		start: function( event, ui ) {
			$('.ui-state-highlight').css('height', $(ui.item).css('height'));
			$('.ui-state-highlight').css('width', $(ui.item).css('width'));
			$('.ui-state-highlight').css('line-height', $(ui.item).css('height'));
		}
		,update:function(event, ui){
			var contentInOrder=JSON.stringify($(this).sortable("toArray"));
			var contentgroupid=$(this).attr("contentgroupid");
			$.ajax({
				type: 'POST',
				url: 'class.ContentAdmin.php?subject='+subject+'&action=saveContentOrder&data='+contentInOrder+'&contentgroupid='+contentgroupid,
				success:function(result){
					//console.log(result);
				}
			});
		}
	});
	$( ".subSortable" ).disableSelection();


	//Populate section by changing the page location to the selected section
	$(document).on('change',"#sectionSelect",{} ,function(){
		var section=$("#sectionSelect").val().substring(7);
		window.location.assign('/inputtingContent/class.ContentAdmin.php?subject='+subject+'&section='+section);
	});

	//Global variable for element that is being edited
	var $activeEdit;
	var activeHTML;

/******CONTENT GROUP HANDLING******/
	//Add content section
	$(document).on('click',".addContentGroup",{} ,function(){
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
	//Remove entire group of content
	$(document).on('click',".delContentGroup",{} ,function(){
		var contentgroupid=$(this).attr("contentgroupid");
		if(confirm("Are you sure you wish to delete this content group? All content within it will also be deleted.")){
			$.ajax({
				type: 'POST',
				url: 'class.ContentAdmin.php?subject='+subject+'&action=delContentgroup&contentgroupid='+contentgroupid,
				success:function(result){
					$("#contentgroupContainer_"+contentgroupid).remove();
					//console.log(result);
				}
			});
		}
	});
	//Change row type of content
	$(document).on('change',".typeSelect",{} ,function(){
		var contentgroupid= this.id.substring(13);
		var typeid=$(this).find('option:selected').val();
		$.ajax({
			type: 'POST',
			url: 'class.ContentAdmin.php?subject='+subject+'&action=changeContentgroupTypeByid&contentgroupid='+contentgroupid+'&typeid='+typeid,
			success:function(result){
				//console.log(result);
			}
		});
	});




/******SECTION HANDLING******/
	//Add content section
	$(document).on('click',".addNewSection",{} ,function(){
		var contentgroupid=$(this).attr("contentgroupid");
		if( $('#saveBlock').length ){
			populateModal('Before you do that...', 'There is another section that you were edtiting. Do you want to save changes for that section? If not, your modifications will not be saved.', '<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button><button type="button" class="btn btn-default modalRemoveChanges" clickid="#addNewSection_'+contentgroupid+'" data-dismiss="modal">Remove changes</button><button type="button" class="btn btn-primary modalSaveChanges" clickid="#addNewSection_'+contentgroupid+'" data-dismiss="modal">Save changes</button>');
		}
		else{
			$.ajax({ type: 'POST', url: 'class.ContentAdmin.php?subject='+subject+'&action=newContent&sectionid='+sectionid+'&contentgroupid='+contentgroupid,
				success:function(result){
					$.ajax({ type: 'POST', url: 'class.ContentAdmin.php?subject='+subject+'&action=drawModifiedContent&sectionid='+sectionid,
						success:function(result){
							//Reload the page through AJAX to make sure everything is up to date
							$(".modifyContentContainer").html(result);
						}
					});
				}
			});
		}
	});
	//Remove section of content
	$(document).on('click',".delContent",{} ,function(){
		var contentid=$(this).attr("contentid");
		if(confirm("Are you sure you wish to delete this content?")){
			$.ajax({ type: 'POST', url: 'class.ContentAdmin.php?subject='+subject+'&action=delContent&contentid='+contentid,
				success:function(result){
					$("#realContent_"+contentid).remove();
				}
			});
		}
	});


	$(document).on('click',".mediumSave",{} ,function(){
		//var contentid=this.id.substring(12);
		var contentid=$(this).attr("contentid");
		var mediumid=$('#contentCont_'+contentid).find('option:selected').val();
		if(mediumid == 1){
			//video - paste url section
			$('#contentCont_'+contentid).after('<div class="hidden" id="contentCont_'+contentid+'">Text</div>');
			$('#contentCont_'+contentid).remove();
			$('#content_'+contentid).html('<div class="col-md-11 no-pd"><input id="videoURI" class="form-control" placeholder="Embed code..."/></div><div class="col-md-1 text-center"><a id="saveBlock" contentid="'+contentid+'" class="btn  btn-default" tabindex="-1" href="javascript:;"><span>Save</span></a></div>');
			activeHTML = '';
			$activeEdit = $('#content_'+contentid);
		} else if(mediumid == 2){
			//Check if there is another box open already and save if user wants
			if( $('#saveBlock').length ){
				populateModal('Before you do that...', 'There is another section that you were edtiting. Do you want to save changes for that section? If not, your modifications will not be saved.', '<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button><button type="button" class="btn btn-default modalRemoveChanges" clickid="contentCont_'+contentid+'" data-dismiss="modal">Remove changes</button><button type="button" class="btn btn-primary modalSaveChanges" clickid="contentCont_'+contentid+'" data-dismiss="modal">Save changes</button>');
			} else {
				//Update medium to database
				$.ajax({ type: 'POST', url: 'class.ContentAdmin.php?subject='+subject+'&action=changeContentMediumByid&contentid='+contentid+'&mediumid='+mediumid,
					success:function(result){
						//Save default code if nothing is entered
						var content = encodeURI('<span class="placeholder">Double click to start typing here...</span>');
						activeHTML = content;
						$.ajax({type: 'POST', url: 'class.ContentAdmin.php?subject='+subject+'&action=saveContentByid&contentid='+contentid+'&content='+content, success:function(result){}});
					}
				});
				//Initiate RTE
				$('#content_'+contentid).html('<textarea id="editor" placeholder="Start typing here..."></textarea>');
				$('#editor').wysihtml5();
				//Set medium to Text and not visible
				$('#contentCont_'+contentid).after('<div class="hidden" id="contentCont_'+contentid+'">Text</div>');
				$('#contentCont_'+contentid).remove();
				$activeEdit = $('#content_'+contentid);
				$('.wysihtml5-toolbar').append('<li style="float: right;"><a id="saveBlock" contentid="'+contentid+'" class="btn  btn-default" tabindex="-1" href="javascript:;"><span>Save</span></a></li>');
			}
		} else if(mediumid == 3){
			//interactive - upload
		}
	});

	//Change the medium type and populate html accordingly
	$(document).on('change',".mediumSelect",{} ,function(){

	});

	//Update block of text to database
	$(document).on('click',"#saveBlock",{} ,function(){
		var contentid=$(this).attr("contentid");
		var medium = $('#contentCont_'+contentid).text();
		console.log(medium);
		if(medium == 'Text'){
				var content = $(".wysihtml5-sandbox").contents().find(".wysihtml5-editor>p").html();
				if(content == undefined){
					content = '<span class="placeholder">Double click to start typing here...</span>';
				}
		}
		else if (medium == 'Video'){
				var content= $("#video").val();
				videoParts = content.split(' ');
				console.log(videoParts);
		}
		else if (medium == 'Interactive'){
		}
		//Output content to database through ajax
		activeHTML = content;
		content = encodeURI(content);
		$.ajax({
			type: 'POST',
			url: 'class.ContentAdmin.php?subject='+subject+'&action=saveContentByid&contentid='+contentid+'&content='+content,
			success:function(result){
				//console.log(result);
			}
		});
		$activeEdit.html(activeHTML);
	});

	//Revert changes to active html
	$(document).on('click',"#cancelBlock",{} ,function(){
		$activeEdit.html(activeHTML);
	});



//////Universal functions for modal////////
	function populateModal(title, body, footer){
		$('.modal-title').text(title);
		$('.modal-body').html(body);
		$('.modal-footer').html(footer);
		$('#universalModal').modal('show');
	}

	$(document).on('click',".modalRemoveChanges",{} ,function(){
		$('#cancelBlock').click();
		var id=$(this).attr("clickid");
		//$(id).click();
		$(id).change();
	});

	$(document).on('click',".modalSaveChanges",{} ,function(){
		$('#saveBlock').click();
		var id=$(this).attr("clickid");
		//$(id).click();
		$(id).change();
		console.log(id);
	});




	//Update block of text to database
	$(document).on('dblclick',".contentContainer",{} ,function(){
		//Check type that needs to be edited
		var contentid=$(this).attr("contentid");
		var medium = $('#contentCont_'+contentid).text();
		if(medium == 'Text'){
			//$(this).attr
			//Check if there is another box open already and save if user wants
			if( $('#saveBlock').length ){
				var r = confirm("There is another section that you were edtiting. Do you want to save changes for that section? If not, your modifications will not be saved.");
				if (r == true) {
				    $('#saveBlock').click();
				} else {
					activeHTML = '';
				}
			    $activeEdit.html(activeHTML);
			}

			var contentid=this.id.substring(8);
			var textFromContent;
			activeHTML = $('#content_'+contentid).html();
			if (activeHTML == '<span class="placeholder">Double click to start typing here...</span>'){
				textFromContent = '';
			}
			else{
				textFromContent = activeHTML;
			}
			$('#content_'+contentid).html('<textarea id="editor" placeholder="Start typing here..."><p>'+textFromContent+'</p></textarea>');
			$('#editor').wysihtml5();
			$activeEdit = $('#content_'+contentid);
			$('.wysihtml5-toolbar').append('<li style="float: right;"><a id="saveBlock" class="btn btn-default" contentid="'+contentid+'" tabindex="-1" href="javascript:;"><span>Save</span></a></li><li style="float: right;"><a id="cancelBlock" class="btn  btn-default" tabindex="-1" href="javascript:;"><span>Cancel</span></a></li>');
		}
		else if (medium == 'Video'){
		}
		else if (medium == 'Interactive'){
		}
	});
});

