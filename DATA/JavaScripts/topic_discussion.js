$(window).load(function(e) {
    $(".replyButton").click(function(e) {		
        e.preventDefault();
		$(".writtingBox").remove();
		var $this = $(this);
		var topic = $this.attr('topic');
		var page = $this.attr('page');
        $.ajax({
            type: "POST",
            url: 'DATA/replyBox.php',
            data: {topicID:topic, endPage:page},
			dataType:"html",
            success: function(data)
            {
                $this.parent(".topic").after(data);
				$('.writtingBox textarea').focus();
            },
			failure: function()
			{
				alert("error");
			}
        });
    });
	$(".newPost").click(function(e) {		
        e.preventDefault();
		$(".writtingBox").remove();
		var $this = $(this);
		var topic = $this.attr('topic');
		var page = $this.attr('page');
        $.ajax({
            type: "POST",
            url: 'DATA/replyBox.php',
            data: {topicID:topic, endPage:page},
			dataType:"html",
            success: function(data)
            {
                $(".header").after(data);
				$('.writtingBox textarea').focus();
            },
			failure: function()
			{
				alert("error");
			}
        });
    });
	$(document).on("click","#deleteTopic", function(){ 
		var $this = $(this);
		$("#dialog-confirm").dialog({
			resizable: false,
		  	height:300,
			width:400,
		  	modal: true,
		  	buttons: {
				"Delete topic?": function() {
					var topic = $("#deleteTopic").attr('topic');
			  		$.ajax({
						type: "POST",
						url: 'DATA/Classes/deleteTopic.php',
						data: {topicID:topic},
						dataType:"html",
						success: function(data)
						{
							window.open("http://webdesign4.georgianc.on.ca/~200176338/AdvancedWebProgrammingClass/Forum/index.php","_self");
						},
						failure: function()
						{
							alert("error");
						}
					});
				},
				Cancel: function() {
			  		$( this ).dialog( "close" );
				}
		  	}
		});
	});
	
});