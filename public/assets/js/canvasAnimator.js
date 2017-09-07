window.addEventListener("load", function() {
    clearTimeout(timeout);
    var mouseX = "sh";
    var mouseY = "";
    var canvas = document.getElementById('myCanvas');
    var bounds = document.body.getBoundingClientRect();
    canvas.width = bounds.right - 120;
    canvas.height = window.innerHeight - (window.innerHeight / 15);
    var mycanvas = canvas.getContext('2d');
    var building1 = new Image();
    building1.src = "http://takshak.in/2017/public/assets/img/new/building1.png";
    var building2 = new Image();
    building2.src = "http://takshak.in/2017/public/assets/img/new/building2.png";
    var building3 = new Image();
    building3.src = "http://takshak.in/2017/public/assets/img/new/building3.png";
    var building4 = new Image();
    building4.src = "http://takshak.in/2017/public/assets/img/new/building4.png";
    var building5 = new Image();
    building5.src = "http://takshak.in/2017/public/assets/img/new/building5.png";
    var block1 = new Image();
    block1.src = "http://takshak.in/2017/public/assets/img/new/block1.png";
    var block2 = new Image();
    block2.src = "http://takshak.in/2017/public/assets/img/new/block2.png";
    var block3 = new Image();
    block3.src = "http://takshak.in/2017/public/assets/img/new/block3.png";
    var block4 = new Image();
    block4.src = "http://takshak.in/2017/public/assets/img/new/block4.png";
    var block5 = new Image();
    block5.src = "http://takshak.in/2017/public/assets/img/new/block5.png";
    var myImg = new Image();
    myImg.src = "http://takshak.in/2017/public/assets/img/new/terrain2.png";
    var status = document.getElementById("status");
    var yPrev = "";
    var height = (canvas.width / 3);
    var width = (canvas.width / 2);
    var rectX = (canvas.width / 2) - (width / 2);
    var rectY = (canvas.height / 2) - (height / 2);
    var buildings = [{
        id: "building1",
        src: "http://takshak.in/2017/public/assets/img/new/building1.png",
        obj: building1,
        x: rectX + 130,
        y: rectY,
        Sx: 100,
        Sy: 100
    }, {
        id: "building2",
        src: "http://takshak.in/2017/public/assets/img/new/building2.png",
        obj: building2,
        x: rectX + 60,
        y: rectY + 170,
        Sx: 100,
        Sy: 80
    }, {
        id: "building3",
        src: "http://takshak.in/2017/public/assets/img/new/building3.png",
        obj: building3,
        x: rectX + 140,
        y: rectY + 310,
        Sx: 70,
        Sy: 70
    }, {
        id: "building4",
        src: "http://takshak.in/2017/public/assets/img/new/building4.png",
        obj: building4,
        x: rectX + 400,
        y: rectY + 90,
        Sx: 120,
        Sy: 100
    }, {
        id: "building5",
        src: "http://takshak.in/2017/public/assets/img/new/building5.png",
        obj: building5,
        x: rectX + 500,
        y: rectY + 210,
        Sx: 100,
        Sy: 100
    }];
    var blocks = [{
        id: "block1",
        src: "http://takshak.in/2017/public/assets/img/new/block1.png",
        obj: block1,
        x: rectX + 130,
        y: rectY,
        Sx: 100,
        Sy: 100
    }, {
        id: "block2",
        src: "http://takshak.in/2017/public/assets/img/new/block2.png",
        obj: block2,
        x: rectX + 60,
        y: rectY + 170,
        Sx: 100,
        Sy: 80
    }, {
        id: "block3",
        src: "http://takshak.in/2017/public/assets/img/new/blovk3.png",
        obj: block3,
        x: rectX + 140,
        y: rectY + 310,
        Sx: 70,
        Sy: 70
    }, {
        id: "block4",
        src: "http://takshak.in/2017/public/assets/img/new/block4.png",
        obj: block4,
        x: rectX + 400,
        y: rectY + 90,
        Sx: 120,
        Sy: 100
    }, {
        id: "block5",
        src: "http://takshak.in/2017/public/assets/img/new/block5.png",
        obj: block5,
        x: rectX + 500,
        y: rectY + 210,
        Sx: 100,
        Sy: 100
    }];
    myImg.addEventListener("load", function() {
        $("#eventLoader").remove();
        console.log("hey i am in");
        mycanvas.drawImage(myImg, rectX, rectY, width, height);
        buildings.forEach(function(building) {
            mycanvas.drawImage(building.obj, building.x, building.y, building.Sx, building.Sy);
        });
        canvas.addEventListener("mousemove", function(event) {
            var mouseX = event.pageX - canvas.offsetLeft;
            var mouseY = event.pageY - canvas.offsetTop;
            mycanvas.clearRect(0, 0, canvas.width, canvas.height);
            if (mouseY < (canvas.height / 2)) {
                var y = rectY + ((canvas.height / 2) - mouseY);
                if (y < rectY) {
                    y = yPrev;
                }
            } else {
                var y = ((canvas.height / 2) - mouseY / 2);
            }
            if (mouseX < ((canvas.width / 2) - 250)) {
                var x = ((canvas.width / 2)) + 466 - (mouseX * 2);
                if (mouseX > 135) {
                    width = (mouseX * 1.5);
                    height = mouseX;
                } else {
                    height = 135;
                    width = (height * 1.5);
                }
                mycanvas.drawImage(myImg, x, y, width, height);
            } else {
                if (mouseX > ((canvas.width / 2) + 260)) {
                    var x = ((canvas.width / 2)) - (mouseX / 3);
                    if ((canvas.width - mouseX) > 135) {
                        width = ((canvas.width - mouseX) * 1.5);
                        height = (canvas.width - mouseX);
                    } else {
                        height = 135;
                        width = (height * 1.5);
                    }
                    mycanvas.drawImage(myImg, x, y, width, height);
                } else {
                    var height = (canvas.width / 3);
                    var width = (canvas.width / 2);
                    mycanvas.drawImage(myImg, rectX, rectY, width, height);
                    buildings.forEach(function(building) {
                        mycanvas.drawImage(building.obj, building.x, building.y, building.Sx, building.Sy);
                    });
                    blocks.forEach(function(building) {
                        if (building.id == "block1") {
                            if (((mouseX > building.x - 100) && (mouseX < (building.x + building.Sx + 100))) && ((mouseY > building.y) && (mouseY < building.Sy + 100))) {
                                // mycanvas.drawImage(building.obj, building.x, building.y, building.Sx + 100, building.Sy + 100);
                                mycanvas.drawImage(building.obj, mouseX - 50, mouseY - 50, building.Sx + 100, building.Sy + 100);
                            }
                            return;
                        }
                        if (building.id == "block2") {
                            if (((mouseX > (building.x - 150)) && (mouseX < (building.x + building.Sx + 150))) && ((mouseY > building.y) && (mouseY < building.Sy + 300))) {
                                // mycanvas.drawImage(building.obj, building.x, building.y, building.Sx + 100, building.Sy + 100);
                                mycanvas.drawImage(building.obj, mouseX - 50, mouseY - 50, building.Sx + 100, building.Sy + 100);
                            }
                            return;
                        }
                        if (building.id == "block5") {
                            if (((mouseX > (building.x - 180)) && (mouseX < (building.x + building.Sx + 350))) && ((mouseY > (building.y - 10)) && (mouseY < building.Sy + 350))) {
                                // mycanvas.drawImage(building.obj, building.x, building.y, building.Sx + 100, building.Sy + 100);
                                mycanvas.drawImage(building.obj, mouseX - 50, mouseY - 50, building.Sx + 100, building.Sy + 100);
                            }
                            return;
                        }
                        if (building.id == "block3") {
                            if (((mouseX > (building.x - 350)) && (mouseX < (building.x + building.Sx + 200))) && ((mouseY > (building.y - 20)) && (mouseY < building.Sy + 400))) {
                                // mycanvas.drawImage(building.obj, building.x, building.y, building.Sx + 100, building.Sy + 100);
                                mycanvas.drawImage(building.obj, mouseX - 50, mouseY - 50, building.Sx + 100, building.Sy + 100);
                            }
                            return;
                        }
                        if (((mouseX > building.x - 100) && (mouseX < (building.x + building.Sx + 100))) && ((mouseY > building.y) && (mouseY < building.Sy + 200))) {
                            // mycanvas.drawImage(building.obj, building.x, building.y, building.Sx + 100, building.Sy + 100);
                            mycanvas.drawImage(building.obj, mouseX - 50, mouseY - 50, building.Sx + 100, building.Sy + 100);
                        }
                    });
                }
            }
            yPrev = y;
        }, false);
        canvas.addEventListener("click", function(event) {
            console.log(buildings);
            console.log(event);
            var mouseXX = event.clientX;
            var mouseYY = event.clientY;
            buildings.forEach(function(building) {
                if (building.id == "building1") {
                    if (((mouseXX > building.x - 100) && (mouseXX < (building.x + building.Sx + 100))) && ((mouseYY > building.y) && (mouseYY < building.Sy + 100))) {
                        events("Computer Science");
                    }
                    return;
                }
                if (building.id == "building2") {
                    if (((mouseXX > (building.x - 150)) && (mouseXX < (building.x + building.Sx + 150))) && ((mouseYY > building.y) && (mouseYY < building.Sy + 300))) {
                        events("Mechanical");
                    }
                    return;
                }
                if (building.id == "building5") {
                    if (((mouseXX > (building.x - 180)) && (mouseXX < (building.x + building.Sx + 350))) && ((mouseYY > (building.y - 10)) && (mouseYY < building.Sy + 350))) {
                        events("Electrical");
                    }
                    return;
                }
                if (building.id == "building3") {
                    if (((mouseXX > (building.x - 350)) && (mouseXX < (building.x + building.Sx + 200))) && ((mouseYY > (building.y - 20)) && (mouseYY < building.Sy + 400))) {
                        events("Civil");
                    }
                    return;
                }
                if (((mouseXX > building.x - 100) && (mouseXX < (building.x + building.Sx + 100))) && ((mouseYY > building.y) && (mouseYY < building.Sy + 200))) {
                    events("Electronics and Communication");
                }
            });
        });
    }, false);
    console.log(mouseX);
}, false);