
var filter=[".links", ".resources", ".admin"];

var createLink=function createLink(link){
    var divitem=$(document.createElement("div")).addClass("grid-item grid-item--width2 "+link.type).attr("content", link.linkid);
    var linkcontainer=$(document.createElement("div")).addClass("linkcontainer flip-container").attr("target", link.link).attr("id", "link-"+link.linkid).attr("ontouchstart", "this.classList.toggle('hover');");
    
    
    var divflipper=$(document.createElement("div")).addClass("flipper");
    var llxnet="http://lliurex.net/llxlinks/";
    var divfront=$(document.createElement("div")).addClass("front").css("background-image","url("+llxnet+link.icon+")");
    
    var divback=$(document.createElement("div")).addClass("back");
    var divlinktitle=$(document.createElement("div")).addClass("linktitle").html(link.name.default);
    var hr=$(document.createElement("div")).addClass("hr");
    var divdesc=$(document.createElement("div")).addClass("linkdesc").html(link.description.default);
    $(divback).append(divlinktitle, hr,divdesc);

    console.log(divfront);
    $(divflipper).append(divfront, divback);
    
    $(linkcontainer).append(divflipper);
    $(divitem).append(linkcontainer);
    
    return divitem;
}

var setupEvents=function setupEvents(){
    // Apply isotope grid
    $('.grid').isotope({
        itemSelector: '.grid-item',
        layoutMode: 'fitRows'
    });
    
    // Manage click on links    
    $(".linkcontainer").on("click", function(event){
        event.stopPropagation();
        var target=$(this).attr("target");
        //alert("click on "+target);
        document.location=target;
           
        });
    
    // Click on categories
    $(".linkTypeIcon").on("click", function(){
        var target=$(this).attr("target");
        
        if (filter.indexOf(target)==-1){
            // target not found in array, so, let's add it
            filter.push(target);
            $(this).css("filter", "grayscale(0%) opacity(100%)");
        } else{
            filter.splice(filter.indexOf(target),1);
            $(this).css("filter", "grayscale(80%) opacity(50%)");
        }
        
        
        console.log(target);
        
        var filterstring=filter.join(", ");
        console.log(filterstring);
        $('.grid').isotope({ filter: filterstring });
        //alert($(this).attr("target"));
        
        
        });
};


function writeNews($noticia, max, div_dst){
  var $xml = $($noticia);

    node=$xml[0];
    var max_len=max;
    if (max_len>node.entries.length) max_len=node.entries.length;

    text="<ul>";
    
    if (max_len>0) {
      
        for (i=0;i<max_len;i++) {
            
            text=text+"<li><a href='"+node.entries[i].link+"'>";
            text=text+"<p class='newsbody'><span class='icon-caret-right'>&nbsp;</span>"+node.entries[i].title+"</p></a></li>";
                //alert(node.entries[i].title);
        }
        text=text+"</ul>";
    
        $("#"+div_dst).append(text);
    }
    else
        $("#"+div_dst).append("<p class='newsbody'>No hi ha notícies en aquesta secció o no es disposa de connexió a la xarxa</p>");
}


function parseRSS(url, callback, div_dst) {
$.ajax({
    url: document.location.protocol + '//ajax.googleapis.com/ajax/services/feed/load?v=1.0&num=10&callback=?&q=' + encodeURIComponent(url),
    dataType: 'json',
    success: function(data) {
      callback(data.responseData.feed, 7, div_dst);
    },
    error: function(data) {
        $("#"+div_dst).append("<p class='newsbody'>No hi ha notícies en aquesta secció o no es disposa de connexió a la xarxa</p>");
    }
  });
}


$(document).ready(function() {
    
var url=document.location.toString().split("/").slice(0,-1).join("/")+"/getRemoteResources.php";
  
  $.getJSON( url, {
    format: "json"
  })
  .done(function( data ) {
    for (i in data.links){
        var item=createLink(data.links[i]);
        $("#linksContainer").append(item);
    };
    
    setupEvents();
    
    
  })
  .fail(function(){
    setupEvents();
  });
  

    $('[data-toggle="tooltip"]').tooltip();
    
   
   $('#lliurex_news').FeedEk({
            FeedUrl: 'http://mestreacasa.gva.es/web/lliurex/lliurex_rss/journal/rss/500003310157/LliureX',
            MaxCount: 5,
            DateFormat: 'DD MMMM YYYY',
            DateFormatLang: 'ca',
            ShowDesc: false
            
        });
   
    
    
});


        
        

      

