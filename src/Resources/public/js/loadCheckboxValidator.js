if(window.loadCheckboxValidator !== undefined && window.loadCheckboxValidator.length) {
    for(var key in window.loadCheckboxValidator) {
        window.loadCheckboxValidator[key](jQuery);
    }
}