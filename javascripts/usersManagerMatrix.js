
$(document).ready(function() {
    $('a.allWebsites').click(function() {
        // Make use of the general purpose show and position operations
        // open and place the menu where we want.
        var menu =  $("#contextMenuAllWebsites").menu();
        menu.show().position({
            my : "left top",
            at : "left bottom",
            of : this
        });

        // Register a click outside the menu to close it
        $(document).one("click", function() {
            menu.hide().destroy();
        });

        // Make sure to return false here or the click registration
        // above gets invoked.
        return false;
    });
    
    var menu2 = $("#contextMenuAllUsers").menu().hide();
    $('a.allUsers').click(function() {
        // Make use of the general purpose show and position operations
        // open and place the menu where we want.
        menu2.show().position({
            my : "left top",
            at : "left bottom",
            of : this
        });

        // Register a click outside the menu to close it
        $(document).one("click", function() {
            menu2.hide();
        });

        // Make sure to return false here or the click registration
        // above gets invoked.
        return false;
    });
    
    $('#contextMenuAllUsers > li > a').click(function(){
        console.log(this);
    });
});
