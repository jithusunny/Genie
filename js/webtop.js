$(document).ready(function () {
    $('#sidebar, .fullh').height(window.innerHeight - 80 + 'px');
    $("#smenu .buttons a").click(function () {
        href = $(this).attr('href');
        if (href == '#') {
            return false;
        }
        id = $(this).attr('id');
        $('#ajax_target').load(href, function (response, status, xhr) {
            if (status == "error") {
                var msg = "Sorry but there was an error: ";
                $("#ajax_target").html(msg + xhr.status + " " + xhr.statusText);
            }
            bind_link();
        });
        return false;
    });
});

function bind_list(typ) {
    $("#list > option").click(function () {
        v = $(this).val();
        url = "a_ajax_" + typ + "_data.php?id=" + v;
        $("#ajax_data").load(url, function (response, status, xhr) {
            if (status == "error") {
                var msg = "Sorry but there was an error: ";
                $("#ajax_data").html(msg + xhr.status + " " + xhr.statusText);
            }
        });
    });
}

function bind_link() {
    $(".ajax_call").click(function () {
        href = $(this).attr('href');
        if (href == '#') {
            return false;
        }
        $('#ajax_target').load(href, function (response, status, xhr) {
            if (status == "error") {
                var msg = "Sorry but there was an error: ";
                $("#ajax_target").html(msg + xhr.status + " " + xhr.statusText);
            }
            bind_link();
        });
        return false;
    });
    //console.log('Binding Link');
}
function bind_slist(){
	$("#available > option").click(function () {
		$(this).appendTo('#selected');
		$("#available > option").unbind();
		$("#selected > option").unbind();
		$("#selected > option").each(function(index, element) {
            $(this).attr('selected','selected');
        });
		bind_slist();
	});
	$("#selected > option").click(function () {
		$(this).appendTo('#available');
		$("#available > option").unbind();
		$("#selected > option").unbind();
		$("#selected > option").each(function(index, element) {
            $(this).attr('selected','selected');
        });
		bind_slist();
	});
}
function bind_form() {
    $('form').submit(function () {
        action = $(this).attr('method');
        if (action == 'get') {
            $.get($(this).attr('action'), $(this).serialize(), function (data) {
                $('#ajax_target').html(data);
                bind_link();
            });
        } else {
            $.post($(this).attr('action'), $(this).serialize(), function (data) {
                $('#ajax_target').html(data);
                bind_link();
            });
        }
        return false;
    });
}

jQuery.fn.liveUpdate = function (list) {
    list = jQuery(list);

    if (list.length) {
        // Changed 'li' to 'option' below
        var rows = list.children('option'),
            cache = rows.map(function () {
                return this.innerHTML.toLowerCase();
            });

        this.keyup(filter).keyup().parents('form').submit(function () {
            return false;
        });
    }

    return this;

    function filter() {
        var term = jQuery.trim(jQuery(this).val().toLowerCase()),
            scores = [];

        if (!term) {
            rows.show();
        } else {
            rows.hide();

            cache.each(function (i) {
                var score = this.score(term);
                if (score > 0) {
                    scores.push([score, i]);
                }
            });

            jQuery.each(scores.sort(function (a, b) {
                return b[0] - a[0];
            }), function () {
                jQuery(rows[this[1]]).show();
            });
        }
    }
};


function fullh(str){
	p=$(str).position();
	$(str).height(window.innerHeight - 60 -p.top + 'px');
}