// <![CDATA[
$(function() {
	
	// border-radius
	$('p.tags_line a').css({ "border-radius":"5px", "-moz-border-radius":"5px", "-webkit-border-radius":"5px" });
	
	// main_menu lavaLamp
	$('.main_menu ul').lavaLamp();
	
	// scroll select menu
	$('body').click(function (event) {
        if (event.target.nodeName != 'A') {
		    $('ul.list_slide, div.box_slide').slideUp('fast');
        }
	});
	$('a[rel="slide_menu"], span[rel="slide_menu"]').click(function (event) {
		var thisObj = $(this).parent("div.slide_select").children("ul, div");
		if (thisObj.css('display') == 'none') {
			$('ul.list_slide, div.box_slide').slideUp('fast');
			thisObj.slideDown();
		} else {
			$('ul.list_slide, div.box_slide').slideUp('fast');
		}
        event.preventDefault();
		return false;
	});
    $('a').click(function (event) {
       if ($(this).hasClass('fake')) {
           event.preventDefault();
       }
    });
	$('ul.list_slide li, div.box_slide li').click(function (event) {
        if ($(this).hasClass('fake')) {
            event.stopPropagation();
            event.preventDefault();
        } else {
            var parentObjUl = $(this).parent('ul.list_slide, div.box_slide');
            var parentObj = parentObjUl.parent("div.slide_select");
            parentObjUl.children('li').removeClass('active');
            $(this).addClass('active');
            parentObj.children('ul').slideUp('fast');
            parentObj.children('input:hidden').val($(this).children('span').attr('rel'));
            parentObj.children('span[rel="slide_menu"]').text($(this).children('span').text());
        }
	});
	
	// ToolTips
	$("#submit_form :input").tooltip({
		// place tooltip on the right edge
		position: "center right",
		// a little tweaking of the position
		offset: [-2, 10],
		// use the built-in fadeIn/fadeOut effect
		effect: "fade",
		// custom opacity setting
		opacity: 0.9
	});
	$("#addcomment label").tooltip({
		// place tooltip on the right edge
		position: "center right",
		// a little tweaking of the position
		offset: [-2, 10],
		// use the built-in fadeIn/fadeOut effect
		effect: "fade",
		// custom opacity setting
		opacity: 0.9
	});

	// Caption thumbs
	$('.thumb').mouseenter(function () {
		$(this).find('.thumb_caption div').animate({
			top: '0px'
		});
	}).mouseleave(function () {
		$(this).find('.thumb_caption div').animate({
			top: '480px'
		});
	});
    
    $('.thumb_caption').click(function(event) {
        var href = $(this).attr('data-href');
        var nodeName = event.target.nodeName;
        if (href && nodeName != 'A') {
            location.href = href;
        }
    });

});

// like it
function like_it(id, type) {
    $("#loading").ajaxStart(function(){
        $(this).show();
    }).ajaxComplete(function(){
        $(this).hide();
    });

    $.post("/", {
        ajax: "like",
        like_page_id: id,
        like_type_id: type
    },
    function(data) {
        $('div.error').remove();
        $('div.good').remove();
        if('error' == data.status) {
            $('div.content').prepend('<div class="error">'+data.message+'</div>');
            align_messages();
            $("#loading").hide();
        } else  if ('success' == data.status) {
            $('div.content').prepend('<div class="good">'+data.message+'</div>');
            align_messages();
            if (type == 1) {
                $('#a_like_site_'+id).html(data.likes_count).parent().show();
            } else if(type == 2) {
                $('a#a_like_comment_'+id).html(data.likes_count);
            } else if (type == 3) {
                $('#a_like_site_'+id).html(data.likes_count);
            } else if(type == 4) {
                $('a#a_like_comment_'+id).html(data.likes_count);
            } else if (type == 5) {
                $('a#a_like_file').html("<strong>"+data.likes_count+" Likes</strong>");
            }
            $("#loading").hide();
        }
    }, "json");

}

function unpin_it(page_id, board_id) {
  if (confirm("Are you sure?")) {
    $("#loading").ajaxStart(function(){
        $(this).show();
    }).ajaxComplete(function(){
        $(this).hide();
    });

    $.post("/", {
        ajax: "unpin",
        board_id: board_id,
        page_id: page_id
    },
    function(data) {
        $('div.error').remove();
        $('div.good').remove();
        if (data.status == 'success') {
            $('div.content').prepend('<div class="good">'+data.message+'</div>');
            $('#pin_id_'+page_id).remove();
            align_messages();
            $("#loading").hide();
        } else if(data.status == 'error') {
            $('div.content').prepend('<div class="error">'+data.message+'</div>');
            align_messages();
            $("#loading").hide();
        }
    }, "json");
  }
}

function comment_it(website_id) {
    if (website_id) {
        $('#new_comment_'+website_id).slideDown();$('#pin_comment_'+website_id).focus();
    } else {
        $('div.content').prepend('<div class="error">Please <a href="/signup.html">Login or Sign Up</a> to leave comments.</div>');
        align_messages();
    }
    return false;
}

//save it
function save_it(id) {
  if (id) {
    $('#save_website_id').val(id);
    $("#modal").modal({
        overlayClose:true,
        onShow: function() {
            //alert(collection_id());
            var collection_id = collection_id();
            if (collection_id) {
                $("select#collection_id").val(collection_id());
            }
        }
    });
  } else {
      $('div.content').prepend('<div class="error">Please <a href="/signup.html">Login or Sign Up</a> to re-pin.</div>');
      align_messages();
  }
}
function collection_id() {
    return window.localStorage.getItem("last_collection_id");
}
function set_collection_id(collection_id) {
    window.localStorage.setItem("last_collection_id", collection_id);
    return collection_id;
}
$(function() {
    $("#collection_id").change(function() {
        //alert($("select#collection_id option:selected").val());
        set_collection_id($("select#collection_id option:selected").val());
    });
});

function save_it_action(id) {
    $.post("/", {
        ajax: "save",
        save_page_id: id,
        save_collection_id: $("select#collection_id").val()
      },
      function(data) {
        $('div.error').remove();
        $('div.good').remove();
        $('div.content').prepend('<div class="'+(data.status == 'success' ? 'good' : 'error')+'">'+data.message+'</div>');
        if (data.comment_count) {
            $('#a_save_site_'+id).html(data.repin_count).parent().show();
        }
        align_messages();
        //$("#loading").hide();
        $.modal.close();
      }, "json");
}

align_messages = function() {
    var initialTop = 5;
    var windowScroll = 0;
    windowScroll = $(window).scrollTop();
    if (windowScroll < 127) { windowScroll = 0 } else { windowScroll = windowScroll - 127 };
    var top = windowScroll + initialTop;
    $('.error').css('top', top + 'px' );
    $('.good').css('top', top + 'px' );
}
$(function() {
    $(window).scroll(align_messages);
    $('.content').change(align_messages);
});

//save it
function remove_it(id) {
    $("#loading").ajaxStart(function(){
        $(this).show();
    }).ajaxComplete(function(){
        $(this).hide();
    });

    $.post("/", {
        ajax: "remove",
        remove_id: id
      },
      function(data) {
        $('div.error').remove();
        $('div.good').remove();
        $('div.content').prepend('<div class="'+(data.status == 'success' ? 'good' : 'error')+'">'+data.message+'</div>');
        align_messages();
        if (data.status == 'success') {
            $('#collection_item_'+id).hide();
        }
        $("#loading").hide();
      }, "json");
}

$(function() {
    thumb_over = function() {
        //$(this).find('div.like_comments').animate({opacity: .9}, 50);
        $(this).find('div.like_comments').css('opacity', .9);
    };
    thumb_out = function() {
        //$(this).find('div.like_comments').animate({opacity: 0}, 50);
        $(this).find('div.like_comments').css('opacity', .0);
    };

    $('.pins .pin').mouseover(thumb_over);
    $('.pins .pin').mouseout(thumb_out);
});

// leave comment for pin
function leave_comment_pin(website_id) {
    addcomment_content = $('textarea#pin_comment_'+website_id).val();
    $.post("/", {
        ajax: "comment",
        addcomment_content: addcomment_content,
        website_id: website_id,
        type: 1
    },
    function(data) {
        $('div.error').remove();
        $('div.good').remove();
        if(data.status == 'error') {
            $('div.content').prepend('<div class="error">'+data.message+'</div>');
            align_messages();
            $('input#addcomment_content').val(data.addcomment_content);
            $("#loading").hide();
        } else if (data.status == 'success') {
            $('div.content').prepend('<div class="good">'+data.message+'</div>');
            $('#new_comment_'+website_id).hide();
            var comment_append = '<div class="comment">                                              \
                        <a href="/boards.html?user_id='+data.user_id+'">                           \
                          <img src="'+data.comment_userpic+'" alt="'+data.user_membername+'" width="30"> \
                        </a>                                                                       \
                        <p><a href="/boards.html?user_id='+data.user_id+'"><b>'+data.user_membername+'</b></a>     \
                        '+data.addcomment_content_text+'</p>                                           \
                      </div>                                                                         \
                      <div class="clr"></div>';
            $('#new_comment_'+website_id).before(comment_append);
            $('textarea#pin_comment_'+website_id).val('');
            align_messages();
            //$("#loading").hide();
        }
    }, "json");
}
function delete_comment_pin(id) {
  if (confirm("Are you sure you want to delete this comment?")) {
    if (true || confirm('Are you sure?')) {
      $("#loading").ajaxStart(function(){
          $(this).show();
      }).ajaxComplete(function(){
          $(this).hide();
      });

      $.post("/", {
          ajax: "comment_delete",
          website_id: $('input#widget_comment').val(),
          delete_comment_id: id
      },
      function(data) {
          $('div.error').remove();
          $('div.good').remove();
          if (data.status =='error') {
              $('div.content').html('<div class="error">'+data.message+'</div>' + $('div.content').html());
              align_messages();
              $("#loading").hide();
          } else if (data.status == 'success') {
              $('div.content').html('<div class="good">'+data.message+'</div>' + $('div.content').html());
              align_messages();
              //$('span#count_comments').html(data.comment_count+" Comment(s):");
              //alert('delete here');
              //$('#comment_'+id).css('text-decoration', 'line-through');
              $('#comment_'+id).remove();
              $("#loading").hide();
          }
      }, "json");
    }
  }
}

function report_pin(id) {
  if (confirm("Are you sure you want to report this pin?")) {
    $("#loading").ajaxStart(function(){
        $(this).show();
    }).ajaxComplete(function(){
        $(this).hide();
    });

    $.post("/", {
        ajax: "report_pin",
        report_pin_id: id
    },
    function(data) {
        $('div.error').remove();
        $('div.good').remove();
        if (data.status =='error') {
            $('div.content').html('<div class="error">'+data.message+'</div>' + $('div.content').html());
            align_messages();
            $("#loading").hide();
        } else if (data.status == 'success') {
            $('div.content').html('<div class="good">'+data.message+'</div>' + $('div.content').html());
            align_messages();
            $("#loading").hide();
        }
    }, "json");
  }
}
// ]]>
