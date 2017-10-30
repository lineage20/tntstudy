/*!
 * Copyright 2015 Comlimi All Rights Reserved.
 * 厘米设计 http://www.comlimi.com   
 * Time: on April 12, 2015
 */

function comlimi_pic() {
    var LPwE1 = 10;
    comlimi_pic2["innerHTML"] = comlimi_pic1["innerHTML"];

    function Marquee() {
        if (picbox["scrollLeft"] >= comlimi_pic1["scrollWidth"]) {
            picbox["scrollLeft"] = 0;
        } else {
            picbox["scrollLeft"]++;
        }
    }
    var toZTswDF2 = setInterval(Marquee, LPwE1);
    picbox["onmouseover"] = function() {
        clearInterval(toZTswDF2);
    }
    picbox["onmouseout"] = function() {
        toZTswDF2 = setInterval(Marquee, LPwE1);
    }
};