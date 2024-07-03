(function($) {
  'use strict';
  var clipboard = new ClipboardJS('.btn-clipboard');
  clipboard.on('success', function(e) {
     (e);
  });
  clipboard.on('error', function(e) {
     (e);
  });
})(jQuery);