  (function($){

"use strict";
$.fn.loadmore = function(options){

var self = this,
    settings = $.extend({
        source : '',
        step : 2,
        category : '',
       
    },options),

    stepped = 1, // number of values stepped.
    posts = self.find('.posts'), // finding the element by selector.
    items = self.find('.items'),
  
  finished = function(){
  	
   self.find('.load-more').remove();
   self.append('<div class = "end"> That\'s all Folks!</div>');

  },

  append = function(value){ //appeds the new content

var name,part,likes,data;
posts.remove(); //removes initial template.

for(name in value)
{ 
	if(value.hasOwnProperty(name)){ //
     part = posts.find('*[data-field="' +name+ '"]'); //find all(means*) elements with data field = 'some name'
		
    
	 part.text(value[name]);
   likes = posts.find('*[id = "'+name+'"]');
   var a = likes.text(value[name]);

 

	//ensures that the items have been found


	}

}

posts.clone().appendTo(items)

  },

  load = function(start,count){ //performs ajax request.

  $.ajax({

  url : settings.source,
  type : 'get',
  data : {start : start,count : count,category : settings.category},
  cache : false,
  async : true,

  success : function(data)
  {
  	var items = data.items;
  
    $(items).each(function(index,value){
        append(value);
          var art = items[index].article_id;
         

  
   });
      
      stepped = stepped + count;  //stepped is how many ties we clicked load more
  	
  
  if(data.last === true)
  {
  	finished();
  }


  },//end success



  }); //end ajax call

  }; // end load funnction
  if(settings.source.length){

   self.find('.load-more').on('click',function(){

   load(stepped,settings.step);
   return false;
   });
    load(1 , settings.step);
     }
  else
	{
		console.log("Source Required ");
	}
};



  }(jQuery))