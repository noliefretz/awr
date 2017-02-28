j(function(){

    function debounce(b,d,a){var c;return function(){var h=this,g=arguments;var f=function(){c=null;if(!a){b.apply(h,g)}};var e=a&&!c;clearTimeout(c);c=setTimeout(f,d);if(e){b.apply(h,g)}}};     

    function bannerImgheight(){
        
        var height = 0;
        var path = j('.nfmPara, .nfmParaReverse').css('background-image').replace('url', '').replace('(', '').replace(')', '').replace('"', '').replace('"', '');
        var tempImg = '<img id="tempImg" src="' + path + '" style="width:100%;height:auto;"/>';
        j('body').append(tempImg); // add to DOM before </body>
        j('#tempImg').hide(); //hide image
        height = j('#tempImg').height(); //get height
        j('#tempImg').remove(); //remove from DOM

        return height;
        
    }
    
    function customParallax(){
        
        var bannerHeight = bannerImgheight() / 2;
        //var bannerHeight = 400;
        j('.nfmParaReverse').css('background-position', 'center '+ '-'+bannerHeight +'px');
        
        j(window).scroll(function(){
    
            var scrolled = j(window).scrollTop();
            var scrollVal = -(scrolled * 0.2);
            var reverseScrollVal = bannerHeight - (scrolled * 0.2) ;
                //scrollVal = scrollVal - 100;
            
            j('.nfmPara').css('background-position', 'center '+ scrollVal +'px');
            j('.nfmParaReverse').css('background-position', 'center -'+ reverseScrollVal +'px');
            
            console.log(bannerHeight);
            
        });
        
    }    

    customParallax();

    j(window).resize(debounce(function(e){

        customParallax();
        
    },200)).resize();   

});