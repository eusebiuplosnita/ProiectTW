$(document).ready(function () {$("#submit-168631360").bind("click", function (event) {$.ajax({beforeSend:function (XMLHttpRequest) {$("#inprogress").fadeIn();}, data:$("#submit-168631360").closest("form").serialize(), dataType:"html", succes:"$(\"#inprogress\").fadeOut();", success:function (data, textStatus) {$("#room").html(data);}, type:"post", url:"\/proiect\/admin"});
return false;});
$("#submit-298113579").bind("click", function (event) {$.ajax({beforeSend:function (XMLHttpRequest) {$("#inprogress").fadeIn();}, data:$("#submit-298113579").closest("form").serialize(), dataType:"html", succes:"$(\"#inprogress\").fadeOut();", success:function (data, textStatus) {$("#room").html(data);}, type:"post", url:"\/proiect\/admin"});
return false;});
$("#submit-1043576187").bind("click", function (event) {$.ajax({beforeSend:function (XMLHttpRequest) {$("#inprogress").fadeIn();}, data:$("#submit-1043576187").closest("form").serialize(), dataType:"html", succes:"$(\"#inprogress\").fadeOut();", success:function (data, textStatus) {$("#room").html(data);}, type:"post", url:"\/proiect\/admin"});
return false;});
$("#submit1").bind("click", function (event) {$.ajax({beforeSend:function (XMLHttpRequest) {$("#inprogress").fadeIn();}, data:$("#submit1").closest("form").serialize(), dataType:"html", succes:"$(\"#inprogress\").fadeOut();", success:function (data, textStatus) {$("#post").html(data);}, type:"post", url:"\/proiect\/admin"});
return false;});});