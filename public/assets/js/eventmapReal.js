$(document).ready(function() {
    setMap();
    $(".terrain img").hover(function() {
        var ofs = $(this).offset();
        $(".mapinfo").html($(this).attr("data-name")).css({ "top": ofs.top + $(this).height() + 20, "left": ofs.left }).show();

    }, function() { $(".mapinfo").hide(); });
    $(".terrain img").click(function() {
        events($(this).attr("data-call"));
    });
});
$(window).resize(function() {
    setMap();
});
var buildings = [{
    id: "building1",
    src: "http://takshak.in/2017/public/assets/img/new/building1.png",
    x: 0.19,
    y: -0.04,
    hrh: 0.26,
    name: "Computer Science and Engineering",
    call: "Computer Science"
}, {
    id: "building2",
    src: "http://takshak.in/2017/public/assets/img/new/building2.png",
    x: 0.08,
    y: 0.348,
    hrh: 0.26,
    name: "Mechanical Engineering",
    call: "Mechanical"
}, {
    id: "building3",
    src: "http://takshak.in/2017/public/assets/img/new/building3.png",
    x: 0.13,
    y: 0.643,
    hrh: 0.25,
    name: "Civil Engineering",
    call: "Civil"
}, {
    id: "building4",
    src: "http://takshak.in/2017/public/assets/img/new/building4.png",
    x: 0.61,
    y: 0.18,
    hrh: 0.255,
    name: "Electrical and Electronics Engineering",
    call: "Electrical"
}, {
    id: "building6",
    src: "http://takshak.in/2017/public/assets/img/new/building6.png",
    x: 0.77,
    y: 0.44,
    hrh: 0.3125,
    name: "Electronics and Communications",
    call: "Electronics and Communication"
}, {
    id: "building5",
    src: "http://takshak.in/2017/public/assets/img/new/building5.png",
    x: 0.55,
    y: 0.34,
    hrh: 0.3125,
    name: "MCA Department",
    call: "MCA"
}, {
    id: "building7",
    src: "http://takshak.in/2017/public/assets/img/new/building7.png",
    x: 0.55,
    y: 0.34,
    hrh: 0.3125,
    name: "CORE Events",
    call: "MCA"
}];

function setMap() {
    var height = $(window).height() - 170;
    height = (height < 380) ? 380 : height;
    width = 1249 / 616 * height;
    $("span.terrain").css({ "width": width, "height": height }).html("");
    $.each(buildings, function(i, b) {
        var img = "<img src='" + b.src + "' style='top:" + (height * b.y) + "px;left:" + (width * b.x) + "px;height:" + (height * b.hrh) + "px' data-name='" + b.name + "' data-call='" + b.call + "' >"
        $("span.terrain").append(img);
    });
}