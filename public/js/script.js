jQuery(document).ready(function(){
    jQuery('.hamburger-menu').click(function(){
        jQuery('.mobile-sidebar').addClass('open-sidebar');
    })
    jQuery('.sidebar-close svg').click(function(){
        jQuery('.mobile-sidebar').removeClass('open-sidebar');
    })

    // Equal height Function
    /* Give class name "equal_height" */
    $(window).on('load', function(){
        equalheight('.equal_height');
    });
    $(window).on('resize', function(){
        equalheight('.equal_height');
        equalheight('.equal_title');
    });
    // Equal Height Function
    equalheight = function(container){
        var currentTallest = 0, currentRowStart = 0, rowDivs = new Array(), $el, topPosition = 0;
        $(container).each(function() {
            $el = $(this);
            $($el).height('auto')
            topPostion = $el.position().top;
            if (currentRowStart != topPostion) {
                for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
                    rowDivs[currentDiv].height(currentTallest);
                }
                rowDivs.length = 0; // empty the array
                currentRowStart = topPostion;
                currentTallest = $el.outerHeight();
                rowDivs.push($el);
            } else {
                rowDivs.push($el);
                currentTallest = (currentTallest < $el.outerHeight()) ? ($el.outerHeight()) : (currentTallest);
            }
            for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
                rowDivs[currentDiv].height(currentTallest);
            }
        });
    }

    $(".create").click(function (){
        let name=$('input[name=wisher_name]').val();
        if(name==''){
            alert('Please enter name to create Card');
        }
        let cardId=$('input[name=card_id]').val();
        window.location.href='/wish-card/'+cardId+'/'+name;
    });
});
