var j = jQuery.noConflict();

j(function(){
    
    //check if viewed in mobile
    mobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent);
    
    function debounce(b,d,a){var c;return function(){var h=this,g=arguments;var f=function(){c=null;if(!a){b.apply(h,g)}};var e=a&&!c;clearTimeout(c);c=setTimeout(f,d);if(e){b.apply(h,g)}}};
    
    function getWindowWidth(){
        return j(window).width();
    }
    
    function zoomImage(){
        j("#zoomImage").elevateZoom({
            gallery: "single-product-thumb",
            galleryActiveClass: "active",
            zoomWindowFadeIn: 500,
            zoomWindowFadeOut: 500,
            lensFadeIn: 500,
            lensFadeOut: 500,
            zoomWindowPosition: 2,
            zoomWindowOffetx: 10,
            zoomWindowHeight: 200,
            zoomWindowWidth:200,
            borderSize: 1,
            easing:true    
        });
    }
    
    // slide search button
    
//    j('#slide-search-btn').on('click', function(){
//
//        var elem = j('#categorySearchWrap');
//        var up = '<i class="glyphicon glyphicon-arrow-up"></i>';
//        var down = '<i class="glyphicon glyphicon-arrow-down"></i>'
//        
//        if( elem.hasClass('active') ){
//            elem.removeClass('active');
//            j(this).html(down);
//        }
//        else{
//            elem.addClass('active');
//            j(this).html(up);
//        }
//        
//    });
    
    // image zoom magnifier
    
    zoomImage();

    // single product thumbnail
    
    j('#single-product .thumb a').on('click', function(e){
        e.preventDefault();
        var img = j(this).attr('data-preview');
        var preview = j('#single-product .preview-thumb img');
        var newSrc = img;
        var smallImage = newSrc;
        var largeImage = newSrc;
        
        j('#single-product .thumb a').removeClass('active');
        j(this).addClass('active');
        
        var ez =   j('#zoomImage').data('elevateZoom');
        
        ez.swaptheimage(smallImage, largeImage); 
        
    });
    
    // category tab
    
    j('#category .nav-tabs a').click(function (e) {
      e.preventDefault();
      j(this).tab('show');
    })    
    
    //prevent hashtag
    
    j('.panel-title a').on('click', function(e){
        e.preventDefault();
    });
    
    // initiate scrollbar
    
    j('.scrollable').niceScroll({cursorcolor:"#c6c6c6"});
    
    // hiding scroll in sidebar
    
    j('#accordion').on('hidden.bs.collapse', function(){
       j(this).find('.scrollable').css('pointer-events','none');
    });
    j('#accordion').on('shown.bs.collapse', function(){
       j(this).find('.scrollable').css('pointer-events','auto');
    });
    
    
    // terms
    
    j('#more-term a').on('click', function(e){
        e.preventDefault();
        e.stopPropagation();
        j('.navbar-nav-custom').toggleClass('open');
        
        var thisText = j(this).text();
        if( thisText == 'More +' ){
            thisText = 'Less -';
        }
        else{
            thisText = 'More +';
        }
        
        j(this).text(thisText);
        
    });
    
    // category
    
    j('#more-cat a').on('click', function(e){
        e.preventDefault();
        e.stopPropagation();
        j('#category ul').toggleClass('open');
        
        var thisText = j(this).text();
        if( thisText == 'More +' ){
            thisText = 'Less -';
        }
        else{
            thisText = 'More +';
        }
        
        j(this).text(thisText);
        
    });
    
    // sidebar on mobile
    
    function toggleSidebar(){
        var el = j('#offcanvasCon');
        var wrap = j('#wrapper');
        
        if(el.hasClass('showNav')){
            el.removeClass('showNav');
        }
        else{
            el.addClass('showNav');
        }
        
    }
    
    j('.narrow-results').on('click', function(){
        toggleSidebar();
        j(this).addClass('active');
    });
    
    j('#closeOffCanvas').on('click', function(){
        toggleSidebar();
        j('.narrow-results').removeClass('active');
    });
    
    // toggle top navigation on mobile
    
    j('#topright a').on('click', function(e){
        e.preventDefault();
        e.stopPropagation();
        
        var thisParent = j(this).parent('li');
        
        if( thisParent.hasClass('open') ){
            j('#topright li').removeClass('open').addClass('closeN');
        }
        else{
            j('#topright li').removeClass('open');
            thisParent.addClass('open').removeClass('closeN');
        }
    });
    
    //parallax
    
    if(!Modernizr.touch){
        myParaxify = paraxify('.paraxify');
    }
    
    // collapsing offers on mobile
    
    j('#offers .title').on('click', function(){
        var accordParent = j(this).parent('.accord-parent');
        if( getWindowWidth() <= 482 ){
            
            if( accordParent.hasClass('open') ){
                j('.accord-parent').removeClass('open').find('.title span').html('+').removeClass('minus');
            }
            else{
                j('.accord-parent').removeClass('open').find('.title span').html('+').removeClass('minus');
                j(this).parent('div').addClass('open').find('.title span').html('-').addClass('minus');
            }
            
        }
    });
    
    // go to page
    
    j('.pagination2 input').on('change keyup paste', function(){
        var thisValue = j(this).val();
        var thisBtn = j('.pagination2 button');
        var thisParetn = j(this).parents('.input-group');
        if(thisValue.match(/^\d+$/)){
            thisParetn.find('input').addClass('active');
            thisBtn.removeAttr('disabled').removeClass('btn-disabled').addClass('btn-active');
        }
        else{
            thisParetn.find('input').removeClass('active');
            thisBtn.attr('disabled',true).removeClass('btn-active').addClass('btn-disabled');
        }
    });
    
    // sidebar range
    
    j('#collapseTwo input, #collapseThree input, #collapseFour input').on('change keyup paste', function(){
        var thisParent = j(this).parents('.input-group');
        var thisValue = j(this).val();
        var mainParent = j(this).parents('.panel-collapse');
        var thisBtns = mainParent.find('button');
        
        if( thisParent.hasClass('range-from') ){
            
            var otherValue = mainParent.find('.range-to input').val();
            
            if( !thisValue.match(/^\d+$/) || thisValue == " " || !otherValue.match(/^\d+$/) || otherValue == " " ){
                thisBtns.attr('disabled',true).removeClass('btn-active').addClass('btn-disabled');
            }
            else{
                thisBtns.removeAttr('disabled').removeClass('btn-disabled').addClass('btn-active');
            }
            
        }
        else if( thisParent.hasClass('range-to') ){
            
            var otherValue = mainParent.find('.range-from input').val();
            
            if( !thisValue.match(/^\d+$/) || thisValue == " " || !otherValue.match(/^\d+$/) || otherValue == " " ){
                thisBtns.attr('disabled',true).removeClass('btn-active').addClass('btn-disabled');
            }
            else{
                thisBtns.removeAttr('disabled').removeClass('btn-disabled').addClass('btn-active');
            }
            
        }
        else{}
        
    });
    
    // reset button
    j('.btn-custom-reset').on('click', function(e){
        e.preventDefault();
        e.stopPropagation();
        
        var thisParent = j(this).parents('.panel-collapse');
        thisParent.find('input').val('');
        thisParent.find('button').attr('disabled',true).removeClass('btn-active').addClass('btn-disabled');        
    });
    

    
    // get highest height of product element
    function getHighestHeight($elem){
        var eHeight = $elem.map(function(){
            return j(this).height();
        });
        
        var maxHeight = Math.max.apply(null, eHeight);
        
        $elem.height(maxHeight);

    }
    
    function searchClearOnMobile(){

        if( getWindowWidth() <= 767 ){

            j('.input-group input[type="search"]').on('keyup paste change', function(){

                var inputGroupAddon = j(this).next('.input-group-addon');
                var thisVal = j(this).val();

                if( thisVal == "" ){
                    inputGroupAddon.find('.icon-search-light').css('display','block');
                    inputGroupAddon.find('.icon-search-dark').css('display','block');
                    inputGroupAddon.find('.icon-close-rounded').hide();
                }
                else{
                    inputGroupAddon.find('.icon-search-light').hide();
                    inputGroupAddon.find('.icon-search-dark').hide();
                    inputGroupAddon.find('.icon-close-rounded').css('display','block');
                }

            });

            j(document).on('click', '.input-group-addon .icon-close-rounded', function(){

                j(this).parents('.input-group').find('input[type="search"]').val('');
                j('.input-group .input-group-addon .icon-close-rounded').hide();
                j('.input-group .input-group-addon .icon-search-light').css('display','block');
                j('.input-group .input-group-addon .icon-search-dark').css('display','block');

            });             
            
        }
        
    }
    
    function collapseOffcanvas($elem){
        var wWidth = getWindowWidth();        
        if( wWidth <= 767 ){
            $elem.find('.panel-collapse').removeClass('in');
        }
        else{
            $elem.find('.panel-collapse').addClass('in');
        }
        
    }
    
    function showMoreLess($elem){
        
        var wWidth = j('#nav .container').outerWidth();
        var eWidth = 0;
        
        $elem.each(function(){
            var x = j(this).outerWidth();
            eWidth += x;
        });
         
        if( wWidth > 480 ){
            
            if( eWidth > wWidth ){
                j('#more-term').css('visibility','visible');
            }
            else{
                j('#more-term').css('visibility','hidden');
            }
            
        }
        
    }
    
    showMoreLess(j('.navbar-nav-custom li'));
    
    //getHighestHeight(j('.categoryItem'));
    collapseOffcanvas(j('#offcanvas'));
    
    searchClearOnMobile();

    j(window).resize(debounce(function(e){
        
        //getHighestHeight(j('.categoryItem'));
        collapseOffcanvas(j('#offcanvas'));
        showMoreLess(j('.navbar-nav-custom li'));
        searchClearOnMobile();
        //customParallax();
        
    },200)).resize();    
    
});