$(document).ready(function() {
    changemapbg();
    fitToscreen();
});
$(window).resize(function() {
    fitToscreen();
});

function changemapbg() {

}

function fitToscreen() {
    $(".screenfit").css("height", $(window).height());
}

function openpage(name) {
    if (name != "home") {
        $("section").hide()
        $(".intro-map-bg").hide();
        $("." + name).show();
        $(".navig").hide().removeClass("active");
        $(".home").hide();
        $(".backtohome").show();
        return false;
    }
    $("section").fadeOut("fast");
    $(".home").show().addClass("active");
    $(".intro-map-bg").show();
    $(".backtohome").slideUp("fast");
    $(".navig").show().attr("style", "").addClass("active");
    $(".mobilenav").show().attr("style", "");
}


function events(name) {
    if (name != "close") {
        $(".eventList").remove();
        // $(".event_popup").css("background-image", "url("+name+".jpg");
        $(".event_popup").show();
        $(".event_popup").find("span").css({ "opacity": 0, "margin-top": -20 }).animate({ "opacity": 1, "margin-top": 0 }, 800);
        $("#depart").html(name + " Department");
        name = name.replace(/ /g, '');
        var url = "http://localhost/Takshak17/public/events/" + name;
        $.get(url, function(data, status) {
            // data.data.forEach(function(event) {
            //     console.log(event);
            // });
            // console.log(data);
            // console.log(data);
            var html = $.parseHTML(data.data);
            // console.log(html);
            $("#content").append(html);
        }, "json");
        return false;
    }
    $(".event_popup").fadeOut();
}

function opennav() {
    $(".mobilenav").addClass("active");
    $("nav.navig").removeClass("active").delay(500).fadeIn(function() { $(".mobilenav").hide().removeClass("active"); });
}