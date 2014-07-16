var arr = [];
var i = 0;

function loadXMLDoc(url, callback, postMsg) {
    var xmlhttp;
    if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    }
    else {// code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=callback(xmlhttp);
    xmlhttp.open("POST",url,true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(postMsg);
}

function selectCell(cellElement){
    var cellClass = cellElement.getAttribute("class");
    var day = cellElement.getAttribute("day");
    var hour = cellElement.getAttribute("hour");
    var callback;
    var postMsg;
    var url;

    arr[i] = cellElement;
    if ( cellClass === "empty"){
        callback = function(xmlhttpObj){
            return function(){
                console.log(xmlhttpObj.responseText);
                cellElement.setAttribute('idsesion', xmlhttpObj.responseText);
                cellElement.innerHTML = "14";
                cellElement.setAttribute('class', 'full');
            }
        }
        postMsg="data[Lesson][day]="+day+"&data[Lesson][start_time][hour]="+hour+"&data[Lesson][start_time][min]=00&data[Lesson][end_time][hour]="+(1*hour+1)+"&data[Lesson][end_time][min]=00&data[Lesson][quota]=14";
        url = "/cakephp/Lessons/add";
    } else{
        callback = function(xmlhttpObj){
            return function(){
                cellElement.removeAttribute('idsesion');
                cellElement.innerHTML = "";
                cellElement.setAttribute('class', 'empty');
            }
        }
        postMsg="";
        url = "/cakephp/Lessons/delete/"+cellElement.getAttribute('idsesion');
    }

    loadXMLDoc(url, callback, postMsg);
}

