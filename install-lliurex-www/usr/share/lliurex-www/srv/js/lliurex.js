
function BindEventHandlers(){
    
    animate_duration=200;
    
    $("#llxbt").bind('mouseover', function( event ){
        $("#llxbt").animate({'margin': '0px 0px 0px -6px'},animate_duration); 
    });
    $("#llxbt").bind('mouseout', function( event ){
        $("#llxbt").animate({'margin': '0px 0px 0px -120px'},animate_duration); 
    });
    
    
    $("#mestrebt").bind('mouseover', function( event ){
        $("#mestrebt").animate({'margin': '0px 0px 0px -6px'},animate_duration); 
    });
    $("#mestrebt").bind('mouseout', function( event ){
        $("#mestrebt").animate({'margin': '0px 0px 0px -120px'},animate_duration); 
    });
    
    
    $("#saibt").bind('mouseover', function( event ){
        $("#saibt").animate({'margin': '0px 0px 0px -6px'},animate_duration); 
    });
    $("#saibt").bind('mouseout', function( event ){
        $("#saibt").animate({'margin': '0px 0px 0px -120px'},animate_duration); 
    });
    
    
    $("#header").bind('click', function( event ){
        location.href='http://www.lliurex.net';
    });
     
}

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
   BindEventHandlers();
   parseRSS("http://mestreacasa.gva.es/web/lliurex/lliurex_rss/journal/rss/500003310157/LliureX", writeNews, "newscontainer");
   parseRSS("http://lliurexfacil.blogspot.com/feeds/posts/default", writeNews, "newscontainerllx_facil");
});
