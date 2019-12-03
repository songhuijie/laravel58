;(function($){

    $.fn.extend({
        myloading:function(obj){

            var str=[" <div class=\"xxloading\">",
                "    <div class=\"xximg\"></div>",
                "  </div>"].join("");

            return this.append(str);

        }

    });
})(jQuery);
